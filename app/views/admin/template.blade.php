<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{DIRBSCSS.'/bootstrap.min.css'}}">

    <link rel="stylesheet" href="{{DIRCSS.'admin_style.css'}}">
    <title>Painel de admin</title>
  </head>
  <body>

    @if($_SESSION['type_user'] != 0 or !isset($_SESSION['type_user']))
        {{redir('entrar', false)}}
    @endif


<header>
<div class="container-fluid">
    <div class="header-content">
        <div class="side-head">
            <span class="text-white">Painel Admin</span> &nbsp;
            <i class="fa-solid fa-bars menu-btn text-white"></i>
            <i class="fa-solid fa-arrow-right close-btn text-white"></i>
        </div>
        <div class="header-nav">
            <ul>
                <li><a href="{{DIRPAGE.'admin'}}"> <i class="fa-solid fa-house"></i>Painel </a></li>
                <li><a href="{{DIRPAGE.'admin-stock'}}"> <i class="fa-solid fa-truck"></i>Estoque</a></li>
                <li><a href="{{DIRPAGE.'admin-users'}}"> <i class="fa-solid fa-user"></i>Usuário</a></li>
                <li><a href="{{DIRPAGE.'admin-sair'}}"> <i class="fa-solid fa-right-from-bracket"></i> Sair </a></li>
            </ul>
        </div>
    </div>
</div>
</header>

<div class="wrapper">
    <section class="sidebar">
        <ul class="nav-bar">

            <li><a href="{{DIRPAGE.'admin'}}"><i class="fa-solid fa-gauge-high"></i> <span class="text-link"> PAINEL DO ADMIN </span></a></li>
            <li><a href="{{DIRPAGE.'admin-categorias'}}"><i class="fa-solid fa-plus"></i> <span class="text-link">CATEGORIAS</span></a></li>
            <li><a href="{{DIRPAGE.'admin-produtos'}}"><i class="fa-brands fa-product-hunt"></i><span class="text-link">PRODUTOS</span></a></li>
            <li><a href="{{DIRPAGE.'admin-stock'}}"><i class="fa-solid fa-boxes-stacked"></i><span class="text-link">ESTOQUE</span></a></li>
            <li><a href="{{DIRPAGE.'admin-sair'}}"><i class="fa-solid fa-right-from-bracket"></i> <span class="text-link">SAIR </span></a></li>

            
        </ul>
    </section>
    <section class="working-panel">
        <div class="container-fluid">



    @yield('body')





    <script src="https://kit.fontawesome.com/6e92735887.js"></script>
<!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="{{DIRBSJS.'jquery-slim.min.js'}}" ></script>
    <script src="{{DIRBSJS.'popper.min.js'}}" ></script>
    <script src="{{DIRBSJS.'bootstrap.min.js'}}" ></script>
    <script src="{{DIRJS.'main.js'}}"></script>
</body>
</html>