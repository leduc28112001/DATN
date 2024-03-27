<?php

class Blog_Controller{
    private $db;
    private $blogModel;
    function __construct(mysqli $db){
        $this->db = $db;
        $this->blogModel = new Blog_Model($this->db);
    } 
    function showBlogListWeb(){
        $blogs = $this->blogModel->showBlogListWeb();
        include './views/blogs.php';
    }
    function showBlogList(){
        $blogs = $this->blogModel->showBlogList();
        include './blogs/blogs.php';
    }
    function showBlogById(){
        $result = $this->blogModel->showBlogById();
        include './views/read-blog.php';
    }
    function addBlog(){
        $result = $this->blogModel->addBlog();
        include './blogs/add-blog.php';
    }
    function editBlog(){
        $dataOldBlog = $this->blogModel->dataOldBlog();
        $result = $this->blogModel->editBlog();
        include './blogs/edit-blog.php';
    }
    function updateBlog(){
        $alertUpdate = $this->blogModel->updateblog();
        include './blogs/blogs.php';
    }
    function deleteBlog(){
        $alertDelete = $this->blogModel->deleteblog();
        include './blogs/blogs.php';
    }
}