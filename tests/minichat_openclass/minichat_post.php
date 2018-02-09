<?php
//connect db
try{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    die('Erreur: ' . $e->getMessage());
}
//session
session_start();

$pseudo = $_SESSION['pseudo'];
$message = $_POST['message'];

//Insert message
if(isset($_POST['message']) AND !empty($_POST['message'])){
    $reponse = $bdd->query('SELECT * FROM mini_chat') or die(print_r($bdd->errorInfo()));

    $req = $bdd->prepare('INSERT INTO mini_chat(pseudo, message) VALUES(:pseudo, :message)');

    $req->execute(array(
        'pseudo' => $pseudo,
        'message' => $message
    ));
}

header('Location: minichat.php');
?>