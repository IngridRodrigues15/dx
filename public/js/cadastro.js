$(document).ready(function(){

    $( function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: "-1Y",
            minDate: "-60Y",
            yearRange: "1957:2016"
        });
        $( "#datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy" );

    });

});