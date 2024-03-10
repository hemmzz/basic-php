<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM users_info
    WHERE email = '%s'",
    $_POST["email"]);

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password"], $user["password"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user['id'];
            header("Location: home.php");
            exit;
        }
        
    }

    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>

    <form action="" method="post">
        <label for="email">Email</label>
        <input type="text" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        <label for="password">Password</label>
        <input type="password" name="password">
        <button>Login</button>
    </form>
    
</body>
</html>