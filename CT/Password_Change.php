<!DOCTYPE HTML>
<html style="background-color: #FFF;">
<head>
    <title>Change Password</title>
    <?php
    require("../connection.php");
    require_once("Navigation.php");

    if(isset($_POST['Submit'])){
        $CPassword=$_POST['CPassword'];
        $NPassword=$_POST['NPassword'];
        $RPassword=$_POST['RPassword'];
        $mit=0;
        $select="SELECT `Password` FROM `caretaker_master` WHERE Emp_id='{$_SESSION['User_id']}'";
        $sresult=mysql_query($select,$con);
        $data=mysql_fetch_array($sresult);
        $Real_Password=$data['Password'];

        if($CPassword==""){
            $Message="Please Enter Current Password";
            $mit=1;
        }
        elseif(strlen($CPassword)<6){
            $Message="Password should be of minimum 6 letters!";
            $mit=2;
        }
        elseif($Real_Password != $CPassword){
            $Message="Password doesn't match!";
            $mit=8;
        }
        elseif($NPassword==""){
            $Message="Please Enter New Password";
            $mit=3;
        }
        elseif(strlen($NPassword)<6){
            $Message="New Password should be of minimum 6 letters!";
            $mit=4;
        }
        elseif($RPassword==""){
            $Message="Please Re-Enter New Password";
            $mit=5;
        }
        elseif(strlen($RPassword)<6){
            $Message="New Password should be of minimum 6 letters!";
            $mit=6;
        }
        elseif($NPassword != $RPassword){
            $Message="Password doesn't Match!";
            $mit=7;
        }
        else{
            $query="UPDATE `caretaker_master` SET Password='$NPassword' WHERE Emp_id='{$_SESSION['User_id']}'";
            $res=mysql_query($query,$con);
            if($res){
                echo "<script>alert('Password is successfully Changed! You have to Log In again.');document.location='../Logout.php';</script>";
            }
            else{
                echo "<script>alert('Something went Wrong. Please try again.');document.location='Password_Change.php';</script>";
            }
        }
    }
    ?>
    <style>
        .message{
            color: red;
            font-weight: 400;
        }
    </style>
</head>
<body style="background-color: #FFF;">
<div id="wrapper">
    <div id="page-wrapper" style="margin-left: 0px; min-height: 399px;">
        <div class="graphs">
            <div class="xs" style="margin-top: 88px;">
                <h3>Change Password</h3>
                <div class="tab-content col_3" style="margin-top: 24px;">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal" action="" method="post">
                            <div class="form-group">
                                <div class="col-sm-12" style="margin-bottom: 24px;">
                                    <div class="col-sm-3"> </div>
                                    <div class="col-sm-6" align="center" style="font-weight: 300">
                                        Change Password of your account with the help of the Below Form.
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 8px;">
                                    <div class="col-sm-3">&nbsp;</div>
                                    <div class="col-sm-2" align="center">
                                        <label for="focusedinput" class="control-label" style="margin-top: 10px;">Current Password* :</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" class="form-control1" name="CPassword" id="CPassword" placeholder="Current Password" required="required" maxlength="32" pattern=".{6,}" title="Minimum 6 character required!" autocomplete="off">
                                    </div>
                                    <div class="col-sm-4" style="margin-top: 8px;">
                                        <?php
                                        if(isset($Message) && $mit==1){
                                            echo "<p class='message'>".$Message."</p>";
                                        }
                                        elseif(isset($Message) && $mit==2){
                                            echo "<p class='message'>".$Message."</p>";
                                        }
                                        elseif(isset($Message) && $mit==8){
                                            echo "<p class='message'>".$Message."</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 8px;">
                                    <div class="col-sm-3">&nbsp;</div>
                                    <div class="col-sm-2" align="center">
                                        <label for="focusedinput" class="control-label" style="margin-top: 10px;">New Password* :</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" class="form-control1" name="NPassword" id="NPassword" placeholder="New Password" maxlength="32" required="required" pattern=".{6,}" title="Minimum 6 character required!" autocomplete="off">
                                    </div>
                                    <div class="col-sm-4" style="margin-top: 8px;">
                                        <?php
                                        if(isset($Message) && $mit==3){
                                            echo "<p class='message'>".$Message."</p>";
                                        }
                                        elseif(isset($Message) && $mit==4){
                                            echo "<p class='message'>".$Message."</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 8px;">
                                    <div class="col-sm-3">&nbsp;</div>
                                    <div class="col-sm-2" align="center">
                                        <label for="focusedinput" class="control-label" style="margin-top: 10px;">Re-Enter New Password* :</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" class="form-control1" name="RPassword" id="RPassword" placeholder="Re-Enter New Password" maxlength="32" required="required" pattern=".{6,}" title="Minimum 6 character required!" autocomplete="off">
                                    </div>
                                    <div class="col-sm-4" style="margin-top: 8px;">
                                        <?php
                                        if(isset($Message) && $mit==5){
                                            echo "<p class='message'>".$Message."</p>";
                                        }
                                        elseif(isset($Message) && $mit==6){
                                            echo "<p class='message'>".$Message."</p>";
                                        }
                                        elseif(isset($Message) && $mit==7){
                                            echo "<p class='message'>".$Message."</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-12" align="center" style="margin-top: 40px;">
                                    <input type="submit" class="btn btn-default" name="Submit" value="Change" style="width: 100px;margin-left: 100px;">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="copy_layout">

                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
</body>
</html>