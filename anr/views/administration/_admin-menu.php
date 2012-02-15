<div id="side-menu">
    <h2>Administration</h2>
    <ul>
        <li <?php echo ($this->selection == 'boards' ? 'class="active"' : ''); ?>><a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'index')); ?>">Board Administration</a></li>
        <li <?php echo ($this->selection == 'chars' ? 'class="active"' : ''); ?>><a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'chars')); ?>">Character Administration</a></li>
        <li <?php echo ($this->selection == 'users' ? 'class="active"' : ''); ?>><a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'users')); ?>">User Administration</a></li>
        <li <?php echo ($this->selection == 'cms' ? 'class="active"' : ''); ?>><a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'cms')); ?>">CMS</a></li>
    </ul>
</div>