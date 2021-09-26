<?php

namespace App\Http\Controllers;

use App\Models\Po;
use App\Models\Pib;
use App\Models\PibDevy;
use App\Models\PibLoad;
use App\Models\Importir;
use App\Models\Supplier;
use App\Models\Data\Unit;
use App\Models\PibInvoice;
use App\Models\PibProduct;
use App\Models\TypeProduct;
use App\Models\HistoryProduct;
use App\Models\PibContainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Master\MasterProduct;
use App\Models\PoProduct;
use App\Models\StockProduct;

class PibController extends Controller
{

    public function index()
    {
        $data = DB::table('pibs')
            ->join('pib_loads', 'pib_loads.no_approval', '=', 'pibs.no_approval')
            ->join('pib_invoices', 'pib_invoices.no_approval', '=', 'pibs.no_approval')
            ->join('pib_devies', 'pib_devies.no_approval', '=', 'pibs.no_approval')
            // ->join('pib_containers', 'pib_containers.no_approval', '=', 'pibs.no_approval')
            // ->join('pib_products', 'pib_products.no_approval', '=', 'pibs.no_approval')
            ->get();
        // dd($data);
        return view('master_data.pib.pib_index', [
            'data' => $data,
            'title' => "Data PIB",
            'transaksiOpen' => 'menu-open',
            'transaksiActive' => 'active',
            'pibActive' => 'active',
        ]);
    }

    public function create()
    {
        $seller = Supplier::all();
        $importir = Importir::all();
        $typeProduct = TypeProduct::all();
        $product = MasterProduct::all();
        $po = Po::all();
        $unit = Unit::all();
        return view('master_data.pib.pib_create', [
            'seller' => $seller,
            'unit' => $unit,
            'po' => $po,
            'importir' => $importir,
            'product' => $product,
            'typeProduct' => $typeProduct,
            'title' => "Data PIB",
            'transaksiOpen' => 'menu-open',
            'transaksiActive' => 'active',
            'pibActive' => 'active',
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);

        DB::beginTransaction();

        try {
            $this->addPibs($request);
            $this->addLoad($request);
            $this->addInvoice($request);
            $this->addContainer($request);
            $this->addProduct($request);
            $this->addDevies($request);
            $this->addHistory($request);
            $this->addStock($request);
            $this->addRecived($request);


            DB::commit();
            return redirect()->route('pib.create')->withInput()->with('Ok', ' Data Tersimpan');
        } catch (\Throwable $th) {
            //throw $th;
            dd('gagal');
            return redirect()->route('pib.create')->withInput()->with('Fail', ' Data Tidak Tersimpan');
        }
    }
    public function addPibs($request)
    {
        $pib = $request->validate([
            'type_document_pabean' => 'required',
            'office_pabean' => 'required',
            'no_approval' => 'required',
            'no_po' => 'required',
            'type_pib' => 'required',
            'type_import' => 'required',
            'payment_method' => 'required',
            'name_shipper' => 'required',
            'address_shipper' => 'required',
            'name_seller' => 'required',
            'address_seller' => 'required',
            'nik_importir' => 'required',
            'name_importir' => 'required',
            'address_importir' => 'required',
            'status_importir' => 'required',
            'apiu' => 'required',
            'name_owner' => 'required',
            'address_owner' => 'required',
            'name_ppjk' => 'required',
            'npwp_ppjk' => 'required',
            'np_ppjk' => 'required',
        ]);
        $pib['no_approval'] = str_replace('-', '', $request->no_approval);
        // dd($pib);
        $add = Pib::create($pib);
        return $add;
    }
    public function addLoad($request)
    {
        // dd($request);
        $pib = $request->validate([
            'no_approval' => 'required',
            'no_register' => 'nullable',
            'date_register' => 'nullable',
            'way_transport' => 'nullable',
            'name_transport' => 'nullable',
            'date_estimate' => 'nullable',
            'load_place' => 'nullable',
            'load_transit' => 'nullable',
            'load_destination' => 'nullable',
        ]);
        $pib['no_approval'] = str_replace('-', '', $request->no_approval);
        // dd($pib);
        $add = PibLoad::create($pib);
        return $add;
    }
    public function addInvoice($request)
    {
        // dd($request);
        $pib = $request->validate([
            'no_approval' => 'required',
            'invoice' => 'required',
            'date_invoice' => 'required',
            'transaction' => 'required',
            'date_transaction' => 'required',
            'house_bl' => 'nullable',
            'date_house_bl' => 'nullable',
            'master_bl' => 'nullable',
            'date_master_bl' => 'nullable',
            'bc11' => 'nullable',
            'date_bc11' => 'nullable',
            'pos' => 'nullable',
            'sub' => 'nullable',
            'facility' => 'nullable',
            'dump' => 'nullable',
            'valuta' => 'nullable',
            'ndpbm' => 'nullable',
            'value' => 'nullable',
            'insurance' => 'nullable',
            'freight' => 'nullable',
            'pabean_value' => 'nullable',
        ]);
        $pib['invoice'] = str_replace('-', '', $request->invoice);
        $pib['no_approval'] = str_replace('-', '', $request->no_approval);
        $pib['sub'] = str_replace(' ', '', $request->sub);
        // dd($pib);
        $addInvoice =  PibInvoice::create($pib);
        return $addInvoice;
    }
    public function addContainer($request)
    {
        $container = $request->validate([
            'no_approval' => 'required',
            'no_register' => 'required',
            'no_container' => 'required',
            'size_container' => 'required',
            'type_container' => 'required',
        ]);
        $container['no_approval'] = str_replace('-', '', $request->no_approval);
        $count = count($container['no_container']);
        // dd($count);
        // dd($container['no_approval']);
        for ($i = 0; $i < $count; $i++) {
            // dd($count);
            $add = PibContainer::create([
                'no_approval' => $container['no_approval'],
                'no_register' => $request->no_register,
                'no_container' => $request->no_container[$i],
                'type_container' => $request->type_container[$i],
                'size_container' => $request->size_container[$i],
                'qty_container' => $count,
            ]);
        }
        return $add;
    }
    public function addProduct($request)
    {
        $product = $request->validate([
            'no_approval' => 'required',
            'no_register' => 'required',
            'date_product' => 'required',
            'pos_product' => 'required',
            'code_product' => 'required',
            'type_product' => 'required',
            'name_product' => 'required',
            'country_product' => 'required',
            'qty_product' => 'required',
            'unit_product' => 'required',
            'netto_product' => 'required',
            'qty_pack' => 'required',
            'type_pack' => 'required',
            'value_pabean' => 'required',
            'type_pabean' => 'required',
        ]);
        $no_approval = str_replace('-', '', $request->no_approval);
        $count = count($product['code_product']);
        // dd($no_approval);
        for ($i = 0; $i < $count; $i++) {
            $add = PibProduct::create([
                'no_approval' => $no_approval,
                'no_register' => $request->no_register,
                'date_product' => $request->date_product,
                'pos_product' => $request->pos_product[$i],
                'code_product' => $request->code_product[$i],
                'type_product' => $request->type_product[$i],
                'name_product' => $request->name_product[$i],
                'country_product' => $request->country_product,
                'qty_product' => $request->qty_product[$i],
                'unit_product' => $request->unit_product[$i],
                'netto_product' => $request->netto_product[$i],
                'qty_pack' => $request->qty_pack[$i],
                'type_pack' => $request->type_pack[$i],
                'value_pabean' => $request->value_pabean[$i],
                'type_pabean' => $request->type_pabean,
                'qty_type_product' => $count,
            ]);
        }
        return $add;
    }
    public function addDevies($request)
    {
        // dd($request);
        $devies = $request->validate([

            'no_approval' => 'required',
            'no_register' => 'required',
            'bm_paid' => 'nullable',
            'bm_borne' => 'nullable',
            'bm_delay' => 'nullable',
            'bm_taxfree' => 'nullable',
            'bm_free' => 'nullable',
            'bm_paidoff' => 'nullable',
            'bmt_paid' => 'nullable',
            'bmt_borne' => 'nullable',
            'bmt_delay' => 'nullable',
            'bmt_taxfree' => 'nullable',
            'bmt_free' => 'nullable',
            'bmt_paidoff' => 'nullable',
            'cukai_paid' => 'nullable',
            'cukai_borne' => 'nullable',
            'cukai_delay' => 'nullable',
            'cukai_taxfree' => 'nullable',
            'cukai_free' => 'nullable',
            'cukai_paidoff' => 'nullable',
            'ppn_paid' => 'nullable',
            'ppn_borne' => 'nullable',
            'ppn_delay' => 'nullable',
            'ppn_taxfree' => 'nullable',
            'ppn_free' => 'nullable',
            'ppn_paidoff' => 'nullable',
            'ppnbm_paid' => 'nullable',
            'ppnbm_borne' => 'nullable',
            'ppnbm_delay' => 'nullable',
            'ppnbm_taxfree' => 'nullable',
            'ppnbm_free' => 'nullable',
            'ppnbm_paidoff' => 'nullable',
            'pph_paid' => 'nullable',
            'pph_borne' => 'nullable',
            'pph_delay' => 'nullable',
            'pph_taxfree' => 'nullable',
            'pph_free' => 'nullable',
            'pph_paidoff' => 'nullable',
            'total_paid' => 'nullable',
            'total_borne' => 'nullable',
            'total_delay' => 'nullable',
            'total_taxfree' => 'nullable',
            'total_free' => 'nullable',
            'total_paidoff' => 'nullable',
        ]);
        $devies['no_approval'] = str_replace('-', '', $request->no_approval);
        // dd($devies);
        $addDevies = PibDevy::create($devies);
        return $addDevies;
    }

    public function addHistory($request)
    {
        // dd($request);
        $history = $request->validate([
            'code_product' => 'required',
            'name_product' => 'required',
            'date_product' => 'required',
            'qty_product' => 'required',
        ]);
        // dd($history);
        $count = count($history['code_product']);
        // dd($count);
        for ($i = 0; $i < $count; $i++) {
            $add = HistoryProduct::create([
                'code_product' => $request->code_product[$i],
                'name_product' => $request->name_product[$i],
                'date_product' =>  $request->date_product,
                'type_history' =>  1,
                'from' =>  $request->name_shipper,
                'to' =>  $request->name_importir,
                'qty_product' =>  $request->qty_product[$i],
            ]);
        }
        return $add;
    }
    public function addRecived($request)
    {
        $count = count($request['code_product']);
        // dd($request);
        for ($i = 0; $i < $count; $i++) {
            $old[$i] = PoProduct::where('code_product', $request->code_product[$i])
                ->where('no_po', $request->no_po)
                ->value('qty_less');
            $qty[$i] = $old[$i] - $request->qty_product[$i];
            $add = PoProduct::where('code_product', $request->code_product[$i])
                ->where('no_po', $request->no_po)
                ->update([
                    'qty_less' => $qty[$i],
                ]);
        }
        return $add;
    }
    public function addStock($request)
    {

        $count = count($request['code_product']);
        // dd($request);
        for ($i = 0; $i < $count; $i++) {
            $old[$i] = StockProduct::where('code_product', $request->code_product[$i])
                ->value('qty_product');
            if ($old[$i] == null) {
                $qty[$i] = $request->qty_product[$i];
                $add = StockProduct::create([
                    'code_product' => $request->code_product[$i],
                    'name_product' => $request->name_product[$i],
                    'type_product' => $request->type_product[$i],
                    'qty_product' =>  $qty[$i],
                ]);
            } else {
                $qty[$i] = $old[$i] + $request->qty_product[$i];
                $add = StockProduct::where('code_product', $request->code_product[$i])
                    ->update([
                        'qty_product' => $qty[$i],
                    ]);
            }
        }
        return $add;
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $deletePib = Pib::where('no_approval', $id)->delete();
        $deleteInvoice = PibInvoice::where('no_approval', $id)->delete();
        $deleteLoad = PibLoad::where('no_approval', $id)->delete();
        $deleteDevy = PibDevy::where('no_approval', $id)->delete();
        $deleteContainer = PibContainer::where('no_approval', $id)->delete();
        $deleteProduct = PibProduct::where('no_approval', $id)->delete();

        return redirect()->back()->with('Ok', 'Data Dihapus');
    }
}
