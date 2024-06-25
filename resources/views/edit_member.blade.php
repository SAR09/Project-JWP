@extends('layouts.app')

@section('title', 'Edit Data Member')

@section('content')
    <h2 class="mt-2">Edit Data Member</h2>

    <form action="{{ route('member.update', ['id' => $members->id]) }}" method="post" enctype="multipart/form-data" class="mt-4">
        @csrf
    
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap:</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $members->nama) }}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="telp" class="form-label">No Telepon:</label>
            <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" value="{{ old('telp', $members->telp) }}" required>
            @error('telp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tglmulai" class="form-label">Tanggal Mulai:</label>
            <input type="date" class="form-control @error('tglmulai') is-invalid @enderror" id="tglmulai" name="tglmulai" value="{{ old('tglmulai', $members->tglmulai) }}" required>
            @error('tglmulai')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tglakhir" class="form-label">Tanggal Selesai:</label>
            <input type="date" class="form-control @error('tglakhir') is-invalid @enderror" id="tglakhir" name="tglakhir" value="{{ old('tglakhir', $members->tglakhir) }}" required>
            @error('tglakhir')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="fotokartu" class="form-label">Foto Kartu Member:</label>
            <input type="file" class="form-control @error('fotokartu') is-invalid @enderror" id="fotokartu" name="fotokartu" required>
            @error('fotokartu')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary">Edit Member</button>
    </form>

    {{-- Tampilkan pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
@endsection
