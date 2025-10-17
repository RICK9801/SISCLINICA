@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
  <h1>servicios</h1>
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
              <a class="btn btn-primary" style="margin-top: 10px;" href="{{ url('panel/servicios/add') }}">Añadir</a>
            </div>
          </div>

          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>NOMBRE PACIENTE</th>
                <th>NOMBRE MEDICO</th>
                <th>COSTO TOTAL </th>
                <th>fecha_servicio</th>
                <th>saldo restante</th>
                <th>monto_pagado</th>
                <th>metodo_pago</th>
                <th>estado_pago</th>
                <th>Acciones</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($getRecord as $value)
              <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->pacientes->nombre}}</td>
                <td>{{ $value->odontologos->especialidad}}</td>
                <td>{{ $value->tratamientos->costo}}</td>
                <td>{{ $value->fecha_servicio }}</td>
                <td>{{ $value->monto_restante }}</td>
                <td>{{ $value->monto_pagado }}</td>
                <td>{{ $value->metodo_pago}}</td>
                <td>{{ $value->estado_pago}}</td>
                <td>
                  <a href="{{ url('panel/servicios/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Editar</a>
              <a href="{{ url('panel/servicios/delete/'.$value->id) }}" 
   class="btn btn-danger btn-sm" 
   onclick="return confirm('¿Estás seguro de eliminar este servicio?');" 
   title="Eliminar">
   <i class="fas fa-trash-alt"></i>
</a>
                  <button type="button" class="btn btn-orange btn-sm" data-bs-toggle="modal" data-bs-target="#modalCalcular{{ $value->id }}">
                    Calcular
                  </button>
                </td>
              </tr>


              <!-- Modal o ventana emergente -->
              <div class="modal fade" id="modalCalcular{{ $value->id }}" tabindex="-1" aria-labelledby="modalCalcularLabel{{ $value->id }}" aria-hidden="true">
                <div class="modal-dialog">
                  <form action="{{ url('panel/servicios/add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $value->id }}">
                    <input type="hidden" name="tipo" value="calculo">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalCalcularLabel{{ $value->id }}">Calcular Servicio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                      </div>
                      <div class="modal-body">
                        <label for="monto_pagado{{ $value->id }}" class="form-label">monto_pagado</label>
                        <input type="number" name="monto_pagado" id="monto_pagado{{ $value->id }}" class="form-control" required step="0.01" min="0">
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success">
                          <i class="fas fa-dollar-sign"></i> Calcular
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

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