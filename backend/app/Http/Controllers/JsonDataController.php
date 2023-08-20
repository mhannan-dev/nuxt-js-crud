<?php

namespace App\Http\Controllers;

use App\Models\JsonDataModel;
use Illuminate\Http\Request;

class JsonDataController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['json'] = new JsonDataModel();
        return view('json.create', $data);
    }

    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {

        $inputData = [];

        $headlines = $request->input('headline');
        $descriptions = $request->input('description');

        foreach ($headlines as $index => $headline) {
            $inputData[] = [
                'headline' => $headline,
                'description' => $descriptions[$index],
            ];
        }
        JsonDataModel::create([
            'title' => "Post title",
            'content' => json_encode($inputData),
        ]);
        return response()->json(['message' => 'Data saved successfully']);
    }
    /**
     * Display the specified resource.
     */
    public function view()
    {
        $data['jsonDataModel'] = JsonDataModel::first();
        $data['content'] = json_decode($data['jsonDataModel']->content);
        return view('json.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JsonDataModel $jsonDataModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JsonDataModel $jsonDataModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JsonDataModel $jsonDataModel)
    {
        //
    }
}
