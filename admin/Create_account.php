<?php 
	session_start();
	include "msqliconnect/connect.php";
	include "includes/Header.php";
	include "includes/Navbar.php";
	include "includes/Topbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell--span-12">
               	<div class="mdc-card">
                  	<h6 class="card-title">Create Account</h6>
                  	<hr>
                  	<form action="Create_account_code.php" method="POST">
                  		<div class="template-demo">
                    		<div class="mdc-layout-grid__inner">

                      			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                        			<div class="mdc-text-field mdc-text-field--outlined">
                          				<input class="mdc-text-field__input" type="text" name="fname" id="text-field-hero-input">
                          				<div class="mdc-notched-outline">
                            				<div class="mdc-notched-outline__leading"></div>
                            				<div class="mdc-notched-outline__notch">
                              					<label for="text-field-hero-input" class="mdc-floating-label">First Name</label>
                            				</div>
                           					<div class="mdc-notched-outline__trailing"></div>
                          				</div>
                    				</div>
                      			</div>

                      			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                        			<div class="mdc-text-field mdc-text-field--outlined">
                          				<input class="mdc-text-field__input" type="text" name="lname" id="text-field-hero-input">
                          				<div class="mdc-notched-outline">
                            				<div class="mdc-notched-outline__leading"></div>
                            				<div class="mdc-notched-outline__notch">
                              					<label for="text-field-hero-input" class="mdc-floating-label">Last Name</label>
                            				</div>
                            				<div class="mdc-notched-outline__trailing"></div>
                      					</div>
                        			</div>
                     			</div>

                      			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                       	 			<div class="mdc-text-field mdc-text-field--outlined">
                          				<input class="mdc-text-field__input" type="text" name="address" id="text-field-hero-input">
                          				<div class="mdc-notched-outline">
                            				<div class="mdc-notched-outline__leading"></div>
                            				<div class="mdc-notched-outline__notch">
                              					<label for="text-field-hero-input" class="mdc-floating-label">Address</label>
                            				</div>
                            				<div class="mdc-notched-outline__trailing"></div>
                          				</div>
                        			</div>
                      			</div>
           			
                      			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                        			<div class="mdc-text-field mdc-text-field--outlined">
                          				<input class="mdc-text-field__input" type="email" name="email" id="text-field-hero-input">
                          				<div class="mdc-notched-outline">
                            				<div class="mdc-notched-outline__leading"></div>
                            				<div class="mdc-notched-outline__notch">
                              					<label for="text-field-hero-input" class="mdc-floating-label">Email</label>
                            				</div>
                            				<div class="mdc-notched-outline__trailing"></div>
                          				</div>
                        			</div>
                      			</div>

                      			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                        			<div class="mdc-text-field mdc-text-field--outlined">
                          				<input class="mdc-text-field__input" type="number" name="contact" id="text-field-hero-input">
                          				<div class="mdc-notched-outline">
                            				<div class="mdc-notched-outline__leading"></div>
                            				<div class="mdc-notched-outline__notch">
                              					<label for="text-field-hero-input" class="mdc-floating-label">Contact</label>
                            				</div>
	                            			<div class="mdc-notched-outline__trailing"></div>
	                          			</div>
                        			</div>
                      			</div>

                      			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                        			<div class="mdc-text-field mdc-text-field--outlined">
                          				<input class="mdc-text-field__input" type="text" name="accountid" id="text-field-hero-input">
                          				<div class="mdc-notched-outline">
                            				<div class="mdc-notched-outline__leading"></div>
                            				<div class="mdc-notched-outline__notch">
                              					<label for="text-field-hero-input" class="mdc-floating-label">Account ID</label>
                            				</div>
                        					<div class="mdc-notched-outline__trailing"></div>
                      					</div>
                        			</div>
                      			</div>

                      			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                        			<div class="mdc-text-field mdc-text-field--outlined">
                         				<input class="mdc-text-field__input" type="text" name="uplineid" id="text-field-hero-input">
                          				<div class="mdc-notched-outline">
                            				<div class="mdc-notched-outline__leading"></div>
                            				<div class="mdc-notched-outline__notch">
                              					<label for="text-field-hero-input" class="mdc-floating-label">Upline ID (Optional)</label>
                            				</div>
                        					<div class="mdc-notched-outline__trailing"></div>
                          				</div>
                        			</div>
                      			</div>


                      			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                        			<div class="mdc-text-field mdc-text-field--outlined">
                          				<input class="mdc-text-field__input" type="text" name="groupid" id="text-field-hero-input">
                          				<div class="mdc-notched-outline">
                            				<div class="mdc-notched-outline__leading"></div>
                    						<div class="mdc-notched-outline__notch">
                              					<label for="text-field-hero-input" class="mdc-floating-label">Group ID (Optional)</label>
                            				</div>
                            				<div class="mdc-notched-outline__trailing"></div>
                          				</div>
                        			</div>
                      			</div>

                      			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                        			<div class="mdc-text-field mdc-text-field--outlined">
                          				<input class="mdc-text-field__input" type="text" name="limitedadminid" id="text-field-hero-input">
                          				<div class="mdc-notched-outline">
                            				<div class="mdc-notched-outline__leading"></div>
                            				<div class="mdc-notched-outline__notch">
                              					<label for="text-field-hero-input" class="mdc-floating-label">Limited-admin ID (Optional)</label>
                            				</div>
                            				<div class="mdc-notched-outline__trailing"></div>
                          				</div>
                        			</div>
                      			</div>

                 	 			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                        			<div class="mdc-text-field mdc-text-field--outlined">
                        				<select class="form-select mdc-text-field__input" name="usertype" aria-label="Default select example">
                        					<option selected>User Type</option>
							  				<option value="admin">Admin</option>
							  				<option value="limited_admin">Limited Admin</option>
						  					<option value="head_account">Head Account</option>
										</select>
                        
                          			</div>
                        		</div>

                       			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                    				<div class="mdc-text-field mdc-text-field--outlined">
                      					<input class="mdc-text-field__input" type="text" name="username" id="text-field-hero-input">
                          				<div class="mdc-notched-outline">
                            				<div class="mdc-notched-outline__leading"></div>
                            				<div class="mdc-notched-outline__notch">
                              					<label for="text-field-hero-input" class="mdc-floating-label">User Name</label>
                            				</div>
	                            			<div class="mdc-notched-outline__trailing"></div>
	                          			</div>
                        			</div>
                      			</div>

                       			<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                        			<div class="mdc-text-field mdc-text-field--outlined">
                          				<input class="mdc-text-field__input" type="password" name="password" id="text-field-hero-input">
                          				<div class="mdc-notched-outline">
                            				<div class="mdc-notched-outline__leading"></div>
                            				<div class="mdc-notched-outline__notch">
                              					<label for="text-field-hero-input" class="mdc-floating-label">Password</label>
                            				</div>
	                            			<div class="mdc-notched-outline__trailing"></div>
	                          			</div>
                        			</div>
                      			</div>
                      		</div>
                      		<hr>
                      		<button type="submit" class="btn btn-primary col-sm-2 offset-md-5" name="submit">Submit</button>
                   	 	</div>
                   	</form>
                </div>    
            </div>
        </div>
    </div>
	<?php 
		include "includes/Script.php";
		include "includes/Footer.php";
	?>
</body>
</html>