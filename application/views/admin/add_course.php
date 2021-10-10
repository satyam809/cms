<?php include 'include/header.php' ?>


<!-- Content Wrapper. Contains page content -->
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
      <form id="addCourse">
         <input type="hidden" name="type" value="insert">
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label>Course title</label>
                  <input type="text" class="form-control" name="course_name" value="" placeholder="Enter Course Name">
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label>Course Fee</label>
                  <input type="text" class="form-control" name="fee" value="" placeholder="Enter Course Fee">

               </div>

            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label>Course Duration</label>
                  <input type="text" class="form-control" name="duration" value="" placeholder="Enter Course Duration">
                  </select>
               </div>

            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>Course Feature</label>
                  <div class="card card-outline card-info">
                     <div class="card-body pad">
                        <div class="mb-3">
                           <textarea class="textarea" placeholder="Enter Course Description" name="feature" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
   // add course
   $('#addCourse').on('submit', function(e) {
      e.preventDefault();

      //alert($('#addCourse').serialize());
      console.log($('#addCourse').serialize());
      //$('#response').html($('#addCourse').serialize());
      $.ajax({
         url: "<?php echo base_url(); ?>admin/addCourses",
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
            } else if (data.status == false) {
               //console.log(data.message);

            }
         }
      });

   });
</script>