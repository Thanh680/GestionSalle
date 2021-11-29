<x-app-layout>
    <x-slot name="header">
        Ajouter photo
    </x-slot>
    <div class="container mx-auto m-4 p-4 bg-white shadow-md rounded-lg">
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">

    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif    
    <form method="POST" action="{{ route('gest.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="sm:col-span-6 pt-5">
            <label for="">Nom image</label>
            <input type="text" name="nom" class="form-control">
        </div>
        <div class="sm:col-span-6 pt-5">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="sm:col-span-6 pt-5">
            <x-button class="bg-green-600">Create</x-button>
        </div>
    </form>

</div>
    </div>
</x-app-layout>