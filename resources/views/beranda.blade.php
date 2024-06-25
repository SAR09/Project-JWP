@extends('layouts.app')

@section('title', 'Selamat Datang Admin')

@section('content')

<div class="container">
  <div class="row">
    <h1>Selamat Datang Admin!</h1>
    <p>
      Selamat datang di panel admin kami!<br> Di sini, Anda memiliki akses penuh untuk mengelola keanggotaan gym kami dan fitur administratif lainnya:
    </p>
    <ol class="list-group list-group-numbered">
      <li class="list-group-item">
        Kelola Anggota:
        Anda dapat menambahkan anggota baru, mengedit informasi anggota yang sudah ada, dan menghapus anggota yang tidak aktif.
      </li>
    </ol>
    <p>
      Gunakan fitur ini untuk menjaga keanggotaan gym kami tetap terorganisir dan terkini.
    </p>
    <p>
      Terima kasih telah menggunakan panel admin kami. Semoga pengelolaan keanggotaan gym menjadi lebih efisien!
    </p>
  </div>
</div>

@endsection
