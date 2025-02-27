<?php

(defined('ABSPATH')) || exit;
function zba_row_install()
{

    if (get_option('mr_add_clock') == false) {
        update_option('mr_add_clock', '');
    }

    if (get_option('mr_setting_clock') == false) {
        $setting_clock = [

            'version' => ZBA_VERSION,
            'setting' => false,
            'setting_tv' => false,
            'clock_decs' => '',
            'timestamp' => 5,
         ];

        update_option('mr_setting_clock', $setting_clock);
    }

    // global $wpdb;
    // require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    // $wpdb_collate = $wpdb->collate;

    // $tabel_question_row = $wpdb->prefix . 'zba_question';
    // $sql_question       = "CREATE TABLE IF NOT EXISTS `$tabel_question_row` (
    //                     `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    //                     `title` text COLLATE $wpdb_collate NOT NULL,
    //                     `option1` text COLLATE $wpdb_collate NOT NULL,
    //                     `option2` text COLLATE $wpdb_collate NOT NULL,
    //                     `option3` text COLLATE $wpdb_collate NOT NULL,
    //                     `option4`text COLLATE $wpdb_collate NOT NULL,
    //                     `answer` int NOT NULL,
    //                     PRIMARY KEY (`id`)
    //                     ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=$wpdb_collate";

    // dbDelta($sql_question);



}

add_action('after_switch_theme', 'zba_row_install');