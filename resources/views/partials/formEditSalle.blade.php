<div class="alert alert-success" style="display:none"></div>
<div class="px-4 py-3 bg-white sm:p-6">
<input type="text" name="id-edit" id="id-edit" style="display:none"
        value="{{ old('id', '') }}" />
    <label for="batiment" class="block font-medium text-sm text-gray-700">Batiment</label>

    <div class="form-check-inline">
        <input type="radio" class="form-check-input mt-2" name="batiment-edita" id="batiment-edita" value="A">
        <label for="batimentA" class="form-check-label mt-1">A</label>
    </div>
    <div class="form-check-inline">
        <input type="radio" class="form-check-input mt-2" name="batiment-edit" id="batiment-edit" value="B">
        <label for="batimentB" class="form-check-label mt-1">B</label>
    </div>
    <div class="form-check-inline">
        <input type="radio" class="form-check-input mt-2" name="batiment-edit" id="batiment-edit" value="C">
        <label for="batimentC" class="form-check-label mt-1">C</label>
    </div>
    <div class="form-check-inline">
        <input type="radio" class="form-check-input mt-2" name="batiment-edit" id="batiment-edit" value="D">
        <label for="batimentD" class="form-check-label mt-1">D</label>
    </div>
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
        