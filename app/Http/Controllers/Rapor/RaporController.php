<?php

namespace App\Http\Controllers\Rapor;

use App\Http\Controllers\Controller;
use App\Models\Jilid;
use App\Models\Rapor\Rapor;
use App\Models\Rapor\RaporItem;
use App\Models\Rapor\Semester;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RaporController extends Controller
{
    public function index()
    {
        return view('pages.rapor.index', [
            'title' => 'Rapor',
            'datas' => Rapor::orderBy('jilid_id', 'asc')->get(),
            'semesters' => Semester::all(),
            'jilids' => Jilid::all(),
        ]);
    }

    public function update_semeter(Request $request)
    {
        Rapor::query()->update(['semester_id' => $request->semester_id]);
        RaporItem::query()->update(['semester_id' => $request->semester_id]);
        return redirect()->back()->with('success', 'Semester telah berhasil diperbarui.');
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'jilid_id' => 'required',
    //         'semester_id' => 'required',
    //         'jilid_id' => [
    //             'required',
    //             Rule::unique('rapors')->where(function ($query) use ($request) {
    //                 return $query->where('semester_id', $request->semester_id)
    //                     ->where('jilid_id', $request->jilid_id);
    //             }),
    //         ],
    //     ], [
    //         'jilid_id.unique' => 'Jilid dan semester sudah ada',
    //         'jilid_id.required' => 'Jilid harus diisi.',
    //         'semester_id.required' => 'Semester harus diisi.',
    //     ]);

    //     Rapor::create($validated);
    //     return redirect()->route('rapor.index')->with('success', 'Rapor berhasil ditambahkan');
    // }

    // public function update(Request $request, string $id)
    // {
    //     $data = Rapor::find($id);
    //     $validated = $request->validate([
    //         'tahun_ajaran' => 'required',
    //     ]);
    //     $validated['semester_id'] = $request->semester_id;
    //     $data->update($validated);
    //     return redirect()->route('rapor.index')->with('success', 'Rapor berhasil diupdate');
    // }

    // public function destroy(string $id)
    // {
    //     $data = Rapor::find($id);
    //     $data->delete();
    //     return redirect()->route('rapor.index')->with('success', 'Rapor berhasil dihapus');
    // }

}
