<div class="span12">
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Olá, Cristofer!</strong> Seja Bem vindo ao <strong>Painel de Administrador</strong> !
    </div>
</div>

<div class="span12">
    <div id="target-1" class="widget">
        <div class="widget-content">
            <h1>Cristoferdivo-beta</h1>
            <p>Seja bem vindo ao painel de administrador, ele ainda está na versão de testes mas a administração dos posts ja está habilitada e algumas funções estão desativadas para tratamento, qualquer duvida consulte o manual do usuário </p>
        </div> <!-- /widget-content -->
    </div> <!-- /widget -->
</div><!-- span 12 -->

</div><!-- row -->

<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Últimos Posts</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>N°</td>
                    <th>Título da Postagem </th>
                    <th>DATA</th>
                    <th>Resumo</th>
                    <th class="td-actions"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('connect.php');
                require_once('limita-texto.php');
                $select = "SELECT * FROM  tb_postagens  ORDER BY Id DESC LIMIT 5";
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
                                <td> <?php echo limitarTexto($mostrar->descricao,$limite =100)?> </td>
                                <!--<td class="td-actions"><a href="home.php?acao=editar-postagens&id=<?php echo $mostrar-> Id;?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit"> </i></a>
                                <a href="home.php?delete=" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>-->
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <label> sem posts.</label>
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
