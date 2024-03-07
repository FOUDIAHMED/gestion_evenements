<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecategorieRequest;
use App\Http\Requests\UpdatecategorieRequest;
use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories=categorie::all();
        return view('admin.Category',compact('categories'));
    }
    public function add(){
        return view('admin.createCat');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //
        $categorie=categorie::create([
            'name' =>$request->cat,
        ]);
        $categorie->save();
        // dd($categorie);
        return redirect()->route('Category');
    }

    /**
     * Display the specified resource.
     */
    public function show(categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategorieRequest $request, categorie $categorie)
    {
        //
        return view('admin.updatCategorie');
    }
    public function updatecat(Request $request){
        $categorie=categorie::find($request->id);
        $categorie->name=$request->cat;
        $categorie->save();
        return redirect()->route('Category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $categoryId = $request->id;

        // Find the category by ID
        $category = categorie::find($categoryId);
    
        // Check if the category exists
        if (!$category) {
            // If the category does not exist, return an error response or redirect
            return response()->json(['message' => 'Category not found'], 404);
        }
    
        // Delete the category
        $category->delete();
        return redirect()->route('Category');
    }
}
