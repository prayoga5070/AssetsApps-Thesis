<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <a href="<?php echo base_url(); ?>superadmin/manage/profile"><button type="button" class="btn mb-1 btn-outline-dark">
                    <span class="btn-icon-left"><i class="fa fa-arrow-circle-left"></i></span>Back</button></a>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>helpdesk/admin/agent/add">Edit Users</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>helpdesk/admin/dashboard">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="default-tab">
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Change Profile</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Change Password</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div class="p-t-15">
                                        <h4>Change Profile</h4>
                                        <div class="form-validation">
                                            <form class="form-valide" action="<?php echo base_url('superadmin/manage/update_prf'); ?>" method="post" enctype="multipart/form-data">
                                                 <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-subject">Name <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" id="val-subject" name="name" value="<?php echo $row->name ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-requester">Email <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" id="val-requester" name="email" value="<?php echo $row->email ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-priority">Level <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <select class="form-control" id="val-priority" name="level">
                                                         <?php if($row->level == 1){ ?>
                                                               <option value="1" selected>Superadmin</option>
                                                               <option value="2">Admin</option>
                                                               <option value="3">User</option>
                                                            <?php }else if($row->level == 2){?>
                                                               <option value="1">Superadmin</option>
                                                               <option value="2" selected>Admin</option>
                                                               <option value="3">User</option>
                                                            <?php }else if($row->level == 3){?>
                                                               <option value="1">Superadmin</option>
                                                               <option value="2">Admin</option>
                                                               <option value="3" selected>User</option>
                                                            <?php } ?>               
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-priority">Department <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <select class="form-control" id="val-priority" name="dept">
                                                        <?php if($row->dept == 0){ ?>
                                                            <option value="">Null</option>
                                                            <?php foreach ($get_dept as $row) { ?>
                                                                <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                            <?php } ?>   
                                                           <?php }else{ ?>
                                                            <?php foreach ($get_dept as $row) { ?>
                                                                <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                            <?php } ?>   
                                                          <?php }; 
                                                        ?>            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" value="upload" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <div class="p-t-15">
                                        <h4>Change Password</h4>
                                        <div class="basic-form">
                                            <form class="form-valide" action="<?php echo base_url('superadmin/manage/update_pw'); ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-subject">Old Password <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="password" class="form-control" id="val-subject" name="old" placeholder="Old Password..">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-requester">New Password <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="password" class="form-control" id="val-password" name="new" placeholder="New Password..">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-requester">Confirm New Password <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <input type="password" class="form-control" id="val-confirm-password" name="requester" placeholder="Confirm New Password..">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
