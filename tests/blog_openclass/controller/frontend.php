<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ModificationManager.php');

function listPosts(){
    $postManager = new \Openclassroom\Blog\Model\PostManager();
    $posts = $postManager->getPosts();
    
    require('view/frontend/listPostsView.php');
}

function post(){
    $postManager = new \Openclassroom\Blog\Model\PostManager();
    $post = $postManager->getPost($_GET['id']);
    
    $commentManager = new \Openclassroom\Blog\Model\CommentManager();
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment){
    $commentManager = new \Openclassroom\Blog\Model\CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function comment(){
    $modificationManager = new \Openclassroom\Blog\Model\ModificationManager();
    $comment = $modificationManager->getComment($_GET['id']);

    require('view/frontend/modifyCommentView.php');
}

function modifyComment($newComment, $commentId){
    $modificationManager = new \Openclassroom\Blog\Model\ModificationManager();
    $newComment = $modificationManager->insertNewComment($newComment, $commentId);
    
    header('location: index.php?action=modifyComment&id=' . $commentId);
}