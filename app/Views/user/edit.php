<?php include(VIEWS . 'inc/header.php'); ?>


<h1 class="text-center  mt-5 mb-2 py-3">Edit User </h1>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <?php if(isset($success)): ?>
                    <h3 class="alert alert-success text-center"><?php  echo $success; ?></h3>
                <?php endif; ?>
                <?php if(isset($error)): ?>
                    <h3 class="alert alert-danger text-center"><?php  echo $error; ?></h3>
                <?php endif; ?>


                <form class="p-5 border mb-5" method="POST" action="<?php url('user/update/'.$row['id']); ?>">
                    <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" required name="username" class="form-control" id="username" value="<?= $row['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Password</label>
                        <input type="text" required class="form-control" name="password" id="password" value="<?= $row['password'] ?>">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
                            
            </div>
        </div>
    </div>


<?php include(VIEWS . 'inc/footer.php'); ?>