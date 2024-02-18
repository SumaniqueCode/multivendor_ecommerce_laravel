<?php

namespace OpenAdmin\Admin\Controllers;

use App\Models\User;
use App\Models\User\Order;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Arr;
use OpenAdmin\Admin\Admin;

class Dashboard
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function title()
    {
        return view('admin::dashboard.title');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function environment()
    {
        $envs = [
            ['name' => 'PHP version',       'value' => 'PHP/'.PHP_VERSION],
            ['name' => 'Laravel version',   'value' => app()->version()],
            ['name' => 'CGI',               'value' => php_sapi_name()],
            ['name' => 'Uname',             'value' => php_uname()],
            ['name' => 'Server',            'value' => Arr::get($_SERVER, 'SERVER_SOFTWARE')],

            ['name' => 'Cache driver',      'value' => config('cache.default')],
            ['name' => 'Session driver',    'value' => config('session.driver')],
            ['name' => 'Queue driver',      'value' => config('queue.default')],

            ['name' => 'Timezone',          'value' => config('app.timezone')],
            ['name' => 'Locale',            'value' => config('app.locale')],
            ['name' => 'Env',               'value' => config('app.env')],
            ['name' => 'URL',               'value' => config('app.url')],
        ];

        return view('admin::dashboard.environment', compact('envs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function extensions()
    {
        $extensions = [
            'helpers' => [
                'name' => 'open-admin-ext/helpers',
                'link' => 'https://github.com/open-admin-org/helpers',
                'icon' => 'cogs',
            ],
            'log-viewer' => [
                'name' => 'open-admin-ext/log-viewer',
                'link' => 'https://github.com/open-admin-org/log-viewer',
                'icon' => 'database',
            ],
            'backup' => [
                'name' => 'open-admin-ext/backup',
                'link' => 'https://github.com/open-admin-org/backup',
                'icon' => 'copy',
            ],
            'config' => [
                'name' => 'open-admin-ext/config',
                'link' => 'https://github.com/open-admin-org/config',
                'icon' => 'toggle-on',
            ],
            'api-tester' => [
                'name' => 'open-admin-ext/api-tester',
                'link' => 'https://github.com/open-admin-org/api-tester',
                'icon' => 'sliders-h',
            ],
            'media-manager' => [
                'name' => 'open-admin-ext/media-manager',
                'link' => 'https://github.com/open-admin-org/media-manager',
                'icon' => 'file',
            ],
            'scheduling' => [
                'name' => 'open-admin-ext/scheduling',
                'link' => 'https://github.com/open-admin-org/scheduling',
                'icon' => 'clock',
            ],
            'reporter' => [
                'name' => 'open-admin-ext/reporter',
                'link' => 'https://github.com/open-admin-org/reporter',
                'icon' => 'bug',
            ],
            'redis-manager' => [
                'name' => 'open-admin-ext/redis-manager',
                'link' => 'https://github.com/open-admin-org/redis-manager',
                'icon' => 'flask',
            ],
            'grid-sortable' => [
                'name' => 'open-admin-ext/grid-sortable',
                'link' => 'https://github.com/open-admin-org/grid-sortable',
                'icon' => 'arrows-alt-v',
            ],
        ];

        foreach ($extensions as &$extension) {
            $name = explode('/', $extension['name']);
            $extension['installed'] = array_key_exists(end($name), Admin::$extensions);
        }

        return view('admin::dashboard.extensions', compact('extensions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function dependencies()
    {
        $json = file_get_contents(base_path('composer.json'));

        $dependencies = json_decode($json, true)['require'];

        return Admin::component('admin::dashboard.dependencies', compact('dependencies'));
    }

        /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function charts()
    {

        $users = User::all();
        $userCount = [];
        $khaltiOrders = [];
        $cashOrders = [];
    
        // Get current year, month, and day
        $currentYear = date('Y');
        $currentMonth = date('F');
        $currentDay = date('j');
    
        // Initialize user count array for missing days of this year
        $startDateThisYear = Carbon::createFromDate($currentYear)->startOfYear();
        $endDateThisYear = now()->startOfDay(); // Get the current date
        $dateRangeThisYear = CarbonPeriod::create($startDateThisYear, $endDateThisYear);
    
        foreach ($dateRangeThisYear as $date) {
            $year = $date->format('Y');
            $month = $date->format('F'); 
            $day = $date->format('j');
    
            $userCount[$year][$month][$day] = 0;
            $khaltiOrders[$year][$month][$day] = 0;
            $cashOrders[$year][$month][$day] = 0;
        }
    
        // Count users for each day
        foreach ($users as $user) {
            $year = $user->created_at->format('Y');
            $month = $user->created_at->format('F');
            $day = $user->created_at->format('j');

            $userCount[$year][$month][$day]++;
        }
    
        // Last 7 days
        $last7Days = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('F j');
            $last7Days[] = $date;
        }
    
        // Weekly users
        $weeklyUserCount = [];
        $totalUserThisWeek = 0;
        foreach ($last7Days as $day) {
            list($month, $day) = explode(' ', $day);
            $weeklyUserCount[] = $userCount[$currentYear][$month][$day] ?? 0;
            $totalUserThisWeek = $totalUserThisWeek + ($userCount[$currentYear][$month][$day] ?? 0);
        }
    
        // Current Month
        $thisMonth = [];
        for ($j = $currentDay - 1; $j >= 0; $j--) {
            $date = now()->subDays($j)->format('F j');
            $thisMonth[] = $date;
        }

        $monthlyUserCount = [];
        $totalUserThisMonth = 0;
        foreach ($thisMonth as $day) {
            list($month, $day) = explode(' ', $day);
            $monthlyUserCount[] = $userCount[$currentYear][$month][$day] ?? 0;
            $totalUserThisMonth = $totalUserThisMonth+ ($userCount[$currentYear][$month][$day] ?? 0);
        }
    
        // This Year
        $thisYear = [];
        foreach ($dateRangeThisYear as $date) {
            $thisYear[] = $date->format('F j');
        }

        $yearlyUserCount = [];
        $totalUserThisYear = 0;
        foreach ($thisYear as $day) {
            list($month, $day) = explode(' ', $day);
            $yearlyUserCount[] = $userCount[$currentYear][$month][$day] ?? 0;
            $totalUserThisYear = $totalUserThisYear+($userCount[$currentYear][$month][$day] ?? 0);

        }
        $orders = Order::latest()->get();

        foreach ($orders as $order) {
            $year = $order->created_at->format('Y');
            $month = $order->created_at->format('F');
            $day = $order->created_at->format('j');

            if ($order->payment_method == 'Khalti') {
                $khaltiOrders[$year][$month][$day] += $order->total_price;
            }
            if ($order->payment_method == 'COD') {
                $cashOrders[$year][$month][$day] += $order->total_price;
            }
        }

        $weeklyKhaltiOrders = [];
        $weeklyCashOrders = [];
        $totalWeeklyOrder = 0;
        foreach ($last7Days as $day) {
            list($month, $day) = explode(' ', $day);
            $weeklyKhaltiOrders[] = $khaltiOrders[$currentYear][$month][$day] ?? 0;
            $weeklyCashOrders[] = $cashOrders[$currentYear][$month][$day] ?? 0;
            $totalWeeklyOrder = $totalWeeklyOrder + ($khaltiOrders[$currentYear][$month][$day] ?? 0) + ($cashOrders[$currentYear][$month][$day] ?? 0);

        }
        return view('admin::dashboard.charts', compact('userCount', 'last7Days', 'weeklyUserCount','totalUserThisWeek', 'thisMonth', 'monthlyUserCount','totalUserThisMonth', 'thisYear', 'yearlyUserCount', 'totalUserThisYear', 'weeklyKhaltiOrders', 'weeklyCashOrders', 'totalWeeklyOrder'));
    }
}
