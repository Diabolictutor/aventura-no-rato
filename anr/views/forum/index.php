<!-- //TODO: css to css file -->
<div>
    <?php foreach ($this->boards as $board) { ?>
        <div>
            <h2><?php echo $board->title; ?></h2>
            <span><?php echo $board->countThreads(); ?></span>
        </div>
        <div style="clear:both;"></div>
        <div class="boardContent">
            <ul>
                <li>Latest topic<div style="float:right;">BOTAO</div><img style="float:right;"/></li>
            </ul>
        </div><?php } ?>
</div>