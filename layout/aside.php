<aside>
    <!-- /* ------------------------------ CATEGORY LIST ----------------------------- */ -->
    <div class="category-list">
        <ul>
            <li><i class="fa-solid fa-list"></i> Danh mục sản phẩm</li>
            <li><a href="?page=shop">Tất cả sản phẩm</a></li>
            <?php 
            if(isset($categories)){
                foreach ($categories as $category) :
                ?>
                <li>
                    <a class="filter-link" data-category="<?= $category['id'] ?>" href="#"><?= $category['categoryName'] ?></a>
                </li>
                <?php // HTML
                endforeach;
            }else{
                ?><span class="span-red">Chưa có danh mục nào</span><?php // HTML
            }
            ?>
        </ul>
    </div>
    <!-- /* ------------------------------ CATEGORY LIST ----------------------------- */ -->
    <!-- /* ---------------------------- BEST SELLER LIST ---------------------------- */ -->
    <div id="best-seller-list">
        <span class="title-best-seller">
            <i class="fa-solid fa-ranking-star"></i> Top sản phẩm hàng đầu
        </span>
        <?php
        if(isset($top5)){
            foreach($top5 as $product) :
            ?>
                <a href="?page=details&id=<?= $product['id'] ?>">
                    <div class="best-seller">
                        <img width="80px" src="./assets/image/<?= $product['image'] ?>" alt="">
                        <span><?= $product['productName'] ?></span>
                    </div>
                </a>
            <?php // HTML
            endforeach;
        }else{
            ?><span class="span-red">EMPTY</span><?php // HTML
        }
        ?>
    </div>
    <!-- /* ---------------------------- BEST SELLER LIST ---------------------------- */ -->
</aside>

