<!DOCTYPE HTML>
<html>
	<head>
		<meta property="og:url" content="index.php" />

		<link href="src/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="src/css/Music.css" rel='stylesheet' type='text/css' />
    <script src="js/jquery.min.js"></script>
	<!--	<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>-->
		<link href="src/css/theme-style.css" rel='stylesheet' type='text/css' />


		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>

		<!--<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,400italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300,700' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		<!----start-top-nav-script---->
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
		<!----//End-top-nav-script---->
	</head>
  <body>

	<!-----start-about---->
	<div id="conteudocentral">
	<div id="about" class="about sobre">

    <div class="container">

      <div class="col-md-12">
        <h3><b style="margin-left: 1%; color: black;">CONTATO</b></h3>
        <div class="col-sm-6">

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...
		      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...
					Lorem ipsum dolor sit amet, consectetur adipisicing elit...
				  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...
					orem ipsum dolor sit amet, consectetur adipisicing elit...
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...
					Lorem ipsum dolor sit amet, consectetur adipisicing elit...
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...
					Lorem ipsum dolor sit amet, consectetur adipisicing elit...
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...
					Lorem ipsum dolor sit amet, consectetur adipisicing elit...
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...
					Lorem ipsum dolor sit amet, consectetur adipisicing elit...
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...





				</p>

        </div>

        <div class="col-md-6">



            <div class="form-group">
              <label style=" color: black;" for="usr">Nome:</label>
              <input type="text" class="form-control" name ="Nome" id="usr">
            </div>
            <div class="form-group">
              <label style=" color: black;" for="pwd">Sobrenome</label>
              <input type="text" class="form-control" name="Sobrenome" id="pwd">
            </div>
            <div class="form-group">
              <label style=" color: black;" for="pwd">Email</label>
              <input type="text" class="form-control" name="Email" id="pwd">
            </div>
            <div class="form-group">
              <label style=" color: black;" for="pwd">Assunto</label>
              <input type="text" class="form-control" name="Assunto" id="pwd">
            </div>
            <h3><b style="font-size: 85%;margin-left: 84%"> <i><a href="#">   ENVIAR </a></i></b></h3>

            </div>
</div>

</div>
</div>
</div>
</div >
<script src="js/jquery.min.js">
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#menu a").click(function( e ){
		e.preventDefault();
		var href = $( this ).attr('href');
		$("#conteudocentral").load( href +" #conteudocentral");
		});
	});
</script>
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
<!--<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>-->

<script type="text/javascript" src="resources/js/jquery/jquery-1.10.2.min.js"</script>
  </body>
</html>
