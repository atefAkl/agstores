<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
     public function index()
     {
         //
         $rules = Rule::where([])->orderBy('id', 'ASC')->paginate(10);
 
         $vars = [
            'rules' => $rules,
            
         ];
         return view ('admin.users.rules.home', $vars);
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
         return view ('admin.users.rules.create', $vars);
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
        $rule = new Rule ();
        $rule->name         =  $request->name;
        $rule->created_by   =  auth()-> user() -> id;
        $rule->company      =  auth()-> user() -> company;
        $rule->created_at   =  date('Y-m-d H:i:s');;
        $rule->status       =  true;
        if ($rule->save()) {
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
         $rule = Rule::find ($id);
         $vars = [
            'rule' => $rule  
         ];
         return view ('admin.users.rules.edit', $vars);
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
         $rule = Rule::find ($request->id);
         if (!$rule) {
            return redirect()->back()->with(['error' => 'الدور الذى تحاول تعديلع غير موجود، تأكد من أنك تمتلك كافة الصلاحيات لهذا العمل']);
         }
         $rule->name         =  $request->name;
         $rule->created_by   =  auth()-> user() -> id;
         $rule->company      =  auth()-> user() -> company;
         $rule->created_at   =  date('Y-m-d H:i:s');;
         $rule->status       =  true;
         if ($rule->update()) {
             return redirect()->back()->with(['success' => 'تم التحديث بنجاح :)']);
         } return redirect()->back()->with(['error' => 'حدث خطأ أثناء تحديث البيانات']);
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
         if (Rule::find($id)->delete()) {
            return redirect()->back()->with(['success'=>'تم حذف الدور بنجاح']);
         }
     }
}
