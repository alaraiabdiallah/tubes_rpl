<?php require_once "partials/header.php" ?>
<div class="col-4" style="margin: 10% auto;">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center">Login your account</h3>
            <hr>
            <form action="<?php echo getCurrentUrl() ?>" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" required class="form-control" name="username" id="username" aria-describedby="username" placeholder="Your username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" required class="form-control" name="password" id="password" placeholder="*******">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </form>
            <hr>
        </div>
    </div>
</div>

<?php require_once "partials/footer.php" ?>