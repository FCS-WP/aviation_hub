<?php
 
function show_pdf_file() {
    $pdf_file = get_field('pdf_file');
    echo $pdf_file;
}
add_shortcode('show_pdf_file', 'show_pdf_file');

function render_acf_gallery_shortcode($atts) {
    // Attributes: allow passing a post ID if needed
    $atts = shortcode_atts([
        'field' => 'gallery',
        'post_id' => get_the_ID()
    ], $atts);

    $images = get_field($atts['field'], $atts['post_id']);

    if (!$images) {
        return '<p>No gallery found.</p>';
    }

    ob_start();
    $col_spans = [6, 6, 5, 7, 6, 6, 5, 7, 6, 6, 5, 7, 6, 6, 5, 7];
    ?>
    <div class="custom-gallery-grid">
        <?php foreach ($images as $index => $image): ?>
            <?php $span = $span = isset($col_spans[$index]) ? $col_spans[$index] : 6; ?>
            <div class="custom-gallery-item col-<?php echo $span ?>">
                <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('acf_gallery', 'render_acf_gallery_shortcode');