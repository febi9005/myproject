@extends('template.layout')
@extends('template.nav')
@section('title', 'profil - Toko Baju ')
@section('main')
<div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah metode pembayaran</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman metode pembayaran</li>
                    </ol>
                    <form action="{{ route('action.create_metode_pembayaran') }}" method="post">   
                    @csrf
                    <label for="user" class="form-label">User</label>
                    <select class="form-control" name="user" id="user" required>
                    <option disabled selected>- Pilih User -</option>
                    @foreach ($data_user as $item)
                    <option value="{{ $item->user_id }}">
                    {{ $item->user_id }}
                    </option>
                    @endforeach
                    </select>
                    </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="metode_pembayaran_jenis" class="form-label">  jenis pembayaran*</label>
                                <input type="text" name="jenis" id="jenis" class="form-control"
                                    placeholder="Masukkan harga pakaian">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="metode_pembayaran_nama" class="form-label"> nama pembayaran*</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Masukkan nama">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="metode_pembayaran_nomor" class="form-label"> nomor rekening*</label>
                                <input type="text" name="nomor" id="nomor" class="form-control"
                                    placeholder="Masukkan nomor">
                            </div>

                                    <input type="submit" class="btn btn-primary" value="Tambahkan">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>