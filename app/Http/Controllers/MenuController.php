<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;


class MenuController extends Controller
{
    public function index() {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
        // dd($menus);
    }

    public function create() {
        return view('menu.create');
    }

    public function store(Request $request) {
        try{
            $validateData = $request->validate([
                'Namamenu'=> 'required',
                'Harga' => 'required|numeric',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
            $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'public/images';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }

        Menu::create($input);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');

            
        }catch (\Illuminate\Validation\ValidationException $e){
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
        // $request->validate([
        //     'Namamenu' => 'required',
        //     'Harga' => 'required|numeric',
        //     'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        

        // Menu::create($input);

        // // return redirect()->route('menu.index')->with('success', 'Menu ditambahkan.');
        // dd($request->all());
    }

    public function edit($id) {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'Namamenu' => 'required',
            'Harga' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        $menu = Menu::findOrFail($id);

        if ($image = $request->file('gambar')) {
            $destinationPath = 'public/images';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        } else {
            unset($input['gambar']);
        }

        $menu->update($input);

        return redirect()->route('menu.index')->with('success', 'Menu diupdate.');
    }

    public function destroy($id) {
        Menu::findOrFail($id)->delete();
        return redirect()->route('menu.index')->with('success', 'Menu dihapus.');
    }
}
