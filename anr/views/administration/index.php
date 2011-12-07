<div class="side-menu">
    <h2>Administration</h2>
    <a href="<?php echo $this->createURL(array('c' => 'administration' , 'a' => 'edituser')); ?>">User Administration</a><br/>
    <a href="<?php echo $this->createURL(array('c' => 'administration' , 'a' => 'editboard')); ?>">Forum Administration</a><br/>
    <a href="<?php echo $this->createURL(array('c' => 'administration' , 'a' => 'cms')); ?>">CMS</a>
</div>
<div class="content">
   <?php echo $this->includeViewFile($vfile); ?>
</div>
<div style="clear:both;"></div>