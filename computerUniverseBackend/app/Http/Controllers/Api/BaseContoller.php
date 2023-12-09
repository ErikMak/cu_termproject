<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Contoller;

class BaseContoller extends Contoller {
    public function sendResponse($data, $msg = '') {
        $response = [
            'status' => true,
            'data' => $data,
        ];

        if(strlen($msg)) {
            $response['message'] = $msg;
        }

        return response()->json($response, 200);
    }
    public function sendError($msg, $code = 404) {
        $response = [
            'status' => false,
            'error' => $msg
        ];

        return response()->json($response, $code);
    }
}
