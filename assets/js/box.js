(()=>{jQuery(document).ready(function(t){t(".category-btn[data-category='ban-phim']").addClass("selected"),t(".category-btn").click(function(){let c=t(this).data("category");t(".category-btn.selected").removeClass("selected"),t(this).addClass("selected"),t.ajax({url:"/wp-admin/admin-ajax.php",type:"POST",dataType:"json",data:{action:"get_products",category:c},success:function(o){t("#product-list").html(o)}})});let e=t("#product-sidebar");e.height()>600&&e.addClass("h-screen"),window.addEventListener("scroll",function(){e&&(window.scrollY>200&&window.scrollY<781?e.css("padding-block","1.5em"):e.css("padding-block","0"))});let a=t(".cart-subtotal"),s=t(".product-subtotal");a.remove(),s.remove()});})();
//# sourceMappingURL=box.js.map
