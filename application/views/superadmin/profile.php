<div class="content-body" style="min-height: 884px;">

            <div class="row page-titles mx-0">
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                      <div class="col-lg-8 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <h3>Manage Profile - PT Mitra Kiara Indonesia</h3>
                                    <p>Manage Profile yang terdapat pada Portal - PT Mitra Kiara Indonesia.</p>
                                     <a href="<?php echo base_url(); ?>superadmin/manage/adduser"><button type="button" class="btn mb-1 btn-primary">Add Users</button></a>
                                     <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Department</th>
                                                <th>Created</th>
                                                <th>Active</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                           <?php 
                                           $no = 1;
                                           foreach ($get_user as $row) { 
                                           ?>
                                             <tr>
                                                  <td class="text-center">
                                                     <?php echo $no++ ?>
                                                 </td>
                                                 <td class="text-center">
                                                     <?php echo $row->name; ?>
                                                 </td>
                                                 <td >
                                                   <?php echo $row->email; ?>
                                                 </td>
                                                 <td>
                                                   <?php if($row->level == 1){
                                                   echo "Superadmin";
                                                   }else if ($row->level == 2) {
                                                        echo "Admin";
                                                   }else{echo "User";}; ?>
                                                 </td>
                                                 <td>
                                                   <?php if($row->dept == NULL){
                                                        echo "Null";
                                                   }else{
                                                        echo $row->dept;
                                                   }; ?>
                                                 </td>
                                                 <td>
                                                   <?php  echo $row->created; ?>
                                                 </td>
                                                  <td class="text-center">
                                                   <?php if($row->active_at == NULL){
                                                    ?>
                                                    <span class="label label-pill label-danger">Not Activated</span>

                                                   <?php }else{?>
                                                     <span class="label label-pill label-success">Activated</span>
                                                  <?php }; ?>
                                                 </td>
                                                 <td class="text-center">
                                                    <div class="btn-group mb-2 btn-group-sm">
                                                        <?php if($row->active_at == NULL){?>
                                                         <a href="<?php echo base_url(); ?>superadmin/manage/active/<?php echo $row->id; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Active</a>
                                                      <?php }else{?>
                                                         <a href="<?php echo base_url(); ?>superadmin/manage/deactive/<?php echo $row->id; ?>" class="btn btn-info"><i class="fa fa-edit"></i> Deactive</a>
                                                      <?php }; ?>
                                                        <a href="<?php echo base_url(); ?>superadmin/manage/edit_prf/<?php echo $row->id; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="<?php echo base_url(); ?>superadmin/manage/delete_prf/<?php echo $row->id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                                    </div>
                                                 </td>
                                             </tr>
                                             <?php } ?>
                                        </tbody>
                                        <tfoot>
                                             <tr>    
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Department</th>
                                                <th>Created</th>
                                                <th>Active</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>                                                  
                                </div>
                            </div>    
                        </div>
                      </div>
                    </div>
                </div>
</div>
<!-- #/ container -- >