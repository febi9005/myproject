@extends('template.layout')
@extends('template.nav')
@section('title', 'profil - Toko Baju ')
@section('main')
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<h1 class="mt-4">Cart</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Halaman Cart</li>
</ol>
<div class="table-responsive">
<table class="table align-middle table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>kategori </th>
                            <th>pakaian nama</th>
                            <th>pakaian harga</th>
                            <th>pakaian stok</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @foreach ($data_pakaian as $items)
                    <?php $kategori = \App\Models\Kategori_Pakaian::find($items->pakaian_kategori_pakaian_id); ?>
                        <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $items->pakaian_nama }}</td>
                                <td>{{ $kategori->kategori_pakaian_nama }}</td>
                                <td>{{ $items->pakaian_harga }}</td>
                                <td>{{ $items->pakaian_stok }}</td>
                            <td colspan="2" class="d-grid">
                                    <a class="d-grid" href=""><button class="btn btn-warning"><i class="bi bi-pencil-square"></i>beli</button></a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletekategoriModal_{{$items->pakaian_id}}">
                                        <i class="bi bi-trash3-fill"></i>Hapus
                                    </button>
                                </td>
                                <div class="modal fade" id="deletekategoriModal_{{$items->pakaian_id}}" tabindex="-1" aria-labelledby="deletekategoriModalLabel_{{$items->pakaian_id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deletekategoriModalLabel_{{$items->pakaian_id}}">Konfirmasi Hapus</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Data yang dipilih akan dihapus? Apakah anda yakin?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak (Batal Hapus)</button>
                                                <form class="d-grid" action="{{route('data_pakaian.delete', ['pakaian_id' => $items->pakaian_id])}}" method="POST">
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
</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</main>
