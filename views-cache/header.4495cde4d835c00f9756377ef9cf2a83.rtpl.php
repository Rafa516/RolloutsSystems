<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rollouts Systems </title>
  <link href="/../res/user/img/icon.png" rel="icon">
  <!--style-->
  <link rel="stylesheet" href="/../res/user/css/style.css">
  <!--font-awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

  <!--bootstrap-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <!--magnific-popup-->
  <link rel="stylesheet" href="/../res/user/css/magnific-popup.css">

   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



</head>

<body>

  <input type="checkbox" id="check">
  <!--header area start-->
  <header>
    <label for="check">
      <i style="margin-left: -280px;" class="fas fa-bars" id="sidebar_btn"></i>

    </label>
    <div class="left_area">

      <center>
        <h3> ROLLOUTS SYSTEMS </h3>
        <center>

    </div>
    <div class="right_area">
      <a href="/usuario/logout" class="logout_btn">Sair</a>
    </div>
  </header>
  <!--header area end-->

  <!--mobile navigation bar start-->
  <div class="mobile_nav">
    <div class="nav_bar">

      <?php if( $usuario["foto"] == 0 ){ ?>
      <img src="/res/ft_perfil/ft_male.png" class="mobile_profile_image" alt="">
      <?php }else{ ?>
      <img src="/res/ft_perfil/<?php echo $usuario["foto"]; ?>" class="mobile_profile_image" alt="">
      <?php } ?>

      <b style="font-size: 17px;color: white;"><?php echo getUsuarioNome(); ?></b>
      <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
       <a href="/usuario/home"><i class="fas fa-home"></i><span>Home</span></a>
      <a href="/usuario/painel"><i class="fas fa-desktop"></i><span>Painel </span></a>
      
    <?php if( $usuario["localidade"] =='Brasília' ){ ?>
    <a href="/usuario/todos-rollouts-bsb"><i class="fas fa-th-list"></i><span>
        Rollouts</span></a>
    <?php } ?>

    <?php if( $usuario["localidade"] =='Brasília' ){ ?>
      <a href="/usuario/todos-termos-bsb"><i class="fas fa-tasks"></i><span>
          Termos</span></a>
      <?php } ?>


    <?php if( $usuario["localidade"] =='Brasília' ){ ?>
    <a href="/usuario/estoque-bsb"><i class="fa fa-table" ></i><span>
        Estoque </span></a>
    <?php } ?>


       <?php if( $usuario["localidade"] =='Brasília' ){ ?>
        <a href="/usuario/todos-documentos-bsb"><i class="fas fa-file" ></i><span>
        Documentos </span></a>
        <?php } ?>

      <a href="/usuario/perfil"><i class="fas fa-info-circle"></i><span>Perfil</span></a>
    </div>
  </div>
  <!--mobile navigation bar end-->

  <!--sidebar start-->
  <div class="sidebar">
    <div class="profile_info">

      <?php if( $usuario["foto"] == 0 ){ ?>
      <img src="/res/ft_perfil/ft_male.png" class="profile_image" alt="">
      <?php }else{ ?>
      <img src="/res/ft_perfil/<?php echo $usuario["foto"]; ?>" class="profile_image" alt="">
      <?php } ?>
      <h5 style="font-size: 18px;color: white;"><?php echo getUsuarioNome(); ?></h5>
    </div>
     <a href="/usuario/home"><i class="fas fa-home"></i><span>Home</span></a>
    <a href="/usuario/painel"><i class="fas fa-desktop"></i><span>Painel de Dados</span></a>
   

   <?php if( $usuario["localidade"] =='Brasília' ){ ?>
    <a href="/usuario/todos-rollouts-bsb"><i class="fas fa-th-list"></i><span>
        Rollouts</span></a>
    <?php } ?>

    <?php if( $usuario["localidade"] =='Brasília' ){ ?>
      <a href="/usuario/todos-termos-bsb"><i class="fas fa-tasks"></i><span>
          Termos</span></a>
      <?php } ?>



    <?php if( $usuario["localidade"] =='Brasília' ){ ?>
    <a href="/usuario/estoque-bsb"><i class="fa fa-table" ></i><span>
        Estoque </span></a>
    <?php } ?>


       <?php if( $usuario["localidade"] =='Brasília' ){ ?>
        <a href="/usuario/todos-documentos-bsb"><i class="fas fa-file" ></i><span>
        Documentos </span></a>
        <?php } ?>
       

    <a href="/usuario/perfil"><i class="fas fa-info-circle"></i><span>Perfil do Analista</span></a>
  </div>
  <!--sidebar end-->