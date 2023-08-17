<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
           $data = User::all();
            return view('Layouts.Admin.Pages.User.index', compact('data'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $userDetail = User::findOrFail($id);
            $listRole= Role::orderBy('id','DESC')->get();
            return view('Layouts.Admin.Pages.User.update',compact('userDetail','listRole'));
         } catch (\Throwable $th) {
            Log::error("role");
            Log::error($th);
         }
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
        try {
            $code = $request->code;
            $name = $request->name;
            $role = $request->role;
            User::findOrFail($id)->update([
                'code' => $code,
                'name' => $name,
                'role_id' => $role,
            ]);
            return redirect()->route('admin.user')->with(['message' => 'Cập nhật thành công']);
         } catch (\Throwable $th) {
            Log::error("role");
            Log::error($th);
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
