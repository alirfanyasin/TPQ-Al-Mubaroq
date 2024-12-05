<?php

namespace App\Http\Controllers\Rapor;

use App\Http\Controllers\Controller;
use App\Models\Rapor\Rapor;
use App\Models\Rapor\Semester;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RaporController extends Controller
{
    public function index()
    {
        return view('pages.rapor.index', [
            'title' => 'Rapor',
            'datas' => Rapor::orderBy('tahun_ajaran', 'asc')->get(),
            'semesters' => Semester::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun_ajaran' => 'required',
            'semester_id' => 'required',
            'tahun_ajaran' => [
                'required',
                Rule::unique('rapors')->where(function ($query) use ($request) {
                    return $query->where('semester_id', $request->semester_id)
                        ->where('tahun_ajaran', $request->tahun_ajaran);
                }),
            ],
        ], [
            'tahun_ajaran.unique' => 'Tahun ajaran dan semester sudah ada',
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi.',
            'semester_id.required' => 'Semester harus diisi.',
        ]);

        Rapor::create($validated);
        return redirect()->route('rapor.index')->with('success', 'Rapor berhasil ditambahkan');
    }

    public function update(Request $request, string $id)
    {
        $data = Rapor::find($id);
        $validated = $request->validate([
            'tahun_ajaran' => 'required',
        ]);
        $validated['semester_id'] = $request->semester_id;
        $data->update($validated);
        return redirect()->route('rapor.index')->with('success', 'Rapor berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $data = Rapor::find($id);
        $data->delete();
        return redirect()->route('rapor.index')->with('success', 'Rapor berhasil dihapus');
    }


    public function category()
    {
        return view('pages.rapor.category', [
            'title' => 'Rapor Kategori Penilaian',
            'datas' => Rapor::orderBy('tahun_ajaran', 'asc')->get(),
            'semesters' => Semester::all(),
        ]);
    }
}
