@php
    $contact_section = array_key_exists('contact-us-details', $page_options) ? $page_options['contact-us-details'] : null;
@endphp

<div class="contact-area pt-145 pb-120">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-lg-4">
                <div class="contact-address">
                    <div class="contact-heading">
                        <h4>{{ $contact_section ? $contact_section['contact_with_us_title'] : 'Direct Contact Us' }}</h4>
                    </div>
                    <ul class="contact-address-list">
                        @if(array_key_exists('contact_with_us_items', $contact_section))
                            @foreach(json_decode($contact_section['contact_with_us_items'], true) as $item)
                                <li>
                                    <div class="contact-list-icon">
                                        <i class="{{ $item['icon'] }}"></i>
                                    </div>
                                    <div class="contact-list-text">
                                        @if($item['icon'] === 'fas fa-phone-alt')
                                            <span><a href="tel:{{ $item['value_1'] }}">{{ $item['value_1'] }}</a></span>
                                            <span><a href="tel:{{ $item['value_2'] }}">{{ $item['value_2'] }}</a></span>
                                        @elseif($item['icon'] === 'fas fa-envelope')
                                            <span><a href="mailto:{{ $item['value_1'] }}">{{ $item['value_1'] }}</a></span>
                                            <span><a href="mailto:{{ $item['value_2'] }}">{{ $item['value_2'] }}</a></span>
                                        @else
                                            <span>{{ $item['value_1'] }}</span>
                                            <span>{{ $item['value_2'] }}</span>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="get-in-touch">
                    <div class="contact-heading">
                        <h4>{{ $contact_section ? $contact_section['contact_form_title'] : 'Get in Touch' }}</h4>
                    </div>
                    <form class="contact-form" action="#">
                        <div class="row wow fadeInUp">
                            <div class="col-md-6 mb-30">
                                <input type="text" placeholder="First Name">
                            </div>
                            <div class="col-md-6 mb-30">
                                <input type="text" placeholder="Last Name">
                            </div>
                            <div class="col-md-6 mb-30">
                                <input type="text" placeholder="Email">
                            </div>
                            <div class="col-md-6 mb-30">
                                <input type="text" placeholder="Phone">
                            </div>
                            <div class="col-md-12 mb-30">
                                <input type="text" placeholder="Subject">
                            </div>
                            <div class="col-md-12 mb-30">
                                <textarea name="message" placeholder="Messages....."></textarea>
                            </div>
                            <div class="col-md-6">
                                <button type="submit"><i class="fas fa-paper-plane"></i>SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
