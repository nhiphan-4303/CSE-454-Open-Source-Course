<?php
get_header();
?>
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php bloginfo('url') ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
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
</main>
<?php
get_footer();
?>