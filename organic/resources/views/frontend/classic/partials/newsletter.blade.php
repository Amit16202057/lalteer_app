@php
    $subscription_footer_images = json_decode(get_setting('subscription_footer_images', null, $lang), true);
    $sliders = get_slider_images($subscription_footer_images);
    $subscription_footer_title = get_setting('subscription_footer_title', null, $lang);
    $subscription_footer_description = get_setting('subscription_footer_description', null, $lang);
@endphp

@foreach ($sliders as $key => $slider)
    <div class="newsletter_section">
        <img width="100%"
            src="{{ $slider ? my_asset($slider->file_name) : static_asset('assets/img/placeholder.jpg') }}"
            alt="">

        <div class="news_letter_overlay">
            <div class="news_title">
                {{ isset(json_decode($subscription_footer_title, true)[$key]) ? json_decode($subscription_footer_title, true)[$key] : '' }}
            </div>
            <div class="news_desc">
                {{ isset(json_decode($subscription_footer_description, true)[$key]) ? json_decode($subscription_footer_description, true)[$key] : '' }}
            </div>
            <div class="subs_news">
                @if (get_setting('newsletter_activation'))
                    <div class="mb-3">
                        <form method="POST" action="{{ route('subscribers.store') }}" class="position-relative d-flex">
                            @csrf
                            <div style="max-width: 500px; width: 100%; position: relative;">
                                <input type="email" class="form-control shadow-sm"
                                    placeholder="{{ translate('Enter your e-mail') }}" name="email" required
                                    style="border-radius: 25px; padding: 12px 15px; padding-right: 100px; border: 1px solid #ccc;">
                                <button type="submit" class="btn btn-success text-white position-absolute"
                                    style="right: 10px; top: 50%; transform: translateY(-50%); border-radius: 8px; padding: 5px 15px; font-size: 14px;">
                                    {{ translate('Subscribe') }}
                                </button>
                            </div>
                        </form>



                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach
