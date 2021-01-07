<?php

// COLLECT DATA
// Create the function collectArray.
// This function contains the parameter 
// that defines the required product-type. 

function collectArray($productType) {

    global $products;
    
    $collect = [];
    
    if (sizeof($products ) > 0) {
        foreach ($products as $product) {
            if ($productType == $product["type"]) {
                array_push($collect, $product); 
            }
        }
        
        if (!empty($collect)) {
            return $collect;
        } else {
            return $products;
        }
    }
}


// PRINT HTML:
// Create function printHTML.
function printHTML() {
   $html = NULL;

    if (isset($_GET["type"])) {
        $collectData = collectArray($_GET["type"]);
        for ($i = 0; $i < sizeof($collectData); $i++ ) {
            if ($_GET["type"] === $collectData[$i]["type"]) {
                $html .= "<div class='col col-12 col-md-6 col-lg-4'>
                              <img class='product-box' src='{$collectData[$i]["image"]}' alt='{$collectData[$i]["name"]}'>
                              <h5 class='text-centered'>" . $collectData[$i]["name"] . "</h5>
                              <p class='text-centered'>" . $collectData[$i]["price"] . "</p>
                          </div>";
            }
        } 
    }  else {
        global $products;
        for ($i = 0; $i < sizeof($products); $i++ ) {
                $html .= "<div class='col col-12 col-md-6 col-lg-4'>
                              <img class='product-box' src='{$products[$i]["image"]}' alt='{$products[$i]["name"]}'>
                              <h5 class='text-centered'>" . $products[$i]["name"] . "</h5>
                              <p class='text-centered'>" . $products[$i]["price"] . "</p>
                          </div>";
        }
    }
    print $html;
}


    // Check if a product-code is in $_GET array. If product code is 
    // in $_GET array, it means user selected it, and you will 
    // print only the products of the selected type, otherwise
    // print all products.

    // You need to loop through the array of selected products,
        // create HTML tags in the fly and extract values 
        // of each product into proper or corresponding HTML tag.
        // Print the HTML content.
    // Close loop.
// Close printHTML.

?>
