                    
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Accidents</h1>
                            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Accidents</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                        $template = array(
                                            'table_open'=> '<table border="0" cellpadding="0" class="table table-bordered">',                                        
                                            'id'=>'dataTable',
                                            'width'=>'100%',
                                            'cellspacing'=>'0'
                                        );
                            
                                        $this->table->set_heading('Id', 'Reported By', 'County', 'Sub-County', 'Location', 'Accident Type', 'Details', 'Accident Date', 'View Details');
                                        foreach ($accidents as $accident)
                                        {                       
                                            $this->table->add_row($accident['Id'], $accident['ReportedBy'], $accident['County'], $accident['SubCounty'], $accident['Location'], $accident['AccidentType'], $accident['Details'], $accident['AccidentDate'], anchor('accidents/viewdetails/'.$accident['Id'], 'Details'));
                                        }
                                        $this->table->add_row('<b>Id</b>', '<b>Reported By</b>', '<b>County</b>', '<b>Sub-County</b>', '<b>Location</b>', '<b>Accident Type</b>', '<b>Accident Date</b>', '<b>Details</b>', '<b>Details</b>');
                                        $this->table->set_template($template);
                                        echo $this->table->generate();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->                        