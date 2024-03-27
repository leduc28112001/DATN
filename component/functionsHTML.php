<?php 
function messRed($mess){
    ?><span class='span-red'><?= $mess ?></span><?php // HTML
}
function messGreen($mess){
    ?><span class='span-green'><?= $mess ?></span><?php // HTML
}
function messNavi($mess){
    ?><span class='span-navi'><?= $mess ?></span><?php // HTML
}
function titlePage($title){
    ?>
    <input type="hidden" id="titlePage" value="<?= $title ?>">
    <script>document.title = document.getElementById('titlePage').value</script>
    <?php //HTML + JS
}
?>