<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionAdd;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
   public function index(Request $request) {
      try {
         $data = Permission::orderBy('id', 'DESC')->get();
          return view('Layouts.Admin.Pages.Permission.index', compact('data'));
      } catch (\Throwable $th) {
         Log::error("Permission");
         Log::error($th);
      }
   }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionAdd $request)
    {
        try {
            $code = $request->code;
            $name = $request->name;
            Permission::create([
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
        try {
            $roleDetail = Permission::findOrFail($id);
            return view('Layouts.Admin.Pages.Permission.update',compact('roleDetail'));
         } catch (\Throwable $th) {
            Log::error("role");
            Log::error($th);
         }
    }
}
