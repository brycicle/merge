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
     <!-- animation search -->
 <script>
    let inputBox = document.querySelector(".input-box"),
        searchIcon = document.querySelector(".icon"),
        closeIcon = document.querySelector(".close-icon");
    searchIcon.addEventListener("click", () => inputBox.classList.add("open"));
    closeIcon.addEventListener("click", () => inputBox.classList.remove("open"));
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