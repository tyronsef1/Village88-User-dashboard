    <div class="container">
        <h1>Signin</h1>
        <form action="" method="post">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
            Email Address:<br><input type="text" name="email"><br>
            Password:<br><input type="password" name="email"><br>
            <input type="submit" value="Sign In"><br>
            <a href="">Don't have an account? Register</a>
        </form>
    </div>
</body>
</html>