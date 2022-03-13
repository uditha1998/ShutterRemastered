

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div style="">
        <div style="text-align:center;width: 100%">
            <img style="border-radius:50%" class="res-profile" src="./image/administrator.jpg" width="75px"></img>
        </div>
        <div style="width:100%;text-align: center;margin-top:10px">
            <?php
            $ADMIN = new Admin();
            $ADMIN->setId($admin_id);
            $admin_name;
            foreach ($ADMIN->getterAdmin() as $admin_name) {
                $admin_name = $admin_name['username'];
            }
            ?>
            <label  style="" ><?= $admin_name ?></label>
        </div>
    </div>
    <div>

        <ul>
            <li class="link-list">
                <button class="dropdown-btn">
                    Manage Events
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="create-events.php">Create</a>
                    <a href="manage-events.php">Manage</a>

                </div>
            </li>
            <li class="link-list">
                <button class="dropdown-btn">
                    Manage Other Admins
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="create-admin.php">Create</a>
                    <a href="manage-admin.php">Manage</a>

                </div>
            </li>
            <li class="link-list">
                <button class="dropdown-btn">
                    Manage Photographers
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a href="manage-pending-photographers.php">Pending Photographers</a>
                    <a href="manage-photographers.php">Manage Photographers</a>

                </div>
            </li>

            <li class="link-list">  <a href="./manage-clients.php">Manage Clients</a></li>
            <li class="link-list">  <a href="#">Order Summary</a></li>
            <li class="link-list">  <a href="./post-and-get/log-out.php">Log out </a></li>



        </ul>   
    </div>
    <div style="position: absolute;bottom: 5.5%;width: 100%;border-top: 1px solid #eee;margin-bottom: 20%;padding: 15px;overflow: hidden;margin-bottom: 20%;padding: 10px 0px 10px 0px;overflow: hidden;left: 0;background-color: #075877;">
        <div style="text-align: center">
            <label>Shutter Photography</label>
        </div>


    </div>

</div>







</div>