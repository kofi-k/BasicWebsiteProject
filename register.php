<?php

// get the data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$birthday = $_POST['dob'];
$student  = $_POST['student'];
$graduate = $_POST['graduate'];
$employed = $_POST['employed'];
$linkedInUrl = $_POST['linkedIn'];
$twitterUrl = $_POST['twitter'];
$subscribe = $_POST['subscribe'];


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

// create the query


?>