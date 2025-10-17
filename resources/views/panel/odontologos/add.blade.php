@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Añadir nuevos Odontologos</h1>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-9">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Añadir nuevas Odontologos</h5>

                    @extends('panel.layouts.app')

                        @section('content')

                        <div class="pagetitle">
                            <h1>Añadir odontologos</h1>
                        </div>

                        <section class="section">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Formulario de Tratamiento</h5>

                                            <form action="{{ url('panel/odontologos/add') }}" method="post">
                                                {{ csrf_field() }}

                      
                                                <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text" name="apellido" value="{{ old('apellido') }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CI</label>
                            <input type="text" name="ci" value="{{ old('ci') }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Especialidad</label>
                            <input type="text" name="especialidad" value="{{ old('especialidad') }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                        </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-primary">añadir</button>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </section>

                        @endsection
