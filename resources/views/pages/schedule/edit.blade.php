@extends('layouts.app')

@section('title', 'Edit User')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Users</a></div>
                    <div class="breadcrumb-item">Edit User</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('schedule.update', $schedule) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Schedule</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Subject_id</label>
                                <input type="text"
                                    class="form-control @error('subject_id')
                                    is-invalid
                                @enderror"
                                    name="name" value="{{ $schedule->subject_id }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Hari</label>
                                <input type="hari"
                                    class="form-control @error('hari')
                                    is-invalid
                                @enderror"
                                    name="schedule" value="{{ $schedule->hari }}">
                                @error('schedule')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jam_mulai</label>
                                <input type="text" class="form-control" name="jam_mulai" value="{{ $schedule->jam_mulai }}">
                            </div>

                            <div class="form-group">
                                <label>Jam_selesai</label>
                                <input type="text" class="form-control" name="jam_selesai" value="{{ $schedule->jam_selesai }}">
                            </div>

                            <div class="form-group">
                                <label>Ruangan</label>
                                <input type="text" class="form-control" name="ruangan" value="{{ $schedule->ruangan }}">
                            </div>


                            <div class="form-group">
                                <label class="form-label">Roles</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="admin" class="selectgroup-input"
                                            @if ($user->roles == 'admin') checked @endif>
                                        <span class="selectgroup-button">Admin</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="dosen" class="selectgroup-input"
                                            @if ($user->roles == 'dosen') checked @endif>
                                        <span class="selectgroup-button">Dosen</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="mahasiswa" class="selectgroup-input"
                                            @if ($user->roles == 'mahasiswa') checked @endif>
                                        <span class="selectgroup-button">Mahasiswa</span>
                                    </label>

                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label>Address</label>
                                <textarea class="form-control" data-height="150" name="address">
                                    {{ $schedules->address }}
                                </textarea>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
