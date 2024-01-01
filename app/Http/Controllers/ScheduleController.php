<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $schedules = DB::table('schedules')
            ->when($request->input('subject_id'), function ($query, $subject_id) {
                return $query->where('subject_id', 'like', '%' . $subject_id . '%');
            })
            ->select('id', 'subject_id', 'hari', 'jam_mulai', 'jam_selesai', 'ruangan', DB::raw('DATE_FORMAT(created_at, "%d %M %Y")
             as created_at'))
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('pages.schedule.index', compact('schedules'));
    }

    public function create()
    {
        return view('pages.schedule.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        User::create([
            'subject_id' => $request['subject_id'],
            'hari' => $request['hari'],
            'jam_mulai' => Hash::make($request['jam_mulai']),
            'jam_selesai' => $request['jam_selesai'],
            'ruangan' => $request['ruangan'],
        ]);

        return redirect(route('schedule.index'))->with('success', 'data berhasil disimpan');
    }

    public function edit(User $user)
    {
        return view('pages.users.edit')->with('user', $user);
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
    public function update(UpdateUserRequest $request, Schedule $schedule)
    {
        $validate = $request->validated();
        $schedule->update($validate);
        return redirect()->route('schedule.index')->with('success', 'Edit User Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedule.index')->with('success', 'Delete User Successfully');
    }
}
