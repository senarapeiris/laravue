<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  // category
  public function index()
  {

    $categories = Category::get();

    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['name' => "Category"]
    ];

    return view('/content/category/index', [
      'breadcrumbs' => $breadcrumbs,
      'categories' => $categories
    ]);
  }


  // add category
  public function addCategory()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Category"], ['name' => "Add Category"]
    ];

    return view('/content/category/add-category', ['breadcrumbs' => $breadcrumbs]);
  }


  public function createCategory(Request $request)
  {
    $category = new Category();
    $category->category_name_english = $request->category_name_english;
    $category->category_name_sinhala = $request->category_name_sinhala;
    //$category->category_image = $request->category_image;
    $category->status = 1;

    $validatedData = $request->validate([
      'category_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);

    $name = $request->file('category_image')->getClientOriginalName();
    $path = $request->file('category_image')->store('public/category');
    $category->category_image = $path;

    $category->save();

    return redirect()->back()->with('success', 'Category added successfully !!!');
  }


  public function editCategory($id)
  {
    $category = Category::find($id);

    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Category"], ['name' => "Edit Category"]
    ];

    return view('/content/category/edit-category', [
      'breadcrumbs' => $breadcrumbs,
      'category' => $category,
    ]);
  }


  public function updateCategory(Request $request)
  {
    $category = Category::find($request->category_id);
    $category->category_name_english = $request->category_name_english;
    $category->category_name_sinhala = $request->category_name_sinhala;
    // $category->category_image = $request->category_image;

    $validatedData = $request->validate([
      'category_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);

    $name = $request->file('category_image')->getClientOriginalName();
    $path = $request->file('category_image')->store('public/category');
    $category->category_image = $path;

    $category->update();

    return redirect()->back()->with('success', 'Category updated successfully !!!');
  }


  public function inactivateCategory($id)
  {
    $category = Category::find($id);
    $category->status = 0;
    $category->update();

    return redirect()->back()->with('success', 'Category inactivated successfully !!!');
  }


  public function activateCategory($id)
  {
    $category = Category::find($id);
    $category->status = 1;
    $category->update();

    return redirect()->back()->with('success', 'Category activated successfully !!!');
  }
}
