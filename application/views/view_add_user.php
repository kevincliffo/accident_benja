                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Users</h1>
                            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>

                        <div>
                            <?php 
                                echo form_open('main/addusertodb');
                            ?>
                            <center><h3>User Details</h3></center>
                            <div class="form-group">
                                <div class="form-row">                                
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <?php
                                                $firstName = array('class' => 'form-control',
                                                            'id'=>'firstName',
                                                            'name'=>'firstName',
                                                            'type' => 'text',
                                                            'placeholder' => 'First Name',
                                                            'required' =>'required',
                                                            'autofocus'=>'autofocus'
                                                            );

                                                echo form_input($firstName);                     
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <?php 
                                                $lastName = array('class' => 'form-control',
                                                            'id'=>'lastName',
                                                            'name'=>'lastName',
                                                            'type' => 'text',
                                                            'placeholder' => 'Last Name',
                                                            'required' =>'required'
                                                            );

                                                echo form_input($lastName);                     
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
                                                $mobileNumber = array('class' => 'form-control',
                                                            'id'=>'mobileNumber',
                                                            'name'=>'mobileNumber',
                                                            'type' => 'text',
                                                            'placeholder' => 'Mobile Number',
                                                            'required' =>'required'
                                                            );

                                                echo form_input($mobileNumber);                   
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-label-group">
                                            <?php 
                                                $userType = array(
                                                    'User'=>'User',
                                                    'Admin'=>'Admin'
                                                );
                                                echo form_dropdown('userType', $userType, 'User', 'class="form-control"  style="width:525px;" ');                     
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
                                                            'value' => $randompassword,
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
                                            'value' => 'Add User',
                                            'name' => 'submit',
                                            'type' => 'submit');
                                echo form_submit($btn);        
                                echo form_close();
                            ?>
                        </div>
                    </div>
                    <!-- /.container-fluid -->                           