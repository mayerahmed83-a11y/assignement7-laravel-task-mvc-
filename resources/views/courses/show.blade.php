
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
</head>
<body>

    <h1>Course Details</h1>

    <h3>Title: {{ $course->title }}</h3>

    <p>Description: {{ $course->description }}</p>

    <p>Price: {{ $course->price }}</p>

    <p>Duration: {{ $course->duration }} Hours</p>

    <h2>Registered Students</h2>

    @forelse($course->students as $student)
        <p>
            {{ $student->name }} - {{ $student->email }}
        </p>
    @empty
        <p>No students registered in this course.</p>
    @endforelse

    <br>

    <a href="{{ route('courses.index') }}">Back to Courses</a>

</body>
</html>
