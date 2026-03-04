<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class FirebaseTestController extends Controller
{
    public function conectarBanco()
    {
        try {
            // 1. Carrega as credenciais do seu JSON
            $keyPath = base_path(env('FIREBASE_CREDENTIALS'));
            $json = json_decode(file_get_contents($keyPath), true);
            
            $projectId = $json['project_id'];
            
            // 2. URL da API REST do Firestore
            // O caminho é: projects/{project_id}/databases/(default)/documents/{collection}/{document}
            $url = "https://firestore.googleapis.com/v1/projects/{$projectId}/databases/(default)/documents/digital_app/teste_conexao";

            // 3. Dados que queremos salvar (Formatados para o JSON do Firestore)
            // O Firestore exige que os campos tenham o tipo definido (stringValue, integerValue, etc)
            $dados = [
                'fields' => [
                    'projeto' => ['stringValue' => 'DigitalAPPWebAdmin'],
                    'status' => ['stringValue' => 'Conectado via HTTP Direto!'],
                    'data_hora' => ['stringValue' => now()->toDateTimeString()],
                ]
            ];

            // 4. Faz a requisição PATCH (que cria ou atualiza o documento)
            $response = Http::patch($url, $dados);

            if ($response->successful()) {
                return response()->json([
                    'sucesso' => true,
                    'mensagem' => 'Conectado via API REST Direta (Sem gRPC)!',
                    'resposta_firebase' => $response->json()
                ]);
            } else {
                return response()->json([
                    'sucesso' => false,
                    'erro_firebase' => $response->json()
                ], $response->status());
            }

        } catch (Exception $e) {
            return response()->json([
                'sucesso' => false,
                'erro' => $e->getMessage()
            ], 500);
        }
    }
}