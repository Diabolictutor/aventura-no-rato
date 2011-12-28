<?php echo $this->includeViewFile('administration/_admin-menu'); ?>
<div id="user-list">
    <h2 style="text-align:center;">Users</h2>
    <form action="<?php $this->createURL(array('c' => 'administration', 'a' => 'searchuser')); ?>" method="POST">
        <label for="search">Search:</label>
        <input name="search" id="search" />
    </form>
    <ul>
        <li><a href="#">User 1</a></li>
    </ul>
</div>