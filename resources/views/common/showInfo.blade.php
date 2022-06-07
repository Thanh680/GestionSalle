<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Consulter Infos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="block mb-8">
            @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <x-validation-errors class="mb-4" :errors="$errors"/>
            @if (Auth::user()->idType_users != 2)    
            <!-- Bouton ouvrir Popup ajouter info -->
            <button type="button" class="bg-green-500 hover:bg-green-700 py-2 px-4 text-white rounded" data-bs-toggle="modal" data-bs-target="#addInfoModal">
                Ajouter
            </button>
            <!-- END Bouton ouvrir Popup ajouter info -->

            <!-- Popup ajouter info -->
            <div class="modal fade" id="addInfoModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter une information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Afficher erreur -->
                            <div id="addInfo_errList"></div>
                            
                            <form id="formAddInfo" enctype="multipart/form-data" method="POST">
                            @csrf
                            @include('partials.formAddInfo')
                                <div class="modal-footer">
                                    <button type="addInfo" class="btn btn-primary">Ajouter</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Popup ajouter info -->
            @endif 
            <!-- Debut Tableau --> 
            <div id="load_tab" class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @include('partials.tabInfo')
            </div>
            <!-- FIN Tableau -->

        </div>
    </div>

</x-app-layout>

<script>
    jQuery(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    jQuery(document).on('addInfo','#formAddInfo',function(e){
      e.preventDefault();
      let formData = new FormData($('#formAddInfo')[0]);

        jQuery.ajax({
          type: 'POST',
          method: 'post',
        url:"{{ route('storeInfo',$id) }}",
        data: formData,
        contentType: false,
        processData: false,
            
        success: function(response){
          
        }
      });

      });
    });
    </script>