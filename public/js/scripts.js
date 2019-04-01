$(document).ready(function(){

    $(document).on('keyup', '#categories_search', function(){
        var query = $(this).val();
        let results;
        $.ajax({
            url:url,
            type: 'GET',
            data:{ name: query },
            dataType: 'json',
            success: function(data) {
                let arrayResult = data.map(el => el.name);
                $('#categories_search').autocomplete({
                    source: arrayResult,
                    select: function( event, ui ) {
                        let selected_tag = ui.item.value;
                        $('#checkboxes').append(`<input type="checkbox" id="" name="categories[]" checked/>${selected_tag}<br />`);
                    },
                })
            },
        });

    });

});



