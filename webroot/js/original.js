//Flashメッセージ表示後非表示にするアニメーション
$('#content .message.success').fadeIn('slow', function() {
    $(this).delay(3000).fadeOut(2000);
})

//見積もりページ、金額入力後にカンマ区切りの金額表示
if($('.estimates #price').val() != ''){
    var price = $('.estimates #price').val();
    $('.estimates #price').parents('fieldset').find('#test').html(Number(price).toLocaleString() + "円");
}
$('.estimates #price').keyup(function() {
    var price = $(this).val();
    $(this).parents('fieldset').find('#test').html(Number(price).toLocaleString() + "円");
})

//見積もりページセレクトボックス変更時にsubmit
$('#select_status').change(function(){
    $('#status').submit();
})

//見積もり月別合計の計算
var sum_January = 0; var predicted_January = 0;
var sum_February = 0; var predicted_February = 0;
var sum_March = 0; var predicted_March = 0;
var sum_April = 0; var predicted_April = 0;
var sum_May = 0; var predicted_May = 0;
var sum_June = 0; var predicted_June = 0;
var sum_July = 0; var predicted_July = 0;
var sum_August = 0; var predicted_August = 0;
var sum_September = 0; var predicted_September = 0;
var sum_October = 0; var predicted_October = 0;
var sum_November = 0; var predicted_November = 0;
var sum_December = 0; var predicted_December = 0;
var sum_Predicted = 0; var predicted_Month = 0;

var s = $('#select_status').val();
if( s == 1 || s == 2 || s == 3 || s == 5 || s == 6){
    $('.chart-bar').hide();
} else {
    $('.chart-bar').show();
}
$('.status_area').each(function(){
    switch($(this).data('status-id')){
        case 4:
            $(this).parent().addClass('done');

            //月別に集計処理
            $get_price = $(this).parent().find('.price').data('price');
            switch($(this).parent().find('.estimat_month').data('month')){
                case 0: predicted_Month += $get_price; break;
                case 1: predicted_January += $get_price; break;
                case 2: predicted_February += $get_price; break;
                case 3: predicted_March += $get_price; break;
                case 4: predicted_April += $get_price; break;
                case 5: predicted_May += $get_price; break;
                case 6: predicted_June += $get_price; break;
                case 7: predicted_July += $get_price; break;
                case 8: predicted_August += $get_price; break;
                case 9: predicted_September += $get_price; break;
                case 10: predicted_October += $get_price; break;
                case 11: predicted_November += $get_price; break;
                case 12: predicted_December += $get_price; break;
            }
            break;
        case 7:
            $(this).parent().addClass('billed');

            //月別に集計処理
            $get_price = $(this).parent().find('.price').data('price');
            switch($(this).parent().find('.estimat_month').data('month')){
                case 0: sum_Predicted += $get_price; break;
                case 1: sum_January += $get_price; break;
                case 2: sum_February += $get_price; break;
                case 3: sum_March += $get_price; break;
                case 4: sum_April += $get_price; break;
                case 5: sum_May += $get_price; break;
                case 6: sum_June += $get_price; break;
                case 7: sum_July += $get_price; break;
                case 8: sum_August += $get_price; break;
                case 9: sum_September += $get_price; break;
                case 10: sum_October += $get_price; break;
                case 11: sum_November += $get_price; break;
                case 12: sum_December += $get_price; break;
            }
            break;
    }
})
