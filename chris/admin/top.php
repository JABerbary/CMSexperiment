<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
            class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">CristoferAdmin-beta</a>
            <div class="nav-collapse">
                <ul class="nav pull-right">

                </ul>
                <form action="home.php?acao=ver-postagens" method="post"enctype="moltpart/form-data"  class="navbar-search pull-right">
                    <input type="text" class="search-query" name="palavra-busca" placeholder="pesquisar">
                </form>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /container -->
    </div>
    <!-- /navbar-inner -->
</div>
<!-- /navbar -->
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li class="active"><a href="home.php?acao=welcome"><i class="icon-dashboard"></i><span>Homepage</span> </a> </li>
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-file"></i><span>Postagens</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="home.php?acao=ver-postagens">Visualizar</a></li>
                        <li><a href="home.php?acao=CadastroPosts">Cadastrar</a></li>
                    </ul>
                </li>
                <li></li>
            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->
