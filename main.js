jQuery(document).ready(function ($) {
    $(".category-btn[data-category='ban-phim']").addClass('selected')

    $(".category-btn").click(function () {
        const selectedCategory = $(this).data('category')
        $(".category-btn.selected").removeClass('selected')
        $(this).addClass('selected')

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'get_products',
                category: selectedCategory
            },
            success: function (response) {
                $("#product-list").html(response)
            },
        });
    });

    const productSidebar = $("#product-sidebar")
    if (productSidebar.height() > 600) productSidebar.addClass("h-screen")
    window.addEventListener("scroll", function () {
        if (productSidebar) {
            if (window.scrollY > 200 && window.scrollY < 781)
                productSidebar.css("padding-block", "1.5em");
            else
                productSidebar.css("padding-block", "0")

        }
    })

    const subTotalCart = $(".cart-subtotal")
    const subTotalCartTableHeader = $(".product-subtotal")
    subTotalCart.remove()
    subTotalCartTableHeader.remove()
});