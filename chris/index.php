<?php include("head.php") ?>
<body>
    <?php include("topo.php") ?>

    <?php
    if(isset($_GET['acao'])){
        $acao = $_GET['acao'];

        if ($acao=='sobre') {
            include("sobre.php");
        }

        if ($acao=='music') {
            include("music.php");
        }

        if ($acao=='cooking') {
            include("cooking.php");
        }

        if ($acao=='plife') {
            include("plife.php");
        }
        if ($acao=='fashion') {
            include("fashion.php");
        }
        if ($acao=='youtube') {
            include("youtube.php");
        }
        if ($acao=='instagram') {
            include("Instagram.php");
        }
        if ($acao=='twitter') {
            include("Twitter.php");
        }

    }else{
        include("sobre.php");
    }

    ?>

</body>

</html>
