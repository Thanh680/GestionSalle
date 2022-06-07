<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Consulter salle
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="block mb-8">

            <!-- Recherche par batiment -->
            <div class="m-1 py-2">
                <p>Recherche par batiment :</p>
                <a href="{{route('tech.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tout</a>
                <a href="{{route('tech.searchBat',$batiment='a')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">A</a>
                <a href="{{route('tech.searchBat',$batiment='b')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">B</a>
                <a href="{{route('tech.searchBat',$batiment='c')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">C</a>
                <a href="{{route('tech.searchBat',$batiment='d')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">D</a>
                </div>
            <!-- FIN Recherche par batiment -->
            <!-- Debut Tableau -->
            <div id="load_tab" class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @include('partials.tabSalle')
            </div>
            <!-- FIN Tableau -->
        </div>
    </div>
</x-app-layout>