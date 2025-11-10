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
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data Pelanggan</h1>
                <p class="mb-0">Form untuk menambah pelanggan baru</p>
            </div>
            <div>
                <a href="pelanggan.create" class="btn btn-success text-white"><i class="far fa-question-circle me-1"></i>
                    Tambah Pelanggan</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Pelanggan</h5>
                    <a href="{{ route('pelanggan.create') }}" class="btn text-white" style="background-color: #172b4d;">
                        + Tambah Pelanggan
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-info">
                            {!! session('success') !!}
                        </div>
                    @endif

                    @if ($dataPelanggan->isEmpty())
                        <div class="text-center text-muted">
                            <p>Belum ada data pelanggan.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Birthday</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPelanggan as $index => $p)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $p->first_name }}</td>
                                            <td>{{ $p->last_name }}</td>
                                            <td>{{ $p->gender }}</td>
                                            <td>{{ $p->email }}</td>
                                            <td>{{ $p->phone }}</td>
                                            <td>{{ $p->birthday }}</td>
                                            <td>
                                                <a href="{{ route('pelanggan.edit', $item->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>

                                                <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">Input Data Pelanggan</h5>
                </div>
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-info">
                            {!! session('success') !!}
                        </div>
                    @endif

                    <form action="{{ route('pelanggan.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-3">
                                <label for="first_name" class="form-label">First name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    id="first_name" name="first_name" value="{{ old('first_name') }}" maxlength="100"
                                    required>
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-6 mb-3">
                                <label for="birthday" class="form-label">Birthday</label>
                                <input type="date" class="form-control @error('birthday') is-invalid @enderror"
                                    id="birthday" name="birthday" value="{{ old('birthday') }}">
                                @error('birthday')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" maxlength="255" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-3">
                                <label for="last_name" class="form-label">Last name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    id="last_name" name="last_name" value="{{ old('last_name') }}" maxlength="100">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-6 mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select @error('gender') is-invalid @enderror" id="gender"
                                    name="gender" required>
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                        Male
                                    </option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                        Female</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>
                                        Other
                                    </option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-12 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}" maxlength="20">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr class="mt-0">

                        <div class="text-end">
                            <button type="submit" class="btn text-white me-2"
                                style="background-color: #172b4d;">Simpan</button>
                            <button type="button" class="btn"
                                style="background-color: #fff; color: #172b4d; border: 1px solid #172b4d;">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- End Main Content --}}
@endsection
