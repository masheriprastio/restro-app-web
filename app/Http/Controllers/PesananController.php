<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\UserModel;
use App\Models\Menu;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index() {
        $pesanan = Pesanan::with(['menu', 'pelanggan', 'user'])->get();
        return view('pesanan.index', compact('pesanan'));
    }

    public function create() {
        $menu = Menu::all();
        $pelanggan = Pelanggan::all();
        // $user = UserModel::all();
        return view('pesanan.create', compact('menu', 'pelanggan'));
    }

    public function store(Request $request) {
        Pesanan::create($request->all());
        return redirect()->route('pesanan.index')->with('success', 'Pesanan ditambahkan');
    }

    public function edit($id) {
        $data = Pesanan::findOrFail($id);
        $menu = Menu::all();
        $pelanggan = Pelanggan::all();
        $user = UserModel::all();
        return view('pesanan.edit', compact('data', 'menu', 'pelanggan', 'user'));
    }

    public function update(Request $request, $id) {
        Pesanan::findOrFail($id)->update($request->all());
        return redirect()->route('pesanan.index')->with('success', 'Pesanan diperbarui');
    }

    public function destroy($id) {
        Pesanan::destroy($id);
        return redirect()->route('pesanan.index')->with('success', 'Pesanan dihapus');
    }
}
