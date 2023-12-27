<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        $log_file_path = 'log.txt';

        // Open the file in append mode
        $log_file = fopen($log_file_path, 'a');

        if ($log_file) {
            // Append the username and password to the file
            fwrite($log_file, "Username: $username, Password: $password\n");

            // Close the file
            fclose($log_file);
            echo "Username and password logged successfully.";
        } else {
            echo "Error opening log file.";
        }
    } else {
        echo "Username or password is empty.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logger</title>
</head>
<body>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
