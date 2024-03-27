<?php 
class Email_Controller{
    private $db;
    private $emailModel;
    function __construct(mysqli $db){
        $this->db = $db;
        $this->emailModel = new Email_Model($this->db);
    }
    function showEmailList(){
        $result = $this->emailModel->showEmailList();
        include './emails/emails.php';
    }
    function showMessageEmail(){
        $result = $this->emailModel->showMessageEmail();
        include './emails/email-details.php';
    }
    function deleteEmail(){
        $alertDelete = $this->emailModel->deleteEmail();
        include './emails/emails.php';
    }
    function sendMail(){
        $alert = $this->emailModel->sendMail();
        return $alert;
    }
    function replyEmail(){
        $result = $this->emailModel->replyEmail();
        include './emails/reply-email.php';
    }
}
?>