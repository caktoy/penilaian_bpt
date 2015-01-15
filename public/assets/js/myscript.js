$(function() {
	$(".datepicker").datepicker({
		dateFormat: "dd MM yy"
	});
});

$(document).ready(function() {
    $('#example').dataTable({
        "ordering": false,
        "pagingType": "full_numbers",
    	"language": {
            "lengthMenu": "Menampilkan _MENU_ data per halaman",
            "zeroRecords": "Maaf, tidak ada data yang bisa ditampilkan.",
            "info": "Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data yang tersedia",
            "search": "Cari:",
            "decimal": ",",
            "thousands": ".",
            "paginate": {
                "previous": "<",
                "next": ">",
                "first": "<<",
                "last": ">>"
            },
            "infoFiltered": "(Penyaringan dari _MAX_ total data)"
        }
    });
} );