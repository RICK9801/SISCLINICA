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

              <form action="#" method="post">
              {{ csrf_field() }}

              <div class="mb-3">
                                                    <label class="form-label">Descripción</label>
                                                    <textarea name="descripcion" class="form-control" required></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Fecha Inicio</label>
                                                    <input type="date" name="fecha_inicio" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Costo</label>
                                                    <input type="number" step="0.01" name="costo" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Estado</label>
                                                    <select name="estado" class="form-control">
                                                        <option value="en_proceso">En proceso</option>
                                                        <option value="completado">Completado</option>
                                                        <option value="cancelado">Cancelado</option>
                                                    </select>
                                                </div>  

                <div class="row mb-3">
                   <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Añadir</button>
                  </div>
                </div>

              </form>

            </div>
          </div>

        </div>

      </div>
    </section>

@endsection


