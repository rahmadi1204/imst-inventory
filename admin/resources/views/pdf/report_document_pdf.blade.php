<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Perdokumen</title>
</head>

<body>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-12 mb-5" id="tabelMasuk" style="display: none">
                                <table id="masuk" class="table table-bordered table-hover nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center bg-primary"></th>
                                            <th class="text-center bg-primary" colspan="10">DAFTAR BARANG MASUK</th>
                                        </tr>
                                        <tr>
                                            <th>NO</th>
                                            <th>JENIS</th>
                                            <th>NO</th>
                                            <th>TGL</th>
                                            <th>TGL MASUK</th>
                                            <th>KODE BARANG</th>
                                            <th>SERI BARANG</th>
                                            <th>NAMA BARANG</th>
                                            <th>SATUAN</th>
                                            <th>JUMLAH</th>
                                            <th>NILAI PABEAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($masuk as $item)
                                            <tr>
                                                <td>{{ $noMasuk++ }}</td>
                                                @if ($item->type_history == 1)
                                                    <td>PIB</td>
                                                @elseif($item->type_history == 2)
                                                    <td>NCR Vendor</td>
                                                @else
                                                    <td>NCR Customer</td>
                                                @endif
                                                <td>{{ $item->no_in }}</td>
                                                <td>{{ $item->date_product }}</td>
                                                <td>{{ $item->date_product }}</td>
                                                <td>{{ $item->code_product }}</td>
                                                <td>{{ $item->type_product }}</td>
                                                <td>{{ $item->name_product }}</td>
                                                <td>{{ $item->unit_product }}</td>
                                                <td>{{ $item->qty_product }}</td>
                                                <td>{{ $item->product_pabean }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12 mb-5" id="tabelKeluar" style="display: none">
                                <table id="keluar" class="table table-bordered table-hover nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center bg-primary"></th>
                                            <th class="text-center bg-primary" colspan="10">DAFTAR BARANG KELUAR</th>
                                        </tr>
                                        <tr>
                                            <th>NO</th>
                                            <th>JENIS</th>
                                            <th>NO</th>
                                            <th>TGL</th>
                                            <th>TGL KELUAR</th>
                                            <th>KODE BARANG</th>
                                            <th>SERI BARANG</th>
                                            <th>NAMA BARANG</th>
                                            <th>SATUAN</th>
                                            <th>JUMLAH</th>
                                            <th>NILAI PABEAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keluar as $item)
                                            <tr>
                                                <td>{{ $noKeluar++ }}</td>
                                                @if ($item->type_history == -2)
                                                    <td>NCR Vendor</td>
                                                @else
                                                    <td>NCR Customer</td>
                                                @endif
                                                <td>{{ $item->no_out }}</td>
                                                <td>{{ $item->date_product }}</td>
                                                <td>{{ $item->date_product }}</td>
                                                <td>{{ $item->code_product }}</td>
                                                <td>{{ $item->type_product }}</td>
                                                <td>{{ $item->name_product }}</td>
                                                <td>{{ $item->unit_product }}</td>
                                                <td>{{ $item->qty_product }}</td>
                                                <td>{{ $item->product_pabean }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12">
                                <table id="saldo" class="table table-bordered table-hover nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center bg-primary"></th>
                                            <th class="text-center bg-primary" colspan="10">DOKUMEN PEMASUKAN</th>
                                            <th class="text-center bg-primary" colspan="10">DOKUMEN PENGELUARAN</th>
                                            <th class="text-center bg-primary" colspan="3">SALDO BARANG</th>
                                        </tr>
                                        <tr>
                                            <th>NO</th>
                                            <th>JENIS</th>
                                            <th>NO</th>
                                            <th>TGL</th>
                                            <th>TGL MASUK</th>
                                            <th>KODE BARANG</th>
                                            <th>SERI BARANG</th>
                                            <th>NAMA BARANG</th>
                                            <th>SATUAN</th>
                                            <th>JUMLAH</th>
                                            <th>NILAI PABEAN</th>
                                            <th>JENIS</th>
                                            <th>NO</th>
                                            <th>TGL</th>
                                            <th>TGL KELUAR</th>
                                            <th>KODE BARANG</th>
                                            <th>SERI BARANG</th>
                                            <th>NAMA BARANG</th>
                                            <th>SATUAN</th>
                                            <th>JUMLAH</th>
                                            <th>NILAI PABEAN</th>
                                            <th>SATUAN</th>
                                            <th>JUMLAH</th>
                                            <th>NILAI PABEAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $j = 1;
                                            $jml = 0;
                                            $pabean = 0;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $j++ }}</td>
                                                <td>{{ $item->type_product }}</td>
                                                <td></td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>{{ $item->code_product }}</td>
                                                <td>{{ $item->type_product }}</td>
                                                <td>{{ $item->name_product }}</td>
                                                <td>{{ $item->unit_product_in }}</td>
                                                <td>{{ $item->qty_product_in }}</td>
                                                <td>{{ $item->product_pabean_in }}</td>
                                                <td>{{ $item->type_product }}</td>
                                                <td></td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>{{ $item->code_product }}</td>
                                                <td>{{ $item->type_product }}</td>
                                                <td>{{ $item->name_product }}</td>
                                                <td>{{ $item->unit_product_out }}</td>
                                                <td>{{ $item->qty_product_out }}</td>
                                                <td>{{ $item->product_pabean_out }}</td>
                                                <td>{{ $item->unit_product_in }}</td>
                                                <td>
                                                    {{ $jml = $item->qty_product_in + $item->qty_product_out }}
                                                </td>
                                                <td>{{ $pabean = $item->product_pabean_in + $item->product_pabean_out }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
