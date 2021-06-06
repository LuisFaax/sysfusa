 <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            @can('radicar_view') 
            <li class=" nav-item" ><a class="nav-link" href="{{url('demandas')}}" >
                <i class="la la-legal"></i><span > DEMANDAS</span></a>                
            </li>
            @endcan
            @can('actuaciones_view') 
            <li class=" nav-item" ><a class="nav-link" href="{{url('actuaciones')}}" >
                <i class="la la-copy"></i><span > ACTUACIONES*</span></a>                
            </li>
            @endcan
            @can('historiales_view') 
            <li class=" nav-item" ><a class="nav-link" href="{{url('historiales')}}" >
                <i class="ft-eye"></i><span > HISTORIALES*</span></a>                
            </li>
            @endcan
            @can('memoriales_view') 
            <li class=" nav-item" ><a class="nav-link" href="{{url('memoriales')}}" >
                <i class="ft-file"></i><span > MEMORIALES*</span></a>                
            </li>
            @endcan
            @can('estadisticas_view') 
            <li class=" nav-item" ><a class="nav-link" href="{{url('estadisticas')}}" >
                <i class="ft-search"></i><span > ESTADÍSTICAS</span></a>                
            </li>
            @endcan
            @can('users_view') 
            <li class=" nav-item" ><a class="nav-link" href="{{url('usuarios')}}" >
                <i class="ft-users"></i><span > USUARIOS</span></a>                
            </li>
            @endcan
            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-lock"></i><span>ACCESOS</span></a>
                <ul class="dropdown-menu">   

                 @can('roles_view') 
                 <li class=" nav-item" ><a class="dropdown-item" href="{{url('roles')}}" >
                    <i class="ft-list"></i><span > ROLES</span></a>                
                </li>
                @endcan
                @can('permisos_view') 
                <li class=" nav-item" ><a class="dropdown-item" href="{{url('permisos')}}" >
                    <i class="ft-user-check"></i><span > PERMISOS</span></a>                
                </li>
                @endcan
                @can('asignaciones_view') 
                <li class=" nav-item" ><a class="dropdown-item" href="{{url('asignar')}}" >
                    <i class="ft-check"></i><span > ASIGNACIONES</span></a>                
                </li>
                @endcan
            </ul>
        </li>
        @can('catalogos_view')
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="ft-folder"></i><span>CATÁLOGOS</span></a>
            <ul class="dropdown-menu">                                                        
             <li ><a class="dropdown-item" href="{{url('anexos/catalogo')}}" data-toggle=""><i class="ft-folder"></i><span>Anexos</span></a>
             </li>                                       
             <li ><a class="dropdown-item" href="{{url('decisiones/catalogo')}}" data-toggle=""><i class="ft-folder"></i><span>Decisiones</span></a>
             </li> 
             <li ><a class="dropdown-item" href="{{url('departamentos/catalogo')}}" data-toggle=""><i class="ft-folder"></i><span>Departamentos</span></a>
             </li>
             <li ><a class="dropdown-item" href="{{url('entidades/catalogo')}}" data-toggle=""><i class="ft-folder"></i><span>Entidades</span></a>
             </li>
             <li ><a class="dropdown-item" href="{{url('juzgados/catalogo')}}" data-toggle=""><i class="ft-folder"></i><span>Juzgados</span></a>
             </li>
             <li ><a class="dropdown-item" href="{{url('procesos/catalogo')}}" data-toggle=""><i class="ft-folder"></i><span>Procesos</span></a>
             </li>
         </ul>
     </li> 
     @endcan
 </ul>
</div>
</div>