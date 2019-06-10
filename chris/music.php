<?php
require_once("admin/connect.php");
require_once("admin/limita-texto.php");
?>
<body>
	<div id="conteudocentral">
		<div id="about" class="about sobre">
			<div class="container">
				<div class="row" style= "margin-bottom:10%">
					<a href="#" id="pull" >
						<img src="images/layermusic.png" title="menu" id="Dsppear" style="width: 30%;margin-left: 30%" />
					</a>

					</form>
				</div>
				<?php
				if(empty($_GET['pg'])){}
				else{
				$pg =$_GET['pg'];
				if(!is_numeric($pg)){

					echo '<script language= "JavaScript">
									location.href="music.php";
						</script>';
				}

				}
				if(isset($pg)){ $pg = $_GET['pg'];}else{ $pg = 1;}

				$quantidade = 3;
				$inicio = ($pg*$quantidade) - $quantidade;



				$sql ="SELECT * FROM tb_postagens WHERE exibir='1' AND pagina_id = '2'  ORDER BY id DESC LIMIT $inicio, $quantidade";

				try{
					$resultado = $conexao -> prepare($sql);
					$resultado -> execute();
					$contar= $resultado->rowCount();

					if($contar>0){
						while($exibe = $resultado-> fetch(PDO::FETCH_OBJ))
						{
							?>

							<div >
								<div class="panel-body panel panel-default">
									<div class="col-sm-5">
										<a >
											<img src="<?php echo $exibe-> imagem;?>" style="width: 100%; margin-bottom: 2%;"/>
										</a>
									</div>
									<h3 >
										<b style="color: black;">
                                              <?php echo $exibe->titulo;?>
										</b>
									</h3>
									<div class="col-sm-7">
										<p ><?php echo limitarTexto($exibe->descricao,$limite=500);?>
										</p>

										<h3><b style="font-size: 60%;margin-left: -1%"> <i><a href="ps.php?id=<?php echo $exibe-> Id;?>&titulo =<?php echo $exibe->titulo;?>"> LEIA MAIS  <a href="#" style="margin-left: 65%">  <?php echo $exibe->data;?> </a>  </a></i></b></h3>
									</div>
								</div>
							</div>

							<?php
						}
					}
					else{
						echo 'nada cadastrado';
					}
				}
				catch(Exception $erro) {
					echo $erro->getMessage();
				}
				?>
			</div>
		    </div>
		    </div>

	<style>
	/* paginacao */

	.paginas{width:100%;padding:10px 0;text-align:center;background:#fff;height:auto;margin:10px auto;}
	.paginas a{width:auto;padding:4px 10px;background:#eee;color:#333;margin:0px 2.5px;text-decoration:none;font-family:tahoma, "Trebuchet Ms", arial;font-size:13px; }
	.paginas a:hover{text-decoration:none;background:#00BA8B; color:#fff;}

	<?php
		if(isset($_GET['pg'])){
			$num_pg = $_GET['pg'];
		}else{$num_pg = 1;}
	?>

	.paginas a.ativo<?php echo $num_pg;?>{background:#00BA8B; color:#fff;}

	</style>
	<?php
	$sql = "SELECT * from tb_postagens WHERE exibir='1' AND pagina_id = '2' ";
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
	if($pg>$paginas){echo '<script language= "JavaScript">location.href="music.php";</script>';}
	$links =5;//responsavel pelo numeord e exibição dos botões

	if(isset($i)){}
	else{$i='1';}
	?>
	<div class="paginas">

		<a href="index.php?acao=music&pg=1">Primeira Página</a>

	    <?php
			if(isset($_GET['pg'])){
				$num_pg = $_GET['pg'];
			}

			for($i = $pg-$links; $i <= $pg-1; $i++){
				if($i<=0){}
				else{
		?>

	    <a href="index.php?acao=music&pg=<?php echo $i;?>"  class="ativo<?php echo $i;?>"><?php echo $i;?></a>


	<?php  }} ?>


	    <a href="index.php?acao=music&pg= <?php echo $pg;?>" class="ativo<?php echo $i;?>"><?php echo $pg;?></a>


	<?php
		for($i = $pg+1; $i <= $pg+$links; $i++){
			if($i>$paginas){}
			else{
	?>

		<a href="index.php?acao=music&pg=<?php echo $i;?>" class="ativo<?php echo $i;?>"><?php echo $i;?></a>

	<?php
			}
		}
	?>

	<a href="index.php?acao=music&pg=<?php echo $paginas;?>">Última página</a>



	</div><!-- paginas -->
<?php  } ?>


<!--start-top-nav-script---->
<script>
$(function() {
	var pull 		= $('#pull');
	menu 		= $('nav ul');
	menuHeight	= menu.height();
	$(pull).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
});
</script>

</body>
</html>
