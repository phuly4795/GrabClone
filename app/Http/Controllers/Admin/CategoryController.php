<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\odel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Category::orderBy('id', 'DESC')->get();
            return view('Layouts.Admin.Pages.Category.index', compact('data'));
        } catch (\Throwable $th) {
            Log::error("category");
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
        try {
            $code = $request->code;
            $name = $request->name;
            $icon = $request->icon;
            Category::create([
                'code' => $code,
                'name' => $name,
                'icon' => $icon,
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
        try {
            $CategoryDetail = Category::findOrFail($id);
            return view('Layouts.Admin.Pages.Role.update',compact('roleDetail'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
