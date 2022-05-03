    
   <div class="container py-8">        
        <br>
        <div class="head"> 
            @if ($tarjeta->image)
                <img class="imgperfil" src="{{Storage::url($tarjeta->image->url)}}" alt="">
            @else
                <img class="imgperfil" src="https://us.123rf.com/450wm/alekseyvanin/alekseyvanin1704/alekseyvanin170403663/76699411-vector-de-icono-de-usuario-ilustraci%C3%B3n-de-logotipo-s%C3%B3lido-de-perfil-pictograma-aislado-en-blanco.jpg?ver=6" alt="">

            @endif         
        </div>

        <div class="head">
            <h1>{{$tarjeta->name}}</h1>  {{-- Nombre --}}
            <h2>{{$tarjeta->last_name}}</h2> <br> {{-- Apellidos --}}            
        </div>

        @if ($tarjeta->description != null)
            <div class="descripcion">
                <br>
                {{$tarjeta->description}} <br>{{-- Descripcion --}}
                <br>
            </div>
            <br><br>
        @endif                       
        
        
        <table>
            <tr>
                @if ($tarjeta->puesto_trabajo != null && $tarjeta->empresa != null)
                    <td>                        
                        {{$tarjeta->puesto_trabajo}} {{-- puesto de trabajo en la empresa --}} en 
                        {{$tarjeta->empresa}} <br>{{-- nombre de la empresa --}}                         
                    </td>
                @else
                    @if ($tarjeta->puesto_trabajo != null)
                        <td>                            
                            {{$tarjeta->puesto_trabajo}} <br>
                        </td>
                    @else
                        <td>                            
                            {{$tarjeta->empresa}} <br>
                        </td>
                    @endif
                @endif  
            </tr>
            <tr>                
                    <td> 
                        <img class="socialnetwork" src="http://assets.stickpng.com/images/5a4525f5546ddca7e1fcbc86.png" alt="">               
                        {{$tarjeta->tlf1}} {{-- tlf 1 --}}                    
                    </td>
            </tr>
            
            @if ($tarjeta->tlf2 != null)
                <tr>
                    <td>             
                        <img src="http://assets.stickpng.com/images/5a4525f5546ddca7e1fcbc86.png" alt="" class="socialnetwork">           
                        {{$tarjeta->tlf2}} {{-- tlf 2 --}}                        
                    </td>
                </tr>

            @endif
            
            @if ($tarjeta->tlf3 != null)
                <tr>
                    <td>
                        <img src="http://assets.stickpng.com/images/5a4525f5546ddca7e1fcbc86.png" alt="" class="socialnetwork">
                        {{$tarjeta->tlf3}} {{-- tlf 3 --}}
                    </td>
                </tr>                
            @endif

            <tr>                
                    <td>
                        <img src="http://assets.stickpng.com/images/58485698e0bb315b0f7675a8.png" alt="" class="socialnetwork">                
                        {{$tarjeta->email1}} {{-- telefono 1 --}}
                    </td>
            </tr>
            
            @if ($tarjeta->email2 != null)
                <tr>                    
                        <td>  
                            <img src="http://assets.stickpng.com/images/58485698e0bb315b0f7675a8.png" alt="" class="socialnetwork">                  
                            {{$tarjeta->email2}} {{-- telefono 2 --}}                       
                        </td>
                </tr>
            @endif

            @if ($tarjeta->email3 != null)
                <tr>
                        <td>
                            <img src="http://assets.stickpng.com/images/58485698e0bb315b0f7675a8.png" alt="" class="socialnetwork">                                                                
                            {{$tarjeta->email3}} {{-- telefono 3 --}}                        
                        </td>
                </tr>
            @endif

            @if ($tarjeta->location != null || $tarjeta->cod_postal != null || $tarjeta->local != null || $tarjeta->nacional != null)
                <tr>
                        <td>
                            <img src="https://cdn-icons-png.flaticon.com/512/535/535188.png" alt="" class="socialnetwork">                    
                    @if ($tarjeta->location != null)
                            {{$tarjeta->location}} {{-- calle --}}
                    @endif
                    @if ($tarjeta->cod_postal != null){{-- codigo postal --}}
                        @if ($tarjeta->location != null)
                            , {{$tarjeta->cod_postal}} 
                        @else                        
                            {{$tarjeta->cod_postal}} 
                        @endif
                    @endif
                    @if ($tarjeta->nacional != null){{-- pais --}}
                        @if ($tarjeta->location != null || $tarjeta->cod_postal!= null ||$tarjeta->local != null)
                            , {{$tarjeta->nacional}}
                        @else
                            {{$tarjeta->nacional}}
                        @endif
                    @endif
                        </td>
                    
                </tr>
            @endif

            @if ($tarjeta->social1 != null)
                <tr>
                        <td>                    
                            <img class="socialnetwork" src="https://forcaem.com/wp-content/uploads/2016/05/instagram-png-instagram-png-logo-1455.png" alt=""> @ {{$tarjeta->social1}} {{-- instagram --}}
                        </td> 
                </tr>
            @endif

            @if ($tarjeta->social2 != null)
                <tr>
                        <td>                    
                            <img class="socialnetwork" src="https://logodownload.org/wp-content/uploads/2014/09/twitter-logo-4.png" alt=""> @ {{$tarjeta->social2}} {{-- twitter --}}
                        </td>
                </tr>
            @endif

            @if ($tarjeta->social3 != null)
                <tr>
                        <td>
                            <img class="socialnetwork" src="https://media.infojobs.net/appgrade/icons/ico-ij-ios.png" alt=""> @ {{$tarjeta->social3}} {{-- infojobs --}}                            
                        </td>
                </tr>
            @endif

            @if ($tarjeta->website1 != null)
                <tr>
                        <td>
                            <img src="https://cdn-icons-png.flaticon.com/512/93/93618.png" alt="" class="socialnetwork">
                            {{$tarjeta->website1}} {{-- web 1 --}}
                        </td> 
                </tr>
            @endif

            @if ($tarjeta->website2 != null)
                <tr>
                        <td>
                            <img src="https://cdn-icons-png.flaticon.com/512/93/93618.png" alt="" class="socialnetwork">
                            {{$tarjeta->website2}} {{-- web 2 --}}
                        </td>
                    </tr>                
            @endif

            @if ($tarjeta->website3 != null)
                <tr>
                    <td>
                        <img src="https://cdn-icons-png.flaticon.com/512/93/93618.png" alt="" class="socialnetwork">
                        {{$tarjeta->website3}} {{-- web 3 --}}    
                    </td>
                </tr>
            @endif

        </table> 
   </div>                                    

    <style>
        .socialnetwork{
            height: 20px;
            width: 20px;
            border-radius: 100%;
        }

        .descripcion{
            background-color: lightgray;
            margin-left: 30%;
            margin-right: 30%;
            border-radius: 10px;
            font-size: 20px;
        }

        tr{
            border-top: 1px solid rgb(103, 167, 188);
            border-bottom: 1px solid rgb(103, 167, 188);
            
        }

        tr:first-child{                        
            border-top: 0px;            
        }

        tr:last-child{           
            border-bottom: 0px;
        }

        .imgperfil{
            height: 20%;
            border-radius: 100%;
        }

        .container{
            text-align: center;
        }

        table{
            /* text-align: center; */
            font-size: 20px;
            margin-left: 30%;
            width: 430px;
            border-radius: 10px;
            background-color: lightblue;

        }

        table,tr{
            border-collapse: collapse;
        }

        td{
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 50px;
        }
        
        
    </style>
