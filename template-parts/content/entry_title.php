<?php

/**
 * Template part for displaying a post's title
 *
 * @package qreate
 */

namespace qreate\qreate;

the_title('<a href="' . esc_url(get_permalink()) . '" ><h3 class="entry-title" rel="bookmark">', '</h3></a>');
