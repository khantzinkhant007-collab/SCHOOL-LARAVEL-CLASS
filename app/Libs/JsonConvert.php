<?php

namespace App\Libs;

class JsonConvert
{
    /*
     * @param  mixed  $data
     * @param  int  $status
     * @return \Illuminate\Http\JsonResponse
     * */
    public function toJson($data = [], $status)
    {
        if (!$data) {
            $data = [
                "status" => "error",
                "message" => "該当する投稿はありません"
            ];
        }

        return response()->json(
            [
                "data" => $data
            ],
            $status,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
}
