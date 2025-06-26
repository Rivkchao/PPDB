<?php
// app/Http/Controllers/GelombangController.php
namespace App\Http\Controllers;

use App\Models\Gelombang;
use Illuminate\Http\Request;

class GelombangController extends Controller
{
    public function index()
    {
        $gelombangs = Gelombang::all();
        return view('admin.gelombang', compact('gelombangs')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'biaya' => 'required|numeric',
        ]);

        Gelombang::create($request->all());

        return redirect()->route('admin.gelombang.index')
                         ->with('success', 'Gelombang berhasil ditambahkan');
    }

    public function edit(Gelombang $gelombang)
    {
        return view('admin.gelombang-edit', compact('gelombang')); 
    }

    public function update(Request $request, Gelombang $gelombang)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'biaya' => 'required|numeric',
        ]);

        $gelombang->update($request->all());

        return redirect()->route('admin.gelombang.index')
                         ->with('success', 'Gelombang berhasil diupdate');
    }

    public function destroy(Gelombang $gelombang)
    {
        $gelombang->delete();

        return redirect()->route('admin.gelombang.index')
                         ->with('success', 'Gelombang berhasil dihapus');
    }
}