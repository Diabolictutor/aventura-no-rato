<form action="<?php echo $this->createUrl(array('c' => 'forum', 'a' => 'search')); ?>" method="POST">
    <fieldset>
        <legend>Search:</legend>
        <div class="row">
        <label for="search">Text:</label>
        <input type="text" name="search" id="search" class="text" />
        </div><div class="row">
        <label for="search">By user:</label>
        <input type="text" name="usearch" id="usearch" class="text" /><br />
        </div><div class="row">
        <label for="searchorder">Order:</label>
        <select name="order" id="searchorder">
            <option value="rel">Most relevant results first</option>
            <option value="dataasc">Oldest first</option>
            <option value="datades">Newest First</option>
            <option value="abc">Alphabetic order</option>
        </select>
        </div>
        <input type="hidden" name="searchtype" value="adv"/>
        <input type="submit" />
    </fieldset>
</form>