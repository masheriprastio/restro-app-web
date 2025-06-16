<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;


class MenuController extends Controller
{
    public function index() {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    public function create() {
        return view('menu.create');
    }

    public function store(Request $request) {
        Menu::create($request->all());
        return redirect()->route('menu.index')->with('success', 'Menu ditambahkan.');
    }

    public function edit($id) {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, $id) {
        Menu::findOrFail($id)->update($request->all());
        return redirect()->route('menu.index')->with('success', 'Menu diupdate.');
    }

    public function destroy($id) {
        Menu::findOrFail($id)->delete();
        return redirect()->route('menu.index')->with('success', 'Menu dihapus.');
    }
}
