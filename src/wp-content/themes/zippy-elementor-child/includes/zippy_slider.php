<?php

function banner_slider_short_code()
{
    $post_id = get_the_ID();

    $slides = get_field('banner_sliders', $post_id);

    if (!$slides || !is_array($slides)) {
        return '<p>No slides found.</p>';
    }
    $titles = [];

    ob_start();
    echo '<div class="zippy-banner-slider swiper"> <div class="swiper-wrapper">';
    foreach ($slides as $slide) {
        $image_url = $slide['slide_banner'];
        $title = $slide['slide_title'];
        $titles[] = $slide['slide_title'];
        $subtitle = $slide['slide_sub_title'];
        $link_to = $slide['slide_link_to'];
?>
        <div class="swiper-slide">
            <div class="custom-slide-bg h-100" style="background-image: url(<?php echo $image_url ?>);">
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <h2 class="mb-3"><?php echo $title ?? "" ?></h2>
                    <p class="sub-title"><?php echo $subtitle ?></p>
                    <a class="btn zippy-trans-btn" href="<?php echo $link_to ?>">Learn More</a>
                </div>
            </div>
        </div>
    <?php
    }
    echo '</div> </div>';
    ?>
    <div class="swiper-custom-pagination">
        <div class="pagination-container">
            <?php foreach ($titles as $i => $title): ?>
                <span class="custom-pagination-item" data-index="<?php echo $i ?>"> <?php echo esc_html($title) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    ?>
<?php
    return ob_get_clean();
}

add_shortcode('banner_slider', 'banner_slider_short_code');
