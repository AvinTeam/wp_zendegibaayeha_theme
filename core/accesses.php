<?php

(defined('ABSPATH')) || exit;

add_theme_support('post-thumbnails');
add_theme_support('menus');




function custom_theme_setup()
{
    register_nav_menus([
        'main-menu'   => 'فهرست اصلی',
        'footer-menu' => 'فهرست فوتر',
     ]);
}
add_action('after_setup_theme', 'custom_theme_setup');

class Custom_Nav_Walker extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '<ul class="dropdown-menu">';
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        // بررسی مقدار `classes` و تبدیل آن به آرایه در صورت نیاز
        $classes = isset($item->classes) && is_array($item->classes) ? $item->classes : [];
        $class_names  = join(' ', $classes);
        $active_class = in_array('current-menu-item', $classes) ? ' active' : '';
        $has_children = in_array('menu-item-has-children', $classes);

        // کلاس‌های آیتم لیست
        $li_classes = 'nav-item ms-2';
        if ($has_children) {
            $li_classes .= ' dropdown';
        }
        $li_classes .= esc_attr($class_names . $active_class);

        $output .= '<li class="' . $li_classes . '">';

        // تنظیم ویژگی‌های لینک
        $attributes  = ' class="nav-link fw-bolder' . esc_attr($active_class);
        if ($has_children) {
            $attributes .= ' dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"';
        } else {
            $attributes .= '"';
        }
        $attributes .= ' href="' . esc_url($item->url) . '"';

        // تولید لینک
        $output .= '<a' . $attributes . '>';
        $output .= esc_html($item->title);
        $output .= '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= '</li>';
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '</ul>';
    }
}

class Footer_Menu_Walker extends Walker_Nav_Menu
{
    private $count = 0; // شمارشگر آیتم‌ها
    private $total = 0; // تعداد کل آیتم‌ها

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        return; // حذف <ul>
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        return; // حذف </ul>
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->count++; // افزایش شمارشگر آیتم‌های پردازش‌شده
        $output .= '<a href="' . esc_url($item->url) . '" class="mx-2">' . esc_html($item->title) . '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if ($this->count < $this->total) { // فقط اگر این آیتم، آخرین نباشه "| " اضافه کن
            // $output .= ' | ';
        }
    }

    public function walk($elements, $max_depth, ...$args)
    {
        $this->total = count($elements); // ذخیره تعداد کل آیتم‌های منو
        return parent::walk($elements, $max_depth, ...$args);
    }
}
