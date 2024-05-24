
<?php $__env->startSection("body"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .pagination {
            display: inline-block;
            margin-top: 20px;
        }

        .pagination li {
            display: inline;
            margin-right: 5px;
        }

        .pagination li a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
        }

        .pagination li.active a {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination li a:hover:not(.active) {
            background-color: #ddd;
        }

        .btn {
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
            color: #fff;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.11.3/i18n/en_gb.json"></script>
</head>

<body>


    <div class="mt-5">
        <table class="table table-striped" id="table_id">
            <thead>
                <tr>
                    <th><?php echo e(__('words.id')); ?></th>
                    <th><?php echo e(__('words.name')); ?></th>
                    <th><?php echo e(__('words.email')); ?></th>
                    <th><?php echo e(__('words.status')); ?></th>
                    <th><?php echo e(__('words.action')); ?></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Delete confirmation modal -->
    <div class="modal fade" id="delete-modal-<?php echo e($user->id); ?>" tabindex="-1" role="dialog"
        aria-labelledby="delete-modal-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-modal-label">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="delete-form-<?php echo e($user->id); ?>" method="POST"
                        action="<?php echo e(route('users.delete', $user->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- User data display -->
    <div>
        <?php echo e($user->name); ?>

        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
            data-target="#delete-modal-<?php echo e($user->id); ?>">Delete</button>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- JavaScript code to show the delete confirmation dialog -->
    <script>
        $(document).ready(function() {
        $('button[data-target^="#delete-modal-"]').on('click', function() {
            var target = $(this).data('target');
            $(target).modal();
        });
    });
    </script>

    <?php $__env->startPush("javascript"); ?>
    <script>
        $(function() {
  $('#table_id').DataTable({
    debug: true,
    processing: true,
    serverSide: true,
    order: [
      [0, 'asc']
    ],
    language: {
      url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/en_gb.json'
    },
    ajax: "<?php echo e(route('users.all')); ?>",
    columns: [{
        "data": "id",
      },
      {
        "data": "name",
      },
      {
        "data": "email",
      },
      {
        "data": "status",
      },
      {
        "render": function(data, type, full, meta) {
          return "<button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#delete-modal' onclick='setUserId(" + data + ")'>Delete</button>" + "<button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#edit-modal' onclick='setUserId(" + data + ")'>Edit</button>";
        }
      }
    ]
  });


});
    </script>

</body>

</html>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("dashboard.layouts.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/dashboard/users/index.blade.php ENDPATH**/ ?>