
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

$('#cart .modal-body').on('click', '.del-item' ,function () {
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/del-item',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            if (!res) alert('Ошибка');
            showCart(res);
        },
        error: function () {
            alert('Ошибка');
        }
    });
});

$('.del-item').on('click',function () {
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/del-item',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            if (!res) alert('Ошибка');
            location.href = "http://localhost:8080/cart/view";
        },
        error: function () {
            alert('Ошибка');
        }
    });
});

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            if (!res) alert('Ошибка');
            showCart(res);
        },
        error: function () {
            alert('Ошибка');
        }
    });
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function (res) {
            if (!res) alert('Ошибка');
            showCart(res);
        },
        error: function () {
            alert('Ошибка');
        }
    });
    return false;
}

$('.cart').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id'),
        qty = $('#addqty').val();
    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty},
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

$('#plus').on('click', function () {
    var kolvo = parseInt($('#addqty').val()) + 1;
    if (kolvo > $('#instock').data('id')){
        alert('Товаров на складе больше нет');
    }
    else{
        $('#addqty').val(kolvo);
    }
    return false;
});

$('#minus').on('click', function () {
    var kolvo = parseInt($('#addqty').val()) - 1;
    if (kolvo >= 1){
        $('#addqty').val(kolvo);
    }
    return false;
});