<!-- //TODO: css to css file -->
<div>
    <?php foreach($this->boards as $board){ ?>
    <div>
        <h2 style="background-color:darkgray;float:left;width:80%;"><?php $board->title ?></h2>
        <span style="background-color:darkgray;float:left;width:20%;height:22px;text-align:right;"><?php $board->countThreads(); ?></span>
    </div>
    <div style="clear:both;"></div>
    <div style="background-color:lightgray;" class="boardContent">
        <ul>
            <li>Topic 1 by "Username" <div style="float:right;">BOTAO</div><img style="float:right;"/></li>
        </ul>
    </div><?php } ?>
</div>