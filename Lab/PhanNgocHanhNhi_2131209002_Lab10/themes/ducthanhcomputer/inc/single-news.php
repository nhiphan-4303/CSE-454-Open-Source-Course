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
        <?php while (have_posts()) {
            the_post();
        ?>

            <article id="post-7" class="post-7 page type-page status-publish hentry">
                <h1 class="entry-title"> <?php the_title(); ?></h1>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>

        <?php } ?>
    </div>

    <div class="related-article">
        <h2 class="block-title line-left mb-40">Bài viết cùng chuyên mục</h2>
        <div class="row">

            <div class="col-12 col-sm-12 col-md-6">
                <article class="article-group">
                    <div class="row">
                        <div class="col-6 col-sm-4 col-md-4">
                            <a href="http://10.10.114.153/ducthanhcomputer/bo-mach-chu-amd-b550-ra-mat-vao-thang-6/">
                                <img class="img-fluid" src="http://10.10.114.153/ducthanhcomputer/wp-content/uploads/2020/11/2-CPU-Moi-cua-AMD-se-gia-nhap-dong-Ryzen-3000-1.png">
                            </a>
                        </div>
                        <div class="col-6 col-sm-8 col-md-8">
                            <a href="http://10.10.114.153/ducthanhcomputer/bo-mach-chu-amd-b550-ra-mat-vao-thang-6/">
                                <h2 class="article-title">Bo mạch chủ AMD B550 ra mắt vào tháng 6</h2>
                            </a>
                            <p class="article-date"><i class="fa fa-calendar" aria-hidden="true"></i> 04/11/2020</p>
                            <p class="article-excerpt d-none d-sm-block">Đầu năm nay, có thông tin rằng AMD sẽ bắt đầu sản xuất hàng loạt chipset B550 và A520 vào...</p>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-12 col-sm-12 col-md-6">
                <article class="article-group">
                    <div class="row">
                        <div class="col-6 col-sm-4 col-md-4">
                            <a href="http://10.10.114.153/ducthanhcomputer/card-nvidia-geforce-rtx-3000-series-se-ra-mat-vao-thang-9-2020/">
                                <img class="img-fluid" src="http://10.10.114.153/ducthanhcomputer/wp-content/uploads/2020/11/nvidia-rtx-3080-ti-1140x570-1-1024x512-1.jpg">
                            </a>
                        </div>
                        <div class="col-6 col-sm-8 col-md-8">
                            <a href="http://10.10.114.153/ducthanhcomputer/card-nvidia-geforce-rtx-3000-series-se-ra-mat-vao-thang-9-2020/">
                                <h2 class="article-title">Card NVIDIA GeForce RTX-3000 series Sẽ ra mắt vào tháng 9/2020</h2>
                            </a>
                            <p class="article-date"><i class="fa fa-calendar" aria-hidden="true"></i> 04/11/2020</p>
                            <p class="article-excerpt d-none d-sm-block">Như chúng ta đã biết NVIDIA đã giới thiệu cấu trúc Ampere sử dụng trên card đồ họa mới của...</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>