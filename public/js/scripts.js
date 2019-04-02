$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


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

    // $(document).on("click", '#repost_button', function(){
    //     console.log('repost pressed');
    //     $.ajax({
    //         url:url_repost,
    //         type: 'POST',
    //         dataType: 'json',
    //         success: function(data) {
    //             console.log(data);
    //              $('#rating').html(`
    //                 <input type="submit" value="saved" class="btn btn-info" id="unrepost_button" />${data.likes}
    //             `);
    //         },
    //     });
    // });


});





