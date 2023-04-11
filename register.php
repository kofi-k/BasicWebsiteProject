<?php

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
    `subscribe`
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
    '$subscribe'
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