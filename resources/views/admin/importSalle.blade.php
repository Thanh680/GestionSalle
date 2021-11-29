<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Salles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-validation-errors class="mb-4" :errors="$errors"/>
                    
                    <form action="{{ route('import_parse') }}" method="POST" class="mb-4" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="csv_file">Fichier CSV à importer</label>

                            <x-input id="csv_file" class="block mt-1 w-full" type="file" name="csv_file" required/>
                        </div>

                        <div class="mt-4 flex items-center" style="display:none">
                            <label for="header">File contains header row ?</label>

                            <x-input id="header" class="ml-1" type="checkbox" name="header" checked/>
                        </div>

                        <x-button class="mt-4">
                            {{ __('Importer') }}
                        </x-button>
                    </form>

                    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50">
                                    <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Batiment</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50">
                                    <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Etage</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50">
                                    <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Num</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50">
                                    <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nom</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach($salles as $salle)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salle->batiment}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salle->etage}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salle->num}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salle->nom}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $salles->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>