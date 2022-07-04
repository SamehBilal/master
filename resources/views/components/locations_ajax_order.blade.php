<script>

    /* Exchange */
    $('#country_id_exchange').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.states') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#state_id_exchange').html(data.html).attr('disabled',false);
                $('#city_id_exchange').attr('disabled',true);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

    $('#state_id_exchange').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.cities') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#city_id_exchange').html(data.html).attr('disabled',false);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

    /* Return */
    $('#country_id_return').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.states') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#state_id_return').html(data.html).attr('disabled',false);
                $('#city_id_return').attr('disabled',true);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

    $('#state_id_return').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.cities') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#city_id_return').html(data.html).attr('disabled',false);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

    /* Customer */
    $('#country_id').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.states') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#state_id').html(data.html).attr('disabled',false);
                $('#city_id').attr('disabled',true);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

    $('#state_id').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.cities') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#city_id').html(data.html).attr('disabled',false);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

    /* Pickup */
    $('#country_pickup').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.states') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#state_pickup').html(data.html).attr('disabled',false);
                $('#city_pickup').attr('disabled',true);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

    $('#state_pickup').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.cities') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#city_pickup').html(data.html).attr('disabled',false);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

</script>
