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
                $('#sweet_state_exchange').val(data.state);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

    $('#city_id_exchange').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.cities.names') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#sweet_city_exchange').val(data.city);
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
                $('#sweet_state_return').val(data.state);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

    $('#city_id_return').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.cities.names') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#sweet_city_return').val(data.city);
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
                $('#sweet_state').val(data.state);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

    $('#city_id').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.cities.names') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#sweet_city').val(data.city);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

    /* Pickup Location in Orders */
    $('#pickup_country_id').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.states') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#pickup_state_id').html(data.html).attr('disabled',false);
                $('#pickup_city_id').attr('disabled',true);
            },
            error:function () {
                alert('something went wrong');
            }
        });
    })

    /* Pickup Location in Orders */
    $('#pickup_state_id').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url: '{{ route('dashboard.locations.cities') }}',
            method: 'GET',
            dataType: 'json',
            data:{
                id:id
            },
            success:function(data){
                $('#pickup_city_id').html(data.html).attr('disabled',false);
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


    $('#client_id').on('change',function () {
        var id = $(this).val();
        $.ajax({
            url:'{{ route('dashboard.get.customer') }}',
            method:'GET',
            dataType: 'json',
            data: {
                id:id,
            },
            success:function (data) {
                $('#sweet_customer').val(data.name);
            },
            error: function(result) {
                //
            }
        });
     })

     $('#location_id').on('change',function(){
        var id = $(this).val();
        $.ajax({
            url:'{{ route('dashboard.get.location') }}',
            method:'GET',
            dataType: 'json',
            data: {
                id:id,
            },
            success:function (data) {
                $('#sweet_state').val(data.state);
                $('#sweet_city').val(data.city);
                $('#sweet_apartment').val(data.apartment);
                $('#sweet_floor').val(data.floor);
                $('#sweet_building').val(data.building);
                $('#sweet_street').val(data.street);
            },
            error: function(result) {
                //
            }
        });
     })

     $('#return_location_exchange').on('change',function(){
        var id = $(this).val();
        $.ajax({
            url:'{{ route('dashboard.get.location') }}',
            method:'GET',
            dataType: 'json',
            data: {
                id:id,
            },
            success:function (data) {
                $('#sweet_state_exchange').val(data.state);
                $('#sweet_city_exchange').val(data.city);
                $('#sweet_apartment_exchange').val(data.apartment);
                $('#sweet_floor_exchange').val(data.floor);
                $('#sweet_building_exchange').val(data.building);
                $('#sweet_street_exchange').val(data.street);
            },
            error: function(result) {
                //
            }
        });
     })

     $('#return_location').on('change',function(){
        var id = $(this).val();
        $.ajax({
            url:'{{ route('dashboard.get.location') }}',
            method:'GET',
            dataType: 'json',
            data: {
                id:id,
            },
            success:function (data) {
                $('#sweet_state_return').val(data.state);
                $('#sweet_city_return').val(data.city);
                $('#sweet_apartment_return').val(data.apartment);
                $('#sweet_floor_return').val(data.floor);
                $('#sweet_building_return').val(data.building);
                $('#sweet_street_return').val(data.street);
            },
            error: function(result) {
                //
            }
        });
     })

</script>
