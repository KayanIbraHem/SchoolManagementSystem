<?php

namespace App\Providers;
use App\Repository\TeacherRepositoryInterface;
use App\Repository\TeacherRepository;
use App\Repository\StudentRepositoryInterface;
use App\Repository\StudentRepository;
use App\Repository\StudentPromotionsRepositoryInterface;
use App\Repository\StudentPromotionsRepository;
use App\Repository\StudentGraduatedRepositoryInterface;
use App\Repository\StudentGraduatedRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(StudentPromotionsRepositoryInterface::class, StudentPromotionsRepository::class);
        $this->app->bind(StudentGraduatedRepositoryInterface::class, StudentGraduatedRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
