<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
//use App\Http\Requests\MassDestroyUserRequest;
//use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use Entrust;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;
//use Maatwebsite\Excel\Facades\Excel;
use Excel;
use App\Exports\NewsletterExport;

class ExportExcelController extends Controller
{
   

    function excel()
    {
   
        $fileName = 'newsletter-'.now();
        return Excel::download(new NewsletterExport, $fileName.'.xlsx');
    
    }
}

