<?php

namespace App\Http\Controllers;

use App\Models\Po;
use App\Models\Pib;
use App\Models\PibDevy;
use App\Models\PibLoad;
use App\Models\Currency;
use App\Models\Importir;
use App\Models\Supplier;
use App\Models\Data\Unit;
use App\Models\PibInvoice;
use App\Models\PibProduct;
use App\Models\TypeProduct;
use App\Models\PibContainer;
use Illuminate\Http\Request;
use App\Models\HistoryProduct;
use Illuminate\Support\Facades\DB;
use App\Models\Master\MasterProduct;
use App\Http\Requests\StorePibRequest;
use App\Models\ReportDocument;

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
        $currency = Currency::orderBy('name')->get();
        // dd($currency);
        return view('master_data.pib.pib_create', [
            'seller' => $seller,
            'currency' => $currency,
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

    public function store(StorePibRequest $request)
    {
        $validate = $request->validated();
        // dd($validate);
        $request->code_pib = date('ymdhis');
        $request->no_approval = str_replace('-', '', $request->no_approval);
        $request->invoice = str_replace('-', '', $request->invoice);
        $request->sub = str_replace(' ', '', $request->sub);


        DB::beginTransaction();

        try {

            $this->addPibs($request);
            $this->addLoad($request);
            $this->addInvoice($request);
            $this->addContainer($request);
            $this->addProduct($request);
            $this->addDevies($request);
            $this->addHistory($request);
            // $this->addDocument($request);


            DB::commit();
            // dd('OK');

            return redirect()->route('pib')->withInput()->with('Ok', ' Data Tersimpan');
        } catch (\Throwable $th) {
            throw $th;
            // dd('gagal');
            return redirect()->route('pib.create')->withInput()->with('Fail', ' Data Tidak Tersimpan');
        }
    }
    public function addPibs($request)
    {
        $add = Pib::insert([
            'code_pib' => $request->code_pib,
            'type_document_pabean' => $request->type_document_pabean,
            'office_pabean' => $request->office_pabean,
            'no_approval' => $request->no_approval,
            'no_po' => $request->no_po,
            'type_pib' => $request->type_pib,
            'type_import' => $request->type_import,
            'payment_method' => $request->payment_method,
            'name_shipper' => $request->name_shipper,
            'address_shipper' => $request->address_shipper,
            'name_seller' => $request->name_seller,
            'address_seller' => $request->address_seller,
            'nik_importir' => $request->nik_importir,
            'name_importir' => $request->name_importir,
            'address_importir' => $request->address_importir,
            'status_importir' => $request->status_importir,
            'apiu' => $request->apiu,
            'name_owner' => $request->name_owner,
            'address_owner' => $request->address_owner,
            'name_ppjk' => $request->name_ppjk,
            'npwp_ppjk' => $request->npwp_ppjk,
            'np_ppjk' => $request->np_ppjk,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $add;
    }
    public function addLoad($request)
    {
        $add = PibLoad::insert([
            'code_pib' => $request->code_pib,
            'no_approval' => $request->no_approval,
            'no_register' => $request->no_register,
            'date_register' => $request->date_register,
            'way_transport' => $request->way_transport,
            'name_transport' => $request->name_transport,
            'date_estimate' => $request->date_estimate,
            'load_place' => $request->load_place,
            'load_transit' => $request->load_transit,
            'load_destination' => $request->load_destination,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $add;
    }
    public function addInvoice($request)
    {
        // dd($pib);
        $addInvoice =  PibInvoice::insert([
            'code_pib' => $request->code_pib,
            'no_approval' => $request->no_approval,
            'invoice' => $request->invoice,
            'date_invoice' => $request->date_invoice,
            'transaction' => $request->transaction,
            'date_transaction' => $request->date_transaction,
            'house_bl' => $request->house_bl,
            'date_house_bl' => $request->date_house_bl,
            'master_bl' => $request->master_bl,
            'date_master_bl' => $request->date_master_bl,
            'bc11' => $request->bc11,
            'date_bc11' => $request->date_bc11,
            'pos' => $request->pos,
            'sub' => $request->sub,
            'facility' => $request->facility,
            'dump' => $request->dump,
            'valuta' => $request->valuta,
            'ndpbm' => $request->ndpbm,
            'value' => $request->value,
            'insurance' => $request->insurance,
            'freight' => $request->freight,
            'pabean_value' => $request->pabean_value,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $addInvoice;
    }
    public function addContainer($request)
    {
        $count = count($request['no_container']);

        for ($i = 0; $i < $count; $i++) {
            // dd($count);
            $add = PibContainer::create([
                'no_approval' => $request->no_approval,
                'code_pib' => $request->code_pib,
                'no_container' => $request->no_container[$i],
                'type_container' => $request->type_container[$i],
                'size_container' => $request->size_container[$i],
                'qty_container' => $count,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return $add;
    }
    public function addProduct($request)
    {

        $count = count($request['code_product']);
        // dd($no_approval);
        for ($i = 0; $i < $count; $i++) {
            $add = PibProduct::insert([
                'no_approval' => $request->no_approval,
                'code_po' => $request->code_po,
                'code_pib' => $request->code_pib,
                'code_po_product' => $request->code_po . '-' . $request->code_product[$i],
                'code_pib_product' => $request->code_pib . '-' . $request->code_product[$i],
                'no_po' => $request->no_po,
                'date_product' => $request->date_product,
                'pos_product' => $request->pos_product[$i],
                'code_product' => $request->code_product[$i],
                'country_product' => $request->country_product,
                'qty_product' => $request->qty_product[$i],
                'unit_product' => $request->unit_product[$i],
                'netto_product' => $request->netto_product[$i],
                'qty_pack' => $request->qty_pack[$i],
                'type_pack' => $request->type_pack[$i],
                'product_pabean' => $request->value_pabean[$i],
                'type_pabean' => $request->type_pabean,
                'qty_type_product' => $count,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return $add;
    }
    public function addDevies($request)
    {
        // dd($request);
        $devies = $request->validate([

            'no_approval' => 'required',
            'code_pib' => 'nullable',
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
            'total_paid' => 'required',
            'total_borne' => 'required',
            'total_delay' => 'required',
            'total_taxfree' => 'required',
            'total_free' => 'required',
            'total_paidoff' => 'required',
        ]);
        $devies['no_approval'] = $request->no_approval;
        $devies['code_pib'] = $request->code_pib;
        // dd($devies);
        $addDevies = PibDevy::create($devies);
        return $addDevies;
    }

    public function addHistory($request)
    {

        $count = count($request['code_product']);
        // dd($count);
        for ($i = 0; $i < $count; $i++) {
            $add = HistoryProduct::insert([
                'code_po' => $request->code_po,
                'code_pib' => $request->code_pib,
                'code_po_product' => $request->code_po . '-' . $request->code_product[$i],
                'code_pib_product' => $request->code_pib . '-' . $request->code_product[$i],
                'code_product' => $request->code_product[$i],
                'unit_product' => $request->unit_product[$i],
                'product_pabean' => $request->value_pabean[$i],
                'date_product' =>  $request->date_product,
                'type_history' =>  1,
                'from' =>  $request->name_shipper,
                'to' =>  $request->name_importir,
                'qty_product' =>  $request->qty_product[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return $add;
    }

    public function addDocument($request)
    {

        $count = count($request['code_product']);
        // dd($count);
        $no = 1;
        $cek = ReportDocument::where('type_in', 1)->get();
        if ($cek != "[]") {
            $no = 1 + count($cek);
        }
        // dd($no);
        for ($i = 0; $i < $count; $i++) {
            $add = ReportDocument::insert([
                'code_pib' => $request->code_pib,
                'code_po' => $request->code_po,
                'type_in' => 1,
                'no_in' => $no,
                'date_in' => $request->date_product,
                'code_product_in' => $request->code_product[$i],
                'name_product_in' => $request->name_product[$i],
                'type_product_in' => $request->type_product[$i],
                'unit_product_in' => $request->unit_product[$i],
                'qty_product_in' =>  $request->qty_product[$i],
                'value_product_in' => $request->value_pabean[$i],
                'date_product_in' =>  $request->date_product,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $add;
    }

    public function edit($id)
    {
        $seller = Supplier::all();
        $importir = Importir::all();
        $typeProduct = TypeProduct::all();
        $product = MasterProduct::all();
        $po = Po::all();
        $unit = Unit::all();
        $currency = Currency::orderBy('name')->get();
        $pib = DB::table('pibs')
            ->join('pib_loads', function ($join) {
                $join->on('pibs.code_pib', '=', 'pib_loads.code_pib');
            })
            ->join('pib_invoices', function ($join) {
                $join->on('pibs.code_pib', '=', 'pib_invoices.code_pib');
            })
            ->join('pib_devies', function ($join) use ($id) {
                $join->on('pibs.code_pib', '=', 'pib_devies.code_pib')
                    ->where('pibs.no_approval', '=', $id);
            })
            ->first();
        // dd($pib);
        $containers =  DB::table('pibs')
            ->join('pib_containers', function ($join) use ($id) {
                $join->on('pibs.code_pib', '=', 'pib_containers.code_pib')
                    ->where('pibs.no_approval', '=', $id);
            })
            ->get();
        $products =  DB::table('pibs')
            ->join('pib_products', function ($join) {
                $join->on('pibs.code_pib', '=', 'pib_products.code_pib');
            })
            ->join('master_products', function ($join) use ($id) {
                $join->on('master_products.code_product', '=', 'pib_products.code_product')
                    ->where('pibs.no_approval', '=', $id);
            })
            ->get();
        return view('master_data.pib.pib_detail', [
            'pib' => $pib,
            'containers' => $containers,
            'products' => $products,
            'seller' => $seller,
            'currency' => $currency,
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

    public function updateContainer($id)
    {
        # code...
    }
    public function deleteContaainer(Request $request)
    {
        # code...
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        // dd($id);
        DB::beginTransaction();
        try {
            Pib::where('code_pib', $id)->delete();
            PibInvoice::where('code_pib', $id)->delete();
            PibLoad::where('code_pib', $id)->delete();
            PibDevy::where('code_pib', $id)->delete();
            PibContainer::where('code_pib', $id)->delete();
            PibProduct::where('code_pib', $id)->delete();
            HistoryProduct::where('code_pib', $id)->delete();
            DB::commit();
            return redirect()->route('pib')->with('Ok', 'Data Dihapus');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Fail', 'Data Gagal Dihapus');
        }
    }
}
