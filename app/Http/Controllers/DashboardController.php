<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Exception;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $keyPath = base_path(env('FIREBASE_CREDENTIALS'));
            $json = json_decode(file_get_contents($keyPath), true);
            $projectId = $json['project_id'];

            // 1. URL para buscar a coleção de clientes
            $url = "https://firestore.googleapis.com/v1/projects/{$projectId}/databases/(default)/documents/clientes";

            $response = Http::get($url);
            
            // 2. Conta quantos documentos existem na coleção
            $dados = $response->json();
            $totalUsuarios = isset($dados['documents']) ? count($dados['documents']) : 0;

            return view('dashboard', [
                'totalUsuarios' => $totalUsuarios,
                'statusFirebase' => 'Conectado'
            ]);

        } catch (Exception $e) {
            return view('dashboard', [
                'totalUsuarios' => 'Erro',
                'statusFirebase' => 'Desconectado'
            ]);
        }
    }
}