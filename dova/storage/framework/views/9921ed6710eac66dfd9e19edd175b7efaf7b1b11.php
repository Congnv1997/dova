<?php $__env->startSection('content'); ?>
    <h2 style="margin-left: 50px;">Task</h2>
    <div class="card">
        <!-- /.card-header -->
        <?php
        $message = Session::get('message');
        if ($message){
            echo'<span class="text-alert">',$message,'</span>' ;
            Session::put('message',null);
        }

        ?>


        <div class="card-body">
            <table class="table table-bordered table-hover" id="table">
                <thead>
                <th>STT</th>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Trạng thái</th>
                <th>Màu</th>
                <th>
                    <a href="" class="btn btn-sm btn-success">Thêm</a>
                </th>
                </thead>
                <tbody>
                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $M =>$Objrow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($M+1); ?></td>
                        <td><?php echo e($Objrow->id); ?></td>
                        <td><?php echo e($Objrow->title); ?></td>
                        <td><?php echo e($Objrow->content); ?></td>
                        <td><?php echo e($Objrow->time_start); ?></td>
                        <td><?php echo e($Objrow->time_end); ?></td>
                        <td><?php echo e($Objrow->status); ?></td>
                        <td><?php echo e($Objrow->color); ?></td>
                        <td><span class="text-elly">
                     

                      </span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>


















<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>