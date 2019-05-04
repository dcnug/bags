<?php

namespace App\Repositories;

use Auth, DB;

class BookRepository
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function get($id)
    {
        return DB::table('bukus')->find($id);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function getAll()
    {
        return DB::table('bukus')->all();
    }
}
