                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Accident Type Report</h1>
                            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>
                        
                        <div>
                            <center><h3>Report Details</h3></center>
                            <input type="hidden" name="filterType" id="filterType" value="AccidentType">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <select class="form-control" title="Accident Type" name="accidentType" id="accidentType" required>
                                                <option value="0" selected disabled>Select Accident Type</option>
                                                <option value="Person">Person</option>
                                                <option value="Motorbike">Motorbike</option>
                                                <option value="Bicycle">Bicycle</option>
                                                <option value="Tuktuk">Tuktuk</option>
                                                <option value="Car">Car</option>
                                                <option value="Truck">Truck</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Cart">Cart</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="printing">
                            <center><h3>Report Details</h3></center>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                        $template = array(
                                            'table_open'=> '<table border="0" id="dataTableReports" cellpadding="0" class="table table-bordered">',                                        
                                            'id'=>'dataTableReports',
                                            'width'=>'100%',
                                            'cellspacing'=>'0'
                                        );
                            
                                        $this->table->set_heading('Id', 'Reported By', 'County', 'Sub-County', 'Location', 'Accident Type', 'Details', 'Accident Date');
                                        // foreach ($accidents as $accident)
                                        // {                       
                                        //     $this->table->add_row($accident['Id'], $accident['ReportedBy'], $accident['County'], $accident['SubCounty'], $accident['Location'], $accident['AccidentType'], $accident['Details'], $accident['AccidentDate'], anchor('accidents/viewdetails/'.$accident['Id'], 'Details'));
                                        // }
                                        $this->table->add_row('<b>Id</b>', '<b>Reported By</b>', '<b>County</b>', '<b>Sub-County</b>', '<b>Location</b>', '<b>Accident Type</b>', '<b>Details</b>', '<b>Accident Date</b>');
                                        $this->table->set_template($template);
                                        echo $this->table->generate();
                                    ?>
                                </div>
                            </div>
                        </div>                                                  
                        <?php
                            $btn = array('class' => 'btn btn-primary btn-block',
                                        'value' => 'Generate Report',
                                        'name' => 'generateReportData',
                                        'id' => 'generateReportData',
                                        'onclick' => "generateReport()",
                                        'type' => 'button');
                            echo form_submit($btn);

                            $btn = array('class' => 'btn btn-primary btn-block',
                                        'value' => 'Print',
                                        'name' => 'print',
                                        'onclick' => "printReport('printing')",
                                        'type' => 'button');
                            echo form_submit($btn);
                        ?>
                    </div>
                    <!-- /.container-fluid -->                           