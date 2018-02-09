<?php
namespace Openclassroom\Blog\Model;

require_once('model/Manager.php');

class ModificationManager extends Manager{
    public function getComment($commentId){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, comment, author, comment_date FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();
    
        return $comment;
    }
    
    public function insertNewComment($newComment, $commentId){
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET comment = ? WHERE id = ?');
        $comments->execute(array($newComment, $commentId));
    
    }
}