@extends('layouts.app')

@section('title', 'New User')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>New User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Users</a></div>
                    <div class="breadcrumb-item">New User</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('schedule.create') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>New Schedules</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Subject_id</label>
                                <input type="text"
                                    class="form-control @error('subject_id')
                                    is-invalid
                                @enderror"
                                    name="subject_id">
                                @error('subject_id')
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
                                    name="hari">
                                @error('hari')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jam_mulai</label>
                                <input type="jam_mulai"
                                    class="form-control @error('jam_mulai')
                                    is-invalid
                                @enderror"
                                    name="jam_mulai">
                                @error('jam_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jam_selesai</label>
                                <input type="text" class="form-control" name="jam_selesai">
                            </div>

                            <div class="form-group">
                                <label>Ruangan</label>
                                <input type="text" class="form-control" name="ruangan">
                            </div>


                            <div class="form-group">
                                <label class="form-label">Roles</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="admin" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Admin</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="dosen" class="selectgroup-input">
                                        <span class="selectgroup-button">Dosen</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="mahasiswa" class="selectgroup-input">
                                        <span class="selectgroup-button">Mahasiswa</span>
                                    </label>

                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label>Address</label>
                                <textarea class="form-control" data-height="150" name="address"></textarea>
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
