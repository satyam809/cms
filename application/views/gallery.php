        <!-- Start Header -->
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
        <section class="campus-tour padding-lg container">

            <!-- gallery filter -->

            <!-- end filter -->

            <ul class="gallery clearfix isotopeContainer" id="galleryAllImages">

            </ul>
            <div class="text-center">
                <ul class="pagination blue">
                    <li> <a href="#" aria-label="Previous"> <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</span> </a> </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li> <a href="#" aria-label="Next"> <span aria-hidden="true">Next <i class="fa fa-angle-right" aria-hidden="true"></i></span> </a> </li>
                </ul>
            </div>
        </section>
        <!-- End Campus Tour -->

        <!-- Start Footer -->
        <?php include 'include/footer.php'; ?>
        <!-- End Footer -->
        <script type="text/javascript">
            // fetch gallery
            function loadAllGalleryImages() {
                $.ajax({
                    url: "http://localhost/myproject/ims/admin/api/gallery/galleryImagesFetch.php",
                    dataType: "json",
                    success: function(data) {
                        //console.log(data);
                        if (data.status == false) {
                            $("#galleryAllImages").append("<b>" + data.message + "</b>");
                        } else {
                            var i = 1;
                            $.each(data, function(key, value) {
                                $("#galleryAllImages").append(` <li class="isotopeSelector contest">
                        <div class="overlay">

                            <a class="galleryItem" href="http://localhost/myproject/ims/admin/images/${value.images}"><span class="icon-enlarge-icon"></span></a>
                        </div>
                        <figure><img src="http://localhost/myproject/ims/admin/images/${value.images}" class="img-responsive" alt=""></figure>
                    </li>`);
                            });
                            i++;
                        }
                    },
                });
            }
            loadAllGalleryImages();
        </script>