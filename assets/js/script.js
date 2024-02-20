$(document).ready(function () {
	$('#datepicker').datepicker({
		format: "yyyy-mm-dd",
		autoclose: true,
		todayHighlight: true,
	});

	function validasiSaldo(e) {
		let saldo = $('.saldo').val();
		let namaAkun = $('#no_reff').val();

		if (saldo == '') {
			e.preventDefault();
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'Saldo wajib di isi',
			});
		}

		if (namaAkun == '') {
			e.preventDefault();
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'Nama Akun wajib di isi',
			});
		}
	}

	$('#button_jurnal').on('click', function (e) {
		validasiSaldo(e);
	});

	$('#button_akun').on('click', function (e) {
		let noReff = $('#no_reff').val();
		let nama = $('#nama').val();
		let keterangan = $('#keterangan').val();

		if (noReff == '') {
			e.preventDefault();
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'No.Reff wajib di isi',
			});
		} else if (nama == '') {
			e.preventDefault();
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'Nama Reff wajib di isi',
			});
		} else if (keterangan == '') {
			e.preventDefault();
			swal({
				type: 'error',
				title: 'Oops...',
				text: 'Keterangan wajib di isi',
			});
		}
	});

	$('.hapus').on('click', function (e) {
		e.preventDefault();
		let form = $(this).parent();
		console.log(form);
		swal({
			title: 'Apakah data akan di hapus',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus'
		}).then((result) => {
			if (result.value) {
				form.submit();
			} else {
				swal("Aman!", 'Data Tidak Di Hapus', "success");
			}
		})
	});

	$('.tab-nav').eq(0).addClass('active');
	$('.tab-pane').eq(0).addClass('show active');

	$('#no_reff').change(function () {
		let nilai = $(this).val();
		$('#reff').val(nilai);
	});

	$(window).on('load', function () {
		let nilai = $('#no_reff').val();
		$('#reff').val(nilai);
	});

	document.addEventListener('input', function(event) {
		if (event.target.classList.contains('hitung_penjualan')) {
		   calculatepenjualan();
		}
	 });

	 function calculatepenjualan() {
		// Get input values
		var dex = parseInt(document.getElementById('dex').value) || 0;
		var pl2 = parseInt(document.getElementById('pl2').value) || 0;
		var pmax = parseInt(document.getElementById('pmax').value) || 0;
		var tb = parseInt(document.getElementById('tb').value) || 0;
		var pl1 = parseInt(document.getElementById('pl1').value) || 0;
		var pdex = parseInt(document.getElementById('pdex').value) || 0;

		// Calculate penjualan
		var penjualan = dex + pl2 + pmax + tb + pl1 + pdex;

		// Set penjualan to the readonly input
		document.getElementById('penjualan').value = penjualan;
	 }
});
