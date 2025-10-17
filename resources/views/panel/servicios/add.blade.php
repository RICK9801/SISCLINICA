@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Añadir nuevos servicios</h1>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-9">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Añadir nuevas categorias</h5>

                    <form action="#" method="post">
                        {{ csrf_field() }}


                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Paciente</label>
                            <div class="col-sm-12">
                                <select name="paciente_id" class="form-control">
                                    @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Odontologos</label>
                            <div class="col-sm-12">
                                <select name="odontologo_id" class="form-control">
                                    @foreach($odontologos as $odontologos)
                                    <option value="{{ $odontologos->id }}">{{ $odontologos->especialidad }} {{ $odontologos->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Tratamientos</label>
                            <div class="col-sm-12">
                                <select name="tratamiento_id" class="form-control" required>
                                    @foreach($tratamientos as $tratamiento)
                                    <option value="{{ $tratamiento->id }}">{{ $tratamiento->costo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                      <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">fecha_servicio</label>
                            <div class="col-sm-12">
                                <input type="date" name="fecha_servicio" value="{{ old('fecha_servicio') }}" class="form-control">
                            </div>
                        </div>


                        <!-- <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">monto_pagado</label>
                            <div class="col-sm-12">
                                <input type="text" name="monto_pagado" value="{{ old('monto_pagado') }}" class="form-control" require>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">saldo_restante</label>
                            <div class="col-sm-12">
                                <input type="number" name="saldo_restante" value="{{ old('saldo_restante') }}" class="form-control" require>
                            </div>
                        </div> -->

                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Método de Pago</label>
                            <div class="col-sm-12">
                                <select name="metodo_pago" class="form-select">
                                    <option value="Efectivo" {{ old('metodo_pago') == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                                    <option value="Tarjeta" {{ old('metodo_pago') == 'Tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                                    <option value="Transferencia" {{ old('metodo_pago') == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
                                    <option value="Otro" {{ old('metodo_pago') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Estado del Pago</label>
                            <div class="col-sm-12">
                                <select name="estado_pago" class="form-select">
                                    <option value="Pendiente" {{ old('estado_pago') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="Pagado" {{ old('estado_pago') == 'Pagado' ? 'selected' : '' }}>Pagado</option>
                                    <option value="Parcial" {{ old('estado_pago') == 'Parcial' ? 'selected' : '' }}>Parcial</option>
                                </select>
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