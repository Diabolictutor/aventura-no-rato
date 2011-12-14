<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />

        <link href="_resources/css/base.css" rel="stylesheet" type="text/css" />
        <link href="_resources/css/game.css" rel="stylesheet" type="text/css" />

        <link href="_resources/css/black-tie/jquery-ui-full.css" rel="stylesheet" type="text/css"/>

        <script src="_resources/js/jquery.min.js" type="text/javascript"></script>
        <script src="_resources/js/jquery-ui-full.min.js" type="text/javascript"></script>

        <title></title>

        <?php echo $this->getInitScriptSection(); ?>
    </head>
    <body>
        <div id="top">
            <div id="mainmenu">
                <ul>
                    <li><a href="<?php echo $this->createURL(); ?>" alt="Home">Home</a></li>
                    <li><a href="<?php echo $this->createURL(array('r' => 'forum',)); ?>" alt="Forum">Forum</a></li>
                    <li class="active"><a href="<?php echo $this->createURL(array('r' => 'game')); ?>" alt="Play">Play</a></li>
                    <?php if (!System::app()->isGuest()) { ?>          
                        <li><a href="<?php echo $this->createURL(array('c' => 'account')); ?>" alt="Account">Account</a></li>
                        <li><a href="<?php echo $this->createURL(array('a' => 'logout')); ?>" alt="Logout">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo $this->createURL(array('c' => 'site', 'a' => 'login')); ?>" alt="Login">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div id="header"></div>
        </div>
        <div id="game">
            <div id="content">
                <?php echo $this->getContentSection(); ?>
            </div>
        </div>
        <div id="footer">
            &copy; <?php echo date('Y'); ?> Aventura no Rato!
        </div>
    </body>
</html>