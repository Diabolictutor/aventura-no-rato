<div id="board-list">
    <ul>
        <form action=""> 
              
              <input type="submit" value="Insert new board" /></form>
        <?php foreach ($this->boards as $board) { ?>
            <li>
                <a href="<?php
        echo $this->createURL(
                array('c' => 'administration', 'a' => 'editboard')
                , array('id' => $board->boardID)
        );
            ?>" alt="">
                       <?php echo $board->title; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>