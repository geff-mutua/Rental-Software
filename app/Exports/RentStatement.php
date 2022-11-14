<?php

namespace App\Exports;

use App\Models\Rent;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RentStatement implements FromView
{
    public $statement=[];

    public function __construct($statement){
        $this->statement=$statement;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('content.exports.statements', [
            'statements' => $this->statement
        ]);
    }
}
