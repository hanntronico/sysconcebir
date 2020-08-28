<?php

session_start();
$login=$_SESSION[login];
$imguser=$_SESSION[imguser];
$iniuser=$_SESSION[iniuser];
$perfil=$_SESSION[perfil];

if ($perfil=="1"){ // Administrador
  $menu = "
    <li>
      <a href='panel'>
        <i class='fa fa-dashboard'></i> Bienvenido
      </a>
    </li>
    <li>
      <a href='filtrosedes'>
        <i class='fa fa-search'></i> Buscar Medicos por Sede
      </a>
    </li>
    <li>
      <a href='buscar-medicos'>
        <i class='fa fa-search'></i> Ver todos los Medicos 
      </a>
    </li>
    <li>
      <a href='citas'>
        <i class='fa fa-calendar'></i> Citas
      </a>
    </li>
    <li>
      <a href='pagos'>
        <i class='fa fa-money'></i> Pagos
      </a>
    </li>
    <li>
      <a href='horarios'>
        <i class='fa fa-list'></i> Horarios
      </a>
    </li>
    <li>
      <a href='medicos'>
        <i class='fa fa-user-md'></i> Médicos
      </a>
    </li>
    <li>
      <a href='pacientes'>
        <i class='fa fa-users'></i> Paciente
      </a>
    </li>
    <li>
      <a href='especialidades'>
        <i class='fa fa-list'></i> Especialidades
      </a>
    </li>
    <li>
      <a href='sedes'>
        <i class='fa fa-list'></i> Sedes
      </a>
    </li>
    <li>
      <a href='./?s=1'>
        <i class='fa fa-sign-out'></i> Salir
      </a>
    </li>
  ";
}else if ($perfil=="2"){ // Medicos
  $menu = "
    <li>
      <a href='panel'>
        <i class='fa fa-dashboard'></i> Bienvenido
      </a>
    </li>
    <li>
      <a href='citas'>
        <i class='fa fa-calendar'></i> Citas
      </a>
    </li>
    <li>
      <a href='pagos'>
        <i class='fa fa-money'></i> Pagos
      </a>
    </li>
    <li>
      <a href='horarios'>
        <i class='fa fa-list'></i> Horarios
      </a>
    </li>  
    <li>
      <a href='./?s=1'>
        <i class='fa fa-sign-out'></i> Salir
      </a>
    </li>
  ";
}else if ($perfil=="3"){ // Paciente
  $menu = "
    <li>
      <a href='panel'>
        <i class='fa fa-dashboard'></i> Bienvenido
      </a>
    </li>
    <li>
      <a href='buscar'>
        <i class='fa fa-search'></i> Buscar Medicos por Especialidad
      </a>
    </li>
    <li>
      <a href='buscar-medicos'>
        <i class='fa fa-search'></i> Ver todos los Medicos 
      </a>
    </li>
    <li>
      <a href='citas'>
        <i class='fa fa-calendar'></i> Mis Citas
      </a>
    </li> 
    <li>
      <a href='pagos'>
        <i class='fa fa-money'></i> Pagos
      </a>
    </li>  
    <li>
      <a href='./?s=1'>
        <i class='fa fa-sign-out'></i> Salir
      </a>
    </li>
  ";
}


?>
<style>
.sidebar-menu > li {
    background: transparent !important;
}
.skin-blue .sidebar a {
    color: green !important;
    font-size: 16px !important;
}
.callout.callout-info {
    border-color: green;
}
 .main-sidebar {
    border-right-width: 1px;
    border-color: green;
        border-right-color: green;
    border-right: 2px solid gray !important;
 }
.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: transparent !important;
    border-bottom: 1px solid green !important;
}
.btn-success {
    background-color: transparent !important;
    border-color: green !important;
    color: green !important;
}
.content-wrapper {
    background-color: transparent;
}
.callout h4 {
    color: green !important;
}
.fa {
    color: gray !important;
}

</style>
<aside class="main-sidebar">  
  <section class="sidebar">    
    <div class="user-panel">
      <center>        
        <a style="color: #FFF" href="#">
          <img src="arch/<?php echo $imguser;?>" class="img-circle img-logo" alt="<?php echo $login;?>" ><br>
          <?php echo $login;?> 

          <?php echo $perfil;?>
        </a>        
      </center>
    </div>
    <ul class="sidebar-menu" data-widget="tree">   
      <?php echo $menu;?>      
    </ul>
  </section>  
</aside>