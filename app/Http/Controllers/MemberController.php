<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        [
            'id' => 1,
            'nama' => 'Andi Setiawan',
            'nim' => '3125600001',
            'email' => 'andi@example.com',
            'nomor_telepon' => '081234567890',
            'alamat' => 'Malang',
            'status' => 'Aktif',
        ],
        [
            'id' => 2,
            'nama' => 'Budi Santoso',
            'nim' => '3125600002',
            'email' => 'budi@example.com',
            'nomor_telepon' => '081234567891',
            'alamat' => 'Surabaya',
            'status' => 'Aktif',
        ],
    ];

    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()
            ->route('members.index')
            ->with('success', 'Member berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        return "MemberController@show, id: {$id}";
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }
}