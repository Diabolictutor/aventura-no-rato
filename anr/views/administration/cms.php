<?php echo $this->includeViewFile('administration/_admin-menu'); ?>
<div>
    <h2 style="text-align:center;">CMS Pages</h2>
    <?php if (count($this->csections)) { ?>
        <ul>
            <?php foreach ($this->csections as $item) { ?>
                <li><a href="<?php echo $this->createUrl(array('c' => 'administration', 'a' => 'layoutedit')); ?>"><?php echo $item->description; ?></a></li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        Não foram encontradas secções.
    <?php } ?>
</div>