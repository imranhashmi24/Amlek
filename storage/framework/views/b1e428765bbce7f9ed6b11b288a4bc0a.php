<?php $__env->startSection('panel'); ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white"><?php echo app('translator')->get('Total Users'); ?></p>
                            <h4 class="mb-0 text-white"><?php echo e($widget['total_users']); ?></h4>
                        </div>
                        <a href="<?php echo e(route('admin.users.all')); ?>" class="text-white ms-auto widget-icon bg-white-1">
                            <i class="bi bi-people"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white"><?php echo app('translator')->get('Active Users'); ?></p>
                            <h4 class="mb-0 text-white"><?php echo e($widget['verified_users']); ?></h4>
                        </div>
                        <a href="<?php echo e(route('admin.users.active')); ?>" class="text-white ms-auto widget-icon bg-white-1">
                            <i class="bi bi-person-check"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-pink">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white"><?php echo app('translator')->get('Email Unverified Users'); ?></p>
                            <h4 class="mb-0 text-white"><?php echo e($widget['email_unverified_users']); ?></h4>
                        </div>
                        <a href="<?php echo e(route('admin.users.email.unverified')); ?>"
                            class="text-white ms-auto widget-icon bg-white-1">
                            <i class="bi bi-person-exclamation"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-orange">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white"><?php echo app('translator')->get('Mobile Unverified Users'); ?></p>
                            <h4 class="mb-0 text-white"><?php echo e($widget['mobile_unverified_users']); ?></h4>
                        </div>
                        <a href="<?php echo e(route('admin.users.mobile.unverified')); ?>"
                            class="text-white ms-auto widget-icon bg-white-1">
                            <i class="bi bi-person-exclamation"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="border-0 card radius-10 border-start border-success border-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1"><?php echo app('translator')->get('Total Property'); ?></p>
                            <h4 class="mb-0 text-success"><?php echo e($widget['propertyCount']); ?></h4>
                        </div>
                        <div class="text-white ms-auto widget-icon bg-success">
                            <i class="bi bi-bag-check-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="border-0 card radius-10 border-start border-secondary border-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1"><?php echo app('translator')->get('Total Property Request'); ?></p>
                            <h4 class="mb-0 text-secondary"><?php echo e($widget['propertyRequestCount']); ?></h4>
                        </div>
                        <div class="text-white ms-auto widget-icon bg-secondary">
                            <i class="bi bi-bag-check-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="border-0 card radius-10 border-start border-success border-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1"><?php echo app('translator')->get('Total Service Request'); ?></p>
                            <h4 class="mb-0 text-success"><?php echo e($widget['serviceRequestCount']); ?></h4>
                        </div>
                        <div class="text-white ms-auto widget-icon bg-success">
                            <i class="bi bi-bag-check-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="border-0 card radius-10 border-start border-secondary border-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1"><?php echo app('translator')->get('Total Finance'); ?></p>
                            <h4 class="mb-0 text-secondary"> <?php echo e($widget['financeRequestCount']); ?> </h4>
                        </div>
                        <div class="text-white ms-auto widget-icon bg-secondary">
                            <i class="bi bi-bag-check-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-5 row mb-none-30">
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="overflow-hidden card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo app('translator')->get('Login By Browser'); ?> (<?php echo app('translator')->get('Last 30 days'); ?>)</h5>
                    <canvas id="userBrowserChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo app('translator')->get('Login By OS'); ?> (<?php echo app('translator')->get('Last 30 days'); ?>)</h5>
                    <canvas id="userOsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo app('translator')->get('Login By Country'); ?> (<?php echo app('translator')->get('Last 30 days'); ?>)</h5>
                    <canvas id="userCountryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php $__env->startPush('script'); ?>
    
    <script src="<?php echo e(asset('assets/admin/js/chart.js.2.8.0.js')); ?>"></script>

    <script>
        "use strict";






        var ctx = document.getElementById('userBrowserChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($chart['user_browser_counter']->keys(), 15, 512) ?>,
                datasets: [{
                    data: <?php echo e($chart['user_browser_counter']->flatten()); ?>,
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                maintainAspectRatio: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });



        var ctx = document.getElementById('userOsChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($chart['user_os_counter']->keys(), 15, 512) ?>,
                datasets: [{
                    data: <?php echo e($chart['user_os_counter']->flatten()); ?>,
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 0.05)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            },
        });


        // Donut chart
        var ctx = document.getElementById('userCountryChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($chart['user_country_counter']->keys(), 15, 512) ?>,
                datasets: [{
                    data: <?php echo e($chart['user_country_counter']->flatten()); ?>,
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Admin Dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\soudi-project\Amlek\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>