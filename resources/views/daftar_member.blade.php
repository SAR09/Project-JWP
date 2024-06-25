@extends('layouts.app')

@section('title', 'Daftar Member')

@section('content')
    <h2 class="mt-2">Daftar Member</h2>

    <!-- Tambahkan tombol Tambahkan Member di sini -->
    <div class="mt-4">
        <a href="{{ route('tambah.member') }}" class="btn btn-primary">Tambahkan Member</a>
    </div>

    <div class="table-responsive mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Tanggal Daftar</th>
                    <th scope="col">Tanggal Selesai</th>
                    <th scope="col">Foto Kartu Member</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Tampilkan data anggota di sini -->
                @foreach($members as $member)
                    @if(is_object($member))
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->nama }}</td>
                            <td>{{ $member->telp }}</td>
                            <td>{{ $member->tglmulai }}</td>
                            <td>{{ $member->tglakhir }}</td>
                            <td><img src="{{ asset('uploads/' . $member->fotokartu) }}" alt="Foto Kartu Member" style="max-width: 150px;"></td>
                            <td>
                                <div class="d-inline-block">
                                    <a href="{{ route('member.edit', $member->id) }}" class="btn btn-success">Edit</a>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detailModal{{ $member->id }}">View</a> <!-- Tautan untuk membuka modal -->
                                    <a href="#" class="btn btn-danger " onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus member ini?')) document.getElementById('delete-form-{{ $member->id }}').submit();">Delete</a>
                                    <form id="delete-form-{{ $member->id }}" action="{{ route('member.hapus', $member->id) }}" method="post" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal untuk detail anggota -->
                        <div class="modal fade" id="detailModal{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $member->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel{{ $member->id }}">Detail Anggota</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Nama: {{ $member->nama }}</p>
                                        <p>No Telepon: {{ $member->telp }}</p>
                                        <p>Tanggal Daftar: {{ $member->tglmulai }}</p>
                                        <p>Tanggal Selesai: {{ $member->tglakhir }}</p>
                                        <p>Foto Kartu Member:</p>
                                        <img src="{{ asset('uploads/' . $member->fotokartu) }}" alt="Foto Kartu Member" style="max-width: 100%;">
                                        <!-- Ganti 'uploads/' dengan lokasi penyimpanan sesuai dengan struktur folder Anda -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
