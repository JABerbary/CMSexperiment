

	<body>

    <div id=conteudocentral>
		<div id="about"  class="about sobre">
			<a href="#" id="pull" ><img src="images/yotubelogo.png" title="menu" id="Dsppear" style="margin-left: 44% ; margin-bottom: 5%"  }/></a>
      <script src="//assets.juicer.io/embed.js" type="text/javascript"></script>
<link href="//assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
<ul class="juicer-feed" data-feed-id="cristoferdivo-b625318a-2c67-4b5e-8a41-f66b98577b70"><h1 class="referral"></h1></ul>

	  </div>
  </div>

		
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
