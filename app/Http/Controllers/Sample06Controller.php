<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Sample06Controller extends Controller
{
    public function index()
    {
        $list_data = Sample::orderBy("id", "desc")->paginate(10);

        return view("sample06List", compact("list_data"));
    }

    public function create()
    {
        return view("sample07Registration");
    }

    public function store(Request $request)
    {
        $request->session()->regenerateToken();

        $sampleDao = new Sample();
        $request->validate($sampleDao::$rules, $sampleDao::$messages);

        $image = $request->file("image")->store("images", "public");
        $sampleDao->img_path = "storage/" . $image;
        $sampleDao->title = $request->title;
        $sampleDao->body = $request->body;

        DB::transaction(function () use ($sampleDao) {
            $sampleDao->save();
        });

        return redirect()->route("sample06.index");
    }

    public function show(string $id)
    {
        $sample_data = Sample::findOrFail($id);

        return view("sample07Detail", compact("sample_data"));
    }

    public function edit(string $id)
    {
        $sample_data = Sample::findOrFail($id);

        return view("sample08Editing", compact("sample_data"));
    }

    public function update(Request $request, string $id)
    {
        $request->session()->regenerateToken();

        $sampleDao = new Sample();
        $sample_data = Sample::findOrFail($id);
        $rules = $sampleDao::$rules;

        if ($sample_data->img_path) {
            $rules["image"] = ["image"];
        }

        $request->validate($rules, $sampleDao::$messages);

        DB::transaction(function () use ($sample_data, $request) {
            $sample_data->title = $request->input("title");
            $sample_data->body = $request->input("body");

            if ($request->hasFile("image")) {
                $image = $request->file("image")->store("images", "public");
                $sample_data->img_path = "storage/" . $image;
            }

            $sample_data->save();
        });

        return redirect()->route("sample06.show", $id);
    }

    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {
            Sample::findOrFail($id)->delete();
        });

        return redirect()->route("sample06.index");
    }
}
