<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class aboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ], [
            'title.required' => 'وارد کردن عنوان الزامی است!',
            'description.required' => 'وارد کردن توضیحات الزامی است!',
            'link.required' => 'وارد کردن لینک الزامی است!',
        ])->validate();

        About::create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
        ]);
        return redirect()->route('about.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ], [
            'title.required' => 'وارد کردن عنوان الزامی است!',
            'description.required' => 'وارد کردن توضیحات الزامی است!',
            'link.required' => 'وارد کردن لینک الزامی است!',
        ])->validate();

        $about = About::findOrFail($id);

        $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link
        ]);

        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about=About::findOrFail($id);
        $about->destroy($id);
        return redirect()->route('about.index');
    }
}
