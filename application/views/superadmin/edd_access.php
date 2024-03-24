<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <a href="<?php echo base_url(); ?>helpdesk/admin/ticket"><button type="button" class="btn mb-1 btn-outline-dark">
                    <span class="btn-icon-left"><i class="fa fa-arrow-circle-left"></i></span>Back</button></a>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>helpdesk/admin/addticket">Add Ticket</a></li>
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
                        <h3 align="text-center">Edit Access Profile</h3>
                        <div class="form-validation">
                            <form class="form-valide" action="<?php echo base_url('superadmin/manage/update_access'); ?>" method="post" enctype="multipart/form-data">
                                     <input type="hidden" name="id" value="<?php echo $get_access->id ?>">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-subject">Name 
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="val-subject" name="subject" value="<?php echo $get_access->name ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-subject">Level
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="val-subject" name="subject" value="<?php if($get_access->level == 1){
                                                   echo "Admin";
                                                   }else{echo "User";} ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">ISO Menu <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                         <select class="form-control" id="val-status" name="iso">
                                             <div class="col-lg-8">
                                                <?php if($get_access->iso_menu == 1){ ?>
                                                   <option value="1" selected>True</option>
                                                   <option>False</option>
                                                 <?php }else{ ?>       
                                                <option value="1">True</option>
                                                <option selected>False</option>
                                                <?php } ?>                                                 
                                            </div>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">Booking Menu <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                         <select class="form-control" id="val-status" name="booking">
                                             <div class="col-lg-8">
                                                <?php if($get_access->booking_menu == 1){ ?>
                                                   <option value="1" selected>True</option>
                                                   <option>False</option>
                                                <?php }else{ ?>       
                                                <option value="1">True</option>
                                                <option selected>False</option>
                                                <?php } ?>                                                    
                                            </div>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">Helpdesk Menu <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                         <select class="form-control" id="val-status" name="helpdesk">
                                             <div class="col-lg-8">
                                                <?php if($get_access->helpdesk_menu == 1){ ?>
                                                   <option value="1" selected>True</option>
                                                   <option>False</option>
                                               <?php }else{ ?>       
                                                <option value="1">True</option>
                                                <option selected>False</option>
                                                <?php } ?>                                                 
                                            </div>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">EHS Menu <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                         <select class="form-control" id="val-status" name="ehs">
                                             <div class="col-lg-8">
                                                <?php if($get_access->ehs_menu == 1){ ?>
                                                   <option value="1" selected>True</option>
                                                   <option>False</option>
                                                 <?php }else{ ?>       
                                                <option value="1">True</option>
                                                <option selected>False</option>
                                                <?php } ?>                                                      
                                            </div>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">Assets Menu <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                         <select class="form-control" id="val-status" name="assets">
                                             <div class="col-lg-8">
                                                <?php if($get_access->assets_menu == 1){ ?>
                                                   <option value="1" selected>True</option>
                                                   <option>False</option>
                                                <?php }else{ ?>       
                                                <option value="1">True</option>
                                                <option selected>False</option>
                                                <?php } ?>                                                   
                                            </div>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">Dashboard A <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                         <select class="form-control" id="val-status" name="dash_a">
                                             <div class="col-lg-8">
                                                <?php if($get_access->dash_a == 1){ ?>
                                                   <option value="1" selected>True</option>
                                                   <option>False</option>
                                                <?php }else{ ?>       
                                                <option value="1">True</option>
                                                <option selected>False</option>
                                                <?php } ?>                                                    
                                            </div>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">Dashboard B <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                         <select class="form-control" id="val-status" name="dash_b">
                                             <div class="col-lg-8">
                                                <?php if($get_access->dash_b == 1){ ?>
                                                 <option value="1" selected>True</option>
                                                 <option>False</option>
                                                <?php }else{ ?>       
                                                <option value="1">True</option>
                                                <option selected>False</option>
                                                <?php } ?>                                     
                                            </div>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">Dashboard C <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                         <select class="form-control" id="val-status" name="dash_c">
                                             <div class="col-lg-8">
                                                <?php if($get_access->dash_c == 1){ ?>
                                                   <option value="1" selected>True</option>
                                                   <option>False</option>
                                                <?php }else{ ?>       
                                                <option value="1">True</option>
                                                <option selected>False</option>
                                                <?php } ?>                                                                                                   
                                            </div>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">Dashboard D <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                         <select class="form-control" id="val-status" name="dash_d">
                                             <div class="col-lg-8">
                                                <?php if($get_access->dash_d == 1){ ?>
                                                   <option value="1" selected>True</option>
                                                   <option>False</option>
                                                <?php }else{ ?>       
                                                <option value="1">True</option>
                                                <option selected>False</option>
                                                <?php } ?>                                                                                                   
                                            </div>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-requester">E-Arsip <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                         <select class="form-control" id="val-status" name="earsip">
                                             <div class="col-lg-8">
                                                <?php if($get_access->earsip == 1){ ?>
                                                   <option value="1" selected>True</option>
                                                   <option>False</option>
                                                <?php }else{ ?>       
                                                <option value="1">True</option>
                                                <option selected>False</option>
                                                <?php } ?>                                                                                                   
                                            </div>
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
