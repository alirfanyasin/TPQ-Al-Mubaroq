<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Rapor\Rapor;
use Illuminate\Http\Request;

class RaporController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun_ajaran' => 'required',
            'semester' => 'required',
        ]);
        Rapor::create($validated);
        return redirect()->route('settings')->with('success', 'Rapor berhasil ditambahkan');
    }


    public function update(Request $request, string $id)
    {
        $data = Rapor::find($id);
        $validated = $request->validate([
            'tahun_ajaran' => 'required',
            'semester' => 'required',
        ]);
        $data->update($validated);
        return redirect()->route('settings')->with('success', 'Rapor berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $data = Rapor::find($id);
        $data->delete();
        return redirect()->route('settings')->with('success', 'Rapor berhasil dihapus');
    }
}
