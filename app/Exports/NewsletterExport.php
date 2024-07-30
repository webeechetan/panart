<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
class NewsletterExport implements FromCollection
{
    public function collection()
    {
        return DB::table('newsletter')->get('email');
    }
}