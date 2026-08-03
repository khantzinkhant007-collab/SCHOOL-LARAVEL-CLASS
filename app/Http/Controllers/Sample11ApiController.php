<?php

namespace App\Http\Controllers;

use App\Http\Resources\SampleResource;
use App\Libs\JsonConvert;
use Illuminate\Http\Request;
use App\Models\Sample;
use Symfony\Component\HttpFoundation\Response;

class Sample11ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $samples = Sample::orderBy("created_at", "desc")->get();
        $convert = new JsonConvert();

        if ($samples->isNotEmpty()) {
            $samples = SampleResource::collection($samples);
            $status = Response::HTTP_OK;
        } else {
            $samples = null;
            $status = Response::HTTP_NOT_FOUND;
        }

        return $convert->toJson($samples, $status);
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
        $sample = Sample::find($id);
        $convert = new JsonConvert();

        if ($sample) {
            $sample = new SampleResource($sample);
            $status = Response::HTTP_OK;
        } else {
            $status = Response::HTTP_NOT_FOUND;
        }

        return $convert->toJson($sample, $status);
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
