<?php
// Kích hoạt tính năng hình ảnh nổi bật (Post Thumbnail)
add_theme_support("post-thumbnails");

// Đăng ký các menu điều hướng
register_nav_menus(

    array(
        "main-menu" => "Main-Menu",
        "product-menu" => "Product-Menu",
        "footer-menu" => "Footer-Menu",
    )
);

function register_my_sidebar()
{
    register_sidebar(
        array(
            'name'          => 'Main Section - Index',
            'id'            => 'main-section-index',
            'description'   => 'Widgets in this area will be shown on index page.',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        )
    );
}
add_action('widgets_init', 'register_my_sidebar');

// Tạo Widget tùy chỉnh - Product Widget
class Product_Widget extends WP_Widget
{
    // Hàm khởi tạo widget
    public function __construct()
    {
        parent::__construct(
            'product-widget',
            'Product Widget',
            array(
                'description' => 'This is a product widget.'
            )
        );
    }

    // Hiển thị widget ngoài trang web
    public function widget($args, $instance)
    {
        $query_args = array(
            "category_name" => $instance['cat-id'], // Slug của category
            "posts_per_page" => 4
        );

        $results = new WP_Query($query_args);

        if ($results->have_posts()) {
?>

            <section class="products">
                <h1 class="product-title"><?php echo esc_html($instance['cat-id']); ?></h1>
                <div class="row">

                    <?php while ($results->have_posts()) {
                        $results->the_post();
                    ?>
                        <div class="col-md-3">
                            <div class="card">
                                <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">More detail</a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </section>

        <?php
            wp_reset_postdata();
        }
    }

    // Form tùy chỉnh widget trong admin
    public function form($instance)
    {
        $catID = !empty($instance['cat-id']) ? $instance['cat-id'] : "";
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat-id')); ?>">Type Your category slug:</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('cat-id')); ?>"
                name="<?php echo esc_attr($this->get_field_name('cat-id')); ?>" type="text"
                value="<?php echo esc_attr($catID); ?>">
        </p>
<?php
    }

    // Lưu và cập nhật dữ liệu
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['cat-id'] = (!empty($new_instance['cat-id'])) ? sanitize_text_field($new_instance['cat-id']) : '';
        return $instance;
    }
}

// Đăng ký widget Product_Widget
add_action('widgets_init', function () {
    register_widget('Product_Widget');
});
