/* Profile photo */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.profilePic').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

/* Datatable Defaults */
$.extend( true, $.fn.dataTable.defaults, {
    "dom": 'B<"clear">lfrtip',
    "responsive": false,
    "paging":   true,
    "searching": true,
    "search": {
        return: false // only after press enter
    },
    "ordering": true,
    "info":     true,
    "stateSave": true,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
    "scrollCollapse": false,
    /*"scrollY":        "50vh",*/
    "scrollX": false,
    "order": [[ 1, 'asc' ]],
    "select": {
        "items": 'row',
        "info": true,
        "style":    ['os','multi'],
        "selector": 'td:first-child'
    },
    "language": {
        "decimal": ",",
        "thousands": ".",
        "lengthMenu": " _MENU_ ",
        "zeroRecords": "Nothing found - sorry",
        "info": "Showing page _PAGE_ of _PAGES_",
        "infoEmpty": "No records available",
        "infoFiltered": "(filtered from _MAX_ total records)",
        /*"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"*/
        select: {
            rows: {
                _: " You have selected %d rows",
                0: " Click a row to select it",
                1: " Only 1 row selected"
            }
        }
    },
    "buttons": [
        {
            extend: 'copyHtml5',
            exportOptions: {
                columns: [ 2,3,4,5,6,7 ]
            }
        },

        {
            extend: 'excelHtml5',
            exportOptions: {
                columns: [ 2,3,4,5,6,7 ]
            }
        },
        {
            extend: 'csvHtml5',
            exportOptions: {
                columns: [ 2,3,4,5,6,7 ]
            }
        },
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: [ 2,3,4,5,6,7 ]
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: [ 2,3,4,5,6,7 ]
            }
        },
        /*{
            extend: 'colvis',
            collectionLayout: 'fixed two-column'
        },
        'selectAll',
        'selectNone',*/
        /*{
            "extend": 'selected',
            "text": 'Count selected rows',
            "action": function ( e, dt, button, config ) {
                alert( dt.rows( { selected: true } ).indexes().length +' row(s) selected' );
            }
        },*/
        /*{
            "text": 'Get selected data',
            "action": function () {
                var count = table.rows( { selected: true } ).count();

                events.prepend( '<div>'+count+' row(s) selected</div>' );
            }
        },*/
        /*'pageLength'*/
    ],
    "columnDefs": [
        {
            "searchable": false,
            "orderable": false,
            "visible": true,
            "className": 'select-checkbox ',
            "targets":   0,
            /*checkboxes: {
                selectRow: true
            }*/
        },
        {
            "searchable": false,
            "orderable": false,
            "visible": true,
            "targets":   1
        },
        {
            "searchable": true,
            "orderable": true,
            "visible": true,
            "type": "html-num",
            "targets": 5 ,
        },
        {
            "searchable": false,
            "orderable": false,
            "visible": true,
            "targets":   7,
        }
    ],
    initComplete: (settings, json)=>{
        $('#DataTables_Table_0_filter').css('display','none')
        $('.dataTables_paginate').insertBefore('.info-pagination');
        $('.dataTables_info').appendTo('.info-pagination').css({
            'position':'absolute',
            'right':'0',
        });
        $('.select-checkbox ').removeClass('').addClass('');
        $('.buttons-copy').removeClass('btn-secondary').addClass('btn-primary');
        $('.buttons-excel').removeClass('btn-secondary').addClass('btn-primary');
        $('.buttons-csv').removeClass('btn-secondary').addClass('btn-primary');
        $('.buttons-pdf').removeClass('btn-secondary').addClass('btn-primary');
        $('.buttons-print').removeClass('btn-secondary').addClass('btn-primary');
        $('.select-datatable-add').append($('#DataTables_Table_0_length'));
        $('.buttons-datatable-add').append($('.dt-buttons'));
        $('#DataTables_Table_0_length select').addClass('custom-select mb-2 mr-sm-2 mb-sm-0').removeClass('custom-select-sm');
    },
    /*"initComplete": function () {
            var api = this.api();
            api.$('td').click( function () {
                api.search( this.innerHTML ).draw();
            } );
        },*/
    /*"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            // Total over all pages
            total = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over this page
            pageTotal = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $( api.column( 7 ).footer() ).html(
                '$'+pageTotal +' ( $'+ total +' total)'
            );
        }*/
    /*"processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php",*/
} );

/* Range Search */
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[5] ) || 0; // use data for the age column

        if ( ( isNaN( min ) && isNaN( max ) ) ||
            ( isNaN( min ) && age <= max ) ||
            ( min <= age   && isNaN( max ) ) ||
            ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);



$(document).ready(function() {

    var events = $('#events');

    /* Datatable */
    var table = $('.datatable-func').DataTable();
    table.on("click", "th.select-checkbox .custom-control-input", function() {
        if ($("th.select-checkbox").hasClass("selected")) {
            table.rows().deselect();
            $("th.select-checkbox").removeClass("selected");
            $('.js-toggle-check-all').removeAttr('checked')
        } else {
            table.rows().select();
            $("th.select-checkbox").addClass("selected");
            $('.js-toggle-check-all').attr('checked','checked')
        }
    }).on("select deselect", function() {
        ("Some selection or deselection going on")
        if (table.rows({
            selected: true
        }).count() !== table.rows().count()) {
            $("th.select-checkbox").removeClass("selected");
            $('.js-toggle-check-all').removeAttr('checked')
        } else {
            $("th.select-checkbox").addClass("selected");
            $('.js-toggle-check-all').removeAttr('checked')
        }
    });
    /* Select on click */
    $('.datatable-func tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        //alert( 'You clicked on '+data[0]+'\'s row' );
        //$(this).toggleClass('selected');
    } );

    /* Delete and count on click */
    $('#button').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
        table.rows('.selected').remove().draw( false );
    } );

    /* First Cell */
    table.on( 'order.dt search.dt', function () {
        table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


    /* Tabs */
    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function () {
        var value = $(this).attr('data-name');
        if (value){
            table.search( value ).draw();
        }else {
            table.search('').draw();
        }
    } );

    // Event listener to the two range filtering inputs to redraw on input
    /*$('#min, #max').keyup( function() {
        table.draw();
    } );*/

    /* Search */
    $('#myInputTextField').keyup(function(){
        table.search($(this).val()).draw() ;
    })

} );

/* Fullscreen */
var elem = document.documentElement;
function openFullscreen() {
    if (elem.requestFullscreen) {
        elem.requestFullscreen();
    } else if (elem.webkitRequestFullscreen) { /* Safari */
        elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { /* IE11 */
        elem.msRequestFullscreen();
    }

    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.webkitExitFullscreen) { /* Safari */
        document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) { /* IE11 */
        document.msExitFullscreen();
    }
}


/* Display */
function display(module) {
    var modules = module+'s';
    $('.'+modules).css('display','block');
    $('.'+module).css('display','none');
    $('input[name="'+module+'_in"]').attr('value',null);
}

/* Invert Display */
function displayInvert(module) {
    var modules = module+'s';
    $('.'+modules).css('display','none');
    $('.'+module).css('display','block');
    $('input[name="'+module+'_in"]').val('full');
}

/* Daily vs Weekly */
function handleClick1() {
    $('.multiple-select').css('display','none');
}

function handleClick2() {
    $('.multiple-select').css('display','block');
}

/* Order type change */
$('a[data-toggle="tab"]').on( 'shown.bs.tab', function () {
    var value = $(this).attr('data-info');
    $('input[name="type"]').val(value);
    if( value == 'Return' || value == 'Cash Collection')
    {
        $('.pickups_card').addClass('hidden');
    }else{
        $('.pickups_card').removeClass('hidden');
    }
} );

$('input[name="collect_cash"]').on('change',function () {
    var value = $(this).val();
    if(value == 'collect cash')
    {
        $('#collect_cash_small').text('Droplin courier shall receive this amount from your customer.')
    }else if(value == 'refund cash'){
        $('#collect_cash_small').text('Droplin courier shall pay this amount to your customer.')
    }
})

$('input[name="with_refund"]').on('change',function () {
    var value = $(this).val();
    if(value == 'with refund')
    {
        $('#refund_amount').attr('disabled',false)
    }else if(value == 'without refund'){
        $('#refund_amount').attr('disabled',true).val('')
    }
})

$('input[name="with_cash_difference"]').on('change',function () {
    var value = $(this).val();
    if(value == 'with cash difference')
    {
        $('#cash_exchange_amount').attr('disabled',false)
    }else if(value == 'without cash difference'){
        $('#cash_exchange_amount').attr('disabled',true).val('')
    }
})

$('input[name="with_cash_collection"]').on('change',function () {
    var value = $(this).val();
    if(value == 'with cash collection')
    {
        $('#cash_on_delivery').attr('disabled',false)
    }else if(value == 'without cash collection'){
        $('#cash_on_delivery').attr('disabled',true).val('')
    }
})

$('input[name="radio_stacked"]').on('change',function () {
    var value = $(this).val();
    if(value == 'parcel')
    {
        $('#allow_open_packages').removeClass('hidden');
        $('#package_description').attr('placeholder','Product code - Color - Size');
        $('#bulky_type').addClass('hidden');
    }else if(value == 'document'){
        $('#allow_open_packages').removeClass('hidden');
        $('#package_description').attr('placeholder','Contract - Credit Card - ATM Card');
        $('#bulky_type').addClass('hidden');
    }else if(value == 'bulky'){
        $('#allow_open_packages').addClass('hidden');
        $('#package_description').attr('placeholder','Microwave, Fan, Carpet, Beanbags, side tables, etc...');
        $('#bulky_type').removeClass('hidden');
    }
})


$('input[name="light_bulky"]').on('change',function () {
    var value = $(this).val();
    if(value == 'light bulky')
    {
        $('#package_description').attr('placeholder','Microwave, Fan, Carpet, Beanbags, side tables, etc...')
    }else if(value == 'heavy bulky'){
        $('#package_description').attr('placeholder','AC, Refrigerator, washing machine, sofa bed, dining table, bedroom, etc...')
    }
})

$('.language-change').on('change',function () {
    var value = $(this).val();
    var action = window.location.protocol + '//' + window.location.host+'/lang/';
    $('#form_change').attr('action',action+value)
})

$('.view_modal').on('click',function () {
    setTimeout(function() {
        $('.modal-backdrop').fadeOut();
        }, 10);
})


var element = $('.floating-chat');
var myStorage = localStorage;

if (!myStorage.getItem('chatID')) {
    myStorage.setItem('chatID', createUUID());
}

setTimeout(function() {
    element.addClass('enter');
}, 100);

element.click(openElement);

function openElement() {
    var messages = element.find('.messages');
    var textInput = element.find('.text-box');
    element.find('>i').hide();
    element.addClass('expand');
    element.find('.chat').addClass('enter');
    var strLength = textInput.val().length * 2;
    textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
    element.off('click', openElement);
    element.find('.header button').click(closeElement);
    element.find('#sendMessage').click(sendNewMessage);
    messages.scrollTop(messages.prop("scrollHeight"));
}

function closeElement() {
    element.find('.chat').removeClass('enter').hide();
    element.find('>i').show();
    element.removeClass('expand');
    element.find('.header button').off('click', closeElement);
    element.find('#sendMessage').off('click', sendNewMessage);
    element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
    setTimeout(function() {
        element.find('.chat').removeClass('enter').show()
        element.click(openElement);
    }, 500);
}

function createUUID() {
    // http://www.ietf.org/rfc/rfc4122.txt
    var s = [];
    var hexDigits = "0123456789abcdef";
    for (var i = 0; i < 36; i++) {
        s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
    }
    s[14] = "4"; // bits 12-15 of the time_hi_and_version field to 0010
    s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1); // bits 6-7 of the clock_seq_hi_and_reserved to 01
    s[8] = s[13] = s[18] = s[23] = "-";

    var uuid = s.join("");
    return uuid;
}

function sendNewMessage() {
    var userInput = $('.text-box');
    var newMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim().replace(/\n/g, '<br>');

    if (!newMessage) return;

    var messagesContainer = $('.messages');

    messagesContainer.append([
        '<li class="self">',
        newMessage,
        '</li>'
    ].join(''));

    // clean out old message
    userInput.html('');
    // focus on input
    userInput.focus();

    messagesContainer.finish().animate({
        scrollTop: messagesContainer.prop("scrollHeight")
    }, 250);
}

function onMetaAndEnter(event) {
    if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
        sendNewMessage();
    }
}
