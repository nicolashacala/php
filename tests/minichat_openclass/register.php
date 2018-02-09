<?php
//connect db
try{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    die('Erreur: ' . $e->getMessage());
} 
// check information
if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['email']) && !empty($_POST['email'])){
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];

    $req = $bdd->prepare('SELECT id FROM members WHERE pseudo = :pseudo');
    $req->execute(array(

        'pseudo' => $pseudo
    ));

    $resultat = $req->fetch();

    //check is pseudo already in db
    if ($resultat){
        echo 'Already used Pseudo';
    }
    //check if email already in db
    else{
        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)){
            $req = $bdd->prepare('SELECT id FROM members WHERE email = :email');
            $req->execute(array(
                'email' => $email
            ));
            $resultat = $req->fetch();

            if ($resultat){
                echo 'Already used Email';
            }
            else{
                // password hash
                $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

                // Insertion
                $req = $bdd->prepare('INSERT INTO members(pseudo, pass, email, inscription_date) VALUES(:pseudo, :pass, :email, CURDATE())');
                $req->execute(array(
                    'pseudo' => $pseudo,
                    'pass' => $pass_hash,
                    'email' => $email
                ));
                header('Location: login.php');
            }
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
    <title>Register to Kobal's club</title>
</head>
<body>
    <form action="" method="POST">
        <label for="pseudo">Choose a pseudo</label>
        <input type="text" name="pseudo">
        <label for="password">Choose a password</label>
        <input type="password" name="password">
        <label for="email">Your email adress</label>
        <input type="text" name="email">
        <input type="submit">
    </form>


</body>
</html>