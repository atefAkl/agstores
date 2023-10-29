<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Item;
use App\Models\ItemsCategory;
use App\Models\Table;
use App\Models\StorePoint;
use App\Models\Room;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;

!defined('PAGES') ? define('PAGES', 10) : null;
class RoomsController extends Controller
{

    //
    public function home () {
        $stores = Store::where('id', '!=', 1)->get();
        $allStores = [];
        foreach($stores as $in => $store) {$allStores[$store->id] = $store;}
        $sizes = ['', 'كبيرة', 'وسط', 'صغيرة'];
        $vars=[
            'stores'        => $allStores,
            'sizes'         => $sizes,
            
            'rooms'         => Room::all()
        ];
        return view('admin.items.rooms.home', $vars);
    }

    public function create () {
        $stores = Store::where('id', '!=', 1)->get();
        $allStores = [];
        foreach($stores as $in => $store) {$allStores[$store->id] = $store;}
        $vars=[
            'stores'        => $allStores,
            'sizes'         => ['', 'كبيرة', 'وسط', 'صغيرة'],
        ];
        return view('admin.items.rooms.create', $vars);
    }

    
    public function edit ($id) {
        $stores = Store::where('id', '!=', 1)->get();
        $allStores = [];
        foreach($stores as $in => $store) {$allStores[$store->id] = $store;}
        $vars=[
            'stores'        => $allStores,
            'sizes'         => ['', 'كبيرة', 'وسط', 'صغيرة'],
            'room'          => Room::where(['id' => $id])->first(),
        ];
        
        return view('admin.items.rooms.edit', $vars);
    }

    public function store (RoomRequest $req) {

        $room               = new Room();
        
        $room->a_name       = $req->a_name;
        $room->e_name       = $req->e_name;
        $room->serial       = $req->serial;
        $room->store        = $req->store;
        $room->size         = $req->size;
        $room->code         = $req->code;
        $room->company      = auth()->user()->company;
        $room->created_by   = auth()->user()->id;
        $room->created_at   = date('Y-m-d H:i:s');

        if($room->save()) {
            return redirect()->route('rooms.home')->withSuccess('تم تحديث بيانات الغرفة بنجاح');
        }
        
    }

    public function update (RoomRequest $req) {

        $room              = Room::where(['id' => $req->id])->first();
        
        $room->e_name       = $req->e_name;
        $room->serial       = $req->serial;
        $room->store        = $req->store;
        $room->size         = $req->size;
        $room->code         = $req->code;
        $room->company      = auth()->user()->company;
        $room->created_by   = auth()->user()->id;
        $room->created_at   = date('Y-m-d H:i:s');

        if($room->update()) {
            return redirect()->route('rooms.home')->withSuccess('تم تحديث بيانات الغرفة بنجاح');
        }
        
    }

    public function delete ($id) {

        $room            = Room::where(['id' => $id])->first();
        
        if($room->delete()) {
            return redirect()->back()->withSuccess('تم إزالة الغرفة بنجاح');
        }
        
    }

}
