<div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-3 bg-white sm:p-6">
            <label for="etage" class="block font-medium text-sm text-gray-700">Nom de l'information</label>
            <input type="text" name="libelle" id="libelle" class="form-input rounded-md shadow-sm mt-1 block w-full"
                    value="{{ old('libelle', '') }}" />
            @error('libelle')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    <div class="px-4 py-3 bg-white sm:p-6">
        <label for="">Image</label>
        <input type="file" name="fileName" id="fileName" class="form-control">
    </div>
</div>