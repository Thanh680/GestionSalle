<table class="min-w-full divide-y divide-gray-200 w-full">
    <thead>
        <tr>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Image
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nom
            </th>
            <th scope="col" width="400" class="px-6 py-3 bg-gray-50">

            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($infos as $info)
        <tr>
        <td class="block relative h-56 rounded overflow-hidden">
            <img 
              alt="gallery" 
              width="70px" height="70px"
              src="{{ asset('uploads/photoOption/'.$info->fileName) }}">
        </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $info->libelle}}</td>
            <td>
            @if (Auth::user()->idType_users != 2)
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary font-bold py-2 px-3 rounded font-bold" data-bs-toggle="modal" data-bs-target="#edit"
                data-id="{{ $info->id}}"
                >
                Modifier
                </button>
                <!-- END Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true"  aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier Salle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formEditSalle">
                    <div class="modal-body">
                    @include('partials.formEditSalle')
                        </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="editSubmit">Modifier</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                <!-- END Modal -->

                <form class="inline-block" action="{{route('info.destroy', $info->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûrs ?');">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" value="Supprimer">
                </form>
                @endif
            </td>
        <tr>
        @endforeach
    </table>

    <script>
    $('#edit').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var batiment = button.data('batiment')
        var etage = button.data('etage')
        var num = button.data('num')
        var nom = button.data('nom')
        var modal = $(this)

        modal.find('.modal-body #id-edit').val(id);
        //modal.find('.modal-body #batiment-edit').val(batiment);
        modal.find('.modal-body #etage-edit').val(etage);
        modal.find('.modal-body #num-edit').val(num);
        modal.find('.modal-body #nom-edit').val(nom);
      });

    jQuery('#editSubmit').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.ajax({
        url:"{{ route('admin.editSalle') }}",
        method: 'post',
        data: {
            id: jQuery('#id-edit').val(),
            batiment: jQuery('#batiment-edit').val(),
            etage: jQuery('#etage-edit').val(),
            num: jQuery('#num-edit').val(),
            nom: jQuery('#nom-edit').val()
        },
        success: function(result){
            jQuery('.alert').show()
            jQuery('.alert').html(result.success);
            location.reload();
     }});
});
    </script>