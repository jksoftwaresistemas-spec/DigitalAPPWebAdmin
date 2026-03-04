<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-gray-900 tracking-tight">
            {{ __('Autorizar Acessos') }}
        </h2>
        <p class="text-sm text-gray-500">Gerencie as permissões de entrada dos usuários no ecossistema.</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-bold text-lg">Solicitações Pendentes</h3>
                        <span class="bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1 rounded-full">3 Aguardando</span>
                    </div>
                    
                    <p class="text-gray-600 mb-4 italic text-sm">Nesta tela você poderá validar as chaves de acesso dos usuários do APP.</p>
                    
                    <div class="border-2 border-dashed border-gray-200 rounded-2xl p-10 text-center">
                        <span class="text-gray-400">Nenhuma solicitação nova no momento.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>