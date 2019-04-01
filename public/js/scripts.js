$(document).ready(function(){
    fetch_customer_data();
    function fetch_customer_data(query = '')
    {
        console.log(url);
        $.ajax({
            url:url,
            method:'GET',
            data:{ name: query },
            dataType:'json',
            success:function(data)
                {
                    data.map(el => {
                        console.log(el);
                    });
                }
        });
    }


    $(document).on('keyup', '#categories_search', function(){
        var query = $(this).val();
    // Autocomplete
    var flowers = ["Астра", "Нарцисс", "Роза", "Пион", "Примула",
    "Подснежник", "Мак", "Первоцвет", "Петуния", "Фиалка"];
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
                        $('#checkboxes').append('<input type="checkbox" /> ' + selected_tag + '<br />');
                    },

                })
            },
        });

    });

});



