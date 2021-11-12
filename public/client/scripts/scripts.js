// AJAX
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const slider = document.querySelector(".slider");
if (slider) {
    window.addEventListener("load", function () {
        const slider = document.querySelector(".slider");
        const sliderMain = document.querySelector(".slider-main");
        const sliderItems = document.querySelectorAll(".slider-item");
        const nextBtn = document.querySelector(".slider-next");
        const prevBtn = document.querySelector(".slider-prev");
        const dotItems = document.querySelectorAll(".slider-dot-item");
        const sliderItemWidth = sliderItems[0].offsetWidth;
        const slidersLength = sliderItems.length;

        let positionX = 0;
        let index = 0;
        nextBtn.addEventListener("click", function () {
            handleChangeSlide(1);
        });
        prevBtn.addEventListener("click", function () {
            handleChangeSlide(-1);
        });

        [...dotItems].forEach((item) =>
            item.addEventListener("click", function (e) {
                const slideIndex = e.target.dataset.index;
                index += slideIndex;
                nextBtn.click();
            })
        );

        function handleChangeSlide(direction) {
            if (direction === 1) {
                if (index >= slidersLength - 1) {
                    index = slidersLength - 1;
                    return;
                }
                positionX -= sliderItemWidth;
                sliderMain.style = `transform: translateX(${positionX}px)`;
                index++;
            } else if (direction === -1) {
                if (index <= 0) {
                    index = 0;
                    return;
                }
                positionX += sliderItemWidth;
                sliderMain.style = `transform: translateX(${positionX}px)`;
                index--;
            }
        }
    });
}





// không cho phép nhập số âm
const quantity = document.querySelector(".select-quantity");
if (quantity) {
    quantity.onkeydown = function (e) {
        if (
            !(
                (e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8
            )
        ) {
            return false;
        }
    };
}

let i = 0;
$('.user').on('click', function () {
    if (i % 2 === 0) {
        i++
        $('.form-login').css('display', 'flex')
    } else {
        $('.form-login').css('display', 'none')
        i++
    }
})


$('.switch-login').on('click', function (e) {
    e.preventDefault()
    $('.form-register').css('display', 'none')
    $('.form-login').css('display', 'flex')
})

$('.switch-register').on('click', function (e) {
    e.preventDefault()
    $('.form-login').css('display', 'none')
    $('.form-register').css('display', 'flex')
})

// Xử lý giỏ hàng

function deleteRow(r) {
    let i = r.parentNode.parentNode.rowIndex;
    document.getElementById("cart").deleteRow(i);
}


function removeRow(id, url, r) {
    $.ajax({
        type: 'DELETE',
        datatype: 'JSON',
        data: {id},
        url: url,
        success: function (result) {
            if (result.error === false) {
                deleteRow(r)
            } else {
                alert('Xoá thất bại')
            }
        }
    })
}

function addToCart(e) {
    e.preventDefault();
    let quantity = $('#quantity').val()
    let url = $(this).data('url') + quantity
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'JSON',
        success: function (data) {
            console.log(data)
        },
        error: function (data) {
            console.log(data)
        }
    });
}



$(function () {
    $('.add_to_cart').on('click', addToCart)

    // DELETE ITEM CART
    $('.delete_item').on('click', function (e) {
        e.preventDefault()
        alert('delete')
    })

    $('.add').on('click', function () {
        // get quantity value
        let quantity = $('.quantity').val();
        quantity = Number(quantity) + 1;
        $('.quantity').val(quantity)
        console.log(quantity)
    })


    // remove
    $('.remove').on('click', function () {
        let quantity = $('.quantity').val();
        quantity = Number(quantity) - 1;
        if (quantity <= 1) {
            $('.quantity').val(1)
        } else {
            $('.quantity').val(quantity)
        }
        console.log(quantity)
    })


})
