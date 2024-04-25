<?php

namespace App\Http\Controllers;

use App\Models\Data_Pakaian;
use App\Models\Data_Pembelian;
use App\Models\Data_User;
use App\Models\Detail_Pembelian;
use App\Models\Kategori_Pakaian;
use App\Models\Metode_Pembayaran;
use App\Models\Review_Pakaian;
use Illuminate\Http\Request;

class Pages_Controller extends Controller
{
    public function loginPage()
    {
        return view("public.login");
    }
    public function registerPage()
    {
        return view('public.register');
    }

    public function penggunaPage()
    {
        return view('home');
    }
    public function adminpage()
    {
        return view('data.admin');
    }
    public function cartpage()
    {
        $pakaian = Data_Pakaian::readData_PakaianPaginate();
        $kategori = Kategori_Pakaian::readKategori_PakaianAll();
        return view('web.view.cart', [
            "data_pakaian" => $pakaian,
            "kategori_pakaian" => $kategori,
        ]);
    }
    public function profilPage()
    {
        $metode = Metode_Pembayaran::readMetode_PembayaranAll();
        $pembelian = Data_Pembelian::readData_PembelianPaginate();
        return view("web.view.profil", [
            "metode_pembayaran" => $metode,
            "data_pembelian" => $pembelian,
        ]);
    }
    public function dashboardPage()
    {
        $pakaian = Data_Pakaian::readData_PakaianAll();
        return view("web.view.dashboard", ["data_pakaian" => $pakaian]);
    }
    public function checkoutPage()
    {
        $metode = Metode_Pembayaran::readMetode_PembayaranAll();
        $pembeliaan = Data_Pembelian::readData_PembelianPaginate();
        return view("web.view.checkout", [
            "metode_pembayaran" => $metode,
            "data_pembelian" => $pembeliaan,
        ]);
    }
    public function detailPage($id)
    {
        $data = Data_Pakaian::readData_PakaianById($id);
        $pakaian = Data_Pakaian::readData_PakaianAll();
        return view("web.view.cart", [
            "detail" => $data,
            "data_pakaian" => $pakaian,
        ]);
    }
    
    public function kategori_pakaianPage()
    {
        $data = Kategori_Pakaian::readKategori_PakaianPaginate();
        return view("web.admin.kategori_pakaian", ["kategori_pakaian" => $data]);
    }
    public function data_pakaianPage()
    {
        $pakaian = Data_Pakaian::readData_PakaianPaginate();
        $kategori = Kategori_Pakaian::readKategori_PakaianAll();
        return view("web.admin.data_pakaian", [
            "data_pakaian" => $pakaian,
            "kategori_pakaian" => $kategori,
        ]);
    }

    public function data_pakaian_penggunaPage()
    {
        $pakaian = Data_Pakaian::readData_PakaianPaginate();
        $kategori = Kategori_Pakaian::readKategori_PakaianAll();
        return view("web.view.home", [
            "data_pakaian" => $pakaian,
            "kategori_pakaian" => $kategori,
        ]);
    }
    public function review_pakaianPage()
    {
        $data = Review_Pakaian::readReview_PakaianPaginate();
        return view("web.data.review_pakaian", ["review_pakaian" => $data]);
    }
    public function data_userPage()
    {
        $data = Data_User::readData_UserPaginate();
        return view("web.data.data_user", ["data_user" => $data]);
    }
    public function metode_pembayaranPage()
    {
        $data1 = Metode_Pembayaran::readMetode_PembayaranPaginate();
        $data2 = Data_User::readData_UserAll();
        
        return view("web.view.metode_pembayaran", [
            "metode_pembayaran" => $data1,
            "data_user" => $data2,
        ]);
    }
    public function data_pembelianPage()
    {
        $data1 = Data_Pembelian::readData_PembelianPaginate();
        $data2 = Data_User::readData_UserAll();
        $data3 = Metode_Pembayaran::readMetode_PembayaranPaginate();
        return view("web.view.pembelian", [
            "data_pembelian" => $data1,
            "data_user" => $data2,
            "metode_pembayaran" => $data3,
        
        ]);
    }
    public function detail_pembelianPage()
    {
        $data = Detail_Pembelian::readDetail_PembelianPaginate();
        return view("web.data.detail_pembelian", ["detail_pembelian" => $data]);
    }
}