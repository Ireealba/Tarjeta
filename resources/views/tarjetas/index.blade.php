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
                                <form action="{{route('tarjetas.destroy', $tarjeta)}}" method="post">
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
</x-app-layout>

