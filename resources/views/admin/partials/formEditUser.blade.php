<div class="alert alert-success" style="display:none"></div>
<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-3 bg-white sm:p-6">
    <input type="text" name="id-edit" id="id-edit" style="display:none"
            value= "{{ old('id', '') }}" />
        <label for="name" class="block font-medium text-sm text-gray-700">Nom</label>
        <input type="text" name="name-edit" id="name-edit" class="form-input rounded-md shadow-sm mt-1 block w-full"
                value= "{{ old('name', '') }}" />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="px-4 py-3 bg-white sm:p-6">
        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
        <input type="text" name="email-edit" id="email-edit" class="form-input rounded-md shadow-sm mt-1 block w-full"
                value="{{ old('email', '') }}" />
        @error('email')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="px-4 py-3 bg-white sm:p-6">
        <label for="password" class="block font-medium text-sm text-gray-700">Mot de passe</label>
        <input type="text" name="password-edit" id="password-edit" class="form-input rounded-md shadow-sm mt-1 block w-full"
                value="" />
        @error('password')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="px-4 py-3 bg-white sm:p-6">
        <label for="roles" class="block font-medium text-sm text-gray-700">Roles</label>
        <select name="idType_users" id="roles-edit" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full" multiple="multiple">
            @foreach($roles as $id => $role)
                <option value="{{ $id }}"{{ (Request::old('id') == $id ? "selected":"") }}>{{ $role->libelle }}</option>
            @endforeach
        </select>
        @error('roles')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    
</div>