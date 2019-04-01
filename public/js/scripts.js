$(document).ready(function(){

    $(document).on('keyup', '#categories_search', function(){
        var query = $(this).val();
        let results;
        $.ajax({
            url:url,
            type: 'GET',
            data:{ name: query },
            dataType: 'json',
            delay: 200,
            success: function(data) {
                let arrayResult = data.map(el => el.name);
                if(arrayResult.length) {
                    $('#categories_search').autocomplete({
                        source: arrayResult,
                        select: function( event, ui ) {
                            let selected_tag = ui.item.value;
                            let selected = data.filter(el =>  {return el.name === selected_tag });
                            let selected_id = selected[0].id;
                            console.log(selected_id);
                            $('#checkboxes').append(`<input type="checkbox" id="" name="categories[]" value="${selected_id}" checked/>${selected_tag}<br />`);
                        },
                    })
                }
            },
        });

    });
    // -----------------

    $('#like').click(function() {
        console.log('changed');
    });
});





