<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gutim Template">
    <meta name="keywords" content="Gutim, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sport Coach</title>
    <title>jbj</title>
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container" style="margin-top: 20px">

</div>
<script type="text/javascript">
    var start=0;
    var limit=7;
    var reachedMax=false;
    $(window).scroll(function () {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
            getData();
      }
    });
$(document).ready(function () {
getData();
});
function getData(){
if(reachedMax){
    return;
}
$.ajax({
    url:'/trainee/test',
    method:'post',
    dataType:'text',
    data:{
        '_token':"{{csrf_token()}}",
        getdata:1,
        start:start,
        limit:limit
    },
    success:function (response) {
          if(response=='reachedMax')
              reachedMax=true;
          else{
              start+=limit;
              $('.container').append(response);
          }
    }
});
}
</script>
</body>
</html>
