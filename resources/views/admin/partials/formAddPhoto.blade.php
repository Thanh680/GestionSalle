        <x-validation-errors class="mb-4" :errors="$errors"/>  

        <div class="sm:col-span-6 pt-1">
            <label for="">Nom image</label>
            <input type="text" name="nom" id="nom" class="form-control">
        </div>
        <div class="sm:col-span-6 pt-2">
            <label for="">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
