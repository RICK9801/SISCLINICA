@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>User</h1>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">lista de usuarios</h5>
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                            @if(!empty($PermissionAdd))
                            <a class="btn btn-primary" style="margin-top: 10px;" href="{{ url('panel/user/add') }}">Añadir</a>
                            @endif
                        </div>
                    </div>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Rol</th>
                                {{-- <th scope="col">Fecha</th> --}}
                                <th scope="col">Estado</th>

                                @if(!empty($PermissionEdit) || !empty($PermissionDelete))
                                <th scope="col">Acción</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getRecord as $value)
                            <tr>
                                <th scope="row">{{ $loop->count - $loop->index  }}</th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->role_name }}</td>
                                {{-- <td>{{ $value->created_at }}</td> --}}
                                <td>
                                    <span class="badge d-inline-flex align-items-center justify-content-center text-white w-100" style="max-width: 120px; min-width: 120px; font-size: 14px; padding: 8px 0; 
                 border-radius: 8px; background-color: {{ $value->estado == 1 ? '#28a745' : '#dc3545' }};">
                                        <i class="{{ $value->estado == 1 ? 'bi bi-check-circle-fill' : 'bi bi-x-circle-fill' }} me-1" style="font-size: 16px;"></i>
                                        {{ $value->estado == 1 ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>


                                </td>


                                <td>
                                    @if(!empty($PermissionEdit))
                                    <a href="{{ url('panel/user/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    @endif
                                    @if(!empty($PermissionDelete))

                                    <!-- Botón para abrir el modal -->
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $value->id }})">Eliminar</a>

                                    <!-- Modal de Confirmación -->
                                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro de que deseas eliminar este usuario?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a id="confirmDeleteButton" href="#" class="btn btn-danger">Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Botón que activa el modal -->
                                    <button type="button" class="btn btn-link p-0 border-0" style="background: none;" data-bs-toggle="modal" data-bs-target="#confirmModal" onclick="setFormAction('{{ route('user.toggleStatus', $value->id) }}')">
                                        <i class="{{ $value->estado == 1 ? 'bi bi-toggle-on text-success' : 'bi bi-toggle-off text-danger' }} fs-4"></i>

                                    </button>

                                    <!-- Modal de Confirmación -->
                                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Cambio de Estado</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro de que deseas cambiar el estado de este usuario?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form id="confirmForm" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    @endif
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>


        </div>
    </div>
</section>
<script>
    //scrip para elimminar
    function confirmDelete(userId) {
        let url = "{{ url('panel/user/delete') }}/" + userId;
        document.getElementById("confirmDeleteButton").setAttribute("href", url);
        var myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        myModal.show();
    }
    //scrip para estado
    function setFormAction(actionUrl) {
        document.getElementById("confirmForm").setAttribute("action", actionUrl);
    }

</script>

@endsection
