
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
</head>
<body>

    <h1>Add New Course</h1>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <label>Course Title:</label>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br><br>

        <label>Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>
        @error('description')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br><br>

        <label>Price:</label>
        <input type="number" name="price" min="0" step="0.01" value="{{ old('price') }}">
        @error('price')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br><br>

        <label>Duration (Hours):</label>
        <input type="number" name="duration" min="1" value="{{ old('duration') }}">
        @error('duration')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Save Course</button>
    </form>

    <br>

    <a href="{{ route('courses.index') }}">Back to Courses</a>

</body>
</html>
