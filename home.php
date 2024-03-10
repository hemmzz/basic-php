<?php

session_start();

if (isset($_SESSION['user_id'])) {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users_info 
            WHERE id = {$_SESSION['user_id']}";

    $result = $mysqli->query($sql);

    $user =$result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Home</title>
</head>
<body>

    <h1>Home</h1>
    <?php if (isset($user)) : ?>

        <p>Hello <?= htmlspecialchars($user['name']) ?> </p>
        <a href="logout.php">Log out</a>

    <?php else:  ?>

        <p><a href="login.php">Log in</a> or <a href="index.php">Sign up</a></p>

    <?php endif; ?>
</body>
</html>