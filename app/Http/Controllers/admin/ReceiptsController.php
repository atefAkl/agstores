<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Contract;
use App\Models\Receipt;
class ReceiptsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('admin.clients.receipts.home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function in_all() {
        $allReceipts = Receipt::where(['type' => 1])->get();
        foreach ($allReceipts as $i => $item) {
            //var_dump($item->contract_id);
            $item->contract= Contract::find($item->contract_id); 
            $item->client = Client::find($item->contract->client);}
        $receipts ='';
        $vars = [
            'receipts'           => $allReceipts,
            'type'               => 'in' 

        ];
        return view('admin.clients.receipts.all', $vars);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function out_all() {
        $allReceipts = Receipt::where(['type' => 2])->get();
        foreach ($allReceipts as $i => $item) {
            //var_dump($item->contract_id);
            $item->contract= Contract::find($item->contract_id); 
            $item->client = Client::find($item->contract->client);}
        $receipts ='';
        $vars = [
            'receipts'           => $allReceipts, 
            'type'               => 'out' 

        ];
        return view('admin.clients.receipts.all', $vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $contracts = Contract::where(['status' => 1])->get();
        
        foreach($contracts as $t => $contract) {$contract->theClient = Client::find($contract->client);}
        
        $lir = Receipt::where(['type' => 1])->orderBy('s_number', 'desc')->first();
        $lor = Receipt::where(['type' => 2])->orderBy('s_number', 'desc')->first();

        $s_number = str_pad(1, 9, date('y').'0000000000', STR_PAD_LEFT); 
        $vars = [
            'lir'                       => $lir != null ? $lir->s_number+1 : $s_number,
            'lor'                       => $lor != null ? $lor->s_number+1 : $s_number,
            'contract_id'               => $id,
            'contracts'                 => $contracts,
            
        ];
        return view('admin.clients.receipts.create', $vars);
    }
    
    public function test () {
        return view('admin.clients.test');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->type == 2) {
            return redirect()->back()->with(['error' => 'لا يوجد بضاعة لإخراجها على هذا العقد، قم بإدخال البضاعة أولا لتتمكنم من اخراجها']);
        }
        $recipt = new Receipt();
        $ex = Receipt::where(['contract_id'=> $request->contract, 'driver' => $request->driver, 'greg_date' => $request->greg_date])->first();
        $rs = count(Receipt::all());
        $recipt->s_number = str_pad($rs, 8, trim(date('m'), 0).'000000', STR_PAD_LEFT) +1;

        $recipt->type = $request->type;
        $recipt->s_number = $request->s_number;

        $recipt->greg_date = $request->greg_date_input;
        $recipt->hij_date = $request->hij_date_input;
        $recipt->contract_id = explode(',',$request->contract)[0];
        $recipt->client_id = explode(',',$request->contract)[1];
        $recipt->driver = $request->driver;
        $recipt->status = 1;
        $recipt->farm = $request->farm == null ? 'غير معرف' : $request->farm;
        $recipt->notes = $request->notes == null ? 'لا يوجد ملاحظات' : $request->notes;

        $recipt->created_by = auth()->user()->id;
        $recipt->created_at = date('Y-m-d H:i:s');
        
        if ($recipt->save()) {
            return redirect()->route('receipts.home', $recipt->id)->with(['success' => 'تم انشاء سند إدخال بنجاح، يمكنك الان استقبال وتخزين البضاعة على السند.']);
        }
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $action)
    {
        $item = Receipt::find($id);
        if (!$action) {
            if ($item->delete()){
                return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
            }
        }
        $item->status =  $action;
        if ($item->update()){
            return redirect()->back()->with(['success'=>'تمت بنجاح']);
        }
    }
}
