@php
    $contact_section = array_key_exists('contact-us-details', $page_options) ? $page_options['contact-us-details'] : null;
@endphp

<div class="contact-map-area">
    <iframe src="{{ $contact_section ? $contact_section['contact_location_url'] : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116834.00977793337!2d90.3492858391922!3d23.780777744454788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1644746359405!5m2!1sen!2sbd' }}"></iframe>
</div>
