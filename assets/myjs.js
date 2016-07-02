$('.daftar').click(function (e) {
	e.preventDefault();
	$('#myModal').modal('show');
});

  $('.tambah').click(function (e) {
/*    alert('berhasil');*/
  
    e.preventDefault();
    $('#tambah-kelas').modal('show');
  });

$("#datatable").DataTable();

$("#datatable_pesan").DataTable({
	"order": [[ 2, "desc" ]]
});

$("#datatable_kelas").DataTable({
	"order": [[ 2, "asc" ]],
	dom: 'Bfrtip',
	buttons: [
	{
	    extend: 'excel',
	    exportOptions: {
	    	modifier: {
	    	    page: 'Kode Kelas'
	    	}
	    }
	},
	    'csv', 'pdf', 'print'
	]
});

/* Select2 pada i_username */
$(".i_username").select2();

/* Semua dropdown yang memakai select2 */
$(".select2").select2();

/*$('#datatable').DataTable({
	"paging": true,
	"lengthChange": false,
	"searching": true,
	"ordering": true,
	"info": true,
	"autoWidth": false
});*/

$('.kirim-pesan').click(function (e) {
	e.preventDefault();
	$('.username2').val($(this).attr('username'));
	$('.id_akun').val($(this).attr('id_akun'));
	$('#kirim-pesan').modal('show');
});

$('.lihat_harga').click(function (e) {
	e.preventDefault();
	$('#lihat_harga').modal('show');
});

$('.balas-pesan').click(function (e) {
	$('.username3').val($(this).attr('username3'));
	$('.id_pesan').val($(this).attr('id_pesan'));
	$('#balas-pesan').modal('show');
});

$('.tambah-paket').click(function (e) {
	e.preventDefault();

	$('#tambah-paket').modal('show');
});

$('.tambah-template').click(function (e) {
	e.preventDefault();
	$('.nama_template').val("");
	$('.deskripsi').val("");
	$('#tambah-template').modal('show');
});

$(".gambar2").fileinput({
	allowedFileExtensions: ["jpg", "png", "jpeg", "gif"],
	msgInvalidFileExtension : "Ekstensi dari file '{name}' tidak cocok. Hanya ekstensi '{extensions}' yang dibolehkan",
	showUpload: false
});

$(".gambar3").fileinput({
	allowedFileExtensions: ["jpg", "png", "jpeg", "gif"],
	msgInvalidFileExtension : "Ekstensi dari file '{name}' tidak cocok. Hanya ekstensi '{extensions}' yang dibolehkan",
	showUpload: false,
	minImageWidth: "1024",
	msgImageWidthSmall: 'Panjang gambar minimal {size}px.' 
});

$('.ask').jConfirmAction({
	question : 'Apakah anda yakin untuk menghapusnya?', 
	yesAnswer : "Ya", 
	cancelAnswer : "Tidak"
});

$('.ask-tolak').jConfirmAction({
	question : 'Apakah anda yakin melakukan aksi ini?', 
	yesAnswer : "Ya", 
	cancelAnswer : "Tidak"
});

$(".my-colorpicker2").colorpicker();

$('#tanggal').datetimepicker({
	sideBySide: true,
	format: 'DD-MM-YYYY HH:mm:ss'
});

$(".tambah-soal").click(function(){

	var jumlah_soal = $(this).attr('jumlah-soal');

	jumlah_soal++;
	$(this).attr('jumlah-soal', jumlah_soal);

	$(".jumlah-soal").val(jumlah_soal);

	$(".baris-tambah-soal").before("<div class='row soal"+jumlah_soal+"'><div class='col-md-12'><div class='form-group'><label class='col-sm-1'>No "+jumlah_soal+".</label><div class='col-sm-10'><textarea class='form-control' placeholder='Soal' name='soal[]'></textarea></div><div class='col-sm-1'><select class='form-control' name='kunci[]' placeholder='kunci'><option value='a'>a</option><option value='b'>b</option><option value='c'>c</option><option value='d'>d</option></select></div></div></div><div class='col-sm-6'><div class='form-group'><label class='col-sm-1'>a.</label><div class='col-sm-11'><textarea class='form-control' placeholder='Pilihan a' name='pilihan_a[]'></textarea></div></div><div class='form-group'><label class='col-sm-1'>b.</label><div class='col-sm-11'><textarea class='form-control' placeholder='Pilihan b' name='pilihan_b[]'></textarea></div></div></div><div class='col-sm-6'><div class='form-group'><label class='col-sm-1'>c.</label><div class='col-sm-11'><textarea class='form-control' placeholder='Pilihan c' name='pilihan_c[]'></textarea></div></div><div class='form-group'><label class='col-sm-1'>d.</label><div class='col-sm-11'><textarea class='form-control' placeholder='Pilihan d' name='pilihan_d[]'></textarea></div></div></div></div><br>");

});

$(".kurang-soal").click(function(){

	var jumlah_soal = $('.tambah-soal').attr('jumlah-soal');

	$(".soal" + jumlah_soal + "").remove();

	jumlah_soal--;
	$('.tambah-soal').attr('jumlah-soal', jumlah_soal);

	$(".jumlah-soal").val(jumlah_soal);

});

$('.transparant').click(function(){
	$('#alert').modal('show');
});

$(".image-picker").imagepicker();

$(".scroll").scrollLeft( 300 );