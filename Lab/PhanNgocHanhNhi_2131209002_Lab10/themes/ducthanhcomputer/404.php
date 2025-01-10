<?php get_header(); ?>

<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php bloginfo('url'); ?>">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Không tìm thấy trang</li>
        </ol>
    </div>
</nav>

<main id="content">
    <div class="container">
        <h1 class="entry-title"><span>KHÔNG TÌM THẤY TRANG</span></h1>
        <div class="entry-content">
            <p>Không tìm thấy trang quý khách yêu cầu. Quý khách vui lòng xem trang khác.</p>
            <p>
                <a href="<?php bloginfo('url'); ?>" class="btn btn-primary">Quay lại trang chủ</a>
            </p>
        </div>
    </div>
</main>
<?php get_footer() ?>