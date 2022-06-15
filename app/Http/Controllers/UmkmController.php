<?php

namespace App\Http\Controllers;

use App\Seller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $seller_list = Seller::select('id', 'nama_toko', 'nomor_telepon')->where('tag', '2')->get();
        $seller_list = Seller::select('sellers.id as id_penjual', 'sellers.nama_penjual', 'sellers.nomor_telepon', 'sellers.nama_toko', 'provinces.name as provinsi', 'regencies.name as kabupaten', 'districts.name as kecamatan', 'villages.name as desa', 'sellers.alamat', 'sellers.kode_pos', 'sellers.foto_penjual', 'sellers.flag')->where('sellers.tag', '2')->join('provinces', 'sellers.province_id', '=', 'provinces.id')->join('regencies', 'sellers.regency_id', '=', 'regencies.id')->join('districts', 'sellers.district_id', '=', 'districts.id')
        ->join('villages', 'sellers.village_id', '=', 'villages.id')
        ->get();

        return view('admins.umkm.index', compact('seller_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller_detail = Seller::select('sellers.id as id_penjual', 'sellers.nama_penjual', 'sellers.nomor_telepon', 'sellers.nama_toko', 'provinces.name as provinsi', 'regencies.name as kabupaten', 'districts.name as kecamatan', 'villages.name as desa', 'sellers.alamat', 'sellers.kode_pos', 'sellers.foto_penjual', 'sellers.flag')->where('sellers.id', $id)->join('provinces', 'sellers.province_id', '=', 'provinces.id')->join('regencies', 'sellers.regency_id', '=', 'regencies.id')->join('districts', 'sellers.district_id', '=', 'districts.id')
        ->join('villages', 'sellers.village_id', '=', 'villages.id')
        ->get();

        return view('admins.umkm.show', compact('seller_detail'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Seller::select('nomor_telepon', 'id')->where('id', $id)->get()[0];
        return view('admins.umkm.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $account = User::select('users.id')->join('sellers', 'users.id', '=', 'sellers.id_pengguna')->where('sellers.id', $id)->get()[0];

        $this->validate($request, [
            'password'      => 'required',
        ]);
            $password = Hash::make($request->password);
            User::where('id', $account->id)
                ->update(['password' => $password]);

            return redirect('umkm')->with('success', 'Berhasil Mengganti Kata Sandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Seller::destroy($id);
        return redirect('umkm')->with('success', 'Berhasil Menghapus Umkm');
    }
}
