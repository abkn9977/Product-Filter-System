<?php
//importing connection file
require_once 'connection.php';

if (isset($_POST['action'])) {
    //sql query
    $sql = "SELECT  p.pid,
                    p.title,
                    p.price,
                    p.brand,
                    p.image,
                    p.seller,
                    p.stock,
                    GROUP_CONCAT(s.size) AS size
            FROM    product p 
            INNER JOIN product_size s ON p.pid = s.pid
            WHERE p.title != ''";

    //adding new price to query if changed
    if (isset($_POST['price'])) {
        $lowRange = $_POST['price'] - $_POST['price'] * 1 / 4;
        $highRange = $_POST['price'] + $_POST['price'] * 1 / 2;
        $sql .= " AND (p.price >=". $lowRange ." AND p.price <= ". $highRange .")";
    }

    //adding category to query if checked
    if (isset($_POST['category'])) {
        $category = implode(",", $_POST['category']);
        $sql .= " AND p.category IN (". $category .")";
    }

    //adding size to query if checked
    if (isset($_POST['size'])) {
        $sizes = implode(",", $_POST['size']);
        $sql .= " AND s.size IN (". $sizes .")";
    }

    //adding brand to query if checked
    if(isset($_POST['brand'])){
        $brands = implode(",", $_POST['brand']);
        $sql .= " AND p.brand IN(". $brands .")";
    }

    //adding seller to query if checked
    if (isset($_POST['seller'])) {
        $malls = implode(",", $_POST['seller']);
        $sql .= "AND p.seller IN(". $malls .")";
    }
    $sql .= " GROUP BY p.pid";

    $result = $connect->query($sql);
    
    if($result){
        $rows = $result -> num_rows;
    }

    //output variable contains filtered broduct content 
    $output = "";
    $rows = 0;
    if ($rows > 0) {
        while ($data = $result->fetch_assoc()) {
            $stock_info = strcasecmp(htmlspecialchars($data['stock']), "in stock") == 0 ? '<div class="stock-info-green">'.htmlspecialchars($data['stock']).'</div>' : '<div class="stock-info-red">'. htmlspecialchars($data['stock']).'</div>';
            $output .= "<div class='full-product'>
                    <img src='./uploads/" .htmlspecialchars($data['image']). "' alt='".htmlspecialchars($data['image'])."'>
                    <div class='product-info'>
                    <div class='binfo'><b> ". htmlspecialchars($data['brand']) ."</b></div>
                    <a href='#'>" . htmlspecialchars($data['title']) . "</a>
                    <h4>By&nbsp;:&nbsp;<span>" . htmlspecialchars($data['seller']) . "</span></h4>
                    <h4>Size&nbsp;:&nbsp;<span class='bscolor'>". htmlspecialchars($data['size']) ."</span></h4>
                    <div class='product-price'>
                        <div class='price-info'>Price :<span>" . htmlspecialchars($data['price']) . "</span>&nbsp;/- Rs.</div>
                        ".$stock_info."
                    </div>
                </div>
            </div>";
        }
    }else{
        $output = '<div style="color:red;font-size:17px;">No resuls found</div>';
    }
    
    //echo back filterd product to page
    echo $output;
}
