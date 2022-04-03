@extends('user.template')

@section('body')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cool Login form | Registrar-se</title>
  <link rel="stylesheet" href="style.css">
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="{{DIRCSS.'estilo.css'}}">
</head>
<body>
  <div class="wrapper">
    <h1>CADASTRO</h1>
    <p>Bem vindo!!</p>
    <form method="POST" action="{{DIRPAGE.'criar-conta'}}">
      <input type="text" name="nome"  placeholder="Teu Nome">
      <input type="email" name="email" placeholder="Email">
      <input type="password" name="senha" placeholder="senha">
      <button type="submit" name="add">Registrar-se</button>
    </form>
    <div class="not-member">
      Já tem uma conta? <a href="{{DIRPAGE.'entrar'}}">Faça Login</a>
    </div>
  </div><br>
</body>
</html>
@endsection