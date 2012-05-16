<?php $this->registerScript("$('#tabs').tabs();", View::$POS_INIT); ?>

<div id="tabs">
    <ul>
        <li><a href="#general-settings">General Settings</a></li>
        <li><a href="#forum-settings">Forum Settings</a></li>
        <li><a href="#character-list">Character List</a></li>
    </ul>
    <div id="general-settings">
        <!-- //TODO: proper action for this form -->
        <form action="#" method="POST">
            <fieldset>
                <h1>General Settings</h1>
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" />

                <label for="name">Name:</label>
                <input type="text" name="name" id="name" />

                <label for="pw">Old Password:</label>
                <input type="password" name="password" id="pw" />

                <label for="pw2">New Password:</label>
                <input type="password" name="password2" id="pw2" />

                <label for="pw3">Repeat New Password:</label>
                <input type="password" name="password3" id="pw3" />
            </fieldset>
            <input type="submit" value="Submit" />
        </form>
    </div>

    <div id="forum-settings">
        <h1>Forum Settings</h1>
        <!-- //TODO: proper action for this form -->
        <form action="#" method="POST">
            <fieldset>
                <label for="signature">Signature:</label>
                <textarea name="signature" id="signature" rows="5" cols="50"></textarea>

                <label for="avatar">Avatar:</label>
                <input type="text" name="avatar" id="avatar"/>

                <label for="post-count">Posts per Page:</label>
                <input type="text" name="post-count" id="post-count"/>

                <input type="submit" value="Submit" />
            </fieldset>
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
            <span class="char-level">1337</span>
        </div>
    </div>
</div>