<!DOCTYPE html>
<html lang="en">
<head>
     <title>How To Upload Image Using Ckeditor In Laravel 8 - phpcodingstuff.com</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Laravel 7 Integrate Ckeditor With Example - XpertPhp</h1><br> 
                <form method="post" action="{{ route('post.store') }}" class="form form-horizontal">               
                  @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control"/>
                    </div>  
                    <diV>
                        <label for="Body"></label>
                        <textarea name="deskripsi" id="description" cols="30" rows="10"></textarea>
                    </diV>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary"/>
                    </div> 
                </form>             
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace('summary-ckeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    </script> 
</body>
</html>Langkah 5: