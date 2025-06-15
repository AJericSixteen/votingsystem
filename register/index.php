
<?php include ('head.php');?>
<head>    
	<!-- Custom favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<head>
	
</head>
<body>

<?php
	function passFunc($len, $set = "")
		{
			$gen = "";
			for($i = 0; $i < $len; $i++)
				{
					$set = str_shuffle($set);
					$gen.= $set[0];
				}
			return $gen;
		}

?>
  <?php include ('side_bar.php');?>
    <div id="wrapper">

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"> 
					<a href="../admin/voters.php" id="back" class = "btn btn-warning" style="margin-top:10px;"><i class = "fa fa-refresh"></i> Back</a>
                    <h3 class="page-header">Registration</h3>
                </div>
				<div class = "well col-lg-5">
					<div class="panel panel-green">
                        <div class="panel-heading">
                            Please Enter the Details Needed Below
                        </div>
                        <div class="panel-body">
                         <form method = "post" enctype = "multipart/form-data">
											<div class="form-group">
												<label>Student Number</label>
												<input class ="form-control" type = "text" name = "id_number" placeholder = "Student Number" required="true">

											</div>

											<div class="form-group">
											<?php
													$change =  passFunc(8, 'abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNOPQRSTUVWXYZ1234567890');
											?>
												<label>Password</label>
													<input class="form-control"  type = "text" name = "password" id = "pass" required="true" readonly="readonly" />
													<input type = "button" value = "Generate" onclick = "document.getElementById('pass').value = '<?php echo $change?>'">
											</div>

											<div class="form-group">
												<label>Firstname</label>
													<input class="form-control" type ="text" name = "firstname" placeholder="Firstname" required="true">
											</div>
											<div class="form-group">
												<label>Lastname</label>
													<input class="form-control"  type = "text" name = "lastname" placeholder="Please enter lastname" required="true">
											</div>

											<div class="form-group">
												<label>Year Level</label>
													<select class = "form-control" name = "year_level">
														<option></option>
														<option>1st Year</option>
														<option>2nd Year</option>
														<option>3rd Year</option>
														<option>4th Year</option>

													</select>
											</div>

											 	 <button name = "save" type="submit" class="btn btn-primary">Save Data</button>

						  				 </div>


										</form>

							<?php
								require 'dbcon.php';

								if (isset($_POST['save'])){
									$firstname=$_POST['firstname'];
									$lastname=$_POST['lastname'];
									$id_number=$_POST['id_number'];
									$year_level=$_POST['year_level'];
									$password = $_POST['password'];


									$query = $conn->query("SELECT * FROM voters WHERE id_number='$id_number'") or die (mysql_error());
									$count = $query->fetch_array();

									if ($count  > 0){
									?>
										<script>
											alert("Student Number Already Exist");
										</script>
									<?php
										}
										else{
										$conn->query("insert into voters(id_number, password, firstname,lastname,year_level,status) VALUES('$id_number', '$password','$firstname','$lastname','$year_level','Unvoted')");
									?>
									<script>
										alert('Voters Successfully Save');
									</script>
							<?php
									}
								}
							?>


						</div>
						</form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include ('script.php');?>
</body>

</html>
