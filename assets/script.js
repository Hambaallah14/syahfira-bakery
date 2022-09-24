const flashdata = $('.flash-data').data('flashdata');
const target    = $('.flash-data').data('target');
if(flashdata){
	swal({
		title : 'Data ' + target,
		text : 'Berhasil '+ flashdata,
		type : 'success'
	});
}


// //tombol-hapus
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

// Btn-Pemberitahuan
$('.btn-pemberitahuan-pegawai').on('click', function(e){
	const nip = $(this).data('nip');
	// $('.modal-title').text('Daftar Pembelian ATK Per Tanggal '+format_tanggal);
	$.ajax({
        type    : 'POST',
        url     : 'https://syahfirabakery.co.id/daftar_pegawai/select_pemberitahuan',
        data    : 'nip=' + nip,
        success : function(response){
          $('.modal-body-pemberitahuan').html(response);
        }
    });
});
// End Btn-Pemberitahuan



// Function Edit Profil & Edit Password
show_edit_profil();

$('#btn-edit-profil').click(function(){
	show_edit_profil();
});

$('#btn-edit-password').click(function(){
	show_edit_password();
});

function show_edit_profil(){
	$('#edit-profil').show();
	$('#edit-password').hide();
}

function show_edit_password(){
	$('#edit-profil').hide();
	$('#edit-password').show();
}
// End Function Edit Profil & Edit Password

$('.btn-tambah-barang').on('click', function(e){
	const value    = "";
	$('.btn-simpan').text('Simpan data');
	$('.modal-title').text('Tambah Barang');	
	$('#form_validation').attr('action', 'https://syahfirabakery.co.id/daftar_barang/add');
	$('.form-label').show();
	$('[name="id_kategori"]').val('-').trigger('change');
	$('.barang').val(value);
	$('.jumlah').val(value);
	$('[name="satuan"]').val('-').trigger('change');
	$('.keterangan').val(value);
});

// End Master Transaksi Barang Masuk


$(document).ready(function(){
	tambahList('.tambah_list_persediaan');
	tambahList('.tambah_list_penjualan');

	function tambahList($buttonList){
		var item = 1;
		$($buttonList).click(function(){
			var count = 0;
			const barang = $('#id_barang').find('option:selected').text();
			const harga  = $('#harga').val();
			const qty    = $('#qty').val();
			if(harga == "" || qty == "" || barang == "-- Pilih Barang --"){
				alert("Data belum lengkap");
			}
			else{
				iCount = $('#dataTable tbody tr').length + 1;
				table ="<tr>";
					table += "<td>"+iCount+"</td>";
					table += "<td>"+barang+"</td>";
					table += "<td>"+harga+"</td>";
					table += "<td>"+qty+"</td>";
					table += "<td><i class='delete material-icons' style='cursor:pointer'>delete</i></td>";
					table += "<input type='hidden' name='all_id_barang[]' value='"+$('#id_barang').val()+"' />";
					table += "<input type='hidden' name='all_harga[]' value='"+harga+"' />";
					table += "<input type='hidden' name='all_qty[]' value='"+qty+"' />";
				table += "</tr>";
				$('#dataTable tbody').append(table);
				item +=1;
				restFormOpts();
				// Reset Form
				$('#id_barang').find('option:selected').text() = "-- Pilih Barang --";
				$('#harga').val('');
				$('#qty').val('');
			}
		});

		$('body').on('click', '.delete', function() {
			$(this).parents('tr').remove();  
			item -= 1;
		});
	}
});


// REKAP
// Daftar barang
hide();
$('#rekap-barang').change(function(){
	var option = $(this).val();
	if(option == "jenis-barang"){
		$("#jenis-barang").show();
	}
	else{
		$("#jenis-barang").hide();
	}
});

// PERSEDIAAN BARANG
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

// PENJUALAN BARANG
$('#rekap-penjualan-barang').change(function(){
	var option = $(this).val();
	if(option == "per-tanggal"){
		$("#per-tanggal-penjualan").show();
		$("#per-bulan-penjualan").hide();
		$("#per-tahun-penjualan").hide();
	}
	else if(option == "per-bulan"){
		$("#per-bulan-penjualan").show();
		$("#per-tanggal-penjualan").hide();
		$("#per-tahun-penjualan").hide();
	}
	else if(option == "per-tahun"){
		$("#per-tahun-penjualan").show();
		$("#per-tanggal-penjualan").hide();
		$("#per-bulan-penjualan").hide();
	}
});

function hide(){
	$("#jenis-barang").hide();
	$("#card-filter").hide();
	$(".button-cetak-daftar-barang").hide();

	$("#per-tanggal").hide();
	$("#per-bulan").hide();
	$("#per-tahun").hide();
	$(".button-cetak-persediaan-barang").hide();

	$("#per-tanggal-penjualan").hide();
	$("#per-bulan-penjualan").hide();
	$("#per-tahun-penjualan").hide();
	$(".button-cetak-penjualan-barang").hide();
}

$("#button-filter-daftar-barang").on('click', function(e){
	var option_rekap = $('#rekap-barang').val();
	if(option_rekap == "semua-barang"){
		const semua = "semua";
		$.ajax({
			type    : 'POST',
			url     : 'https://syahfirabakery.co.id/filter_laporan/semua_barang',
			data    : 'semua=' + semua,
			success : function(response){
			  $(".data-barang").html(response);
			}
		});
		$("#card-filter").show();
		$(".button-cetak-daftar-barang").show();
	}

	else if(option_rekap == "jenis-barang"){
		const id_jenis = $('#level-2-jenis-brg').val();
		$.ajax({
			type    : 'POST',
			url     : 'https://syahfirabakery.co.id/filter_laporan/jenis_barang',
			data    : 'id_jenis=' + id_jenis,
			success : function(response){
			  $(".data-barang").html(response);
			}
		});
		$("#card-filter").show();
		$(".button-cetak-daftar-barang").show();
	}
	else{
		alert("Silahkan pilih Jenis Barang");
	}
});

$(".button-cetak-daftar-barang").on("click",  function(e){
	$(".data-barang").printArea();
});


// PERSEDIAAN BARANG
$("#button-filter-persediaan-barang").on('click', function(e){
	var option_rekap = $('#rekap-persediaan-barang').val();
	if(option_rekap == "per-tanggal"){
		const dr_tgl = $('#dr-tgl-persediaan').val();
		const sm_tgl = $('#sm-tgl-persediaan').val();
		$.ajax({
			type    : 'POST',
			url     : 'https://syahfirabakery.co.id/filter_laporan/per_tanggal/persediaan',
			data    : {dr_tgl : dr_tgl, sm_tgl : sm_tgl},
			success : function(response){
			  $(".data-barang").html(response);
			}
		});
		$("#card-filter").show();
		$(".button-cetak-persediaan-barang").show();
	}
	else if(option_rekap == "per-bulan"){
		const bulan = $('#bulan-persediaan').val();
		const tahun = $('#tahun').val();
		$.ajax({
			type    : 'POST',
			url     : 'https://syahfirabakery.co.id/filter_laporan/per_bulan/persediaan',
			data    : {per_bulan : bulan, per_tahun : tahun},
			success : function(response){
			  $(".data-barang").html(response);
			}
		});

		$("#card-filter").show();
		$(".button-cetak-persediaan-barang").show();
	}
	else if(option_rekap == "per-tahun"){
		const tahun = $('#tahun-persediaan').val();
		$.ajax({
			type    : 'POST',
			url     : 'https://syahfirabakery.co.id/filter_laporan/per_tahun/persediaan',
			data    : {per_tahun : tahun},
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

$(".button-cetak-persediaan-barang").on("click",  function(e){
	$(".data-barang").printArea();
});


//PENJUALAN BARANG
$("#button-filter-penjualan-barang").on('click', function(e){
	var option_rekap = $('#rekap-penjualan-barang').val();
	if(option_rekap == "per-tanggal"){
		const dr_tgl = $('#dr-tgl-penjualan').val();
		const sm_tgl = $('#sm-tgl-penjualan').val();
		$.ajax({
			type    : 'POST',
			url     : 'https://syahfirabakery.co.id/filter_laporan/per_tanggal/penjualan',
			data    : {dr_tgl : dr_tgl, sm_tgl : sm_tgl},
			success : function(response){
			  $(".data-barang").html(response);
			}
		});
		$("#card-filter").show();
		$(".button-cetak-penjualan-barang").show();
	}
	else if(option_rekap == "per-bulan"){
		const bulan = $('#bulan-penjualan').val();
		const tahun = $('#tahun').val();
		$.ajax({
			type    : 'POST',
			url     : 'https://syahfirabakery.co.id/filter_laporan/per_bulan/penjualan',
			data    : {per_bulan : bulan, per_tahun : tahun},
			success : function(response){
			  $(".data-barang").html(response);
			}
		});

		$("#card-filter").show();
		$(".button-cetak-penjualan-barang").show();
	}
	else if(option_rekap == "per-tahun"){
		const tahun = $('#tahun-penjualan').val();
		$.ajax({
			type    : 'POST',
			url     : 'https://syahfirabakery.co.id/filter_laporan/per_tahun/penjualan',
			data    : {per_tahun : tahun},
			success : function(response){
			  $(".data-barang").html(response);
			}
		});

		$("#card-filter").show();
		$(".button-cetak-penjualan-barang").show();
	}
	else{
		alert("Silahkan pilih Jenis Rekap Barang");
	}
});

$(".button-cetak-penjualan-barang").on("click",  function(e){
	$(".data-barang").printArea();
});

// $(".data-barang, #button-cetak-daftar-barang").on("click",  function(e){
// 	// alert('addd');
// 	printJS('#viewer', 'html');
// });



// Rekap Laporan Pembelian Barang
show_rekap();
$('.rekap_pembelian_atk').change(function(){
	var option = $(this).val();
	if(option == "Bulan"){
		$('.pil-bulan').show();
		$('.pil-tanggal').hide();
		$('#form_validation').attr('action', 'https://syahfirabakery.co.id/rekap/rekap_pembelian_atk');
	}
	else if (option == "Tanggal"){
		$('.pil-bulan').hide();
		$('.pil-tanggal').show();
		$('#form_validation').attr('action', 'https://syahfirabakery.co.id/rekap/rekap_pembelian_atk');
	}
	else{
		$('.pil-bulan').hide();
		$('.pil-tanggal').hide();
	}
});


$('.rekap_permintaan_atk').change(function(){
	var option = $(this).val();
	if(option == "Bidang"){
		$('.pil-bidang').show();
		$('.pil-orang').hide();
		$('#form_validation').attr('action', 'https://syahfirabakery.co.id/rekap/rekap_permintaan_atk');
	}
	else if (option == "Orang"){
		$('.pil-bidang').hide();
		$('.pil-orang').show();
		$('#form_validation').attr('action', 'https://syahfirabakery.co.id/rekap/rekap_permintaan_atk');
	}
	else{
		$('.pil-bidang').hide();
		$('.pil-orang').hide();
	}
});

$('.rekap').change(function(){
	var option = $(this).val();
	if(option == "Bulan"){
		$('.pil-bulan').show();
		$('.pil-tanggal').hide();
		$('#form_validation').attr('action', 'https://syahfirabakery.co.id/rekap/rekap_pembelian_barang');
	}
	else if (option == "Tanggal"){
		$('.pil-bulan').hide();
		$('.pil-tanggal').show();
		$('#form_validation').attr('action', 'http://localhost/website/aplikasi-inventaris/rekap/rekap_pembelian_barang');
	}
	else{
		$('.pil-bulan').hide();
		$('.pil-tanggal').hide();
	}
});


$('.rekap_peminjaman_brg').change(function(){
	var option = $(this).val();
	if(option == "Bidang"){
		$('.pil-bidang').show();
		$('.pil-orang').hide();
		$('.pil-bap').hide();
		$('#form_validation').attr('action', 'http://localhost/website/aplikasi-inventaris/rekap/rekap_peminjaman_barang');
	}
	
	else if (option == "Orang"){
		$('.pil-bidang').hide();
		$('.pil-orang').show();
		$('.pil-bap').hide();
		$('#form_validation').attr('action', 'http://localhost/website/aplikasi-inventaris/rekap/rekap_peminjaman_barang');
	}

	else if (option == "Bap"){
		$('.pil-bidang').hide();
		$('.pil-orang').hide();
		$('.pil-bap').show();
		$('#form_validation').attr('action', 'http://localhost/website/aplikasi-inventaris/rekap/rekap_peminjaman_barang');
	}

	else{
		$('.pil-bidang').hide();
		$('.pil-orang').hide();
		$('.pil-bap').hide();
	}
});

function show_rekap(){
	$('.pil-bulan').hide();
	$('.pil-tanggal').hide();
	$('.pil-bidang').hide();
	$('.pil-orang').hide();
	$('.pil-bap').hide();
}


// End Rekap Pembelian Barang



// TRANSAKSI
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

