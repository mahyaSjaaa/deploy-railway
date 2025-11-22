<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Verification_rents;
use App\Models\Products;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function riwayatSewa() {
        // Ambil riwayat sewa dengan pagination
        $rentHistory = Verification_rents::where('penyewa_id', Auth::id())
            ->where('status', 'selesai')
            ->paginate(5); // ← jumlah item per page

        // Transformasi item agar ada produk & owner
        $rentHistory->getCollection()->transform(function ($rent) {
            return [
                'produk' => Products::find($rent->prod_id),
                'owner'  => User::find($rent->owner_id),
                'rent'   => $rent,
            ];
        });

        // Kirim PAGINATED DATA ke view
        return view('profilUser', ['data' => $rentHistory]);
    }


    public function updateProfilUser(Request $request){
        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'no_wa' => $request->no_wa,
            'DESA' => $request->DESA,
            'KECAMATAN'=> $request->KECAMATAN,
            'KOTA' => $request->KOTA,
            'PROVINSI' => $request->PROVINSI,
            'NEGARA' => $request->NEGARA
        ]);

        return redirect('/profilUser');
    }

}
