$(document).ready(function() {
    $('.product-form').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function(response) {
                alert('تمت اضافه منتج الي السله');
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});
