<div class="alert alert-success" style="display:none"></div>
<div class="px-4 py-2 bg-white sm:p-5">
    <label for="batiment" class="block font-medium text-sm text-gray-700">Batiment</label>
    <!-- <input type="text" name="batiment" id="batiment" class="form-input rounded-md shadow-sm mt-1 block w-full"
        value="{{ old('batiment', '') }}" />
    @error('batiment')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror -->
    <div class="form-check-inline">
        <input type="radio" class="form-check-input mt-2" name="batiment" id="batiment" value="A" checked="checked">
        <label for="batimentA" class="form-check-label mt-1">A</label>
    </div>
    <div class="form-check-inline">
        <input type="radio" class="form-check-input mt-2" name="batiment" id="batiment" value="B">
        <label for="batimentB" class="form-check-label mt-1">B</label>
    </div>
    <div class="form-check-inline">
        <input type="radio" class="form-check-input mt-2" name="batiment" id="batiment" value="C">
        <label for="batimentC" class="form-check-label mt-1">C</label>
    </div>
    <div class="form-check-inline">
        <input type="radio" class="form-check-input mt-2" name="batiment" id="batiment" value="D">
        <label for="batimentD" class="form-check-label mt-1">D</label>
    </div>
</div>

<div class="px-4 py-3 bg-white sm:p-6">
    <label for="etage" class="block font-medium text-sm text-gray-700">Etage</label>
    <input type="text" name="etage" id="etage" class="form-input rounded-md shadow-sm mt-1 block w-full"
        value="{{ old('etage', '') }}" />
    @error('etage')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="px-4 py-3 bg-white sm:p-6">
    <label for="num" class="block font-medium text-sm text-gray-700">N°Salle</label>
    <input type="text" name="num" id="num" class="form-input rounded-md shadow-sm mt-1 block w-full"
        value="{{ old('num', '') }}" />
    @error('num')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="px-4 py-3 bg-white sm:p-6">
    <label for="nom" class="block font-medium text-sm text-gray-700">Nom</label>
    <input type="text" name="nom" id="nom" class="form-input rounded-md shadow-sm mt-1 block w-full"
        value="{{ old('nom', '') }}" />
    @error('nom')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
    