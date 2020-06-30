<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
 
         
        <img src="<?php echo base_url()."assets/img/tecpat.PNG"; ?>" height = '70px' width: 'auto' />
     

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
 
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
       <span style="font-size: 15px " >Gestion Activo Fijo</span> 
      </div>

      <!-- Nav Item - Catalogo -->
      <li class="nav-item <?= $this->uri->segment(1) == 'sedes' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'usuarios' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'locales' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'areas' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'oficinas' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'proveedores' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'tiposdocumento' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'cuentascontable' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'estadosbien' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'condicionesbien' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'origenesbien' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'procedenciasbien' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'motivosbaja' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'familias' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'subfamilias' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'motivostraslado' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'centroscosto' ? 'active' : ''; ?>
      
      <?= $this->uri->segment(1) == 'colores' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'contratos' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'bancos' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'proyectos' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'edificios' ? 'active' : ''; ?>
      <?= $this->uri->segment(1) == 'pisos' ? 'active' : ''; ?>

      ">
     
      
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-book-open"></i>
          <span>Catálogo</span>
        </a>
        <div id="collapseTwo" class="collapse  
        <?= $this->uri->segment(1) == 'usuarios' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'locales' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'areas' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'oficinas' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'proveedores' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'tiposdocumento' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'cuentascontable' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'estadosbien' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'condicionesbien' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'origenesbien' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'procedenciasbien' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'motivosbaja' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'familias' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'subfamilias' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'motivostraslado' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'centroscosto' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'colores' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'contratos' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'bancos' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'proyectos' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'edificios' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'pisos' ? 'show' : ''; ?>

        <?= $this->uri->segment(1) == 'sedes' ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item <?= $this->uri->segment(1) == 'usuarios' ? 'active' : ''; ?>" href="<?php echo base_url('usuarios')?>"  style="font-size:  10px;">Responsables</a>
            
            <a href="<?=base_url('sedes')?>" class="collapse-item  <?= $this->uri->segment(1) == 'sedes' ? 'active' : ''; ?>" style="font-size:10px;"> Sedes</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'locales' ? 'active' : ''; ?>" href="<?=base_url('locales')?>" style="font-size:  10px;">Local</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'areas' ? 'active' : ''; ?>" href="<?=base_url('areas')?>" style="font-size:  10px;">Area</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'oficinas' ? 'active' : ''; ?>" href="<?=base_url('oficinas')?>" style="font-size:  10px;">Oficina</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'proveedores' ? 'active' : ''; ?>" href="<?=base_url('proveedores')?>" style="font-size:  10px;">Proveedor</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'tiposdocumento' ? 'active' : ''; ?>" href="<?=base_url('tiposdocumento')?>" style="font-size:  10px;">Tipo Documento</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'cuentascontable' ? 'active' : ''; ?>" href="<?=base_url('cuentascontable')?>" style="font-size:  10px;">Cuenta Contable</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'estadosbien' ? 'active' : ''; ?>" href="<?=base_url('estadosbien')?>" style="font-size:  10px;">Estado Bien</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'condicionesbien' ? 'active' : ''; ?>" href="<?=base_url('condicionesbien')?>" style="font-size:  10px;">Condicion del Bien</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'origenesbien' ? 'active' : ''; ?>" href="<?=base_url('origenesbien')?>" style="font-size:  10px;">Origen Bien</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'procedenciasbien' ? 'active' : ''; ?>" href="<?=base_url('procedenciasbien')?>" style="font-size:  10px;">Procedencia Bien</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'motivosbaja' ? 'active' : ''; ?>" href="<?=base_url('motivosbaja')?>" style="font-size:  10px;">Motivo de Baja</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'familias' ? 'active' : ''; ?>" href="<?=base_url('familias')?>" style="font-size:  10px;">Familia</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'subfamilias' ? 'active' : ''; ?>" href="<?=base_url('subfamilias')?>" style="font-size:  10px;">Sub Familia</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'motivostraslado' ? 'active' : ''; ?>" href="<?=base_url('motivostraslado')?>" style="font-size:  10px;">Motivo de Traslado</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'centroscosto' ? 'active' : ''; ?>" href="<?=base_url('centroscosto')?>" style="font-size:  10px;">Centro de Costo</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'colores' ? 'active' : ''; ?>" href="<?=base_url('colores')?>" style="font-size:  10px;">Colores</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'contratos' ? 'active' : ''; ?>" href="<?=base_url('contratos')?>" style="font-size:  10px;">Contratos Leasing</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'bancos' ? 'active' : ''; ?>" href="<?=base_url('bancos')?>" style="font-size:  10px;">Bancos</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'proyectos' ? 'active' : ''; ?>" href="<?=base_url('proyectos')?>" style="font-size:  10px;">Proyectos</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'edificios' ? 'active' : ''; ?>" href="<?=base_url('edificios')?>" style="font-size:  10px;">Edificios</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'pisos' ? 'active' : ''; ?>" href="<?=base_url('pisos')?>" style="font-size:  10px;">Piso</a>
            

          </div>
        </div>
      </li>

      <!--Nav Item Gestion-->
      <li class="nav-item <?= $this->uri->segment(1) == 'bienes' ? 'active' : ''; ?>"  >
        <a class="nav-link collapsed" href="<?php echo base_url()."assets/"; ?>#" data-toggle="collapse" data-target="#collapsegestion" aria-expanded="true" aria-controls="collapsegestion">
          <i class="fas fa-user-clock"></i>
          <span>Gestión</span>
        </a>
        <div id="collapsegestion" class="collapse <?= $this->uri->segment(1) == 'bienes' ? 'show' : ''; ?>" aria-labelledby="headinggestion" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url()."assets/"; ?>utilities-color.html" style="font-size:  10px;">Inversion</a>
            <a id="accordionbienes" class="collapse-item"  href="#" data-toggle="collapse" data-target="#collapsebienes1" aria-expanded="true" aria-controls="collapsebienes" style="font-size:  10px;"> <span>Bienes</span></a>

                <div id="collapsebienes1" class="collapse <?= $this->uri->segment(1) == 'bienes' ? 'show' : ''; ?>"  aria-labelledby="headingbien" data-parent="#accordionbienes">
                     <div  class="bg-white py-2 collapse-inner2 rounded">
                        <a class="collapse-subitem <?= $this->uri->segment(1) == 'bienes' ? 'active' : ''; ?>"  href="<?php echo base_url('bienes')?>" style="font-size:  10px;" >Incorporacion</a>
                        <a class="collapse-subitem <?= $this->uri->segment(1) == 'consultas' ? 'active' : ''; ?>"  href="<?php echo base_url('bienes')?>" style="font-size:  10px;" >Consultas</a>
                        <a class="collapse-subitem <?= $this->uri->segment(1) == 'mejoras' ? 'active' : ''; ?>"  href="<?php echo base_url('mejoras')?>" style="font-size:  10px;" >Mejoras</a>
                        <a class="collapse-subitem <?= $this->uri->segment(1) == 'traslados' ? 'active' : ''; ?>"  href="<?php echo base_url('bienes')?>" style="font-size:  10px;" >Traslados</a>
                        <a class="collapse-subitem <?= $this->uri->segment(1) == 'bajas' ? 'active' : ''; ?>"  href="<?php echo base_url('bienes')?>" style="font-size:  10px;" >Bajas</a>
                        <a class="collapse-subitem <?= $this->uri->segment(1) == 'ajustes' ? 'active' : ''; ?>"  href="<?php echo base_url('ajuste')?>" style="font-size:  10px;" >Ajustes</a>
                        <a class="collapse-subitem <?= $this->uri->segment(1) == 'impresion' ? 'active' : ''; ?>"  href="<?php echo base_url('bienes')?>" style="font-size:  10px;" >Impresion</a>
                         <a class="collapse-subitem <?= $this->uri->segment(1) == 'reclasificacion' ? 'active' : ''; ?>"  href="<?php echo base_url('bienes')?>" style="font-size:  10px;" >Reclasificacion</a>
                     </div>
                </div>
 
            <a class="collapse-item" href="<?php echo base_url()."assets/"; ?>utilities-animation.html" style="font-size:  10px;">Revaluacion</a>
             
          </div>
        </div>
      </li>

      <!--Nav Item Inventarios-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url()."assets/"; ?>#" data-toggle="collapse" data-target="#collapseInventarios" aria-expanded="true" aria-controls="collapseInventarios">
          <i class="fas fa-people-carry"></i>
          <span>Inventarios</span>
        </a>
        <div id="collapseInventarios" class="collapse" aria-labelledby="headingInventarios" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url()."assets/"; ?>utilities-color.html" style="font-size:  10px;">Toma de Inventarios</a>
            <a class="collapse-item" href="<?php echo base_url()."assets/"; ?>utilities-border.html" style="font-size:  10px;">Reporte</a>
                         
          </div>
        </div>
      </li>


      <!--Nav Item Procesos-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url()."assets/"; ?>#" data-toggle="collapse" data-target="#collapseProcesos" aria-expanded="true" aria-controls="collapseProcesos">
          <i class="fas fa-cogs"></i>
          <span>Procesos</span>
        </a>
        <div id="collapseProcesos" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('depreciacion');?>" style="font-size:  10px;">Depreciación</a>
            <a class="collapse-item" href="<?php echo base_url()."assets/"; ?>utilities-border.html" style="font-size:  10px;">Ajustes por Dif. de Cambio</a>
            <a class="collapse-item" href="<?php echo base_url()."assets/"; ?>utilities-color.html" style="font-size:  10px;">Cierre/Apertura Mensual</a>
            <a class="collapse-item" href="<?php echo base_url()."assets/"; ?>utilities-color.html" style="font-size:  10px;">Cierre/Apertura del Ejercicio</a>

          </div>
        </div>
      </li>


      <!--Nav Item Reportes-->
      <li class="nav-item <?= $this->uri->segment(1) == 'reporte' ? 'active' : ''; ?>" >
        <a class="nav-link collapsed" href="<?php echo base_url()."assets/"; ?>#" data-toggle="collapse" data-target="#collapseReportes" aria-expanded="true" aria-controls="collapseReportes">
          <i class="far fa-registered"></i>
          <span>Reportes</span>
        </a>
        <div id="collapseReportes"   class="collapse  <?= $this->uri->segment(1) == 'reporte' ? 'show' : ''; ?>" aria-labelledby="headingReportes" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
      

            <a id="accordionadministrativo" class="collapse-item"   href="#" data-toggle="collapse" data-target="#collapseadministrativo" aria-expanded="true" aria-controls="collapseadministrativo" style="font-size:  10px;"> <span>Administrativos</span></a>



            <!-- aca es-->


               <div id="collapseadministrativo" class="collapse <?= $this->uri->segment(1) == 'reporte' && $this->uri->segment(2) != 'sunat' ? 'show' : ''; ?>"  aria-labelledby="headingbien" data-parent="#accordionadministrativo">
                    <div  class="bg-white py-2 collapse-inner2 rounded">
                    <a class="collapse-subitem <?= $this->uri->segment(1) == 'reporte'  && $this->uri->segment(2) == 'administrativo_activofijogeneral' ? 'active' : ''; ?>" href="<?php echo base_url('reporte/administrativo_activofijogeneral'); ?>" style="font-size:  10px;">Activos Fijos General</a>
                        <a class="collapse-subitem  <?= $this->uri->segment(1) == 'reporte'  && $this->uri->segment(2) == 'administrativo_activofijoctacontable' ? 'active' : ''; ?>"  href="<?php echo base_url('reporte/administrativo_activofijoctacontable')?>" style="font-size:  10px;" >Activos Fijos por Cta.Contable</a>
                        <a class="collapse-subitem <?= $this->uri->segment(1) == 'reporte'  && $this->uri->segment(2) == 'administrativo_activofijomejora' ? 'active' : ''; ?>"  href="<?php echo base_url('reporte/administrativo_activofijomejora')?>" style="font-size:  10px;" >Activos Fijos con Mejoras</a>
                        <a class="collapse-subitem <?= $this->uri->segment(1) == 'reporte'  && $this->uri->segment(2) == 'administrativo_activofijobaja' ? 'active'  : ''; ?>"  href="<?php echo base_url('reporte/administrativo_activofijobaja')?>" style="font-size:  10px;" >Activos Fijos de Baja</a>
                        <a class="collapse-subitem <?= $this->uri->segment(1) == 'reporte'  && $this->uri->segment(2) == 'administrativo_rptgeneralmovimiento' ? 'active' : ''; ?>"  href="<?php echo base_url('reporte/administrativo_rptgeneralmovimiento')?>" style="font-size:  10px;" >Rep. General de Movimientos</a>
              
                    </div>


               </div>
            <a class="collapse-item <?= $this->uri->segment(1) == 'reporte'  && $this->uri->segment(2) == 'sunat' ? 'active' : ''; ?>" href="<?php echo base_url('reporte/sunat');?>" style="font-size:  10px;">Sunat</a>

        </div>
      </div>
      </li>


      <!--Nav Item Configuracion-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url()."assets/"; ?>#" data-toggle="collapse" data-target="#collapseConfiguracion" aria-expanded="true" aria-controls="collapseConfiguracion">
          <i class="fas fa-upload"></i>
          <span>Configuración</span>
        </a>
        <div id="collapseConfiguracion" class="collapse  
        <?= $this->uri->segment(1) == 'usuarios' ? 'show' : ''; ?>
        <?= $this->uri->segment(1) == 'importarmaestro' ? 'show' : ''; ?>


      <?= $this->uri->segment(1) == 'sedes' ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url()."assets/"; ?>utilities-color.html" style="font-size:  10px;">Configuración General</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'importarmaestro' ? 'active' : ''; ?>" href="<?=base_url('importarmaestro')?>" style="font-size:  10px;">Importar Maestros</a>
            <a class="collapse-item <?= $this->uri->segment(1) == 'edificios' ? 'active' : ''; ?>" href="<?=base_url('edificios')?>" style="font-size:  10px;">Edificios</a>
            <a class="collapse-item" href="<?php echo base_url()."assets/"; ?>utilities-animation.html" style="font-size:  10px;">Incorporación de Bienes Mensual</a>
             
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
      <span style="font-size: 15px " > Administracion</span>
      </div>

 
      <!--Nav Item Usuarios-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url()."assets/"; ?>#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUsuarios">
          <i class="fas fa-users"></i>
          <span>Usuarios</span>
        </a>
        <div id="collapseUsuarios" class="collapse" aria-labelledby="headingUsuarios" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url()."assets/"; ?>utilities-color.html" style="font-size:  10px;">Creación de ¨Perfiles</a>
            <a class="collapse-item" href="<?php echo base_url()."assets/"; ?>utilities-border.html" style="font-size:  10px;">Creacion de Usuarios</a>
 
             
          </div>
        </div>
      </li>




      <!-- Nav Item - tipo de cambio -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."assets/"; ?>charts.html">
          <i class="far fa-money-bill-alt"></i>
          <span>Tipo de Cambio</span></a>
      </li>
 
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->