

<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="panel-header">
            <h4>Paint Jobs In Progress</h4>
        </div>
        <div class="panel-body">
            <table>
                <thead>
                    <tr>
                        <th>Plate No.</th>
                        <th>Current Color</th>
                        <th>Target Color</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tbodyProgress">
                   
                </tbody>
            </table>
        </div>
        
    </div>

    <div class="panel">
        <div class="panel-header">
            Paint Queue
        </div>
        <div class="panel-body">
            <table>
                <thead>
                    <tr>
                        <th>Plate No.</th>
                        <th>Current Color</th>
                        <th>Target Color</th>
                    </tr>
                </thead>
                <tbody id="tbodyQueue">
                    
                </tbody>    
            </table>
        </div>
    </div>

    <div class="panel">
        <div style="background: red; color: white;" class="panel-header">
            <h4 >Shop Performance</h4>
        </div>
        <div class="panel-body">
            <label for="">Total Cars Painted:</label> <span id="carsPainted"></span>
            <br>
            <label for="">BreakDown</label>
            <br>
            <label for="">Blue:</label> <span id="carsPainted_blue"></span>
            <br>
            <label for="">Red:</label> <span id="carsPainted_red"></span>
            <br>
            <label for="">Green:</label> <span id="carsPainted_green"></span>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            setInterval(function(){
                $.ajax({
                    url: '<?php echo e(route("show.paint.job")); ?>',
                    type: 'get',
                    success: function(data){
                        // console.log(data);
                        if(data){
                            const jsonData = JSON.parse(data);
                        
                            // console.log(jsonData);

                            $('#tbodyProgress').html(jsonData.progress);
                            $('#tbodyQueue').html(jsonData.queue);
                        }
                    },
                    error: function(data){
                        console.log(data)
                    }
                })
            },5000);

            setInterval(function(){
                $.ajax({
                    url:'<?php echo e(route("show.shop.performance")); ?>',
                    type: 'get',
                    success: function(data){
                        if(data){
                            const jsonData = JSON.parse(data);
                            // console.log(jsonData.all);
                            $('#carsPainted').html(jsonData.all[0].count_all)
                            $('#carsPainted_red').html(jsonData.red[0].count_red)
                            $('#carsPainted_blue').html(jsonData.blue[0].count_blue)
                            $('#carsPainted_green').html(jsonData.green[0].count_green)

                        }
                    },
                    error: function(data){
                        console.log(data)
                    }
                })

            },5000);
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\systems\paintJobs\resources\views/pages/paintJob.blade.php ENDPATH**/ ?>