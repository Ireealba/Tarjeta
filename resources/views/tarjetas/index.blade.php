<x-app-layout>

    <br>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <br>
    
    <div class="card">
        <div class="card-body">        
            <table class="table table-striped"> 
                <thead>
                    <th> </th>
                    <th> </th>
                    <th colspan="4"></th>
                    
                </thead>               
                <tbody>
                    @foreach ($tarjetasUsuario as $tarjeta)
                        <tr>
                            <td><b>{{$tarjeta->name_tarjeta}}</b></td>
                            
                            <td width="10px">
                                <a class="ver" href="{{route('tarjetas.show', $tarjeta)}}">Ver</a>
                            </td>                            
                            <td>
                                <a class="verqr" href="{{route('tarjetas.qr_generate', $tarjeta)}}">Generar código QR</a>
                            </td>
                            <td width="10px">
                                <a class="editar" href="{{route('tarjetas.edit', $tarjeta)}}">Editar</a>
                            </td>                           
                            <td width="10px">
                                <form action="{{route('tarjetas.destroy', $tarjeta)}}" method="post" class="formulario-eliminar">
                                    @csrf
                                    @method('delete')                                    
                                    <button type="submit" class="eliminar" onclick="return confirm('Eliminar la tarjeta?')" class="eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>

    
    
   {{--  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
        </script>
        
    @endif 
    
     <script type="text/javascript">
        
        /* formulario.getElementByClassName("formulario-eliminar").addEventListener("click", function(event){
          event.preventDefault()
        }); */
                
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
        
        
        
    </script>     --}}
    
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

        .verqr{
            text-decoration: none;
            background-color: rgb(23, 230, 61);
            display: inline-block;
            text-align: center;
            color: white;
            height: 30px;
            width: 50px;
            padding-top: 5px;
            border-radius: 10px;
            margin-bottom: 2px;
        }

        .verqr:hover{
            background-color: rgb(16, 163, 43);
        }

    </style> 
    

