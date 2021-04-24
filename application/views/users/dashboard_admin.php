    
    <br>
    <div class="row">
        <div class="col-xs-6 col-md-10">
            <h1>Manage Users</h1>
        </div>
        <div class="col-xs-6 col-md-2">
            <a class="btn btn-primary" href="">Add new</a>
        </div>
    </div>
    <table class="table table-striped table-light">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created_at</th>
                <th>User_level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
<?php   foreach ($users as $user) 
        { ?>
            <tr>
                <th><?= $user['id']; ?></th>
                <td><?= $user['first_name']; ?></td>
                <td><?= $user['last_name']; ?></td>
                <td><?= $user['created_at']; ?></td>
                <td><?= $user['user_level']; ?></td>
                <td><a href="">edit</a> <a href="">remove</a></td>
            </tr>
<?php   } ?>
        </tbody>
    </table>
</body>
</html>