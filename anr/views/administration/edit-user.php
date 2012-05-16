<?php echo $this->includeViewFile('administration/_admin-menu'); ?>
<?php $this->registerScript("$('#tabs').tabs();", View::$POS_INIT); ?>

<div id="tabs">
    <ul>
        <li><a href="#edit-user">Edit User</a></li>
        <li><a href="#character-list">Character List</a></li>
    </ul>
    <div id="edit-user">
        <form action="#" method="POST">
            <fieldset>
                <legend>Edit User</legend>
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" />

                <label for="name">Name:</label>
                <input type="text" name="name" id="name" />

                <label for="name">Signature:</label>
                <input type="text" name="name" id="signature" />

                <label for="name">Avatar:</label>
                <input type="text" name="name" id="avatar" />
            </fieldset>

            <input type="submit" value="Submit" />

            <input type="hidden" name="User" />
        </form>
    </div>

    <div id="character-list">
        <h1>Character List</h1>
        <div class="list-row">
            <span class="char-name">Name</span>
            <span class="char-level">Level</span>
        </div>
        <div class="list-row">
            <span class="char-name">noob</span>
            <span class="char-level"> 1337 </span>
        </div>
    </div>
</div>