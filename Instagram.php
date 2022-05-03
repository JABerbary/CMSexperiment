


	<body>


    <div id=conteudocentral>
		<div id="about"  class="about sobre">
			 <a href="#" id="pull" ><img src="images/instalogo.png" title="menu" id="Dsppear" style="margin-left: 44% ; margin-bottom: 5%"  }/></a>
      <script src="//assets.juicer.io/embed.js" type="text/javascript"></script>
      <link href="//assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
      <ul class="juicer-feed" data-feed-id="cristoferdivo"><h1 class="referral"><!--<a href="https://www.juicer.io">Powered by Juicer</a></h1>--></ul>
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

			<!--//End-top-nav-script-->

	</body>
</html>
