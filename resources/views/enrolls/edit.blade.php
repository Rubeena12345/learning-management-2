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
            <h4>Edit Enroll</h4>
        </div>
        <a href="{{route('enrolls.index')}}" class="btn btn-info mb-3 mt-3">Back</a>
        <form action="{{route('enrolls.update',$enroll->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">

                <label for="course_id" class="form-label">Enroll</label>
                <select name="course_id" id="course_id" class="form-control" required>
                    <option value="">-- Select course --</option>
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $invoice->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="mt-2">
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </div>
        </form>

    </div>
</body>

</html>