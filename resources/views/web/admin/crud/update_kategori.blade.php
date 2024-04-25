@extends('template.leyout')
@section('title', 'admin - Toko Baju ')
@section('main')
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="mt-4">Update kategori</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Halaman Update Data Buku</li>
</ol>
<form action="{{ route('action.kategori_pakaian') }}" method="post">
@crsf
<div class="row gap-3">
                        <div class="col-12 col-md-4 form-group">
                                <label for="nama" class="form-label">kategori nama*</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Masukkan kategori nama">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="pakaian_nama" class="form-label">kategori kode*</label>
                                <input type="text" name="kode" id="kode" class="form-control"
                                    placeholder="Masukkan kode kategori">
                            </div>
                            <div class="m-2 d-grid">
                                                    <label for="kode" class="form-label">Status Aktif</label>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic radio toggle button group">
                                                        <input type="radio" class="btn-check" name="status"
                                                            id="status1" value="1" autocomplete="off" checked
                                                            required>
                                                        <label class="btn btn-outline-success"
                                                            for="status1">Aktif</label>
                                                        <input type="radio" class="btn-check" name="status"
                                                            id="status2" value="0" autocomplete="off">
                                                        <label class="btn btn-outline-danger" for="status2">Tidak
                                                            Aktif</label>
                                                    </div>
                                                </div>
                                            </div>
<button class="btn btn-warning">Update</button>
</div>
</div>
</form>
</div>
</main>
