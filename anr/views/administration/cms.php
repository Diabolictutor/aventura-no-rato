<div>
    <h2 style="text-align:center;">CMS Pages</h2>
    <ul>
        <?php foreach ($list as $item) { ?>
            <li><a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'layoutedit')); ?>"><?php echo $item; ?></a></li>
        <?php } ?>
    </ul>
</div>