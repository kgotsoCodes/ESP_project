<?php
require 'init.php';

$errors = [];
$product = [
    'image' => ''
];

//check if the form has been submitted
if (isset($_POST['myBtn'])) {
        //require validation of the image
        require_once'image_validate.php';

        if (empty($errors)) {

            $Uploader->imageUpload($image_file, $image_purpose,$max_wide );
            
           header('Location: view_image.php');
            
            
            
        }


}

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
    <title>Image Uploader</title>
</head>
<body>

<div class="container">
        <h1>Upload New Image</h1>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <div><?php echo $error ?></div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
       
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label><strong>UPLOAD IMAGE:</strong></label><br>
                <input type="file" name="my_image" id="my_image">
            </div>
            <Strong>IMAGE PURPOSE:</Strong>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="profile_photo" id="image_purpose" name="image_purpose">
                <label class="form-check-label" for="image_purpose">
                    Profile Photo
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="product_image" id="image_purpose" name="image_purpose">
                <label class="form-check-label" for="image_purpose">
                    Prouct Image
                </label>
            </div>
            <br>

            <button type="submit" class="btn btn-outline-primary" name="myBtn">Submit</button>
        </form>


</div>


</body>
</html>