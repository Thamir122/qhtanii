<?php 
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

$errors = [
    'firstnameerror' => '',
    'lastnameerror' => '',
    'emailerror' => '',
];



if (isset($_POST['submit'])) {
    
   //تحقق الاسم الاول
if(empty($firstname)){
    $errors['firstnameerror'] = 'يرجى ادخال الاسم الاول';
}
//تحقق الاسم الاخير
elseif(empty($lastname)){
    $errors['lastnameerror'] = 'يرجى ادخال الاسم الاخير';
}
//تحقق الايميل
elseif(empty($email)){
    $errors['emailerror'] = 'يرجى ادخال الايميل';
}

elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['emailerror'] = 'يرجى ادخال ايميل صحيح';

}
//تحقق لايوجد اخطاء

if(!array_filter($errors)){
$firstname = mysqli_real_escape_string($conn, $firstname = $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn,$lastname = $_POST['lastname'] );
$email = mysqli_real_escape_string($conn,$email = $_POST['email']);

$sql = "INSERT INTO users(firstname, lastname, email)
VALUES('$firstname', '$lastname', '$email' )";


    if(mysqli_query($conn, $sql)){
        header('Location: ' . $_SERVER['PHP_SELF']);
    }
    else {
        echo'error: ' . $conn;
    }

}
}


    