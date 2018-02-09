<?php
//connect db
try{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    die('Erreur: ' . $e->getMessage());
}

//Check Auto Log
if(isset($_COOKIE['pseudo_mini_chat'])&&!empty($_COOKIE['pseudo_mini_chat'])){
    $pseudo = $_COOKIE['pseudo_mini_chat'];

    $req = $bdd->prepare('SELECT id, pseudo FROM members WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $pseudo
    ));

    $resultat = $req->fetch();

    if (!$resultat){
        echo 'This user no longer exists';
    }
    else{
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        header('location: minichat.php');
    }
}

//Check pseudo&pass
if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password'])){
    $pseudo = $_POST['pseudo'];
    $pass = $_POST['password'];
    
    $req = $bdd->prepare('SELECT id, pass FROM members WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $pseudo
    ));

    $resultat = $req->fetch();

    if (!$resultat){
        echo 'This user does not exist';
    }
    else{
        $hash = $resultat['pass'];
        if(password_verify($pass, $hash)){
            if(isset($_POST['auto_log'])){
                setcookie('pseudo_mini_chat', $pseudo, time()+365*24*3600);
            }
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;
            header('location: minichat.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connect to Kobal's club</title>
</head>
<body>
    <form action="" method="POST">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo">
        <label for="password">Password</label>
        <input type="password" name="password">
        <label for="auto_co">Remember me</label>
        <input type="checkbox" name="auto_log">
        <input type="submit">
    </form>
</body>
</html>