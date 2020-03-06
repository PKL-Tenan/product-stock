<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Stock Information System - Login Page</title>
</head>

<body style="background: #F0F0F0">
    <br><br><br><br>

    <center>
        <h2>SISTEM INFORMASI STOCK</h2>
    </center>

    <br><br>

    <div class="container">
        <div class="col-md-4 offset-md-4">

            <?php 
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == 'gagal') {
                        echo "<div class='alert alert-danger'>Login gagal! username dan password salah!</div>";
                    }
                    else if ($_GET['pesan'] == 'logout') {
                        echo "<div class='alert alert-info'>Anda berhasil logout.</div>";
                    }
                    else if ($_GET['pesan'] == 'belum_login') {
                        echo "<div class='alert alert-warning'>Anda harus login untuk mengakses sistem!</div>";
                    }
                }
            ?>

            <form action="login_act.php" method="POST">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username"><b>Username</b></label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password"><b>Password</b></label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>