var preloader = document.getElementById('preloader');
$(document).ready(function () {
    // Hide the preloader initially
    preloader.style.display = 'none';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });

    /* ############# GENERAL FORM SUBMIT ################ */

    $(document).on('submit', '.custom-form', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        preloader.style.display = 'block';
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            processData: false,
            contentType: false,
            data: formData,
            enctype: "multipart/form-data",
            success: function (response) {
                if (response.status) {
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
                if (response.reset_form) {
                    $(this).trigger('reset');
                }
                if (response.modal_to_hide) {
                    $(response.modal_to_hide).modal('hide');
                }
                if (response.reload) {
                    setTimeout(function () {
                        location.reload();
                    }, 1000); // wait for 1 second
                }
                if (response.redirect) {
                    setTimeout(function () {
                        location.href = response.redirect;
                    }, 1000); // wait for 1 second
                }
                preloader.style.display = 'none';
            }, error: function (response) {
                if (response.status == 422) {
                    if (response.responseJSON.errors) {
                        $.each(response.responseJSON.errors, function (key, errorsArray) {
                            $.each(errorsArray, function (item, error) {
                                toastr.error(error);

                            });
                        });
                    } else if (response.responseJSON.message) {
                        $.each(response.responseJSON.message, function (item, error) {
                            toastr.error(error);
                        });
                    }
                } else if (response.responseJSON && response.responseJSON.message) {
                    toastr.error(response.responseJSON.message);
                } else {
                    toastr.error(response.message);
                }
                preloader.style.display = 'none';
            }
        });
    });

    /* ############# GENERAL FORM SUBMIT ################ */



    // English Inputs
    // Get all input elements with the specified class
    const inputs = document.querySelectorAll('.en-only');

    // Iterate over each input and attach event listeners
    inputs.forEach((input) => {
        input.addEventListener('input', (event) => {
            const inputValue = event.target.value;
            const englishCharsRegex = /^[a-zA-Z0-9 -]*$/;

            if (!englishCharsRegex.test(inputValue)) {
                const englishCharsOnly = inputValue.replace(/[^a-zA-Z0-9 -]/g, '');
                event.target.value = englishCharsOnly;
            }
        });
    });


    // Arabic Inputs
    // Get all input elements with the specified class
    const arabicInputs = document.querySelectorAll('.ar-only');

    // Iterate over each input and attach event listeners
    arabicInputs.forEach((input) => {
        input.addEventListener('input', (event) => {
            const arabicInputValue = event.target.value;
            const arabicCharsRegex = /^[\u0600-\u06FF0-9 -]*$/;

            if (!arabicCharsRegex.test(arabicInputValue)) {
                const arabicCharsOnly = arabicInputValue.replace(/[^\u0600-\u06FF0-9 -]/g, '');
                event.target.value = arabicCharsOnly;
            }
        });
    });



    /**
     * Master Checkbox trigger
     * */


    $(document).on('change', '#master-checkbox', function () {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:not(#master-checkbox):not([name="colors_active"]):not([name="refundable"])');
        const isChecked = this.checked;
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = isChecked;
        });
    });





});//End Document Ready



$(function () {
    $("#BoxOneStep").click(function () {
        $("#ImageStepOne").show();
        $("#ImageStepTow").hide();
        $("#ImageStepThree").hide();
        $("#ImageStepFour").hide();
        $(this).addClass("activeBoxWork");
        $("#BoxTowStep").removeClass("activeBoxWork");
        $("#BoxThreeStep").removeClass("activeBoxWork");
        $("#BoxFourStep").removeClass("activeBoxWork");

    });
    // --------
    $("#BoxTowStep").click(function () {
        $("#ImageStepTow").show();
        $("#ImageStepOne").hide();
        $("#ImageStepThree").hide();
        $("#ImageStepFour").hide();
        $(this).addClass("activeBoxWork");
        $("#BoxOneStep").removeClass("activeBoxWork");
        $("#BoxThreeStep").removeClass("activeBoxWork");
        $("#BoxFourStep").removeClass("activeBoxWork");
    });
    // ---------------
    $("#BoxThreeStep").click(function () {
        $("#ImageStepThree").show();
        $("#ImageStepOne").hide();
        $("#ImageStepTow").hide();
        $("#ImageStepFour").hide();
        $(this).addClass("activeBoxWork");
        $("#BoxOneStep").removeClass("activeBoxWork");
        $("#BoxTowStep").removeClass("activeBoxWork");
        $("#BoxFourStep").removeClass("activeBoxWork");
    });
    // ----------
    $("#BoxFourStep").click(function () {
        $("#ImageStepFour").show();
        $("#ImageStepOne").hide();
        $("#ImageStepTow").hide();
        $("#ImageStepThree").hide();
        $(this).addClass("activeBoxWork");
        $("#BoxOneStep").removeClass("activeBoxWork");
        $("#BoxTowStep").removeClass("activeBoxWork");
        $("#BoxThreeStep").removeClass("activeBoxWork");
    });
});





//   ---------


// scroll transition & swipers
let slide = document.querySelectorAll(".card-product");
let index = 0;

function nextSilder() {
    slide[index].classList.remove("activeCardProdut");
    index = (index + 1) % slide.length;
    slide[index].classList.add("activeCardProdut");
}

function prevSilder() {
    slide[index].classList.remove("activeCardProdut");
    index = (index - 1 + slide.length) % slide.length;
    slide[index].classList.add("activeCardProdut");
}
var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 4,
    spaceBetween: 30,

    coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 150,
        modifier: 2,
        slideShadows: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    loop: true,
    breakpoints: {

        900: {
            slidesPerView: 3,

        },
        768: {
            slidesPerView: 2,

        },
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        400: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        100: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
    },

});

AOS.init();
