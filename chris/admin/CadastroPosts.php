<?php
error_reporting(1);

require_once('connect.php');

if (isset($_POST['cadastrar']))
{
    $titulo    = trim(strip_tags($_POST['titulo']));
    $data      = trim(strip_tags($_POST['data']));
    $pagina_id = trim(strip_tags($_POST['categoria']));
    $exibir    = trim(strip_tags($_POST['exibir']));
    $descricao = $_POST['descricao'];

    $file 		= $_FILES['img'];
    $numFile	= count(array_filter($file['name']));

    //PASTA
    $uploadDir		= DIRECTORY_SEPARATOR . "uploads";

    if (!file_exists(__DIR__ . $uploadDir)) {
        mkdir(__DIR__ . $uploadDir, 0777, true);
    }

    //REQUISITOS
    $permite 	= array('image/jpeg', 'image/png');
    $maxSize	= 1024 * 1024 * 1;

    //MENSAGENS
    $msg		= array();
    $errorMsg	= array(
        1 => 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.',
        2 => 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML',
        3 => 'o upload do arquivo foi feito parcialmente',
        4 => 'Não foi feito o upload do arquivo'
    );
    if($numFile <= 0){
        echo '<div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Selecione alguma imagem!
        </div>';
    }else if($numFile >=2){
        echo '<div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Você ultrapassou o limite de upload. selecione apenas uma!
        </div>';

    }else{

        for($i = 0; $i < $numFile; $i++){
            $name 	= $file['name'][$i];
            $type	= $file['type'][$i];
            $size	= $file['size'][$i];
            $error	= $file['error'][$i];
            $tmp	= $file['tmp_name'][$i];

            $extensao = @end(explode('.', basename($name)));
            $novoNome = rand().".$extensao";

            if($error != 0)
                $msg[] = "<b>$name :</b> ".$errorMsg[$error];
            else if(!in_array($type, $permite))
                $msg[] = "<b>$name :</b> Erro imagem não suportada!";
            else if($size > $maxSize)
                $msg[] = "<b>$name :</b> Erro imagem ultrapassa o limite de 5MB";
            else{
                $destino = DIRECTORY_SEPARATOR . basename(__DIR__) . $uploadDir . DIRECTORY_SEPARATOR . $novoNome;

                if (move_uploaded_file($tmp, dirname(__DIR__) . $destino)){
                    $msg[] = "<b>$name :</b> Upload Realizado com Sucesso!";
                    $insert = "INSERT INTO tb_postagens (titulo, data, imagem, exibir, descricao, pagina_id) VALUES (:titulo, :data, :imagem, :exibir, :descricao, :pagina_id)";

                    try{
                        $result = $conexao -> prepare($insert);
                        $result -> bindParam(':titulo',$titulo,PDO::PARAM_STR);
                        $result -> bindParam(':data',$data,PDO::PARAM_STR);
                        $result -> bindParam(':imagem',$destino,PDO::PARAM_STR);
                        $result -> bindParam(':exibir',$exibir,PDO::PARAM_STR);
                        $result -> bindParam(':descricao',$descricao,PDO::PARAM_STR);
                        $result -> bindParam(':pagina_id',$pagina_id,PDO::PARAM_STR);
                        $result -> execute();

                        $contar = $result -> rowCount();

                        if ($contar > 0)
                        {
                            echo '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <label><strong>SUCESSO!</strong> o post foi cadastrado</label>
                            </div>';
                        }
                        else
                        {
                            echo '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <label><strong>ERRO!</strong> um erro ocorreu.</label>
                            </div>';
                        }

                    }catch(Exception $e){
                        echo $e;
                    }
                }
                else
                {
                    $msg[] = "<b>$name :</b> Desculpe! Ocorreu um erro...";
                }
            }
        }
    }

    foreach($msg as $pop)
    echo $pop . '<br>';
}

function alertJS($msg){
    echo "<script type='text/javascript'>
    alert('$msg');
    </script>";
}

?>

<div class="widget widget-table action-table">
    <div class="widget-header">
        <i class="icon-th-list"></i>
        <h3>CADASTRAR POSTAGENS</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">

        <div class="tab-pane" id="formcontrols" style="padding-top: 20px;">
            <form id="edit-profile" class="form-horizontal" method="post" enctype="multipart/form-data" action="#">
                <div class="control-group">
                    <label class="control-label" for="username">Título da postagem</label>
                    <div class="controls">
                        <input type="text" class="span6 disabled" id="username" name="titulo" value="">
                        <!--  <p class="help-block">Your username is for logging in and cannot be changed.</p>-->
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->

                <div class="control-group">
                    <label class="control-label" for="firstname">Data</label>
                    <div class="controls">
                        <input type="text" class="span6" id="date"  name="data" value="">
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->

                <div class="control-group">
                    <label class="control-label" for="lastname">Imagem</label>
                    <div class="controls">
                        <input type="file" class="span6 fileinput" id="imagem"  value="" name="img[]">
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->

                <div class="control-group">
                    <label class="control-label" for="username">Categoria</label>
                    <div class="controls">
                        <select class="span2" id="categoria" name="categoria">
                            <option value="1">Sobre</option>
                            <option value="2">Music</option>
                            <option value="3">Cooking</option>
                            <option value="4">Poosh Life</option>
                            <option value="5">Fashion</option>
                        </select>
                        <!--  <p class="help-block">Your username is for logging in and cannot be changed.</p>-->
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->

                <div class="control-group">
                    <label class="control-label" for="username">Exibir</label>
                    <div class="controls">
                        <select class="span2" id="exibir" name="exibir">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                        <!--  <p class="help-block">Your username is for logging in and cannot be changed.</p>-->
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->

                <div class="control-group">
                    <label class="control-label" for="email">Descrição</label>
                    <div class="controls">
                        <textarea class="span8" name="descricao" id="email" rows="15 " value=""></textarea>
                    </div> <!-- /controls -->
                </div> <!-- /control-group -->

                <div class="form-actions">
                    <input type ="submit" name="cadastrar"class="btn btn-primary" value="salvar">
                    <input type="reset" class="btn" value="cancelar">
                </div>

            </form><!-- /form-actions -->

        </div>
    </div>

</div>

<script type= "text/javascript">
jQuery(function($){
    $("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
});
</script>

<script type="text/javascript" src="Editor/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
