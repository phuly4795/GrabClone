<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionAdd;
use App\Models\Permission;
use App\Models\User;
use App\Models\UserPermission;
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
            $permissionDetail = Permission::findOrFail($id);
            $listUserPermission = UserPermission::where('permission_id', $id)->pluck('user_id');
            $listUser = User::whereIn('role_id', [1,2])->get();
            return view('Layouts.Admin.Pages.Permission.update',compact('permissionDetail','listUser','listUserPermission'));
         } catch (\Throwable $th) {
            Log::error("role");
            Log::error($th);
         }
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $listUser = $request->user;
            $listIdPermissionArr = [];
            $listUserPermission = UserPermission::where('permission_id', $id)->get();
            if($listUserPermission == "[]"){
               foreach ($listUser as $key => $value) {
                  UserPermission::create([
                     'user_id' => $value,
                     'permission_id' => $id,
                  ]);
               }
            }
            foreach ($listUserPermission as $key => $value) {
               $listIdPermissionArr[] = $value->user_id;
            }

            $differentValues = collect($listUser)->diff($listIdPermissionArr)->all();

            dd($listUser, $listIdPermissionArr, $differentValues);
            // $commonValues = collect($arrayA)->intersect($arrayB)->all();
                  // dd($commonValues);


            // else{
            //    foreach ($listUserPermission as $key => $value) {
            //       $listIdPermissionArr[] = $value->id;
            //    }
            //    // dd($listIdPermissionArr);
            // }
         
      
            return redirect()->route('admin.permission')->with(['message' => 'Cập nhật thành công']);
         } catch (\Throwable $th) {
            dd($th);
            Log::error("role");
            Log::error($th);
         }
    }
}
