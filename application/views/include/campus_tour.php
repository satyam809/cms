<!-- Start Campus Tour Section -->
<section class="campus-tour padding-lg">
    <div class="container">
        <h2>
            <span>Our campus have a lot to offer for our students</span>TAKE A CAMPUS
            TOUR
        </h2>
    </div>
    <ul class="gallery clearfix" id="galleryImages">

    </ul>
</section>
<!-- End Campus Tour Section -->
<script type="text/javascript">
    // fetch gallery
    function loadGalleryImages() {
        $.ajax({
            url: "http://localhost/myproject/ims/admin/api/gallery/galleryImagesFetch.php",
            dataType: "json",
            success: function(data) {
                //console.log(data);
                if (data.status == false) {
                    $("#galleryImages").append("<b>" + data.message + "</b>");
                } else {
                    var i = 1;
                    $.each(data, function(key, value) {
                        $("#galleryImages").append(`<li>
                <div class="overlay">
                    <a class="galleryItem" href="http://localhost/myproject/ims/admin/images/${value.images}"><span class="icon-enlarge-icon"></span></a>
                    </div>
                    <figure><img src="http://localhost/myproject/ims/admin/images/${value.images}" class="img-responsive" alt=""/>
                    </figure>
                </li>`);
                    });
                    i++;
                }
            },
        });
    }
    loadGalleryImages();
</script>