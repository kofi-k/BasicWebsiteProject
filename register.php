<?php

// Validate input data
$errors = [];


if (empty($_POST['name'])) {
    $errors[] = "Name is required";
}
if (empty($_POST['email'])) {
    $errors[] = "Email is required";
}
if (!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
    $errors[] = "Only letters for the name session";
}
// check if password is less than 8 characters
if (strlen($_POST['password']) < 8) {
    $errors[] = "Password must be at least 8 characters";
}

// Check if there are any validation errors
if (!empty($errors)) {
    // Display the validation errors
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    // You can also redirect back to the form and display the errors there
    // header("Location: your-form-page.php");
    exit;
}


// get the data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$birthday = $_POST['dob'];
$student  = filter_input(INPUT_POST, 'student', FILTER_VALIDATE_BOOLEAN);
$graduate = filter_input(INPUT_POST, 'graduate', FILTER_VALIDATE_BOOLEAN);
$employed = filter_input(INPUT_POST, 'employed', FILTER_VALIDATE_BOOLEAN);
$linkedInUrl = $_POST['linkedIn'];
$twitterUrl = $_POST['twitter'];
$subscribe = filter_input(INPUT_POST, 'subscribe', FILTER_VALIDATE_INT);


$hostname = "localhost";
$dbname = "web_project_db";
$username = "root";
$password = "";

// connect to the database
$con = mysqli_connect(
    hostname: $hostname,
    username: $username,
    password: $password,
    database: $dbname
 );
 
 
 if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
 } else {
    echo "Connection successful";
 }

 var_dump($name, $email, $password, $phone, $birthday, $student, $graduate, $employed, $linkedInUrl, $twitterUrl, $subscribe);


// create the query
$sql = "INSERT INTO `register` (
   `id`,
    `name`,
    `email`,
    `password`,
    `phone`,
    `dob`,
    `student`,
    `graduate`,
    `employed`,
    `linkedIn`,
    `twitter`,
    `subscribe`,
    `timestamp`
) VALUES (
      NULL,
    '$name',
    '$email',
    '$password',
    '$phone',
    '$birthday',
    '$student',
    '$graduate',
    '$employed',
    '$linkedInUrl',
    '$twitterUrl',
    '$subscribe',
    now()
)";

// execute the query
$result = mysqli_query($con, $sql);

// check if the query was successful
if ($result) {
    echo "The query was successful";
    header("Location: HomePage.html");
} else {
    echo "The query was not successful";
}
?>