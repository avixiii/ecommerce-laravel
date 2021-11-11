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
            console.log(data)
        },
        error: function (data) {
            console.log(data)
        }
    });
}



$(function () {
    $('.add_to_cart').on('click', addToCart)
})
