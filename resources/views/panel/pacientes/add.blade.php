@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
      <h1>Añadir nuevos pacientes</h1>    
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Añadir nuevas categorias</h5>

              <form action="{{ url('panel/pacientes/add') }}" method="post">
              {{ csrf_field() }}

              <div class="row mb-3">
                <label class="col-sm-12 col-form-label">Nombre</label>
                <div class="col-sm-12">
                    <input type="text" name="nombre" value="{{ old('nombre') }}" required class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-12 col-form-label">Apellido</label>
                <div class="col-sm-12">
                    <input type="text" name="apellido" value="{{ old('apellido') }}" required class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-12 col-form-label">Cédula de Identidad</label>
                <div class="col-sm-12">
                    <input type="text" name="ci" value="{{ old('ci') }}" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-12 col-form-label">Teléfono</label>
                <div class="col-sm-12">
                    <input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-12 col-form-label">Correo Electrónico</label>
                <div class="col-sm-12">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-12 col-form-label">Fecha de Nacimiento</label>
                <div class="col-sm-12">
                    <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-12 col-form-label">Género</label>
                <div class="col-sm-12">
                    <select class="form-control" name="genero">
                        <option value="">Seleccione</option>
                        <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                        <option value="Otro" {{ old('genero') == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-12 col-form-label">Dirección</label>
                <div class="col-sm-12">
                    <textarea name="direccion" class="form-control">{{ old('direccion') }}</textarea>
                </div>
            </div>   

                <div class="row mb-3">
                   <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>

              </form>

            </div>
          </div>

        </div>

      </div>
    </section>

@endsection