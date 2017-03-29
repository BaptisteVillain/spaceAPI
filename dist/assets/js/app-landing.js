// newsletter on landing page
var landing = {};
landing.button = document.querySelector('div.landing_news div.landing_button');
landing.span = document.querySelector('div.landing_news span');
landing.form = document.querySelector('div.landing_news form');

landing.button.addEventListener('click', function() {
    landing.span.style.display = 'none';
    landing.button.style.display = 'none';
    landing.form.style.display = 'block';
});