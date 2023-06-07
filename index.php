<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>The Gauhati High Court</title>
</head>


<body>

    <?php

    function fetch_district()
    {
        $i = 0;
        include "./connection/db.php";
        $sql = "select district_t.dist_code,district_t.dist_name from district_t where district_t.state_id=18";
        $data = pg_query($dbconn, $sql);
        $result = pg_fetch_all($data);

        for ($i = 0; $i < count($result); $i++) {
            $val = $result[$i]['dist_code'];
            $name = str_replace("'", "", $result[$i]['dist_name']);
            $dis = "<option value='" . $val . "'>" . $name . "</option>";

            echo $dis;
        }
    }








    ?>
    <div class="container">
        <div class="row" style="margin-top: 45px;">
            <div class="col-md-12 " style="border: 1px solid black;height: auto;border: 1px solid black;padding: 24px;">
                <h5>Case Tracking with FIR</h5>
                <div style="border: 1px solid #1d785b;height: auto;">
                    <div style="background-color: #1d785b;padding: 1px;">
                        <p style="color: aliceblue;font-weight: 400;margin-left: 3px;">Enter FIR Details</p>
                    </div>
                    <div class="row" style="padding:10px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>District</label>
                                <select class="form-control" id="dis" required>
                                    <option value="">Select District</option>
                                    <?php
                                    fetch_district();


                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Police Station</label>
                                <select id="police" class="form-control" required>

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row" style="padding:10px">
                        <div class="col-md-6" style="margin-left:-12px ;">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">FIR NO<span style="color: red;"> *</span></label>
                                <input type="text" id="fir_no" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-left:-3px ;">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">FIR Year<span style="color: red;"> *</span></label>
                                <input type="text" id="fir_year" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center;margin-top: 8px;margin-bottom: 4px;">
                        <button class="btn" id="search" style="background-color: #1d785b;color: aliceblue;">Search</button>
                        <button id="exit"class="btn btn-danger">Exit</button>
                    </div>

                </div>

            </div>

        </div>

        <!-- <div class="row">

            <div class="col-md-12" style="text-align: center;border: 1px solid black;height: auto;margin-top: 23px;">
                <p style="font-weight: 800;"><u>Party details</u></p>
                <p style="font-size: larger;font-weight: 600;" id="case_status">Case No. : WP(C)234/2022,Petitioner/Complainent-versus Respondents/Opposite party</p>

            </div>

        </div> -->
        <div class="row">


            <div class="col-md-12" style="border: 1px solid black;height: auto;margin-top: 23px;" id="case_table">
                <div>
                    <P style="text-align: center;font-size: larger;font-weight: 500;"><u>Total cases found against the above FIR</u></P>
                </div>
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Sl No</th>
                                <th scope="col">Case No.</th>
                                <th scope="col">Party name</th>
                                <th scope="col">Regn Date</th>
                                <th scope="col">Orders</th>
                            </tr>
                        </thead>
                        <tbody id="case_details">

                        </tbody>
                    </table>
                </div>


            </div>

        </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>


<script>
    $(document).ready(function(){
        $("#case_table").hide();
    });
    $(document).on('change', '#dis', function() {
        var id = this.value;
        $('#police').html("");
        $.ajax({

            // Our sample url to make request
            url: './get_police.php',

            // Type of Request
            type: "GET",
            data: {
                id: id
            },

            // Function to call when to
            // request is ok
            success: function(data) {
                console.log(data)
                $.each(JSON.parse(data), function(key, value) {
                    $('#police').append(`<option value="${value.police_st_code}">${value.police_st_name}</option>`)
                })
            },

            // Error handling
            error: function(error) {
                console.log(`Error ${error}`);
            }
        });



    })
    $(document).on('click', '#search', function() {
        var dis = $("#dis").val();
        var police = $("#police").val();
        var fir_no = $("#fir_no").val();
        var fir_year = $("#fir_year").val();
        $('#case_details').html('');
        if (!dis || !police || !fir_no || !fir_year) {
            alert("Please select all fields")
        } else {
            $.ajax({

                // Our sample url to make request
                url: './get_case_data.php',

                // Type of Request
                type: "POST",
                data: {
                    dis,
                    police,
                    fir_no,
                    fir_year
                },

                // Function to call when to
                // request is ok
                success: function(data) {
                    $('#case_table').show();
                    console.log(data.error)
                    $.each(JSON.parse(data), function(key, value) {
                        var date = new Date(value.dt_regis);
                            if (!isNaN(date.getTime())) {

                                var month = date.getMonth() + 1
                               var date_d= date.getDate() + '/' + month + '/' + date.getFullYear();
                            }
                      
                        $('#case_details').append(`<tr><td>${key+1}</td><td>${value.type_name}/${value.reg_no}/${value.reg_year}</td><td>${value.pet_name} vs ${value.res_name}</td><td>${date_d}</td><td><button type="button" class="btn btn-secondary">View</button></td></tr>`)
                    })

                },

                // Error handling
                error: function(error) {
                    console.log(`Error ${error}`);
                }
            });
        }

    })



    $(document).on('click',"#exit",function(){
        $('#case_table').hide('');
        $("#dis").val('');
         $("#police").val('');
         $("#fir_no").val('');
        $("#fir_year").val('');
    })
</script>