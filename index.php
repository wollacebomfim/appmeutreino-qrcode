<?php 
session_start();
include_once './includes/head.php';

?>

<html>
</div> 
<body>
</div> 




</nav>
</ul>

<form action="logando.php" method="POST">
<br><br>
<div class="row">
<div class="col s12 m4 offset-m4">
<div class="card">
<div class="card-action white lighten-1 black-text">
<center><h6> Login QRCODE </br></h6><br>

<img src="img/checkmat-recife.jpg" alt="checkmat-recife" width="100" height="100">
</center>
</div>

<?php if(isset($_SESSION['nao_autenticado'])): ?>
<div class="notification is-danger">
<center><p class='center red-text'> Usuário ou senha incorretos!</p></center>
</div>
<?php endif; unset($_SESSION['nao_autenticado']); ?>


<?php if(isset($_SESSION['nao_autorizado'])): ?>
<div class="notification is-danger">
<center><p class='center brown-text'> Usuário nao tem previlegios para acessar.</p></center>
</div>
<?php endif; unset($_SESSION['nao_autorizado']); ?>


<center>
<div class="card-content">
<div class="form-field">
<label for="usuario">E-mail</label>
<input name="usuario" type="text"   placeholder="" autofocus required>
</div><br>


<div class="form-field">
<label for="senha">Senha</label>
<input name="senha" type="password"   placeholder="" required >
</div><br>
<center>


<button type="submit" class="btn-small black">Entrar</button> 

<a href="./paginas/cadastro.php"class="btn-small red">Cadastre-se</a></br></br>
<a href="../paginas/recPass.php">Esqueci minha senha</a><br>



<br>

</body>
</html>


