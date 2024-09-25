<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {
        $category_s = Category::all();
        return view('category', compact('category_s'));
    }

    public function add_category()
    {
        return view('add_category');
    }

    public function upload_category(Request $request)
    {
        $request->validate([
            'category_title' => 'required|string|max:255',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        

        if($request->has('category_image')){
            $file = $request->file('category_image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;
            $path = 'uploads/category/';
            $file->move($path, $filename);
        }

        $data = new Category;

        $data->category_title = $request->category_title;
        $data->category_image = $request->category_image;

        $data->save();
    
        return redirect()->back();
    }

    
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);

        $data->category_title = $request->category_title;

        $data->save();
        return redirect('/category');
        
    }
}
