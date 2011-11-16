<div id="login" style="float: left;width: 49%">
    <form action="<?php echo $this->createURL(array('c' => 'site', 'a' => 'login')); ?>" method="POST">
        <fieldset>
            <legend>Login</legend>
            <p>
                <label for="email">E-mail:</label>
                <br />
                <input type="text" name="email" id="email" />
            </p>
            <p>
                <label for="pw">Password:</label>
                <br />
                <input type="password" name="password" id="pw" />
            </p>
        </fieldset>
        <input type="submit" value="Submit" name="login" />
    </form>
</div>
<div id="register" style="float: left; width: 49%">
    <form action="<?php echo $this->createURL(array('c' => 'site', 'a' => 'login')); ?>" method="POST">
        <fieldset>
            <legend>Register</legend>
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
                <label for="pw">Password:</label>
                <br />
                <input type="password" name="password" id="pw" />
            </p>
            <p>
                <label for="pw2">Repeat Password:</label>
                <br />
                <input type="password" name="password2" id="pw2" />
            </p>
        </fieldset>
        <input type="submit" value="Submit" name="register" />
    </form>
</div>