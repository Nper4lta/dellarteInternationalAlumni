<?php echo $_POST["fname"]; ?> <br>
<?php echo $_SERVER['DOCUMENT_ROOT']; ?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="settingsStyle.css">
</head>
<html>
    <body> 
        <h1> Alumni Sign Up Form </h1>
        <form action="../databaseCon/databaseConnection.php" method="POST">

            First Name: <input type="text" name="fname"><br>

           <!-- 
            <label for="lname"> Last Name:</label>
            <input type="text" id="lname" name="lname"></br>

            <label for="uname"> Username:</label>
            <input type="text" id="uname" name="uname"></br>

            <label for="password"> Password:</label>
            <input type="text" id="password" name="password"></br>

            <label for="address"> Address: </label>
            <input type="text" id="address" name="address"></br> 
           --> 
            <input type="submit">
        </form>
    </body>
</html>
