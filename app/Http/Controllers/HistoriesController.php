<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Verification_rents;
use App\Models\User;
use App\Models\Products;
use App\Models\Histories;
use Illuminate\Support\Facades\Auth;

class HistoriesController extends Controller
{
    public function insertData (Request $request){
        Histories::create([
            'owner_id' => $request->owner_id,
            'penyewa_id' => $request->penyewa_id,
            'prod_id' => $request->prod_id,
        ]);
        return redirect('/main');
    }

    public function fetchSewaSaya ($id){
        $verify = Verification_rents::where('penyewa_id', $id)
            ->where('status', 'belum dikonfirmasi')
            ->get();

        if ($verify->isEmpty()) {
            return view('sewaSaya', [
                'verify' => [],
                'arr1'   => [],
                'user'   => null,
                'opsi'   => 'belum'
            ]);
        }

        $arr1 = [];
        foreach ($verify as $vr) {
            $arr1[] = DB::table('products')
                ->where('id', $vr->prod_id)
                ->first();
        }

        $user = DB::table('users')
            ->where('id', $verify->first()->penyewa_id)
            ->first();

        return view('sewaSaya', [
            'verify' => $verify,
            'arr1'   => $arr1,
            'user'   => $user,
            'opsi'   => 'belum'
        ]);
    }

    public function insertVerif(Request $request){
        // Validasi minimal
        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload file
        $path = $request->file('bukti_bayar')->store('bukti', 'public');

        // Simpan ke DB
        Verification_rents::create([
            'owner_id' => $request->owner_id,
            'penyewa_id' => $request->penyewa_id,
            'prod_id' => $request->prod_id,
            'alasan' => $request->alasan,
            'durasi' => $request->durasi,
            'status' => 'belum dikonfirmasi',
            'bukti_bayar' => $path 
        ]);

        $prod = DB::table('products')->where('id', $request->prod_id)->get()->first();

        DB::table('products')->where('id', $request->prod_id)->update([
            'produk'=>$prod->produk,
            'harga'=>$prod->harga,
            'jum_durasi'=>$prod->jum_durasi,
            'satuan_durasi'=>$prod->satuan_durasi,
            'plat'=> $prod->plat,
            'minus'=> $prod->minus,
            'deskripsi'=> $prod->deskripsi,
            'owner_id'=>$prod->owner_id,
            'status'=>"disewa"
        ]);

        return redirect('/main');
    }


    public function fetchVerify($id){
        $verify = Verification_rents::where('owner_id', $id)
            ->where('status', 'belum dikonfirmasi')
            ->get();

        if ($verify->isEmpty()) {
            return view('pesananSaya', [
                'verify' => [],
                'arr1'   => [],
                'user'   => null,
                'opsi'   => 'belum'
            ]);
        }

        $arr1 = [];
        foreach ($verify as $vr) {
            $arr1[] = DB::table('products')
                ->where('id', $vr->prod_id)
                ->first();
        }

        $user = DB::table('users')
            ->where('id', $verify->first()->penyewa_id)
            ->first();

        return view('pesananSaya', [
            'verify' => $verify,
            'arr1'   => $arr1,
            'user'   => $user,
            'opsi'   => 'belum'
        ]);
    }


    public function fetchOpsi(Request $request){
        $status = $request->opsi === 'sudah'
            ? 'dikonfirmasi'
            : 'belum dikonfirmasi';

        $verify = Verification_rents::where('owner_id', Auth::user()->id)
            ->where('status', $status)
            ->get();

        // KALAU KOSONG → langsung return tanpa akses penyewa_id
        if ($verify->isEmpty()) {
            return view('pesananSaya', [
                'verify' => [],
                'arr1'   => [],
                'user'   => null,
                'opsi'   => $request->opsi
            ]);
        }

        $arr1 = [];
        foreach ($verify as $vr) {
            $arr1[] = DB::table('products')
                ->where('id', $vr->prod_id)
                ->first();
        }

        $user = DB::table('users')
            ->where('id', $verify->first()->penyewa_id)
            ->first();

        return view('pesananSaya', [
            'verify' => $verify,
            'arr1'   => $arr1,
            'user'   => $user,
            'opsi'   => $request->opsi
        ]);
    }

    public function accKonfirmasi(Request $request, $id){
        Verification_rents::where('id', $id)->update([
            'status'=> 'dikonfirmasi',
        ]);

        return redirect('/pesanan-saya/' . Auth::user()->id);
    }

    public function tolak(Request $request, $id){
        Products::where('id', $request->prod_id)->update([
            'status'=>'tersedia'
        ]);
        Verification_rents::where('id', $id)->delete();

        return redirect('/pesanan-saya/' . Auth::user()->id);
    }

    public function selesai(Request $request, $id){
        Products::where('id', $request->prod_id)->update([
            'status'=>'tersedia'
        ]);
        Verification_rents::where('id', $id)->update([
            'status'=>'selesai',
            'waktu_mulai'=> $request->waktu_mulai
        ]);

        return redirect('/pesanan-saya/' . Auth::user()->id);
    }

    public function historyProduct($id)
    {
        // ambil semua history berdasarkan owner_id & prod_id
        $verify = Verification_rents::where('owner_id', Auth::id())
                    ->where('prod_id', $id)
                    ->get();

        // ambil data produk
        $data = Products::findOrFail($id);

        return view('detailHistoryOwner', [
            'verify' => $verify,
            'data' => $data
        ]);
    }

    public function searchPenyewa(Request $request, $id)
    {
        // ambil data produk
        $data = Products::findOrFail($id);

        // ambil semua history berdasarkan owner & product
        $verifyQuery = Verification_rents::where('owner_id', Auth::id())
                        ->where('prod_id', $id);

        // jika ada input name, filter penyewa
        if ($request->name) {

            // cari user yang nama-nya LIKE
            $userIds = User::where('name', 'like', "%".$request->name."%")
                        ->pluck('id'); // ambil list ID saja

            // filter verification_rents berdasarkan penyewa_id
            $verifyQuery->whereIn('penyewa_id', $userIds);
        }

        // ambil hasil final
        $verify = $verifyQuery->get();

        return view('detailHistoryOwner', compact('verify', 'data'));
    }


    public function accVer($id){
        Verification_rents::delete()->where('id', $id);
    }
}
