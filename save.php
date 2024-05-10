<?php
include('conn.php'); 
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$city = $_POST['city'];
$gen = $_POST['gen'];
$language = implode(",", $_POST['language']);
$photo=$_FILES['photo'];
$filename=$photo['name'];
$filetmp=$photo['tmp_name'];
$dis='uploads/'.$filename;
move_uploaded_file($filetmp,$dis);

        $query = "INSERT INTO stu (name, email, password, city, gender, language, photo) VALUES ('$name', '$email', '$pass','$city',
         '$gen', '$language', '$dis')";
        $insert = mysqli_query($con, $query);

        if ($insert) {
            echo "Data saved successfully.";
        } else {
            echo "Error occurred while saving data.";
        }
  
?>














<?php
// include('conn.php'); 

// $name = $_POST['name'];
// $email = $_POST['email'];
// $pass = $_POST['pass'];
// $city = $_POST['city'];
// $gen = $_POST['gen'];
// $language = implode(",", $_POST['language']);

// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["photo"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["photo"]["tmp_name"]);
//     if($check !== false) {
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }

// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

// // Check file size
// if ($_FILES["photo"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
//         $query = "INSERT INTO stu (name, email, password, city, gender, language, photo) VALUES ('$name', '$email', '$pass','$city', '$gen', '$language', '$target_file')";
//         $insert = mysqli_query($con, $query);

//         if ($insert) {
//             echo "Data saved successfully.";
//         } else {
//             echo "Error occurred while saving data.";
//         }
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }
?>

