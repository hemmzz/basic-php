<?php

if (empty($_POST["name"])) {
    die("Enter name");
}

if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Enter valid email");
}

if (strlen($_POST["password"]) < 8) {
    die("Password should not be lesser than 8");
}

if (! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain atleast one letter");
}

if (! preg_match("/[0-9]/i", $_POST["password"])) {
    die("Password must contain atleast one number");
}

if ($_POST["password"] !== $_POST["confirm_password"]) {
    die("Passwords don't match");
}
$password_hash = sha1($_POST["password"]);
echo $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

print_r($_POST);
var_dump("password_hash");

$sql = "INSERT INTO users_info (name, email, password) VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (! $stmt->prepare($sql)) {
    die("SQL error : " . $mysqli->error);
}

$stmt->bind_param(
    "sss",
    $_POST["name"],
    $_POST["email"],
    $password_hash
);



if ($stmt->execute()) {
    echo "Registration Successfull!";

    header("Location: signup-successfull.html");
    exit;
}

else {

    if ($mysqli_errno === 1062) {
        echo "Email taken already";
    }
    else{
        die($mysqli->error. " " . $mysqli->errno);
    }
    
}