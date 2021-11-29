 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des salles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="block mb-8">
        
                <!-- Bouton ouvrir Popup ajouter salle -->
                <button type="button" class="bg-green-500 hover:bg-green-700 py-2 px-4 text-white rounded" data-bs-toggle="modal" data-bs-target="#addSalleModal">
                Ajouter
                </button>
                <!-- END Bouton ouvrir Popup ajouter salle -->

                <!-- Popup ajouter salle -->
                <div class="modal fade" id="addSalleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter Salle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Afficher erreur -->
                            <div id="addSalle_errList"></div>
                            
                            <form id="formAddSalle">
                            @include('admin.partials.formAddSalle')
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="addSubmit">Ajouter</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <!-- END Popup ajouter salle -->

                <!-- Bouton ouvrir Popup importer salle -->
                <button type="button" class="bg-yellow-500 hover:bg-yellow-700 py-2 px-4 text-white rounded" data-bs-toggle="modal" data-bs-target="#importSalleModal">
                Importer
                </button>
                <!-- END Bouton ouvrir Popup importer salle -->

                <!-- Popup importer salle -->
                <div class="modal fade" id="importSalleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Importer Salle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formImportSalle" enctype="multipart/form-data" method="POST">
                            @csrf
                            @include('admin.partials.formImportSalle')
                                <div class="modal-footer">
                                    <button type="importSubmit" class="btn btn-primary">Importer</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <!-- END Popup importer -->

                <div class="m-1 py-2">
                <p>Recherche par batiment :</p>
                <a href="{{route('admin.gestionSalle')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tout</a>
                <a href="{{route('admin.searchBat',$batiment='a')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">A</a>
                <a href="{{route('admin.searchBat',$batiment='b')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">B</a>
                <a href="{{route('admin.searchBat',$batiment='c')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">C</a>
                <a href="{{route('admin.searchBat',$batiment='d')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">D</a>
                </div>
            </div>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div id="load_tab" class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!-- Debut Tableau -->
                @include('admin.partials.tabSalle')
            <!-- FIN Tableau -->
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    jQuery(document).ready(function(){

    // Ajouter une salle
    jQuery('#addSubmit').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "{{ url('/addsalle/post') }}",
        method: 'post',
        data: {
            batiment: jQuery('#batiment').val(),
            etage: jQuery('#etage').val(),
            num: jQuery('#num').val(),
            nom: jQuery('#nom').val()
        },
        //En cas d'erreur
        error: function (e) {
            $('#addSalle_errList').html('');
            $.each(e.responseJSON.errors, function(key,value) {
            $('#addSalle_errList').append('<div class="alert alert-danger">'+value+'</div');
        }); 
        },
        success: function(result){
            jQuery('.alert').show()
            jQuery('.alert').html(result.success);
            location.reload();
        }});
    });
    // FIN ajouter une salle

    jQuery(document).on('importSubmit','#formImportSalle',function(e){
        e.preventDefault();
        let formData = new FormData($('#formImportSalle')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
        url: "{{ route('import_parse') }}",
        method: 'post',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        });
    });
    
    });
</script>