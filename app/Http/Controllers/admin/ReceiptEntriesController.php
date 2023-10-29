<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Receipt;
use App\Models\Contract;
use App\Models\Client;
use App\Models\StoreItem;
use App\Models\StoreBox;
use App\Models\Table;
use App\Models\TableContent;
use App\Models\ReceiptEntry;

class ReceiptEntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.clients.receipts.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $receipt = Receipt::find($id);
        //var_dump($receipt->contract_id);
        $entries = ReceiptEntry::where(['receipt_id'=>$id, 'contract_id' => $receipt->contract_id])->get();
        
        foreach ($entries as $in => $entry) {$entry->table = Table::find($entry->table_id);}
        $receipt->theContract = Contract::find($receipt->contract_id);
       
        $receipt->theClient = Client::find($receipt->theContract->client);
        $tables = Table::where(['status' => 0])->orWhere(['status'=>1, 'contract_id'=>$receipt->contract_id])->get();
        $items = StoreItem::all();
        $boxes = StoreBox::all();

        $vars = [
            'receipt'                   => $receipt,
            'items'                     => $items,
            'boxes'                     => $boxes,
            'entries'                   => $entries,
            'tables'                    => $tables,
            'largeTablesCredit'         => $receipt->theContract->getLargeTablesCredit(),
        ];

        return view('admin.clients.receipts.entries.create', $vars);
    }

    public function create_out($id)
    {
        $receipt = Receipt::find($id);
        //var_dump($receipt->contract_id);
        if (!$receipt == null) {
            $allContractTables = Table::where(['contract_id' => $receipt->contract_id])->get();
            $currentReceiptEntries = ReceiptEntry::where(['receipt_id'=>$id, 'type' => 2])->get();
            foreach ($currentReceiptEntries as $in => $entry) {$entry->table = Table::find($entry->table_id);}
            $receipt->theContract = Contract::find($receipt->contract_id);
            $receipt->theClient = Client::find($receipt->theContract->client);

            $items = StoreItem::all();
            $boxes = StoreBox::all();
            
            $vars = [
                'receipt'                   => $receipt,
                'items'                     => $items,
                'boxes'                     => $boxes,
                'tables'                    => $allContractTables,
                'receipt_entries'           => $currentReceiptEntries,
                
                'largeTablesCredit'         => $receipt->theContract->getLargeTablesCredit(),
            ];

            return view('admin.clients.receipts.entries.out', $vars);
        } else {return redirect () -> route ('receipts.home') -> with (['error' => 'السند المطلوب غير موجود']);}
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check if the table is exists
        $table = Table::where(['name' => $request->table_name])->first();
        if ($table != null) {
            $receipt = Receipt::find($request->receipt_id); // find the receipt
            $contract = Contract::find($receipt->contract_id); // find the contract
            if ($contract->isApproved() && $contract->isActive()) {
                $entry = new ReceiptEntry();

                $entry -> type                      = $receipt  -> type;
                $entry -> table_id                  = $table    -> id;
                $entry -> receipt_id                = $receipt  -> id;
                $entry -> date                      = $receipt  -> hij_date;
                $entry -> client_id                 = $receipt  -> client_id;
                $entry -> contract_id               = $receipt  -> contract_id;

                $entry -> table_size                = $table    -> size;
                $entry -> item_id                   = $request  -> item_id;
                $entry -> box_size                  = $request  -> box_size;
                $entry -> tableItemQty              = $request  -> qty;
                $entry -> created_by                = auth()->user()->id;
                $entry -> created_at                = date('Y-m-d H:i:s');
                if ($entry->save()) {
                    $table->status                  = 1;
                    $table -> contract_id           = $receipt -> contract_id;
                    $table -> updated_by            = auth()->user()->id;
                    $table -> updated_at            = date('Y-m-d H:i:s');
                    if ($table->update()) {
                        return redirect()->back()->with(['success' => 'تمت الإضافة بنجاح']);
                    }
                }
            }
        } else {
            return redirect()->back()->with(['error' => 'Table is not exist'])->withInput();
        }
  
    }

    public function store_out(Request $request)
    {
        //check if the table is exists
        $table = Table::where(['name' => $request->table_id])->first();
        if ($table != null) {
            $receipt = Receipt::find($request->receipt_id); // find the receipt
            $contract = Contract::find($receipt->contract_id); // find the contract

            if ($contract->isApproved() && $contract->isActive()) {
                $entry = new ReceiptEntry();

                $entry -> type                      = $receipt  ->type;
                $entry -> table_id                  = $table    -> id;
                $entry -> receipt_id                = $receipt  -> id;

                $entry -> table_size                = $table    -> size;
                $entry -> item_id                   = $request  -> item_id;
                $entry -> box_size                  = $request  -> box_size;
                $entry -> qty                       = $request  -> qty;

                $entry -> date                      = $receipt  -> hij_date;
                $entry -> client_id                 = $receipt  -> client_id;
                $entry -> contract_id               = $receipt  -> contract_id;
                $entry -> created_by                = auth()->user()->id;
                $entry -> created_at                = date('Y-m-d H:i:s');

                if ($entry->save()) {
                    return redirect()->back()->with(['success' => 'تمت الإضافة بنجاح']);
                }
            }
        } else {
            return redirect()->back()->with(['error' => 'Table is not exist'])->withInput();
        }
  
    }

    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    public static function isTableExist ($id) {
        return Table::where(['name'=>$id])->first();
    }


    public function checkTable (Request $req) {
        $table = Table::where(['name'=>$req->table_id])->first();
        if ($table) {
            if ($table->status == '1') {
                $table->the_client = Client::find(Contract::find($table->contract_id)->client);
                $table->the_contract = Contract::find($table->contract_id);

            }
        }
        
        return $table;
    }
    public function table_contents (Request $req) {
        $table = Table::find($req->table_id) ;
        $entries = ReceiptEntry::select('item_id', 'box_size', ReceiptEntry::raw('SUM(qty) AS total_item_qty'))
        -> where(['contract_id'=>$table->contract_id, 'table_id' => $table->id])
        -> groupBy('item_id', 'box_size')
        -> get();
        foreach ($entries as $index => $entry) {$entry->itemName = StoreItem::find($entry->item_id)->name;}
        return $entries;
    }

    
    public function tableItemQty(Request $req)
    {
        $table = Table::find($req->table_id) ;
        $item = ReceiptEntry::select(ReceiptEntry::raw('SUM(qty) AS total_item_qty'))
        -> where(['contract_id'=>$table->contract_id, 'table_id' => $table->id, 'item_id' => $req->item_id, 'box_size' => $req->box_size])
        -> get();
        
        return $item[0];
    }

    public function tableItemBox(Request $req)
    {
        $table = Table::find($req->table_id) ;
        $sizes = ReceiptEntry::select('box_size')
        -> where(['contract_id'=>$table->contract_id, 'table_id' => $table->id])
        -> groupBy('box_size')
        -> get();
        foreach ($sizes as $in => $size) {$size->name = StoreBox::find($size->box_size)->name;}
        return $sizes;
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
    public function update(Request $request)
    {
        $entry = ReceiptEntry::find($request->id);
        if ($entry->table_id == $request->table && $entry->item_id == $request->item && $entry->box_size == $request->box && $entry->qty == $request->qty) {
            return redirect()->back()->with(['error' => 'لا يوجد شىء لحفظه']);
        } 

        $table = Table::find($request->table_id);

        $entry  -> table_size           = $table    -> size;
        $entry  -> item_id              = $request  -> item;
        $entry  -> box_size             = $request  -> box;
        $entry  -> qty                  = $request  -> qty;

        $entry -> updated_by            = auth()->user()->id;
        $entry -> updated_at            = date('Y-m-d H:i:s');
        if ($entry->update()) {
            $table->the_load += $entry->qty;
            if ($table->save()){
                return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);
            }

        }

        return [$entry, $table];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entry = ReceiptEntry::find($id);
        $table = Table::find($entry->table_id);
        $table->status = $table->the_load > 0 ? 0: 1;
        $table->the_load -= $entry->qty;
        $table->contract_id = $table->status > 0 ? null : $table->contract_id;

        if ($table->update()) {
            if ($entry->delete()) {
                return redirect()->back()->with(['success' => 'تم الحذف']);
            }
        }
        
        
    }
}
