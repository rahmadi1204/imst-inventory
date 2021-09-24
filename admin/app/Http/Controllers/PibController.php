<?php

namespace App\Http\Controllers;

use App\Models\Po;
use App\Models\Pib;
use App\Models\PibDevy;
use App\Models\PibLoad;
use App\Models\Importir;
use App\Models\Supplier;
use App\Models\Data\Unit;
use App\Models\Warehouse;
use App\Models\PibInvoice;
use App\Models\PibProduct;
use App\Models\TypeProduct;
use App\Models\Data\Product;
use App\Models\HistoryProduct;
use App\Models\PibContainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Master\MasterProduct;
use App\Models\RecivedProduct;
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
        $unit = Unit::all();
        return view('master_data.pib.pib_create', [
            'seller' => $seller,
            'unit' => $unit,
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
        dd($request);
        $pib = $request->validate([
            'type_document_pabean' => 'required',
            'no_po' => 'required',
            'office_pabean' => 'required',
            'no_approval' => 'required',
            'no_register' => 'required',
            'date_register' => 'required',
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
            'address_ppjk' => 'required',
            'created_at' => now(),
        ]);
        $pib['no_approval'] = str_replace('-', '', $request->no_approval);
        $pib['npwp_ppjk'] = str_replace('.', '', $request->npwp_ppjk);
        $npppjk = str_replace(' ', '', $request->np_ppjk);
        $pib['np_ppjk'] = str_replace('-', '', $npppjk);
        $storePib =  Pib::insert($pib);
        $storeDevies = $this->addDevies($request);
        $storeLoad = $this->addLoad($request);
        $storeInvoice = $this->addInvoice($request);
        $storeContainer = $this->addContainer($request);
        $storeProduct = $this->addProduct($request);
        $historyProduct = $this->addHistory($request);
        $stockProduct = $this->addStock($request);
        $recivedProduct = $this->addRecived($request);
        return redirect()->route('pib');
    }

    public function addLoad($request)
    {
        $load = $request->validate([
            'no_approval' => 'required',
            'no_register' => 'required',
            'date_register' => 'required',
            'transaction' => 'required',
            'way_transport' => 'required',
            'name_transport' => 'required',
            'load_place' => 'required',
            'load_transit' => 'required',
            'load_destination' => 'required',
            'date_estimate' => 'required',
        ]);
        $load['no_approval'] = str_replace('-', '', $request->no_approval);
        $add = PibLoad::insert($load);
        return $add;
    }
    public function addInvoice($request)
    {
        $invoice = $request->validate([
            'no_approval' => 'required',
            'no_register' => 'required',
            'invoice' => 'required',
            'date_invoice' => 'required',
            'transaction' => 'required',
            'date_transaction' => 'required',
            'house_bl' => 'required',
            'date_house_bl' => 'required',
            'master_bl' => 'required',
            'date_master_bl' => 'required',
            'bc11' => 'required',
            'date_bc11' => 'required',
            'pos' => 'required',
            'sub' => 'required',
            'facility' => 'required',
            'dump' => 'required',
            'valuta' => 'required',
            'ndpbm' => 'required',
            'value' => 'required',
            'insurance' => 'required',
            'freight' => 'required',
            'pabean_value' => 'required',
        ]);
        $invoice['invoice'] = str_replace('-', '', $request->invoice);
        $invoice['no_approval'] = str_replace('-', '', $request->no_approval);
        $invoice['sub'] = str_replace(' ', '', $request->sub);
        $invoice['created_at'] = now();
        $addInvoice =  PibInvoice::insert($invoice);
        return $addInvoice;
    }
    public function addDevies($request)
    {
        $devies = $request->validate([

            'no_approval' => 'required',
            'no_register' => 'required',
            'bm_paid' => 'required',
            'bm_borne' => 'required',
            'bm_delay' => 'required',
            'bm_taxfree' => 'required',
            'bm_free' => 'required',
            'bm_paidoff' => 'required',
            'bmt_paid' => 'required',
            'bmt_borne' => 'required',
            'bmt_delay' => 'required',
            'bmt_taxfree' => 'required',
            'bmt_free' => 'required',
            'bmt_paidoff' => 'required',
            'cukai_paid' => 'required',
            'cukai_borne' => 'required',
            'cukai_delay' => 'required',
            'cukai_taxfree' => 'required',
            'cukai_free' => 'required',
            'cukai_paidoff' => 'required',
            'ppn_paid' => 'required',
            'ppn_borne' => 'required',
            'ppn_delay' => 'required',
            'ppn_taxfree' => 'required',
            'ppn_free' => 'required',
            'ppn_paidoff' => 'required',
            'ppnbm_paid' => 'required',
            'ppnbm_borne' => 'required',
            'ppnbm_delay' => 'required',
            'ppnbm_taxfree' => 'required',
            'ppnbm_free' => 'required',
            'ppnbm_paidoff' => 'required',
            'pph_paid' => 'required',
            'pph_borne' => 'required',
            'pph_delay' => 'required',
            'pph_taxfree' => 'required',
            'pph_free' => 'required',
            'pph_paidoff' => 'required',
            'total_paid' => 'required',
            'total_borne' => 'required',
            'total_delay' => 'required',
            'total_taxfree' => 'required',
            'total_free' => 'required',
            'total_paidoff' => 'required',
        ]);
        $devies['no_approval'] = str_replace('-', '', $request->no_approval);
        $addDevies = PibDevy::insert($devies);
        return $addDevies;
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
        $no_approval = str_replace('-', '', $request->no_approval);
        // dd($container);
        $count = count($container['no_container']);
        // dd($count);
        // dd($request);
        for ($i = 0; $i < $count; $i++) {
            $add = PibContainer::insert([
                'no_approval' => $no_approval,
                'no_register' => $request->no_register,
                'no_container' => $request->no_container[$i],
                'size_container' => $request->size_container[$i],
                'type_container' => $request->type_container[$i],
                'created_at' => now(),
            ]);
        }
        return $add;
    }
    public function addHistory($request)
    {
        $history = $request->validate([
            'code_product' => 'required',
            'name_product' => 'required',
            'date_product' => 'required',
            'type_history' => 'required',
            'from' => 'required',
            'to' => 'required',
            'qty_product' => 'required',
        ]);
        $count = count($history['code_product']);
        for ($i = 0; $i < $count; $i++) {
            $add = HistoryProduct::insert([
                'code_product' => $request->code_product[$i],
                'name_product' =>  $request->name_product[$i],
                'date_product' =>  $request->date_product,
                'type_history' =>  1,
                'from' =>  $request->name_shipper,
                'to' =>  $request->name_importir,
                'qty_product' =>  $request->qty_product[$i],
                'created_at' => now(),
            ]);
        }
        return $add;
    }
    public function addRecived($request)
    {
        $recived = $request->validate([
            'no_po' => 'required',
            'code_product' => 'required',
            'name_product' => 'required',
            'qty_product' => 'required',
        ]);

        $cek = RecivedProduct::where('no_po', $request->no_po)->select('code_product', 'qty_po')->get();
        if ($cek != "[]") {
            $count = count($recived['code_product']);
            for ($i = 0; $i < $count; $i++) {
                $add = RecivedProduct::where('no_po', $request->no_po)
                    ->where('code_product', $request->code_product)->update([
                        'qty_pib' =>  $request->qty_product[$i],
                        'created_at' => now(),
                        'qty_less' => $cek['qty_po'] - $request->qty_product,
                    ]);
            }
        }
        return $add;
    }
    public function addStock($request)
    {
        $stock = $request->validate([
            'code_product' => 'required',
            'name_product' => 'required',
            'type_product' => 'required',
            'qty_product' => 'required',
        ]);
        $count = count($stock['code_product']);
        for ($i = 0; $i < $count; $i++) {
            $add = StockProduct::insert([
                'code_product' => $request->code_product[$i],
                'name_product' =>  $request->name_product[$i],
                'type_product' =>  $request->type_product,
                'qty_product' =>  $request->qty_product[$i],
                'created_at' => now(),
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
            'detail_product' => 'required',
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
        for ($i = 0; $i < $count; $i++) {
            $add = PibProduct::insert([
                'no_approval' => $no_approval,
                'no_register' => $request->no_register,
                'date_product' => $request->date_product,
                'pos_product' => $request->pos_product[$i],
                'code_product' => $request->code_product[$i],
                'type_product' => $request->type_product[$i],
                'name_product' => $request->name_product[$i],
                'brand_product' => $request->brand_product[$i],
                'spec_product' => $request->spec_product[$i],
                'country_product' => $request->country_product,
                'qty_product' => $request->qty_product[$i],
                'unit_product' => $request->unit_product[$i],
                'netto_product' => $request->netto_product[$i],
                'qty_pack' => $request->qty_pack[$i],
                'type_pack' => $request->type_pack[$i],
                'value_pabean' => $request->value_pabean[$i],
                'type_pabean' => $request->type_pabean,
                'created_at' => now(),
            ]);
            // $product = Product::insert([
            //     'code_product' => $request->code_product[$i],
            //     'type_product' => $request->type_product,
            //     'name_product' => $request->name_product[$i],
            //     'brand_product' => $request->brand_product[$i],
            //     'spec_product' => $request->spec_product[$i],
            //     'country_product' => $request->country_product,
            //     'qty_product' => $request->qty_product[$i],
            //     'unit_product' => $request->unit_product[$i],
            //     'created_at' => now(),
            // ]);
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
