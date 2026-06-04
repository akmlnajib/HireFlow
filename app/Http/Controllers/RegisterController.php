<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        DB::beginTransaction();

        try {
            // 1. SIMPAN USER
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'pelamar'
            ]);

            // 2. (OPTIONAL SESUAI ANALISA)
            // bikin profil pelamar kosong dulu
            DB::table('profiles')->insert([
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::commit();

            return redirect('/login')->with('success', 'Akun berhasil dibuat');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors('Terjadi kesalahan, coba lagi');
        }
    }
}