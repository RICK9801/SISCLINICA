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
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" value="{{ $getRecord->nombre }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text" name="apellido" value="{{ $getRecord->apellido }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CI</label>
                            <input type="text" name="ci" value="{{ $getRecord->ci }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Especialidad</label>
                            <input type="text" name="especialidad" value="{{ $getRecord->especialidad }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" value="{{ $getRecord->telefono }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ $getRecord->email }}" class="form-control">
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
