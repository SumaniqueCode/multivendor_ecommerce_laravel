
<?php $__env->startSection('content'); ?>
<script>
    var last7Days = <?php echo json_encode($last7Days, 15, 512) ?>;
    var thisMonth = <?php echo json_encode($thisMonth, 15, 512) ?>;
    var thisYear = <?php echo json_encode($thisYear, 15, 512) ?>;

    //order chart variable starts
    var weeklyCashOrders = <?php echo json_encode($weeklyCashOrders, 15, 512) ?>;
    var weeklyKhaltiOrders = <?php echo json_encode($weeklyKhaltiOrders, 15, 512) ?>; 
    var monthlyCashOrders = <?php echo json_encode($monthlyCashOrders, 15, 512) ?>;
    var monthlyKhaltiOrders = <?php echo json_encode($monthlyKhaltiOrders, 15, 512) ?>; 

    var orderRange = last7Days;
    var khaltiOrderData = weeklyKhaltiOrders;
    var cashOrderData = weeklyCashOrders;

    $("#ordersDropdown").change(function () {
        var orderDropdown =  $("#ordersDropdown").val();
        orderRange = orderDropdown=="30days" ? thisMonth : last7Days;
        khaltiOrderData =  orderDropdown=="30days" ? monthlyKhaltiOrders : weeklyKhaltiOrders;
        cashOrderData =  orderDropdown=="30days" ? monthlyCashOrders : weeklyCashOrders;
        renderOrderChart( orderRange, khaltiOrderData, cashOrderData);
    });
    //order chart variable stops

    //cpc chart variable  starts
    var weeklySales = <?php echo json_encode($weeklySales, 15, 512) ?>;
    var weeklyClicks = <?php echo json_encode($weeklyClicks, 15, 512) ?>;
    var weeklyCPC = <?php echo json_encode($weeklyCPC, 15, 512) ?>;
    var monthlySales = <?php echo json_encode($monthlySales, 15, 512) ?>;
    var monthlyClicks = <?php echo json_encode($monthlyClicks, 15, 512) ?>;
    var monthlyCPC = <?php echo json_encode($monthlyCPC, 15, 512) ?>;
    var cpcRange = last7Days;
    var cpcData = weeklyCPC;
    var salesData = weeklySales;

    $("#cpcDropdown").change(function () {
        var cpcDropdown =  $("#cpcDropdown").val();
        cpcRange = cpcDropdown=="30days" ? thisMonth : last7Days;
        salesData =  cpcDropdown=="30days" ? monthlySales : weeklySales;
        cpcData =  cpcDropdown=="30days" ? monthlyCPC : weeklyCPC;
        renderCPCChart( cpcRange, salesData, cpcData);
    });
    //cpc chart variable ends
    window.addEventListener("load", function () {
        renderOrderChart( orderRange, khaltiOrderData, cashOrderData);
        // renderCPCChart( cpcRange, salesData, cpcData);
    });
</script>

<div class="grid grid-cols-12">
    <div class="ordersChart col-span-12">           
        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between mb-5">
            <div>
                <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Rs. <?php echo e($totalWeeklyOrder, false); ?></h5>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Sales this week</p>
            </div>
            <div
                class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                23%
                <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                </svg>
            </div>
            </div>
            <div id="data-labels-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5">
            <div class="flex justify-between items-center pt-5">
                <!-- Dropdown menu -->
                <select id="ordersDropdown" class="rounded-lg shadow text-gray-900 font-semibold hover:cursor-pointer hover:text-blue-700 hover:bg-gray-100 hover:cursor-pointer" >
                    <option class="text-gray-900" value="7days">
                         Last 7 days
                    </option>
                    <option class="text-gray-900" value="30days">
                        This Month
                    </option>
                    <option class="text-gray-900" value="365days">
                        This Year
                    </option>
                    <option class="text-gray-900" class="alltime">
                        Overall
                    </option>
                </select>                
                <a
                href="#"
                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                Sales Report
                <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                </a>
            </div>
            </div>
        </div>
        
        <script>
            function renderOrderChart(orderRange, cashOrderData, khaltiOrderData) {
                let options = {
                // enable and customize data labels using the following example, learn more from here: https://apexcharts.com/docs/datalabels/
                dataLabels: {
                enabled: true,
                // offsetX: -12,
                style: {
                    cssClass: 'text-xs text-white font-medium'
                },
                },
                grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 16,
                    right: 16,
                    top: -26
                },
                },
                series: [
                {
                    name: "Cash On Delivery",
                    data: cashOrderData,
                    color: "#1A56DB",
                },
                {
                    name: "Khalti",
                    data: khaltiOrderData,
                    color: "#7E3BF2",
                },
                ],
                chart: {
                height: "100%",
                maxWidth: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
                },
                tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
                },
                legend: {
                show: true
                },
                fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                },
                },
                stroke: {
                width: 6,
                },
                xaxis: {
                categories: orderRange,
                labels: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                },
                yaxis: {
                show: false,
                labels: {
                    formatter: function (value) {
                    return 'Rs. ' + value;
                    }
                }
                },
            }
        
            if (document.getElementById("data-labels-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("data-labels-chart"), options);
                chart.render();
            }
            };
        </script>
        
    </div>

    <div class="doubleLineChart col-span-12">  
        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between mb-5">
            <div class="grid gap-4 grid-cols-3">
                <div>
                    <h5 class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">Clicks
                        <svg data-popover-target="clicks-info" data-popover-placement="bottom" class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div data-popover id="clicks-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                            <div class="p-3 space-y-2">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Clicks growth - Incremental</h3>
                                <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
                                <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg></a>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    </h5>
                    <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold"><?php echo e($totalWeeklyClicks, false); ?></p>
                </div>
                <div>
                    <h5 class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">Sales
                        <svg data-popover-target="clicks-info" data-popover-placement="bottom" class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div data-popover id="sales-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                            <div class="p-3 space-y-2">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Earning growth - Incremental</h3>
                                <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
                                <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg></a>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    </h5>
                    <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold">Rs. <?php echo e($totalWeeklyOrder, false); ?></p>
                </div>
                <div>
                <h5 class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">CPC
                <svg data-popover-target="cpc-info" data-popover-placement="bottom" class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div data-popover id="cpc-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                        <div class="p-3 space-y-2">
                            <h3 class="font-semibold text-gray-900 dark:text-white">CPC growth - Incremental</h3>
                            <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                            <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
                            <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg></a>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </h5>
                <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold">Rs. <?php echo e($totalWeeklyCPC, false); ?></p>
                </div>
            </div>
            <div>
                <!-- Dropdown menu -->
                <select id="cpcDropdown" class="rounded-lg shadow text-gray-900 font-semibold hover:cursor-pointer hover:text-blue-700 hover:bg-gray-100 hover:cursor-pointer" >
                    <option class="text-gray-900" value="7days">
                         Last 7 days
                    </option>
                    <option class="text-gray-900" value="30days">
                        This Month
                    </option>
                    <option class="text-gray-900" value="365days">
                        This Year
                    </option>
                    <option class="text-gray-900" class="alltime">
                        Overall
                    </option>
                </select>
            </div>
            </div>
            <div id="line-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-2.5">
            <div class="pt-5">      
                <a href="#" class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-3.5 h-3.5 text-white me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                    <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Zm-3 15H4.828a1 1 0 0 1 0-2h6.238a1 1 0 0 1 0 2Zm0-4H4.828a1 1 0 0 1 0-2h6.238a1 1 0 1 1 0 2Z"/>
                    <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                </svg>
                View full report
                </a>
            </div>
            </div>
        </div>
        
        <script>
            // ApexCharts options and config
            function renderCPCChart(cpcRange, salesData, cpcData) {
            let options = {
                chart: {
                height: "100%",
                maxWidth: "100%",
                type: "line",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
                },
                tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
                },
                dataLabels: {
                enabled: false,
                },
                stroke: {
                width: 6,
                },
                grid: {
                show: true,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -26
                },
                },
                series: [
                {
                    name: "Sales",
                    data: salesData,
                    color: "#1A56DB",
                },
                {
                    name: "CPC",
                    data: cpcData,
                    color: "#7E3AF2",
                },
                ],
                legend: {
                show: false
                },
                stroke: {
                curve: 'smooth'
                },
                xaxis: {
                categories: cpcRange,
                labels: {
                    show: true,
                    style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                },
                yaxis: {
                show: false,
                },
            }
        
            if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("line-chart"), options);
                chart.render();
            }
            };
        </script>
  
    </div>
  
    <div class="barChart col-span-12 lg:col-span-6">     
        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                    <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                    <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z"/>
                </svg>
                </div>
                <div>
                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3.4k</h5>
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Leads generated per week</p>
                </div>
            </div>
            <div>
                <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                </svg>
                42.5%
                </span>
            </div>
            </div>
        
            <div class="grid grid-cols-2">
            <dl class="flex items-center">
                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Money spent:</dt>
                <dd class="text-gray-900 text-sm dark:text-white font-semibold">$3,232</dd>
            </dl>
            <dl class="flex items-center justify-end">
                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Conversion rate:</dt>
                <dd class="text-gray-900 text-sm dark:text-white font-semibold">1.2%</dd>
            </dl>
            </div>
        
            <div id="column-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                <!-- Dropdown menu -->
                <select id="barDropdown" class="rounded-lg shadow text-gray-900 font-semibold hover:cursor-pointer hover:text-blue-700 hover:bg-gray-100 hover:cursor-pointer" >
                    <option class="text-gray-900" value="7days">
                         Last 7 days
                    </option>
                    <option class="text-gray-900" value="30days">
                        This Month
                    </option>
                    <option class="text-gray-900" value="365days">
                        This Year
                    </option>
                    <option class="text-gray-900" class="alltime">
                        Overall
                    </option>
                </select> 
                <a
                    href="#"
                    class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                    Leads Report
                    <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </a>
                </div>
            </div>
        </div>
        
        <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
            const options = {
                    colors: ["#1A56DB", "#FDBA8C"],
                    series: [
                    {
                        name: "Organic",
                        color: "#1A56DB",
                        data: [
                        { x: "Mon", y: 231 },
                        { x: "Tue", y: 122 },
                        { x: "Wed", y: 63 },
                        { x: "Thu", y: 421 },
                        { x: "Fri", y: 122 },
                        { x: "Sat", y: 323 },
                        { x: "Sun", y: 111 },
                        ],
                    },
                    {
                        name: "Social media",
                        color: "#FDBA8C",
                        data: [
                        { x: "Mon", y: 232 },
                        { x: "Tue", y: 113 },
                        { x: "Wed", y: 341 },
                        { x: "Thu", y: 224 },
                        { x: "Fri", y: 522 },
                        { x: "Sat", y: 411 },
                        { x: "Sun", y: 243 },
                        ],
                    },
                    ],
                    chart: {
                    type: "bar",
                    height: "320px",
                    fontFamily: "Inter, sans-serif",
                    toolbar: {
                        show: false,
                    },
                    },
                    plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                    },
                    },
                    tooltip: {
                    shared: true,
                    intersect: false,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                    },
                    states: {
                    hover: {
                        filter: {
                        type: "darken",
                        value: 1,
                        },
                    },
                    },
                    stroke: {
                    show: true,
                    width: 0,
                    colors: ["transparent"],
                    },
                    grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -14
                    },
                    },
                    dataLabels: {
                    enabled: false,
                    },
                    legend: {
                    show: false,
                    },
                    xaxis: {
                    floating: false,
                    labels: {
                        show: true,
                        style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                    },
                    yaxis: {
                    show: false,
                    },
                    fill: {
                    opacity: 1,
                    },
                }
        
                if(document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("column-chart"), options);
                    chart.render();
                }
            });
        </script>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Seller.Layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\resources\views/Seller/sellerDashboard.blade.php ENDPATH**/ ?>