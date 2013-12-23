   <?php if(isset($error)): ?>
        <div class='error'>
            Login failed. Please double check your email and password.
        </div>
        <br>
    <?php endif; ?>
   <?php if(isset($_GET['loginsuccess'])): ?>
       <div class="success"> Registration is Successful! Please login.</div>
   <?php endif; ?>

   <div id="contentWithNav" class="login">
        <form method='POST' action='/users/p_login'>
        <div class="form">
            <p>
                <label>Email: </label>
                <input type="text" name="email" size="30"  maxlength="250"/>
            </p>
            <p>
                <label>Password: </label>
                <input type="password" name="password" size="30" maxlength="250" />
            </p>
            <p class="buttonPanel">
                <input type="submit" value="Login" id="loginButton" />
            </p>
        </div>

        </form>
</div>

