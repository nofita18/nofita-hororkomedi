@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Pelanggan</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Edit Data Pelanggan</h1>
            <p class="mb-0">Form untuk memperbarui data pelanggan</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow">
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0">Form Edit Pelanggan</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text"
                                   class="form-control"
                                   id="first_name"
                                   name="first_name"
                                   value="{{ old('first_name', $pelanggan->first_name) }}"
                                   required>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text"
                                   class="form-control"
                                   id="last_name"
                                   name="last_name"
                                   value="{{ old('last_name', $pelanggan->last_name) }}">
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date"
                                   class="form-control"
                                   id="birthday"
                                   name="birthday"
                                   value="{{ old('birthday', $pelanggan->birthday) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="" disabled>-- Pilih --</option>
                                <option value="Male" {{ $pelanggan->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $pelanggan->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ $pelanggan->gender == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                   class="form-control"
                                   id="email"
                                   name="email"
                                   value="{{ old('email', $pelanggan->email) }}"
                                   required>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text"
                                   class="form-control"
                                   id="phone"
                                   name="phone"
                                   value="{{ old('phone', $pelanggan->phone) }}">
                        </div>
                    </div>

                    <hr>

                    <div class="text-end">
                        <button type="submit" class="btn text-white me-2" style="background-color: #172b4d;">
                            Update
                        </button>
                        <a href="{{ route('pelanggan.index') }}"
                           class="btn border"
                           style="color: #172b4d; border-color: #172b4d;">
                            Batal
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
