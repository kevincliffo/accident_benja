                    
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Accident</h1>
                            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>
                        <?php 
                            echo 'Reported By : '.form_label($accident[0]['ReportedBy']).br(1);
                            echo 'Accident Type : '.form_label($accident[0]['AccidentType']).br(1);
                            echo 'County : '.form_label($accident[0]['County']).br(1);
                            echo 'Sub-County : '.form_label($accident[0]['SubCounty']).br(1);
                        ?>
                        <div>
                            <p>
                                <?php echo $accident[0]['Details']; ?>
                            </p>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Motor Vehicles</h6>
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
                            
                                        $this->table->set_heading('Id', 'Motor Vehicle Type', 'Number Plate', 'Colour');
                                        foreach ($motorvehicles as $motorvehicle)
                                        {                       
                                            $this->table->add_row($motorvehicle['Id'], $motorvehicle['MotorVehicleType'], $motorvehicle['NumberPlate'], $motorvehicle['Color']);
                                        }
                                        $this->table->add_row('<b>Id</b>', '<b>Motor Vehicle Type</b>', '<b>Number Plate</b>', '<b>Colour</b>');
                                        $this->table->set_template($template);
                                        echo $this->table->generate();
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Images</h6>
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
                            
                                        $this->table->set_heading('Id', 'Name', 'Path');
                                        foreach ($images as $image)
                                        {                       
                                            $this->table->add_row($image['Id'], $image['Name'], $image['Path']);
                                        }
                                        $this->table->add_row('<b>Id</b>', '<b>Name</b>', '<b>Path</b>');
                                        $this->table->set_template($template);
                                        echo $this->table->generate();
                                    ?>
                                </div>
                                <?php foreach($images as $image) {?>
                                <div class="gallery">
                                    <a target="_blank" href="<?php echo base_url().$image['Path']; ?>">
                                        <img src="<?php echo base_url().$image['Path']; ?>" alt="Cinque Terre" width="600" height="400">
                                    </a>
                                    <div class="desc"><?php echo $image['Name']; ?></div>                                    
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->                        