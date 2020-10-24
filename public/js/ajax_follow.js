
$(document).on('click','#follow',function(e){
    e.preventDefault();
    var x= $(this).attr('idpr');
    $.ajax({

        type: 'post',
        url:"/trainee/follow",
        data:{
            '_token':"{{csrf_token()}}",
            'id':x

        },
        success:function(data){
            $('#unfollow').show();
            $('#follow').hide()

        }


    });
});
$(document).on('click','#unfollow',function(e){
    e.preventDefault();
    var x= $(this).attr('idpr');
    $.ajax({

        type: 'post',
        url:"/trainee/unfollow",
        data:{
            '_token':"{{csrf_token()}}",
            'id':x

        },
        success:function(data){
            $('#follow').show();
            $('#unfollow').hide();
        }

    });
});
