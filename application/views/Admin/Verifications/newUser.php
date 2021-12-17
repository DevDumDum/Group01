<body>
    <!--NAVBAR-->
    <header>
        <!--INSERT NAVBAR LINK HERE-->
    </header>
    <!---POP UP-->
    <div id="hiddenbox">
        <div id="bg_box">
            <div class="modal-header">
                <div class="title">User</div>
                    <button class="close-button" onclick="hidebox()">&times;</button>
                </div>
            </div>
        <div id="blackbox" onclick="hidebox()">
        </div>
    </div>
    <!--BACK BUTTON-->

    <div class="container">
        <button class="btn" onclick="window.location.href='<?php echo base_url('AdminAuth/Dashboard');?>';">Back</button>
        
        <!---DASHBOARD BUTTONS-->
        <div class="dashboardButtons">
            <h1>VERIFICATION</h1>
            <p>(New User)</p>
        </div>

        <!--VERIFICATION BUTTONS-->
        <div class="btn_category">
            <button class="btn" onclick="window.location.href='VerifyUser';" disabled>New User</button>
            <button class="btn" onclick="window.location.href='VerifyRequest';">Deactivate Requests</button>
            <button class="btn" onclick="window.location.href='VerifyReports';">Reports</button>
            <button class="btn" onclick="window.location.href='VerifyJobCategory';">Job Category</button>
        </div>

        <form method="post">
            <!---NEW USER TABLE-->
            <div class="tables">
                <table class = "table table-dark table-hover center">
                    <tr>
                        <th>User</th>
                        <th> </th>
                    </tr>

                    <?php if(!empty($key_v_list)) { foreach($key_v_list as $v){?>

                        <tr>
                            <td onclick="newDetails()">
                                <span class="user_details"><?php echo $v['name']?></span>
                            </td>
                            
                            <td class="status">
                                <button class="editbtn1" style="cursor: pointer;" id="activate" onclick="accept_ver(<?php echo $v['v_id'];?>)">Activate</button>
                                <button class="editbtn2" style="cursor: pointer;" id="deactivate"onclick="alert(<?php echo $v['v_id'];?> )">Deactivate</button>
                            </td>                        
                        </tr>
                    <?php }} else {
                        echo "<tr><p>Other categories might have verifications left!</p></tr>";
                    }?>

                
                </table>
            </div>
            
        </form>    

        
    </div>
    <script>
        function accept_ver(verify_id){
            $.post('<?=base_url('Verification_controller/accept_ver');?>', {v_id: $(verify_id)}, function(){
                
            }, 'JSON');
        }
        function deny_ver(id){
            
        }
        function newDetails(){
            document.getElementById("hiddenbox").style.display="block";
            document.getElementById("hiddenbox").style.animation="fadebox .3s reverse linear";
        }
        function hidebox(){
            document.getElementById("hiddenbox").style.display="none";
        }
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>