@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Añadir nueva cita</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Formulario de cita</h5>

                    <form action="#" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Paciente</label>
                            <div class="col-sm-12">
                                <select name="paciente_id" class="form-control" required>
                                    @foreach($pacientes as $paciente)
                                        <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                            {{ $paciente->nombre }} {{ $paciente->apellido }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Odontólogo</label>
                            <div class="col-sm-12">
                                <select name="odontologo_id" class="form-control" required>
                                    @foreach($odontologos as $odontologo)
                                        <option value="{{ $odontologo->id }}" {{ old('odontologo_id') == $odontologo->id ? 'selected' : '' }}>
                                            {{ $odontologo->especialidad }} {{ $odontologo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Servicio</label>
                            <div class="col-sm-12">
                                <select name="servicio_id" class="form-control" required>
                                    @foreach($servicios as $servicio)
                                        <option value="{{ $servicio->id }}" {{ old('servicio_id') == $servicio->id ? 'selected' : '' }}>
                                            {{ $servicio->tratamiento_id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Fecha</label>
                            <div class="col-sm-12">
                                <input type="date" name="fecha" value="{{ old('fecha') }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Hora</label>
                            <div class="col-sm-12">
                                <input type="time" name="hora" value="{{ old('hora') }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Estado</label>
                            <div class="col-sm-12">
                                <select name="estado" class="form-select" required>
                                    <option value="Programada" {{ old('estado') == 'Programada' ? 'selected' : '' }}>Programada</option>
                                    <option value="Cancelada" {{ old('estado') == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                                    <option value="Atendida" {{ old('estado') == 'Atendida' ? 'selected' : '' }}>Atendida</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-12 col-form-label">Observaciones</label>
                            <div class="col-sm-12">
                                <textarea name="observaciones" class="form-control" rows="3">{{ old('observaciones') }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Guardar Cita</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
