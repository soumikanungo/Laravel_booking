<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <!-- bootstrap link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- ajax link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- jQuery link starts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
  <!-- jQuery link ends -->
  
    <title>Business</title>
  </head>
<body>
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2><u>Add Client</u></h2>
        </div>
    </div>
</div>

<style>
.error{
color:red;
}
.valid{
border-color:green;
}</style>


 <form id="myForm">
    @csrf
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control error" placeholder="name"  id="name" >
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" class="form-control error" placeholder="email" id="email" >
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Image:</label>
                <input type="file" name="image" class="form-control" id="image">
                
            </div>
        </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>IP_Address:</label>
                <input type="text" name="ip" class="form-control" id="ip" >
                
            </div></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Deadline:</label>
                <input type="text" name="deadline" class="form-control" id="deadline" >
                
            </div></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div  class="captcha">
                    <span>{!!captcha_img()!!}</span>
                    <button type="button" class="btn btn-info" id="reload">
                        &#x21bb;
                    </button> 
                </div></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Enter Captcha:</label>
                <input type="text" name="captcha" class="form-control" id="captcha" >
                
            </div></div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <input type="submit" value="Add" id="submit">
    </div>
    <span id="output"></span>  
 </form>
</div>
 <script>
    $(document).ready(function(){
        $("#myForm").submit(function(event){
            event.preventDefault();
            var form =$("#myForm")[0];
            var data =new FormData(form);
            $("#submit").prop("disabled",true);
            $.ajax({
                type:"POST",
                url:"{{ route('addClients') }}",
                data:data,
                processData:false,
                contentType:false,
                success:function(data){
                  //alert(data.res)
                  $("#output").text(data.res).css("color", "green");
                  $("#submit").prop("disabled",false);
                  $("input[type='text']").val('');
                  $("input[type='email']").val('');
                  $("input[type='file']").val('');
                  $("input[type='text']").val('');
                  $("input[type='text']").val('');
                 
                },
                error:function(e){
                  //console.log(e.responseText)
                  //$("#output").text(e.responseText);
                  $("#submit").prop("disabled",false);
                  $("input[type='text']").val('');
                  $("input[type='email']").val('');
                  $("input[type='file']").val('');
                  $("input[type='text']").val('');
                  $("input[type='text']").val('');
                  
                },
            });
        });
    });
</script>
<!-- <script>
    $('#reload').click(function(){
        $.ajax({
            url:{{route('captcha')}},
            type:"GET",
            success:function(data){
                $(".captcha span").html(data.captcha)
            },
        });
    });
</script> -->
<script>jQuery(function ($) {

$('#myForm').validate({

    rules: { 

            name: {
            required:true,
            letterswithbasicpunc:true,
            minlength:2,
            maxlength:50
        },

            email: {
                required:true,
                email:true
            },

            image:{
                required:true,
            },
            ip:{
                required:true,
            },
            deadline:{
                required:true,
               
            },
        
        },				

    messages:{ 

        name: {	
                    required:'Please Enter name',
                    letterswithbasicpunc:'Please Enter a valid name',
                    minlength:'minimum length is 2',
                    maxlength:'maximum length is 50'
                  },

        email: {
            required:'Please Enter email',
            email:'Please enter a valid email',
        },

        image:{
            required:'Please upload your image!'
        },

        ip:{
            required:'Please Provide the ip address'
        },
        deadline:{
                required:'Please fill up this field'
               
            },
        },
    });

});

</script>


</body>
</html>
