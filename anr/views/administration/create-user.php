<?php $this->registerScript("$('#tabs').tabs();", View::$POS_INIT); ?>

<div id="tabs">
    <ul>
        <li><a href="#edit-user">Edit User</a></li>
        <li><a href="#character-list">Character List</a></li>
    </ul>
    <div id="edit-user">
        <form action="index.php" method="POST">
            <fieldset>
                <legend>Edit User</legend>
                <p>
                    <label for="email">E-mail:</label>
                    <br />
                    <input type="text" name="email" id="email" />

                <p>
                    <label for="name">Name:</label>
                    <br />
                    <input type="text" name="name" id="name" />
                </p>
                <p>
                    <label for="name">Signature:</label>
                    <br />
                    <input type="text" name="name" id="signature" />
                </p>
                <p>
                    <label for="name">Avatar:</label>
                    <br />
                    <input type="text" name="name" id="avatar" />
                </p>
                <input type="submit" value="Submit" />
            </fieldset>
        </form>
    </div>

    <div id="character-list">
        <h1>Character List</h1>
        <br />
        <div class="list-row">
            <span class="char-name">Name</span>
            <span class="char-level">Level</span>
            <div class="list-row">
                <span class="char-name">noob</span>
                <span class="char-level"> 1337 </span>
            </div>

        </div>

    </div>
</div>