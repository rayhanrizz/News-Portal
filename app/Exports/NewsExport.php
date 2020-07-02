<?php

namespace App\Exports;

use App\news;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NewsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.news', [
        	'i'		=> 0,
            'data' 	=> news::all()
        ]);
    }
}
