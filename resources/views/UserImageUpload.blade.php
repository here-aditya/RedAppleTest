<html lang="en">
<head>
  <title>Laravel 7 Multiple File Upload Demo</title>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <div class="container lst">
        <h3 class="well">Laravel 7 Multiple File Upload</h3>
        
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{url('fileupload')}}" enctype="multipart/form-data">
            {{csrf_field()}}

            <div style="border:1px solid black; padding: 10px;" class="row">
                <div class="col-md-12" style="margin-top:10px">
                    <label>User Name : <input type="text" name="username" class="myfrm form-control"></label>
                </div>

                <div class="col-md-12" style="margin-top:10px">
                    <div class="input-group hdtuto control-group increment col-md-4" style="margin-top:10px">
                        <div class="input-group-btn"> 
                            <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                        </div>
                    </div>

                    <div class="clone hide">
                        <div class="hdtuto control-group input-group col-md-4" style="margin-top:10px">
                            <input type="file" name="filenames[]" class="myfrm form-control" multiple accept='image/*'>
                            <div class="input-group-btn"> 
                            <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info" style="margin-top:10px">Submit</button>
                </div>
            </div>
            
        </form>        
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
        $(".btn-success").click(function(){ 
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });

        $("body").on("click",".btn-danger",function(){ 
            $(this).parents('.hdtuto').remove();
            //$(this).parents(".hdtuto control-group lst").remove();
        });

        $(".btn-success").click();
    });
    </script>
</body>
</html>