<nav class="navbar navbar-default navbar-static-top navbar-primary navbar-fixed" role="navigation" style = "cursor:default; margin-bottom:6px;background-color:#141C71;color:white;">
            <div class="navbar-header">
                <button type="button" class="btn btn-default disabled navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="" style = "color:white;"><i class="fa fa-cog fa-spin fa-fw"></i> AUTOMATED VOTING SYSTEM</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">

				<?php
					require 'admin/dbcon.php';
					$query = $conn->query("SELECT * from voters where voters_id ='$session_id'")or die (mysqli_errno());
					$row = $query->fetch_array();
				?>

                <li class="">
                    <a class="btn btn-lg btn-default disabled">
						          Welcome, <i class = "fa fa-user"></i> <?php echo $row['firstname']." ".$row['lastname'];?>
                   </a>
                </li>
            </ul>
