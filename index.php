<?php
    error_reporting(0);
    $_SESSION['alert'] = 0;
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Mail Prototype</title>
</head>
<body class="container-fluid text-center" >
<?php if($_SESSION['alert'] == 1){ ?>
    <div class="alert alert-<?php echo $_SESSION['status']; ?> mt-3" role="alert">
      <?php echo $_SESSION['message']; ?>
    </div>
<?php 
header("Refresh: 3;");
$_SESSION['alert'] = 0;
} 
?>
<h1 class="mt-4 header mb-5"><span class="hdr">Mail</span> Prototype</h1>
<div class="container form p-5">
    <form action="mail.php" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input placeholder="Name *" class="form-control bg" type="text" name="name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input placeholder="Email *" class="form-control bg" type="email" name="email" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input placeholder="Subject *" class="form-control bg" type="text" name="subject" required>
                </div>
            </div>
            <div class="col-md-12">
                <textarea placeholder="Message *" class="form-control bg" rows="5" name="message" required></textarea>
            </div>
            <div class="col-md-12">
                <button type="submit" class="form-control mt-4 bg-warning text-white">Submit</button>
            </div>
        </div>

    </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
