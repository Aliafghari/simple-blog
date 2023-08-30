<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class skillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skill=Skill::all();
        return view('admin.skill.index', compact('skill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skill=Skill::all();
        return view('admin.skill.create',compact('skill'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'title' => 'required',
            'percentage' => 'required|numeric|between:0,100',
        ], [
            'title.required' => 'وارد کردن عنوان الزامی است!',
            'percentage.required' => 'وارد کردن درصد الزامی است!',
            'percentage.numeric' => 'درصد باید یک عدد یا اعشاری باشد!',
            'percentage.between' => 'درصد باید بین 0 تا 100 باشد!',
        ])->validate();

        Skill::create([
            'title' => $request->title,
            'percentage' => $request->percentage,
        ]);
        return redirect()->route('skill.create');
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
        $skill = Skill::findOrFail($id);
        return view('admin.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Validator::make($request->all(), [
            'title' => 'required',
            'percentage' => 'required|numeric|between:0,100',
        ], [
            'title.required' => 'وارد کردن عنوان الزامی است!',
            'percentage.required' => 'وارد کردن درصد الزامی است!',
            'percentage.numeric' => 'درصد باید یک عدد یا اعشاری باشد!',
            'percentage.between' => 'درصد باید بین 0 تا 100 باشد!',
        ])->validate();

        $skill = Skill::findOrFail($id);
        $skill->update([
            'title' => $request->title,
            'percentage' => $request->percentage,
        ]);
        return redirect()->route('skill.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->destroy($id);
        return redirect()->route('skill.create');
    }
}
