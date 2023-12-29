<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;

use DB;

class UserController extends Controller
{
    public function getUser(){
        $users = DB::table('users')->get();


        //return collection of posts as a resource
        return new TicketResource(true, 'List Data Tickets', $users);
    }
    
}
