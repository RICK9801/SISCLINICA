@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
      <h1>Roles</h1>    
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">        

        <div class="col-lg-12">
@include('_message')
          <div class="card">
            <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              <h5 class="card-title">Lista de Roles</h5>
            </div>
            <div class="col-md-6" style="text-align: right;">
              @if(!empty($PermissionAdd))
              <a class="btn btn-primary" style="margin-top: 10px;" href="{{ url('panel/role/add') }}">Añadir</a>
           @endif
            </div>
            </div>

              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>                      
                    <th scope="col">Fecha</th>        
                  @if(!empty($PermissionEdit) || !empty($PermissionDelete))                    
                    <th scope="col">Action</th>
                  @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach($getRecord as $value)
                  <tr>
                    <th scope="row">{{ $loop->iteration  }}</th>
                    <td>{{ $value->name}}</td>
                    <td>{{ $value->created_at}}</td>
                    <td>{{ $value->updated_at}}</td>
                    <td>
                     @if(!empty($PermissionEdit))
                      <a href="{{ url('panel/role/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Editar</a>
                     @endif
                      @if(!empty($PermissionDelete))
                      <a href="{{ url('panel/role/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
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


@endsection
