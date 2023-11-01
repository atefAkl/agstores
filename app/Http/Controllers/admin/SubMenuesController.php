<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubMenu;
use App\Models\MainMenu;
use Illuminate\Http\Request;

class SubMenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
     public function index()
     {
         //
        
 
         $vars = [
            'rules' => $maimMenu,
            
         ];
         return view ('admin.users.mainmenues.home', $vars);
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create() 
     {
         //
        $mms = MainMenu::all();
 
         $vars = [
             'mainmenues'           => $mms,
         ];
         return view ('admin.users.submenues.create', $vars);
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
        $submenu = new SubMenu ();
        $submenu->name         =  $request->name;
        $submenu->main_menu    =  $request->main_menu;
        
        $submenu->created_by   =  auth()-> user() -> id;
        $submenu->company      =  auth()-> user() -> company;
        $submenu->created_at   =  date('Y-m-d H:i:s');;
        $submenu->status       =  $request->status;

        if ($submenu->save()) {
            return redirect()->back()->with(['success' => 'تم الحفظ بنجاح :)']);
        } return redirect()->back()->with(['error' => 'حدث خطأ أثناء الحفظ']);
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id, $tab)
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
         $mms = MainMenu::all();
         $sm = SubMenu::find($id);
 
         $vars = [
            'submenu'               => $sm,
            'mainmenues'           => $mms,
         ];
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
        $submenu = SubMenu::find ($request->id);
        if (!$submenu) {
        return redirect()->back()->with(['error' => 'القائمة الفرعية التى تحاول تعديلها غير موجود، تأكد من أنك تمتلك كافة الصلاحيات لهذا العمل']);
        }

        $submenu = new SubMenu ();
        $submenu->name         =  $request->name;
        $submenu->main_menu    =  $request->main_menu;
        
        $submenu->created_by   =  auth()-> user() -> id;
        $submenu->company      =  auth()-> user() -> company;
        $submenu->created_at   =  date('Y-m-d H:i:s');;
        $submenu->status       =  $request->status;

        if ($submenu->update()) {
            return redirect()->back()->with(['success' => 'تم التحديث بنجاح :)']);
        } return redirect()->back()->with(['error' => 'حدث خطأ أثناء تحديث البيانات ']);
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

         if (Submenu::find($id)->delete()) {
            return redirect()->back()->with(['success'=>'تم حذف القائمة بنجاح']);
        } return redirect()->back()->with(['error'=>'خطأ فى حذف القائمة']);
     }
}
