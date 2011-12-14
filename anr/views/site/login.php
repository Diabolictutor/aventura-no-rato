<!-- //TODO: Css to css file -->
<div id="login" style="float: left;width: 49%">
    <?php if (!empty($this->error)) { ?>
        <p><?php echo $this->error; ?></p>
    <?php } ?>
    <form action="<?php echo $this->createURL(array('c' => 'site', 'a' => 'login')); ?>" method="POST">
        <fieldset>
            <legend>Login</legend>
            <p>
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" />
            </p>
            <p>
                <label for="pw">Password:</label>
                <input type="password" name="password" id="pw" />
            </p>
        </fieldset>
        <p>
            <input type="submit" value="Submit" name="login" />
        </p>
    </form>
</div>
<div id="register" style="float: left; width: 49%">
    <?php if (!empty($this->error)) { ?>
        <p><?php echo $this->error; ?></p>
    <?php } ?>
    <form action="<?php echo $this->createURL(array('c' => 'site', 'a' => 'login')); ?>" method="POST">
        <fieldset>
            <legend>Register</legend>
            <p>
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" />
            </p>
            <p>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" />
            </p>
            <p>
                <label for="pw">Password:</label>
                <input type="password" name="password" id="pw" />
            </p>
            <p>
                <label for="pw2">Repeat Password:</label>
                <input type="password" name="password2" id="pw2" />
            </p>
        </fieldset>
        <p>
            <input type="submit" value="Submit" name="register" />
        </p>
    </form>
</div>
<!-- //TODO: create/use .clear class -->
<div style="clear:both"></div>