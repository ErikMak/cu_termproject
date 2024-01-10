<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AuthController extends BaseContoller
{
    public function register(Request $request) {
        $user = new User();

        // Острожно! Кусок без валидации
        $user->login = $request->login;
        $user->password = bcrypt($request->password);
        $user->save();

        return $this->sendOK();
    }
    public function login(Request $request) {
        $data = $request->only('login', 'password');

        // Создание токена
        if($token = $this->guard()->attempt($data)) {
            return $this->sendOK()->header('Authorization', $token);
        }

        return $this->sendError('Отказ входа!', 401);
    }

    public function logout() {
        $this->guard()->logout();

        return $this->sendOK();
    }

    public function user(Request $request) {
        $user = User::find(Auth::user()->id);

        return $this->sendResponse($user);
    }

    public function refresh() {
        if($token = $this->guard()->refresh()) {
            return $this->sendOK()->header('Authorization', $token);
        }

        return $this->sendError('Ошибка обновления токена авторизации!', 401);
    }

    private function guard() {
        return Auth::guard();
    }
}
