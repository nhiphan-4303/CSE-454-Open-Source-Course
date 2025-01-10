<?php
get_header();
?>
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php bloginfo('url') ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php single_cat_title(); ?></li>
        </ol>
    </div>
</nav>

<main id="content">
    <div class="container">
        <?php
        $args = array(
            "posts_per_page" => 4,
            "s" => get_search_query(),
        );

        $results = new WP_Query($args);

        if ($results->have_posts()) {
        ?>

            <!-- <?php
                    // Truy vấn tìm kiếm với giới hạn 4 bài viết
                    // $args = array(
                    //     "posts_per_page" => 4,
                    //     "s" => get_search_query(), // Lấy từ khóa tìm kiếm
                    //     "category_name" => "news"  // Giới hạn trong danh mục 'news'
                    // );

                    // $results = new WP_Query($args);
                    // if ($results->have_posts()) {
                    ?> -->

            <div class="san-pham-group mt-25">
                <div class="title-background">
                    <h2>Kết quả tìm kiếm: <?php echo get_search_query(); ?></h2>
                </div>

                <div class="row">

                    <?php
                    while (have_posts()) {
                        the_post();
                    ?>

                        <div class="col-6 col-sm-6 col-md-3">
                            <article class="group-product">
                                <a href=" <?php the_permalink() ?>">
                                    <div class="group-info">

                                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']); ?>

                                        <div class="info-hover"></div>
                                    </div>
                                    <div class="san-pham-title"><?php the_title() ?></div>
                                    <div class="san-pham-price">Giá: <span><?php the_field("product-price", get_the_ID()); ?></span></div>
                                </a>
                            </article>
                        </div>

                    <?php }
                    wp_reset_postdata();
                    ?>

                </div>
            </div>

        <?php }
        wp_reset_postdata(); // Reset lại query
        ?>
    </div>
</main>
<?php
get_footer();
?>