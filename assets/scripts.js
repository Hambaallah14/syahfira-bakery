// Tanda Pemisah Koma
function tandaPemisahTitik(b){
	var _minus = false;
	if (b<0) _minus = true;
	b = b.toString();
	b=b.replace(".","");
	b=b.replace("-","");
	c = "";
	panjang = b.length;
	j = 0;
	for (i = panjang; i > 0; i--){
		 j = j + 1;
		 if (((j % 3) == 1) && (j != 1)){
		   c = b.substr(i-1,1) + "." + c;
		 } else {
		   c = b.substr(i-1,1) + c;
		 }
	}
	if (_minus) c = "-" + c ;
	return c;
}

function numbersonly(ini, e){
	if (e.keyCode>=49){
		if(e.keyCode<=57){
		a = ini.value.toString().replace(".","");
		b = a.replace(/[^\d]/g,"");
		b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
		ini.value = tandaPemisahTitik(b);
		return false;
		}
		else if(e.keyCode<=105){
			if(e.keyCode>=96){
				//e.keycode = e.keycode - 47;
				a = ini.value.toString().replace(".","");
				b = a.replace(/[^\d]/g,"");
				b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
				ini.value = tandaPemisahTitik(b);
				//alert(e.keycode);
				return false;
				}
			else {return false;}
		}
		else {
			return false; }
	}else if (e.keyCode==48){
		a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
		b = a.replace(/[^\d]/g,"");
		if (parseFloat(b)!=0){
			ini.value = tandaPemisahTitik(b);
			return false;
		} else {
			return false;
		}
	}else if (e.keyCode==95){
		a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
		b = a.replace(/[^\d]/g,"");
		if (parseFloat(b)!=0){
			ini.value = tandaPemisahTitik(b);
			return false;
		} else {
			return false;
		}
	}else if (e.keyCode==8 || e.keycode==46){
		a = ini.value.replace(".","");
		b = a.replace(/[^\d]/g,"");
		b = b.substr(0,b.length -1);
		if (tandaPemisahTitik(b)!=""){
			ini.value = tandaPemisahTitik(b);
		} else {
			ini.value = "";
		}
		
		return false;
	} else if (e.keyCode==9){
		return true;
	} else if (e.keyCode==17){
		return true;
	} else {
		//alert (e.keyCode);
		return false;
	}

}



const flashdata = $('.flash-data').data('flashdata');
const target    = $('.flash-data').data('target');
if(flashdata){
	swal({
		title : 'Data ' + target,
		text : 'Berhasil '+ flashdata,
		type : 'success'
	});
}

//tombol-hapus
$('.btn-hapus').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');
		swal({
			title: "Apakah Anda Yakin",
			text: "Data " + target +" akan dihapus",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes",
			cancelButtonText: "No",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function (isConfirm) {
			if (isConfirm) {
				document.location.href = href;
			} else {
				swal({
					title : 'Data ' + target,
					text : 'Gagal dihapus',
					type : 'error'
				});
			}
		});
});




$(document).ready(function(){
    $('#id_bahanbaku').change(function(){
        const id_bahanbaku = $('#id_bahanbaku').val();
        $.ajax({
            type    : 'POST',
            url     : 'https://syahfirabakery.co.id/bahan_baku/selectHargaBahanBaku',
            data    : 'id_bahanbaku=' + id_bahanbaku,
            success : function(response){
            $('#harga').html(response);
            }
        });
    });

	$('#id_mkn_mnm').change(function(){
        const id = $('#id_mkn_mnm').val();
        $.ajax({
            type    : 'POST',
            url     : 'https://syahfirabakery.co.id/makanan_dan_minuman/selectHargaMakandanMinuman',
            data    : 'id=' + id,
            success : function(response){
            $('#harga').html(response);
            }
        });
    });


    $('.btnPesananPersediaanBahanBaku').click(function(){
        var IdPersediaan = $(this).data("id");
        $('#id_persediaan').val(IdPersediaan);
    });

	$('.btnPesananPersediaanMakananMinum').click(function(){
        var IdPersediaan = $(this).data("id");
        $('#id_persediaanMM').val(IdPersediaan);
    });

	
	$('.btnCetak').hide();
	// CETAK DAFTAR MAKANAN / MINUMAN
	$('.btnFilterMasterMakananMinuman').click(function(){
		var id_jenis = $('#id_jenis').val();
		if(id_jenis == "0"){
			alert("Silahkan pilih jenis Makanan / Minuman");
		}
		else {
			$.ajax({
				type    : 'POST',
				url     : 'https://syahfirabakery.co.id/cetak/hasilFilterMakananMinuman',
				data    : {id_jenis : id_jenis},
				success : function(response){
				  $(".hasilCetak").html(response);
				}
			});
		}
		$('.btnCetak').show();
	});

	$('.btnCetak').click(function(){
		$(".hasilCetak").printThis();
	});
});