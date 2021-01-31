<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Subcategories;
use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategories::with(['categories'])->get();
        $categories = Categories::get();
        return view('admin.pages.subcategories', ['subcategory' => $subcategories, 'category' => $categories]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categories_id' => 'required',
            'name_subcategories' => 'required'
        ]);
       $query= Subcategories::updateOrCreate(
            ['id' => $request->id],
            ['categories_id' => $request->categories_id, 'name' => $request->name_subcategories,]
        );
        if ($query) {
            return redirect()->to('/subcategories')
            ->with('success', 'Categories created successfully.');
        }
        return view('welcome1', array('data' => $request->all()))->with('success', 'Categories created successfully.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategories $subcategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategories $subcategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategories $subcategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategories = Subcategories::findOrfail($id);
        if ($subcategories) {
            $subcategories->delete();
            return redirect()->route('subcategories.index')
                ->with('success', 'Deleted successfully');
        }
    }
}
