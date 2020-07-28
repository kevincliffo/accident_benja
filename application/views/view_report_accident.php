                    
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Report Accident</h1>
                            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>

                        <div>
                            <?php 
                                echo form_open('main/addaccidenttodb');
                            ?>
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
                                                $area = array('class' => 'form-control',
                                                            'id'=>'area',
                                                            'name'=>'area',
                                                            'type' => 'text',
                                                            'placeholder' => 'Specific Road/Estate...',
                                                            'required' =>'required'
                                                            );

                                                echo form_input($area);                   
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                        <select id="accidentType" name="accidentType" class="form-control" >
                                                <option selected disabled>Select Accident Type</option>
                                                <option value="">Person and Car</option>
                                                <option value="">Person and Bus</option>                                                
                                                <option value="">Person and Truck</option>                                                
                                                <option value="">Person and Bicycle</option>                                                
                                                <option value="">Person and Motorbike</option>                                                
                                                <option value="">Person and Cart</option>                                                                                                
                                                <option value="">Car and Car</option>
                                                <option value="">Car and Bus</option>                                                
                                                <option value="">Car and Truck</option>                                                
                                                <option value="">Car and Bicycle</option>                                                
                                                <option value="">Car and Motorbike</option>                                                
                                                <option value="">Car and Cart</option>                                               
                                                <option value="">Bus and Bus</option>
                                                <option value="">Bus and Truck</option>                                                
                                                <option value="">Bus and Bicycle</option>                                                
                                                <option value="">Bus and Motorbike</option>                                                
                                                <option value="">Bus and Cart</option>
                                                <option value="">Cart and Cart</option>
                                                <option value="">Cart and Bus</option>                                                
                                                <option value="">Cart and Truck</option>                                                
                                                <option value="">Cart and Bicycle</option>                                                
                                                <option value="">Cart and Motorbike</option>                                                
                                                <option value="">Cart and Cart</option>                                               
                                                <option value="">Bicycle and Truck</option>                                                
                                                <option value="">Bicycle and Bicycle</option>                                                
                                                <option value="">Bicycle and Motorbike</option>
                                                <option value="">Truck and Car</option>                                               
                                                <option value="">Truck and Truck</option>
                                                <option value="">Truck and Motorbike</option>
                                                <option value="">Motorbike and Motorbike</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="form-group">
                                <div class="form-row">                                
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <?php
                                                $email = array('class' => 'form-control',
                                                            'id'=>'email',
                                                            'name'=>'email',
                                                            'type' => 'email',
                                                            'placeholder' => 'Email',
                                                            'required' =>'required',
                                                            );

                                                echo form_input($email);                      
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <?php 
                                                $password = array('class' => 'form-control',
                                                            'id'=>'password',
                                                            'name'=>'password',
                                                            'type' => 'text',
                                                            'value' => '',
                                                            'required' =>'required'
                                                            );

                                                echo form_input($password);                      
                                            ?>
                                        </div>
                                    </div>
                                </div>                            
                            </div>                                                   
                            <?php
                                $btn = array('class' => 'btn btn-primary btn-block',
                                            'value' => 'Add Accident',
                                            'name' => 'submit',
                                            'type' => 'submit');
                                echo form_submit($btn);        
                                echo form_close();
                            ?>
                        </div>
                    </div>
                    <!-- /.container-fluid -->