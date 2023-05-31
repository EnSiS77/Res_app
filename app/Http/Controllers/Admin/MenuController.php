<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return  view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     * @param \Illuminate\Http\Request
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('public/menus');

        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image,
        ]);

        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }

        return redirect()->route('admin.menus.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name'  => 'required',
            'description'  => 'required',
            'price'  => 'required',
        ]);

        $image = $menu->image; 
        $menu->update([
            'name'         => $request->name,
            'description'  => $request->description,
            'image'        => $image,
            'price'        => $request->price,
        ]);


        if($request->has('categories')){
            $menu->categories()->sync($request->categories);
        }

        return redirect()->route('admin.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->categories()->detach();
        $menu->delete();
        
        return to_route('admin.menus.index')->with('danger', 'Menu deleted successfully.');
    }
}
