<header>
    <div class="header-top">
        <div class="logo"><a href="?page=home"><i class="fa-brands fa-shopify"></i> LocTuan</a></div>
        <!-- /* ----------------------------- SEARCH DESKTOP ----------------------------- */ -->
        <form method="POST" action="?page=search" class="search" onsubmit="return true">
            <input type="text" name="keyword" id="keyword" placeholder="Bạn muốn mua gì hôm nay?">
            <button name="search" id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <!-- /* ----------------------------- SEARCH DESKTOP ----------------------------- */ -->
        <div class="bell-cart-user">
            <a href="#">
                <i class="fa-regular fa-bell"></i>
                <span>0</span>
                <div class="notification">
                    <span>
                        <i class="fa-solid fa-bullhorn"></i>
                        Chào mừng bạn đến với chúng tôi !!!
                        <div class="notification-time">2024-01-25</div>
                    </span>
                </div>
            </a>
            <a href="?page=cart">
                <i class="fa-solid fa-bag-shopping"></i>
                <span id="quantityCart">
                    <?php
                    $db = require './config/database.php';
                    $newCartCtrl = new Cart_Controller($db);
                    echo $newCartCtrl->quantityCart();
                    ?>
                </span>
                <input type="hidden" id="quantityCartOld" value="<?= $newCartCtrl->quantityCart() ?>">
            </a>
            <?php
            if (isset($ss_role) && isset($ss_id)) { // Kiểm tra đã đăng nhập chưa
            ?>
                <div class="user">
                    <i class="fa-regular fa-user"></i>
                    <div class="profile-item">
                        <a href="?page=profile"><i class="fa-regular fa-user"></i> Hồ sơ</a>
                        <!-- NHỚ VALIDATE  -->
                        <?php
                        if ($ss_role === "admin" || $ss_role === "staff") {
                            ?><a href="?page=admin"><i class="fa-solid fa-screwdriver-wrench"></i> Quản trị</a><?php // HTML
                        }
                        ?>
                        <!-- NHỚ VALIDATE  -->
                        <a href="./auth/?action=logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a>
                    </div>
                </div>
            <?php //HTML
            }else{
            ?><a href="./auth/?action=logout"><i class="fa-regular fa-user"></i></a><?php // HTML
            }
            ?>
        </div>
        <!-- /* --------------------------- FORM SEARCH MOBILE --------------------------- */ -->
        <form method="POST" action="?page=search" class="search search-mobile" onsubmit="return true">
            <input type="text" name="keyword" id="keyword_mobile" placeholder="What do you want to buy today?">
            <button name="search" id="search_mobile"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <!-- /* --------------------------- FORM SEARCH MOBILE --------------------------- */ -->
    </div>
    <!-- /* ----------------------------------- NAV ---------------------------------- */ -->
    <nav>
        <ul class="menu">
            <li class="menu-item">
                <a href="?page=fillter&categoryId=89">Giày nữ</a>
                <ul class="sub-menu">
                    <li class="sub-menu-item">
                        <a href="?page=fillter&categoryId=89">Giày thể thao nữ</a>
                    </li>
                    <li class="sub-menu-item">
                        <a href="?page=fillter&categoryId=93">Giày cao gót</a>
                        <ul class="sub-menu-2">
                            <li><a href="?page=fillter&categoryId=102">Giày cao gót bít mũi</a></li>
                            <li><a href="?page=fillter&categoryId=103">Giày Sandal cao gót</a></li>
                            <li><a href="?page=fillter&categoryId=104">Dép cao gót</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu-item">
                        <a href="?page=fillter&categoryId=92">Sandal nữ</a>
                    </li>
                    <li class="sub-menu-item">
                        <a href="?page=fillter&categoryId=97">Dép sục</a>
                        <ul class="sub-menu-2">
                            <li><a href="?page=fillter&categoryId=107">Sục cao gót</a></li>
                            <li><a href="?page=fillter&categoryId=108">Sục bệt</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu-item">
                        <a href="?page=fillter&categoryId=98">Giày búp bê & Mọi</a>
                    </li>
                    <li class="sub-menu-item">
                        <a href="?page=fillter&categoryId=99">OxFord & Boot</a>
                    </li>
                    <li class="sub-menu-item">
                        <a href="?page=fillter&categoryId=95">Dép nữ</a>
                        <ul class="sub-menu-2">
                            <li><a href="?page=fillter&categoryId=100">Dép bệt</a></li>
                            <li><a href="?page=fillter&categoryId=101">Dép đế cao</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="?page=fillter&categoryId=90">Giày nam</a>
                <ul class="sub-menu">
                    <li class="sub-menu-item">
                        <a href="?page=fillter&categoryId=90">Giày thể thao nam</a>
                    </li>
                    <li class="sub-menu-item">
                        <a href="?page=fillter&categoryId=91">Sandal nam</a>
                    </li>
                    <li class="sub-menu-item">
                        <a href="?page=fillter&categoryId=94">Dép nam</a>
                    </li>
                    <li class="sub-menu-item">
                        <a href="?page=fillter&categoryId=105">Giày tây & Slip On</a>
                    </li>
                    <li class="sub-menu-item">
                        <a href="?page=fillter&categoryId=106">Boot nam & OxFord</a>
                    </li>
                </ul>
            </li>
           
            <li class="menu-item">
                <a href="?page=blogs">Bài viết</a>
            </li>
            <li class="menu-item">
                <a href="?page=contact">Liên hệ</a>
            </li>
        </ul>
    </nav>
    <!-- /* ----------------------------------- NAV ---------------------------------- */ -->
</header>