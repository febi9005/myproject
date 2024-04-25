@extends('template.nav_admin')
@extends('template.sidebar_admin')
@section('title', 'admin - Toko Baju ')
@section('main')
<section class="pt-2 container pb-5">
    <div class="card text-center border-2">
        <div class="card-body">
            <h2 class="card-title">Data User</h2>
            <h4 class="card-text text-body-secondary">Halaman Data User</h4>
        </div>
    </div>
    <div class="container-fluid px-4 pt-4 pb-5">
        <div class="row gap-4 justify-content-sm-around">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif (session('updated'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('updated') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif (session('deleted'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('deleted') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <center>
                <a href="/create_user"><button class="btn btn-primary mb-1">
                        Tambah User
                    </button></a>
            </center>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="align-middle text-center">
                        <tr>
                            <th>No</th>
                            <th>User Nama</th>
                            <th>User Profil</th>
                            <th>User Alamat</th>
                            <th>User Username</th>
                            <th>User E-mail</th>
                            <th>User No. Telp</th>
                            <th>User Level</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle table-group-divider">
                        @foreach($user as $items)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$items->user_nama}}</td>
                            @if ($items->user_pict_url === '' || $items->user_pict_url === null)
                                <td><img width="100px" height="100px" src="{{ asset('img/placeholder.png') }}" alt="..." class="img-profile img-thumbnail"></td>
                            @else
                                <td><img width="100px" height="100px" src="{{ asset('storage/user/profile_pictures/'.basename($items->user_pict_url)) }}" alt="..." class="img-profile img-thumbnail"></td>
                            @endif
                            <td>{{$items->user_alamat}}</td>
                            <td>{{$items->user_username}}</td>
                            <td>{{$items->user_email}}</td>
                            <td>{{$items->user_notelp}}</td>
                            <td>{{$items->user_level}}</td>
                            <td>
                               {{-- <a class="d-grid" href="{{route('update_user', ['user_id' => $items->user_id])}}"><button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRakUser_{{$items->user_id}}">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </td>
                            <div class="modal fade" id="deleteRakUser_{{$items->user_id}}" tabindex="-1" aria-labelledby="deleteRakUserLabel_{{$items->user_id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteRakUserLabel_{{$items->user_id}}">Konfirmasi Hapus</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Data yang dipilih akan dihapus? Apakah anda yakin?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak (Batal Hapus)</button>
                                    <form class="d-grid" action="{{route('user.delete', ['user_id' => $items->user_id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Ya (Konfirmasi Hapus)</button> --}}
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection