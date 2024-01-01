<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->select('id', 'name', 'email', 'handphone', DB::raw('DATE_FORMAT(created_at, "%d %M %Y")
             as created_at'))
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('schedule.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $schedule)
    {

        User::create([
            'subject_id' => $schedule['subject_id'],
            'hari' => $schedule['hari'],
            'jam_mulai' => Hash::make($schedule['jam_mulai']),
            'jam_selesai' => $schedule['jam_selesai'],
            'ruangan' => $schedule['ruangan'],
        ]);

        return redirect(route('schedule.index'))->with('success', 'data berhasil disimpan');
    }

    public function edit(User $user)
    {
        return view('schedule.edit')->with('user', $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validate = $request->validated();
        $user->update($validate);
        return redirect()->route('user.index')->with('success', 'Edit User Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Delete User Successfully');
    }
}


