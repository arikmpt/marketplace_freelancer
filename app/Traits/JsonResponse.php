<?php

namespace App\Traits;

trait JsonResponse {

    public function responseWithCondition($data, $successMsg, $failMsg)
    {
        return $data ? $this->success($successMsg)
            : $this->fail($failMsg);
    }

    public function success($msg, $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $msg
        ], $code);
    }

    public function successWithData($msg, $data, $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $msg,
            'data' => $data
        ], $code);
    }

    public function fail($msg, $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $msg
        ], $code);
    }

    public function failValidate($errors, $code = 401)
    {
        return response()->json([
            'success' => false,
            'errors' => $errors
        ], $code); 
    }
}