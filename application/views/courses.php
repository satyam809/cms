<?php include 'include/header.php'; ?>
<!-- End Header -->
<!-- Start Banner -->
<!-- <div class="inner-banner blog">
   <div class="container">
       <div class="row">
           <div class="col-sm-12">
               <div class="content">
                   <h1>Gallery</h1>
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
               </div>
           </div>
       </div>
   </div>
   </div> -->
<!-- End Banner -->
<!-- Start Campus Tour -->
<section class="campus-tour" style="padding-top:20px;">
   <div class="container">
      <!-- Start Heading -->

      <div class="row" id="allCoursesDetail">



         <!-- <div class="col-sm-5 heading-group imp-note">
            <h1 style="font-size:20px;">FOUNDATION COURSE FOR UG-NEET (STD XI /FOR 24 MONTHS)</h1>
            <p>Course Feature</p>
            <ul class="privacy-listing">
               <li>Intensive classroom teaching</li>
               <li>Resourceful & precise subject modules</li>
               <li>Daily practice problems</li>
               <li>Regular Periodic Assessment Tests</li>
               <li>App-based online Assessment Tests with FREE TABLET.</li>
            </ul>
         </div> -->

      </div>

   </div>
</section>
<!-- End Campus Tour -->
<!-- Start Campus Tour -->

<!-- End Campus Tour -->
<!-- Start Campus Tour -->

<!-- End Campus Tour -->
<!-- Start Footer -->
<?php include 'include/footer.php'; ?>
<!-- End Footer -->
<script type="text/javascript">
   // fetch gallery
   function loadAllCoursesDetails() {
      $.ajax({
         url: "<?php echo base_url(); ?>admin/fetchCourses",
         dataType: "json",
         success: function(data) {
            //console.log(data);
            if (data.status == false) {
               $("#coursesFetch").append("<b>" + data.message + "</b>");
            } else {
               var i = 1;
               $.each(data, function(key, value) {
                  $("#allCoursesDetail").append(`<div class="col-sm-3 heading-group ">
               <div class="imp-note" style="height: auto;background: #f9f9f9;border: 1px solid #dedfe0;text-align:center;">
                  <h1 style="font-size:15px;">${value.course_name}</h1>
                  <p style="font-size: 16px;color: #2c4754;">What you'll learn</p>
                  <p style="font-size: 16px;color: #2c4754;">${value.duration} | ${value.fee}</button></p>
                  ${value.feature}
               </div>
            </div>`);
               });
               i++;
            }
         },
      });
   }
   loadAllCoursesDetails();
</script>