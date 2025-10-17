@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
      <h1>Add New User</h1>    
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Añadir nuevos Usuarios</h5>

              <form action="" method="post">
              {{ csrf_field() }}

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-12 col-form-label">Nombre</label>
                  <div class="col-sm-12">
                    <input type="text" name="name" value="{{ old('name') }}" require class="form-control">
                  </div>
                </div>  

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-12 col-form-label">correo</label>
                  <div class="col-sm-12">
                    <input type="email" name="email" value="{{ old('email') }}" require class="form-control">
                   <div style="color:red">{{ $errors->first('email') }}</div>
                  </div>
                </div>      

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-12 col-form-label">Contraseña</label>
                  <div class="col-sm-12">
                    <input type="password" name="password" require class="form-control">
                  </div>
                </div>

                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-12 col-form-label">Role</label>
                  <div class="col-sm-12">
                    <select class="form-control" name="role_id" required>
                        <option value="">Seleccionar</option>
                        @foreach ($getRole as $value)
                       <option value="{{ $value->id }}" {{ old('role_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                     @endforeach
                    </select>
                  </div>
                </div>            

                <div class="row mb-3">
                   <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </div>

              </form>

            </div>
          </div>

        </div>

      </div>
    </section>

@endsection