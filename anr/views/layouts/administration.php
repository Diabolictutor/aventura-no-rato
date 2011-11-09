<!DOCTYPE HTML>
<html>
    <head>
        <title></title>
        <meta charset="utf-8" />
        <link href="_resources/css/base.css" rel="stylesheet" type="text/css" />
        <link href="_resources/css/administration.css" rel="stylesheet" type="text/css" />
        <link href="_resources/css/black-tie/jquery-ui-full.css" rel="stylesheet" type="text/css"/>
        <script src="_resources/js/jquery.min.js" type="text/javascript"></script>
        <script src="_resources/js/jquery-ui-full.min.js" type="text/javascript"></script>

        <?php echo $this->getInitScriptSection(); ?>
    </head>
    <body>
        <div id="top">
            <div id="mainmenu">
                <ul>
                    <li><a href="<?php echo $this->createURL(); ?>" alt="Home">Home</a></li>
                    <li><a href="<?php echo $this->createURL(array('r' => 'forum',)); ?>" alt="Forum">Forum</a></li>
                    <li><a href="<?php echo $this->createURL(array('r' => 'game')); ?>" alt="Play">Play</a></li>
                    <!-- //TODO: link para conta se autenticado -->
                    <!-- <li><a href="<?php echo $this->createURL(array('a' => 'logout')); ?>" alt="Logout">Logout</a></li> -->
                    <!-- //TODO: Logout se autenticado -->
                    <li><a href="<?php echo $this->createURL(array('c' => 'login')); ?>" alt="Login">Login</a></li>
                </ul>
            </div>
            <div id="header"></div>
        </div>
        <div id="administration">
            <div id="content">
                <?php echo $this->getContentSection(); ?>
            </div>
        </div>
        <div id="footer">
            &copy; <?php echo date('Y'); ?>
        </div>
    </body>
</html>