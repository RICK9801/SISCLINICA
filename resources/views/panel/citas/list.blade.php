@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
  <h1>Pacientes</h1>
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
              <a class="btn btn-primary" style="margin-top: 10px;" href="{{ url('panel/citas/add') }}">Añadir</a>
            </div>
          </div>

          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Odontólogo</th>
                <th>Servicio</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Observaciones</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($getRecord as $cita)
              <tr>
                <td>{{ $cita->id }}</td>
                <td>{{ $cita->paciente->nombre }} {{ $cita->paciente->apellido }}</td>
                <td>{{ $cita->odontologo->nombre }} {{ $cita->odontologo->apellido }}</td>
                <td>{{ $cita->servicio->tratamiento_id }}</td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->hora }}</td>
                <td>{{ $cita->estado }}</td>
                <td>{{ $cita->observaciones }}</td>
                <td>
                  <a href="{{ url('panel/citas/edit/'.$cita->id) }}" class="btn btn-primary btn-sm">Editar</a>
                  <a href="{{ url('panel/citas/delete/'.$cita->id) }}"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta cita? Esta acción no se puede deshacer.');">
                    Eliminar
                  </a>
                </td>

              </tr>
              @empty
              <tr>
                <td colspan="9" class="text-center">No hay citas registradas.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

@endsection