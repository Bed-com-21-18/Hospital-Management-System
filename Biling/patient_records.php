<?php include('./constant/layout/head.php');?>
<?php include('./constant/layout/header.php');?>

<?php include('./constant/layout/sidebar.php');?>

<!-- Start of Page Wrapper -->
<div class="page-wrapper">
    
    <!-- Page Titles Row -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Patient Records Management</h3> 
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"> Patient Records By Date</li>
            </ol>
        </div>
    </div>
    <!-- End of Page Titles Row -->
    
    <!-- Main Content Container -->
    <div class="container-fluid">
         
        <div class="row">
            <div class="col-lg-8" style="margin-left: 10%;">
                <div class="card">
                    <div class="card-title">
                       
                    </div>
                    <div id="add-brand-messages"></div>
                    <div class="card-body">
                        <div class="input-states">
                           
                            <!-- Form for Generating Patient Record Report -->
                            <form class="form-horizontal" action="php_action/getOrderReport.php" method="post" id="getOrderReportForm">

                                <!-- Start Date Input -->
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Start Date</label>
                                        <div class="col-sm-9">
                                           <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Start Date Input -->

                                <!-- End Date Input -->
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">End Date</label>
                                        <div class="col-sm-9">
                                           <input type="date" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
                                        </div>
                                    </div>
                                </div>
                                <!-- End of End Date Input -->

                                <!-- Generate Report Button -->
                                <button type="submit"  id="generateReportBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Generate Report</button>
                                <!-- End of Generate Report Button -->
                            </form>
                            <!-- End of Form for Generating Patient Record Report -->
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
    <!-- End of Main Content Container -->
</div>
<!-- End of Page Wrapper -->

                
                <script>
    $(document).ready(function() {

        // initialize date picker for start and end dates
        $("#startDate").date();
        $("#endDate").date();

        // handle form submission
        $("#getOrderReportForm").unbind('submit').bind('submit', function() {

            // retrieve start and end dates from form inputs
            var startDate = $("#startDate").val();
            var endDate = $("#endDate").val();

            // validate form inputs
            if(startDate == "" || endDate == "") {
                if(startDate == "") {
                    // add error class and error message for start date input
                    $("#startDate").closest('.form-group').addClass('has-error');
                    $("#startDate").after('<p class="text-danger">The Start Date is required</p>');
                } else {
                    // remove error class and error message for start date input
                    $(".form-group").removeClass('has-error');
                    $(".text-danger").remove();
                }

                if(endDate == "") {
                    // add error class and error message for end date input
                    $("#endDate").closest('.form-group').addClass('has-error');
                    $("#endDate").after('<p class="text-danger">The End Date is required</p>');
                } else {
                    // remove error class and error message for end date input
                    $(".form-group").removeClass('has-error');
                    $(".text-danger").remove();
                }
            } else {
                // remove error classes and error messages from form inputs
                $(".form-group").removeClass('has-error');
                $(".text-danger").remove();

                // submit form data via AJAX
                var form = $(this);

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    dataType: 'date',
                    success:function(response) {
                        // open a new window and print report
                        var mywindow = window.open('', 'Billing System', 'height=400,width=600');
                        mywindow.document.write('<html><head><title>Patient Report Slip</title>');        
                        mywindow.document.write('</head><body>');
                        mywindow.document.write(response);
                        mywindow.document.write('</body></html>');

                        mywindow.document.close(); // necessary for IE >= 10
                        mywindow.focus(); // necessary for IE >= 10

                        mywindow.print();
                        mywindow.close();
                    } // /success
                }); // /ajax

            } // /else

            return false;
        });

    });
</script>
 
<?php include('./constant/layout/footer.php');?>



