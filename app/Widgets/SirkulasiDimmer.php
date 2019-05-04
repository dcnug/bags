<?php

namespace App\Widgets;

use App\Buku;
use App\User;
use App\Riwayat;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use Illuminate\Support\Facades\Auth;

class SirkulasiDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Riwayat::all()->count();
        $string = 'Sirkulasi';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-refresh',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.user_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('Sirkulasi'),
                'link' => route('voyager.riwayats.index'),
            ],
            'image' => '/images/02.jpg',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return app('VoyagerAuth')->user()->can('browse', Voyager::model('User'));
    }
}
