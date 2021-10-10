<?php include 'include/header.php'; ?>

<!-- end Header -->

<!-- Start Banner -->
<!-- <div class="inner-banner contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <h1>Contact Us</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-lg-3"> <a href="apply-online.html" class="apply-online clearfix">
                        <div class="left clearfix"> <span class="icon"><img src="images/apply-online-sm-ico.png" class="img-responsive" alt=""></span> <span class="txt">Apply Online</span> </div>
                        <div class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                        </a></div>
                </div>
            </div>
        </div> -->
<!-- End Banner -->
<div class="inner-banner contact">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-lg-9">
        <div class="content">
          <h1>Contact Us</h1>
          <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
        </div>
      </div>
      <!--<div class="col-sm-4 col-lg-3"> <a href="apply-online.html" class="apply-online clearfix">-->
      <!--    <div class="left clearfix"> <span class="icon"><img src="images/apply-online-sm-ico.png" class="img-responsive" alt=""></span> <span class="txt">Apply Online</span> </div>-->
      <!--    <div class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>-->
      <!--    </a></div>-->
    </div>
  </div>
</div>
<!-- Start Contact Us -->
<section class="form-wrapper padding-lg">
  <div class="container">
    <div id="contact_alert_message"></div>
    <form id="contact_form">
      <div class="row input-row">
        <div class="col-sm-6">
          <input name="fname" type="text" pattern="[A-Za-z]{1,20}" placeholder="First Name" title="First name should contain only letter" required />
        </div>
        <div class="col-sm-6">
          <input name="lname" type="text" pattern="[A-Za-z]{1,20}" placeholder="Last Name" title="Last name should contain only letter" required />
        </div>
      </div>
      <div class="row input-row">
        <div class="col-sm-6">
          <input name="phone" type="tel" pattern="[6-9]{1}[0-9]{9}" placeholder="Phone Number" title="Enter valid phone number" required />
        </div>
        <div class="col-sm-6">
          <input name="email" type="email" title="Enter valid email" placeholder="Email" required />
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <input type="submit" class="btn" value="Contact" style="width: fit-content;" />
        </div>
      </div>
    </form>
  </div>
</section>
<!-- end Contact Us -->

<!-- Start Google Map -->
<section class="google-map">
  <div id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.83808241413!2d77.03831071432468!3d28.634614540739154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d0516b09b5ccf%3A0xef0f46e431382a47!2sSai%20Enclave%2C%20Block%20N%203%2C%20Mohan%20Garden%2C%20Razapur%20Khurd%2C%20Delhi%2C%20110059!5e0!3m2!1sen!2sin!4v1631372471312!5m2!1sen!2sin" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
  </div>
  <div class="container">
    <div class="contact-detail">
      <div class="address">
        <div class="inner">
          <h3>Tech Classes</h3>
          <p>Sai enclave, Mohan garden, New Delhi - 110059</p>
        </div>
        <div class="inner">
          <h3>8375041361</h3>
        </div>
        <div class="inner">
          <a href="mailto:satyamshivam570@gmail.com@gmail.com">satyamshivam570@gmail.com</a>
        </div>
      </div>
      <div class="contact-bottom">
        <ul class="follow-us clearfix">
          <li>
            <a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          </li>
          <li>
            <a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          </li>
          <li>
            <a href="#" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- End Google Map -->
<script>
  $(document).ready(function() {
    $("#contact_form").on("submit", function(e) {
      e.preventDefault();
      //alert($('#contact_form').serialize());
      //console.log($('#contact_form').serialize());
      //$('#response').html($('#contact_form').serialize());
      $.ajax({
        url: "<?php echo base_url(); ?>admin/contactinsert",
        method: "POST",
        dataType: "JSON",
        data: new FormData(this),
        contentType: false,
        //cache:false,
        processData: false,
        success: function(data) {
          //console.log(data);
          // console.log(data.status);
          // console.log(data.message);
          if (data.status == true) {
            $("#contact_form").trigger("reset");
            $("#contact_alert_message").html("<div class='alert alert-success alert-dismissible fade in'>" +
              "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + data.message + "</div>");
          }
        },
      });
    });
  });
</script>
<!-- Start Footer -->
<?php include 'include/footer.php' ?>
<!-- End Footer -->