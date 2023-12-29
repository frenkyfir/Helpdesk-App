<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Resources\TicketResource;
use DB;


class StatusController extends Controller
{
    public function getStatus()
    {
        //get all ticket
        $statuses = DB::table('statuses')->get();

        //return collection of posts as a resource
        return new TicketResource(true, 'List Data status', $statuses);
    }
}
