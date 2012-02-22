<?php echo $this->includeViewFile('administration/_admin-menu'); ?>

<div id="user-list" class="admin-content">

    <h2 style="text-align:center;">Users</h2>
    <form action="<?php $this->createUrl(array('c' => 'administration', 'a' => 'searchuser')); ?>" 
          method="POST">
        <label for="search">Search:</label>
        <input name="search" id="search" />

        <ul>
            <?php foreach ($this->users as $user) { ?>
                <li><a href="<?php $this->createUrl(array('c' => 'administration', 'a' => 'edituser')); ?>">
                        <?php $user ?></a></li>
            <?php }; ?>
        </ul>
    </form>
</div>
<div class="clear"></div>