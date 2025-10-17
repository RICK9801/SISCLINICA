@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
      <h1>Odontologos</h1>    
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">        

        <div class="col-lg-12">
@include('_message')
          <div class="card">
            <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              <h5 class="card-title">Lista</h5>
            </div>
            <div class="col-md-6" style="text-align: right;">          
              <a class="btn btn-primary" style="margin-top: 10px;" href="{{ url('panel/odontologos/add') }}">Añadir</a>
            </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Completo</th>
                        <th>CI</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->nombre }} {{ $value->apellido }}</td>
                        <td>{{ $value->ci }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->telefono }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td>   
                          <a href="{{ url('panel/odontologos/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Editar</a>
                      <a href="{{ url('panel/odontologos/delete/'.$value->id) }}" class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Estás seguro de eliminar este odontólogo?')">Eliminar</a>                     
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
@endsection





