$(document).ready(function(){
var d = new Date();
var today = d.getDate()+"-" + (d.getMonth()+1) + "-" +d.getFullYear();
d.setDate(d.getDate() + 24);//отпуск 24 календарных дней
var endDate = d.getDate()+"-" + (d.getMonth()+1) + "-" +d.getFullYear();
var fromDate=today,toDate=endDate;
 $('input[name="daterange"]').daterangepicker({
    opens: 'right',
     minDate:today,
     autoApply:true,
     startDate:today,
     endDate:endDate,
     locale: {format: 'DD-MM-YYYY'}
}, function(start, end, label) {
    fromDate=start.format('DD-MM-YYYY');
    toDate=end.format('DD-MM-YYYY');
});
$(document).on("click","#edit",function(){
    $('input[name="daterange"]').daterangepicker({
    opens: 'right',
     minDate:today,
     autoApply:true,
     startDate:today,
     endDate:endDate,
     locale: {format: 'DD-MM-YYYY'}
}, function(start, end, label) {
    fromDate=start.format('DD-MM-YYYY');
    toDate=end.format('DD-MM-YYYY');
});
   $("#set-holiday").css("display","block");
});
    
$(document).on('click','#send', function(e) {
 $.ajax({
        url: "edit",
        type: "post",
        data:{fromDate:fromDate,toDate:toDate},
        success: function (response) {
            
            $('#edit-holiday').html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           alert('Ошибка...');
        }
    });
});
    
$(document).on('click','#confirm', function(e) {

    var cooperatorId=$(this).attr("data-key");

 $.ajax({
        url: "confirm",
        type: "post",
        data:{cooperatorId:cooperatorId},
        success: function (response) {
            $('#edit-holiday').html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           alert('Ошибка...');
        }
    });
});    
    
});