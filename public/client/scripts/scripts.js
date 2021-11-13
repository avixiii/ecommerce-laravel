/*
|--------------------------------------------------------------------------
| @author: phạm anh tuấn
| @email : tuanpham5024@gmail.com
|--------------------------------------------------------------------------
*/


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

let j = 0
$('.user-log').on('click', function () {
    if (j % 2 === 0) {
        j++
        $('.form-user-log').css('display', 'flex')
    } else {
        $('.form-user-log').css('display', 'none')
        j++
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


/*
|--------------------------------------------------------------------------
| LOGIN AND REGISTER WITH AJAX :
|--------------------------------------------------------------------------
*/


function login(e) {
    e.preventDefault()

    let _token = $("input[name='_token']").val();
    let url = $(this).data('url')
    let data = $('.form-login').serialize()
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (res) {
            if (res.error === false) {
                alert('Đăng nhập thành công')
                location.reload();
            } else {
                alert(res.message)
            }
        }
    });

}

function register(e) {
    e.preventDefault()

    let url = $(this).data('url')

    let data = $('.form-register').serialize()
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (res) {
            if (res.error === false) {
                alert('Tạo tài khoản thành công')
            } else {
                alert(res.message)
            }
        }
    });
}

// Xử lý giỏ hàng

function addToCart(e) {
    e.preventDefault();
    let quantity = $('#quantity').val()
    let url = $(this).data('url') + quantity
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'JSON',
        success: function (data) {
            alert('Thêm sản phẩm thành công ')
        },
        error: function (data) {
            console.log(data)
        }
    });
}

$(function () {
    $('.add_to_cart').on('click', addToCart)

    // xoá sản phẩm khỏi cart
    $('.delete_item').on('click', function (e) {
        e.preventDefault()
        let url = $(this).data('url')
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            url: url,
            success: function (result) {
                if (result.error === false) {
                    alert('Đã xoá sản phẩm khỏi giỏ hàng')
                } else {
                    alert('Sảy ra lỗi không thể xoá sản phẩm')
                }
            }
        })
    })

    // tăng số lượng sản phẩm lên 1
    $('.add').on('click', function (e) {
        // get quantity value
        e.preventDefault();

        let url = $(this).data('url') + 1
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'JSON',
            success: function (data) {
                alert('Thêm sản phẩm thành công ')
                location.reload();
            },
            error: function (data) {
                console.log(data)
            }
        });
    })

    // giảm số lượng sản phẩm xuống 1
    $('.remove').on('click', function (e) {
        e.preventDefault();

        let url = $(this).data('url') + 1
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'JSON',
            success: function (data) {
                if (data.error === false) {
                    alert('đã giảm xuống 1 đơn vị')
                    location.reload();
                } else {
                    alert(data.message)
                    location.reload();
                }
            }
        });
    })

    // LOGIN

    $('.login').on('click', login)

    $('.register').on('click', register)
})
