<?php

use App\Models\Settings;
use App\Models\StaffHistory;
use Illuminate\Support\Str;

// color
if (!defined('COLOR_PRIMARY')) {
    define('COLOR_PRIMARY', '#0d6efd');
}
if (!defined('COLOR_DANGER')) {
    define('COLOR_DANGER', '#dc3545');
}
if (!defined('COLOR_SUCCESS')) {
    define('COLOR_SUCCESS', '#198754');
}
if (!defined('COLOR_INFO')) {
    define('COLOR_INFO', '#0dcaf0');
}
if (!defined('COLOR_SECONDARY')) {
    define('COLOR_SECONDARY', '#6c757d');
}
if (!defined('COLOR_LIGHT')) {
    define('COLOR_LIGHT', '#f8f9fa');
}
if (!defined('COLOR_DARK')) {
    define('COLOR_DARK', '#212529');
}
if (!defined('COLOR_WARNING')) {
    define('COLOR_WARNING', '#ffc107');
}
if (!defined('COLORS')) {
    // get array color
    define('COLORS', [
        COLOR_PRIMARY => '#0d6efd',
        COLOR_DANGER => '#dc3545',
        COLOR_SUCCESS => '#198754',
        COLOR_INFO => '#0dcaf0',
        COLOR_SECONDARY => '#6c757d',
        COLOR_LIGHT => '#f8f9fa',
        COLOR_DARK => '#212529',
        COLOR_WARNING => '#ffc107'
    ]);
}
if (!defined('ARRAY_COLORS')) {
    define('ARRAY_COLORS', [
        '#0d6efd', '#dc3545', '#198754', '#0dcaf0', '#6c757d', '#f8f9fa', '#212529', '#ffc107'
    ]);
}
if (!function_exists('generateRandomString')) {
    // generate code
    function generateRandomString($length = 10,  $is_number = false)
    {
        if ($is_number == true) {
            $length -= 1;
            return ($length > 0) ? random_int(1, 9) . substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 1, $length) : '';
        }
        return ($length > 0) ? substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length) : '';
    }
}
if (!function_exists('get_ip')) {
    // detect ip action
    function get_ip()
    {
        return $_SERVER['REMOTE_ADDR'] ?? '';
    }
}
if (!function_exists('get_ip_from_request')) {
    // detect ip action
    function get_ip_from_request()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        return $ipaddress;
    }
}
if (!function_exists('get_device')) {
    // detect device action
    function get_device()
    {
        return $_SERVER['HTTP_USER_AGENT'] ?? '';
    }
}
if (!function_exists('get_phone_number')) {
    // get phone number with condition
    function get_phone_number($value, $condition = false)
    {
        if ($value) {
            return $condition ? Str::mask($value, '*', - (strlen($value)), (strlen($value) - 3)) : $value;
        }
        return '';
    }
}
if (!function_exists('get_option')) {
    function get_option($code, $storeId, $default = '')
    {
        $option = Settings::ofCode($code)->storeId($storeId)->first();
        return $option->value ?? $default;
    }
}
if (!function_exists('save_log_action')) {
    function save_log_action($description, $action, $link = null)
    {
        $log = StaffHistory::create([
            'staff_id' => auth('staff')->check() ? auth('staff')->user()->id : 0,
            'description' => $description,
            'action' => $action,
            'link' => $link
        ]);
        return $log;
    }
}
if (!function_exists('get_avatar_api')) {
    function get_avatar_api($name = '')
    {
        return 'https://ui-avatars.com/api/' . $name;
    }
}
if (!function_exists('get_date_string')) {
    function get_date_string()
    {
        $from = now()->format('Y-m-d');
        $to = now()->subDays(30)->format('Y-m-d');
        return "$to to $from";
    }
}

if (!function_exists('get_mail_from_setting')) {
    function get_mail_from_setting($emails)
    {
        $to = '';
        $cc = [];
        $email_list = explode(';', $emails);
        if (count($email_list) > 0) {
            foreach ($email_list as $mail) {
                if ($to == '') {
                    $to = trim($mail);
                } else if (!isset($cc[$mail])) {
                    array_push($cc, trim($mail));
                }
            }
        }
        return [$to, $cc];
    }
}
