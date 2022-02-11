$(document).ready(function(){

    var user_id = $('#user_id').val();
    // When user click the like button
    $('.like-btn').on('click',function(){
        var answer_id = $(this).data('id');
        $clicked_btn = $(this);
        // For like button we can only like or unlike. no dislike action
        if($clicked_btn.hasClass('fa-thumbs-o-up')){
            action = 'like';
        }else if($clicked_btn.hasClass('fa-thumbs-up')){
            action= 'unlike';
        }
        // alert(user_id);
        $.ajax({
            type:'POST',
            url:'question.php',
            data: {"action":action,"answer_id":answer_id,"user_id":user_id},
            cache: false,
            success:function(data){
                console.log(data)
                var res = JSON.parse(data);
                // console.log('res',data);
                if(action=='like'){
                    $clicked_btn.removeClass('fa-thumbs-o-up');
                    $clicked_btn.addClass('fa-thumbs-up');
                }
                else if(action=='unlike'){
                $clicked_btn.removeClass('fa-thumbs-up');
                $clicked_btn.addClass('fa-thumbs-o-up');
                }
                //display no of like and dislikes
                $clicked_btn.siblings('span.likes').text(res.likes);
                $clicked_btn.siblings('span.dislikes').text(res.dislikes);

                $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');

            },
            error:function(xhr, status, error){
                console.log('errror is: ',error)
            }
        });

    });


    // When user click the dislike button
    $('.dislike-btn').on('click',function(){
        var answer_id = $(this).data('id');
        $clicked_btn = $(this);
        // For like button we can only dislike or undislike. no dislike action
        if($clicked_btn.hasClass('fa-thumbs-o-down')){
            action = 'dislike';
        }else if($clicked_btn.hasClass('fa-thumbs-down')){
            action= 'undislike';
        }
        // alert(user_id);
        $.ajax({
            type:'POST',
            url:'question.php',
            data: {"action":action,"answer_id":answer_id,"user_id":user_id},
            cache: false,
            success:function(data){
                console.log(data)
                var res = JSON.parse(data);
                // console.log('res',data);
                if(action=='dislike'){
                    $clicked_btn.removeClass('fa-thumbs-o-down');
                    $clicked_btn.addClass('fa-thumbs-down');
                }
                else if(action=='undislike'){
                $clicked_btn.removeClass('fa-thumbs-down');
                $clicked_btn.addClass('fa-thumbs-o-down');
                }
                //display no of like and dislikes
                $clicked_btn.siblings('span.likes').text(res.likes);
                $clicked_btn.siblings('span.dislikes').text(res.dislikes);

                $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');

            },
            error:function(xhr, status, error){
                console.log('errror is: ',error)
            }
        });

    });
});