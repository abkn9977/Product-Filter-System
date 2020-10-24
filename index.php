<?php
//importing connection file 
require_once 'connection.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Product filter</title>
    <script src="https://kit.fontawesome.com/0552b63fc2.js" crossorigin="anonymous"></script>

    <!-- Googele fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Lexend+Deca&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Custom stylsheet -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--    Simple navigation  -->
    <nav class="navbar">
        <span class="navbar-brand mb-0 h1">Product filter</span>
    </nav>
    <main>
        <div class="main-container">
            <div class="container-element filter-section">
                <h4>Filter</h4>
                <hr>
                <div class="mobile-flex-display">
                    <div class="filter-element">
                        <h6>Price <span class="mobile-drop"><i class="fas fa-caret-down"></i></span> </h6>
                        <div class="filter-selection price_range">
                            <div id="priceValue">300</div>
                            <input type="range" min="300" max="1500" value="50" id="priceSlider">
                        </div>
                    </div>
                    <div class="filter-element">
                        <h6>Category <span class="mobile-drop"><i class="fas fa-caret-down"></i></span></h6>
                        <div class="filter-selection scrollable-selection">
                            <?php
                            $select_sql = "SELECT DISTINCT category FROM product ORDER BY category";
                            $result = $connect->query($select_sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['category']; ?>" id="category"><span>
                                            <?= $row['category']; ?></span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="filter-element">
                        <h6>Size <span class="mobile-drop"><i class="fas fa-caret-down"></i></span></h6>
                        <div class="filter-selection scrollable-selection">
                            <?php
                            $select_sql = "SELECT DISTINCT size FROM product_size
                            ORDER BY size";
                            $result = $connect->query($select_sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['size']; ?>" id="size"><span>
                                            <?= $row['size']; ?></span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="filter-element">
                        <h6>Brand <span class="mobile-drop"><i class="fas fa-caret-down"></i></span></h6>
                        <div class="filter-selection scrollable-selection">
                            <?php
                            $select_sql = "SELECT DISTINCT brand FROM product
                            ORDER BY brand";
                            $result = $connect->query($select_sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['brand']; ?>" id="brand"><span>
                                            <?= $row['brand']; ?></span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="filter-element">
                        <h6>Seller <span class="mobile-drop"><i class="fas fa-caret-down"></i></span> </h6>
                        <div class="filter-selection">
                            <?php
                            $select_sql = "SELECT DISTINCT seller FROM product ORDER BY seller";
                            $result = $connect->query($select_sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['seller']; ?>" id="seller"><span>
                                            <?= $row['seller']; ?></span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-element product-section">
                <?php
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
                ";

                $sql .=  " GROUP BY p.pid";
                $result = $connect->query($sql);
                $rows = $result->num_rows;
                echo "<h4 id='filteredTexts'>" . $rows . " results</h4>";
                echo "<hr>";
                ?>
                <div class="show-result" id="result">
                    <?php
                    if ($rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                    ?>
                            <div class="full-product">
                                <img src="./uploads/<?php echo $data['image']; ?>" alt="<?php echo $visible_image; ?>">
                                <div class="product-info">
                                    <div class="binfo"><b><?php echo $data['brand']; ?></b></div>
                                    <a href="#"><?php echo $data['title']; ?></a>
                                    <h4>By&nbsp;:&nbsp;<span><?php echo $data['seller']; ?></span></h4>
                                    <h4>Size&nbsp;:&nbsp;<span class="bscolor"><?php echo $data['size']; ?></span></h4>
                                    <div class="product-price">
                                        <div class="price-info">Price :
                                            <span><?php echo $data['price']; ?></span>&nbsp;/- Rs.</div>
                                        <?php if (strcasecmp($data['stock'], 'in stock') == 0) { ?>
                                            <div class="stock-info-green"><?php echo $data['stock']; ?></div>
                                        <?php } else { ?>
                                            <div class="stock-info-red"><?php echo $data['stock']; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<div><ol start='1'><li>Check your spelling</li><li>Try using common names like jeans, t shirt</li></ol></div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <!-- Simple footer -->
    <div class="footer-copyright text-center py-3">By Aftab Ansari</div>
    <!--           Jquery CDN       -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!--           Bootstrap CDN     -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!--           Custom JS -->
    <script src="js/main.js"></script>
</body>

</html>