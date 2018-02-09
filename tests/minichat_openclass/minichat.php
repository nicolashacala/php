<?php
//session
session_start();
if(isset($_SESSION['pseudo'])){
    echo "Hi " . $_SESSION['pseudo'];
}
else{
    header('location: login.php');
}
//connect db
try{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    die('Erreur: ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_message, \'%d/%m/%Y à %Hh%imin%ss\') AS date_message_fr FROM mini_chat ORDER BY date_message DESC LIMIT 0, 5') or die(print_r($bdd->errorInfo()));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style_mini_chat.css">
    <title>Mini-Chat</title>
</head>
<body>
    <form action="minichat_post.php" method="post">
        <label for="message">Your message</label>
        <textarea name="message" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Send">
    </form>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
    
    <div class="chat">
        <?php
        while ($donnees = $reponse->fetch()){
            ?>
                <p><strong><?php echo htmlspecialchars($donnees['pseudo']); ?></strong> le <?php echo $donnees['date_message_fr']; ?></p>
                <p><?php echo nl2br(htmlspecialchars($donnees['message'])); ?></p>
            <?php
        }
        
        $reponse->closeCursor(); // Termine le traitement de la requête
        ?>
    </div>
    
   



</body>
</html>