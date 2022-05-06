<x-app-layout>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">        
            <table> 
                <thead>
                    <th> </th>
                    <th> </th>
                    <th colspan="3"></th>
                    
                </thead>               
                <tbody>
                    @foreach ($tarjetas as $tarjeta)
                        <tr>
                            <td><b>{{$tarjeta->name_tarjeta}}</b></td>
                            
                            <td>
                                <a class="ver" href="{{route('tarjetas.show', $tarjeta)}}">Ver</a>
                            </td>
                            <td>
                                <a class="editar" href="{{route('tarjetas.edit', $tarjeta)}}">Editar</a>
                            </td>                           
                            <td>
                                <form action="{{route('tarjetas.destroy', $tarjeta)}}" method="post" class="formulario-eliminar">
                                    @csrf
                                    @method('delete')                                    
                                    <button type="submit" class="eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        tr:nth-child(odd){
            background-color: rgb(218, 218, 218);
        }

        tr:hover{
            background-color: rgb(175, 175, 175);
        }

        td{
            width: 10px;
        }

        td:first-child{
            width: 75%;
        }

        .eliminar{
            text-decoration: none;
            background-color: red;
            display: inline-block;
            text-align: center;
            color: white;
            height: 30px;
            width: 70px;
            padding-top: 5px;
            border-radius: 10px;
            margin-bottom: 2px;
        }

        .eliminar:hover{
            background-color: rgb(197, 0, 0);
        }

        .editar{
            text-decoration: none;
            background-color: gray;
            display: inline-block;
            text-align: center;
            color: white;
            height: 30px;
            width: 60px;
            padding-top: 5px;
            border-radius: 10px;
            margin-bottom: 2px; 
        }

        .editar:hover{
            background-color: rgb(105, 105, 105);
        }

        .ver{
            text-decoration: none;
            background-color: rgb(51, 143, 255);
            display:inline-block;
            text-align: center;
            color: white;
            height: 30px;
            width: 50px;
            padding-top: 5px;
            border-radius: 10px;
            margin-bottom: 2px;
        }

        .ver:hover{
            background-color: rgb(33, 114, 213);
        }

    </style>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
        </script>
        
    @endif
    
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                  this.submit();  
                }
                })
        });
        
    </script>

        {{-- @if (session('eliminar') == 'ok')
            <script>
                if (result.value){
                            Swal.fire('Deleted!',
                                'Your file has been deleted.',
                                'successs'
                            )
                        }
            </script>
        @endif
        <script>

            $('.eliminar').submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title:'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result)=> {
                        

                        this.submit();
                    })
                });
            
        
    </script> --}}
    
</x-app-layout>

{{-- las fotos nuevas no se guardan----cambiar la ruta de privada a publica
    agregar botón de confirmación antes de eliminar registro --}}