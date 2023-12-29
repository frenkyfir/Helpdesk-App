<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TicketResource;
use DB;

class PriorityController extends Controller
{
    public function getPriority()
    {
        //get all ticket
        $priority = DB::table('priorities')->get();

        //return collection of posts as a resource
        return new TicketResource(true, 'List Data priority', $priority);
    }
}
