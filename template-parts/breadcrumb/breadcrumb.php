<?php

/**
 * Template part for displaying the Breadcrumb 
 *
 * @package qreate
 */

namespace qreate\qreate;

if (is_front_page()) {
    if (is_home()) { ?>
        <div class="qreate-breadcrumb-one text-center">
            <div class="qreate-banner-circle-effect">
                <div class="wow spin circle"></div>
                <div class="wow circle-fill"></div>
            </div>
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="qreate-breadcrumb-two text-center">
                        <h1 class="title">
                            <span class="qreate-first-word wow">
                                <?php esc_html_e('Home', 'qreate'); ?>
                            </span>
                        </h1>
                    </nav>
                </div>
            </div>
        </div>
<?php }
}
qreate()->qreate_inner_breadcrumb();
?>