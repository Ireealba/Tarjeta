@extends('adminlte::page')

@section('title', 'Tarjeta contacto')

@section('content_header')
    <h1>Crear nuevo plan</h1>
@stop 

@section('content')

    @if (session('info'))
        <div class="alert alert-sucess">
            {{session('info')}}
        </div>    

    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
                
                @include('admin.roles.partials.form')

                {!! Form::submit('Crear plan', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

