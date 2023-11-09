<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MainMenu;
use App\Models\SubMenu;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = Permission::query()
        ->select('permissions.*', 'main_menues.name as main_menu_name', 'sub_menues.name as sub_menu_name')
        ->join('main_menues', 'main_menues.id', '=', 'permissions.menu_id' )
        ->join('sub_menues', 'sub_menues.id', '=', 'permissions.submenu_id' );
        
        $permissions =  $query->orderBy('id', 'ASC')->paginate(10);
        
        $vars = [
            'permissions'      => $permissions
        ];
        return view('admin.settings.permissions.home', $vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($mm, $sm)
    {
        //
        $mainmenues = MainMenu::all();
        $subMenues = SubMenu::all();

        $vars = [
            'mainmenues'            => $mainmenues,
            'submenues'             => $subMenues,
            'menu_id'               => $mm,
            'submenu_id'            => $sm,

        ];

        return view ('admin.settings.permissions.create', $vars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $p = new Permission();
        $p->name            = $request->name;
        $p->menu_id         = $request->main_menu;
        $p->submenu_id      = $request->sub_menu;
        $p->permission_link = $request->link;
        $p->status          = $request->status;

        $p->created_by = auth()->user()->id;
        $p->created_at = date('Y-m-d H:i:s');

        // return $p;
        if ($p->save()) {
            return redirect()->back()->with(['success'=>'saved']);
        } 
        return redirect()->back()->with(['error'=>'error']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $p = Permission::find($id);
        $sm = SubMenu::find($p->submenu_id);
        $mm = MainMenu::find($p->menu_id);
        $vars = [
            'permission'    => $p,
            'subMenu'       => $sm,
            'mainMenu'      => $mm,
        ];
        // return $p;
        return view('admin.settings.permissions.edit', $vars);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $p = Permission::find($request->id);
        if ($p->name==$request->name && $p->status == $request->status && $p->permission_link == $request->link) {
            return redirect () -> back () -> with (['error' => 'لم تقم بإجراء أى تعديلات']);
        } 
        $p->name            = $request->name;
        $p->permission_link = $request->link;
        $p->status          = $request->status;

        $p->updated_by = auth()->user()->id;
        $p->updated_at = date('Y-m-d H:i:s');

        // return $p;
        if ($p->update()) {
            return redirect()->back()->with(['success'=>'تم تحديث البيانات بنجاح']);
        } 
        return redirect()->back()->with(['error'=>'خطأ فى تحديث البيانات']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Permission::find($id)->delete()) {
            return redirect()->back()->with(['success'=>'تم حذف القائمة بنجاح']);
        } return redirect()->back()->with(['error'=>'خطأ فى حذف القائمة']);
    }
}
