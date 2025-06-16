<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;



class MejaController extends Controller
{
    public function index() {
        // if (session('user_role') !== 'Administrator') abort(403, 'Akses ditolak.');
        // $meja = Meja::all();
        // return view('meja.index', compact('meja'));
        $meja = Meja::all();
        return view('meja.index', compact('meja'));
    }

    public function create() {
        if (session('user_role') !== 'Administrator') abort(403, 'Akses ditolak.');
        return view('meja.create');
    }

    public function store(Request $request) {
        Meja::create($request->all());
        return redirect()->route('meja.index')->with('success', 'Meja berhasil ditambah.');
    }

    public function edit($id) {
        $data = Meja::findOrFail($id);
        return view('meja.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        Meja::findOrFail($id)->update($request->all());
        return redirect()->route('meja.index')->with('success', 'Meja berhasil diupdate.');
    }

    public function destroy($id) {
        Meja::destroy($id);
        return redirect()->route('meja.index')->with('success', 'Meja dihapus.');
    }
}
