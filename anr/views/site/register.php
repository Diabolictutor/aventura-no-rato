<div id="register">
    <form action="<?php echo $this->createURL(array('c' => 'register')); ?>" method="POST">
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
            <input type="submit" value="Submit" />
        </fieldset>
    </form>
</div>