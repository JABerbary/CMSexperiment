<?php include("header.php") ?>
<body>
    <?php include("top.php") ?>

    <?php
    if(isset($_GET['acao'])){
        $acao = $_GET['acao'];

        if ($acao=='welcome') {
            include("inicio.php");
        }
        //cadastro
        if ($acao=='CadastroPosts') {
            include("CadastroPosts.php");
        }
        //exibição
        if ($acao=='ver-postagens') {
            include("ver-postagens.php");
        }
        //edição
        if ($acao=='editar-postagens') {
            include("edit-post.php");
        }

    }else{
        include("inicio.php");
    }

    ?>
</body>
<?php include("bot.php") ?>
</html>
