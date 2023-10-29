<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Item;
use App\Models\ItemsCategory;
use App\Models\Table;
use App\Models\Contract;
use App\Models\Client;
use App\Models\MeasuringUnit;
use App\Models\TableContent;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
!defined('PAGES') ? define('PAGES', 10) : null;
class TablesController extends Controller
{
    //

    public static $tableSizes = ['', 'صغيرة', 'كبيرة', 'متوسطة'];
    public static $tableStatus = ['فارغة', 'مرتبطة بعقد ممتلئة', 'متوقفة للصيانة', 'محررة'];
    public function home () {
               
        $vars=[
            'tableStatus'   => static::$tableStatus,
            'tableSizes'    => static::$tableSizes,
            'tables'        => Table::where([])->orderBy('serial', 'ASC')->paginate(10),
        ];
        return view('admin.items.tables.home', $vars);
    }

    public function create () {

        $vars=[
            
        ];
        return view('admin.items.tables.create', $vars);
    }

    
    public function edit ($id) {
       
        $vars=[
            't' => Table::where(['id' => $id])->first(),
        ];
        return view('admin.items.tables.edit', $vars);
    }

    public function store (Request $req) {
        $this->validate($req, [
            'name' => 'required|unique:tables', 
            'serial' => 'required|unique:tables'
        ]);

        
        $table              = new Table();
        $table->name        = $req->name;
        $table->serial      = $req->serial;
        $table->size        = $req->size;
        $table->capacity    = $req->size == 1 ? 221:286;
        $table->created_by  = auth()->user()->id;
        $table->company     = auth()->user()->company;
        $table->created_at  = date('Y-m-d H:i:s');
        
        if($table->save()) {
            return redirect()->back()->withSuccess('تم تسجيل الطبلية الجديدة بنجاح');
        }
        
    }

    public function update (Request $req) {

        $table              = Table::where(['id' => $req->id])->first();
        $table->name        = $req->name;
        $table->serial      = $req->serial;
        $table->size        = $req->size;
        $table->capacity     = $req->capacity;
        $table->created_by  = auth()->user()->id;
        $table->company     = auth()->user()->company;
        $table->created_at  = date('Y-m-d H:i:s');

        if($table->update()) {
            return redirect()->route('tables.home')->withSuccess('تم تحديث بيانات الطبلية بنجاح');
        }
        
    }

    public function view ($id) {
        $table = Table::find($id);
        if ( $table->status>0 ) {
            $table->contract = Contract::find($table->contract_id);
            $table->client = Client::find($table->contract->client);
        }
        

        $vars = [
            'table' => $table,
        ];

        return view('admin.items.tables.view', $vars);
    }

    public function delete ($id) {

        $table              = Table::where(['id' => $id])->first();
        
        if($table->delete()) {
            return redirect()->back()->withSuccess('تم إزالة الطبلية بنجاح');
        }
        
    }

}
