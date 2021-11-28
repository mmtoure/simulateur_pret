<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Flash;


class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('user')->paginate( 20 );
        return view('dashboard.categories.categoriesList', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'             => 'required|min:1|max:64',
            'description'           => 'required',
        ]);
        $user = auth()->user();
        $category = new Category();
        $category->title     = $request->input('title');
        $category->description   = $request->input('description'); 
        $category->users_id = $user->id;
        $category->save();
        $request->session()->flash('message', 'Successfully created category');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::with('user')->find($id);
        return view('dashboard.categories.categoryShow', [ 'category' => $category ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.categories.edit', ['category' => $category ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'             => 'required|min:1|max:64',
            'description'           => 'required',
        ]);
        $category = Category::find($id);
        $category->title     = $request->input('title');
        $category->description   = $request->input('description');
       
        $category->save();
        $request->session()->flash('message', 'Successfully edited category');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category){

            if ($category->produits()->count()) {
                Flash::error("Cannot delete: Cette catégorie contient des produits.");
                return redirect()->route('categories.index');
            }
            $category->delete();
        }
        return redirect()->route('categories.index');
    }
}
