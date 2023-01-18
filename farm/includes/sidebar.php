 <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <?php
            $aid=$_SESSION['odmsaid'];
            $sql="SELECT * from  tbladmin where ID=:aid";
            $query = $dbh -> prepare($sql);
            $query->bindParam(':aid',$aid,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            { 
                foreach($results as $row)
                {
                    ?>
                    <a href="#" class="nav-link">

                    </a>
                    <?php 
                }
            } ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Product management</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-archive menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="category.php">Manage Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="product.php">Manage Product</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#companymanagement" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Farm management</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-bank menu-icon"></i>
            </a>
            <div class="collapse" id="companymanagement">
                <ul class="nav flex-column sub-menu">
                    <!-- <li class="nav-item"> <a class="nav-link" href="farmprofile.php">Farm profile </a></li>
                    <li class="nav-item"> <a class="nav-link" href="eggs.php">Eggs Management </a></li>
                    <li class="nav-item"> <a class="nav-link" href="chickens.php">Chickens Management </a></li> -->
                    
                    <li class="nav-item"> <a class="nav-link" href="store.php"> Manage store</a></li>
                </ul>
            </div>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="sell_product.php">
                <span class="menu-title">Sell Product</span>
                <i class="mdi mdi-cart menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="invoices.php">
                <span class="menu-title">Invoices</span>
                <i class="mdi mdi-book menu-icon"></i>
            </a>
        </li>
       
        <?php
        $aid=$_SESSION['odmsaid'];
        $sql="SELECT * from  tbladmin where ID=:aid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {  
            foreach($results as $row)
            { 
                if($row->AdminName=="Admin"  )
                { 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                            <span class="menu-title">User management</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account-multiple menu-icon"></i>
                        </a>
                        <div class="collapse" id="general-pages">

                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="userregister.php">Register user </a></li> <?php
                                $aid=$_SESSION['odmsaid'];
                                $sql="SELECT * from  tbladmin where ID=:aid";
                                $query = $dbh -> prepare($sql);
                                $query->bindParam(':aid',$aid,PDO::PARAM_STR);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {  
                                    foreach($results as $row)
                                    { 
                                        if($row->AdminName=="Admin" and $row->CompanyName=="compconsult" )
                                        { 
                                            ?>
                                            <li class="nav-item"> <a class="nav-link" href="user_permission.php"> User permissions</a></li>


                                            <?php 
                                        } 
                                    }
                                } ?> 
                            </ul>

                        </div>
                    </li>
                    <?php 
                } 
            }
        } ?>
    </ul>
</nav>