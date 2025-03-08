<?php

function authenticate_with_application_password($request)
{
    // دریافت مقدار Authorization از هدر
    $headers = getallheaders();

    if (! isset($headers[ 'Authorization' ])) {
        return new WP_Error('unauthorized', 'هدر Authorization ارسال نشده است.', [ 'status' => 401 ]);
    }

    // استخراج اطلاعات ورود از مقدار هدر Authorization
    $auth = $headers[ 'Authorization' ];
    if (strpos($auth, 'Basic ') !== 0) {
        return new WP_Error('unauthorized', 'فرمت هدر نادرست است.', [ 'status' => 401 ]);
    }

    // دیکد کردن مقدار Base64
    $auth_value                = base64_decode(substr($auth, 6));
    list($username, $password) = explode(':', $auth_value, 2);

    // بررسی اطلاعات ورود
    $user = wp_authenticate($username, $password);
    if (is_wp_error($user)) {
        return new WP_Error('unauthorized', 'اطلاعات ورود نادرست است.', [ 'status' => 401 ]);
    }

    // تنظیم کاربر احراز هویت شده
    wp_set_current_user($user->ID);
    return $user;
}

function store_secure_update_link(WP_REST_Request $request)
{
    // احراز هویت کاربر از هدر Authorization
    $user = authenticate_with_application_password($request);
    if (is_wp_error($user)) {
        return $user;
    }

    // بررسی سطح دسترسی
    if (! user_can($user, 'manage_options')) {
        return new WP_Error('forbidden', 'شما دسترسی لازم را ندارید.', [ 'status' => 403 ]);
    }

    // دریافت لینک از درخواست
    $url = esc_url($request->get_param('url'));

    // ذخیره لینک در wp_options
    update_option('android_link', $url);

    return rest_ensure_response([
        'success'    => true,
        'message'    => 'لینک آپدیت با موفقیت ذخیره شد.',
        'stored_url' => get_option('android_link'),
     ]);
}

function get_custom_categories($request)
{
    $ids        = explode(',', $request[ 'ids' ]);
    $categories = [  ];

    foreach ($ids as $id) {
        $category = get_term($id, 'category');
        if ($category && ! is_wp_error($category)) {
            $categories[  ] = [
                'id'   => $category->term_id,
                'name' => $category->name,
             ];
        }
    }

    return new WP_REST_Response($categories, 200);
}

// ثبت اندپوینت در REST API
add_action('rest_api_init', function () {
    register_rest_route('zba/v1', '/update-app-link/?', [
        'methods'             => [ 'POST' ],
        'callback'            => 'store_secure_update_link',
        'permission_callback' => '__return_true',
        'args'                => [
            'url' => [
                'description'       => 'new android version download url',
                'required'          => true,
                'type'              => 'string',
                'sanitize_callback' => 'sanitize_url',

             ],

         ],
     ]);

    // Endpoint برای دریافت لیست دسته‌بندی‌ها
    register_rest_route('zba/v1', '/categories/?', [
        'methods'  => 'GET',
        'callback' => 'get_custom_categories_list',
     ]);

    // Endpoint برای دریافت پست‌های یک دسته‌بندی خاص
    register_rest_route('zba/v1', '/categories/(?P<id>\d+)', [
        'methods'  => 'GET',
        'callback' => 'get_posts_from_single_category',
     ]);

    // Endpoint برای دریافت پست‌های تمام دسته‌بندی‌ها
    register_rest_route('zba/v1', '/categories/post', [
        'methods'  => 'GET',
        'callback' => 'get_posts_from_all_categories',
     ]);
});

// تابع برای دریافت لیست دسته‌بندی‌ها
function get_custom_categories_list($request)
{
    // IDs ثابت دسته‌بندی‌ها (مقادیر را با IDهای مورد نظر خود جایگزین کنید)
    $category_ids = [ 128, 131, 156, 132, 133 ];
    $categories   = [  ];

    foreach ($category_ids as $id) {
        $category = get_term($id, 'category');
        if ($category && ! is_wp_error($category)) {
            $categories[  ] = [
                'id'   => $category->term_id,
                'name' => $category->name,
             ];
        }
    }

    return new WP_REST_Response($categories, 200);
}

// تابع برای دریافت پست‌های یک دسته‌بندی خاص
function get_posts_from_single_category($request)
{
    $category_id = $request[ 'id' ]; // دریافت ID دسته‌بندی از URL
    $posts       = [  ];

    // تنظیم پارامترهای WP_Query
    $args = [
        'category__in'   => [ $category_id ], // فقط پست‌های این دسته‌بندی
        'posts_per_page' => 15,               // دریافت تمام پست‌ها
        'post_status'    => 'publish',        // فقط پست‌های منتشر شده
     ];

    $query = new WP_Query($args);

    // اگر پستی وجود داشته باشد
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $posts[  ] = [
                'id'        => get_the_ID(),
                'title'     => get_the_title(),
                'content'   => get_the_content(),
                'excerpt'   => get_the_excerpt(),
                'permalink' => get_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(),
             ];
        }
    }

    // بازنشانی پست‌های اصلی
    wp_reset_postdata();

    return new WP_REST_Response($posts, 200);
}

// تابع برای دریافت پست‌های تمام دسته‌بندی‌ها
function get_posts_from_all_categories($request)
{
    $posts = [  ];

    // تنظیم پارامترهای WP_Query
    $args = [
        'posts_per_page' => 15,        // دریافت تمام پست‌ها
        'post_status'    => 'publish', // فقط پست‌های منتشر شده
     ];

    $query = new WP_Query($args);

    // اگر پستی وجود داشته باشد
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $posts[  ] = [
                'id'        => get_the_ID(),
                'title'     => get_the_title(),
                'content'   => get_the_content(),
                'excerpt'   => get_the_excerpt(),
                'permalink' => get_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(),
             ];
        }
    }

    // بازنشانی پست‌های اصلی
    wp_reset_postdata();

    return new WP_REST_Response($posts, 200);
}
