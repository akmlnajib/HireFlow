<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index()
{
    return view('profile.index', [
        'user' => auth()->user()
    ]);
}
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
    public function update(Request $request)
{
    $user = auth()->user();

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'nik' => 'nullable|string',
        'phone' => 'nullable|string',
        'gender' => 'nullable|string',
        'birth_place' => 'nullable|string',
        'birth_date' => 'nullable|date',
        'address' => 'nullable|string',
        'photo' => 'nullable|image|max:1024',
    ]);

    // update selain foto
    $user->update($data);

    // handle foto
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('avatars', 'public');
        $user->photo = $path;
        $user->save();
    }

    return back()->with('status', 'profile-updated');
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
}
