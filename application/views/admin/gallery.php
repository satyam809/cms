<?php include 'include/header.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

   <!-- Main content -->
   <section class="content">
      <br>
      <div class="row" style="text-align: center;">
         <div class="col-lg-12 col-6">
            <form id="submit_form_gallery">
               <div class="form-group">
                  <input type="file" placeholder="Upload Images" name="images[]" required multiple>
                  <input type="submit" class="btn btn-default" value="Upload">
               </div>

            </form>
         </div>
      </div>
      <br>
      <div class="row">
         <div class="col-12">
            <div class="card card-primary">

               <div class="card-body">
                  <div class="row" id="galleryImages"></div>
               </div>
            </div>
         </div>
      </div>

      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
   // fetch gallery
   function loadGalleryImages(page) {
      $.ajax({
         url: '<?php echo base_url(); ?>admin/fetchgallery',
         dataType: 'json',
         success: function(data) {
            //console.log(data);
            if (data.status == false) {
               $("galleryImages").append("<b>" + data.message + "</b>");
            } else {
               var i = 1;
               $.each(data, function(key, value) {
                  $("#galleryImages").append(`<div class="col-sm-2">
                           <a href="<?php echo base_url(); ?>assets/admin/images/${value.images}" data-toggle="lightbox" data-gallery="gallery">
                              <img src="<?php echo base_url(); ?>assets/admin/images/${value.images}" class="img-fluid mb-2" alt="white sample" />
                           </a>
                           <a href="" type="button" class="btn btn-default" id="btn_delete" data-eid=${value.image_id} _onclick="return confirm('sure to delete !'); ">Delete</a>
                        </div>`);

               });
               i++;
            }
         }
      });
   }
   // delete gallery
   $(document).on("click", "#btn_delete", function(e) {
      // console.log("test");
      e.preventDefault();
      if (confirm("Do you really want to delete this")) {
         var empid = $(this).data("eid");

         $.ajax({
            url: "<?php echo base_url(); ?>admin/deletegallery",
            type: "POST",
            dataType: "json",
            data: {
               id: empid
            },
            success: function(data) {
               //console.log(data);
               if (data.status === true) {
                  //console.log(data.message);
                  $("#galleryImages").html("");
                  loadGalleryImages();
               }
            }
         });
      }
   });
   // upload gallery
   $('#submit_form_gallery').on('submit', function(e) {
      e.preventDefault();

      //alert($('#submit_form').serialize());
      // console.log($('#submit_form').serialize());
      //$('#response').html($('#submit_form').serialize());
      $.ajax({
         url: "<?php echo base_url(); ?>admin/uploadgallery",
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
               $('#submit_form_gallery').trigger('reset');
               // $(".preview_img").attr("src", "");
               // $(".show_preview").hide();
               // $("#alert").show();
               // $("#message").html(data.message);
               // $('#myModal').modal('hide');
               $("#galleryImages").html("");
               loadGalleryImages();
            }
         }
      });

   });
   loadGalleryImages();
</script>
<?php include 'include/footer.php'; ?>