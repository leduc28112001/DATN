<!-- /* -------------------------------- COMMENTS -------------------------------- */ -->
<div id="comments">
    <div class="title-details-description-pdts">
        Bình luận của sản phẩm
    </div>
    <!-- KIỂM TRA ĐĂNG NHẬP -->
    <?php 
    if(isset($_SESSION["user"])){
        ?>
        <div class="input-comment">
            <form action="" method="POST" onsubmit="return false">
                <input type="text" placeholder="Nhập bình luận" id="content-comment">
                <input type="hidden" id="productId" value="<?= isset($_GET["id"]) ? $_GET["id"] : "" ?>">
                <button id="comment">Gửi</button>
            </form>
        </div>
        <?php // HTML
    }
    ?>
    <!-- KIỂM TRA ĐĂNG NHẬP -->
    <div class="all-comments">
        <?php 
        if(isset($comments)){
            foreach ($comments as $comment):
                ?>
                <div class="user-comment">
                    <div class="item-user-comment">
                        <div class="avatar-user-comment">
                            <img width="80px" src="https://event.mediacdn.vn/2020/8/14/st-15973999489741584015103.jpg" alt="">
                        </div>
                        <div class="infor-user-comment">
                            <div class="name-user-comment">
                                <?= $comment['userComment'] ?>
                            </div>
                            <div class="comment-date">
                                <?= $comment['commentTime'] ?>
                            </div>
                            <div class="content-comment-user">
                                <?= $comment['content'] ?>
                            </div>
                        </div>
                    </div>
                    <!-- XỬ LÍ XÓA BÌNH LUẬN CỦA BẢN THÂN -->
                    <?php 
                    if(isset($_SESSION["user"]) && $_SESSION["user"]['id'] === $comment['userId']){
                        ?>
                        <input type="hidden" value="<?= $comment['content'] ?>" class="content-delete">
                        <button class="delete-comment"><i class="fa-solid fa-xmark"></i></button>
                        <?php //HTML
                    }
                    ?>
                    <!-- XỬ LÍ XÓA BÌNH LUẬN CỦA BẢN THÂN -->
                </div>
                <?php // HTML
            endforeach;
        }else{
            messRed("Chưa có bình luận nào");
        }
        ?>
        <div class="user-comment" id="new-comment"></div>
    </div>
</div>
<!-- /* -------------------------------- COMMENTS -------------------------------- */ -->