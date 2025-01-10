<?php
if (in_category("tin-tuc")) {
    include get_template_directory() . "/inc/single-news.php";
} else {
    include get_template_directory() . "/inc/single-product.php";
}
?>