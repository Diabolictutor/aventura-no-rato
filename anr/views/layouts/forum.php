<!DOCTYPE HTML>
<html>
    <head>
        <title></title>
        <meta charset="utf-8" />
        <link href="_resources/css/base.css" rel="stylesheet" type="text/css" />
        <link href="_resources/css/forum.css" rel="stylesheet" type="text/css" />
        
        <?php echo $this->getInitScriptSection(); ?>
    </head>
    <body>
        <div id="top">
            <div id="mainmenu">
                <ul>
                    <li class="active"><a href="#" alt="">Home</a></li>
                    <li><a href="#" alt="">Forum</a></li>
                    <li><a href="#" alt="">Play</a></li>
                    <!-- //TODO: link para conta se autenticado -->
                    <!-- <li><a href="#" alt="">Account</a></li> -->
                    <!-- //TODO: Logout se autenticado -->
                    <li><a href="#" alt="">Login</a></li>
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
            &copy; <?php echo date('Y'); ?>
        </div>
    </body>
</html>