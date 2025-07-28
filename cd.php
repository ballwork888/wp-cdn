<?php
#custom-login
#custom-register

// 1. เปลี่ยน URL ของเมนู #custom-login และ #custom-register
add_filter('wp_nav_menu_objects', 'custom_login_link_replacer', 10, 2);
function custom_login_link_replacer($items, $args)
{
    $current_site = 'queen'; // ← แก้ชื่อเว็บ

    $json = file_get_contents('https://cdn.jsdelivr.net/gh/ballwork888/wp-cdn@main/json/config.json');
    $config = json_decode($json, true);

    if (!isset($config[$current_site])) {
        return $items;
    }

    $login_url = esc_url($config[$current_site]['login']);
    $register_url = esc_url($config[$current_site]['register']);

    foreach ($items as &$item) {
        if ($item->url === '#custom-login') {
            $item->url = $login_url;
            $item->custom_id = 'login-menu'; // เพิ่ม custom property
        } elseif ($item->url === '#custom-register') {
            $item->url = $register_url;
            $item->custom_id = 'register-menu'; // เพิ่ม custom property
        }
    }

    return $items;
}

// 2. ใส่ id ลงใน <a> tag
add_filter('nav_menu_link_attributes', 'custom_menu_item_add_id', 10, 3);
function custom_menu_item_add_id($atts, $item, $args)
{
    if (isset($item->custom_id)) {
        $atts['id'] = esc_attr($item->custom_id); // ใส่ ID ลงใน <a>
    }
    return $atts;
}
