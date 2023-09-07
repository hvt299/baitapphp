<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<?php
	// using $_POST array
	$product_description = $_POST['product_description'];
	$list_price = $_POST['list_price'];
	$stadard_discount = $_POST['discount_percent'];
	
	// using filter_input function
	$product_description = filter_input(INPUT_POST, 'product_description');
	$list_price = filter_input(INPUT_POST, 'list_price');
	$stadard_discount = filter_input(INPUT_POST, 'discount_percent');
	
	// calculate the discount amount and discount price
	$discount_amount = $list_price * $stadard_discount / 100;
	$discount_price = $list_price - $discount_amount;
	
	// format the numeric variables
	$list_price_f = "$".number_format($list_price, 2);
	$stadard_discount_f = $stadard_discount."%";
	$discount_amount_f = "$".number_format($discount_amount, 2);
	$discount_price_f = "$".number_format($discount_price, 2);
?>
<body>
    <main>
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo htmlspecialchars($product_description); ?></span><br>

        <label>List Price:</label>
        <span><?php echo htmlspecialchars($list_price_f); ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo htmlspecialchars($stadard_discount_f); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_amount_f; ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo $discount_price_f; ?></span><br>
    </main>
</body>
</html>