<?php include ('session.php');?>
<?php include ('head.php');?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include ('side_bar.php');?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
                
                <hr/>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="alert alert-success">Manual Count for Auditor</h4>    
                    </div>
                    
                    <br/>
                    <form method="post" action="sort.php">

                    <a href = "canvassing.php" id="back" class = "btn btn-warning" ><i class = "fa fa-refresh"> </i> Back</a> 

                        &nbsp;
                        &nbsp;
                        <button type="button" onclick="window.print();" style="margin-right:14px;" id="print" class="pull-right btn btn-info">
                            <i class="fa fa-print"></i> Print
                        </button>    
                    </form><br>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <td style="width:600px;" class="alert alert-success">Student Name</td>
                                <td style="width:200px;" class="alert alert-success">Student Voted</td>
                                <td class="alert alert-success">Total</td>
                            </thead>
                            <?php
                            require 'dbcon.php';
                            // Fetch candidates for the President position
                            $query = $conn->query("SELECT * FROM candidate WHERE position = 'Auditor'");
                            while($fetch = $query->fetch_array()) {
                                $id = $fetch['candidate_id'];
                                
                                // Query to count total votes for this candidate
                                $query1 = $conn->query("SELECT COUNT(*) as total FROM votes WHERE candidate_id = '$id'");
                                $fetch1 = $query1->fetch_assoc();
                                
                                // Query to get details of voters for this candidate
                                $query2 = $conn->query("SELECT voters.firstname, voters.lastname, voters.voters_id 
                                                        FROM votes 
                                                        INNER JOIN voters ON votes.voters_id = voters.voters_id
                                                        WHERE votes.candidate_id = '$id'");
                            ?>
                            <tbody> 
                                <td><?php echo $fetch['firstname'] . " " . $fetch['lastname']; ?></td>
                                <td><img src="<?php echo $fetch['img']; ?>" style="width:40px; height:40px; border-radius:500px;"></td>
                                <td style="width:20px; text-align:center"><a href="#" class="btn btn-primary"><?php echo $fetch1['total']; ?></a></td>
                            </tbody>
                            <tr>
                                <td colspan="3">
                                    <strong>Voters:</strong>
                                    <ul>
                                        <?php
                                        // Loop through each voter and display their name and ID
                                        while ($voter = $query2->fetch_assoc()) {
                                            echo "<li>" . $voter['firstname'] . " " . $voter['lastname'] . " (Voters ID: " . $voter['voters_id'] . ")</li>";
                                        }
                                        ?>
                                    </ul>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>                
                </div>
            </div>
        </div>
    </div>

    <?php include ('script.php');?>

</body>

</html>
