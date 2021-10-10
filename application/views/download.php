<?php include 'include/header.php'; ?>
<!-- End Header -->
<br>
<div class="container">
   <div style="box-shadow: 5px 5px 5px 5px grey;max-width:75%;padding: 15px;margin:0% 15%;" id="allDownloads">
   </div>
   <br>
</div>

<!-- Start Footer -->
<?php include 'include/footer.php'; ?>
<!-- End Footer -->
<script type="text/javascript">
   // fetch gallery
   function downloadsFetch() {
      $.ajax({
         url: "http://localhost/myproject/ims/admin/api/download/downloadsFetch.php",
         dataType: "json",
         success: function(data) {
            //console.log(data);
            if (data.status == false) {
               $("#allDownloads").append("<b>" + data.message + "</b>");
            } else {
               var i = 1;
               $.each(data, function(key, value) {
                  $("#allDownloads").append(`<div class="row">
            <div class="col-md-6" style="text-align: -webkit-center;">
               <h5>${value.file_name}</h5>
            </div>
            <div class="col-md-6" style="text-align: -webkit-center;">
               <a href="admin/download_file/${value.file}" type="button" class="btn btn-default" download><i class="fa fa-download"></i>&nbsp;Download</a>
            </div>
         </div>`);
               });
               i++;
            }
         },
      });
   }
   downloadsFetch();
</script>