                    
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="container-fluid">
                            <?php
                                if($this->session->flashdata('message_no') == 1)
                                {
                            ?>
                            <div class = "alert alert-warning alert-dismissable" role="alert">
                                <button class="close" data-dismiss="alert">
                                    <small><sup>x</sup></small>
                                </button>
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                            <br>
                            <?php
                                }
                            ?> 
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Report Accident</h1>
                            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>

                        <div>
                            <?php 
                                echo form_open_multipart('accidents/addaccidenttodb');
                            ?>
                            <input type="hidden" name="motorvehicletypes" id="motorvehicletypes">
                            <input type="hidden" name="colours" id="colours">
                            <input type="hidden" name="numberplates" id="numberplates">

                            <center><h3>Accident Details</h3></center>                           
                            <div class="form-group">
                                <div class="form-row">                                
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <select id="county" name="county" class="form-control" >
                                                <option selected disabled>Select County</option>
                                                <?php 
                                                    foreach($counties as $county)
                                                    {
                                                        echo '<option value='.$county['County']. '>'.$county['County'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <?php 
                                                $subCounty = array('class' => 'form-control',
                                                            'id'=>'subCounty',
                                                            'name'=>'subCounty',
                                                            'type' => 'text',
                                                            'placeholder' => 'Enter Sub County...',
                                                            'required' =>'required'
                                                            );

                                                echo form_input($subCounty);                     
                                            ?>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="form-group">
                                <div class="form-row">                                
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <?php
                                                $location = array('class' => 'form-control',
                                                            'id'=>'location',
                                                            'name'=>'location',
                                                            'type' => 'text',
                                                            'placeholder' => 'Location...',
                                                            'required' =>'required'
                                                            );

                                                echo form_input($location);                   
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <select id="accidentType" name="accidentType" class="form-control">
                                                <option selected disabled>Select Accident Type</option>
                                                <option value="Person and Car">Person and Car</option>
                                                <option value="Person and Bus">Person and Bus</option>
                                                <option value="Person and Truck">Person and Truck</option>
                                                <option value="Person and Bicycle">Person and Bicycle</option>
                                                <option value="Person and Motorbike">Person and Motorbike</option>
                                                <option value="Person and Cart">Person and Cart</option>
                                                <option value="Car and Car">Car and Car</option>
                                                <option value="Car and Bus">Car and Bus</option>
                                                <option value="Car and Truck">Car and Truck</option>
                                                <option value="Car and Bicycle">Car and Bicycle</option>
                                                <option value="Car and Motorbike">Car and Motorbike</option>
                                                <option value="Car and Cart">Car and Cart</option>
                                                <option value="Bus and Bus">Bus and Bus</option>
                                                <option value="Bus and Truck">Bus and Truck</option>
                                                <option value="Bus and Bicycle">Bus and Bicycle</option>
                                                <option value="Bus and Motorbike">Bus and Motorbike</option>
                                                <option value="Bus and Cart">Bus and Cart</option>
                                                <option value="Cart and Cart">Cart and Cart</option>
                                                <option value="Cart and Bus">Cart and Bus</option>
                                                <option value="Cart and Truck">Cart and Truck</option>
                                                <option value="Cart and Bicycle">Cart and Bicycle</option>
                                                <option value="Cart and Motorbike">Cart and Motorbike</option>
                                                <option value="Cart and Cart">Cart and Cart</option>
                                                <option value="Bicycle and Truck">Bicycle and Truck</option>
                                                <option value="Bicycle and Bicycle">Bicycle and Bicycle</option>
                                                <option value="Bicycle and Motorbike">Bicycle and Motorbike</option>
                                                <option value="Truck and Car">Truck and Car</option>
                                                <option value="Truck and Truck">Truck and Truck</option>
                                                <option value="Truck and Motorbike">Truck and Motorbike</option>
                                                <option value="Motorbike and Motorbike">Motorbike and Motorbike</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Motor Vehicles</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                            $template = array(
                                                'table_open'=> '<table border="0" id="dataTableCars" cellpadding="0" class="table table-bordered">',                                        
                                                'id'=>'dataTableCars',
                                                'width'=>'100%',
                                                'cellspacing'=>'0'
                                            );

                                            $this->table->set_heading('Id','Motor Vehicle Type', 'Colour', 'Number Plate', 'Add');
                                            $select = array('Car' => 'car',
                                                            'Tuktuk' => 'Tuktuk',
                                                            'Truck' => 'Truck',
                                                            'Bus' =>'Bus',
                                                            'Motor Bike' => 'Motor Bike');
                                            
                                            $dropdown = '<select id="carType_1" name="carType_1" class="form-control" onChange="hello(`carType_1`)">'.
                                                        '   <option selected disabled>Select Motor Vehicle Type</option>'.
                                                        '   <option value="Car">Car</option>'.
                                                        '   <option value="Tuktuk">Tuktuk</option>'.
                                                        '   <option value="Truck">Truck</option>'.
                                                        '   <option value="Bus">Bus</option>'.
                                                        '   <option value="Motor Bike">Motor Bike</option>'.
                                                        '</select>';

                                            $color = array('class' => 'form-control',
                                                            'id'=>'colour_1',
                                                            'name'=>'colour_1',
                                                            'type' => 'text',
                                                            'placeholder' => 'Colour',
                                                            'required' =>'required'
                                                            );

                                            $numberPlate = array('class' => 'form-control',
                                                            'id'=>'numberPlate_1',
                                                            'name'=>'numberPlate_1',
                                                            'type' => 'text',
                                                            'placeholder' => 'Number Plate',
                                                            'required' =>'required'
                                                            );

                                            $btn = array('class' => 'btn btn-primary btn-block',
                                                        'value' => 'Add',
                                                        'name' => 'add_row',
                                                        'id' =>'add_row',
                                                        'type' => 'submit');
                                            $btn_add = '<button type="button" onClick="add_new_row()" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button>';
                                            $this->table->add_row('1', $dropdown, form_input($color), form_input($numberPlate), $btn_add);
                                            $this->table->set_template($template);
                                            echo $this->table->generate();
                                        ?>
                                    </div>
                                    <button type="button" onClick="enableReportAccidentButton()" id="add_row" class="btn btn-default">Update</i></button>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <div class="form-row">                                
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <?php
                                                $details = array('class' => 'form-control',
                                                            'id'=>'details',
                                                            'name'=>'details',
                                                            'type' => 'textarea',
                                                            'placeholder' => 'Details',
                                                            'required' =>'required',
                                                            'rows' => 3,
                                                            'cols' => 15
                                                            );
                                                echo form_textarea($details);                      
                                            ?>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="form-group">
                                <div class="form-row">                                
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <?php
                                                $file = array('class' => 'form-control',
                                                            'id'=>'files[]',
                                                            'name'=>'files[]',
                                                            'type' => 'file',
                                                            'placeholder' => 'Email',
                                                            'required' =>'required',
                                                            'multiple' => TRUE
                                                            );

                                                echo form_input($file);                      
                                            ?>
                                        </div>
                                    </div>
                                </div>                            
                            </div>                                                   
                            <?php
                                $btn = array('class' => 'btn btn-primary btn-block',
                                            'value' => 'Report Accident',
                                            'name' => 'submit',
                                            'id'=>'submit',
                                            'disabled'=> 'disabled',
                                            'type' => 'submit');
                                echo form_submit($btn);        
                                echo form_close();
                            ?>
                        </div>
                    </div>
                    <!-- /.container-fluid -->