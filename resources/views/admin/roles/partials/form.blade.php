<div class="form-group">
    {!! Form::label('name', 'Nombre del plan:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @error('name')
            <small class="text-danger">
                {{$message}}    
            </small>    

    @enderror
</div>
<div class="form-group">
    {!! Form::label('card_number', 'Número de tarjetas límite:') !!}
    {!! Form::text('card_number', null, ['class' => 'form-control']) !!}
    @error('name')
            <small class="text-danger">
                {{$message}}    
            </small>    

    @enderror
</div>

<h2 class="h3">Lista de permisos</h2>

@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{$permission->description}}
        </label>
    </div>
@endforeach