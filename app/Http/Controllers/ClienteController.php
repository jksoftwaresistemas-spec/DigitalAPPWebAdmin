<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class ClienteController extends Controller
{
    public function index()
    {
        try {
            // Carrega as credenciais do .env
            $keyPath = base_path(env('FIREBASE_CREDENTIALS'));
            if (!file_exists($keyPath)) {
                throw new Exception("Arquivo de credenciais JSON não encontrado.");
            }

            $json = json_decode(file_get_contents($keyPath), true);
            $projectId = $json['project_id'];

            // URL da API REST para listar documentos
            $url = "https://firestore.googleapis.com/v1/projects/{$projectId}/databases/(default)/documents/clientes";

            $response = Http::get($url);
            $dados = $response->json();

            // O Firestore retorna a chave 'documents' apenas se houver dados
            $clientes = $dados['documents'] ?? [];

            return view('clientes.index', compact('clientes'));

        } catch (Exception $e) {
            return view('clientes.index', [
                'clientes' => [],
                'erro' => $e->getMessage()
            ]);
        }
    }
}