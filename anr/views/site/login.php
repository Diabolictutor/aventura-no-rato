<!-- //TODO: Css to css file -->
<div id="login" style="float: left;width: 49%">
    <?php if (!empty($this->error)) { ?>
        <p><?php echo $this->error; ?></p>
    <?php } ?>
    <form action="<?php echo $this->createURL(array('c' => 'site', 'a' => 'login')); ?>" method="POST">
        <fieldset>
            <legend>Login</legend>
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" />

            <label for="pw">Password:</label>
            <input type="password" name="password" id="pw" />
        </fieldset>

        <input type="submit" value="Submit" name="login" />
    </form>
</div>

<div id="register" style="float: left; width: 49%">
    <?php if (!empty($this->error)) { ?>
        <p><?php echo $this->error; ?></p>
    <?php } ?>
    <form action="<?php echo $this->createURL(array('c' => 'site', 'a' => 'login')); ?>" method="POST">
        <fieldset>
            <legend>Register</legend>

            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" />

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" />

            <label for="pw">Password:</label>
            <input type="password" name="password" id="pw" />

            <label for="pw2">Repeat Password:</label>
            <input type="password" name="password2" id="pw2" />
        </fieldset>
        <input type="submit" value="Submit" name="register" />
    </form>
</div>
<!-- //TODO: create/use .clear class -->
<div style="clear:both"></div>