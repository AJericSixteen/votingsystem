<?php include('session.php'); ?>
<?php include('head.php'); ?>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include('side_bar.php'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Voters List</h3>
                </div>
                <?php
                $count = $conn->query("SELECT COUNT(*) as total FROM `voters`")->fetch_array();
                $count1 = $conn->query("SELECT COUNT(*) as total FROM `voters` WHERE `status` = 'Voted'")->fetch_array();
                $count2 = $conn->query("SELECT COUNT(*) as total FROM `voters` WHERE `status` = 'Unvoted'")->fetch_array();
                ?>
                <a href="voters.php" class="btn btn-primary btn-outline"><i class="fa fa-user"></i> ALL Voters
                    (<?php echo $count['total'] ?>)</a>
                <a href="voted.php" class="btn btn-success btn-outline"><i class="fa fa-user"></i> Voted
                    (<?php echo $count1['total'] ?>)</a>
                <a href="unvoted.php" class="btn btn-danger btn-outline"><i class="fa fa-user"></i> Unvoted
                    (<?php echo $count2['total'] ?>)</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                <a href="update_status.php" class="btn btn-danger btn-outline pull-right" name="go"><i
                        class="fa fa-asterisk fa-spin"></i> Activate All Voters Account</a>
                <br />
                <br />
                <a href="../register/index.php" class="btn btn-primary btn-outline"><i class="fa fa-user"></i> Add
                    Voters</a>
                <a href="generate_password.php" class="btn btn-success btn-outline pull-right" name="go"><i
                        class="fa fa-spinner fa-spin"></i> Generate Voters Password</a>
                <br />
                <br />
                <button type="button" onclick="window.print();" id="print" class="pull-right btn btn-info"><i
                        class="fa fa-print"></i> Print</button>

                <hr />

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="modal-title" id="myModalLabel">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><i class="fa fa-users"></i>
                                    Voters List
                                </div>
                            </div>
                        </h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID Number</th>
                                        <th>Password</th>
                                        <th>Name</th>
                                        <th>Year Level</th>
                                        <th>Status</th>
                                        <th>Account</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require 'dbcon.php';
                                    $query = $conn->query("SELECT * FROM voters ORDER BY voters_id DESC");
                                    while ($row1 = $query->fetch_array()) {
                                        $voters_id = $row1['voters_id'];
                                        ?>
                                        <tr>
                                            <td><?php echo $row1['id_number']; ?></td>
                                            <td>
                                                <div style="display: flex; align-items: center;">
                                                    <input type="password" class="password-field"
                                                        value="<?php echo $row1['password']; ?>" readonly
                                                        style="margin-right: 5px;" id="password-<?php echo $voters_id; ?>">
                                                    <button type="button"
                                                        onclick="togglePassword('password-<?php echo $voters_id; ?>', this)"
                                                        style="background: none; border: none; cursor: pointer;">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td><?php echo $row1['firstname'] . " " . $row1['lastname']; ?></td>
                                            <td><?php echo $row1['year_level']; ?></td>
                                            <td><?php echo $row1['status']; ?></td>
                                            <td><?php echo $row1['account']; ?></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                        <div>
                            <input type="checkbox" id="togglePassword" onclick="togglePassword()"> Show Password
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script>
        function togglePassword() {
            const passwordFields = document.querySelectorAll('.password-field');
            const toggle = document.getElementById('togglePassword');
            passwordFields.forEach(field => {
                field.type = toggle.checked ? 'text' : 'password';
            });
        }
    </script>
    <script>
function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);
    const icon = button.querySelector('i');

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>


    <?php include('script.php'); ?>
</body>

</html>