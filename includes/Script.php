
 <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="assets/vendors/chartjs/Chart.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="assets/js/material.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
   <!-- View Image -->
    <script type="text/javascript">
        document.querySelectorAll('.image').forEach(image =>{
            image.onclick = () =>{
                document.querySelector('.popup-image').style.display = 'block';
                document.querySelector('.popup-image img').src = image.getAttribute('src');
            }
        });
        document.querySelector('.popup-image span').onclick = () =>{
            document.querySelector('.popup-image').style.display = 'none';
        }
    </script>
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Script Approve -->
    <script>
        $(document).ready(function() {
            $('.approvebtn').on('click', function (){

                $('#approvemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#approve_id').val(data[0]);
            });
        });
    </script>
    <!-- Script Decline -->
    <script>
        $(document).ready(function() {
            $('.declinebtn').on('click', function (){

                $('#declinemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#decline_id').val(data[0]);
            });
        });
    </script>
    <!-- Old Password -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('.password').keyup(function (e){
                
                var password = $('.password').val();
                // alert(password);
                $.ajax({
                    type: "POST",
                    url: "Check_old_pass.php",
                    data: {
                        "check_submit_btn": 1,
                        "old_pass_text": password,
                    },
                    success: function (response) {
                        // alert(response);
                        $('.availability').text(response);
                        
                    }
                });
            });
        });
    </script>
    <!-- Seacrh for Block -->
    <script>
        function liveSearch() {
            var input = document.getElementById("searchInput").value;
            if (input === "") {
                document.getElementById("searchResults").innerHTML = "";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("searchResults").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "Search.php?q=" + input, true);
            xmlhttp.send();
        }
    </script>
    <!-- Sweet alert js -->
    <script src="js/sweetalert.min.js"></script>
    <?php 
        if(isset($_SESSION['status']) && $_SESSION['status'] !=''){ ?>
            <script>
                swal({
                title: "<?php echo $_SESSION['status']; ?>",
                // text: "You clicked the button!",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Done!",
                });
            </script>
            <?php
            unset($_SESSION['status']);
        }
    ?>
    <!-- Validation -->
    <script>
        (function () {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }

                form.classList.add('was-validated')
              }, false)
            })
        })()
    </script>
    <!-- Franchise limit 3 -->
    <script>
       const maxCheckboxes = 3;

       const checkboxes = document.querySelectorAll('input[name="franchise[]"]');
       let checkedCount = 0;

       checkboxes.forEach(checkbox => {
           checkbox.addEventListener('change', () => {
             if (checkbox.checked) {
                checkedCount++;
             } else {
                checkedCount--;
             }

             if (checkedCount > maxCheckboxes) {
                checkbox.checked = false;
                checkedCount--;
             }
          });
        });
    </script>


<?php
        $username = $_SESSION['username'];
        $sql = mysqli_query($conn, "SELECT * FROM genealogy WHERE username='$username'");

        $act1 = 0;
            $act2 = 0;
            $act3 = 0;
            $usepie = 0;
            $available = 14;

        while ($row = mysqli_fetch_array($sql)) {
            $sponsorid = $row['accountid'];


            $id2 = [$sponsorid];

            for ($i = 0; $i <= 3; $i++) {
                $temp_id_index = 0;
                $divide = pow(2, $i);

                for ($d = 0; $d < $divide; $d++) {
                    if (!empty($id2[$d])) {
                        $print_id = $id2[$d];
                        if ($i == 1) {
                            $act1++;
                            $usepie++;
                        } elseif ($i == 2) {
                            $act2++;
                            $usepie++;
                        } elseif ($i == 3) {
                            $act3++;
                            $usepie++;
                        }
                        

                        // Fetching left and right data directly in SQL query
                        $stmt = mysqli_prepare($conn, "SELECT leftdownlineid, rightdownlineid FROM genealogy WHERE accountid = ?");
                        mysqli_stmt_bind_param($stmt, "s", $print_id);
                        mysqli_stmt_execute($stmt);

                        if (!$stmt) {
                            die("Error: " . mysqli_error($conn));
                        }

                        mysqli_stmt_bind_result($stmt, $leftdownlineid, $rightdownlineid);
                        mysqli_stmt_fetch($stmt);

                        mysqli_stmt_close($stmt);

                        // Add the left and right downline IDs to the temp_id array
                        $temp_id[$temp_id_index] = $leftdownlineid;
                        $temp_id_index++;
                        $temp_id[$temp_id_index] = $rightdownlineid;
                        $temp_id_index++;
                    }
                }
                // Update $id2 with $temp_id
                $id2 = $temp_id;
            }
            
        }
$available = $available - $usepie;

?>
<!-- Pie Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Use',     <?php echo $usepie ?>],
          ['Available',  <?php echo $available ?>],
        ]);

        var options = {
          title: 'Pie Chart',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Account', 'Members'],
                ['Account 1', <?php  echo $act1 ?>],
                ['Account 2', <?php  echo $act2 ?>],
                ['Account 3', <?php  echo $act3 ?>]
            ]);

            var options = {
                chart: {
                    title: 'Column Chart',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    
    <!-- Referral Link -->
    <script>
        function copyToClipboard() {
            var copyText = document.getElementById("referral-link");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
        }
    </script>
    <!-- Alertify Js -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        <?php if(isset($_SESSION['message'])){ ?>
        alertify.set('notifier','position', 'top-right');
        alertify.success('<?= $_SESSION['message']; ?>');
        <?php 
        unset($_SESSION['message']);
        }
        ?>
    </script>
    <!-- Payment Display Live -->
    <script>
        $(document).ready(function() { 
            setInterval(function() {
                $.ajax({
                    url: 'Payment_display.php',
                    success: function(data) {
                        $('#Payment_display').html(data);
                    }
                });
            }, 5000);
        });
    </script>
<!-- Old Password -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $('.password').keyup(function (e){
                
            var password = $('.password').val();
            // alert(password);
            $.ajax({
                type: "POST",
                url: "Check_old_pass.php",
                data: {
                    "check_submit_btn": 1,
                    "old_pass_text": password,
                },
                success: function (response) {
                    // alert(response);
                    $('.availability').text(response);
                        
                }
            });
        });
    });
</script>
    
