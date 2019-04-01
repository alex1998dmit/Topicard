$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

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


    $(document).on("click", '#unlike_button', function(){
        console.log('unlike is pressed');
        $.ajax({
            url:url_dislike,
            type: 'POST',
            data:{_token: CSRF_TOKEN },
            dataType: 'json',
            success: function(data) {
                 $('#rating').html(`
                    <input type="submit" value="like" class="btn btn-success" id="like_button" />${data.likes}
                `);
                console.log(data);
            },
        });

    });

    $(document).on("click", '#like_button', function(){
        console.log('like pressed');
        $.ajax({
            url:url_like,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                 $('#rating').html(`
                    <input type="submit" value="unlike" class="btn btn-danger" id="unlike_button" />${data.likes}
                `);
            },
        });
    });

});





