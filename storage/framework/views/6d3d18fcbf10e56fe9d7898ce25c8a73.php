
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
</head>
<body>

    <h1>Course Details</h1>

    <h3>Title: <?php echo e($course->title); ?></h3>

    <p>Description: <?php echo e($course->description); ?></p>

    <p>Price: <?php echo e($course->price); ?></p>

    <p>Duration: <?php echo e($course->duration); ?> Hours</p>

    <h2>Registered Students</h2>

    <?php $__empty_1 = true; $__currentLoopData = $course->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <p>
            <?php echo e($student->name); ?> - <?php echo e($student->email); ?>

        </p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>No students registered in this course.</p>
    <?php endif; ?>

    <br>

    <a href="<?php echo e(route('courses.index')); ?>">Back to Courses</a>

</body>
</html>
<?php /**PATH C:\xampp7\htdocs\training-center\resources\views/courses/show.blade.php ENDPATH**/ ?>