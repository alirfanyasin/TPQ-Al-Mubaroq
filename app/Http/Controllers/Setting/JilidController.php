<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Jilid;
use App\Models\Santri;
use Illuminate\Http\Request;

class JilidController extends Controller
{
    public function store(Request $request)
    {
        Jilid::create(['nama' => $request->nama]);
        return redirect()->route('settings')->with('success', 'Jilid berhasil ditambahkan');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $data = Jilid::find($id);
        $data->update(['nama' => $request->nama]);
        return redirect()->route('settings')->with('success', 'Jilid berhasil diupdate');
    }

    public function destroy(string $id)
    {
        Jilid::destroy($id);
        return redirect()->route('settings')->with('success', 'Jilid berhasil dihapus');
    }
}
