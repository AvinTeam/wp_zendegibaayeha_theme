<?php
(defined('ABSPATH')) || exit;

add_action('init', function (): void {
    zba_cookie();
});
