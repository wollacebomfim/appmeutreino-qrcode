<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
// Array with names
session_start();
include_once './conexao/conexao.php';


$tag = $_GET['tag'];

if ($tag !="") {


  date_default_timezone_set('America/Recife'); 
  $date= date('Y-m-d H:i:s');
  
  


  $querySelect = $conexao->query("SELECT * FROM usuarios WHERE email = '$tag'");
  $queryVerifica = mysqli_fetch_assoc($querySelect);

  if($queryVerifica >=1){
  
      $querySelect2 = $conexao->query("SELECT * FROM usuarios WHERE email = '$tag'");
      $dados = mysqli_fetch_array($querySelect2);
  
  
      $id_atleta = $dados['id'];
      $id_academia = $dados['id_academia'];
      $nome = $dados['nome'];
      $graduacao = $dados['graduacao'];
      $status = "Presente";
      $tag = $dados['tag'];
      $foto =$dados['foto'];
      
      
          $queryInsert = $conexao->query("INSERT INTO treinos VALUES (default, '$id_atleta', '$id_academia', '$nome', '$graduacao', '$status', '$tag', '$foto','$date')");
          $queryAtualiza = $conexao->query("UPDATE usuarios SET ultimo_treino = '$date' WHERE id = '$id_atleta'");
      if($queryInsert > 0){
        echo '<div class="alert alert-success"><strong>Success!</strong>Presença confirmada</div>'+date('l jS \of F Y h:i:s A');
          header('Location: index.php');
          $conexao->close();
          exit;
      }else{

          //echo "deu merda";
          //echo $date;
          $conexao->close();
          exit;
      }
  }else{
      $conexao->close();
      exit;
  }
}

?>