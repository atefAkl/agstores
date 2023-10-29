<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\http\Controllers\info;
use App\Models\Table;
use App\Models\Area;
use App\Models\StoreBox;
use App\Models\StoreItem;
use App\Models\SalesCategory;
!defined('PAGES') ? define ('PAGES', 10): null;
class StoresController extends Controller
{
    use info;

    public function index () {
        $cats = SalesCategory::where([])->orderBy('id', 'ASC')->paginate(PAGES);
        $allAdmins = Admin::all();$admins = [];
        foreach($allAdmins as $i => $admin){$admins[$admin->id] = $admin->name;}
        return view('admin.store.home', ['cats'=>$cats, 'admins'=>$admins]);
    }

    public function settings () {
        $cats = SalesCategory::where([])->orderBy('id', 'ASC')->paginate(PAGES);
        $allAdmins = Admin::all();$admins = [];
        foreach($allAdmins as $i => $admin){$admins[$admin->id] = $admin->name;}
        return view('admin.store.settings', ['cats'=>$cats, 'admins'=>$admins]);
    }

    public function tables () {
        $tables     = Table::where([])->orderBy('id', 'ASC')->paginate(25);
        $tableSizes = ['', 'صغيرة', 'كبيرة', 'متوسطة'];
        $tableStatus = ['فارغة', 'مرتبطة بعقد ممتلئة', 'مرتبطة بعقد غير ممتلئة', 'محررة'];
        $vars=[
            'tableStatus' => $tableStatus,
            'tableSizes' => $tableSizes,
            'tables' => $tables,
        ];
        return view('admin.store.tables.home', $vars);
    }

    public function tablesCreate () {

        $vars=[
            
        ];
        return view('admin.store.tables.create', $vars);
    }

    public function tablesStore (Request $req) {

        $table              = new Table();
        $table->name        = $req->name;
        $table->serial      = $req->serial;
        $table->size        = $req->size;
        $table->capacity     = $req->capacity;
        $table->created_by  = auth()->user()->id;
        $table->company     = auth()->user()->company;
        $table->created_at  = date('Y-m-d H:i:s');

        if($table->save()) {
            return redirect()->back()->withSuccess('Table has been saved successfuly.');
        }
        
    }

    public function itemsAndBoxes () {
        $boxes = StoreBox::where([])->orderBy('id', 'ASC')->paginate(16);
        $items = StoreItem::where([])->orderBy('id', 'ASC')->paginate(16);
        $vars = [
            'boxes'         => $boxes,
            'items'         => $items,
        ];
        return view ('admin.store.items.home', $vars);
    }

    public function addStoreItem (Request $req) {
        
        $item = new StoreItem();
        $item->name = $req->name;
        $item->short = $req->short;
        $item->pic = 'none';

        $item->created_at = date('Ymd H:i:s');
        $item->created_by = auth()->user()->id;
        $item->company = auth()->user()->company;

        if ($item->save()) {
            return redirect()->back()->withSuccess('تم إضافة صنف جديد بنجاح');
        } return redirect()->back()->withError('فشلت عملية إضافة صنف جديد ');
        
    }

    public function removeStoreItem ($id) {
        $item = StoreItem::where(['id' => $id])->first();
        if ($item->delete()) {
            return redirect()->back()->withSuccess('تم حذف الصنف بنجاح');
        } return redirect()->back()->withError('فشلت عملية الحذف ');
    }
    
    public function addBoxSize (Request $req) {
        
        $item = new StoreBox();
        $item->name = $req->name;
        $item->short = $req->short;
        $item->pic = 'none';

        $item->created_at = date('Ymd H:i:s');
        $item->created_by = auth()->user()->id;
        $item->company = auth()->user()->company;

        if ($item->save()) {
            return redirect()->back()->withSuccess('تم إضافة صنف حجم جديد بنجاح');
        } return redirect()->back()->withError('فشلت عملية إضافة حجم جديد ');
        
    }

    public function removeBoxSize ($id) {
        $item = StoreBox::where(['id' => $id])->first();
        if ($item->delete()) {
            return redirect()->back()->withSuccess('تم حذف الحجم بنجاح');
        } return redirect()->back()->withError('فشلت عملية الحذف ');
    }

}
