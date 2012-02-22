<?php echo $this->includeViewFile('administration/_admin-menu'); ?>

<div id="char-list" class="admin-content">

    <h2 style="text-align:center;">Characters</h2>
    <form action="<?php $this->createUrl(array('c' => 'administration', 'a' => 'searchchar')); ?>" 
          method="POST">
        <label for="search">Search:</label>
        <input name="search" id="search" />

        <ul>
            <?php foreach ($this->chars as $char) { ?>
                <li><a href="<?php $this->createUrl(array('c' => 'administration', 'a' => 'editchar')); ?>">
                        <?php $char ?></a></li>
            <?php }; ?>
        </ul>
    </form>
</div>
<div class="clear"></div>