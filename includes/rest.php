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
});