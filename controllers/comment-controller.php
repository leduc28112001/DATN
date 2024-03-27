<?php 
class Comment_Controller{
    private $db;
    private $commentModel;
    public function __construct(mysqli $db){
        $this->db = $db;
        $this->commentModel = new Comment_Model($this->db);
    }
    function showListComment(){
        $result = $this->commentModel->showListComment();
        include './comments/comments.php';
    }
    function showListCommentForProduct(){
        $comments = $this->commentModel->showListCommentForProduct();
        include './component/comment.php';
    }
    function showListCommentDetails(){
        $comments = $this->commentModel->showListCommentDetails();
        include './comments/comment-details.php';
    }
    function quantityComment(){
        $quantityComment = $this->commentModel->quantityComment();
        return $quantityComment;
    }
    function quantityCommentAdmin($productId){
        $quantityComment = $this->commentModel->quantityCommentAdmin($productId);
        return $quantityComment;
    }
    function commentAction(){
        $result = $this->commentModel->createComment();
        return $result;
    }
    function updateRateComment(){
        $update = $this->commentModel->updateRateComment();
        if($update){
            header("Location: ?room=comments");
        }
    }
    function deleteComment(){
        $result = $this->commentModel->deleteComment();
        return $result; 
    }
    function deleteCommentAdmin(){
        $alertDelete = $this->commentModel->deleteCommentAdmin();
        include './comments/comments.php';
    }
    function deleteCommentDetails(){
        $alertDelete = $this->commentModel->deleteCommentAdmin();
        include './comments/comment-details.php';
    }
}
?>