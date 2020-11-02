<?php


namespace App\Providers;


use App\Core\QueryBuilder\QueryBuilder;
use App\Core\QueryBuilder\QueryBuilderInterface;
use Illuminate\Support\ServiceProvider;

class QueryBuilderProvider extends ServiceProvider
{

    public function boot()
    {
        $this->app->bind(QueryBuilderInterface::class,QueryBuilder::class);
    }

}
