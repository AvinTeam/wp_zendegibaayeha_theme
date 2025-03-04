<?php
if (! defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly
if (! class_exists('WP_List_Table')) {

    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';

}

class Mr_clock_List_Tabel extends WP_List_Table
{

    public function get_columns()
    {
        return [
            'date' => 'تاریخ',
            'time' => 'ساعت',
            'ID'   => 'شناسه',
         ];
    }

    public function column_date($item)
    {

        $actions = [
            'delete' => '<a href="' . admin_url('admin.php?page=mrrashidpour&mrclockid=' . $item[ 'ID' ]) . '">حذف</a>',
         ];

        return $item[ 'date' ] . $this->row_actions($actions);

    }

    // public function column_ID($item)
    // {

    //     return $item[ 'ID' ] . '-' . time() . '=' . ($item[ 'ID' ] - time());

    // }

    public function column_default($item, $column_name)
    {
        if (isset($item[ $column_name ])) {
            return wp_kses($item[ $column_name ], [
                'span' => [  ],
             ]);
        }
        return '-';
    }

    public function prepare_items()
    {
        $results = get_option('mr_add_clock');

        if (is_array($results)) {

            $m = 0;
            foreach ($results as $row) {

                if (time() > $row[ 'ID' ]) {
                    unset($results[ $m ]);
                }
                $m++;

            }

        }
        $this->_column_headers = [
            $this->get_columns(),
            [  ],
            [  ],
            'date',
         ];

        $this->items = $results;

    }

}
