<form action="<?php echo $this->createUrl(array('c' => 'forum', 'a' => 'search')); ?>" method="POST">
    <fieldset>
        <legend>Search:</legend>
        <label for="search">Text:</label>
        <input type="text" name="search" id="search" class="text" /><br />
        <label for="search">By user:</label>
        <input type="text" name="usearch" id="usearch" class="text" /><br />
        <select name="order" id="searchorder">
            <option value="rel">Most relevant results first</option>
            <option value="dataasc">Oldest first</option>
            <option value="datades">Newest First</option>
            <option value="abc">Alphabetic order</option>
        </select><br />
        <label for="options">Options</label><br />
        <input type="checkbox" name="posts" value="1"/>Search only posts.<br />
        <input type="checkbox" name="title" value="1"/>Restrict to titles only.<br />
        <input type="hidden" name="searchtype" value="adv"/>
        <input type="submit" />
    </fieldset>
</form>