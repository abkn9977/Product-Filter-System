$(document).ready(function() {
    $(".filter-section .filter-element h6").click(function() {
        $('.filter-section .filter-element .filter-selection').toggleClass('active');
    });

    // price range selector 
    const priceSlider = document.getElementById("priceSlider");
    const priceValue = document.getElementById("priceValue");
    priceValue.innerHTML = priceSlider.value;

    priceSlider.oninput = function() {
        priceValue.innerHTML = this.value;
        filter_price();
    }
    
    //filter_price() function filters product 
    //when price is changed
    function filter_price() {
        var action = "filterRequest";
        var price = priceSlider.value;
        $.ajax({
            url: "filter.php",
            method: "post",
            data: {
                action: action,
                price: price,
            },
            success: function(response) {
                $("#result").html(response);
                $("#filteredTexts").html("Product filtered");
            }
        });
    }

    //filter on any checkbox is checked
    $(".product-check").click(function() {
        console.log("Checked");

        //filter_product() function filters product in each checkbox click
        filter_product();
    });
    
    function filter_product() {
        var action = "filterRequest";
        var size = get_filtered_product('size');
        var category = get_filtered_product('category');
        var brand = get_filtered_product('brand');
        var seller = get_filtered_product('seller');

        $.ajax({
            url: "filter.php",
            method: "post",
            data: {
                action: action,
                size: size,
                category: category,
                brand: brand,
                seller: seller
            },
            success: function(response) {
                $("#result").html(response);
                $("#filteredTexts").html("Product filtered");
            }
        });
    }

    //whenever a checkbox is checked from a particular filter option say brand, 
    //we will have a fresh list of brands for which product should be filtered
    function get_filtered_product(filter_id) {
        var filtered_data = [];
        $("#" + filter_id + ":checked").each(function() {
            filtered_data.push("\'" + $(this).val() + "\'");
        });
        return filtered_data;
    }
});
