<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Channel;

use App\Models\User;

use App\Models\Status;
use App\Models\Comment;



use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
// use DB;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // $ticket = Ticket::all();
        $ticket = Ticket::with('statuses', 'channels', 'categories', 'categories', 'users', 'companies')
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($ticket);


        $addCompany = DB::table('companies')->get();
        $addchannel = DB::table('channels')->get();
        $adduser = DB::table('users')->get();
        $addstatus = DB::table('statuses')->get();
        // dd($addCompany);

        return view('pages.tickets.index', compact('ticket', 'adduser', 'addstatus', 'addchannel', 'addCompany'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // $attachmentFile = $request->file('attachment_file');
        // $attachmentFile->storeAs('public/files', $attachmentFile->hashName());
        // if ($file = $request->file('attachment_file')) {
        //     $destinationPath = 'attachtment_file/';
        //     $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
        //     $file->move($destinationPath, $profileImage);
        //     $ticket['attachment_file'] = "$profileImage";
        // }


        $ticket = Ticket::create([
            'number' => $request->input('number'),
            'problem_detail' => $request->input('problem_detail'),
            'user_id' => $request->input('user_id'),
            'status_id' => $request->input('status_id'),
            'companies_id' => $request->input('companies_id'),
            'opened_behalf' => $request->input('opened_behalf'),
            'contact_response' => $request->input('contact_response'),
            'channel_id' => $request->input('channel_id'),
            'open_by' => auth()->user()->name,
            // 'attachment_file' => $request->input('attachment_file')
        ]);
        if ($file = $request->file('attachment_file')) {
            $destinationPath = 'file/';
            $profileImage = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $ticket['attachment_file'] = "$profileImage";
        }
        $ticket->save();

        // $input = $request->all();




        // Ticket::create($input);

        return response()->json([
            'status' => 200,
            'messages' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $detailticket = Ticket::with('comments.user')->where('ticket_id', $id)->first();
        $statusList = Status::all();
        $addUser = DB::table('users')->get();
        $contactList = Channel::all();
        return view('pages.tickets.detailticket', compact('detailticket', 'statusList', 'addUser', 'contactList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, Ticket $ticket)
    {


        $ticket = Ticket::find($id);
        $ticket->user_id = $request->input('user_id');
        $ticket->status_id = $request->input('status_id');
        $ticket->channel_id = $request->input('channel_id');
        $ticket->update();


        //return response
        return response()->json([
            'success' => true,
            'message' => 'Ticket Berhasil Diupdate!',
            'data'    => $ticket
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteTicket = Ticket::find($id);
        $deleteTicket->delete();
        return response()->json([
            'succtess' => true,
            'message' => 'Ticket berhasil dihapus!',
            'data' => $deleteTicket
        ]);
        // return redirect()->route('ticket')->with('success', ' Ticket has been Deleted.');
    }


    public function getTicketComments(string $id)
    {
        // sleep(5);
        $comments = Comment::with('user')->where('ticket_id', $id)->orderBy('created_at', 'desc')->get();
        return response()->json([
            'comments' => $comments
        ]);
    }

    public function deleteTicketComment($id)
    {
        // Temukan komentar berdasarkan ID
        $comment = Comment::find($id);

        // Periksa apakah komentar ditemukan
        if ($comment) {
            // Hapus komentar
            $comment->delete();

            // Beri respons sukses
            return response()->json(['message' => 'Komentar berhasil dihapus']);
        } else {
            // Beri respons jika komentar tidak ditemukan
            return response()->json(['error' => 'Komentar tidak ditemukan'], 404);
        }
    }

    public function fetchtickets()
    {
        $fetchTickets = Ticket::with('statuses', 'channels', 'categories', 'categories', 'users', 'companies')
            // dd($tickets);
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json([
            'fetchTickets' => $fetchTickets,
        ]);
    }

    public function fetchDetailTicket($id)
    {
        $detailTicket = Ticket::with('channels', 'users', 'statuses')->where('ticket_id', $id)->first();
        $contactList = Channel::all();
        $userList = User::all();
        $statusList = Status::all();
        return response()->json([
            'detailTicket' => $detailTicket,
            'contactList' => $contactList,
            'userList' => $userList,
            'statusList' => $statusList
        ]);
    }
}
