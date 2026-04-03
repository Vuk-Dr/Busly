$(document).ready(function() {
    function updateOrderAndNames() {
        $('.station-row').each(function(index) {
            let orderNumber = index + 1;

            $(this).find('.station-order').text(orderNumber);
            $(this).find('.input-order').val(orderNumber);

            $(this).find('.input-city').attr('name', `stops[${index}][city]`);
            $(this).find('.input-duration').attr('name', `stops[${index}][duration]`);
            $(this).find('.input-order').attr('name', `stops[${index}][order]`);
            $(this).find('.input-price').attr('name', `stops[${index}][price]`);

            $(this).find('.btn-up').prop('disabled', index === 0);
            $(this).find('.input-duration').prop('disabled', index === 0);
            $(this).find('.input-price').prop('disabled', index === 0);
            $(this).find('.btn-down').prop('disabled', index === $('.station-row').length - 1);
            $(this).find('.btn-remove').prop('disabled', index === 0);

            if(index === 0){
                $(this).find('.input-duration').val('').attr('placeholder', '');
                $(this).find('.input-price').val('').attr('placeholder', '');
            }
            else {
                $(this).find('.input-duration').attr('placeholder', 'From previous...');
                $(this).find('.input-price').attr('placeholder', 'From previous...');
            }
        });
    }


    $('#add-station').on('click', function() {
        let $newRow = $('.station-row').first().clone();

        $newRow.find('.input-city').prop('selectedIndex', 0);

        $newRow.find('.is-invalid').removeClass('is-invalid');
        $newRow.find('.invalid-feedback').remove();
        $newRow.find('.input-id').remove();

        $('#stations-container').append($newRow);

        updateOrderAndNames();
    });

    $('#stations-container').on('click', '.btn-remove', function() {
        $(this).closest('.station-row').remove();
        updateOrderAndNames();
    });

    $('#stations-container').on('click', '.btn-up', function() {
        let $row = $(this).closest('.station-row');
        let $prev = $row.prev('.station-row');
        if ($prev.length) {
            $row.insertBefore($prev);
            updateOrderAndNames();
        }
    });

    $('#stations-container').on('click', '.btn-down', function() {
        let $row = $(this).closest('.station-row');
        let $next = $row.next('.station-row');
        if ($next.length) {
            $row.insertAfter($next);
            updateOrderAndNames();
        }
    });

    updateOrderAndNames();
});
