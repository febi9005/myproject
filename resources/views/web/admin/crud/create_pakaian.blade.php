@extends('template.layout_admin')
@section('title', 'admin - Toko Baju ')
@section('main')
<div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Data Pakaian</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Tambah Data pakaian</li>
                    </ol>
                    <form action="{{ route('action.create_data_pakaian') }}" method="post">   
                    @csrf
                        <div class="row gap-3">
                        <div class="col-12 col-md-4 form-group">
                            <div class="col-md-6">
                            <label for="kategori" class="form-label">Kategori Pakaian</label>
                            <select class="form-control" name="kategori" id="kategori" required>
                            <option disabled selected>- Pilih Kategori Pakaian -</option>
                            @foreach ($kategori_pakaian as $item)
                            @if ($item->kategori_pakaian_status == 1)
                            <option value="{{ $item->kategori_pakaian_id }}">
                            {{ $item->kategori_pakaian_nama }}</option>
                            @endif
                            @endforeach
                            </select>
                            </div> 

                            <div class="col-12 col-md-4 form-group">
                                <label for="pakaian_nama" class="form-label">pakaian nama*</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Masukkan nama pakaian">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="pakaian_harga" class="form-label"> pakaian harga*</label>
                                <input type="text" name="harga" id="harga" class="form-control"
                                    placeholder="Masukkan harga pakaian">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="pakaian_stok" class="form-label">pakaian stok*</label>
                                <input type="text" name="stok" id="stok" class="form-control"
                                    placeholder="Masukkan stok pakaian">
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