<?php
  error_reporting(1);

  $hostname='localhost';
  $username='root';
  $password='admin';

  try {
    $conexao = new PDO("mysql:host=$hostname;dbname=cristoferdivo",$username,$password);
    //echo 'Connected to Database';

    foreach ($conexao->query($sql) as $row){
    }

    //$conexao = null;
  }catch(PDOException $e){
    echo $e->getMessage();
  };

?>
