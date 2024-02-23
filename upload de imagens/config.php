<?php
  $dbHost = 'localhost';
  $dbUsername = 'root';
  $dbPassword = 'root';
  $dbName = 'Imobiriaria_s';


  $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName,);

  if($conexao->connect_errno){
    echo "Erro";
  }
  else {
    echo "Sucesso";
  }


?>