<?php $__env->startSection('content'); ?>
<?php $__env->startSection('Title', 'Dashboard'); ?>
<?php if($message = Session::get('status')): ?>
    <input type="hidden" id="status" value="<?php echo e($message); ?>">
<?php endif; ?>

<section class="content-header">
    <h5 class="text-lg font-semibold dark:text-white-light">Dashboard</h5>
</section>  

<form class="mt-4" id="myForm" action="<?php echo e(route('dashboardFilter')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        <div class="mb-5 flex flex-wrap items-center space-x-4">
                <div class="flex items-center">
                    <label for="fromDate" class="text-md font-medium font-semibold dark:text-white-light mr-2">From Date:</label>
                    <input type="date" id="fromDate" name="FormDate" class="p-2 border border-gray-300 rounded-md w-32 sm:w-52" />
                </div>
                
                <div class="flex items-center">
                    <label for="toDate" class="text-sm font-medium font-semibold dark:text-white-light mr-2">To Date:</label>
                    <input type="date" id="toDate" name="ToDate" class="p-2 border border-gray-300 rounded-md w-32 sm:w-52" />
                </div>
                
                <button type="submit" class="text-white bg-dark rounded-md px-4 py-2">Filter</button>
        
        </div>
</form>

<div class="mb-5 grid grid-cols-1 gap-3 text-white sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

    <!-- Total Gatepass -->
        <div class="panel max-w-md mx-auto bg-gradient-to-r from-blue-500 to-cyan-400 p-6 rounded-lg shadow-lg card"
            data-name="Pending Gatepass">
            <div class="flex">
                <!-- Left Column -->
                <div class="w-2/3">
                    <div class="text-md font-semibold">Total Gatepass</div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"><?php echo e($TotalGatepassCount); ?></div>
                                
                    </div>
                    <div class="mt-5 flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5"
                                d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                            <path
                                d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        Last Week <?php echo e($TotalGatepassCountforlast7days); ?>

                    </div>
                </div>
                <!-- Right Column -->
                <div class="w-1/3">
                    <img src="<?php echo e(asset('assets/images/Approved.png')); ?>" alt="Logo" style="opacity: 0.5;" />
                </div>
            </div>
        </div>


    <!-- Total Exit Gatepass -->

        <div class="panel max-w-md mx-auto bg-gradient-to-r from-violet-500 to-violet-400 p-6 rounded-lg shadow-lg card"
            data-name="Approved Gatepass">
            <div class="flex">
                <!-- Left Column -->
                <div class="w-2/3">
                    <div class="text-md font-semibold">Total Exit Gatepass</div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"><?php echo e($exitcount); ?></div>
                                
                    </div>
                    <div class="mt-5 flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5"
                                d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                            <path
                                d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        Last Week <?php echo e($exitcountforlast7days); ?>

                    </div>
                </div>
                <!-- Right Column -->
                <div class="w-1/3">
                    <img src="<?php echo e(asset('assets/images/Approved.png')); ?>" alt="Logo" style="opacity: 0.5;" />
                </div>
            </div>
        </div>

    <!-- Total Dealay Gatepass -->
      
        <div class="panel max-w-md mx-auto bg-gradient-to-r from-violet-500 to-violet-400 p-6 rounded-lg shadow-lg card"
            data-name="Approved Gatepass">
            <div class="flex">
                <!-- Left Column -->
                <div class="w-2/3">
                    <div class="text-md font-semibold">Total Delaye Gatepass</div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"><?php echo e($GatepassOverStayedVehicle); ?></div>
                                
                    </div>
                    <div class="mt-5 flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5"
                                d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                            <path
                                d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        Last Week <?php echo e($GatepassOverStayedVehicleforlast7days); ?>

                    </div>
                </div>
                <!-- Right Column -->
                <div class="w-1/3">
                    <img src="<?php echo e(asset('assets/images/pending.png')); ?>" alt="Logo" style="opacity: 0.5;" />
                </div>
            </div>
        </div>

        <!-- Total Gatepass -->
        <div class="panel max-w-md mx-auto bg-gradient-to-r from-blue-500 to-cyan-400 p-6 rounded-lg shadow-lg card"
            data-name="Pending Gatepass">
            <div class="flex">
                <!-- Left Column -->
                <div class="w-2/3">
                    <div class="text-md font-semibold">Total Visitor Gatepass</div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"><?php echo e($TotalGatepassVisitorCount); ?></div>
                                
                    </div>
                    <div class="mt-5 flex items-center font-semibold">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5"
                                d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                            <path
                                d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        Last Week <?php echo e($TotalGatepassVisitorforlast7daysCount); ?>

                    </div>
                </div>
                <!-- Right Column -->
                <div class="w-1/3">
                    <img src="<?php echo e(asset('assets/images/Approved.png')); ?>" alt="Logo" style="opacity: 0.5;" />
                </div>
            </div>
        </div>
</div>

<div class="mb-5 grid grid-cols-1 gap-2  sm:grid-cols-2 xl:grid-cols-2">
    <div class="panel">
        <h3 class="mb-2 text-lg"><b>Over Stayed Vehicle</b></h3>
        <table id="myTable" class="table-hover whitespace-nowrap">
            <thead>
                <tr>
                    <th>Gatepass No</th>
                    <th>Gatepass Entry Datetime</th>
                    <th>Gatepass Type</th>
                    <th>Vehicle No</th>
                    <th>Status</th>
                    <th>Gatepass Exit Datetime</th>
                    <!-- <th>QR Code</th> -->
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $gatepasse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gatepasses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>GP<?php echo e(str_pad($gatepasses->id, 2, '0', STR_PAD_LEFT)); ?></td>
                        <td> <?php
                        $dateString = $gatepasses->GatepassEntryTime;
                        $date = new DateTime($dateString);
                        $formattedDate = $date->format('d-m-Y H:i');
                        echo $formattedDate; // Output: 09-07-2024 23:03
                        ?>
                        </td>
                        <td><?php echo e($gatepasses->GatepassType); ?></td>
                        <td><?php echo e($gatepasses->VehicleNo); ?></td>
                        <td>Gatepass <?php echo e($gatepasses->Status); ?></td>
                        <td><?php
                        if ($gatepasses->GatepassExitTime) {
                            $dateString = $gatepasses->GatepassExitTime;
                            $date = new DateTime($dateString);
                            $formattedDate = $date->format('d-m-Y H:i');
                            echo $formattedDate;
                        }
                        // Output: 09-07-2024 23:03
                        ?></td>
                        <!-- <td><?php echo QrCode::size(80)->style('dot')->eye('circle')->color(49, 157, 173)->margin(2)->generate($gatepasses->id); ?></td> -->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="panel">
        <h3 class="mb-2 text-lg"><b>Top Five Vehicle</b></h3>
        <table id="" class="table-hover whitespace-nowrap">
            <thead>
                <tr>
                    <th>Vehicle No</th>
                    <th>Vehicle Type</th>
                    <th>Tranporter</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($vehicle->VehicleNo); ?></td>
                        <td><?php echo e($vehicle->VehicleType); ?></td>
                        <td><?php echo e($vehicle->TransporterName); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<div class="pt-5">
    <div class="mb-5 grid grid-cols-1 gap-2 sm:grid-cols-2 xl:grid-cols-2">
        <div id="timeDiffChart"></div>
        <div id="monthlyTrendChart"></div>
        <div id="visitorTrendChart"></div>
        <div id="vehicleWeightChart"></div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('Script'); ?>

<script>
    const data = <?php echo json_encode($GateinOutTime); ?>;

    const seriesData = data.map(entry => {
        const monthDate = new Date(entry.month + '-01').getTime(); // Set to the first of the month
        return {
            x: monthDate,
            y: entry.total_time // Now total_time is in hours
        };
    });

    const timeDiffOptions = {
        chart: {
            type: 'line',
            height: 350,
            zoom: {
                enabled: false
            }
        },
        series: [{
            name: 'Time (Hours)', // Update the name to reflect hours
            data: seriesData
        }],
        xaxis: {
            type: 'datetime',
            title: {
                text: 'Month'
            },
            labels: {
                formatter: function(value) {
                    return new Date(value).toLocaleString('default', {
                        month: 'short',
                        year: 'numeric'
                    });
                }
            }
        },
        yaxis: {
            title: {
                text: 'Time Difference (hours)' // Update title to reflect hours
            }
        },
        title: {
            text: 'Time Between Gate In and Gate Out',
            align: 'center'
        }
    };

    const timeDiffChart = new ApexCharts(document.querySelector("#timeDiffChart"), timeDiffOptions);
    timeDiffChart.render();

    // Sample data for monthly inward/outward

    var inworddata = <?php echo json_encode($InwordGatepasses); ?>;

    const inwardData = inworddata.map(entry => ({
        month: `${entry.year}-${String(entry.month).padStart(2, '0')}`, // Format month as 'YYYY-MM'
        value: entry.count
    }));

    var outworddata = <?php echo json_encode($OutWordGateapss); ?>;

    const outwardData = outworddata.map(entry => ({
        month: `${entry.year}-${String(entry.month).padStart(2, '0')}`, // Format month as 'YYYY-MM'
        value: entry.count
    }));



    const monthlySeriesData = {
        inward: inwardData.map(entry => ({
            x: new Date(entry.month + '-01').getTime(),
            y: entry.value
        })),
        outward: outwardData.map(entry => ({
            x: new Date(entry.month + '-01').getTime(),
            y: entry.value
        }))
    };

    const monthlyOptions = {
        chart: {
            type: 'line',
            height: 350,
            zoom: {
                enabled: false
            }
        },
        series: [{
                name: 'Inward',
                data: monthlySeriesData.inward
            },
            {
                name: 'Outward',
                data: monthlySeriesData.outward
            }
        ],
        xaxis: {
            type: 'datetime',
            title: {
                text: 'Month'
            },
            labels: {
                formatter: function(value) {
                    return new Date(value).toLocaleString('default', {
                        month: 'short',
                        year: 'numeric'
                    });
                }
            }
        },
        yaxis: {
            title: {
                text: 'Count'
            }
        },
        title: {
            text: 'Monthly Inward/Outward Trend',
            align: 'center'
        }
    };

    const monthlyTrendChart = new ApexCharts(document.querySelector("#monthlyTrendChart"), monthlyOptions);
    monthlyTrendChart.render();

    // Sample data for monthly visitor trend

    var visitordata = <?php echo json_encode($visitorGatepasses); ?>;

    const visitorData = visitordata.map(entry => ({
        month: `${entry.year}-${String(entry.month).padStart(2, '0')}`, // Format month as 'YYYY-MM'
        value: entry.count
    }));

    console.log("visitorData", visitorData)
    const visitorSeriesData = visitorData.map(entry => ({
        x: new Date(entry.month + '-01').getTime(),
        y: entry.value
    }));

    console.log(visitorSeriesData);

    const visitorOptions = {
        chart: {
            type: 'line',
            height: 350,
            zoom: {
                enabled: false
            }
        },
        series: [{
            name: 'Visitors',
            data: visitorSeriesData
        }],
        xaxis: {
            type: 'datetime',
            title: {
                text: 'Month'
            },
            labels: {
                formatter: function(value) {
                    return new Date(value).toLocaleString('default', {
                        month: 'short',
                        year: 'numeric'
                    });
                }
            },
            tickAmount: visitorData.length,
            tooltip: {
                x: {
                    format: 'MMM yyyy'
                }
            }
        },
        yaxis: {
            title: {
                text: 'Number of Visitors'
            }
        },
        title: {
            text: 'Monthly Visitor Trend',
            align: 'center'
        }
    };

    // Render the chart
    const visitorTrendChart = new ApexCharts(document.querySelector("#visitorTrendChart"), visitorOptions);
    visitorTrendChart.render();


    // Sample data for vehicles and their weights
    var vehicleData = <?php echo json_encode($vehicleVsNetWeight); ?>;

    const vehicleWeights = {};

    vehicleData.forEach(entry => {
        if (entry.NetWeight !== null) {
            if (!vehicleWeights[entry.VehicleNo]) {
                vehicleWeights[entry.VehicleNo] = 0;
            }
            vehicleWeights[entry.VehicleNo] += entry.NetWeight;
        }
    });

    // Convert object to array for chart
    const vehicleSeriesData = Object.keys(vehicleWeights).map(vehicleNo => ({
        vehicleNo,
        totalWeight: vehicleWeights[vehicleNo]
    }));

    // Chart options
    const vehicleOptions = {
        chart: {
            type: 'bar',
            height: 350,
            stacked: false,
            zoom: {
                enabled: false
            }
        },
        plotOptions: {
            bar: {
                columnWidth: '40px', // Set the width of the bars
            }
        },
        series: [{
            name: 'Net Weight (kg)',
            data: vehicleSeriesData.map(entry => entry.totalWeight)
        }],
        xaxis: {
            categories: vehicleSeriesData.map(entry => entry.vehicleNo),
            title: {
                text: 'Vehicle Number'
            }
        },
        yaxis: {
            title: {
                text: 'Net Weight (kg)'
            }
        },
        title: {
            text: 'Vehicle Number vs Net Weight',
            align: 'center'
        },
        tooltip: {
            shared: true,
            intersect: false,
        },
        legend: {
            position: 'top'
        }
    };

    // Render the chart
    const vehicleWeightChart = new ApexCharts(document.querySelector("#vehicleWeightChart"), vehicleOptions);
    vehicleWeightChart.render();
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files\Ampps\www\cloud-gatepass\resources\views/home.blade.php ENDPATH**/ ?>