<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel | Home Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body{
            padding: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3>Post List</h3>
                <a href="{{route('posts.create')}}">
                <!-- url('posts/create') -->
                    <button class="btn btn-primary btn-sm float-right">
                        <i class="fa-solid fa-square-plus"></i>
                    </button>
                </a><br>
                <hr>
                @if(session('alertSuccess'))
                <div class="alert alert-success alert-dismissible show fade">
                    <strong>{{session('alertSuccess')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <table class="table table-bordered table-striped ">
                    <tr class="bg-dark ">
                        <th class="text-white">ID</th>
                        <th class="text-white">Title</th>
                        <th class="text-white">Content</th>
                        <th class="text-white">Action</th>
                    </tr>
                    @foreach($data as $dd)
                        <tr>
                            <td>{{$dd->id}}</td>
                            <td>{{$dd->title}}</td>
                            <td>{{$dd->content}}</td>
                            <td>                                
                                <form action="{{url('posts/'.$dd->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('posts.edit',$dd->id)}}" type="button" class="btn btn-success btn-sm">
                                    <!-- url('posts/'.$dd->id.'/edit') -->
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button type="submit" onclick="return confirm('Are you sure want to delete?');" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center">
                    {!! $data->links() !!}
                </div>
            </div>
            <div class="col-md-2"></div>
        </div> 
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>