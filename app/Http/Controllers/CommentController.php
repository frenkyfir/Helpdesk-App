<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{


    public function index($id)
    {
       
    }

    public function test()
    {
        $commentAll = Comment::all();
        return response()->json([
            'comment_text' => $commentAll
        ]);
    }


    public function show(string $id)
    {
        $comments = Comment::find($id);
        return ('AAA');
        return response()->json([
            'comment_text' => $comments,
        ]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'comment_text' => 'required',
        // ]);
        $validator = Validator::make($request->all(), [
            'comment_text' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $comment = Comment::create([
                'user_id' => auth()->user()->id,
                'ticket_id' => $request->input('ticket_id'),
                'comment_text' => Str::ucfirst($request->input('comment_text')),

            ]);
            $comment->save();
            // $comment = new Comment;
            // $comment->user_id = auth()->user()->id;
            // $comment->ticket_id = $request->input('ticket_id');
            // $comment->comment_text = Str::ucfirst($request->input('comment_text'));
            // $comment->save();

            return response()->json([
                'status' => 200,
                'messages' => 'success'
            ]);
        }
        // return back();
    }

    public function destroy(Request $request, $id)
    {
        if (Auth::check()) {
            $comment = Comment::where('id', $request->comment_id)
                ->where('user_id', Auth::user()->id)
                ->first();
            if ($comment) {
                $comment->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'comment delete successfully',
                    'tr' => 'tr_' . $id
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something Wrong'
                ]);
            }
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Login first to delete the comment'
            ]);
        };



        // $data = Comment::find($id);
        // $data->delete();
        // return response()->json(['success' => true, 'tr' => 'tr_' . $id]);
    }
}
