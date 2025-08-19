<?php
include('admin_header.php');

if (!isset($_SESSION['admin_id'])) {
    header('Location: ../index.php');
    die;
}
?>
<div id="main-content" class="container allContent-section py-4" style="margin-left: 305px;">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                <h4 style="color:rgb(79,52,36);">Total Users</h4>
                <h5 style="color:rgb(79,52,36);">
                    <?php
                    $sql = "SELECT * from users";
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $count = $count + 1;
                        }
                    }
                    echo $count;
                    ?></h5>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                <h4 style="color:rgb(79,52,36);">Total Categories</h4>
                <h5 style="color:rgb(79,52,36);">
                    <?php

                    $sql = "SELECT * from category";
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $count = $count + 1;
                        }
                    }
                    echo $count;
                    ?>
                </h5>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                <h4 style="color:rgb(79,52,36);">Total Products</h4>
                <h5 style="color:rgb(79,52,36);">
                    <?php

                    $sql = "SELECT * from product";
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            $count = $count + 1;
                        }
                    }
                    echo $count;
                    ?>
                </h5>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                <h4 style="color:rgb(79,52,36);">Total orders</h4>
                <h5 style="color:rgb(79,52,36);">
                    <?php

                    $sql = "SELECT * from `orders`";
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            $count = $count + 1;
                        }
                    }
                    echo $count;
                    ?>
                </h5>
            </div>
        </div>

    </div>
</div>
</body>

</html>