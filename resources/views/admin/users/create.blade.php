@extends('adminlte::page')

@section('title', 'Tarjetas contacto')

@section('content_header')
    <h1>Crear usuario</h1>
@stop 

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.users.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group">
                    {!! Form::label('password', 'Contraseña:') !!}
                    {!! Form::text('password', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('confirm_password', 'Confirma la contraseña:') !!}
                    {!! Form::password('confirm_password', null, ['class' => 'form-control']) !!}
                </div>

                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                {!! Form::submit('Crear usuario', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

