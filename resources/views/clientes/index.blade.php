<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-black text-2xl text-gray-900 tracking-tight leading-none">
                    {{ __('Clientes') }}
                </h2>
                <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mt-1">Sincronizado com Firestore</p>
            </div>
            <button class="bg-black hover:bg-gray-800 text-white text-[10px] font-black px-5 py-2.5 rounded-xl transition shadow-lg flex items-center gap-2 uppercase tracking-widest active:scale-95">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
                Novo Cliente
            </button>
        </div>
    </x-slot>

    <div class="py-6 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-4 flex flex-col md:flex-row justify-between gap-3 items-center">
                <div class="relative w-full md:w-72">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                    <input type="text" placeholder="Pesquisar..." class="pl-9 w-full border-gray-200 bg-white rounded-xl shadow-sm focus:ring-1 focus:ring-black text-xs font-bold py-2 placeholder-gray-300">
                </div>
                
                <div class="flex bg-white p-1 rounded-xl shadow-sm border border-gray-100">
                    <button class="px-4 py-1.5 text-[9px] font-black uppercase rounded-lg bg-black text-white tracking-widest">Todos</button>
                    <button class="px-4 py-1.5 text-[9px] font-black uppercase rounded-lg text-gray-400 hover:text-black tracking-widest">Ativos</button>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <table class="w-full text-left table-auto">
                    <thead>
                        <tr class="bg-gray-50 text-[9px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">
                            <th class="px-6 py-3">UID</th>
                            <th class="px-6 py-3">Dados do Cliente</th>
                            <th class="px-6 py-3 text-center">Status</th>
                            <th class="px-6 py-3 text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($clientes as $cliente)
                            @php
                                $pathParts = explode('/', $cliente['name']);
                                $docId = end($pathParts);
                                $fields = $cliente['fields'] ?? [];
                                $nome = $fields['nome']['stringValue'] ?? 'Sem Nome';
                                $status = $fields['status']['stringValue'] ?? 'Pendente';
                                $isAtivo = strtolower($status) == 'ativo';
                            @endphp

                            <tr class="group hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-3">
                                    <span class="text-[10px] font-mono font-bold text-gray-300 group-hover:text-gray-900 transition-colors">
                                        #{{ substr($docId, 0, 6) }}
                                    </span>
                                </td>
                                <td class="px-6 py-3 text-xs font-bold text-gray-900">{{ $nome }}</td>
                                <td class="px-6 py-3 text-center">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-lg text-[8px] font-black uppercase tracking-tighter border {{ $isAtivo ? 'bg-green-50 text-green-700 border-green-200' : 'bg-amber-50 text-amber-700 border-amber-200' }}">
                                        {{ $status }}
                                    </span>
                                </td>
                                <td class="px-6 py-3 text-right">
                                    <div class="flex justify-end items-center gap-1">
                                        <button class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Ver">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </button>
                                        <button class="p-1.5 text-gray-400 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition" title="Editar">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </button>
                                        <button class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Excluir">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-gray-400 text-xs font-black uppercase tracking-widest">
                                    Nenhum cliente sincronizado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>