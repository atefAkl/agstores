<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\MainMenu;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class MainMenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
     public function index()
     {
         //
         $maimMenues = MainMenu::where([])->orderBy('id', 'ASC')->paginate(10);
         foreach($maimMenues as $m => $menu) {$menu->subMenues=SubMenu::where(['main_menu' => $menu->id])->get();}
 
         $vars = [
            'mainMenues' => $maimMenues,
            
         ];
         return view ('admin.settings.mainmenues.home', $vars);
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create() 
     {
         //
 
         $vars = [
             
         ];
         return view ('admin.settings.mainmenues.create', $vars);
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
        $mm = new MainMenu ();
        $mm->name         =  $request->name;
        $mm->created_by   =  auth()-> user() -> id;
        $mm->company      =  auth()-> user() -> company;
        $mm->created_at   =  date('Y-m-d H:i:s');;
        $mm->status       =  true;
        if ($mm->save()) {
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
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(UpdateMenuRequest $req)
     {
        //
        $menu = MainMenu::where('id', $req->menuId)->first();
        if ($menu->name==$req->name && $menu->status == $req->status) {
            return redirect () -> back () -> with (['error' => 'لم تقم بإجراء أى تعديلات']);
        } 
        $menu->name = $req->name;
        $menu->status = $req->status;

        $menu->updated_at = date('Y-m-d H:i:s');
        if ($menu->save()){
            return redirect () -> back () -> with (['success' => 'تم تحديث بيانات القائمة بنجاح']);
        }
        return redirect () -> back () -> with (['error' => 'حدث خطأ أثناء الحفظ']);
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

         if (MainMenu::find($id)->delete()) {
            return redirect()->back()->with(['success'=>'تم حذف القائمة بنجاح']);
        } return redirect()->back()->with(['error'=>'خطأ فى حذف القائمة']);
     }
}
