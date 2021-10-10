<?php include 'include/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <!-- <div class="col-sm-6">
                  <h1>DataTables</h1>
                </div> -->
            <div class="col-sm-12 center_btn">
               <a type="button" id="delete_records" class="btn btn-default">Delete</a>
               <a href="<?php echo base_url(); ?>admin/export_csv" type="button" data-eid="contact" class="btn btn-default">Export</a>

            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content" style="position: relative;bottom:24px;">
      <div class="row">
         <div class="col-12">


            <!-- /.card-header -->
            <div class="card-body table-responsive">
               <table id="example1" class="table table-hover">
                  <thead>
                     <th><input type="checkbox" id="select_all"></th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Phone</th>
                     <th>Email</th>
                     <th>Date</th>
                  </thead>
                  <tbody id="allContacts">

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
<!-- Control Sidebar -->


<script>
   // fetch contact records
   function contactFetch() {
      $.ajax({
         url: "<?php echo base_url(); ?>admin/fetchcontact",
         dataType: "json",
         success: function(data) {
            //console.log(data);
            if (data.status == false) {
               $("#allContacts").append("<b>" + data.message + "</b>");
            } else {
               var i = 1;
               $.each(data, function(key, value) {
                  $("#allContacts").append(`<tr id="${value.id}">
                           <td><input type="checkbox" class="con_checkbox" data-con-id="${value.id}"></td>
                           <td>${value.fname}</td>
                           <td>${value.lname}</td>
                           <td>${value.phone}</td>
                           <td>${value.email}</td>
                           <td>${value.date}</td>

                        </tr>`);
               });
               i++;
            }
         },
      });
   }

   $(document).ready(function() {
      /* delete selected records*/
      $('#delete_records').on('click', function(e) {
         var contact = [];
         $(".con_checkbox:checked").each(function() {
            contact.push($(this).data('con-id'));
         });
         if (contact.length <= 0) {
            alert("Please select records.");
         } else {
            WRN_PROFILE_DELETE = "Are you sure you want to delete " + (contact.length > 1 ? "these" : "this") + " row?";
            var checked = confirm(WRN_PROFILE_DELETE);
            if (checked == true) {
               var selected_values = contact.join(","); //alert(selected_values);
               $.ajax({
                  type: "POST",
                  url: "<?php echo base_url(); ?>admin/deletecontact",
                  dataType: "json",
                  cache: false,
                  data: 'id=' + selected_values,
                  success: function(data) {
                     if (data.status == true) {
                        $('#allContacts').html('');
                        contactFetch();
                     }
                  }
               });
            }
         }
      });
   });
   $(document).on('click', '#select_all', function() {
      $(".con_checkbox").prop("checked", this.checked);
      $("#select_count").html($("input.con_checkbox:checked").length + " Selected");
   });
   $(document).on('click', '.con_checkbox', function() {
      if ($('.con_checkbox:checked').length == $('.con_checkbox').length) {
         $('#select_all').prop('checked', true);
      } else {
         $('#select_all').prop('checked', false);
      }
      $("#select_count").html($("input.con_checkbox:checked").length + " Selected");
   });
   contactFetch();
</script>