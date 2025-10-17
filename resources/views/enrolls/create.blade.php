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
            <h4>Add Enroll</h4>
        </div>
        <a href="{{route('enrolls.index')}}" class="btn btn-info mb-3 mt-3">Back</a>
        <form action="{{route('enrolls.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Course</label>
                <select name="course_id" class="form-control">
                    <option value="">--Select Course--</option>
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{$course->title}}</option>
                    @endforeach
                </select>
                @error("course_id")<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </div>
        </form>

    </div>
</body>

</html>