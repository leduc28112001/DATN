<?php 
class Category_Controller{
    private $db;
    private $categoryModel;
    private $productModel;
    public function __construct(mysqli $db){
        $this->db = $db;
        $this->categoryModel = new Category_Model($this->db);
        $this->productModel = new Product_Model($this->db);
    }
    function showCategories(){
        $result = $this->categoryModel->showCategoriesList();
        include './categories/categories.php';
    }
    function addCategory(){
        $result = $this->categoryModel->createCategory();
        include './categories/add-category.php';
    }
    function editCategory(){
        $dataOld = $this->categoryModel->dataCategoryOld();
        if(isset($dataOld)){
            $result = $this->categoryModel->editCategory();
            include './categories/edit-category.php';
        }else{
            header("Location: ../404/");
        }
    }
    function deleteCategory(){
        $result = $this->categoryModel->showCategoriesList();
        $alertDelete = $this->categoryModel->deleteCategory();
        include './categories/categories.php';
    }
    function showCategoriesAside(){
        $categories = $this->categoryModel->showCategoriesList();
        $top5 = $this->productModel->topProduct();
        include './layout/aside.php';
    }
}
?>