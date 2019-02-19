<div class="row">
    <div class="col-lg-3">
        <div class="filter-card">
        <ul class="list-group">
            <li style="list-style-type:none;"><a href="profile?page=1" class="text-secondary">Personal Information</a></li>
            <li style="list-style-type:none;"><a href="profile?page=2" class="text-secondary">Order History</a></li>
            <li style="list-style-type:none;"><a href="profile?page=3" class="text-secondary">Return And Exchanges</a></li>
            <li style="list-style-type:none;"><a href="profile?page=4" class="text-secondary">Refund Information</a></li>
            <li style="list-style-type:none;"><a href="profile?page=5" class="text-secondary">Shipping Addresses</a></li>
        </ul>
        </div>
    </div>
    <div class="col-lg-9">
    <?php 
    $page = $_GET['page'];
    if(!isset($page)||$page == 1){
        include "personal-information.php";
    }elseif ($page == 2) {
        include "order-history.php";
    }elseif ($page == 3) {
        include "return-exchanges.php";
    }elseif ($page == 4) {
        include "refund-information.php";
    }elseif ($page == 5) {
        include "shipping-addresses.php";
    }
    ?>
    </div>
</div>
