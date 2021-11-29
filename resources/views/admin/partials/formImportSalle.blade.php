<x-validation-errors class="mb-4" :errors="$errors"/>
    <div>
        <label for="csv_file">Fichier CSV à importer</label>

        <x-input id="csv_file" class="block mt-1 w-full" type="file" name="csv_file" required/>
    </div>

    <div class="mt-4 flex items-center" style="display:none">
        <label for="header">File contains header row ?</label>

        <x-input id="header" class="ml-1" type="checkbox" name="header" checked/>
    </div>