@extends('adminlte::page')

@section('title', 'Tarjetas contacto')

@section('content_header')
    <h1>Editar usuario</h1>
@stop 

@section('content')

    @if (session('info'))
        <div class="alert alert-succes">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

<div class="card">
    <div class="card-body">
        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

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
                {!! Form::password('password', null, ['class' => 'form-control']) !!}
            </div>            

            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <h2 class="h5">Listado de roles</h2>
            @foreach ($roles as $role)
                
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{$role->name}}
                    </label>
                </div>

            @endforeach

            {!! Form::submit('Actualizar usuario', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_cusom.css">
@stop

@section('js')
    <script> console.log('Hi!') </script>
@stop