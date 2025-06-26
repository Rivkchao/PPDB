<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('beritaglobal', compact('beritas'));
    }

  public function show($id)
{
    $berita = Berita::findOrFail($id);
    return view('beritaglobalshow', compact('berita'));
}
}
