<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Astrotomic\Translatable\Contracts\Translatable;

class CategoryController extends Controller
{

    public function index(Request $request)
    {

        $categories = Category::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.categories.index', compact('categories'));

    } // end of index


    public function create()
    {

        return view('dashboard.categories.create');
    } // end of create

    public function store(Request $request)
    {
        // return $request;
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')]];
        }

        // return $rules;

        $request->validate($rules);

        $request_data = $request->except(['image']);

        if ($request->image) {

            Image::make($request->image)->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/categories/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        Category::create($request_data);

        session()->flash('success', 'Added successfully');

        return redirect()->route('dashboard.categories.index');
    } // end of store

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    } // end of edit


    public function update(Request $request, Category $category)
    {

        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => [

                'required',Rule::unique('category_translations', 'name')->ignore($category->id, 'category_id')

            ]];
        }

        $request->validate($rules);


        $request_data = $request->except(['image']);

        if ($request->image) {

            if ($category->image != 'default.png') {

                Storage::disk('public_upload')->delete('/categories/' . $category->image);
            }

            Image::make($request->image)

                ->resize(400, null, function ($constraint) {

                    $constraint->aspectRatio();

                }) ->save(public_path('uploads/categories/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        $category->update($request_data);

        session()->flash('success', 'Updated successfully');

        return redirect()->route('dashboard.categories.index');
    } // end of update


    public function destroy(Category $category)
    {
        if ($category->image !== "default.png") {
            Storage::disk('public_upload')->delete('/categories/' . $category->image);
        }

        $category->delete();

        session()->flash('success', 'Delete has been successfully');

        return redirect()->route('dashboard.categories.index');
    } // end of destroy
}
