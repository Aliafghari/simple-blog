<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ], [
            'title.required' => 'وارد کردن عنوان الزامی است!',
            'description.required' => 'وارد کردن توضیحات الزامی است!',
            'image.required' => 'وارد کردن عکس الزامی است!',
        ])->validate();

        $file = $request->file('image');
        $image = "";

        if (!empty($file)) {
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/blog', $image);
        }

        Blog::create([
            'image' => $image,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('blog.index');
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
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'وارد کردن عنوان الزامی است!',
            'description.required' => 'وارد کردن توضیحات الزامی است!',
        ])->validate();


        $blog=Blog::findOrFail($id);
        $file = $request->file('image');
        $image="";

        if(!empty($file)){
            if(file_exists('admin/images/blog/'.$blog->image)){
                unlink('admin/images/blog/'.$blog->image);
            }
            $image=time().'.'.$file->getClientOriginalExtension();
            $file->move('admin/images/blog',$image);
        }else{
            $image= $blog->image;
        }

        $blog->update([
            'image'=>$image,
            'title'=>$request->title,
            'description'=>$request->description
        ]);

        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $blog=Blog::findOrFail($id);
        if(file_exists('admin/images/blog/'.$blog->image)){
            unlink('admin/images/blog/'.$blog->image);
        }
        $blog->destroy($id);
        return redirect()->route('blog.index');
    }
}
