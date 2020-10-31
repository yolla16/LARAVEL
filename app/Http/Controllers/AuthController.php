<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view ('login');
    }

    public function postLogin(Request $request)
    {
        try {
            if (Auth::attempt($request->only(['email', 'password']))) {
                echo "Berhasil login";
                exit;

                // lakukan sesuatu

            } else {
                echo "Gagal login";
                exit;

                // lakukan sesuatu

            }
        } catch (\Exception $th) {
            return $this->exception($th);
        }
    }

    private function exception(\Exception $e) {
        if($e instanceof ClientException) {
            $newException = json_decode($e->getResponse()->getBody()->getContents(), true);
            if($newException) {
                $e = new \Exception($newException['reason'], $newException['code']);
            }
        }

        $arr = [
            'message' => $e->getMessage(),
            'code' => $e->getCode()
        ];
        return response()->json($arr);
    }

    public function getRegister()
    {
        return view ('register');
    }

    public function postRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('Login');
    }
}
