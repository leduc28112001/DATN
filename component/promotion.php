<div class="all-discounts">
    <?php
    if (!is_null($result)) {
        foreach ($result as $promotion) {
        ?>
            <div class="item-code-discount">
                <div class="infor-item-code">
                    <span><?= $promotion['promotionName'] ?></span>
                    <span><?= ($promotion['percent'] > 0) ? "Giảm " . $promotion['percent'] : "" ?></span>
                    <span><br> <?= date("d/m/Y", strtotime($promotion['startDate'])) ?> đến <?= date("d/m/Y", strtotime($promotion['endDate'])) ?></span>
                </div>
                <div class="add-code-discount">
                    <button>Lấy mã</button>
                </div>
            </div>
        <?php //HTML
        }
    }else{
        messRed("Chưa có khuyến mãi nào");
    }
    ?>
</div>