<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login', [
            'canRegister' => $this->registrationAvailable(),
        ]);
    }

    public function createRegistration(): View|RedirectResponse
    {
        if (! $this->registrationAvailable()) {
            return redirect()->route('login');
        }

        return view('auth.register');
    }

    public function storeRegistration(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = DB::transaction(function () use ($validated) {
            $users = User::query()->lockForUpdate()->get();
            $nonSampleUserExists = $users->contains(
                fn (User $user) => $user->email !== 'test@example.com'
            );

            if ($nonSampleUserExists) {
                return null;
            }

            $sampleUser = $users->firstWhere('email', 'test@example.com');

            if ($sampleUser) {
                $sampleUser->fill($validated);
                $sampleUser->save();

                return $sampleUser;
            }

            return User::create($validated);
        });

        if (! $user) {
            return redirect()->route('login');
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['email' => 'The email or password is incorrect.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    private function registrationAvailable(): bool
    {
        return User::query()
            ->where('email', '!=', 'test@example.com')
            ->doesntExist();
    }
}
