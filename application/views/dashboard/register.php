<div class="container">
        <h1>Register</h1>
        <form action="" method="post">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
            Email Address:<br><input type="text" name="email"><br>
            First Name:<br><input type="text" name="first_name"><br>
            Last Name:<br><input type="text" name="last_name"><br>
            Password:<br><input type="password" name="password"><br>
            Password Confirmation:<br><input type="password" name="password_conf"><br>
            <input type="submit" value="Register"><br>
            <a href="">Don't have an account? Register</a>
        </form>
    </div>
</body>
</html>
    
    
    
