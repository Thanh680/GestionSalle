<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Consulter photos
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
      @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
      @endif
      <x-validation-errors class="mb-4" :errors="$errors"/>
        <div class="block mb-8">
          
        @if (Auth::user()->idType_users != 2)  
          <!-- Bouton ouvrir Popup ajouter photo -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPhotoModal">
                Ajouter
                </button>
                <!-- END Bouton ouvrir Popup ajouter photo -->

                <!-- Popup ajouter photo -->
                <div class="modal fade" id="addPhotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter Photo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAddPhoto" enctype="multipart/form-data" method="POST">
                            @csrf
                            @include('partials.formAddPhoto')
                                <div class="modal-footer">
                                    <button type="addPhoto" class="btn btn-success" >Ajouter</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <!-- END Popup ajouter photo -->
                @endif 
              <form action="{{ route('photo.search',$id) }}" method="GET" role="search">
              <input type="text" class="form-control mr-2" name="term" placeholder="Recherche" id="term" style="margin-top: 20px;">
              <span class="input-group-btn mr-5 mt-1">
                <button class="m-2 p-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-white font-bold" type="submit" title="Recherche">
                  <span class="fas fa-search">Rechercher</span>
                </button>
              </span>
              <a href="{{ route('photo.search',$id) }}" class=" mt-1">
                <span class="input-group-btn">
                  <button class="m-2 p-2 rounded-lg bg-red-500 hover:bg-red-700 text-white font-bold" type="button" title="Refresh page">
                    <span class="fas fa-sync-alt">Rafraichir</span>
                  </button>
                </span>
              </a>
          </form>

        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-4">
          @foreach ($photos as $photo)
          <div class="bg-gray-300 p-2">
            <a class="block relative h-56 rounded overflow-hidden">
              <img 
              alt="gallery" 
              class="object-cover object-center w-full h-full block" 
              src="{{ asset('uploads/photo/'.$photo->fileName) }}">
            </a>
            <div class="flex justify-between mt-2 p-1">
              <span class="text-lg">{{ $photo->nom}}</span>
            </div>
            @if (Auth::user()->idType_users != 2) 
            <div class="flex justify-between mt-2">
              <a class="m-1 p-2 bg-yellow-500 hover:bg-yellow-700 rounded-lg text-white font-bold" href="{{ route('editPhoto',[$photo->id,$photo->fileName])}}">Modifier</a>
              <form method="POST" action="{{ route('photo.destroy', $photo->id) }}" onsubmit="return confirm('Êtes-vous sûrs ?');">
                @csrf
                @method('DELETE')
                <button class="m-1 p-2 rounded-lg bg-red-500 hover:bg-red-700 text-white font-bold">Supprimer</button>  
              </form>
            </div>
            @endif
          </div>
          @endforeach
        </div>
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

    jQuery(document).on('addPhoto','#formAddPhoto',function(e){
      e.preventDefault();
      let formData = new FormData($('#formAddPhoto')[0]);

        jQuery.ajax({
          type: 'POST',
          method: 'post',
        url:"{{ route('storePhoto',$id) }}",
        data: formData,
        contentType: false,
        processData: false,

        success: function(response){
          
        }
      });
      });
    });
    </script>