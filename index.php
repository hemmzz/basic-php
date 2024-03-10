<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Document</title>
</head>
<body>
    <form action="submit.php" method="post">
         <h1>Sign Up</h1>

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        
        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>

        <div>
            <label for="password">Create Password</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password">
        </div>

        <button>Submit</button>
</form>
</body>
</html>