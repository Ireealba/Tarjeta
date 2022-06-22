   
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Perfil de usuario') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{!!asset('css/style/fonts/solution-vcard-icons.woff')!!}">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{!!asset('css/style/template_normal.min.css')!!}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="vcard-template style2" id="rootElement">
        <div class="bgd-shadow"></div>
        <div class="page-home page">
            <div class="vcard-header gradient-red-orange-bg" style="background: rgb(145 1 1 / 81%);">
                <div class="vcard-header-wrapper">
                    <div class="vcard-top-info">
                        <h4 class="top"></h4>

                        @if ($tarjeta->image)
                            <img class="imgperfil" src="{{Storage::url($tarjeta->image->url)}}" alt="">
                        @else
                            <img class="imgperfil" src="https://us.123rf.com/450wm/alekseyvanin/alekseyvanin1704/alekseyvanin170403663/76699411-vector-de-icono-de-usuario-ilustraci%C3%B3n-de-logotipo-s%C3%B3lido-de-perfil-pictograma-aislado-en-blanco.jpg?ver=6" alt="">
            
                        @endif  

                        <h2 class="name dynamicTextColor ng-binding">{{$tarjeta->name}} {{$tarjeta->last_name}}</h2>

                        @if ($tarjeta->puesto_trabajo != null || $tarjeta->empresa != null)
                            <h6 class="title dynamicTextColor ng-binding">
                                @if ($tarjeta->puesto_trabajo != null && $tarjeta->empresa != null)
                                    {{$tarjeta->puesto_trabajo}} en 
                                    {{$tarjeta->empresa}}
                                @else
                                    @if ($tarjeta->puesto_trabajo != null && $tarjeta->empresa == null)
                                        {{$tarjeta->puesto_trabajo}}
                                    @else
                                        {{$tarjeta->empresa}}
                                    @endif
                                @endif
                            </h6>
                        @endif                        

                    </div>
                </div>                
            </div>

            <div class="vcard-body-wrapper">
                <div class="vcard-body">
                    <div id="dvcard-details">

                        @if ($tarjeta->description != null)
                            <div class="vcard-row">
                                <h4 class="ng-binding">
                                    {{$tarjeta->description}}
                                </h4>
                            </div>
                            <div class="vcard-separator" ng-show="view.bio"></div>
                        @endif 

                        <div class="vcard-row" ng-show="view.numbers_mobile">
                            <i class="icon icon-phone"></i>
                            <h4>
                                {{$tarjeta->tlf1}}
                            </h4>
                            <small>Mobile</small>
                        </div>
                        
                        <div class="vcard-separator" ng-show="view.numbers_mobile"></div>

                        @if ($tarjeta->tlf2 != null)
                            <div class="vcard-row">
                                <i class="icon icon-phone"></i>
                                <h4>
                                    {{$tarjeta->tlf2}}
                                </h4>
                                <small>Mobile</small>

                            </div>

                            <div class="vcard-separator"></div>
                        @endif

                        @if ($tarjeta->tlf3 != null)
                            <div class="vcard-row">
                                <i class="icon icon-phone"></i>
                                <h4>
                                    {{$tarjeta->tlf3}}
                                </h4>
                                <small>Mobile</small>
                            </div>

                            <div class="vcard-separator"></div>
                        @endif

                        <div class="vcard-row">
                            <i class="icon icon-mail"></i>
                            <h4>
                                {{$tarjeta->email1}}
                            </h4>
                            <small>Email</small>
                        </div>

                        <div class="vcard-separator"></div>

                        @if ($tarjeta->email2 != null)
                            <div class="vcard-row">
                                <i class="icon icon-mail"></i>
                                <h4>
                                    {{$tarjeta->email2}}
                                </h4>
                                <small>Email</small>
                            </div>

                            <div class="vcard-separator"></div>
                        @endif

                        @if ($tarjeta->email3 != null)
                            <div class="vcard-row">
                                <i class="icon icon-mail"></i>
                                <h4>
                                    {{$tarjeta->email3}}
                                </h4>
                                <small>Email</small>
                            </div>

                            <div class="vcard-separator"></div>
                        @endif

                        @if ($tarjeta->puesto_trabajo != null || $tarjeta->empresa != null)
                            <div class="vcard-row">
                                <i class="icon icon-work"></i>
                                <h4 class="ng-binding">
                                    {{$tarjeta->name}} {{$tarjeta->last_name}}
                                </h4>
                                @if ($tarjeta->puesto_trabajo != null && $tarjeta->empresa != null)
                                    <small class="ng-binding">
                                        {{$tarjeta->puesto_trabajo}} en {{$tarjeta->empresa}}
                                    </small>

                                @else

                                    @if ($tarjeta->puesto_trabajo != null)
                                        <small class="ng-binding">
                                            {{$tarjeta->puesto_trabajo}}
                                        </small>
                                    @else
                                        <small class="ng-binding">
                                            {{$tarjeta->empresa}}
                                        </small>
                                    @endif

                                @endif
                            </div>

                            <div class="vcard-separator"></div>
                        @endif

                        @if ($tarjeta->location != null || $tarjeta->cod_postal != null || $tarjeta->local != null || $tarjeta->nacional != null)
                            <div class="vcard-row">
                                <label></label>
                                <i class="icon icon-event-location"></i>
                                <h4 class="ng-binding"></h4>

                                @if ($tarjeta->location != null)
                                    <h4 class="ng-binding">
                                        {{$tarjeta->location}}
                                    </h4>
                                @endif

                                @if ($tarjeta->cod_postal != null || $tarjeta->local != null || $tarjeta->nacional != null )
                                    <h4 class="ng-binding">
                                        @if ($tarjeta->cod_postal != null)
                                            {{$tarjeta->cod_postal}}
                                        @endif

                                        @if ($tarjeta->local != null && $tarjeta->nacional != null)
                                            <span class="ng-binding">
                                                {{$tarjeta->local}}
                                                <span>,</span>
                                                {{$tarjeta->nacional}}
                                            </span>
                                        @else                                                
                                                @if ($tarjeta->local != null && $tarjeta->nacional == null)
                                                    <span class="ng-binding">
                                                        {{$tarjeta->local}}
                                                    </span>
                                                @else
                                                    <span class="ng-binding">
                                                        {{$tarjeta->nacional}}
                                                    </span>
                                                @endif                                                                                                                                              
                                        @endif
                                    </h4>
                                @endif

                            </div>

                            <div class="vcard-separator"></div>
                        @endif

                        @if ($tarjeta->website1 != null)
                            <div class="vcard-row">
                                <i class="icon icon-earth"></i>
                                <h4>
                                    {{$tarjeta->website1}}
                                </h4>
                                <small>Web</small>
                            </div>

                        @endif

                        @if ($tarjeta->website2 != null)
                            <div class="vcard-separator"></div>
                            <div class="vcard-row">
                                <i class="icon icon-earth"></i>
                                <h4>
                                    {{$tarjeta->website2}}
                                </h4>
                                <small>Web</small>
                            </div>
                            
                        @endif

                        @if ($tarjeta->website3 != null)
                            <div class="vcard-separator"></div>
                            <div class="vcard-row">
                                <i class="icon icon-earth"></i>
                                <h4>
                                    {{$tarjeta->website3}}
                                </h4>
                                <small>Web</small>
                            </div>
                            
                        @endif
                        
                        @if ($tarjeta->social1 != null || $tarjeta->social2 != null || $tarjeta->social3 != null)
                            <div class="vcard-separator"></div>

                            <div class="vcard-social" style="margin-bottom: 20px">
                                <div class="socialMedia-container">
                                    <label>Social Media</label>
                                    <div class="channels-padding mt-0">
    
                                        @if ($tarjeta->social1 != null)
                                            <a href="https://www.instagram.com/{{$tarjeta->social1}}" target="_blank" class="channel-container ng-scoope" id="channel-item-Instagram">
                                                <div class="table-cell-middle pl-55 pos-relative">
                                                    <div class="channel-bgd-instagram">
                                                        <i class="icon-social-instagram"></i>                                                        
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
    
                                        @if ($tarjeta->social2 != null)
                                            <a href="https://www.twitter.com/{{$tarjeta->social2}}" target="_blank" class="channel-container ng-scoope" id="channel-item-Twitter">
                                                <div class="table-cell-middle pl-55 pos-relative">
                                                    <div class="channel-bgd-twitter">
                                                        <i class="icon-social-twitter"></i>                                                       
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
    
                                        @if ($tarjeta->social3 != null)
                                            <a href="https://www.infojobs.com" target="_blank" class="channel-container ng-scoope" id="channel-item-InfoJobs">
                                                <div class="table-cell-middle pl-55 pos-relative">
                                                    <div class="channel-bgd-infojobs">
                                                        <i class="icon-social-infojobs"></i>                                                        
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
    
                                    </div>
                                </div>
                            </div>

                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
    

    


   {{-- <div class="container py-8">        
        <br>
        <div class="head"> 
            @if ($tarjeta->image)
                <img class="imgperfil" src="{{Storage::url($tarjeta->image->url)}}" alt="">
            @else
                <img class="imgperfil" src="https://us.123rf.com/450wm/alekseyvanin/alekseyvanin1704/alekseyvanin170403663/76699411-vector-de-icono-de-usuario-ilustraci%C3%B3n-de-logotipo-s%C3%B3lido-de-perfil-pictograma-aislado-en-blanco.jpg?ver=6" alt="">

            @endif         
        </div>

        <div class="head">
            <h1>{{$tarjeta->name}}</h1>  
            <h2>{{$tarjeta->last_name}}</h2> <br>             
        </div>

        @if ($tarjeta->description != null)
            <div class="descripcion">
                <br>
                {{$tarjeta->description}} <br>
                <br>
            </div>
            <br><br>
        @endif                       
        
        
        <table>
            <tr>
                @if ($tarjeta->puesto_trabajo != null && $tarjeta->empresa != null)
                    <td>                        
                        {{$tarjeta->puesto_trabajo}}  en 
                        {{$tarjeta->empresa}} <br>                         
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
                        <img class="socialnetwork" src="{{asset('storage/iconos/telephone.png')}}" alt="">               
                        {{$tarjeta->tlf1}}                     
                    </td>
            </tr>
            
            @if ($tarjeta->tlf2 != null)
                <tr>
                    <td>             
                        <img src="{{asset('storage/iconos/telephone.png')}}" alt="" class="socialnetwork">           
                        {{$tarjeta->tlf2}}                         
                    </td>
                </tr>

            @endif
            
            @if ($tarjeta->tlf3 != null)
                <tr>
                    <td>
                        <img src="{{asset('storage/iconos/telephone.png')}}" alt="" class="socialnetwork">
                        {{$tarjeta->tlf3}} 
                    </td>
                </tr>                
            @endif

            <tr>                
                    <td>
                        <img src="{{asset('storage/iconos/mail.png')}}" alt="" class="socialnetwork">                
                        {{$tarjeta->email1}}
                    </td>
            </tr>
            
            @if ($tarjeta->email2 != null)
                <tr>                    
                        <td>  
                            <img src="{{asset('storage/iconos/mail.png')}}" alt="" class="socialnetwork">                  
                            {{$tarjeta->email2}}                        
                        </td>
                </tr>
            @endif

            @if ($tarjeta->email3 != null)
                <tr>
                        <td>
                            <img src="{{asset('storage/iconos/mail.png')}}" alt="" class="socialnetwork">                                                                
                            {{$tarjeta->email3}}                         
                        </td>
                </tr>
            @endif

            @if ($tarjeta->location != null || $tarjeta->cod_postal != null || $tarjeta->local != null || $tarjeta->nacional != null)
                <tr>
                        <td>
                            <img src="{{asset('storage/iconos/location.png')}}" alt="" class="socialnetwork">                    
                    @if ($tarjeta->location != null)
                            {{$tarjeta->location}} 
                    @endif
                    @if ($tarjeta->cod_postal != null)
                        @if ($tarjeta->location != null)
                            , {{$tarjeta->cod_postal}} 
                        @else                        
                            {{$tarjeta->cod_postal}} 
                        @endif
                    @endif
                    @if ($tarjeta->nacional != null)
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
                            <img class="socialnetwork" src="{{asset('storage/iconos/instagram.png')}}" alt=""> @ {{$tarjeta->social1}} 
                        </td> 
                </tr>
            @endif

            @if ($tarjeta->social2 != null)
                <tr>
                        <td>                    
                            <img class="socialnetwork" src="{{asset('storage/iconos/twitter.png')}}" alt=""> @ {{$tarjeta->social2}} 
                        </td>
                </tr>
            @endif

            @if ($tarjeta->social3 != null)
                <tr>
                        <td>
                            <img class="socialnetwork" src="{{asset('storage/iconos/ijobs.png')}}" alt=""> @ {{$tarjeta->social3}}                             
                        </td>
                </tr>
            @endif

            @if ($tarjeta->website1 != null)
                <tr>
                        <td>
                            <img src="{{asset('storage/iconos/web.png')}}" alt="" class="socialnetwork">
                            {{$tarjeta->website1}} 
                        </td> 
                </tr>
            @endif

            @if ($tarjeta->website2 != null)
                <tr>
                        <td>
                            <img src="{{asset('storage/iconos/web.png')}}" alt="" class="socialnetwork">
                            {{$tarjeta->website2}} 
                        </td>
                    </tr>                
            @endif

            @if ($tarjeta->website3 != null)
                <tr>
                    <td>
                        <img src="{{asset('storage/iconos/web.png')}}" alt="" class="socialnetwork">
                        {{$tarjeta->website3}}     
                    </td>
                </tr>
            @endif

        </table> 
   </div>  --}}
   
   

    {{-- <style>
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
        
        
    </style> --}}
