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
<!-- request Approve -->
<script>
  	$(document).ready(function() {
        $('.approvebtn').on('click', function (){
            $('#approvemodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            // Get the 'upload' attribute value using the .attr() method
            var uploadValue = $tr.find("td[data-label='Receipt'] img").attr("src");
            uploadValue = uploadValue.replace(/\.\.\//g, '');

            console.log(data);

            $('#approve_id').val(data[0]);
            $('#user_id').val(data[1]);
           
            $('#upline_id').val(data[4]);
            $('#sponsor_id').val(data[3]);
            $('#position').val(data[5]);
            $('#ref_num').val(data[6]);

            // Set the 'upload' attribute value to the appropriate element
            $('#upload').val(uploadValue);

            $('#amount').val(data[8]);
            $('#description').val(data[9]);
            $('#username').val(data[10]);
            $('#status').val(data[11]);
             $('#limitedadminid').val(data[12]);
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
<?php if(isset($_SESSION['status']) && $_SESSION['status'] !=''){ ?>
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
<!-- Edit Franchise -->
<script>
    $(document).ready(function() {
        $('.editbtn').on('click', function (){
            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

           	console.log(data);

            $('#edit_id').val(data[0]);
            $('#franchise').val(data[1]);
              
        });
    });
</script>
<!-- Delete Franchise -->
<script>
    $(document).ready(function() {
        $('.deletebtn').on('click', function (){
           	$('#deletemodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

           	console.log(data);

            $('#delete_id').val(data[0]);
              
        });
    });
</script>
<!-- Approve SI ACCOUNT -->
<script>
    $(document).ready(function() {
        $('.approvesibtn').on('click', function (){
            $('#approvesimodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
           	}).get();

            console.log(data);

            $('#si_id').val(data[0]);
            $('#si_payment').val(data[4]);
              
        });
    });
</script>
<!--  SI declined -->
<script>
    $(document).ready(function() {
        $('.declinesibtn').on('click', function (){
            $('#declinesimodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#sid_id').val(data[0]);
            $('#username').val(data[3]);
              
        });
    });
</script>
<!--  SI form delete pdf -->
<script>
    $(document).ready(function() {
        $('.sideletebtn').on('click', function (){
            $('#sideletemodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

           	$('#form_id').val(data[0]);
              
        });
    });
</script>
<!--  Edit Mode of Payment -->
<script>
    $(document).ready(function() {
        $('.edit-btn').on('click', function (){
            $('#edit-btnmodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#mode_of_payment_id').val(data[0]);
            $('#bank_name').val(data[1]);
            $('#account_name').val(data[2]);
            $('#account_num').val(data[3]);
            $('#amount').val(data[4]);
              
        });
    });
</script>
<!--  Delete Mode of Payment -->
<script>
    $(document).ready(function() {
        $('.delete-btn').on('click', function (){
            $('#delete-btnmodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#mode_of_payment_delete_id').val(data[0]);
        });
    });
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
<!-- Approval Encashment -->
<script>
    $(document).ready(function() {
        $('.encashmentapprovebtn').on('click', function (){
            $('#encashmentapprovedmodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#encashmentapproved_id').val(data[0]);
            $('#tax').val(data[5]);
            $('#net_balance').val(data[6]);

        });
    });
</script>
<!--  Edit Commission -->
<script>
    $(document).ready(function() {
        $('.edit_commission_btn').on('click', function (){
            $('#edit_commission_btnmodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#commission_id').val(data[0]);
            $('#DRB').val(data[1]);
            $('#pairing_bonus').val(data[2]);
            $('#admin_fee').val(data[3]);
            $('#si_payment').val(data[4]);
              
        });
    });
</script>
<!-- Withdrawal -->
<script>
    const withdrawalForm = document.getElementById("withdrawalForm");

    withdrawalForm.addEventListener("submit", function (event) {
        const selectedWithdraw = document.querySelector('input[name="selected_withdraw"]:checked');

        if (!selectedWithdraw) {
            event.preventDefault(); // Prevent form submission
            alert("Please select an withdraw type.");
        } else {
            const action = selectedWithdraw.getAttribute("data-action");
            withdrawalForm.setAttribute("action", action);
        }
    });
</script>
<!-- Search table -->
<script>  
      $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#data_table tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show($);
                          

                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  

      });  
 </script> 
 <!-- animation search -->
 <script>
            let inputBox = document.querySelector(".input-box"),
                searchIcon = document.querySelector(".icon"),
                closeIcon = document.querySelector(".close-icon");
            searchIcon.addEventListener("click", () => inputBox.classList.add("open"));
            closeIcon.addEventListener("click", () => inputBox.classList.remove("open"));
        </script>
<!-- Clock -->
<script type="text/javascript">
    // Get references to DOM elements
    const body = document.querySelector("body"),
    hourHand = document.querySelector(".hour"),
    minuteHand = document.querySelector(".minute"),
    secondHand = document.querySelector(".second"),
    modeSwitch = document.querySelector(".mode-switch");

    // check if the mode is already set to "Dark Mode" in localStorage
    if (localStorage.getItem("mode") === "Dark Mode") {
        // add "dark" class to body and set modeSwitch text to "Light Mode"
        body.classList.add("dark");
    modeSwitch.textContent = "Light Mode";
    }

    // add a click event listener to modeSwitch
    modeSwitch.addEventListener("click", () => {
        // toggle the "dark" class on the body element
        body.classList.toggle("dark");
        // check if the "dark" class is currently present on the body element
        const isDarkMode = body.classList.contains("dark");
        // set modeSwitch text based on "dark" class presence
        modeSwitch.textContent = isDarkMode ? "Light Mode" : "Dark Mode";
        // set localStorage "mode" item based on "dark" class presence
        localStorage.setItem("mode", isDarkMode ? "Dark Mode" : "Light Mode");
    });

    const updateTime = () => {
        // Get current time and calculate degrees for clock hands
        let date = new Date(),
        secToDeg = (date.getSeconds() / 60) * 360,
        minToDeg = (date.getMinutes() / 60) * 360,
        hrToDeg = (date.getHours() / 12) * 360;

        // Rotate the clock hands to the appropriate degree based on the current time
        secondHand.style.transform = `rotate(${secToDeg}deg)`;
        minuteHand.style.transform = `rotate(${minToDeg}deg)`;
        hourHand.style.transform = `rotate(${hrToDeg}deg)`;
    };

    // call updateTime to set clock hands every second
    setInterval(updateTime, 1000);

    //call updateTime function on page load
    updateTime();
</script>