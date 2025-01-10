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
    <div class="news">
        <div class="container">

            <a href="<?php the_permalink() ?>">
                <h3 class="news-title"><span>TIN TỨC</span></h3>
            </a>

            <?php
            if (have_posts()) {
            ?>
                <div class="row">

                    <?php
                    while (have_posts()) {
                        the_post();
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