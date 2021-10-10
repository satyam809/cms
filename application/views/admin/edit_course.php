<?php include 'include/header.php'; ?>


<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <a href="<?php echo base_url(); ?>admin/addCourses" type="button" class="btn btn-default">Add Course</a>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <form id="updateCourse">
         <input type="hidden" name="type" value="update">
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label>Course title</label>
                  <input type="text" class="form-control" name="course_name" id="course_name" placeholder="Enter Course Name">
                  <input type="hidden" class="form-control" name="update_id" id="update_id" placeholder="Enter Course Name">
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label>Course Fee</label>
                  <input type="text" class="form-control" name="fee" id="fee" placeholder="Enter Course Fee">
                  <!-- <select class="form-control" name="type">
                          <option>Select Course Type</option>
                          <option <?php //if($row['type']=="Online") echo 'selected="selected"'; 
                                    ?>>Online</option>
                          <option <?php //if($row['type']=="Offline") echo 'selected="selected"'; 
                                    ?> >Offline</option>
                          <option <?php //if($row['type']=="Our Courses") echo 'selected="selected"'; 
                                    ?> >Our Courses</option>
                        </select> -->
               </div>

            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label>Course duration</label>
                  <input type="text" class="form-control" name="duration" id="duration" placeholder="Enter Course Duration">
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>Course Details</label>
                  <div class="card card-outline card-info">
                     <div class="card-body pad">
                        <div class="mb-3">
                           <!-- <input type="text" class="form-control textarea" name="feature" id="feature" placeholder="Enter course description"> -->
                           <textarea class="textarea" placeholder="Enter Course Description" name="feature" id="feature" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.col-->
         </div>

         <input type="submit" class="btn btn-default" value="Save">
      </form>
      <!-- ./row -->
   </section>
   <!-- /.content -->
</div><br>
<!-- /.content-wrapper -->
<?php include 'include/footer.php' ?>
<script>
   // fetch single

   $(document).ready(function() {
      var params = new window.URLSearchParams(window.location.search);
      var empid = params.get('course_id');

      $.ajax({
         url: "<?php echo base_url(); ?>admin/singleCourse",
         type: "POST",
         data: {
            id: empid
         },
         dataType: "json",
         success: function(data) {
            //console.log(data);
            if (data.status !== false) {
               $("#update_id").val(data[0].course_id);
               $("#course_name").val(data[0].course_name);
               $("#fee").val(data[0].fee);
               $("#duration").val(data[0].duration);
               $("#feature").val(data[0].feature);
               // console.log(data.feature);
            }


         }
      });
   });
   // update course
   $('#updateCourse').on('submit', function(e) {
      e.preventDefault();

      //alert($('#updateCourse').serialize());
      // console.log($('#updateCourse').serialize());
      //$('#response').html($('#updateCourse').serialize());
      $.ajax({
         url: "<?php echo base_url(); ?>admin/editCourses",
         method: "POST",
         dataType: "JSON",
         data: new FormData(this),
         contentType: false,
         //cache:false,  
         processData: false,
         success: function(data) {
            //console.log(data);
            //console.log(data.status);
            if (data.status == true) {

               window.location.href = '<?php echo base_url(); ?>admin/viewCourses';
               alert(data.message);
               //$("#courseAlertMessage").append("<div class='alert alert-success alert-dismissible fade in'>" +
               //"<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + data.message + "</div>");

            } else if (data.status == false) {
               console.log(data.message);

            }
         }
      });

   });
</script>



</html>