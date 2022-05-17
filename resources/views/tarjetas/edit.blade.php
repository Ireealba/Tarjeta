<x-app-layout>
    <div class="container py-8">
        
        <br>

        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <br>

        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => ['tarjetas.update', $tarjeta], 'method' => 'put', 'files' => 'true']) !!}
                    {!! Form::hidden('user_id', $id, []) !!}

                    <div class="row">
                        <div class="col">
                            <div class="image-wrapper" >
                                @if ($tarjeta->image)
                                    <img id="picture" src="{{Storage::url($tarjeta->image->url)}}" alt="">                            
                                
                                @else
                                    <img id="picture" src="https://us.123rf.com/450wm/alekseyvanin/alekseyvanin1704/alekseyvanin170403663/76699411-vector-de-icono-de-usuario-ilustraci%C3%B3n-de-logotipo-s%C3%B3lido-de-perfil-pictograma-aislado-en-blanco.jpg?ver=6" alt="">                                
                                @endif                            
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('file', 'Añade una imagen:', []) !!}
                                {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

                                @error('file')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>                    
                    <br>
                    <div class="form-group">
                        {!! Form::label('name_tarjeta', 'Nombre de la tarjeta:', []) !!}
                        <br>
                        {!! Form::text('name_tarjeta', $tarjeta->name_tarjeta, ['class' => 'form-control text']) !!}

                        @error('name_tarjeta')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <br>
                    <h2><b>Información personal</b></h2>
                    <br>
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre:', []) !!}
                        <br>
                        {!! Form::text('name', $tarjeta->name, ['class' => 'form-control text']) !!}

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        {!! Form::label('last_name', 'Apellidos:', []) !!}
                        <br>
                        {!! Form::text('last_name', $tarjeta->last_name, ['class' => 'form-control text']) !!}

                        @error('last_name')
                            <span class="text-danger">{{$message}}</span>                    
                        @enderror

                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Descripción:', []) !!}
                        <br>
                        {!! Form::text('description', $tarjeta->description, ['class' => 'form-control text']) !!}
                    </div>
                    <br>
                    <h2><b>Información de la empresa</b></h2>
                    <br>
                    <div class="form-group">
                        {!! Form::label('empresa', 'Nombre:', []) !!}
                        <br>
                        {!! Form::text('empresa', $tarjeta->empresa, ['class' => 'form-control text']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('puesto_trabajo', 'Puesto de trabajo:', []) !!}
                        <br>
                        {!! Form::text('puesto_trabajo', $tarjeta->puesto_trabajo, ['class' => 'form-control text']) !!}
                    </div>
                    <br>
                    <h2><b>Teléfono de contacto</b></h2>
                    <br>
                    <div class="form-group">
                        {!! Form::label('tlf1', 'Teléfono 1:', []) !!}
                        <br>
                        {!! Form::text('tlf1', $tarjeta->tlf1, ['class' => 'form-control text']) !!}

                        @error('tlf1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        {!! Form::label('tlf2', 'Teléfono 2:', []) !!}
                        <br>
                        {!! Form::text('tlf2', $tarjeta->tlf2, ['class' => 'form-control text']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tlf3', 'Teléfono 3:', []) !!}
                        <br>
                        {!! Form::text('tlf3', $tarjeta->tlf3, ['class' => 'form-control text']) !!}
                    </div>
                    <br>
                    <h2><b>Correo de contacto</b></h2>
                    <br>
                    <div class="form-group">
                        {!! Form::label('email1', 'Correo 1:', []) !!}
                        <br>
                        {!! Form::email('email1', $tarjeta->email1, ['class' => 'form-control text']) !!}

                        @error('email1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        {!! Form::label('email2', 'Correo 2:', []) !!}
                        <br>
                        {!! Form::email('email2', $tarjeta->email2, ['class' => 'form-control text']) !!}
                    </div>
                    <div class="form-group"> 
                        {!! Form::label('email3', 'Correo 3:', []) !!}
                        <br>
                        {!! Form::email('email3', $tarjeta->email3, ['class' => 'form-control text']) !!}
                    </div>
                    <br>
                    <h2><b>Dirección</b></h2>
                    <br>
                    <div class="form-group">
                        {!! Form::label('location', 'Calle:', []) !!}
                        <br>
                        {!! Form::text('location', $tarjeta->location, ['class' => 'form-control text']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('cod_postal', 'Código postal:', []) !!}
                        <br>
                        {!! Form::text('cod_postal', $tarjeta->cod_postal, ['class' => 'form-control text']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('local', 'Localidad:', []) !!}
                        <br>
                        {!! Form::text('local', $tarjeta->local, ['class' => 'form-control text']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('nacional', 'País:', []) !!}
                        <br>
                        {!! Form::text('nacional', $tarjeta->nacional, ['class' => 'form-control text']) !!}
                    </div>
                    <br>
                    <h2><b>Redes sociales</b></h2>
                    <br>
                    <div class="form-group">
                        {!! Form::label('social1', 'Instagram:', []) !!}
                        <br>
                        {!! Form::text('social1', $tarjeta->social1, ['class' => 'form-control text']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('social2', 'Twitter:', []) !!}
                        <br>
                        {!! Form::text('social2', $tarjeta->social2, ['class' => 'form-control text']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('social3', 'InfoJobs:', []) !!}
                        <br>
                        {!! Form::text('social3', $tarjeta->social3, ['class' => 'form-control text']) !!}
                    </div>
                    <br>
                    <h2><b>Sitio web</b></h2>
                    <br>
                    <div class="form-group">
                        {!! Form::label('website1', 'Website 1:', []) !!}
                        <br>
                        {!! Form::text('website1', $tarjeta->website1, ['class' => 'form-control text']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('website2', 'Website 2:', []) !!}
                        <br>
                        {!! Form::text('website2', $tarjeta->website2, ['class' => 'form-control text']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('website3', 'Website 3:', []) !!}
                        <br>
                        {!! Form::text('website3', $tarjeta->website3, ['class' => 'form-control text']) !!}
                    </div>
                    <br>
                    {!! Form::submit('Editar tarjeta', ['class' => 'btn']) !!}                    
                    
                {!! Form::close() !!}
                
            </div>
        </div>

    </div>

    <script>
        //cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
    <style>
        .image-wrapper{
            position: relative; 
            padding-bottom: 5%;
            padding-top: 5%;
            padding-left: 40%;
        }

        .image-wrapper img{
            width:200px; 
            height:200px; 
            border-radius:100%
        }

        .card{
            text-align: center;
        }

        h1{
            font-size: 30px;
        }

        h2{
            font-size: 25px;
        }

        .btn{
            background-color: gray;
            width: 100px;
            text-align: center;
            color: white;
            height: 30px;
            padding-top: 5px;
            border-radius: 10px;
            margin-bottom: 2px;
        }

        .text{
            text-align: center;
        }

    </style>
    
</x-app-layout>