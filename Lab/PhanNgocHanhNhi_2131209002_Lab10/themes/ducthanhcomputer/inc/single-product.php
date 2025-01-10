<?php get_header() ?>
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php bloginfo('url') ?>">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?php the_title() ?></li>
        </ol>
    </div>
</nav>

<main id="content">
    <div class="container">
        <?php
        while (have_posts()) {
            the_post();
        ?>

            <article id="post-339" class="post-339 post type-post status-publish format-standard has-post-thumbnail hentry category-gears category-san-pham-ban-chay">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4">
                        <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']); ?>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a>
                            <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a>
                            <ol class="carousel-indicators list-inline">
                                <li class="list-inline-item active">
                                    <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel">
                                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']); ?>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-8">
                        <h1 class="entry-title">
                            <h1><?php the_title() ?></h1>
                            <div class="entry-price">Giá: <span><?php the_field("product-price", get_the_ID()); ?></span></div>
                            <div class="entry-content">
                                <p><?php the_content(); ?></p>
                            </div>
                            <div class="promotion-groups">
                                <div class="promotion-title">Khuyến mãi</div>
                                <div class="promotion-detail">Bảo hành 24 tháng</div>
                            </div>
                    </div>
                </div>

                <div class="detail-product">
                    <h2 class="product-sub-title"><span>MÔ TẢ SẢN PHẨM</span></h2>
                </div>
            </article>

        <?php } ?>

        <div class="related-article">
            <h2 class="block-title line-left mb-40">Bài viết cùng chuyên mục</h2>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6">
                    <article class="article-group">
                        <div class="row">
                            <div class="col-6 col-sm-4 col-md-4">
                                <a href="http://10.10.114.153/ducthanhcomputer/chuot-dareu-em908-led-rgb/">
                                    <img class="img-fluid" src="http://10.10.114.153/ducthanhcomputer/wp-content/uploads/2020/11/bba8ca8743757ea528aecf8d9479ec4b.jpg">
                                </a>
                            </div>
                            <div class="col-6 col-sm-8 col-md-8">
                                <a href="http://10.10.114.153/ducthanhcomputer/chuot-dareu-em908-led-rgb/">
                                    <h2 class="article-title">CHUỘT DAREU EM908 LED RGB</h2>
                                </a>
                                <p class="article-date">Giá: <span>390.000</span></p>
                                <p class="article-excerpt d-none d-sm-block">– Kiểu kết nối: Có dây – Cảm biến: BRAVO ATG4090 – Độ phân giải: 6000 DPI – Màu sắc:...</p>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-12 col-sm-12 col-md-6">
                    <article class="article-group">
                        <div class="row">
                            <div class="col-6 col-sm-4 col-md-4">
                                <a href="http://10.10.114.153/ducthanhcomputer/chuot-e-dra-em6502-led-rgb/">
                                    <img class="img-fluid" src="http://10.10.114.153/ducthanhcomputer/wp-content/uploads/2020/11/51492_chuot_choi_game_e_dra_em6502_pro_0000_1.jpg">
                                </a>
                            </div>
                            <div class="col-6 col-sm-8 col-md-8">
                                <a href="http://10.10.114.153/ducthanhcomputer/chuot-e-dra-em6502-led-rgb/">
                                    <h2 class="article-title">CHUỘT E-DRA EM6502 LED RGB GAMING</h2>
                                </a>
                                <p class="article-date">Giá: <span>390.000</span></p>
                                <p class="article-excerpt d-none d-sm-block">– Chuột gaming E-Dra EM6502 – Độ phân giải 6200 DPI – AVAGO 3327 – Omron switch – Chất liệu...</p>
                            </div>
                        </div>
                    </article>
                </div>


                <div class="col-12 col-sm-12 col-md-6">
                    <article class="article-group">
                        <div class="row">
                            <div class="col-6 col-sm-4 col-md-4">
                                <a href="http://10.10.114.153/ducthanhcomputer/chuot-newmen-n3000-led-gaming/">
                                    <img class="img-fluid" src="http://10.10.114.153/ducthanhcomputer/wp-content/uploads/2020/11/c3a31dc53a483209f780a8f4d952e18b.jpg">
                                </a>
                            </div>
                            <div class="col-6 col-sm-8 col-md-8">
                                <a href="http://10.10.114.153/ducthanhcomputer/chuot-newmen-n3000-led-gaming/">
                                    <h2 class="article-title">Chuột NEWMEN N3000 LED GAMING</h2>
                                </a>
                                <p class="article-date">Giá: <span>360.000</span></p>
                                <p class="article-excerpt d-none d-sm-block">– Cảm biến quang Pixart A3519 – Độ phân giải lên tới 4200 DPI – Led RGB Cá tính –...</p>
                            </div>
                        </div>
                    </article>
                </div>


                <div class="col-12 col-sm-12 col-md-6">
                    <article class="article-group">
                        <div class="row">
                            <div class="col-6 col-sm-4 col-md-4">
                                <a href="http://10.10.114.153/ducthanhcomputer/chuot-newmen-n500-plus/">
                                    <img class="img-fluid" src="http://10.10.114.153/ducthanhcomputer/wp-content/uploads/2020/11/25864_chu___t_newmen_n500_plus_1.jpg">
                                </a>
                            </div>
                            <div class="col-6 col-sm-8 col-md-8">
                                <a href="http://10.10.114.153/ducthanhcomputer/chuot-newmen-n500-plus/">
                                    <h2 class="article-title">Chuột NEWMEN N500 Plus</h2>
                                </a>
                                <p class="article-date">Giá: <span>220.000</span></p>
                                <p class="article-excerpt d-none d-sm-block">– Độ phân giải tùy chỉnh: 800-1000-1200-1600 DPI – Được trang bị Pad Teflon &amp; bi trọng lực để con...</p>
                            </div>
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>