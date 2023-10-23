<section id="contact" class="s-contact">

    <div class="overlay"></div>
    <div class="contact__line"></div>

    <div class="row section-header" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead">{{ __('landing.contact.title') }}</h3>
            <h1 class="display-2 display-2--light">{{ __('landing.contact.subtitle') }}</h1>
        </div>
    </div>

    <div class="row contact-content" data-aos="fade-up">

        <div class="contact-primary">

            <h3 class="h6">{{ __('landing.contact.message.title') }}</h3>

            <form id="contactForm" novalidate="novalidate" onsubmit="submitForm(this)">
                @csrf
                <fieldset>
                    <div class="form-field">
                        <input name="name" type="text" id="contactName"
                            placeholder="{{ __('landing.contact.message.name') }}" minlength="2" required
                            aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="email" type="email" id="contactEmail"
                            placeholder="{{ __('landing.contact.message.email') }}" required aria-required="true"
                            class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="phone" type="tel" id="contactPhone"
                            placeholder="{{ __('landing.contact.message.phone') }}" required aria-required="true"
                            class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="subject" type="text" id="contactSubject"
                            placeholder="{{ __('landing.contact.message.subject') }}" class="full-width">
                    </div>
                    <div class="form-field">
                        <textarea name="message" id="contactMessage" placeholder="{{ __('landing.contact.message.message') }}" rows="10"
                            cols="50" required aria-required="true" class="full-width" style="resize: none;" maxlength="255"></textarea>
                    </div>
                    <div class="form-field">
                        <button class="full-width btn--primary">{{ __('landing.contact.message.button') }}</button>

                    </div>
                </fieldset>
            </form>

            <div class="alert d-none toast"></div>

        </div>

        <div class="contact-secondary">
            <div class="contact-info">

                <h3 class="h6 hide-on-fullwidth">{{__('landing.contact.info.title')}}</h3>

                <div class="cinfo">
                    <h5>{{__('landing.contact.info.address')}}</h5>
                    <p>
                        {{__('landing.contact.info.place')}}<br>
                        {{__('landing.contact.info.district')}}<br>
                        {{__('landing.contact.info.zipcode')}}
                    </p>
                </div>

                <div class="cinfo">
                    <h5>{{__('landing.contact.email')}}</h5>
                    <p>
                        contato@prodelphus.com
                    </p>
                </div>

                <div class="cinfo">
                    <h5>{{__('landing.contact.phones')}}</h5>
                    <p>
                        +55 (81) 3011 1027<br>
                        +55 (81) 3432 7702<br>
                        +55 (81) 9 7109 6821
                    </p>
                </div>

                <ul class="contact-social">
                    <li>
                        <a href="https://www.youtube.com/channel/UC4tlsT1o_6SSmagqpGOf1vA"><i class="fa fa-youtube"
                                aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/prodelphus_simuladores/"><i class="fa fa-instagram"
                                aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/ProDelphus/"><i class="fa fa-facebook"
                                aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://prodelphus.lojaintegrada.com.br/"><i class="fa fa-shopping-cart"
                                aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end contact-social -->

            </div> <!-- end contact-info -->
        </div>

    </div>
</section>

@push('scripts')
    <script>
        function submitForm(form) {
            event.preventDefault();

            const formData = new FormData(form);
            const formValues = {};

            formData.forEach((value, key) => {
                formValues[key] = value;
            });

            const url = "{{ route('landing.contact') }}";

            const xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    form.reset();

                }
                $(".toast").html(JSON.parse(xhr.responseText).message);
            };

            xhr.onerror = function() {
                $(".toast").html(JSON.parse(xhr.responseText).message);
            };

            xhr.send(JSON.stringify(formValues));
        }
    </script>
@endpush
