<div class="alert alert-success" style="display:none"></div>
<div class="px-4 py-3 bg-white sm:p-6">
<input type="text" name="id-edit" id="id-edit" style="display:none"
        value="{{ old('id', '') }}" />
    <label for="batiment" class="block font-medium text-sm text-gray-700">Batiment</label>
    <input type="text" name="batiment-edit" id="batiment-edit" class="form-input rounded-md shadow-sm mt-1 block w-full"
        value="{{ old('batiment', '') }}" />
    @error('batiment')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="px-4 py-3 bg-white sm:p-6">
    <label for="etage" class="block font-medium text-sm text-gray-700">Etage</label>
    <input type="text" name="etage-edit" id="etage-edit" class="form-input rounded-md shadow-sm mt-1 block w-full"
        value="{{ old('etage', '') }}" />
    @error('etage')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="px-4 py-3 bg-white sm:p-6">
    <label for="num" class="block font-medium text-sm text-gray-700">N°Salle</label>
    <input type="text" name="num-edit" id="num-edit" class="form-input rounded-md shadow-sm mt-1 block w-full"
        value="{{ old('num', '') }}" />
    @error('num')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="px-4 py-3 bg-white sm:p-6">
    <label for="nom" class="block font-medium text-sm text-gray-700">Nom</label>
    <input type="text" name="nom-edit" id="nom-edit" class="form-input rounded-md shadow-sm mt-1 block w-full"
        value="{{ old('nom', '') }}" />
    @error('nom')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
        