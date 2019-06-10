<?php
require_once("admin/connect.php");
require_once("admin/limita-texto.php");
?>



<body>

<!-----start-about---->

	<div id=conteudocentral>
		<div id="about"  class="about sobre">
			<!--<script src="//assets.juicer.io/embed.js" type="text/javascript"></script>-->
			<?php
			$sql ="SELECT * FROM tb_postagens WHERE exibir='1' AND pagina_id = '1'";

			try{
				$resultado = $conexao -> prepare($sql);
				$resultado -> execute();
				$contar= $resultado->rowCount();

				if($contar=1){
					while($exibe = $resultado-> fetch(PDO::FETCH_OBJ))
					{
						?>
						<div class="container">
							<h3><b style="margin-left: 1%; color: black;"><?php echo $exibe->titulo;?></b></h3>
							<div class="col-sm-6">

								<p><?php echo limitarTexto($exibe->descricao,$limite=500);?>
								</p>
								<h3><b style="font-size: 60%;margin-left: -1%"> <i><a href="#">   < VOLTAR </a></i></b></h3>
							</div>

							<div class="col-sm-6">
								<a hrefim="#" id="Dsppear"><img src="<?php echo $exibe-> imagem;?>" style="width: 60%;"></img></a>

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
			<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>

		<script src="js/jquery.min.js">
		</script>

		<!--<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>-->

		<script type="text/javascript" src="resources/js/jquery/jquery-1.10.2.min.js" >
		</script>

		<!-- Função Abrir Conteudo em div -->
		<script type="text/javascript">
		$(document).ready(function(){
			$("#menu a").click(function( e ){
				e.preventDefault();
				var href = $( this ).attr('href');
				$("#conteudocentral").load( href +" #conteudocentral");
			});
		});
		</script>

		<!--webfonts---->

		<!--//webfonts---->
		<!--start-top-nav-script-->
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
