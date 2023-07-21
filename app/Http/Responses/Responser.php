<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait Responser
{
    public function successResponseExternal($data, $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }
    public function successResponse($data = null, $code = Response::HTTP_OK, $message = null): JsonResponse
    {
        $this->response = [
            'status' => "OK",
            'message' => $message,
            'code' => $code,
            'data' => $data,
            'date' => date('Y-m-d H:i:s'),
        ];
        return response()->json($this->response, $code);
    }
    public function errorResponse($message, $code = 422): JsonResponse
    {
        if(is_array($message) || is_object($message))
        {
            foreach ($message as $key => $value) {
                $error[] = [
                    'field' => $key,
                    'message' => $value[0]
                ];
            }
        }
        else
            $error = $message;
        $this->response = [
            'status' => "ERROR",
            'message' => $error,
            'code' => $code,
            'data' => null,
            'date' => date('Y-m-d H:i:s'),
        ];
        return response()->json($this->response, $code);
    }
    public function errorMessage($message, $code)
    {
        $this->response = [
            'message' => $message,
            'code' => $code,
        ];
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}
