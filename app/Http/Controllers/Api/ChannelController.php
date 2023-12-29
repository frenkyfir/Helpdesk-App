<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TicketResource;
use DB;

class ChannelController extends Controller
{
    public function getChannel()
    {
        //get all ticket
        $channels = DB::table('channels')->get();

        //return collection of posts as a resource
        return new TicketResource(true, 'List Data channel', $channels);
    }
}
