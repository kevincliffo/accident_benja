                    
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Users</h1>
                            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">System Users</h6>
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
                            
                                        $this->table->set_heading('User Id', 'First Name', 'Last Name', 'User Type', 'Email', 'Mobile No.', 'Last Login', 'Remove User');
                                        foreach ($users as $user)
                                        {
                                            if($user['UserType'] != 'Admin')
                                            {
                                                $this->table->add_row($user['UserId'], $user['FirstName'], $user['LastName'], $user['UserType'], $user['Email'], $user['MobileNo'], $user['LastLogin'], anchor('main/removeuser/'.$user['UserId'], 'Remove'));
                                            }
                                            else
                                            {
                                                $this->table->add_row($user['UserId'], $user['FirstName'], $user['LastName'], $user['UserType'], $user['Email'], $user['MobileNo'], $user['LastLogin']);
                                            }
                                        }
                                        $this->table->add_row('<b>User Id</b>', '<b>First Name</b>', '<b>Last Name</b>', '<b>User Type</b>', '<b>Email</b>', '<b>Mobile No.</b>', '<b>Last Login</b>', '<b>Remove User</b>');
                                        $this->table->set_template($template);
                                        echo $this->table->generate();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->                        