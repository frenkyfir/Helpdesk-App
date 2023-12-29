<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use GrahamCampbell\ResultType\Success;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UsermanagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listUser = DB::table('users')
            // ->paginate(5);
            ->get();
        return view('pages.usermanagement.index', compact('listUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        addJavascriptFile('assets/js/custom/authentication/sign-up/general.js');

        // return view('pages.auth.register');
        return view('pages.usermanagement.adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => Str::ucfirst($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($user));

        // Auth::login($user);
        toastr()->success('User has ben created!');
        return redirect()->route('usermanagement');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteUser = User::find($id);
        $deleteUser->delete();
        return redirect()->route('usermanagement')->with('success', ' User berhasil dihapus');
    }
}
