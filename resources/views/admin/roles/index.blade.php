@extends('adminlte::page')

@section('title', 'Tarjeta contacto')

@section('content_header')
    <h1>Lista de planes</h1>
@stop 

@section('content')

    <div class="card">
        <div class="card-body">

            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Plan</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($roles as $role)                
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Eliminar plan?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
@stop

