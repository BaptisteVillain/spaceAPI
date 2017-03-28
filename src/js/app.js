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

var keys = document.querySelectorAll('.key');

var curiosity_path_svg = document.querySelector('.curiosity-path svg');

console.log(curiosity_path_svg);

for (var i = keys.length - 1; i >= 0; i--) {
	keys[i].addEventListener('click',function(e){
		//var pos = this.getBoundingClientRect();
		curiosityPath(0,this.index, false);
		curiosityPath(this.index, (this.index+1), true);
	});
}

function curiosityPath(start, end, animate){
	var path = 'M' + (keys[start].getBoundingClientRect().left+6.5) + ' ' + (keys[start].getBoundingClientRect().top+6.5) + ' ';
	for( var i = start+1; i <= end; i++){
		var pos = keys[i].getBoundingClientRect();
		path += ' L' + (pos.left+6.5) + ' ' + (pos.top+6.5);
	}
	newpath = document.createElementNS('http://www.w3.org/2000/svg',"path");
	newpath.setAttributeNS(null, 'd', path);
	console.log(curiosity_path_svg);

	if(animate){
		newpath.setAttribute('class', 'animate');
	}

	curiosity_path_svg.appendChild(newpath);
}


function svgInit(){
	var parent = curiosity_path_svg.parentNode.getBoundingClientRect();

	curiosity_path_svg.setAttribute('viewBox', '0 0 ' + parent.width + ' ' + parent.height);
	curiosity_path_svg.setAttribute('width', parent.width);
	curiosity_path_svg.setAttribute('height', parent.height);

}

svgInit();
curiosityPath(0,43, false);
curiosityPath(43,44, true);
