<?php
    if (isset($_POST['cancel'])){
        header("Location: index.php");
        return;
    }
    $salt = 'Ja_sqAXF^%';
    $stored_hash = '17b1927e658a6ccc5d2861105bf77dd1'; #password is "php123"
    $failure = false;

    if (isset($_POST['who']) && isset($_POST['pass']))
        if ($_POST['who'] < 1 || $_POST['pass'] < 1)
            $failure = "User name and password are required";
        else
        {
            $check = hash('md5',$salt . $_POST['pass']);
            if ($stored_hash == $check)
                header('Location: game.php?who='.urlencode($_POST['who']));
            else
                $failure = "Incorrect password";
        }

?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            input{
                margin: 2px;
            }
        </style>
        <title>kusay's Login Page 05a50bbe</title>
    </head>

    <body>
        <h1>Please Log In</h1>
        <?php
            if ($failure !== false)
                echo "<p style='color : red;'>".$failure."</p>\n"; 
        ?>
        <form method="POST">
            <label for="nam">Username: </label>
            <input type="text" name="who" id="nam" ><br>
            <label for="pas">password: </label>
            <input type="text" name="pass" id="pas" ><br>
            <input type="submit" value="Log In">
            <input type="submit" name="cancel" value="Cancel">
        </form>
    </body>
</html>