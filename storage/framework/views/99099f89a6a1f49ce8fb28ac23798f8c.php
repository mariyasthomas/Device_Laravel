<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablet Devices</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color:rgb(21, 4, 97);
            color: white;
        }
        /* Style the content */
        .content {
        background-color: #FFFFFF;
        padding: 10px;
        height: 650px; 
        }

        /* Style the footer */
        .footer {
        background-color: rgb(14, 4, 58);
        padding: 10px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2><center>Tablet Devices</center></h2>

            <table>
                <tr>
                    <th>Model</th>
                    <th>OS Name</th>
                    <th>OS Version</th>
                    <th>Hardware Type</th>
                    <th>Vendor</th>
                    <th>Browser</th>
                </tr>
                <?php $__currentLoopData = $tablets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tablet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($tablet->model); ?></td>
                        <td><?php echo e($tablet->os_name); ?></td>
                        <td><?php echo e($tablet->os_version); ?></td>
                        <td><?php echo e($tablet->primary_hardware_type); ?></td>
                        <td><?php echo e($tablet->vendor); ?></td>
                        <td><?php echo e($tablet->browser_name); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
    </div>
    <div class="footer">
       
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\Project\dev_atlas_project\resources\views/tablets.blade.php ENDPATH**/ ?>