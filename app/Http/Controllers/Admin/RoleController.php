<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleAdd;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Role::orderBy('id', 'DESC')->get();
             return view('Layouts.Admin.Pages.Role.index', compact('data'));
         } catch (\Throwable $th) {
            Log::error("User");
            Log::error($th);
         }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleAdd $request)
    {
       
        try {
            $code = $request->code;
            $name = $request->name;
            Role::create([
                'code' => $code,
                'name' => $name,
            ]);
            return redirect()->back()->with(['message' => 'Thêm thành công']);
         } catch (\Throwable $th) {
            Log::error("role");
            Log::error($th);
         }
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
