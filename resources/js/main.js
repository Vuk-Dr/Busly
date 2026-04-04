import {createIcons, icons} from "lucide";

$(document).ready(function() {
    createIcons({
        icons : icons,
    });
    $('.select-ajax-city').each(function () {

        let ajaxUrl = $(this).data('url');

        $(this).select2({
            theme: 'bootstrap-5',

            placeholder: "Search for a station...",
            minimumInputLength: 3,
            ajax: {
                url: ajaxUrl,
                dataType: 'json',
                delay: 400,
                data: function (params) {
                    return {
                        keyword: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        })
    });

    $('#newsletterButton').click(function (){
       let email = $('#newsletterEmail').val();
       $.ajax({
           url : '/newsletter/subscribe',
           type : 'POST',
           data : {
               email : email
           },
           headers : {
               'X-CSRF-TOKEN' : $('input[name="_token"]').val()
           },
           success : function(response){
               toastr.success(response.message);
           },
           error : function (xhr){
               let errorMessage = xhr.responseJSON.message;
               toastr.error('Error: ' + errorMessage);
           }
        });
    });

});
