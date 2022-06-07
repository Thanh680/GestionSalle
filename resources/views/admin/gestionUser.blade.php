<?php   use \App\Http\Controllers\AdminController; ?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des utilisateurs
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <!-- Bouton ouvrir Popup ajouter utilisateur -->
            <button type="button" class="bg-green-500 hover:bg-green-700 py-2 px-4 mb-2 text-white rounded" data-bs-toggle="modal" data-bs-target="#addUserModal">
                Ajouter
            </button>
            <!-- END Bouton ouvrir Popup ajouter utilisateur -->

            <!-- Popup ajouter utilisateur -->
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter Utilisateur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Afficher erreur -->
                            <div id="addUser_errList"></div>
                            
                            <form id="formAddUser">
                            @include('partials.formAddUser')
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="addSubmit">Ajouter</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Popup ajouter utilisateur -->

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <!-- <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th> -->
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom d'utilisateur
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Roles
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <tr>
                                        <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $user->id }}
                                        </td> -->

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $user->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $user->email }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">

                                            {{ AdminController::roleIdentify($user); }}
                                        </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary font-bold py-1 px-4 rounded font-bold" data-bs-toggle="modal" data-bs-target="#edit"
                                            data-id="{{ $user->id}}"
                                            data-name="{{ $user->name}}"
                                            data-email="{{ $user->email}}"
                                            data-role="{{ $user->role}}"
                                            >
                                            Modifier
                                            </button>
                                            <!-- END Button trigger modal -->

                                            <!-- Modal -->
                                            <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true"  aria-labelledby="myModalLabel">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modifier utilisateur</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="formEditUser">
                                                <div class="modal-body">
                                                @include('partials.formEditUser')
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
                                            <form class="inline-block" action="{{ route('admin.destroy', $user->id) }}" method="GET" onsubmit="return confirm('Êtes-vous sûrs ?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" value="Supprimer">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<script>
    jQuery(document).ready(function(){

    jQuery('#addSubmit').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "{{ route('admin.storeUser') }}",
        method: 'post',
        data: {
            name: jQuery('#name').val(),
            email: jQuery('#email').val(),
            password: jQuery('#password').val(),
            idType_users: jQuery('#roles').val()
        },
        //En cas d'erreur
        error: function (e) {
            $('#addUser_errList').html('');
            $.each(e.responseJSON.errors, function(key,value) {
            $('#addUser_errList').append('<div class="alert alert-danger">'+value+'</div');
        }); 
        },
        success: function(result){
            jQuery('.alert').show()
            jQuery('.alert').html(result.success);
            // location.reload();
        }});
    });

    $('#edit').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var email = button.data('email')
        var modal = $(this)

        modal.find('.modal-body #id-edit').val(id);
        modal.find('.modal-body #name-edit').val(name);
        modal.find('.modal-body #email-edit').val(email);
      });

      jQuery('#editSubmit').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        jQuery.ajax({
        url:"{{ route('admin.updateUser') }}",
        method: 'post',
        data: {
            id: jQuery('#id-edit').val(),
            name: jQuery('#name-edit').val(),
            email: jQuery('#email-edit').val(),
            idType_users: jQuery('#roles-edit').val(),
        },
        success: function(result){
            jQuery('.alert').show()
            jQuery('.alert').html(result.success);
     }});
    });
});
</script>