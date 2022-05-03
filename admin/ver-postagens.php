

<div class="widget widget-table action-table">
<div class="widget-header"> <i class="icon-th-list"></i>
  <h3>Últimos Posts</h3>
</div>
<!-- /widget-header -->
<div class="widget-content">
<?php
    require_once('connect.php');
//excluir
if(isset($_GET['delete'])){
$id_delete = $_GET['delete'];
//seleciona a imagem
$seleciona ="SELECT *from tb_postagens WHERE Id =:id_delete";

try{

    $result = $conexao -> prepare($seleciona);

    $result -> bindParam('id_delete',$id_delete,PDO::PARAM_INT);
    $result -> execute();
    $contar = $result -> rowCount();

    if ($contar > 0){
        $loop=$result ->fetchAll();
        foreach($loop as $exibir){}
    //$fotodeleta = $exibir ['imagem'];
    //$arquivo=" chris/upload/".$fotodeleta;
    //$unlink($arquivo);

    $seleciona ="DELETE from tb_postagens WHERE Id =:id_delete";

   try{

        $result = $conexao -> prepare($seleciona);

        $result -> bindParam('id_delete',$id_delete,PDO::PARAM_INT);
        $result -> execute();
        $contar = $result -> rowCount();

        if ($contar > 0){

            echo '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <label><strong>SUCESSO!</strong> o post foi excluido</label>
            </div>';

        }
        else{
            echo '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <label><strong>ERRO!</strong> post nao exlcuido</label>
            </div>';
        }


}catch(PDOWException $erro){echo $erro;}

}

}catch(PDOWException $erro){echo $erro;}

}




?>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
          <td>N°</td>
        <th> Título da Postagem </th>
        <th> DATA</th>
        <th> IMAGEM</th>
        <th>CATEGORIA</th>
        <th> EXIBIÇÃO</th>
        <th> Resumo</th>
        <th class="td-actions"> </th>
      </tr>
    </thead>
    <tbody>
        <?php
        require_once('connect.php');
        require_once('limita-texto.php');

        if(empty($_GET['pg'])){}else {$pg= $_GET['pg'];}




        if(isset($pg)){$pg=$_GET['pg'];}else{$pg=1;}
        if(isset($_POST['palavra-busca'])){$quantidade =10000;}
            else{$quantidade =3;}

        $inicio = ($pg*$quantidade) - $quantidade;

         if(isset($_POST['palavra-busca'])){$busca= addslashes($_POST['palavra-busca']);
     $select = "SELECT * FROM tb_postagens tb1 INNER JOIN tb_pagina tb2 ON tb1.pagina_id = tb2.pagina_id WHERE titulo LIKE '%$busca%' ORDER BY id DESC LIMIT $inicio, $quantidade";
     }else{
       $select = "SELECT * FROM tb_postagens tb1 INNER JOIN tb_pagina tb2 ON tb1.pagina_id = tb2.pagina_id ORDER BY id DESC LIMIT $inicio, $quantidade";
     }



        $contagem =0;

        try{
            $result = $conexao -> prepare($select);

            $result -> execute();

            $contar = $result -> rowCount();

            if ($contar > 0){
              while($mostrar= $result->FETCH(PDO::FETCH_OBJ)){
                  ?>
                  <tr>
                      <td><?php  echo $contagem++;?></td>
                    <td> <?php echo $mostrar->titulo;?> </td>
                    <td> <?php echo $mostrar->data;?> </td>
                    <!-- <td><img src="<?php echo $mostrar->imagem;?>" width="50px"></td>  -->
                    <td><img src="\chris\<?php echo $mostrar->imagem;?>" width="50px"></td>
                    <td><?php echo $mostrar->pagina_nome;?></td>
                    <td> <?php echo $mostrar->exibir;?> </td>
                    <td> <?php echo limitarTexto($mostrar->descricao,$limite =100)?> </td>
                    <td class="td-actions"><a href="home.php?acao=editar-postagens&id=<?php echo $mostrar-> Id;?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit"> </i></a>
                    <a href="home.php?acao=ver-postagens&pg=<?php echo $pg;?>&delete=<?php echo $mostrar-> Id;?>" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>

                  </tr>
           <?php
              }
              }
            else
            {
                echo '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <label><strong>ERRO!</strong> sem cadastro.</label>
                </div>';
            }

        }catch(Exception $e){
            echo $e;
        }
        ?>



    </tbody>
  </table>
</div>
<!-- /widget-content -->

<!-- inicio botoes>
<-->
<?php
if(isset($_post['palavra-busca'])){$busca=$_post['palavra-busca'];
$sql = "SELECT * FROM tb_postagens tb1 INNER JOIN tb_pagina tb2 ON tb1.pagina_id = tb2.pagina_id WHERE titulo LIKE '%$busca%'" ;
}else{
$sql = "SELECT*from tb_postagens";
}


try{
    $result = $conexao -> prepare($sql);
    $result -> execute();
    $totalRegistros = $result -> rowCount();

}catch(Exception $e){
echo $e;
}
if($totalRegistros <= $quantidade){}
else{
$paginas = ceil($totalRegistros/$quantidade);
if($pg>$paginas){echo '<script language= "JavaScript">location.href="home.php?acao=ver-postagens";</script>';}
$links =5;//responsavel pelo numeord e exibição dos botões

if(isset($i)){}
else{$i='1';}
?>
<div class="paginas">
    <a href="home.php?acao=ver-postagens&pg"> primeira pagina </a>
    <?php
    if(isset($_GET['pg'])){$num_pg = $_GET['pg'];}
    for ($i=$pg-$links; $i<= $pg-1;$i++){

        if($i<1){}
            else{
                 ?>
            <a href="home.php?acao=ver-postagens&pg=<?php echo $i; ?>" class= ="ativo"><?php echo $i;?></a>
<?php  } } ?>
<a href="#" class="ativo"><?php echo $pg ?></a>

<?php
    for ($i=$pg+1; $i<= $pg+$links;$i++){
   if($i>$paginas){}
else{
?>

<a href="home.php?acao=ver-postagens&pg=<?php echo $i; ?> "class="ativo"><?php echo $i; ?></a>
<?php  } } ?>
<a href="home.php?acao=ver-postagens&pg=<?php echo $paginas; ?> "class="ativo">Ultima pagina</a>

</div><!--paginação-->
<?php  } ?>
</div>
<!-- /widget -->

</div>
<!-- /span6 -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /main-inner -->
</div>
<!-- /main -->
