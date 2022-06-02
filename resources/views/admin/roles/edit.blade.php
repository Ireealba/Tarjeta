@extends('adminlte::page')

@section('title', 'Tarjeta contacto')

@section('content_header')
    <h1>Editar plan</h1>
@stop 

@section('content')

    @if (session('info'))
        <div class="alert alert-sucess">
            {{session('info')}}
        </div>    

    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}

            @include('admin.roles.partials.form')

            {!! Form::submit('Actualizar plan', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

