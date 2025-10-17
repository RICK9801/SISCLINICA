@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
      <h1>Editar usuarios</h1>    
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">lista de usuarios</h5>

              <form action="" method="post">
              {{ csrf_field() }}

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-12 col-form-label">Nombre</label>
                  <div class="col-sm-12">
                    <input type="text" name="name" value="{{ $getRecord->name }}" require class="form-control">
                  </div>
                </div>  

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-12 col-form-label">correo</label>
                  <div class="col-sm-12">
                    <input type="email" name="email" value="{{ $getRecord->email }}" readonly class="form-control">
                  
                  </div>
                </div>      

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-12 col-form-label">Contraseña</label>
                  <div class="col-sm-12">
                    <input type="text" name="password" class="form-control">
                    (verifique y cambie su contraseña)                 
                  </div>
                </div>

                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-12 col-form-label">Role</label>
                  <div class="col-sm-12">
                    <select class="form-control" name="role_id" required>
                        <option value="">Select</option>
                        @foreach ($getRole as $value)
                        <option {{ ($getRecord->role_id == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                  </div>
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