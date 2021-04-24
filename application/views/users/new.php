<div class="container">
    <br>
    <div class="row">
        <div class="col-xs-6 col-md-9">
            <h1>Add a new user</h1>
        </div>
        <div class="col-xs-6 col-md-3">
            <a class="btn btn-primary" href="../users/new">Return to dashboard</a>
        </div>
    </div>
        <?= $this->session->flashdata('errors'); ?>
        <?= $this->session->flashdata('register_success'); ?>
        <form action="../users/process_add" method="post">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
            Email Address:<br><input type="text" name="email"><br>
            First Name:<br><input type="text" name="first_name"><br>
            Last Name:<br><input type="text" name="last_name"><br>
            Password:<br><input type="password" name="password"><br>
            Password Confirmation:<br><input type="password" name="password_conf"><br>
            <br><input class="btn btn-success" type="submit" value="Create"><br>
        </form>
    </div>
</body>
</html>
    
    
    
