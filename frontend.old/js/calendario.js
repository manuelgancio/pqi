//CALENDARIO//
$(document).ready(function() {
    $('#embeddingDatePicker')
        .datepicker({
            format: 'yyyy-mm-dd',
            language: 'es'
        })
        .on('changeDate', function(e) {
            // Set the value for the date input
            $("#selectedDate").val($("#embeddingDatePicker").datepicker('getFormattedDate'));

        });
});

//FIN CALENDARIO 