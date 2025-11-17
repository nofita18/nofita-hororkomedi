<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Search
        $search = $request->input('search');

        // Filter Gender
        $gender = $request->input('gender');

        $dataPelanggan = Pelanggan::query();

        if ($search) {
            $dataPelanggan->where(function ($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('last_name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%');
            });
        }

        if ($gender) {
            $dataPelanggan->where('gender', $gender);
        }

        // Pagination 10 per halaman
        $dataPelanggan = $dataPelanggan->orderBy('pelanggan_id', 'DESC')->paginate(10);

        return view('admin.pelanggan.index', [
            'dataPelanggan' => $dataPelanggan,
            'search'        => $search,
            'gender'        => $gender
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:100',
            'last_name'  => 'nullable|max:100',
            'gender'     => 'required',
            'email'      => 'required|email',
            'phone'      => 'nullable|max:20',
            'birthday'   => 'nullable|date',
        ]);

        Pelanggan::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'gender'     => $request->gender,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'birthday'   => $request->birthday,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'first_name' => 'required|max:100',
            'last_name'  => 'nullable|max:100',
            'gender'     => 'required',
            'email'      => 'required|email',
            'phone'      => 'nullable|max:20',
            'birthday'   => 'nullable|date',
        ]);

        $pelanggan->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'gender'     => $request->gender,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'birthday'   => $request->birthday,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pelanggan::findOrFail($id)->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus!');
    }
}
