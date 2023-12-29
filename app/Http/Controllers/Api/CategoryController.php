<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TicketResource;

use DB;

class CategoryController extends Controller
{
    public function getCategory()
    {
        //get all ticket
        $categorys = DB::table('categories')->get();

        //return collection of posts as a resource
        return new TicketResource(true, 'List Data status', $categorys);
    }
}
