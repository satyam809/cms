<?php include 'include/header.php'; ?>
<!--Content Wrapper.Contains page content -->
<div class="content-wrapper">
   <!-- Content Header Page header -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row">
            <!-- <div class="col-sm-6">
                  <h1>DataTables</h1>
               </div> -->
            <!-- Add New Model -->
            <div class="col-md-12 center_btn">
               <a href="#addnew" type="button" data-toggle="modal" class="btn btn-default" style="width: max-content;"> Add New</a>

            </div>

            <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header" style="border: none;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                     </div>
                     <div class="modal-body">
                        <div class="container-fluid">
                           <form id="addDownload">
                              <div class="row">
                                 <div class="col-lg-5">
                                    <label>File Name:</label>
                                 </div>
                                 <div class="col-lg-7">
                                    <input type="text" class="form-control" name="file_name" required>
                                 </div>
                              </div>
                              <br>

                              <div class="row">
                                 <div class="col-lg-5">
                                    <label>Upload File:</label>
                                 </div>
                                 <div class="col-lg-7">
                                    <input type="file" placeholder="Upload File" name="file" required>
                                    <!-- <input type="text" class="form-control" name="lastname"> -->
                                 </div>
                              </div>

                        </div>
                     </div>
                     <div class="modal-footer" style="border: none;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-default" value="save">
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>
   <!-- Main content -->

   <section class="content" style="position: relative;bottom:20px;">
      <div class="row">
         <div class="col-md-12">


            <!-- /.card-header -->
            <div class="card-body table-responsive">
               <table id="example1" class="table table-hover ">
                  <thead>
                     <th>File Name</th>
                     <th>File</th>
                     <th>Action</th>
                  </thead>
                  <tbody id="downloads_fetch">

                  </tbody>

               </table>

               <!-- Edit Model -->
               <div class="modal fade" id="editModal" role="dialog">
                  <div class="modal-dialog">
                     <!-- Modal content-->
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div><br>

                        <form id="updateDownload">

                           <div class="modal-body">
                              <div class="row">
                                 <div class="col-lg-5">
                                    <label>File Name:</label>
                                 </div>
                                 <div class="col-lg-7">
                                    <input type="text" id="ufilename" name="file_name" class="form-control" required>
                                 </div>
                              </div>


                              <input type="hidden" id="udownload_id" name="download_id" class="form-control">


                              <br>
                              <div class="row">
                                 <div class="col-lg-5">
                                    <label>Upload File:</label>
                                 </div>
                                 <div class="col-lg-7">
                                    <input type="file" placeholder="Upload Images" id="ufile" name="file">

                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <input type="submit" class="btn btn-default" value="Save">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.card-body -->

            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
   // fetch downloads
   function loadDownloads() {
      $.ajax({
         url: '<?php echo base_url(); ?>admin/viewDownloads',
         dataType: 'json',
         success: function(data) {
            //console.log(data);
            if (data.status == false) {
               $("downloads_fetch").append("<b>" + data.message + "</b>");
            } else {
               var i = 1;
               $.each(data, function(key, value) {
                  $("#downloads_fetch").append(`
                     <tr>
                        <td>${value.file_name}</td>
                        <td>${value.file}</td>
                        <td><a href="" data-toggle="modal" data-eid="${value.download_id}" data-target="#editModal" id='btn_edit' class="btn btn-default">Edit</a>
                        
                        <a href="" class="btn btn-default" id="btn_delete" data-eid="${value.download_id}">Delete</a></td>
                     </tr>`);
               });
               i++;
            }
         }
      });
   }
   // fetch single
   $(document).on("click", "#btn_edit", function() {
      var empid = $(this).data("eid");

      $.ajax({
         url: "<?php echo base_url(); ?>admin/singleDownload",
         type: "POST",
         data: {
            id: empid
         },
         dataType: "json",
         success: function(data) {
            console.log(data);
            $("#ufilename").val(data[0].file_name);
            $("#udownload_id").val(data[0].download_id);
            $("#ufile").val(data[0].file);

         }
      });
   });
   // update download
   $('#updateDownload').on('submit', function(e) {
      e.preventDefault();

      //alert($('#updateDownload').serialize());
      // console.log($('#updateDownload').serialize());
      //$('#response').html($('#updateDownload').serialize());
      $.ajax({
         url: "<?php echo base_url(); ?>admin/editDownload",
         method: "POST",
         dataType: "JSON",
         data: new FormData(this),
         contentType: false,
         //cache:false,  
         processData: false,
         success: function(data) {
            console.log(data);
            //console.log(data.status);
            if (data.status == true) {
               $('#downloads_fetch').html('');
               loadDownloads();
               $('#editModal').modal('hide');
               alert(data.message);
            } else if (data.status == false) {
               console.log(data.message);

            }
         }
      });

   });
   // insert download
   $('#addDownload').on('submit', function(e) {
      e.preventDefault();

      //alert($('#addDownload').serialize());
      //console.log($('#addDownload').serialize());
      //$('#response').html($('#addDownload').serialize());
      $.ajax({
         url: "<?php echo base_url(); ?>admin/addDownload",
         method: "POST",
         dataType: "JSON",
         data: new FormData(this),
         contentType: false,
         //cache:false,  
         processData: false,
         success: function(data) {
            console.log(data);
            //console.log(data.status);
            if (data.status == true) {
               $('#addDownload').trigger('reset');
               $('#downloads_fetch').html('');
               loadDownloads();
               $('#addnew').modal('hide');
               alert(data.message);

            } else if (data.status == false) {
               console.log(data.message);

            }
         }
      });

   });
   // delete
   $(document).on("click", "#btn_delete", function(e) {
      e.preventDefault();
      if (confirm("Do you really want to delete this")) {
         var delid = $(this).data("eid");
         //alert(delid);
         $.ajax({
            url: "<?php echo base_url(); ?>admin/deleteDownload",
            type: "POST",
            dataType: "json",
            data: {
               id: delid
            },
            success: function(data) {
               //console.log(data);
               if (data.status == true) {
                  $('#downloads_fetch').html('');
                  loadDownloads();
                  alert(data.message);
               }
            }
         });
      }
   });
   loadDownloads();
</script>
<?php include 'include/footer.php'; ?>