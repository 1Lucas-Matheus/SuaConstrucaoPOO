<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
    
        $Users = User::all();
        $UserId = Auth::user();
        $page = "Dashboard";
    
        $usersJoin = User::select('users.categoryId', 'categories.Name')
            ->join('categories', 'users.categoryId', '=', 'categories.id')
            ->get();
    
        // Use o método 'with' para enviar os dados
        return redirect('dashboard')->with([
            'Users' => $Users,
            'UserId' => $UserId,
            'usersJoin' => $usersJoin,
            'page' => $page
        ]);
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}