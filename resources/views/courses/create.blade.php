<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <h4>Add Course</h4>
        </div>
        <a href="{{route('courses.index')}}" class="btn btn-info mb-3 mt-3">Back</a>
        <form action="{{route('courses.store')}}" method="POST">
            @csrf
            <div class="mt-2">
                <label for="">Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Title">
                @error("title")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-2">
                <label for="">Description:</label>
                <input type="text" name="description" class="form-control" placeholder="Enter Description">
                @error("description")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-2">
                <label for="">Price:</label>
                <input type="text" name="price" class="form-control" placeholder="Enter Price">
                @error("price")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </div>
        </form>

    </div>
</body>

</html>