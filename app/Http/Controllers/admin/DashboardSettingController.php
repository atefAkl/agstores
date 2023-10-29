<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\DashboardSettingRequest;
use App\Models\Admin;
use App\Models\DashboardSetting;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    //

    

    public function index () {
        $dashboard = DashboardSetting::where('code', auth()->user()->company)->first();
        if($dashboard['created_by'] != null) {
            $dashboard['created_by'] = Admin::where('id', $dashboard['created_by'])->value('name');
        }
        if($dashboard['updated_by'] != null) {
            $dashboard['updated_by'] = Admin::where('id', $dashboard['updated_by'])->value('name');
        }

    
        return view('admin.admindashboard.index', ['data' => $dashboard]);
    }
    //
    public function edit () {
        $dashboard = DashboardSetting::where('code', auth()->user()->company)->first();
        if($dashboard['created_by'] != null) {
            $dashboard['created_by'] = Admin::where('id', $dashboard['created_by'])->value('name');
        }
        if($dashboard['updated_by'] != null) {
            $dashboard['updated_by'] = Admin::where('id', $dashboard['updated_by'])->value('name');
        }

    
        return view('admin.admindashboard.edit', ['data' => $dashboard]);
    }
    //
    public function update (DashboardSettingRequest $req) {
        $dashboard = DashboardSetting::where('code', auth()->user()->company)->first();
        
        $dashboard->name = $req->name;
        $dashboard->phone = $req->phone;
        $dashboard->address = $req->address;
        $dashboard->updated_by = auth()->user()->id;
        $dashboard->updated_at = date('Y-m-d H:i:s');
    
        if($req->hasFile('icon')) {
            $fileHandler = $req->icon;
            $newName = 'dashboard_logo_' . $dashboard->code . date('_Ymd_Hsi') . '.' . $req->icon->extension();
            $saveName = $fileHandler->storeAs('uploads/logo', $newName);
            $dashboard->icon = $saveName;
        }
        try {
            $dashboard->update();
            return redirect()->route('admin.dashboard.show');
        } catch (Exception $e) {
            return redirect()->route('admin.dashboard.edit')->with('Failed to update due to '.$e->getMessage());
        }

        
        
    }
}
