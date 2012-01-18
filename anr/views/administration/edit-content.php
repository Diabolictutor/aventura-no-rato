<?php echo $this->includeViewFile('administration/_admin-menu'); ?>
<div id="edit-content">
    <form action="<?php echo $this->createUrl(array('c' => 'administration', 'a' => 'editContent')); ?>"
          method="POST">
        <fieldset>
            <legend>Edit Content</legend>
            <p>
                <label for="Description">Description:</label>
                <input type="text" name="Description" id="description"/>
            </p>
            <p>
                <label for="Content">Content:</label>
                <input type="text" name="Content" id="content"/>
            </p>
        </fieldset>
    </form>
</div>
