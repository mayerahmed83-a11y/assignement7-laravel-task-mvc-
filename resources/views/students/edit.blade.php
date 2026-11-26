
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>

    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Student Name:</label>
        <input type="text" name="name"
               value="{{ old('name', $student->name) }}">
        @error('name')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br><br>

        <label>Email:</label>
        <input type="email" name="email"
               value="{{ old('email', $student->email) }}">
        @error('email')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br><br>

        <label>Phone:</label>
        <input type="text" name="phone"
               value="{{ old('phone', $student->phone) }}">
        @error('phone')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br><br>

        <label>Course:</label>
        <select name="course_id">
            <option value="">Select Course</option>

            @foreach($courses as $course)
                <option value="{{ $course->id }}"
                    {{ old('course_id', $student->course_id) == $course->id ? 'selected' : '' }}>
                    {{ $course->title }}
                </option>
            @endforeach
        </select>

        @error('course_id')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Update Student</button>
    </form>

    <br>

    <a href="{{ route('students.index') }}">Back to Students</a>

</body>
</html>
