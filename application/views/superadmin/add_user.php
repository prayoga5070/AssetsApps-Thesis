<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <a href="<?php echo base_url(); ?>superadmin/manage/profile"><button type="button" class="btn mb-1 btn-outline-dark">
                    <span class="btn-icon-left"><i class="fa fa-arrow-circle-left"></i></span>Back</button></a>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>helpdesk/admin/agent/add">Add Users</a></li>
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
                        <h3 align="text-center">Add Users</h3>
                        <div class="form-validation">
                            <form class="form-valide" action="<?php echo base_url('superadmin/manage/post_user'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-subject">Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="val-subject" name="name" placeholder="Enter name..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">Email <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="val-requester" name="email" placeholder="Enter Email..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">Password <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control" id="val-requester" name="password" placeholder="Enter Password..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">Password Confirmation <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control" id="val-requester" name="password" placeholder="Enter Password Confirmation..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-priority">Level <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <select class="form-control" id="val-priority" name="level">
                                            <option value="2">Admin</option>
                                            <option value="3">User</option>
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
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
