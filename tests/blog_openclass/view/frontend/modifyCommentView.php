<?php $title  = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php?action=listPosts">Retour aux billets</a></p>
<p>Commentaire actuel: </p>

<p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?></p>
<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

<form action="index.php?action=modifyComment&amp;id=<?=$comment['id'] ?>" method="POST">
    <label for="newComment">Nouveau commentaire: </label>
    <textarea name="newComment" cols="30" rows="10"></textarea>
    <input type="submit" value="Modifier">
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>