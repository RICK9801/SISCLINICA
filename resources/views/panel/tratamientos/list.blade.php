@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
      <h1>tratamientos</h1>    
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
              <a class="btn btn-primary" style="margin-top: 10px;" href="{{ url('panel/tratamientos/add') }}">Añadir</a>
            </div>
            </div>

            <table class="table datatable ">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Descripción</th>
                  <th>Fecha Inicio</th>
                  <th>Costo</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

              @foreach($getRecord as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->descripcion }}</td>
                        <td>{{ $value->fecha_inicio }}</td>
                        <td>{{ $value->costo }}</td>
                        <td>{{ $value->estado }}</td>
                        <td>  
                
                    <a href="{{ url('panel/tratamientos/edit/'.$value->id) }}" class="btn btn-sm btn-primary">Editar</a>
                    <a href="{{ url('panel/tratamientos/delete/'.$value->id) }}" class="btn btn-sm btn-danger"
                       onclick="return confirm('¿Deseas eliminar este tratamiento?')">Eliminar</a>
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





