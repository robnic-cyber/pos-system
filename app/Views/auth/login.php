<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>POS Login</title>
</head>
<body>
    <h1>Point of Sale System</h1>

    <form method="post" action="<?= site_url('login') ?>">
        <p>
            <label>Username</label><br>
            <input type="text" name="username" required>
        </p>

        <p>
            <label>Password</label><br>
            <input type="password" name="password" required>
        </p>

        <button type="submit">Log in</button>
    </form>
</body>
</html>