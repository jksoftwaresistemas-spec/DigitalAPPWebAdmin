<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Visão Geral do Sistema') }}
            </h2>
            <span class="text-xs font-medium bg-green-100 text-green-700 px-3 py-1 rounded-full uppercase tracking-wider">
                Firestore: Conectado
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border-b-4 border-black">
                    <div class="flex items-center">
                        <div class="p-3 bg-gray-100 rounded-lg">
                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 uppercase">Usuários no APP</p>
                            <h3 class="text-2xl font-bold text-gray-900">{{ $totalUsuarios }}</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border-b-4 border-gray-400">
                    <div class="flex items-center">
                        <div class="p-3 bg-gray-100 rounded-lg">
                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 uppercase">Logs (24h)</p>
                            <h3 class="text-2xl font-bold text-gray-900">452</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border-b-4 border-gray-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-gray-100 rounded-lg">
                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 uppercase">Firestore Use</p>
                            <h3 class="text-2xl font-bold text-gray-900">12.4 MB</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border-b-4 border-green-500">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-50 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 uppercase">Status</p>
                            <h3 class="text-2xl font-bold text-gray-900">Ativo</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold text-gray-800 uppercase text-sm tracking-widest">Últimas Interações (APP)</h3>
                        <button class="text-xs font-semibold text-gray-400 hover:text-black uppercase">Ver Tudo</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50 text-gray-400 text-[10px] uppercase font-bold">
                                <tr>
                                    <th class="px-6 py-3">Usuário</th>
                                    <th class="px-6 py-3">Ação</th>
                                    <th class="px-6 py-3">Data/Hora</th>
                                    <th class="px-6 py-3 text-right">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-sm">
                                <tr>
                                    <td class="px-6 py-4 font-medium">João Silva</td>
                                    <td class="px-6 py-4 text-gray-600">Login no App</td>
                                    <td class="px-6 py-4 text-gray-500 text-xs">04/03/2026 10:45</td>
                                    <td class="px-6 py-4 text-right"><span class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-[10px] font-bold">INFO</span></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium">Maria Oliveira</td>
                                    <td class="px-6 py-4 text-gray-600">Upload de Documento</td>
                                    <td class="px-6 py-4 text-gray-500 text-xs">04/03/2026 10:42</td>
                                    <td class="px-6 py-4 text-right"><span class="px-2 py-1 bg-green-50 text-green-600 rounded text-[10px] font-bold">SUCCESS</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="font-bold text-gray-800 uppercase text-sm tracking-widest">Alertas de Sistema</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex p-3 bg-red-50 border-l-4 border-red-500 rounded">
                            <div class="ml-2">
                                <p class="text-xs font-bold text-red-800">Erro de Sincronização</p>
                                <p class="text-[10px] text-red-600 mt-1">Falha ao ler coleção 'clientes' no Firestore.</p>
                            </div>
                        </div>
                        <div class="flex p-3 bg-amber-50 border-l-4 border-amber-500 rounded">
                            <div class="ml-2">
                                <p class="text-xs font-bold text-amber-800">Backup Pendente</p>
                                <p class="text-[10px] text-amber-600 mt-1">O backup automático falhou há 2 horas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>