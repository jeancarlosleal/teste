<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Teste - Connect Plug</title>
        <meta name="title" content="Teste - Connect Plug">
        <meta name="author" content="Jean Carlo">
        <meta name="description" content="Teste para recrutamento">

        <!-- CSS -->
        <?php echo Asset::css('bootstrap.min.css'); ?>
        <?php echo Asset::css('bootstrap-theme.min.css'); ?>
        <?php echo Asset::css('theme.css'); ?>
        <?php Asset::js('bootstrap.min.js', array(), 'js_bottom'); ?>

    </head>
    <body class="">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo Uri::create('cliente'); ?>">Clientes</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container theme-showcase" role="main">
            <?php echo $sContent; ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <?php echo Asset::render('js_bottom'); ?>
    </body>
</html>