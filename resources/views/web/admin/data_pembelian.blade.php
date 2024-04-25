@extends('template.layout_admin')
@extends('template.sidebar_admin')
@section('title', 'admin - Toko Baju ')
@section('main')
<section class="pt-2 container pb-5">
        <div class="card text-center border-2">
            <div class="card-body">
                <h2 class="card-title">Data Pembelian</h2>
                <h4 class="card-text text-body-secondary">Halaman Data Pembelian</h4>
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
                <div class="table-responsive">
                    <table class="table align-middle table-bordered table-hover">
                        <thead class="align-middle text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Metode Pembayaran</th>
                                <th>Tanggal Pembelian</th>
                                <th>Total Harga</th>
                                <th>Status Pembelian</th>
                                <th colspan="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($data_pembelian as $items)
                                <?php $user = \App\Models\Data_User::find($items->pembelian_user_id); ?>
                                <?php $metode = \App\Models\Metode_Pembayaran::find($items->pembelian_metode_pembayaran_id); ?>
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $user->user_fullname }}</td>
                                    <td>{{ $metode->metode_pembayaran_jenis }}</td>
                                    <td>{{ $items->pembelian_tanggal }}</td>
                                    <td>Rp. {{ $items->pembelian_total_harga }}</td>
                                    @switch($items->pembelian_status)
                                        @case ('beli')
                                            <td><button type="button" class="btn btn-outline-warning btn-sm w-100">Beli</button>
                                            </td>
                                        @break

                                        @case ('proses')
                                            <td><button type="button" class="btn btn-outline-info btn-sm w-100">Proses</button>
                                            </td>
                                        @break

                                        @case ('selesai')
                                            <td><button type="button" class="btn btn-outline-success btn-sm w-100">Selesai</button>
                                            </td>
                                        @break

                                        @case ('batal')
                                            <td><button type="button" class="btn btn-outline-danger btn-sm w-100">Batal</button>
                                            </td>
                                        @break

                                        @default
                                            <td><button type="button" class="btn btn-outline-danger btn-sm w-100">Kesalahan
                                                    Data</button></td>
                                        @break
                                    @endswitch 
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#viewPembelianModal_{{ $items->pembelian_id }}">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#updatePembelianModal_{{ $items->pembelian_id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deletePembelianModal_{{ $items->pembelian_id }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection