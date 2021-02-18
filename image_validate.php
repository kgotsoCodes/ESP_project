<?php



 // takes the purpose of the image whether it's a product or profile picture
 if(isset($_POST['image_purpose'])){
    $image_purpose = $_POST['image_purpose'];  
 }
 else{
     $image_purpose ='';
 }


//getting the image information from the form
$image = $_FILES['my_image'] ?? null;
$imagePath = '';

//check image directory exist if does not create
if (!is_dir(__DIR__.'/public/images')) {
    mkdir(__DIR__.'/public/images');
}

if ($image && $image['tmp_name']) {
    if ($product['image']) {
        unlink(__DIR__.'/public/'.$product['image']);
    }
    $imagePath = 'images/' . $Uploader->randomStringGen(8) . '/' . $image['name'];
    mkdir(dirname(__DIR__.'/public/'.$imagePath));
    move_uploaded_file($image['tmp_name'], __DIR__.'/public/'.$imagePath);
}

//getting the image path to be uploaded
$image_file = 'public/'.$imagePath;


//MIME checking
$mimeArray = array("image/jpg", "image/jpeg", "image/png");
//assign the file type found in the image to a mime
$mime = $image['type'];

if(in_array($mime, $mimeArray)===FALSE){
    $errors[] = "This File Type is Not Allowed";
 }
if (!$image_purpose) {
    $errors[] = 'Image purpose is required';
}
elseif($image_purpose === 'product_image'){

    //check if image is png
    if($mime === $mimeArray[2]){
        $max_wide = 300;
        $Uploader->resize_image_png($image_file, $max_wide);
    }
    //check if image is jpg or jpeg
    if($mime === $mimeArray[0] || $mime === $mimeArray[1]){
        $max_wide = 300;
        $Uploader->resize_image_jpeg($image_file, $max_wide);
    }

}
elseif($image_purpose === 'profile_photo'){

    //check if image is png
    if($mime === $mimeArray[2]){
        $max_wide = 250;
        $Uploader->resize_image_png($image_file, $max_wide);
    }

    //check if image is jpg or jpeg
    if($mime === $mimeArray[0] || $mime === $mimeArray[1]){
        $max_wide = 250;
        $Uploader->resize_image_jpeg($image_file, $max_wide);
    }

}

// if (!$price) {
//     $errors[] = 'Product price is required';
// }
