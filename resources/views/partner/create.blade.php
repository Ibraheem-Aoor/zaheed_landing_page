@extends('layouts.master')
@section('title', config('app.name'))
@section('content')
    <!-- --- Start Main -->
    <main id="">
        <!-- --- Start Bg Red -->
        <section class="sec-bg-red">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-6 col-lg-7">
                        <div class="content-bg-red">
                            <h4>{{ __('general.partner_registration.attract_new_customers') }}</h4>
                            <p>
                                {{ __('general.partner_registration.business_size_message') }}
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-5">
                        <div class="content-all-image-bgRed">
                            <div class="iamge-bg-red">
                                <img class="imageUser" src="{{ asset('assets/img/user.png') }}" alt="" />
                            </div>
                            <div class="pos-star-image">
                                <img class="star-big-left" src="{{ asset('assets/img/Star 1.png') }}" alt="" />
                                <img class="star-small-bottom-left" src="{{ asset('assets/img/Star 1.png') }}"
                                    alt="" />
                                <img class="star-small-top-left" src="{{ asset('assets/img/Star 1.png') }}"
                                    alt="" />
                                <img class="star-big-right" src="{{ asset('assets/img/Star 1.png') }}" alt="" />
                                <img class="star-small-bottom-right" src="{{ asset('assets/img/Star 1.png') }}"
                                    alt="" />
                                <img class="star-small-top-right" src="{{ asset('assets/img/Star 1.png') }}"
                                    alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- -- -End Bg Red -->
        <!-- ------ Sec-step -->
        <section class="sec-step">
            <div class="container">
                <div class="head-title-center">
                    <h4>{{ __('general.partner_registration.registration_title') }}</h4>
                </div>
                <form id="msform" class="custom-form" action="{{ route('partner.apply') }}" method="POST">
                    @csrf
                    <ul id="progressbarAll">
                        <li class="actives">
                            <span>{{ __('general.partner_registration.basic_information') }}</span>
                        </li>
                        <li>
                            <span>{{ __('general.partner_registration.company_information') }}</span>
                        </li>
                        <li>
                            <span>{{ __('general.partner_registration.company_papers') }}</span>
                        </li>
                    </ul>

                    <fieldset id="fieldset-step-1">
                        {{-- hidden inputs --}}
                        <div class="form-partner">
                            <div class="content-form-parnter">
                                <h2>{{ __('general.partner_registration.basic_information') }}</h2>
                                <p>{{ __('general.partner_registration.store_name_type') }}</p>
                            </div>

                            <div class="all-input-failds-partner">
                                <label for=""
                                    class="lab-tst">{{ __('general.partner_registration.store_name_english') }}
                                    <span>*</span></label>
                                <input type="text" required
                                    placeholder="{{ __('general.partner_registration.store_name_english') }}"
                                    name="store_name_en" />
                            </div>
                            <div class="all-input-failds-partner">
                                <label for=""
                                    class="lab-tst">{{ __('general.partner_registration.store_name_arabic') }}
                                    <span>*</span></label>
                                <input required type="text"
                                    placeholder="{{ __('general.partner_registration.enter_name') }}"
                                    name="store_name_ar" />
                            </div>
                            <div class="all-input-failds-partner">
                                <label for="" class="lab-tst">{{ __('general.partner_registration.category') }}
                                    <span>*</span></label>
                                <select class="form-select" required
                                    aria-label="{{ __('general.partner_registration.select_category') }}"
                                    name="category_id">
                                    <option>{{ __('general.partner_registration.select_category') }}</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <!-- ----------- -->
                            <div class="all-input-failds-partner">
                                <label for=""
                                    class="lab-tst">{{ __('general.partner_registration.number_of_branches') }}</label>
                                <input type="text" placeholder="{{ __('general.partner_registration.enter_number') }}"
                                    required name="number_of_branches" />
                            </div>
                            <!-- ------ -->
                            <div class="all-input-failds-partner">
                                <label for=""
                                    class="lab-tst">{{ __('general.partner_registration.user_name_english') }}</label>
                                <input type="text" required
                                    placeholder="{{ __('general.partner_registration.user_name_english') }}"
                                    name="username_en" />
                            </div>
                            <div class="all-input-failds-partner">
                                <label for=""
                                    class="lab-tst">{{ __('general.partner_registration.user_name_arabic') }}</label>
                                <input type="text" required
                                    placeholder="{{ __('general.partner_registration.user_name_arabic') }}"
                                    name="username_ar" />
                            </div>
                            <div class="all-input-failds-partner">
                                <label for=""
                                    class="lab-tst">{{ __('general.partner_registration.email') }}:</label>
                                <input type="text" required
                                    placeholder="{{ __('general.partner_registration.enter_email') }}" name="email" />
                            </div>
                            <div class="all-input-failds-partner">
                                <label for="" class="lab-tst">{{ __('general.partner_registration.city') }}
                                    <span>*</span></label>
                                <select class="form-select" required
                                    aria-label="{{ __('general.partner_registration.select_city') }}" name="city_id">
                                    <option>{{ __('general.partner_registration.select_city') }}</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <input type="button" class="action-button" data-step="1" onclick="validateFieldset($(this), 1);"
                            value="{{ __('general.partner_registration.next') }}" />

                    </fieldset>

                    <fieldset id="fieldset-step-2">
                        {{-- hidden inputs --}}
                        <div class="form-partner">
                            <div class="content-form-parnter">
                                <h2>{{ __('general.partner_registration.company_information') }}</h2>
                                <p>{{ __('general.partner_registration.fill_official_data') }}</p>
                            </div>
                            <div class="all-input-failds-partner">
                                <label for=""
                                    class="lab-tst">{{ __('general.partner_registration.official_company_name_english') }}
                                    <span>*</span></label>
                                <input required type="text"
                                    placeholder="{{ __('general.partner_registration.enter_name') }}"
                                    name="company_name_en" />
                            </div>
                            <div class="all-input-failds-partner">
                                <label for=""
                                    class="lab-tst">{{ __('general.partner_registration.commercial_register') }}
                                    <span>*</span></label>
                                <input required type="text"
                                    placeholder="{{ __('general.partner_registration.enter_commercial_register') }}"
                                    name="commercial_register" />
                            </div>
                            <div class="all-input-failds-partner">
                                <label for="" class="lab-tst">{{ __('general.partner_registration.tax_number') }}
                                    <span>*</span></label>
                                <input required type="text"
                                    placeholder="{{ __('general.partner_registration.enter_tax_number') }}"
                                    name="tax_number" />
                            </div>
                            <div class="all-input-failds-partner">
                                <label for="" class="lab-tst">{{ __('general.partner_registration.email') }}
                                    <span>*</span></label>
                                <input required type="email"
                                    placeholder="{{ __('general.partner_registration.enter_email') }}"
                                    name="company_email" />
                            </div>
                            <div class="all-input-failds-partner">
                                <label for=""
                                    class="lab-tst">{{ __('general.partner_registration.phone_number') }}
                                    <span>*</span></label>
                                <input required type="tel"
                                    placeholder="{{ __('general.partner_registration.enter_phone_number') }}"
                                    name="company_phone" />
                            </div>
                        </div>
                        <input type="button" name="next" class="action-button" data-step="step-2"
                            onclick="validateFieldset($(this), 2);"
                            value="{{ __('general.partner_registration.next') }}" />

                    </fieldset>

                    <fieldset id="fieldset-step-3">
                        {{-- hidden inputs --}}
                        <div class="form-partner">
                            <div class="content-upload-image-Partner">
                                <div class="content-form-parnter">
                                    <h2>{{ __('general.partner_registration.official_papers') }}</h2>
                                    <p>{{ __('general.partner_registration.fill_official_company_data') }}</p>
                                </div>
                                <div class="box-upload-image-company">
                                    <label for="">{{ __('general.partner_registration.cr_number_of_maroof') }}
                                        <span>*</span></label>
                                    <div onclick="UploadImageOneFun();" class="square-upload-image">
                                        <i class="bx bx-cloud-upload"></i>
                                        <h4>
                                            {{ __('general.partner_registration.drop_files_here') }}
                                        </h4>
                                        <h6>
                                            <span>{{ __('general.partner_registration.browse_files_from_computer') }}</span>
                                        </h6>
                                        <input type="file" id="uploadImageOne" name="commercial_no_file" hidden />
                                    </div>
                                </div>
                                <img id="FileImageOne" class="imageAllUpload" src="{{ asset('assets/img/blog-1.jpg') }}"
                                    alt="" />
                                <!-- ------- -->
                                <div class="box-upload-image-company">
                                    <label for="">{{ __('general.partner_registration.vat_registration_number') }}
                                        <span>*</span></label>
                                    <div onclick="UploadImageTowFun();" class="square-upload-image">
                                        <i class="bx bx-cloud-upload"></i>
                                        <h4>
                                            {{ __('general.partner_registration.drop_files_here') }}
                                        </h4>
                                        <h6>
                                            <span>{{ __('general.partner_registration.browse_files_from_computer') }}</span>
                                        </h6>
                                        <input type="file" id="uploadImageTow" name="vat_no_file" hidden />
                                    </div>
                                </div>
                                <img id="FileImageTow" class="imageAllUpload" src="{{ asset('assets/img/blog-1.jpg') }}"
                                    alt="" />
                                <!-- ------------- -->
                                <div class="box-upload-image-company">
                                    <label for="">{{ __('general.partner_registration.iban') }}
                                        <span>*</span></label>
                                    <div onclick="UploadImageThreeFun();" class="square-upload-image">
                                        <i class="bx bx-cloud-upload"></i>
                                        <h4>
                                            {{ __('general.partner_registration.drop_files_here') }}
                                        </h4>
                                        <h6>
                                            <span>{{ __('general.partner_registration.browse_files_from_computer') }}</span>
                                        </h6>
                                        <input type="file" id="uploadImageThree" name="iban_file" hidden />
                                    </div>
                                </div>
                                <img id="FileImageThree" class="imageAllUpload"
                                    src="{{ asset('assets/img/blog-1.jpg') }}" alt="" />
                            </div>
                        </div>

                        <input type="button" class="submit action-button" onclick="validateFieldset($(this), 3);"
                            value="{{ __('general.partner_registration.confirm') }}" />

                    </fieldset>

                </form>
            </div>
        </section>
        <!-- End Sec-Step -->
    </main>
    <!-- --- End Main -->
@endsection

@push('js')
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script src="{{ asset('assets/js/step.js') }}"></script>
    <script>
        let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

        const fileNameImageGellry = document.querySelector("#FileImageOne");
        const InputJUploadGelery = document.querySelector("#uploadImageOne");

        function UploadImageOneFun() {
            InputJUploadGelery.click();

        }
        InputJUploadGelery.addEventListener("change", function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    fileNameImageGellry.src = result;
                };
                // cancelBtn.addEventListener("click", function(){
                //   img.src = "";
                // });
                reader.readAsDataURL(file);
            }
            if (this.value) {
                let valueStore = this.value.match(regExp);
                fileNameImageGellry.textContent = valueStore;
                fileNameImageGellry.classList.toggle("addClassImage");
            }
        });

        // ----------------------

        const fileNameImageGellry2 = document.querySelector("#FileImageTow");
        const InputJUploadGelery2 = document.querySelector("#uploadImageTow");

        function UploadImageTowFun() {
            InputJUploadGelery2.click();

        }
        InputJUploadGelery2.addEventListener("change", function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    fileNameImageGellry2.src = result;
                };
                // cancelBtn.addEventListener("click", function(){
                //   img.src = "";
                // });
                reader.readAsDataURL(file);
            }
            if (this.value) {
                let valueStore = this.value.match(regExp);
                fileNameImageGellry2.textContent = valueStore;
                fileNameImageGellry2.classList.toggle("addClassImage");
            }
        });
        // -------------------
        const fileNameImageGellry3 = document.querySelector("#FileImageThree");
        const InputJUploadGelery3 = document.querySelector("#uploadImageThree");

        function UploadImageThreeFun() {
            InputJUploadGelery3.click();

        }
        InputJUploadGelery3.addEventListener("change", function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    fileNameImageGellry3.src = result;
                };
                // cancelBtn.addEventListener("click", function(){
                //   img.src = "";
                // });
                reader.readAsDataURL(file);
            }
            if (this.value) {
                let valueStore = this.value.match(regExp);
                fileNameImageGellry3.textContent = valueStore;
                fileNameImageGellry3.classList.toggle("addClassImage");
            }
        });
    </script>
    <script>
        var validation_error_msg = "{{ __('general.please_fill_all_inputs') }}";

        function validateFieldset(btn, fieldset_count) {
            var isValid = true;
            var fieldsetElement = $('#fieldset-step-' + fieldset_count);
            var inputElements = fieldsetElement.find('input, select, textarea, [type="file"]');

            inputElements.each(function() {
                // Check if the element is required and its value is empty
                if (($(this).val() === '' || ($(this).is('[type="file"]') && !$(this)
                        .prop('files').length))) {
                    isValid = false;
                    toastr.error(validation_error_msg);
                    return false;
                }
            });
            if (isValid) {
                if (fieldset_count == 3) {
                    $('#msform').submit();
                } else {
                    // slide to the next step
                    goSlide(btn);
                }
            }
        }

        function goSlide(btn) {
            animating = true;

            current_fs = btn.parent();
            next_fs = btn.parent().next();

            $("#progressbarAll li").eq($("fieldset").index(next_fs)).addClass("actives");

            next_fs.show();
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now, mx) {
                    scale = 1 - (1 - now) * 0.2;
                    left = (now * 50) + "%";
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'absolute'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function() {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        }
    </script>
@endpush
