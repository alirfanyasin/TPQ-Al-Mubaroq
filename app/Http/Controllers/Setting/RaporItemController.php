<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Rapor\RaporItem;
use Illuminate\Http\Request;

class RaporItemController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'jenis_penilaian' => 'required',
            'jilid_id' => 'required',
            'semester_id' => 'required',
        ]);
        RaporItem::create($validated);
        return redirect()->route('settings')->with('success', 'Item Penialaian berhasil ditambahkan');
    }


    public function update(Request $request, string $id)
    {
        $data = RaporItem::find($id);
        $validated = $request->validate([
            'nama' => 'required',
            'jenis_penilaian' => 'required',
            'jilid_id' => 'required',
            'semester_id' => 'required',
        ]);
        $data->update($validated);
        return redirect()->route('settings')->with('success', 'Item Penialaian berhasil diupdate');
    }


    public function destroy(string $id)
    {
        $data = RaporItem::find($id);
        $data->delete();
        return redirect()->route('settings')->with('success', 'Item Penialaian berhasil dihapus');
    }
}
