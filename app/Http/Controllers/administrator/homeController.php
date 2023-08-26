<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home = Home::all();
        return view('admin.home.index', compact('home'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        Validator::make($request->all(), [
            'title' => 'required',
            'subject' => 'required',
            'job' => 'required',
            'description' => 'required',
            'link' => 'required',
            'image' => 'required'
        ], [
            'title.required' => 'وارد کردن عنوان الزامی است!',
            'subject.required' => 'وارد کردن موضوع الزامی است!',
            'job.required' => 'وارد کردن شغل الزامی است!',
            'description.required' => 'وارد کردن توضیحات الزامی است!',
            'link.required' => 'وارد کردن لینک الزامی است!',
            'image.required' => 'وارد کردن عکس الزامی است!',

        ])->validate();


        $file = $request->file('image');
        $image = "";
        if (!empty($file)) {
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/home', $image);
        }
        Home::create([
            'image' => $image,
            'title' => $request->title,
            'subject' => $request->subject,
            'job' => $request->job,
            'description' => $request->description,
            'link' => $request->link,
        ]);
        return redirect()->route('home.index');
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
        $home = Home::findOrFail($id);
        return view('admin.home.edit', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());

        Validator::make($request->all(), [
            'title' => 'required',
            'subject' => 'required',
            'job' => 'required',
            'description' => 'required',
            'link' => 'required',
        ], [
            'title.required' => 'وارد کردن عنوان الزامی است!',
            'subject.required' => 'وارد کردن موضوع الزامی است!',
            'job.required' => 'وارد کردن شغل الزامی است!',
            'description.required' => 'وارد کردن توضیحات الزامی است!',
            'link.required' => 'وارد کردن لینک الزامی است!',
        ])->validate();

        $home = Home::findOrFail($id);
        $file = $request->file('image');
        $image = "";

        if (!empty($file)) {
            if (file_exists("admin/images/home/" . $home->image)) {
                unlink("admin/images/home/" . $home->image);
            }
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/home', $image);
        } else {
            $image = $home->image;
        }

        $home->update([
            'image' => $image,
            'title' => $request->title,
            'subject' => $request->subject,
            'job' => $request->job,
            'description' => $request->description,
            'link' => $request->link
        ]);

        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $home = Home::findOrFail($id);
        if (file_exists("admin/images/home/" . $home->image)) {
            unlink("admin/images/home/" . $home->image);
        }
        $home->destroy($id);
        return redirect()->route('home.index');
    }
}
