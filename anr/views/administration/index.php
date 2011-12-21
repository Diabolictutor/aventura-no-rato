<div class="side-menu">
    <h2>Administration</h2>
    <ul>
        <li><a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'listboard')); ?>">Board Administration</a></li>
        <li><a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'editchars')); ?>">Character Administration</a></li>
        <li><a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'edituser')); ?>">User Administration</a></li>
        <li><a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'editlayout')); ?>">Layout Administration</a></li>
        <li><a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'cms')); ?>">CMS</a></li>
    </ul>
</div>
<div class="content">
    <?php echo $this->includeViewFile($this->vfile); ?>
</div>
<div class="clear"></div>