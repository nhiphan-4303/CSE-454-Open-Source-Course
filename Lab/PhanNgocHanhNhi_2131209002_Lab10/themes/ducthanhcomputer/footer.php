<footer id="footer">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="footer-title">CỬA HÀNG VI TÍNH ĐỨC THÀNH</div>
                    <p class="footer-gioithieu">Chuyên cung cấp, sửa chữa máy tính, laptop, máy in, PC gaming và lắp
                        đặt camera. Với hơn 8 năm kinh nghiệm, chúng tôi cam kết mang đến sự hài lòng cho Quý khách.
                    </p>
                    <ul class="footer-diachi">
                        <li><i class="fa fa-map-marker" style="margin-right: 7px;"></i> <span>960 KP. 4, P. Thới
                                Hòa, TX. Bến Cát, Bình Dương</span></li>
                        <li><i class="fa fa-phone"></i> <span>0969 609 639</span> - <span>0909 291 908</span></li>
                        <li><i class="fa fa-envelope-o"></i> <a
                                href="mailto:vitinhducthanhbcbd@gmail.com">vitinhducthanhbcbd@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-2">
                    <div class="footer-title">LIÊN KẾT</div>
                    <div class="footer-lien-ket">
                        <!-- <ul id="menu-top-menu-1" class="foot-link">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-12"><a
                                    href="http://www.vitinhducthanh.com/">Trang chủ</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14"><a
                                    href="http://10.10.114.153/ducthanhcomputer/gioi-thieu/">Giới thiệu</a></li>
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-46"><a
                                    href="http://10.10.114.153/ducthanhcomputer/category/tin-tuc/">Tin tức</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13"><a
                                    href="http://10.10.114.153/ducthanhcomputer/bao-hanh/">Bảo hành</a></li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15"><a
                                    href="http://10.10.114.153/ducthanhcomputer/lien-he/">Liên hệ</a></li>
                        </ul> -->
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu',
                                'menu_class' => 'foot-link',
                                'menu_id' => 'menu-top-menu-1',
                                'container' => '',
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="footer-title">BẢN ĐỒ</div>
                    <div class="map-link">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2327.9248386628783!2d106.61967255384633!3d11.106871116343257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174cc2ee4ada99f%3A0x1dac4e4ab30b73b6!2zVmkgVMOtbmggxJDhu6ljIFRow6BuaA!5e0!3m2!1sen!2s!4v1604471850193!5m2!1sen!2s"
                            width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="copyright">
        <div class="container">
            Copyright © 2024 Vi tính Đức Thành.
        </div>
    </div>
</footer>

<span class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i></span>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous">
</script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > 100) {
                jQuery('#btn-scrollup').fadeIn();
            } else {
                jQuery('#btn-scrollup').fadeOut();
            }
        });

        jQuery('#btn-scrollup').click(function() {
            jQuery("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });
</script>

<span id="PING_IFRAME_FORM_DETECTION" style="display: none;"></span>
</body>

</html>