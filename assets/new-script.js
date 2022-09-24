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