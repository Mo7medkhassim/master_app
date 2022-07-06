$(document).ready(function () {


    // add product btn
    $('.add-product-btn').on('click', function (e) {

        e.preventDefault();

        var name = $(this).data('name');
        var price = $.number($(this).data('price'), 2);
        var id = $(this).data('id');

        $(this).removeClass('btn-success').addClass('btn-default disabled');

        var html =
            `
                <tr>
                    <td>${name}</td>
                    <td> <input type="number" data-price="${price}" name="products[${id}][quantity]" class="form-control product-quantity" min="1" value="1" > </td>
                    <td class="product-price">${price}</td>
                    <td>
                        <button  class="btn btn-danger  btn-sm remove-product-btn" data-id="${id}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
        `;

        console.log(html);

        $('.order-list').append(html);

        // call calculate price function
        calculateTotal();

    }); // end of addproduct

    // remove btn
    $('body').on('click', '.remove-product-btn', function (e) {

        e.preventDefault();

        var id = $(this).data('id');

        $(this).closest('tr').remove();

        $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');


        calculateTotal();
    }); // end remove-product-btn

    $('body').on('change', '.product-quantity', function () {

        var quantity = Number($(this).val());

        var unitPrice = parseFloat($(this).data('price').replace(/,/g, ''));

        $(this).closest('tr').find('.product-price').html($.number(quantity * unitPrice, 2));

        calculateTotal();

    }); // end of quantity and product


    // get products orders
    $('.show-products-btn').on('click', function (e) {

        e.preventDefault();

        var url = $(this).data('url');

        var method = $(this).data('method');

        $.ajax({
            url : url,
            method : method,
            success : function (data) {

                $('.show-product-orders').empty().append(data);

            }
        }); // end of ajax


    }); // end of show products btn

}); // end ready


function calculateTotal() {

    var price = 0;

    $('.order-list .product-price').each(function (index) {

        price += parseFloat($(this).html().replace(/,/g, ''));

        price += Number();

    });

    $('.total-price').html($.number(price, 2));

    // check if price > 0
    if (price > 0) {

        $('#order-form-btn').removeClass('disabled');

    } else {

        $('#order-form-btn').addClass('disabled');
    } // end of else

} // end calculate Total
