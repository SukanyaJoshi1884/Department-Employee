<?php

namespace App\Providers;

use App\Repositories\Departments\DepartmentInterface;
use App\Repositories\Departments\DepartmentRepository;
use App\Repositories\Employees\EmployeeInterface;
use App\Repositories\Employees\EmployeeRepository;
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
        $this->app->bind(DepartmentInterface::class, DepartmentRepository::class);
        $this->app->bind(EmployeeInterface::class, EmployeeRepository::class);
    }
}
