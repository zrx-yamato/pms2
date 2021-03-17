
$('#content .message.success').fadeIn('slow', function() {
    $(this).delay(3000).fadeOut(2000);
});

if($('.estimates #price').val() != ''){
    var price = $('.estimates #price').val();
    $('.estimates #price').parents('fieldset').find('#test').html(Number(price).toLocaleString() + "円");
}
$('.estimates #price').keyup(function() {
    var price = $(this).val();
    $(this).parents('fieldset').find('#test').html(Number(price).toLocaleString() + "円");
})