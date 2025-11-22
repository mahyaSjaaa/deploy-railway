<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Verification_rents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProdukController extends Controller
{
    public function fetchDatas() {
        $datas = Products::paginate(10);

        // Ambil semua sewa terkait owner tetapi hanya yang status = dikonfirmasi
        $alerts = Verification_rents::where('owner_id', Auth::id())
                    ->where('status', 'dikonfirmasi')
                    ->get();

        $warnings = [];

        foreach ($alerts as $alert) {

            // Cari produk
            $product = Products::find($alert->prod_id);
            if (!$product) continue;

            // Ambil penyewa
            $penyewa = User::find($alert->penyewa_id);
            if (!$penyewa) continue;

            // Tanggal mulai (updated_at)
            $rentStart = Carbon::parse($alert->updated_at);

            // Hitung expired
            if ($product->satuan_durasi === 'HARI') {
                $expiredAt = $rentStart->copy()->addDays($product->jum_durasi);
            } else if ($product->satuan_durasi === 'JAM') {
                $expiredAt = $rentStart->copy()->addHours($product->jum_durasi);
            } else {
                continue;
            }

            // Jika sudah lewat waktu
            if (now()->greaterThan($expiredAt)) {
                $warnings[] = [
                    'produk'      => $product->produk,
                    'penyewa'     => $penyewa->name,
                    'no_wa'       => $penyewa->no_wa ?? null,
                    'expired_at'  => $expiredAt->translatedFormat('d F Y H:i'),
                ];
            }
        }

        return view('ownerProducts', [
            'datas'    => $datas,
            'warnings' => $warnings,
        ]);
    }

    public function fetchDatasCust() {
        $datas = Products::where('status', 'tersedia')->paginate(10);
        return view('main', compact('datas'));
    }

    public function insertData(Request $request) {
        Products::create([
            'produk'=>$request->produk,
            'harga'=>$request->harga,
            'jum_durasi'=>$request->jumlah_durasi,
            'satuan_durasi'=>$request->satuan,
            'plat'=> $request->plat,
            'minus'=> $request->minus,
            'deskripsi'=> $request->desk,
            'owner_id'=>$request->owner_id,
            'status'=>"tersedia"
        ]);

        return redirect('/dashboard');
    }

    public function fetchById($id){
        $data = Products::findOrFail($id);
        
        return view('editPage', compact('data'));
    }

    public function updateStored(Request $request){
        DB::table('products')->where('id', $request->id)->update([
            'produk'=>$request->produk,
            'harga'=>$request->harga,
            'jum_durasi'=>$request->jum_durasi,
            'satuan_durasi'=>$request->satuan_durasi,
            'plat'=> $request->plat,
            'minus'=> $request->minus,
            'deskripsi'=> $request->deskripsi,
            'owner_id'=>$request->owner_id,
            'status'=>"tersedia"
        ]);

        return redirect('/dashboard');
    }

    public function deleteProduct($id){
        DB::table('products')->where('id', $id)->delete();
        $datas = Products::paginate(10);
        return redirect('/dashboard')->with('datas', $datas);
    }

    public function searchProduct(Request $request){
        $datas = DB::table('products')->where('produk', 'like', "%".$request->cari."%")->paginate(10);

        return view('ownerProducts', compact('datas'));
    }

    public function searchMain(Request $request){
        $datas = DB::table('products')->where('produk', 'like', "%".$request->cari."%")->paginate(10);

        return view('main', compact('datas'));
    }

    public function detailProduct($id){
        $data = Products::findOrFail($id);
        
        return view('detailProd', compact('data'));
    }

}
