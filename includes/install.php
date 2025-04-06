<?php

(defined('ABSPATH')) || exit;
function zba_row_install()
{

    if (get_option('mr_add_clock') == false) {
        update_option('mr_add_clock', [  ]);
    }

    if (get_option('mr_setting_clock') == false) {
        $setting_clock = [

            'version'    => ZBA_VERSION,
            'setting'    => 0,
            'setting_tv' => 0,
            'clock_decs' => '',
            'timestamp'  => 5,
         ];

        update_option('mr_setting_clock', $setting_clock);
    }

    global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    $wpdb_collate = $wpdb->collate;

    $tabel_vote_row = $wpdb->prefix . 'zba_vote';
    $sql_vote       = "CREATE TABLE IF NOT EXISTS `$tabel_vote_row` (
                        `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                        `mobile` varchar(11) COLLATE utf8mb4_unicode_520_ci NOT NULL,
                        `ayeh` bigint unsigned NOT NULL,
                        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        PRIMARY KEY (`id`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=$wpdb_collate";

    dbDelta($sql_vote);

    $tabel_winners_row = $wpdb->prefix . 'zba_winners';
    $sql_winners       = "CREATE TABLE IF NOT EXISTS `$tabel_winners_row` (
                            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                            `mobile` varchar(12) NOT NULL,
                            `gift` varchar(50) NOT NULL,
                            PRIMARY KEY (`id`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=$wpdb_collate";

    dbDelta($sql_winners);

}

add_action('after_switch_theme', 'zba_row_install');