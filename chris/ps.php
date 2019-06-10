
<?php
require_once("admin/connect.php");
require_once("admin/limita-texto.php");

if(isset($_GET ['id'])){
	$idUrl= $_GET['id'];
}

try{
	$query = "SELECT pagina_nome FROM tb_pagina WHERE pagina_id = (SELECT pagina_id FROM tb_postagens WHERE exibir='1' AND Id=:id LIMIT 1)";
	$r = $conexao -> prepare($query);
	$r -> bindParam('id',$idUrl,PDO::PARAM_INT);
	$r -> execute();

	if($r->rowCount() > 0){
		$nomePagina = $r->fetchColumn();
	}
}catch(Exception $e){
	//die($e->getMessage());
}?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>POSTS</title>
<link href="src/css/bootstrap.css" rel='stylesheet' type='text/css' />
</head>

<body>
	<div id="conteudocentral">
		<div id="about" class="about sobre">
            <div class="container">
				<div class="row" style= "margin-bottom:10%">
					<a href="#" id="pull" >
						<img src="images/layer<?php echo $nomePagina;?>.png" title="menu" id="Dsppear" style="width: 30%;margin-left: 30%" />
					</a>
					<!--<form id="custom-search-form" class="form-search form-horizontal pull-right">
						<input type="text" class="search-query" placeholder="Pesquise por algo" style= "margin-top:6%" />
						<button type="submit" class="btn">
							<i class="fa fa-search"></i>
						</button>
					</form>-->
				</div>
				<?php
				$sql ="SELECT * FROM tb_postagens WHERE exibir='1' AND Id=:id LIMIT 1";

				try{
					$resultado = $conexao -> prepare($sql);
					$resultado -> bindParam('id',$idUrl,PDO::PARAM_INT);
					$resultado -> execute();
					$contar= $resultado->rowCount();

					if($contar>0){
						while($exibe = $resultado-> fetch(PDO::FETCH_OBJ))
						{
							?>
							<div class="panel-default  panel ">
                               <div  class="panel-body">
									<div class="col-rm-6">
										<a>
											<img src="<?php echo $exibe->imagem; ?>" style="width: 100%; margin-bottom: 5%;"/>
										</a>
									</div>
									<h3>
										<b style="color: black;">
											<?php echo $exibe->titulo;?>
										</b>
									</h3>
									<div class="col-rm-6" style="margin: 3%;">
										<p >
											<?php echo ($exibe->descricao);?>
										</p>

										<h3><b style="font-size: 60%;margin-left: 13%"> <i><a href="javascript:history.back()"> VOLTAR  <a href="#" style="margin-left: 65%">  <?php echo $exibe->data;?> </a>  </a></i></b></h3>
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
			<div id="disqus_thread"></div>
		<script>

		/**
		*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
		*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
		/*
		var disqus_config = function () {
		this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
		this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
		};
		*/
		(function() { // DON'T EDIT BELOW THIS LINE
		var d = document, s = d.createElement('script');
		s.src = 'https://http-cristoferdivo-com.disqus.com/embed.js';
		s.setAttribute('data-timestamp', +new Date());
		(d.head || d.body).appendChild(s);
		})();
		</script>
		<noscript> <a href="https://disqus.com/?ref_noscript"></a></noscript>
		<script id="dsq-count-scr" src="//http-cristoferdivo-com.disqus.com/count.js" async></script>

	<script type="text/javascript">
	$(document).ready(function(){
		$("#menu a").click(function( e ){
			e.preventDefault();
			var href = $( this ).attr('href');
			$("#conteudocentral").load( href +" #conteudocentral");
		});
	});
	</script>
	<!--<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>-->
</body>
</html>
