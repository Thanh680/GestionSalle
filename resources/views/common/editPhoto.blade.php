<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier photo
        </h2>
    </x-slot>

    <div>

        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="POST" action="{{ url('updatePhoto/'.$id.'/'.$fileName) }}">
                    @csrf
                    @method('PUT')
                    @foreach ($photo as $object)
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="nom" class="block font-medium text-sm text-gray-700">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value= "{{ $object->nom}}" />
                            @error('nom')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <a class="block relative h-56 rounded overflow-hidden">
                                <img 
                                alt="gallery" 
                                class="object-cover object-center w-full h-full block" 
                                style="max-height: 500px;
                                max-width: 500px;"
                                src="{{ asset('uploads/photo/'.$object->fileName.'?'.time()) }}">
                            </a>
                        </div>
                        
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Valider
                            </button>
                            </form>
                        </div>
                        <form method="POST" action="{{ route('rotate', [$object->id , $object->fileName])}}">
                            @csrf
                                <button class="m-2 p-2 bg-yellow-500 hover:bg-yellow-700 rounded-lg text-white font-bold" name="action" value="left">Tourner vers la gauche</button>
                                <button class="m-2 p-2 bg-yellow-500 hover:bg-yellow-700 rounded-lg text-white font-bold" name="action" value="right">Tourner vers la droite</button>
                            </form>
                    </div>
                
                
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>