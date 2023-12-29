<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Status;

use App\Http\Resources\TicketResource;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function ticketOpen()
    {
        //get all ticket
        $tickets = Ticket::where(
            'status_id',
            '=',
            1
        )->with('statuses', 'users')
            ->orderBy('created_at', 'desc')
            ->get();



        //return collection of posts as a resource
        return new TicketResource(true, 'List Data Tickets', $tickets);
    }

    public function ticketClosed()
    {
        //get all ticket
        $tickets = Ticket::where(
            'status_id',
            '=',
            4
        )->with('statuses', 'users')
            ->orderBy('created_at', 'desc')
            ->get();

        //return collection of posts as a resource
        return new TicketResource(true, 'List Data Tickets', $tickets);
    }



    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Ticket::where("number", "=", $code)->first());

        return $code;
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), []);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/ticket', $image->hashName());

        //create post

        $firstnumbercode = rand(1, 9);
        $ticket = Ticket::create([
            'number' =>  'INC' . '-' . $firstnumbercode . '' . $this->generateUniqueCode(),
            'subject' => $request->input('subject'),
            'requester' => $request->input('requester'),
            'problem_detail' => $request->input('problem_detail'),
            // 'image_problem' => $request->all('image_problem'),
            'user_id' => $request->input('user_id'),
            'status_id' => '1',
            'channel_id' => $request->input('channel_id'),
            'priority_id' => $request->input('priority_id'),
            'category_id' => $request->input('category_id'),
            // 'image'     => $image->hashName(),

            // 'assign_date' =>  Carbon::now(),
            'due_date' => $request->input('due_date'),
            'open_by' => auth()->user()->name
        ]);

        //return response
        return new TicketResource(true, 'Data ticket Berhasil Ditambahkan!', $ticket);
    }

    public function update(Request $request, string $id)
    {
        $detailticket = Ticket::find($id);
        $detailticket->update(
            [
                'resolution' => $request->input('resolution'),

                // 'user_id' => $request->user_id,
                // 'subject' => $request->input('subject'),
                // 'problem_detail' => $request->input('problem_detail'),
                'status_id' => $request->input('status_id'),
                'user_id' => $request->input('user_id'),

                // 'due_date' => Carbon::now()

            ]
        );
        // Ticket::where('id', $ticket->id)
        //     ->update([
        //         // 'subject' => $request->subject,
        //         // 'requester' => $request->requester,
        //         // 'problem_detail' => $request->input('problem_detail'),
        //         // 'image_problem' => $request->all('image_problem'),
        //         'user_id' => $request->user_id,
        //         'status_id' => $request->status_id,
        //         // 'channel_id' => $request->input('channel_id'),
        //         // 'priority_id' => $request->input('priority_id'),
        //         // 'category_id' => $request->input('category_id'),
        //     ]);

        // return $request;

        // return redirect()->route('ticket');
        return new TicketResource(true, 'Data ticket Berhasil Diupdate!', $detailticket);
    }
}
