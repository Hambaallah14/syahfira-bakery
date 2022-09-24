$(document).ready(function(){
    
    // PERSEDIAAN BARANG
    hidden_persediaan_barang();
    $('#rekap-persediaan-barang').change(function(){
        var option = $(this).val();
        if(option == "per-tanggal"){
            $("#per-tanggal-persediaan-barang").show();
            $("#per-bulan-persediaan-barang").hide();
            $("#per-tahun-persediaan-barang").hide();
        }
        else if(option == "per-bulan"){
            $("#per-bulan-persediaan-barang").show();
            $("#per-tanggal-persediaan-barang").hide();
            $("#per-tahun-persediaan-barang").hide();
        }
        else if(option == "per-tahun"){
            $("#per-tahun-persediaan-barang").show();
            $("#per-tanggal-persediaan-barang").hide();
            $("#per-bulan-persediaan-barang").hide();
        }
    });

    $("#button-filter-persediaan-barang").on('click', function(e){
        var option_rekap = $('#rekap-persediaan-barang').val();
        if(option_rekap == "per-tanggal"){
            const dr_tgl = $('#dr-tgl-persediaan-barang').val();
            const sm_tgl = $('#sm-tgl-persediaan-barang').val();
            $.ajax({
                type    : 'POST',
                url     : 'https://syahfirabakery.co.id/rekap_laporan/per_tanggal/persediaan_barang',
                data    : {dr_tgl : dr_tgl, sm_tgl : sm_tgl},
                success : function(response){
                  $(".data-barang").html(response);
                }
            });
            $("#card-filter").show();
            $(".button-cetak-persediaan-barang").show();
        }

        else if(option_rekap == "per-bulan"){
            
            const bulan = $('#bulan-persediaan-brg').val();
            const tahun = $('#tahun-persediaan-brg').val();
            $.ajax({
                type    : 'POST',
                url     : 'https://syahfirabakery.co.id/rekap_laporan/per_bulan/persediaan_barang',
                data    : {per_bulan : bulan, per_tahun : tahun},
                success : function(response){
                  $(".data-barang").html(response);
                }
            });
            $("#card-filter").show();
            $(".button-cetak-persediaan-barang").show();
        }
        
        else{
            alert("Silahkan pilih Jenis Rekap Barang");
        }
    });


    // BARANG KELUAR



    // BARANG TERJUAL



    // BARANG SISA


    // =========================================================
    function hidden_persediaan_barang(){
        $("#per-tanggal-persediaan-barang").hide();
        $("#per-bulan-persediaan-barang").hide();
        $("#per-tahun-persediaan-barang").hide();
    }
})