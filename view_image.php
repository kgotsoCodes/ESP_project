<?php
  require 'init.php';

  $my_image  = $Uploader->get_last_image();

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet"/>
    <title>View Uploaded Image</title>
</head>
<body>

<div class="container">
        <a href="index.php" class="btn btn-lg btn-outline-primary">Upload Another Image</a>
        <h1>Uploaded Image</h1>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <div><?php echo $error ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php
                foreach($my_image as $dis_image){
                    ?>

                    <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img src="<?php echo $dis_image['image_name']; ?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dis_image['image_type']; ?></h5>
                            <p class="card-text">Width: <?php echo $dis_image['width']; ?></p>
                            <p class="card-text"><small class="text-muted">Created On: <?php echo $dis_image['creation_date']; ?></small></p>
                        </div>
                        </div>
                    </div>
                    </div>

        <?php

                } ?>
       


</div>


</body>
</html>