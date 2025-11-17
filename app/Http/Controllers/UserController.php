<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil keyword search dari input user
        $search = $request->input('search');

        // Mulai query User
        $query = User::query();

        // Jika ada keyword search, filter berdasarkan name atau email
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Pagination, 10 data per halaman
        $dataUser = $query->orderBy('id', 'desc')->paginate(10);

        // Simpan query string search supaya pagination tetap membawa keyword
        $dataUser->appends($request->only('search'));

        return view('admin.user.index', compact('dataUser', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['name']                  = $request->name;
        $data['password']              = $request->password;
        $data['email']                 = $request->email;
        $data['password_confirmation'] = $request->password_confirmation;

        User::create($data);

        return redirect()->route('user.create')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
