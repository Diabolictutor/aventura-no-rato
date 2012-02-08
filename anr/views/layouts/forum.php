<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />

        <link href="_resources/css/base.css" rel="stylesheet" type="text/css" />
        <link href="_resources/css/forum.css" rel="stylesheet" type="text/css" />
        <link href="_resources/css/jquery-ui-1.8.17.css" rel="stylesheet" type="text/css"/>

        <script src="_resources/js/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script src="_resources/js/jquery-ui-1.8.17.min.js" type="text/javascript"></script>

        <?php echo $this->getScriptSection(); ?>

        <title><?php echo $this->title; ?></title>
    </head>
    <body>
        <div id="top">
            <div id="mainmenu">
                <ul>
                    <li><a href="<?php echo $this->createURL(); ?>" title="Home">Home</a></li>
                    <li><a href="<?php echo $this->createURL(array('r' => 'forum',)); ?>" title="Forum">Forum</a></li>
                    <li><a href="<?php echo $this->createURL(array('r' => 'game')); ?>" title="Play">Play</a></li>
                    <?php if (!System::app()->isGuest()) { ?>          
                        <li><a href="<?php echo $this->createURL(array('c' => 'account')); ?>" title="Manage Account">Account</a></li>
                        <?php if (System::app()->isAdmin()) { ?>
                            <li><a href="<?php echo $this->createURL(array('c' => 'administration')); ?>" title="System Administration">Administration</a></li>
                        <?php } ?>
                        <li><a href="<?php echo $this->createURL(array('c' => 'site', 'a' => 'logout')); ?>" title="Logout">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo $this->createURL(array('c' => 'site', 'a' => 'login')); ?>" title="Login">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div id="header"></div>
        </div>
        <div id="forum">
            <div id="content">
                <?php echo $this->getContentSection(); ?>
            </div>
        </div>
        <div id="footer">
            &copy; <?php echo date('Y'); ?> Aventura no Rato!
        </div>

        <?php echo $this->getInitScriptSection(); ?>
    </body>
</html>