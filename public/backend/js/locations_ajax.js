$('.select05').on('change',function () {
    var id = $(this).val();
    $.ajax({
        url: 'http://localhost:8000/dashboard/location-states',
        method: 'GET',
        dataType: 'json',
        data:{
            id:id
        },
        success:function(data){
            $('.select01').html(data.html).attr('disabled',false);
            $('.select03').attr('disabled',true);
        },
        error:function () {
            alert('something went wrong');
        }
    });
})

$('.select01').on('change',function () {
    var id = $(this).val();
    $.ajax({
        url: 'http://localhost:8000/dashboard/location-cities',
        method: 'GET',
        dataType: 'json',
        data:{
            id:id
        },
        success:function(data){
            $('.select03').html(data.html).attr('disabled',false);
        },
        error:function () {
            alert('something went wrong');
        }
    });
})
