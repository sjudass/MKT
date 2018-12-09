
jQuery(document).ready(function(){
	jQuery(".menu_top .navbar-toggle").on("click", function(){
		if(jQuery(this).hasClass("active"))
		{
			jQuery(this).removeClass("active");
		}
		else
		{
			jQuery(this).addClass("active");
		}
		
	})
});

function showCart(cart) {
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}
$('.cart').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/add',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            if (!res) alert('Ошибка');
            showCart(res);
        },
        error: function () {
            alert('Error!');
        }
    });
});