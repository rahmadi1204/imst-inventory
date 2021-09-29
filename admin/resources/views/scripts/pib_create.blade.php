<script type="text/javascript">
    let i = 0;
    $("#dynamic-ar").click(function() {
        ++i;
        $("#containerAddRemove").append('<tr><td><input type="text" name="no_container[' + i +
            ']" class="form-control" /></td><td><input type="text" name="size_container[' +
            i +
            ']" class="form-control" /></td><td><input type="text" name="type_container[' +
            i +
            ']" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fa fa-trash"></i></button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function() {
        $(this).parents('tr').remove();
    });
</script>
<script type="text/javascript">
    let j = 0;
    $("#dynamic-pr").click(function() {
        ++j;
        $("#productAddRemove").append('<tr><td><input type="text" name="pos_product[' +
            j +
            ']" class="form-control" /></td><td><select name="code_product[' + j +
            ']" id="code_product' +
            j +
            '" class="form-control"><option value="" selected disabled>Pilih</option>@foreach ($product as $item)<option value="{{ $item->code_product }}" type="{{ $item->type_product }}" name="{{ $item->name_product }}">{{ $item->code_product }}</option>@endforeach</select></td><td><input type="text" name="type_product[' +
            j +
            ']" class="form-control" id="type_product' + j +
            '"  readonly hidden/><input type="text" name="name_product[' +
            j +
            ']" class="form-control" id="name_product' + j +
            '"  readonly/></td><td><input type="text" name="qty_product[' +
            j +
            ']" class="form-control" /></td><td><select name="unit_product[' + j +
            ']" class="form-control"><option selected disabled>Pilih</option>@foreach ($unit as $item) <option value="{{ $item->unit }}">{{ $item->unit }}</option>@endforeach</select></td><td><div class="input-group"><input type = "text" name = "netto_product[' +
            j +
            ']" class="form-control" />   <div class="input-group-appeand"><div class = "input-group-text" >KG</div></div></div></td ><td><input type="text" name="qty_pack[' +
            j +
            ']" class="form-control" /></td><td><select name="type_pack[' + j +
            ']" class="form-control"><option selected disabled>Pilih</option><option value="Pack">Pack</option><option value="Container">Container</option><option value="Pallet">Pallet</option></select></td><td><input type="text" name="value_pabean[' +
            j +
            ']" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-product"><i class="fa fa-trash"></i></button></td></tr>'
        );
        $("#code_product" + j).change(function() {
            let code = $(this).val();
            let name = $('#code_product' + j + ' option:selected').attr("name");
            let type = $('#code_product' + j + ' option:selected').attr("type");

            $("#name_product" + j).val(name);
            $("#type_product" + j).val(type);

        });
    });
    $(document).on('click', '.remove-input-product', function() {
        $(this).parents('tr').remove();
    });
</script>
<script>
    $("#code_product" + 0).change(function() {
        let code = $(this).val();
        let name = $('#code_product' + 0 + ' option:selected').attr("name");
        let type = $('#code_product' + 0 + ' option:selected').attr("type");

        $("#name_product" + 0).val(name);
        $("#type_product" + 0).val(type);

    });

    $('#no_po').change(function() {
        let code = $(this).val();
        let name = $('#no_po option:selected').attr("name_supplier");
        let address = $('#no_po option:selected').attr("address");
        let code_po = $('#no_po option:selected').attr("code_po");

        $("#code_po").val(code_po);
        $("#name_seller").val(name);
        $("#address_seller").val(address);
        $("#name_shipper").val(name);
        $("#address_shipper").val(address);

    });

    $('#name_shipper').change(function() {
        let code = $(this).val();
        let name = $('#name_shipper option:selected').text();
        let address = $('#name_shipper option:selected').attr("address");

        $("#address_shipper").val(address);

    });
    $('#name_seller').change(function() {
        let code = $(this).val();
        let name = $('#name_seller option:selected').text();
        let address = $('#name_seller option:selected').attr("address");

        $("#address_seller").val(address);

    });
    $('#name_importir').change(function() {
        let code = $(this).val();
        let name = $('#name_importir option:selected').text();
        let address = $('#name_importir option:selected').attr("address");
        let nik = $('#name_importir option:selected').attr("nik");
        let status = $('#name_importir option:selected').attr("status");
        let apiu = $('#name_importir option:selected').attr("apiu");

        $("#address_importir").val(address);
        $("#nik_importir").val(nik);
        $("#status_importir").val(status);
        $("#apiu").val(apiu);

    });
    $('#name_owner').change(function() {
        let code = $(this).val();
        let name = $('#name_owner option:selected').text();
        let address = $('#name_owner option:selected').attr("address");

        $("#address_owner").val(address);

    });
    $('#bm_paid, #bm_kite_paid , #bmt_paid, #cukai_paid, #ppn_paid, #ppnbm_paid, #pph_paid').keyup(function() {

        let bm_paid = $("#bm_paid").val();
        let bm_kite_paid = $("#bm_kite_paid").val();
        let bmt_paid = $("#bmt_paid").val();
        let cukai_paid = $("#cukai_paid").val();
        let ppn_paid = $("#ppn_paid").val();
        let ppnbm_paid = $("#ppnbm_paid").val();
        let pph_paid = $("#pph_paid").val();
        let total_paid = parseInt(bm_paid) + parseInt(bm_kite_paid) + parseInt(bmt_paid) + parseInt(
                cukai_paid) + parseInt(ppn_paid) +
            parseInt(ppnbm_paid) + parseInt(pph_paid);
        $('#total_paid').val(total_paid);
    });

    $('#bm_borne, #bm_kite_borne , #bmt_borne, #cukai_borne, #ppn_borne, #ppnbm_borne, #pph_borne').keyup(function() {

        let bm_borne = $("#bm_borne").val();
        let bm_kite_borne = $("#bm_kite_borne").val();
        let bmt_borne = $("#bmt_borne").val();
        let cukai_borne = $("#cukai_borne").val();
        let ppn_borne = $("#ppn_borne").val();
        let ppnbm_borne = $("#ppnbm_borne").val();
        let pph_borne = $("#pph_borne").val();
        let total_borne = parseInt(bm_borne) + parseInt(bm_kite_borne) + parseInt(bmt_borne) + parseInt(
                cukai_borne) + parseInt(ppn_borne) +
            parseInt(ppnbm_borne) + parseInt(pph_borne);
        $('#total_borne').val(total_borne);
    });
    $('#bm_delay, #bm_kite_delay , #bmt_delay, #cukai_delay, #ppn_delay, #ppnbm_delay, #pph_delay').keyup(function() {

        let bm_delay = $("#bm_delay").val();
        let bm_kite_delay = $("#bm_kite_delay").val();
        let bmt_delay = $("#bmt_delay").val();
        let cukai_delay = $("#cukai_delay").val();
        let ppn_delay = $("#ppn_delay").val();
        let ppnbm_delay = $("#ppnbm_delay").val();
        let pph_delay = $("#pph_delay").val();
        let total_delay = parseInt(bm_delay) + parseInt(bm_kite_delay) + parseInt(bmt_delay) + parseInt(
                cukai_delay) + parseInt(ppn_delay) +
            parseInt(ppnbm_delay) + parseInt(pph_delay);
        $('#total_delay').val(total_delay);
    });
    $('#bm_taxfree, #bm_kite_taxfree , #bmt_taxfree, #cukai_taxfree, #ppn_taxfree, #ppnbm_taxfree, #pph_taxfree').keyup(
        function() {

            let bm_taxfree = $("#bm_taxfree").val();
            let bm_kite_taxfree = $("#bm_kite_taxfree").val();
            let bmt_taxfree = $("#bmt_taxfree").val();
            let cukai_taxfree = $("#cukai_taxfree").val();
            let ppn_taxfree = $("#ppn_taxfree").val();
            let ppnbm_taxfree = $("#ppnbm_taxfree").val();
            let pph_taxfree = $("#pph_taxfree").val();
            let total_taxfree = parseInt(bm_taxfree) + parseInt(bm_kite_taxfree) + parseInt(bmt_taxfree) + parseInt(
                    cukai_taxfree) + parseInt(ppn_taxfree) +
                parseInt(ppnbm_taxfree) + parseInt(pph_taxfree);
            $('#total_taxfree').val(total_taxfree);
        });
    $('#bm_free, #bm_kite_free , #bmt_free, #cukai_free, #ppn_free, #ppnbm_free, #pph_free').keyup(
        function() {

            let bm_free = $("#bm_free").val();
            let bm_kite_free = $("#bm_kite_free").val();
            let bmt_free = $("#bmt_free").val();
            let cukai_free = $("#cukai_free").val();
            let ppn_free = $("#ppn_free").val();
            let ppnbm_free = $("#ppnbm_free").val();
            let pph_free = $("#pph_free").val();
            let total_free = parseInt(bm_free) + parseInt(bm_kite_free) + parseInt(bmt_free) + parseInt(
                    cukai_free) + parseInt(ppn_free) +
                parseInt(ppnbm_free) + parseInt(pph_free);
            $('#total_free').val(total_free);
        });
    $('#bm_paidoff, #bm_kite_paidoff , #bmt_paidoff, #cukai_paidoff, #ppn_paidoff, #ppnbm_paidoff, #pph_paidoff').keyup(
        function() {

            let bm_paidoff = $("#bm_paidoff").val();
            let bm_kite_paidoff = $("#bm_kite_paidoff").val();
            let bmt_paidoff = $("#bmt_paidoff").val();
            let cukai_paidoff = $("#cukai_paidoff").val();
            let ppn_paidoff = $("#ppn_paidoff").val();
            let ppnbm_paidoff = $("#ppnbm_paidoff").val();
            let pph_paidoff = $("#pph_paidoff").val();
            let total_paidoff = parseInt(bm_paidoff) + parseInt(bm_kite_paidoff) + parseInt(bmt_paidoff) + parseInt(
                    cukai_paidoff) + parseInt(ppn_paidoff) +
                parseInt(ppnbm_paidoff) + parseInt(pph_paidoff);
            $('#total_paidoff').val(total_paidoff);
        });
    $('#ndpbm, #value').keyup(function() {

        let jumlah = $("#ndpbm").val();
        let harga = $("#value").val();
        let total = parseFloat(jumlah) * parseFloat(harga);
        $('#pabean_value').val(total);
    });
</script>
