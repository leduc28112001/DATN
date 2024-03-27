<style>
    img{
        width: 100%;
    }
</style>
<main>
    <?php 
    if(isset($result)){
        ?>
        <div id="read-blog">
            <h1><?= $result['title'] ?></h1>
            <?= $result['content'] ?>
        </div>
        <?php //HTML
    }else{
        ?><script>window.location.href = '?page=blogs'</script><?php //SCRIPT
    }
    ?>
    <!-- /* -------------------------------- ALL BLOG -------------------------------- */ -->
    <br>
    <h2>Các bài viết khác</h2>
    <!-- /* -------------------------------- ALL BLOG -------------------------------- */ -->
</main>