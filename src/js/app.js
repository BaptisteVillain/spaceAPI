// newsletter
var landing = {};
landing.button = document.querySelector('div.landing_news div.landing_button a');
landing.span = document.querySelector('div.landing_news span');
landing.form = document.querySelector('div.landing_news form');

console.log(landing.button);

landing.button.addEventListener('click', function() {
    landing.span.style.display = 'none';
    landing.button.style.display = 'none';
    landing.form.style.display = 'block';
});
