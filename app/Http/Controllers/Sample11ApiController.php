<?php

namespace App\Http\Controllers;

use App\Http\Resources\SampleResource;
use App\Libs\JsonConvert;
use Illuminate\Http\Request;
use App\Models\Sample;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class Sample11ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $samples = Sample::orderBy("created_at", "desc")->get();
        $convert = new JsonConvert();
        if($samples){
            // return response()->json(
            //     ["data" => SampleResource::collection($samples)],
            //     Response::HTTP_OK,
            // ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            // JSON_UNESCAPED_UNICODE
            // );
            $samples = new SampleResource($samples);
            $status = Response::HTTP_OK;

        }else{
            // return response()->json(
            //     [
            //          "data" => [
            //         "status" => "error",
            //         "message" => "データが存在しません。"
            //          ]
            //     ],
            //     Response::HTTP_NOT_FOUND,
            // ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            // JSON_UNESCAPED_UNICODE
            //);
            $status = Response::HTTP_NOT_FOUND;

        }
        return $convert->toJson($samples,$status);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $sample = Sample::find($id);
        $convert = new JsonConvert();

        if($sample){
            // return response()->json(
            //     ["data"=> new SampleResource($sample)],
            //     Response::HTTP_OK,
            //     ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            //     JSON_UNESCAPED_UNICODE

            // );
            $sample = new SampleResource($sample);
            $status = Response::HTTP_OK;


        }else{
            // return response()->json(
            //     [
            //         "status" => "error",
            //         "message" => "データ保存しません。"
            //     ],
            //     Response::HTTP_NOT_FOUND,
            //     ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            //     JSON_UNESCAPED_UNICODE

            // );
            $status = Response::HTTP_NOT_FOUND;


        }
        return $convert->toJson($sample,$status);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
