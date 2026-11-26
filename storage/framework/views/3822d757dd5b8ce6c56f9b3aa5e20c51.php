
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Center - Courses</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #263449;
        }

        .navbar {
            background: #172b4d;
            color: white;
            padding: 22px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .navbar h2 {
            font-size: 23px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            max-width: 1150px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #172b4d;
            margin-bottom: 8px;
        }

        .header p {
            color: #78869a;
        }

        .add-btn {
            background: #3478f6;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #205dcc;
        }

        .stats {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            flex: 1;
            min-width: 180px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.05);
            border-left: 4px solid #3478f6;
        }

        .stat-card h3 {
            color: #78869a;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .stat-card p {
            font-size: 27px;
            font-weight: bold;
            color: #172b4d;
        }

        .table-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.05);
            overflow-x: auto;
        }

        .table-card h2 {
            margin-bottom: 20px;
            color: #172b4d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            background: #edf3fc;
            color: #172b4d;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #edf0f5;
        }

        tr:hover {
            background: #f8faff;
        }

        .action {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            margin: 2px;
        }

        .view {
            background: #e5efff;
            color: #2364c8;
        }

        .edit {
            background: #fff2d9;
            color: #a66a00;
        }

        .delete {
            background: #ffe7e7;
            color: #d12d2d;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        .message {
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .success {
            background: #e3f7eb;
            color: #168044;
        }

        .error {
            background: #ffe8e8;
            color: #c62828;
        }

        .empty {
            text-align: center;
            padding: 25px;
            color: #78869a;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 18px;
            }

            .container {
                margin: 25px auto;
            }

            .header {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>🎓 Training Center</h2>

        <div>
            <a href="<?php echo e(route('courses.index')); ?>">Courses</a>
            <a href="<?php echo e(route('students.index')); ?>">Students</a>
        </div>
    </div>

    <div class="container">

        <div class="header">
            <div>
                <h1>Courses Management</h1>
                <p>Manage all training courses in one place.</p>
            </div>

            <a href="<?php echo e(route('courses.create')); ?>" class="add-btn">
                + Add New Course
            </a>
        </div>

        <?php if(session('success')): ?>
            <div class="message success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="message error">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <div class="stats">
            <div class="stat-card">
                <h3>Total Courses</h3>
                <p><?php echo e($courses->count()); ?></p>
            </div>

            <div class="stat-card">
                <h3>Total Students</h3>
                <p><?php echo e($courses->sum('students_count')); ?></p>
            </div>
        </div>

        <div class="table-card">

            <h2>All Courses</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Students</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($course->id); ?></td>
                            <td><strong><?php echo e($course->title); ?></strong></td>
                            <td><?php echo e($course->description); ?></td>
                            <td><?php echo e($course->price); ?> EGP</td>
                            <td><?php echo e($course->duration); ?></td>
                            <td><?php echo e($course->students_count); ?></td>

                            <td>
                                <a href="<?php echo e(route('courses.show', $course->id)); ?>"
                                   class="action view">View</a>

                                <a href="<?php echo e(route('courses.edit', $course->id)); ?>"
                                   class="action edit">Edit</a>

                                <form action="<?php echo e(route('courses.destroy', $course->id)); ?>"
                                      method="POST"
                                      style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit"
                                            class="action delete"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="empty">
                                No courses found. Add your first course!
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>

    </div>

</body>
</html>
<?php /**PATH C:\xampp7\htdocs\training-center\resources\views/courses/index.blade.php ENDPATH**/ ?>