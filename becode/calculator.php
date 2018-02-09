<?php

    if(!empty($_POST['number1']) AND !empty($_POST['number2']) AND !empty($_POST['operator'])){
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $operator = $_POST['operator'];
        $result = "";
        $modulo = "";

        /*//Checking Operator using if...elseif
        if($operator == '+'){
            $result = $number1 + $number2;
            echo "<script>alert(" . $result . ")</script>";
        }
        elseif($operator == '-'){
            $result = $number1 - $number2;
            echo "<script>alert(" . $result . ")</script>";
        }
        elseif($operator == '*'){
            $result = $number1 * $number2;
            echo "<script>alert(" . $result . ")</script>";
        }
        elseif($operator == '/'){

            if($number2 == 0){
                echo "<script>alert(\"Dividing by 0 is impossible\")</script>"; 
            }
            $result = $number1 / $number2;
            $modulo = $number1%$number2;
            if($modulo != 0){
                ?>
                    <script>alert("Result: " + <?php echo intval($result) ?> + "\nLeft: " + <?php echo $modulo ?>);</script>
                <?php
            }
            else{
                echo "<script>alert(" . $result . ")</script>";
            }
        }
        else{
            echo "<script>alert(\"Please enter a valid operator\")</script>";
        }*/
        
        /*//checking Operator using switch
        switch($operator){
            case "+":
                $result = $number1 + $number2;
            Break;
            case "-":
                $result = $number1 - $number2;
            Break;
            case "*":
                $result = $number1 * $number2;
            Break;
            case "/":
                $result = $number1 + $number2;
                $modulo = $number1 % $number2;
            Break;
            default:
                $operator = null;
            Break;
        }*/
    }






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
    <input type="number" name="number1">
    <input type="number" name="number2">
    <input type="text" name="operator">
    <input type="submit">
    <input type="reset" value="AC">
</form>
<p>
    <?php
        /*//Complement of the switch
        if(isset($_POST['number1']) AND isset($_POST['number2']) AND !isset($operator)){
            echo "Enter a valid operator";
        }
        if(isset($result)){
            if($modulo != 0){
                echo "Result: " . intval($result) . "<br/>Left: " . $modulo;
            }
            else{
                echo "Result: " . $result;
            }
        }*/

        
    ?>
</p>




    
</body>
</html>