<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    // Phương thức boot() được gọi khi ứng dụng được khởi động.
    public function boot()
    {
        Paginator::useBootstrapFive();
        // Mục tiêu của đoạn mã này là kích hoạt Bootstrap 5 styling cho phân trang trong ứng dụng Laravel của bạn, đồng thời đảm bảo rằng việc cấu hình này chỉ cần thực hiện một lần và sẽ áp dụng cho tất cả các trang sử dụng phân trang.
    }
}


