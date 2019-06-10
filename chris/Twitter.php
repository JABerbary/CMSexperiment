



  <body>

    <div id=conteudocentral>
    <div id="about"  class="about sobre">
      <a href="#" id="pull" ><img src="images/Twitterlogo.png" title="menu" id="Dsppear" style="margin-left: 46% ; margin-bottom: 5%"  }/></a>
      <script src="//assets.juicer.io/embed.js" type="text/javascript"></script>
  <link href="//assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
  <ul class="juicer-feed" data-feed-id="cristoferdivo-5c62f165-790c-4a29-b3c2-95ede3102ba1"><h1 class="referral">></h1></ul>

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
