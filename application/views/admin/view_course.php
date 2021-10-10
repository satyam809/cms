<?php include 'include/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row">
            <!-- <div class="col-sm-6">
                  <h1>DataTables</h1>
                </div> -->
            <div class="col-md-12 center_btn">
               <a href="<?php echo base_url(); ?>admin/addCourses" type="button" class="btn btn-default" style="width: max-content;"> Add New Course</a>

            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <div id="courseAlertMessage">

   </div>
   <section class="content" style="position: relative;bottom:20px;">
      <div class="row">
         <div class="col-md-12">


            <!-- /.card-header -->
            <div class="card-body table-responsive">
               <table id="example1" class="table table-hover ">
                  <thead>
                     <th>Course Title</th>
                     <th>Fee</th>
                     <th>Duration</th>
                     <th>Insert Date</th>
                     <th>Modify Date</th>
                     <th>Action</th>
                  </thead>
                  <tbody id="coursesFetch">

                  </tbody>

               </table>

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
<?php include 'include/footer.php'; ?>
<script>
   // fetch courses
   function loadCourses() {
      //alert('test');
      $.ajax({
         url: 'http://localhost/myproject/ims/admin/api/course/coursesFetch.php',
         dataType: 'json',
         success: function(data) {
            //console.log(data);
            if (data.status !== false) {
               var i = 1;
               $.each(data, function(key, value) {
                  $("#coursesFetch").append(`
                     <tr>
                        <td>${value.course_name}</td>
                        <td>${value.fee}</td>
                        <td>${value.duration}</td>
                        <td>${value.insert_date}</td>
                        <td>${value.modify_date}</td>
                        <td>
                           <a href="<?php echo site_url(''); ?>admin/editCourses?course_id=${value.course_id}" class="btn btn-default">Edit</a>
                           <a href="" class="btn btn-default" data-eid="${value.course_id}" id="course_delete">Delete</a>

                        </td>
                     </tr>`);
               });
               i++;
            }
         }
      });
   }
   // delete
   $(document).on("click", "#course_delete", function(e) {
      e.preventDefault();
      if (confirm("Do you really want to delete this")) {
         var delid = $(this).data("eid");
         //alert(empid);
         $.ajax({
            url: "<?php echo base_url(); ?>admin/deleteCourse",
            type: "POST",
            dataType: "json",
            data: {
               id: delid
            },
            success: function(data) {
               //console.log(data);
               if (data.status == true) {
                  $('#coursesFetch').html('');
                  loadCourses();
                  alert(data.message);
               }
            }
         });
      }
   });
   loadCourses();
</script>