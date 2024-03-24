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
                                    <h3>Manage Access Profile - PT Mitra Kiara Indonesia</h3>
                                    <p>Manage Access konten pada profile yang terdapat pada PT Mitra Kiara Indonesia.</p>
                                     <!-- <a href="<?php echo base_url(); ?>superadmin/manage/addaccess"><button type="button" class="btn mb-1 btn-primary">Add Access</button></a> -->
                                     <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Level</th>
                                                <th>Helpdesk Menu</th>
                                                <th>Booking Menu</th>
                                                <th>ISO Menu</th>
                                                <th>EHS Menu</th>
                                                <th>Assets Menu</th>
                                                <th>Dashboard A</th>
                                                <th>Dashboard B</th>
                                                <th>Dashboard C</th>
                                                <th>Dashboard D</th>
                                                <th>E - Arsip</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                           <?php 
                                           $no = 1;
                                           foreach ($get_access as $row) { 
                                           ?>
                                             <tr>
                                                  <td class="text-center">
                                                     <?php echo $no++ ?>
                                                 </td>
                                                 <td class="text-center">
                                                     <?php echo $row->name; ?>
                                                 </td>
                                                 <td>
                                                   <?php if($row->level == 1){
                                                   echo "Admin";
                                                   }else{echo "User";}; ?>
                                                 </td>
                                                 <td>
                                                   <?php if($row->helpdesk_menu == 1){
                                                   echo "<b><i>True<i><b>";
                                                   }else{echo "False";}; ?>
                                                 </td>
                                                  <td>
                                                   <?php if($row->booking_menu == 1){
                                                   echo "<b><i>True<i><b>";
                                                   }else{echo "False";}; ?>
                                                 </td>
                                                  <td>
                                                   <?php if($row->iso_menu == 1){
                                                   echo "<b><i>True<i><b>";
                                                   }else{echo "<b>False<b>";}; ?>
                                                 </td>
                                                  <td>
                                                   <?php if($row->ehs_menu == 1){
                                                   echo "<b><i>True<i><b>";
                                                   }else{echo "False";}; ?>
                                                 </td>
                                                  <td>
                                                   <?php if($row->assets_menu == 1){
                                                    echo "<b><i>True<i><b>";
                                                   }else{echo "False";}; ?>
                                                 </td>
                                                  <td>
                                                   <?php if($row->dash_a == 1){
                                                   echo "<b><i>True<i><b>";
                                                   }else{echo "False";}; ?>
                                                 </td>
                                                  <td>
                                                   <?php if($row->dash_b == 1){
                                                    echo "<b><i>True<i><b>";
                                                   }else{echo "False";}; ?>
                                                 </td>
                                                 <td>
                                                   <?php if($row->dash_c == 1){
                                                   echo "<b><i>True<i><b>";
                                                   }else{echo "False";}; ?>
                                                 </td>
                                                 <td>
                                                   <?php if($row->dash_d == 1){
                                                   echo "<b><i>True<i><b>";
                                                   }else{echo "False";}; ?>
                                                 </td>
                                                 <td>
                                                   <?php if($row->earsip == 1){
                                                   echo "<b><i>True<i><b>";
                                                   }else{echo "False";}; ?>
                                                 </td>
                                                 <td class="text-center">
                                                    <div class="btn-group mb-2 btn-group-sm">
                                                        <a href="<?php echo base_url(); ?>superadmin/manage/edit_access/<?php echo $row->id; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                                    </div>
                                                 </td>
                                             </tr>
                                             <?php } ?>
                                        </tbody>
                                        <tfoot>
                                             <tr>    
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Level</th>
                                                <th>Helpdesk Menu</th>
                                                <th>Booking Menu</th>
                                                <th>ISO Menu</th>
                                                <th>EHS Menu</th>
                                                <th>Assets Menu</th>
                                                <th>Dashboard A</th>
                                                <th>Dashboard B</th>
                                                <th>Dashboard C</th>
                                                <th>Dashboard D</th>
                                                <th>E - Arsip</th>
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