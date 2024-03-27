<link rel="stylesheet" href="./assets/css/blogs-style.css">
<?= titlePage("Bài viết") ?>
<main>
    <div class="all-blogs">
        <?php
        if(isset($blogs)){
            foreach($blogs as $blog){
                ?>
                <div class="blog">
                    <div class="blog-image">
                        <a href="./?page=read-blog&id=<?= $blog['id'] ?>"><img src="./assets/image/<?= $blog['image'] ?>" alt="LocTuan"></a>
                    </div>
                    <div class="blog-information">
                        <div class="blog-category-date">
                            <a href="./?page=read-blog&id=<?= $blog['id'] ?>"><span>LocTuan</span></a>
                            <a href="./?page=read-blog&id=<?= $blog['id'] ?>"><span><?= date("d-m-Y", strtotime($blog['createdate'])) ?></span></a>
                        </div>
                        <div class="blog-title">
                            <a href="./?page=read-blog&id=<?= $blog['id'] ?>"><span><?= $blog['title'] ?></span></a>
                        </div>
                        <div class="blog-description">
                            <a href="./?page=read-blog&id=<?= $blog['id'] ?>"><span><?= $blog['description'] ?></span></a>
                        </div>
                    </div>
                </div>
                <?php //HTML
            }
        }else{
            messRed("Chưa có bài viết nào");
        }
        /* ------------------------------------ - ----------------------------------- */
        ?>
    </div>
</main>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
<script src="./assets/javascript/search.js"></script>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
