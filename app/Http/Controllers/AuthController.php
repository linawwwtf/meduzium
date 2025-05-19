<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AuthController extends Controller
{
    use AuthorizesRequests;
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                'email'
            ],
            'password' => [
                'required',
                'string',
                Password::min(8)

                    ->numbers()

            ]
        ], [
            'email.regex' => 'Email должен быть в формате example@domain.com',
            'password.required' => 'Пароль обязателен',
            'password.string' => 'Пароль должен быть строкой'
        ]);
    
        if (Auth::attempt($credentials)) {
            if (auth()->user()->role !== 'admin') {
                Auth::logout();
                return back()->withErrors([
                    'auth' => 'Доступ только для администраторов'
                ]);
            }
            
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
    
        return back()->withErrors([
            'auth' => 'Неправильный email или пароль'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }

    public function showAdminRegistrationForm()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Доступ запрещен');
        }

        return view('auth.register');
    }

    public function registerAdmin(Request $request)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Доступ запрещен');
        } 

        $this->authorize('create', User::class);
        
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'min:2',
                'max:50',
                'regex:/^[a-zA-Z\s]+$/',
                Rule::unique('users')->ignore($request->user_id)
            ],
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->numbers()
            ],
        ]);
    
        $data['password'] = Hash::make($data['password']);
    
        User::create($data);
    
        return redirect()->route('admin.dashboard')
            ->with('success', 'Новый администратор успешно создан!');
    }

    }
