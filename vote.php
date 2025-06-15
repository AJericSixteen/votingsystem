<?php include('head.php');?>
<?php include("sess.php")?>
<body>
    <div id="wrapper">
        <?php include ('side_bar.php');?>
    </div>
	<form method = "POST" action = "vote_result.php">
    <div class="text-center">
      <p class="text-info h3">Read the Instructions below:</p>
      <p class="text-danger h4">Click the checkbox of your selected candidate</p>
    </div>
          <!-- PRESIDENT SECTION -->

            <div class="panel panel-primary">
                <div class="panel-heading">
                  <center><h3><b>PRESIDENT</b></h3></center>
                </div>
            <div class="row-fluid justify-content-center">
            <div class="panel-body" style="background-color:#fff;">


						<?php
							$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'President'") or die(mysqli_errno());
							while($fetch = $query->fetch_array())
						{
						?>

              <div class="col-sm-3 text-center">
							<img class="rounded-circle" src = "admin/<?php echo $fetch['img']?>" style ="border-radius:6px;" height = "150px" width = "150px">
              <br/>
  						<button type="button" class="btn btn-default disabled btn-danger btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
              <br/>
              <button type="button" class="btn btn-default disabled btn-primary btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['party']?></button>
              <br/><br/>
  						<input type = "checkbox" value = "<?php echo $fetch['candidate_id'] ?>" name = "pres_id" class = "president"></p>
              </div>

						<?php
							}
						?>
                </div>
						  </div>
            </div>
          <!-- VICE PRESIDENT SECTION -->

              <div class="panel panel-primary">
                  <div class="panel-heading">
                    <center><h3><b>VICE PRESIDENT - INTERNAL</b></h3></center>
                  </div>
              <div class="panel-body" style = "background-color:#fff;">
                <div class="row-fluid justify-content-center">

						<?php
							$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Vice President - Internal'") or die(mysqli_errno());
							while($fetch = $query->fetch_array())
              {
						?>

                  <div class="col-sm-3 text-center">
    							<img class="rounded-circle" src = "admin/<?php echo $fetch['img']?>" style ="border-radius:6px;" height = "150px" width = "150px">
                  <br/>
      						<button type="button" class="btn btn-default disabled btn-danger btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
                  <br/>
                  <button type="button" class="btn btn-default disabled btn-primary btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['party']?></button>
                  <br/>
                  <input type = "checkbox" value = "<?php echo $fetch['candidate_id'] ?>" name = "vpinternal_id" class = "vpinternal">
              		</div>

						<?php
							}
						?>

                    </div>
                </div>
            </div>
          <!-- SECRETARY SECTION -->

	      <div class="panel panel-primary">
            <div class="panel-heading">
			           <center><h3><b>VICE PRESIDENT - EXTERNAL</b></h3></center>
            </div>
            <div class="panel-body" style = "background-color:#fff;">
              <div class="row-fluid justify-content-center">
				<?php
					$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Vice President - External'") or die(mysqli_errno());
					while($fetch = $query->fetch_array())
					{
				?>
            <div class="col-sm-3 text-center">
            <img src = "admin/<?php echo $fetch['img']?>" style ="border-radius:6px;" height = "150px" width = "150px">
            <br/>
            <button type="button" class="btn btn-default disabled btn-danger btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
            <br/>
            <button type="button" class="btn btn-default disabled btn-primary btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['party']?></button>
            <br/>
            <input type = "checkbox" value = "<?php echo $fetch['candidate_id'] ?>" name = "vpexternal_id" class = "vpexternal">
						</div>

				<?php
					}
				?>

        </div>
     </div>
   </div>

               <!-- AUDITOR SECTION -->

	       <div class="panel panel-primary">
          <div class="panel-heading">
			         <center><h3><b>SECRETARY</b></h3></center>
          </div>
          <div class="panel-body" style = "background-color:#fff;">

    				<?php
    					$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Secretary'") or die(mysqli_errno());
    					while($fetch = $query->fetch_array())
    					{
    				?>

            <div class="col-sm-3 text-center">
            <img src = "admin/<?php echo $fetch['img']?>" style ="border-radius:6px;" height = "150px" width = "150px">
            <br/>
            <button type="button" class="btn btn-default disabled btn-danger btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
            <br/>
            <button type="button" class="btn btn-default disabled btn-primary btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['party']?></button>
            <br/>
            <input type = "checkbox" value = "<?php echo $fetch['candidate_id'] ?>" name = "secretary_id" class = "secretary">
						</div>

				<?php
					}
				?>
			</div>
        </div>

               <!-- TREASURER SECTION -->

	    <div class="panel panel-primary">
        <div class="panel-heading">
			       <center><h3><b>TREASURER</b></h3></center>
        </div>
      <div class="panel-body" style = "background-color:#fff;">

				<?php
					$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Treasurer'") or die(mysqli_errno());
					while($fetch = $query->fetch_array())
					{
				?>

        <div class="col-sm-3 text-center">
        <img src = "admin/<?php echo $fetch['img']?>" style ="border-radius:6px;" height = "150px" width = "150px">
        <br/>
        <button type="button" class="btn btn-default disabled btn-danger btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
        <br/>
        <button type="button" class="btn btn-default disabled btn-primary btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['party']?></button>
        <br/>
        <input type = "checkbox" value = "<?php echo $fetch['candidate_id'] ?>" name = "auditor_id" class = "auditor">
				</div>

				<?php
					}
				?>

			</div>
        </div>


        <!-- EXTERNAL PRO SECTION -->

	       <div class="panel panel-primary">
            <div class="panel-heading">
			           <center><h3><b>AUDITOR</b></h3></center>
            </div>
        <div class="panel-body" style = "background-color:#fff;">

				<?php
					$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Auditor'") or die(mysqli_errno());
					while($fetch = $query->fetch_array())
					{
				?>

            <div class="col-sm-3 text-center">
            <img src = "admin/<?php echo $fetch['img']?>" style ="border-radius:6px;" height = "150px" width = "150px">
            <br/>
            <button type="button" class="btn btn-default disabled btn-danger btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
            <br/>
            <button type="button" class="btn btn-default disabled btn-primary btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['party']?></button>
            <br/>
            <input type = "checkbox"  value = "<?php echo $fetch['candidate_id'] ?>" name = "treasurer_id" class = "treasurer">
						</div>

				<?php
					}
				?>
			   </div>
        </div>

                    <!-- INTERNAL PRO SECTION -->

	        <div class="panel panel-primary">
            <div class="panel-heading">
			           <center><h3><b>BUSINESS MANAGER</b></h3></center>
            </div>
            <div class="panel-body" style = "background-color:#fff;">

				<?php
					$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = 'Business Manager'") or die(mysqli_errno());
					while($fetch = $query->fetch_array())
					{
				?>

            <div class="col-sm-3 text-center">
            <img src = "admin/<?php echo $fetch['img']?>" style ="border-radius:6px;" height = "150px" width = "150px">
            <br/>
            <button type="button" class="btn btn-default disabled btn-danger btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['firstname']." ".$fetch['lastname']?></button>
            <br/>
            <button type="button" class="btn btn-default disabled btn-primary btn-lg" style = "cursor:default; border-radius:60px;margin-top:4px;"><?php echo $fetch['party']?></button>
            <br/>
            <input type = "checkbox" value = "<?php echo $fetch['candidate_id'] ?>" name = "pio_id" class = "pio">
						</div>

				<?php
					}
				?>
			</div>
        </div>
      </div>
		<center><button class = "btn btn-success btn-lg ballot" type = "submit" name = "submit">Submit Ballot</button></center>
		</form>

</body>
<?php include ('script.php')?>

  <script type = "text/javascript">
		$(document).ready(function(){
			$(".president").on("change", function(){
				if($(".president:checked").length == 1)
					{
						$(".president").attr("disabled", "disabled");
						$(".president:checked").removeAttr("disabled");
					}
				else
					{
						$(".president").removeAttr("disabled");
					}
			});

			$(".vpinternal").on("change", function(){
				if($(".vpinternal:checked").length == 1)
					{
						$(".vpinternal").attr("disabled", "disabled");
						$(".vpinternal:checked").removeAttr("disabled");
					}
				else
					{
						$(".vpinternal").removeAttr("disabled");
					}
			});

			$(".vpexternal").on("change", function(){
				if($(".vpexternal:checked").length == 1)
					{
						$(".vpexternal").attr("disabled", "disabled");
						$(".vpexternal:checked").removeAttr("disabled");
					}
				else
					{
						$(".vpexternal").removeAttr("disabled");
					}
			});

			$(".secretary").on("change", function(){
				if($(".secretary:checked").length == 1)
					{
						$(".secretary").attr("disabled", "disabled");
						$(".secretary:checked").removeAttr("disabled");
					}
				else
					{
						$(".secretary").removeAttr("disabled");
					}
			});

			$(".auditor").on("change", function(){
				if($(".auditor:checked").length == 1)
					{
						$(".auditor").attr("disabled", "disabled");
						$(".auditor:checked").removeAttr("disabled");
					}
				else
					{
						$(".auditor").removeAttr("disabled");
					}
			});

			$(".treasurer").on("change", function(){
				if($(".treasurer:checked").length == 1)
					{
						$(".treasurer").attr("disabled", "disabled");
						$(".treasurer:checked").removeAttr("disabled");
					}
				else
					{
						$(".treasurer").removeAttr("disabled");
					}

			});
			$(".pio").on("change", function(){
				if($(".pio:checked").length == 1)
					{
						$(".pio").attr("disabled", "disabled");
						$(".pio:checked").removeAttr("disabled");
					}
				else
					{
						$(".pio").removeAttr("disabled");
					}
			});
			$(".busman").on("change", function(){
				if($(".busman:checked").length == 1)
				{
					$(".busman").attr("disabled", "disabled");
					$(".busman:checked").removeAttr("disabled");
				}
			else
				{
					$(".busman").removeAttr("disabled");
				}
			});
			$(".sgtarm").on("change", function(){
				if($(".sgtarm:checked").length == 1)
				{
					$(".sgtarm").attr("disabled", "disabled");
					$(".sgtarm:checked").removeAttr("disabled");
				}
			else
				{
					$(".sgtarm").removeAttr("disabled");
				}
			});
			$(".muse").on("change", function(){
				if($(".muse:checked").length == 1)
				{
					$(".muse").attr("disabled", "disabled");
					$(".muse:checked").removeAttr("disabled");
				}
			else
				{
					$(".muse").removeAttr("disabled");
				}
			});
			$(".escort").on("change", function(){
				if($(".escort:checked").length == 1)
				{
					$(".escort").attr("disabled", "disabled");
					$(".escort:checked").removeAttr("disabled");
				}
			else
				{
					$(".escort").removeAttr("disabled");
				}
			});
		});
	</script>
</html>
