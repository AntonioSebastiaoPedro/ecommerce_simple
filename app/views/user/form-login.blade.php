@extends('user.template')

@section('body')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BHJVV E-commerce | Entrar</title>
  <link rel="stylesheet" href="{{DIRCSS.'estilo.css'}}">
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="{{DIRCSS.'estilo.css'}}">
</head>
<body>
  
  
  <div class="wrapper">
    <h1>Login</h1>
    <p>Bem vindo de volta</p>
    <form method="post" action="{{DIRPAGE.'login'}}">
      <input type="email" name="email" placeholder="EMAIL" required>
      <input type="password" name="senha" placeholder="SENHA" required>
      <button type="submit">Iniciar Sessão</button>
    </form>

    <div class="not-member">
      Ainda não é membro? <a href="{{DIRPAGE.'criar-conta'}}">Registre-se agora</a>
    </div>
  </div><br><br>

  @endsection