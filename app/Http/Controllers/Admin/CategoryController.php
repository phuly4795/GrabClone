<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryDetail;
use App\Models\odel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
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
            $Category = Category::findOrFail($id);
            $CategoryDetail = CategoryDetail::where('category_id', $id)->get();
            return view('Layouts.Admin.Pages.category.update',compact('Category','CategoryDetail'));
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

        $childMenuInputs = request()->only(
            preg_grep('/^childMenu_\d+$/', array_keys(request()->all()))
        );

        $childMenuInputUpdates = request()->only(
            preg_grep('/^childMenuUpdate_\d+$/', array_keys(request()->all()))
        );
        $childMenuInputUpdateIds = request()->only(
            preg_grep('/^childMenuUpdateId_\d+$/', array_keys(request()->all()))
        );

        $cate =  Category::findOrFail($id)->first();
        $cate->update([
            'name' => $request->name,
        ]);
        
        if($childMenuInputs){
            foreach ($childMenuInputs as $key => $value) {
                $code =  $this->removeAccents($value);
                $checkCateDetail =  CategoryDetail::where('code', $code)->first();
                if(!$checkCateDetail){
                    CategoryDetail::create([          
                        'code' =>$code,
                        'name' => $value,
                        'category_id' => $id
                    ]);
                }
            }
        }

        if ($childMenuInputUpdateIds && $childMenuInputUpdates) {
            $updatedChildMenuInputUpdates = [];
            foreach ($childMenuInputUpdates as $key => $value) {
                $newKey = str_replace("childMenuUpdate_", "childMenuUpdateId_", $key);
                $updatedChildMenuInputUpdates[$newKey] = $value;
            }
            foreach ($childMenuInputUpdateIds as $idKey => $InputIDUpdate) {
                if (array_key_exists($idKey, $updatedChildMenuInputUpdates)) {
                    $InputUpdate = $updatedChildMenuInputUpdates[$idKey];
                    $checkCateDetail = CategoryDetail::find($InputIDUpdate);
                    if ($checkCateDetail) {
                        $checkCateDetail->update([
                            'name' => $InputUpdate,
                        ]);
                    }
                }
            }
        }
    
        return redirect()->route('admin.category')->with(['message' => 'Cập nhật thành công']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $del = Category::find($id)->delete();

        return redirect()->back()->with(['message' => 'Xóa thành công']);
    }

    public function destroyChildMenu(string $id)
    {
        CategoryDetail::find($id)->delete();

        return redirect()->back()->with(['message' => 'Xóa thành công']);
    }
}
