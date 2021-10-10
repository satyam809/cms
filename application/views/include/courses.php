<!-- Start Our Importance Section -->
<style>
    .card {
        position: relative;

        height: 170px;
        background: url("https://image.freepik.com/free-vector/colorful-gradient-liquid-shapes-background_23-2148250143.jpg"),
            #ffffff;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 25px;
        margin: 10px;
        transition: 0.25s ease-in;
    }

    .card .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;
        height: 170px;
        background: linear-gradient(120.55deg,
                rgba(39, 39, 39, 0.38) 0%,
                rgba(39, 39, 39, 0.2394) 100%);
        border-radius: 25px;
    }

    .card .content {
        position: absolute;
        bottom: 45px;
        left: 95px;
    }

    .card .content h4 {
        font-family: Ubuntu;
        font-style: normal;
        font-weight: bold;
        font-size: 18px;
        color: #f2f2f2;
        margin-bottom: 10px;
        margin-top: 0;
    }

    .card .content h6 {
        font-family: Ubuntu;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        color: #f2f2f2;
        margin-bottom: 10px;
        margin-top: 0;
    }

    .card .fav {
        position: absolute;
        top: 25px;
        right: 25px;
        cursor: pointer;
    }

    .card .fav i {
        color: white;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card:hover {
        background-position: top;
    }
</style>
<section class="our-cources padding-lg">
    <h2 style="text-align: center;">Our Courses</h2>
    <div class="container">

        <div class="row justify-content-center" id="coursesFetch">


        </div>
    </div>
</section>
<!-- End Our Importance Section -->
<script type="text/javascript">
    // fetch course
    function loadCourses() {
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
                        $("#coursesFetch").append(`<div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="overlay"></div>
                                <div class="content">
                                    <h4>${value.course_name}</h4>
                                    <h6>${value.duration} | ${value.fee}</h6>
                                </div>
                            </div>
                        </div>`);
                    });
                    i++;
                }
            },
        });
    }
    loadCourses();
</script>