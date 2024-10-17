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

    public function plan(Request $request): RedirectResponse
    {
        $request->validate([
            'package' => 'required|integer|in:0,1', // 0 for Public, 1 for Premium
        ]);

        // Update the user's package
        $user = $request->user();
        $user->package = $request->package;

        // If the package is premium, you can process payment information here
        if ($user->package == 1) {
            // Validate payment details if needed (e.g., card_number, expiry_date, cvv)
            $request->validate([
                'card_number' => 'required|string',
                'expiry_date' => 'required|string|date_format:m/y',
                'cvv' => 'required|string|size:3',
            ]);
        }

        $user->save(); // Save the updated package

        return Redirect::route('profile.edit')->with('status', 'plan-updated');
    }

}
