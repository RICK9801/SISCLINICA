@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Editar Odontologos</h1>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-9">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">lista </h5>

                    <form action="" method="post">
                        {{ csrf_field() }}


                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <input type="text" name="descripcion" class="form-control" value="{{ $getRecord->descripcion }}">

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" class="form-control" value="{{ $getRecord->fecha_inicio }}">
                        </div>

            

                        <div class="mb-3">
                            <label class="form-label">Costo</label>
                            <input type="number" step="0.01" name="costo" class="form-control" value="{{ $getRecord->costo }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-control">
                                <option value="en_proceso" {{ $getRecord->estado == 'en_proceso' ? 'selected' : '' }}>En proceso</option>
                                <option value="completado" {{ $getRecord->estado == 'completado' ? 'selected' : '' }}>Completado</option>
                                <option value="cancelado" {{ $getRecord->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>
</section>

@endsection
