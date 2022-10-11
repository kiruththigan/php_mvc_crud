<?php include(VIEWS . 'inc/header.php'); ?>


<h1 class="text-center  my-5 py-3">View All Users </h1>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto p-4 border mb-5">

            <?php if (isset($success)) : ?>
                <h3 class="alert alert-success text-center"><?php echo $success; ?></h3>
            <?php endif; ?>
            <?php if (isset($error)) : ?>
                <h3 class="alert alert-danger text-center"><?php echo $error; ?></h3>
            <?php endif; ?>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    
                    <?php foreach ($users as $user) :  ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['password']; ?></td>
                            
                            <td>
                                <a href="<?php url('user/edit/' . $user['id']) ?>" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="<?php url('user/delete/' . $user['id']) ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
</div>


<?php include(VIEWS . 'inc/footer.php'); ?>