$(document).ready(function(){
    // KETIKAN NAMA YANG DICARI DIKLIK, MAKA DITAMPILKAN DI FORM
    // $('#barang').autocomplete({
         source : "https://syahfirabakery.co.id/transaksi/cariBarang"
        // delay  : 0,
        // source : function(request, response){
        //     $.ajax({
        //         url      : 'https://syahfirabakery.co.id/transaksi/cariBarang',
        //         dataType : "json",
        //         data     : 'barang=' + request.term,
        //         success  :  function(data){
        //             response($.map(data, function(item){
        //                 return{
        //                     id_barang : item.id_barang,
        //                     barang    : item.barang,
        //                     harga     : item.harga
        //                 }
        //             }));
        //         },
        //         error : function(e){
        //             alert('Error : '+request);
        //             console.log(e)
        //         }
        //     });
        // },
        // minLength :1,
        // select: function(event, ui){
        //     $('#id_barang').val(ui.item.id_barang);
        //     $('#barang').val(ui.item.barang);
        //     $('#harga').val(ui.item.harga);
        //     return false;
        // },
        // focus : function(event, ui){
        //     return false;
        // }
    // });

    $('#id_barang').on('change', function(e){
        const id_barang = $('#id_barang').val();
        alert(id_barang);
    });
    


    // PINDAH STATUS BARANG
    $(".btn-status-barang").on('click', function(e){
        const idTransaksi 	= $(this).data('id_transaksi'); 
        $.ajax({
            type    : 'POST',
            url     : 'https://syahfirabakery.co.id/transaksi/modal_status_barang',
            data    : 'id_transaksi=' + idTransaksi,
            success : function(response){
            $('.modal-status-barang').html(response);
            }
        });
    });

    // BARANG SISA
    $(".btn-barang-sisa").on('click', function(e){
        const idTransaksi 	= $(this).data('id_transaksi'); 

        $.ajax({
            type    : 'POST',
            url     : 'https://syahfirabakery.co.id/transaksi/modal_barang_sisa',
            data    : 'id_transaksi=' + idTransaksi,
            success : function(response){
            $('.modal-barang-sisa').html(response);
            }
        }); 
    });
    /////////////////////////////////////

    // PERSEDIAAN BARANG
    hidden("#per-tanggal-persediaan-barang", "#per-bulan-persediaan-barang", "#per-tahun-persediaan-barang");
    button_cetak(".button-cetak-persediaan-barang");
    $('#rekap-persediaan-barang').change(function(){
        var option = $(this).val();
        if(option == "per-tanggal"){
            per_tanggal_show("#per-tanggal-persediaan-barang", "#per-bulan-persediaan-barang", "#per-tahun-persediaan-barang");
        }
        else if(option == "per-bulan"){
            per_bulan_show("#per-tanggal-persediaan-barang", "#per-bulan-persediaan-barang", "#per-tahun-persediaan-barang");
        }
        else if(option == "per-tahun"){
            per_tahun_show("#per-tanggal-persediaan-barang", "#per-bulan-persediaan-barang", "#per-tahun-persediaan-barang");
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

        else if(option_rekap == "per-tahun"){
            const tahun = $('#tahun-persediaan-barang').val();
            $.ajax({
                type    : 'POST',
                url     : 'https://syahfirabakery.co.id/rekap_laporan/per_tahun/persediaan_barang',
                data    : {tahun : tahun},
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
    hidden("#per-tanggal-barang-keluar", "#per-bulan-barang-keluar", "#per-tahun-barang-keluar");
    button_cetak(".button-cetak-barang-keluar");
    $('#rekap-barang-keluar').change(function(){
        var option = $(this).val();
        if(option == "per-tanggal"){
            per_tanggal_show("#per-tanggal-barang-keluar", "#per-bulan-barang-keluar", "#per-tahun-barang-keluar");
        }
        else if(option == "per-bulan"){
           per_bulan_show("#per-tanggal-barang-keluar", "#per-bulan-barang-keluar", "#per-tahun-barang-keluar");
        }
        else if(option == "per-tahun"){
            per_tahun_show("#per-tanggal-barang-keluar", "#per-bulan-barang-keluar", "#per-tahun-barang-keluar");
        }
    });

    $("#button-filter-barang-keluar").on('click', function(e){
        var option_rekap = $('#rekap-barang-keluar').val();
        if(option_rekap == "per-tanggal"){
            const dr_tgl = $('#dr-tgl-barang-keluar').val();
            const sm_tgl = $('#sm-tgl-barang-keluar').val();
            $.ajax({
                type    : 'POST',
                url     : 'https://syahfirabakery.co.id/rekap_laporan/per_tanggal/barang_keluar',
                data    : {dr_tgl : dr_tgl, sm_tgl : sm_tgl},
                success : function(response){
                  $(".data-barang").html(response);
                }
            });
            $("#card-filter").show();
            $(".button-cetak-barang-keluar").show();
        }

        else if(option_rekap == "per-bulan"){
            
            const bulan = $('#bulan-brg-keluar').val();
            const tahun = $('#tahun-brg-keluar').val();
            $.ajax({
                type    : 'POST',
                url     : 'https://syahfirabakery.co.id/rekap_laporan/per_bulan/barang_keluar',
                data    : {per_bulan : bulan, per_tahun : tahun},
                success : function(response){
                  $(".data-barang").html(response);
                }
            });
            $("#card-filter").show();
            $(".button-cetak-barang-keluar").show();
        }

        else if(option_rekap == "per-tahun"){
            const tahun = $('#tahun-barang-keluar').val();
            $.ajax({
                type    : 'POST',
                url     : 'https://syahfirabakery.co.id/rekap_laporan/per_tahun/barang_keluar',
                data    : {tahun : tahun},
                success : function(response){
                  $(".data-barang").html(response);
                }
            });
            $("#card-filter").show();
            $(".button-cetak-barang-keluar").show();
        }
        
        else{
            alert("Silahkan pilih Jenis Rekap Barang");
        }
    });




    // BARANG TERJUAL
    hidden("#per-tanggal-barang-terjual", "#per-bulan-barang-terjual", "#per-tahun-barang-terjual");
    button_cetak(".button-cetak-barang-terjual");
    $('#rekap-barang-terjual').change(function(){
        var option = $(this).val();
        if(option == "per-tanggal"){
            per_tanggal_show("#per-tanggal-barang-terjual", "#per-bulan-barang-terjual", "#per-tahun-barang-terjual");
        }
        else if(option == "per-bulan"){
           per_bulan_show("#per-tanggal-barang-terjual", "#per-bulan-barang-terjual", "#per-tahun-barang-terjual");
        }
        else if(option == "per-tahun"){
            per_tahun_show("#per-tanggal-barang-terjual", "#per-bulan-barang-terjual", "#per-tahun-barang-terjual");
        }
    });

    $("#button-filter-barang-terjual").on('click', function(e){
        var option_rekap = $('#rekap-barang-terjual').val();
        if(option_rekap == "per-tanggal"){
            const dr_tgl = $('#dr-tgl-barang-terjual').val();
            const sm_tgl = $('#sm-tgl-barang-terjual').val();
            $.ajax({
                type    : 'POST',
                url     : 'https://syahfirabakery.co.id/rekap_laporan/per_tanggal/barang_terjual',
                data    : {dr_tgl : dr_tgl, sm_tgl : sm_tgl},
                success : function(response){
                  $(".data-barang").html(response);
                }
            });
            $("#card-filter").show();
            $(".button-cetak-barang-terjual").show();
        }

        else if(option_rekap == "per-bulan"){
            
            const bulan = $('#bulan-brg-terjual').val();
            const tahun = $('#tahun-brg-terjual').val();
            $.ajax({
                type    : 'POST',
                url     : 'https://syahfirabakery.co.id/rekap_laporan/per_bulan/barang_terjual',
                data    : {per_bulan : bulan, per_tahun : tahun},
                success : function(response){
                  $(".data-barang").html(response);
                }
            });
            $("#card-filter").show();
            $(".button-cetak-barang-terjual").show();
        }

        else if(option_rekap == "per-tahun"){
            const tahun = $('#tahun-barang-terjual').val();
            $.ajax({
                type    : 'POST',
                url     : 'https://syahfirabakery.co.id/rekap_laporan/per_tahun/barang_terjual',
                data    : {tahun : tahun},
                success : function(response){
                  $(".data-barang").html(response);
                }
            });
            $("#card-filter").show();
            $(".button-cetak-barang-terjual").show();
        }
        
        else{
            alert("Silahkan pilih Jenis Rekap Barang");
        }
    });




    // BARANG SISA
    hidden("#per-tanggal-barang-sisa", "#per-bulan-barang-sisa", "#per-tahun-barang-sisa");
    button_cetak(".button-cetak-barang-sisa");
    $('#rekap-barang-sisa').change(function(){
        var option = $(this).val();
        if(option == "per-tanggal"){
            per_tanggal_show("#per-tanggal-barang-sisa", "#per-bulan-barang-sisa", "#per-tahun-barang-sisa");
        }
        else if(option == "per-bulan"){
           per_bulan_show("#per-tanggal-barang-sisa", "#per-bulan-barang-sisa", "#per-tahun-barang-sisa");
        }
        else if(option == "per-tahun"){
            per_tahun_show("#per-tanggal-barang-sisa", "#per-bulan-barang-sisa", "#per-tahun-barang-sisa");
        }
    });

    $("#button-filter-barang-sisa").on('click', function(e){
        var option_rekap = $('#rekap-barang-sisa').val();
        if(option_rekap == "per-tanggal"){
            const dr_tgl = $('#dr-tgl-barang-sisa').val();
            const sm_tgl = $('#sm-tgl-barang-sisa').val();
            $.ajax({
                type    : 'POST',
                url     : 'https://syahfirabakery.co.id/rekap_laporan/per_tanggal/barang_sisa',
                data    : {dr_tgl : dr_tgl, sm_tgl : sm_tgl},
                success : function(response){
                  $(".data-barang").html(response);
                }
            });
            $("#card-filter").show();
            $(".button-cetak-barang-sisa").show();
        }

        else if(option_rekap == "per-bulan"){
            
            const bulan = $('#bulan-brg-sisa').val();
            const tahun = $('#tahun-brg-sisa').val();
            $.ajax({
                type    : 'POST',
                url     : 'https://syahfirabakery.co.id/rekap_laporan/per_bulan/barang_sisa',
                data    : {per_bulan : bulan, per_tahun : tahun},
                success : function(response){
                  $(".data-barang").html(response);
                }
            });
            $("#card-filter").show();
            $(".button-cetak-barang-sisa").show();
        }

        else if(option_rekap == "per-tahun"){
            const tahun = $('#tahun-barang-sisa').val();
            $.ajax({
                type    : 'POST',
                url     : 'https://syahfirabakery.co.id/rekap_laporan/per_tahun/barang_sisa',
                data    : {tahun : tahun},
                success : function(response){
                  $(".data-barang").html(response);
                }
            });
            $("#card-filter").show();
            $(".button-cetak-barang-sisa").show();
        }
        
        else{
            alert("Silahkan pilih Jenis Rekap Barang");
        }
    });


    // =========================================================
    function hidden($btn_tgl, $btn_bulan, $btn_tahun){
        $($btn_tgl).hide();
        $($btn_bulan).hide();
        $($btn_tahun).hide();
    }

    function per_tanggal_show($btn_tgl, $btn_bulan, $btn_tahun){
        $($btn_tgl).show();
        $($btn_bulan).hide();
        $($btn_tahun).hide();
    }

    function per_bulan_show($btn_tgl, $btn_bulan, $btn_tahun){
        $($btn_tgl).hide();
        $($btn_bulan).show();
        $($btn_tahun).hide();
    }

    function per_tahun_show($btn_tgl, $btn_bulan, $btn_tahun){
        $($btn_tgl).hide();
        $($btn_bulan).hide();
        $($btn_tahun).show();
    }

    function button_cetak($button){
        $($button).on("click",  function(e){
            $(".data-barang").printArea();
        });
    }
})