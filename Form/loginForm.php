<!doctype html>
<html>
  <head>
    <title>Login Form</title>
  </head>
</html>
<body>
  <form method="post" action="../GetDetails/getUser.php">
    <label>Username:</label><br />
    <input type="text" name="username" required /><br /><br />

    <label>Password:</label><br />
    <input type="password" name="password" required /><br /><br />

    <button type="submit">Login</button>
  </form>
</body>
