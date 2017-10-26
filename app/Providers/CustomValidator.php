<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidator extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('uniques', function ($attributes, $value, $params, $validator){
            $table = array_shift($params);
            $conds = $params;
            $index = array_search('NULL', $params);
            $excepts = [];
            if($index) {
                $conds = array_slice($params, 0, $index);
                $excepts = array_filter(array_slice($params, $index + 1));
            }

            $query = \DB::table($table);
            foreach ($conds as $field) {
                $query->where($field, $validator->getData()[$field]);
            }
            if($excepts && isset($excepts['1'])) {
                $query->where($excepts['0'], '<>', $excepts['1']);
            }
            return $query->count() == 0 ;

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
