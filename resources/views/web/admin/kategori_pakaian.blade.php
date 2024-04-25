@extends('template.layout_admin')
@extends('template.leyout')
@extends('template.sidebar_admin')
@section('title', 'admin - Toko Baju ')
@section('main')
<!-- Page Content  -->
<div id="content">
    <div class="top-navbar">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                    <span class="material-icons">arrow_back_ios</span>
                </button>
                <a class="navbar-brand" href="#"> admin </a>
                <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="material-icons">more_vert</span>
                </button>

                <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="dropdown nav-item active">
                            <a href="#" class="nav-link" data-toggle="dropdown">
                                <span class="material-icons">notifications</span>
                                <span class="notification">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">You have 5 new messages</a>
                                </li>
                                <li>
                                    <a href="#">You're now friend with Mike</a>
                                </li>
                                <li>
                                    <a href="#">Wish Mary on her birthday!</a>
                                </li>
                                <li>
                                    <a href="#">5 warnings in Server Console</a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="material-icons">apps</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="material-icons">person</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="material-icons">settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Kategori</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Data Kategori</li>
                </ol>
                <a href='/create_kategori_pakaian'>
                    <button class="btn btn-primary mb-3">Tambah Data</button>
                </a>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table align-middle table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>kategori nama</th>
                                <th>kategori kode</th>
                                <th>kategori status</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($kategori_pakaian as $items)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $items->kategori_pakaian_nama }}</td>
                                <td>{{ $items->kategori_pakaian_kode }}</td>
                                @switch($items->kategori_pakaian_status)
                                @case ('0')
                                <td>
                                    <button type="button" class="btn btn-outline-danger btn-sm w-100">
                                        Tidak Aktif
                                    </button>
                                </td>
                                @break

                                @case ('1')
                                <td>
                                    <button type="button" class="btn btn-outline-success btn-sm w-100">
                                        Aktif
                                    </button>
                                </td>
                                @break

                                @default
                                <td>
                                    <button type="button" class="btn btn-outline-warning btn-sm w-100">
                                        Kesalahan Data
                                    </button>
                                </td>
                                @break
                                @endswitch
                                <td colspan="2" class="d-grid">
                                    <a class="d-grid" href="{{route('kategori_pakaian.update', ['kategori_pakaian_id' => $items->kategori_pakaian_id])}}"><button class="btn btn-warning"><i class="bi bi-pencil-square"></i>update</button></a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletekategoriModal_{{$items->kategori_pakaian_id}}">
                                        <i class="bi bi-trash3-fill"></i>hapus
                                    </button>
                                </td>
                                <div class="modal fade" id="deletekategoriModal_{{$items->kategori_pakaian_id}}" tabindex="-1" aria-labelledby="deletekategoriModalLabel_{{$items->kategori_pakaian_id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deletekategoriModalLabel_{{$items->kategori_pakaian_id}}">Konfirmasi Hapus</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Data yang dipilih akan dihapus? Apakah anda yakin?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak (Batal Hapus)</button>
                                                <form class="d-grid" action="{{route('kategori_pakaian.delete', ['kategori_pakaian_id' => $items->kategori_pakaian_id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Ya (Konfirmasi Hapus)</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                            </trbody>
                            </tabble>
                </div>
            </div>
        </main>