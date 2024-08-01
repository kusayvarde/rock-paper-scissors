<?php
    if (!isset($_GET['who']) || strlen($_GET['who'] < 1))
        die("Name parameter missing"); 

    if (isset($_POST['logout']))
        header("Location: index.php");

    $names = array("Rock", "Paper", "Scissors");
    $photo = array("rock.png", "paper.png","scissors.png");
    $human = isset($_POST['human']) ? $_POST['human']+0 : -1;
    $computer = rand(0,2);

    function check($computer, $human)
    {
        if ($computer == 0)
        {
            if ($human == 0)
                return "tie";

            else if ($human == 1)
                return "you won";

            else if ($human == 2)
                return "you lose";
        }
        else if ($computer == 1)
        {
            if ($human == 0)
                return "you lose";
        
            else if ($human == 1)
                return "tie";
        
            else if ($human == 2)
                return "you won";
        }
        else if ($computer == 2)
        {
            if ($human == 0)
                return "you won";
            
            else if ($human == 1)
                return "you lose";
        
            else if ($human == 2)
                return "tie";
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>kusay's game 05a50bbe</title>
    </head>
    <body>
        <h1>Rock Paper Scissors</h1>
        <p>Welcome: <?= htmlentities($_GET['who']); ?></p>
        <form method="POST">
            <select name="human" >
                <option value="-1" selected>Select</option>
                <option value="0" >Rock</option>
                <option value="1" >Paper</option>
                <option value="2" >Scissors</option>
                <option value="3" >Test</option>
            </select>

            
            <input type="submit" value="Play">
            <input type="submit" name="logout" value="Logout">
        </form>
        <div style="width : auto; background-color : silver; padding : 10px;">
            <?php 
                $result = check($computer,$human);
                if ($human == -1)
                    echo "Please select a strategy and press Play.";
                else if ($human == 3)
                {
                    for ($i = 0; $i < 3; $i++)
                        for ($j = 0; $j < 3; $j++)
                        {
                            $r = check($j, $i);
                            print "Your Play=$names[$i] Computer Play=$names[$j] Result=$r<br>";
                        }
                }
                else
                print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n"; 
            ?>
        </div>
        <?php 
            if ($human != -1 && $human != 3)
            {
                echo "<b style='font-size : 23px; margin-right : 20px;'>COMPUTER</b>\tVS. <b style='font-size : 23px;margin-left : 20px'>YOU</b><br>";
                echo "<img src='$photo[$computer]' style='width : 100px; height : 100px; margin-right : 50px; margin-left : 10px;'>";
                echo "<img src='$photo[$human]' style='width : 100px; height : 100px; margin-left : 20px;'><br>";
                echo "<h1 style='margin-left : 50px'>" . check($computer,$human) . "</h1>";
            }
        ?>
        </body>
</html>
