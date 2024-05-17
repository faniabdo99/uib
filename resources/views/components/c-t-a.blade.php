<!-- cta-area -->
<section class="cta__area fix">
    <div class="cta__bg" data-background="{{ asset('assets/img/bg/cta_bg.jpg') }}"></div>
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="cta__content">
                    <h2 class="title">@lang('cta.cta_title')</h2>
                    <div class="cta__btn">
                        <a href="{{ route('contact') }}" class="btn btn-two">@lang('cta.cta_btn_1') <img
                                src="{{ asset('assets/img/icons/right_arrow.svg') }}" alt="" class="injectable"></a>
                        <a href="{{ route('contact') }}" class="btn transparent-btn">@lang('cta.cta_btn_2') <img
                                src="{{ asset('assets/img/icons/right_arrow.svg') }}" alt="" class="injectable"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cta__content-right" data-aos="fade-up" data-aos-delay="600">
                    <h4 class="title">@lang('cta.cta_content')</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="cta__shape">
        <img src="{{ asset('assets/img/images/cta_shape.png') }}" alt="shape" data-aos="fade-down-left" data-aos-delay="400">
    </div>
</section>
<!-- cta-area-end -->
