<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<?php
    if(isset($_POST['password']) AND $_POST['password'] == 'kangourou'){
        echo 'Vous pouvez accéder aux codes secrets';
    }
    else{
        echo 'Vos codes ne sont pas autorisés';
    }





?>
</body>
</html>