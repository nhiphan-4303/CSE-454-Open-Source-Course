<?php
get_header();
?>
<main class="">
    <div class="container slogan-group">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="slogan">
                    <div class="media">
                        <img src="http://10.10.114.153/ducthanhcomputer/wp-content/themes/ducthanh/images/gia-ca-canh-tranh.png"
                            class="align-self-center mr-3" alt="">
                        <div class="media-body">
                            <h5 class="">Giá cả cạnh tranh</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="slogan">
                    <div class="media">
                        <img src="http://10.10.114.153/ducthanhcomputer/wp-content/themes/ducthanh/images/san-pham-chinh-hang.png"
                            class="align-self-center mr-3" alt="">
                        <div class="media-body">
                            <h5 class="">Sản phẩm chính hãng</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="slogan">
                    <div class="media">
                        <img src="http://10.10.114.153/ducthanhcomputer/wp-content/themes/ducthanh/images/hang-hoa-da-dang.png"
                            class="align-self-center mr-3" alt="">
                        <div class="media-body">
                            <h5 class="">Hàng hóa đa dạng</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="slogan">
                    <div class="media">
                        <img src="http://10.10.114.153/ducthanhcomputer/wp-content/themes/ducthanh/images/dich-vu-toi-uu.png"
                            class="align-self-center mr-3" alt="">
                        <div class="media-body">
                            <h5 class="">Dịch vụ tối ưu</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <?php
        $args = array(
            "category_name" => "laptop",
            "posts_per_page" => 4,
        );

        $results = new WP_Query($args);

        if ($results->have_posts()) {
        ?>

            <div class="san-pham-group mt-25">
                <div class="title-background">
                    <h2>LAPTOP</h2>
                </div>

                <div class="row">

                    <?php
                    while ($results->have_posts()) {
                        $results->the_post();
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

        <?php } ?>


        <div class="loi-cam-on">
            Vi tính <b>ĐỨC THÀNH</b> xin cảm ơn Quý khách đã tin tưởng và sử dụng sản phẩm của chúng tôi
        </div>

    </div>

    <div class="news">
        <div class="container">

            <a href="<?php the_permalink() ?>">
                <h3 class="news-title"><span>TIN TỨC</span></h3>
            </a>

            <?php
            $args = array(
                "category_name" => "tin-tuc",
                "posts_per_page" => 3,
            );

            $results = new WP_Query($args);

            if ($results->have_posts()) {
            ?>
                <div class="row">

                    <?php
                    while ($results->have_posts()) {
                        $results->the_post();
                    ?>
                        <div class="col-12 col-sm-6 col-md-4">
                            <article class="news-item">
                                <a
                                    href="<?php the_permalink() ?>">
                                    <div>
                                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']); ?>
                                    </div>
                                    <div class="news-sub-title"><?php the_title(); ?></div>
                                </a>

                                <div class="news-excerpt"><?php the_excerpt(); ?>
                                </div>

                                <a class="btn btn-outline-primary"
                                    href="<?php the_permalink() ?>"
                                    role="button">Xem thêm
                                </a>
                            </article>
                        </div>
                    <?php }
                    wp_reset_postdata();
                    ?>

                </div>

            <?php } ?>
        </div>
    </div>

</main>

<?php
get_footer();
?>