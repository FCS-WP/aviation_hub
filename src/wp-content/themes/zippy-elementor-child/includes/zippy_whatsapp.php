<?php

function myContentFooter() {
    ?>
    <div class="ppocta-ft-fix">
        <a id="whatsappButton" href="https://api.whatsapp.com/send/?phone=%2B6568289838&text&type=phone_number&app_absent=0" target="_blank"><span>Whatsapp: +65 6828 9838</span></a>
    </div>
    <?php
}
add_action( 'wp_footer', 'myContentFooter' );

