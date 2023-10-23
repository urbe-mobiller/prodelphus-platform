<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.pages.login.index');
    }

    public function login(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ], [
                'email.required' => 'Informe seu email',
                'email.email' => 'Informe um endereço de email válido.',
                'password.required' => 'Informe sua senha',
            ]);

            $user = Users::where('email', $request->email)->first();

            if ($user) {

                if (Hash::check($request->password, $user->password)) {
                    $request->session()->put('logado', true);
                    $request->session()->put('id', $user->id);
                    $request->session()->put('name', $user->name);
                    $request->session()->put('email', $user->email);
                    $request->session()->put('phone', $user->phone);
                    return redirect()->route('budgets.index');
                }

                return back()->with([
                    'alert' => true,
                    'type' => 'info',
                    'message' => 'Email ou senha inválidos'
                ]);
            }

            return back()->with([
                'alert' => true,
                'type' => 'danger',
                'message' => 'Email ou senha inválidos'
            ]);
        } catch (Exception $e) {
            return back()->with([
                'alert' => true,
                'type' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login.index');
    }
}
