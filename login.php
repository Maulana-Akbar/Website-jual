<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "qumarang");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lajanda</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="asset/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="asset/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="asset/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <br /><br /><br /><br />
                <h2>Login Admin SkinDistro</h2>
                <br />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Enter Details To Login </strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" class="form-control" placeholder="Your Username" name="user" autofocus="on" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="Your Password" name="pass" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox">Remember Me
                                </label>
                                <span class="pull-right">
                                    <a href="#">Forget Password ?</a>
                                </span>
                            </div>
                            <button class="btn btn-primary" name="login">Login</button>
                        </form>
                        <?php
                        if (isset($_POST['login'])) {
                            $ambil = $koneksi->query("select * from admin1 where username='$_POST[user]' and password='$_POST[pass]'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok === 1) {
                                $_SESSION['admin1'] = $ambil->fetch_assoc();
                                echo "<div class='alert alert-info'>Login Succses</div>";
                                header("location:index.php");
                            } else {
                                echo "<div class='alert alert-info'>Access Denied</div>";
                                echo "<meta http-equiv='refresh' content='l:url=login.php'>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>