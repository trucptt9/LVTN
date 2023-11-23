<?php

use App\Models\AdminHistory;
use App\Models\AdminMenu;
use App\Models\AdminSetting;
use App\Models\Settings;
use App\Models\Permission;
use App\Models\StaffHistory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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
        '#0d6efd',
        '#dc3545',
        '#198754',
        '#0dcaf0',
        '#6c757d',
        '#f8f9fa',
        '#212529',
        '#ffc107'
    ]);
}
function formatNumber($number)
{
    return number_format($number, 0, ',', ',') + ' đ';
}

if (!function_exists('generateRandomString')) {
    // generate code
    function generateRandomString($length = 10, $is_number = false)
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
if (!function_exists('get_option_admin')) {
    function get_option_admin($code, $default = '')
    {
        $option = AdminSetting::ofCode($code)->first();
        return $option->value ?? $default;
    }
}
if (!function_exists('save_log_action')) {
    function save_log_action($description, $action = '', $link = null)
    {
        $log = StaffHistory::create([
            'staff_id' => auth()->check() ? auth()->user()->id : 0,
            'description' => $description,
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
if (!function_exists('showLog')) {
    function showLog(\Throwable $th)
    {
        Log::debug([
            'message' => $th->getMessage(),
            'file' => $th->getFile(),
            'line' => $th->getLine()
        ]);
    }
}
if (!function_exists('show_s3_file')) {
    function show_s3_file($link)
    {
        return asset("storage/$link");
    }
}

if (!function_exists('renderSubMenu')) {
    // generate code
    function renderSubMenu($value, $currentUrl = '/')
    {
        $subMenu = '';
        $status_active = '';
        foreach ($value as $menu) {
            $subSubMenu = '';
            $hasSub = count($menu->menus) > 0 ? 'has-sub' : '';
            $menuUrl = $menu->url ?? '';
            $menuCaret = (!empty($hasSub)) ? '<span class="menu-caret"><b class="caret"></b></span>' : '';
            $menuText = $menu->name ? '<span class="menu-text">' . $menu->name . '</span>' : '';

            if (!empty($hasSub)) {
                $subSubMenu .= '<div class="menu-submenu">';
                $subSubMenu .= renderSubMenu($menu->menus, $currentUrl);
                $subSubMenu .= '</div>';
            }
            $active = (check_active($menuUrl, $currentUrl)) ? 'active' : '';
            if ($status_active == '') {
                $status_active = $active;
            }
            $subMenu .= '
                        <div class="menu-item ' . $hasSub . ' ' . $active . '">
                            <a href="' . $menuUrl . '" class="menu-link">' . $menuText . $menuCaret . '</a>
                            ' . $subSubMenu . '
                        </div>
                    ';
        }
        return [$subMenu, $status_active];
    }
}

if (!function_exists('renderAdminMenu')) {
    function renderAdminMenu($currentUrl = '')
    {
        $menus = AdminMenu::with('menus')->ofStatus(AdminMenu::STATUS_ACTIVE)->parentId(0)->get();
        foreach ($menus as $menu) {
            $hasSub = (count($menu->menus) > 0) ? 'has-sub' : '';
            $menuUrl = (!empty($menu->url)) ? $menu->url : '';
            $menuIcon = (!empty($menu->icon)) ? '<span class="menu-icon">' . $menu->icon . '</span>' : '';
            $menuText = (!empty($menu->name)) ? '<span class="menu-text">' . $menu->name . '</span>' : '';
            $menuCaret = (!empty($hasSub)) ? '<span class="menu-caret"><b class="caret"></b></span>' : '';
            $menuSubMenu = '';

            if (!is_null($menu->menus)) {
                $menuSubMenu .= '<div class="menu-submenu">';
                $subMenu = renderSubMenu($menu->menus, $currentUrl);
                $menuSubMenu .= $subMenu[0];
                $menuSubMenu .= '</div>';
            }
            $active = ((!empty($menu->url) && check_active($menu->url, $currentUrl)) || $subMenu[1] == 'active') ? 'active' : '';
            echo '
                        <div class="menu-item ' . $hasSub . ' ' . $active . '">
                            <a href="' . $menuUrl . '" class="menu-link ' . $active . '">
                                ' . $menuIcon . '
                                ' . $menuText . '
                                ' . $menuCaret . '
                            </a>
                            ' . $menuSubMenu . '
                        </div>
                    ';
        }
    }
}

if (!function_exists('check_active')) {
    function check_active($url, $currentUrl)
    {
        if ($currentUrl != request()->schemeAndHttpHost() && $url != request()->schemeAndHttpHost()) {
            $pattern = '/^' . preg_quote($url, '/') . '(\/.*)?$/';
            return preg_match($pattern, $currentUrl);
        } else {
            return $url == $currentUrl;
        }
    }
}

if (!function_exists('previousUrl')) {
    function previousUrl()
    {
        return url()->previous();
    }
}


if (!function_exists('save_log_action_admin')) {
    function save_log_action_admin($content, $link = '')
    {
        $log = AdminHistory::create([
            'admin_id' => auth('admin')->check() ? auth('admin')->user()->id : 0,
            'note' => $content,
            'link' => $link ? $link : request()->getUri()
        ]);
        return $log;
    }
}if (!function_exists('permission_detail')) {
    function permission_detail($staff_id, $module)
    {
        return Permission::staffId($staff_id)->ofModule($module)->first();
    }
}