<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.Menu");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   
        
        $incoming = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'description' => ['nullable', 'string'],
            'category' => ['required']
        ]);

        $incoming['name'] = strip_tags($incoming['name']);
        $incoming['price'] = strip_tags($incoming['price']);
        $incoming['description'] = strip_tags($incoming['description']);
        $incoming['category'] = strip_tags($incoming['category']);

        if($request->chef_recommend){
            $incoming['chef_recommend']=1;
        }else{
            $incoming['chef_recommend']=0;
        }
       
        Menu::create($incoming);

        return redirect('/dashboard/menu');
        
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('admin.edit' , ['item' => Menu::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        $incoming = $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'description' => ['nullable', 'string'],
            'category' => ['required']
        ]);
        $item = Menu::findOrFail($id);

        $item->name = strip_tags($incoming['name']);
        $item->price = strip_tags($incoming['price']);
        $item->description = strip_tags($incoming['description']);
        $item->category = strip_tags($incoming['category']);
        if($request->chef_recommend){
            $incoming['chef_recommend']=1;
        }else{
            $incoming['chef_recommend']=0;
        }

        $item->update($incoming);

        return redirect('/dashboard');
       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Menu::findOrFail($id);
        $item->delete();

        return redirect('/dashboard');
    }
}
