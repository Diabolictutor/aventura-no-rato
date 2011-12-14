<div class="side-menu">
    <h2>Administration</h2>
    <!-- //TODO: Use list items not line breaks -->
    <a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'edituser')); ?>">User Administration</a>
    <a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'editboard')); ?>">Forum Administration</a>
    <a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'cms')); ?>">CMS</a>
</div>
<div class="content">
    <?php echo $this->includeViewFile($vfile); ?>
</div>
<!-- //TODO: create a .clear class -->
<div style="clear:both;"></div>