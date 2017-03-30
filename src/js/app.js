var keys = document.querySelectorAll('.key');

var curiosity_path_svg = document.querySelector('.curiosity-path svg');

function curiosityPath(start, end, animate){
	var path = 'M' + (keys[start].getBoundingClientRect().left+6.5) + ' ' + (keys[start].getBoundingClientRect().top+6.5) + ' ';
	for( var i = start+1; i <= end; i++){
		var pos = keys[i].getBoundingClientRect();
		path += ' L' + (pos.left+6.5) + ' ' + (pos.top+6.5);
	}
	newpath = document.createElementNS('http://www.w3.org/2000/svg',"path"); 
	newpath.setAttributeNS(null, 'd', path);

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

var timeline           = {};
timeline.items         = document.querySelectorAll('.timeline .item');
timeline.previous      = document.querySelector('.timeline-controls .previous');
timeline.next          = document.querySelector('.timeline-controls .next');
timeline.items_infos   = document.querySelectorAll('.timeline .info-item');
timeline.select        = selected;
timeline.line          = document.querySelector('.timeline .line');
timeline.container     = document.querySelector('.timeline .line-container');
timeline.display_sol   = document.querySelector('.timeline .date-display');
timeline.currentSelect = selected;

timeline.previous.addEventListener('click',function(){
	if(timeline.select >= 10){
		timeline.select -= 10;
		timeline.next.classList.remove('hide');
		setTimeline(timeline.select);
		if(timeline.select == 0){
			timeline.previous.classList.add('hide');
		}
	}
	else{
		timeline.select = 0;
		timeline.previous.classList.add('hide');
	}
});

timeline.next.addEventListener('click',function(){
	if(timeline.select <= ressources.length-20){
		timeline.select += 10;
		timeline.previous.classList.remove('hide');
		setTimeline(timeline.select);
	}
	else{
		timeline.select = 110;
		timeline.next.classList.add('hide');
		setTimeline(timeline.select);
	}
});


function setTimeline(index){
	for (var i = index; i <= index+9; i++) {
		if(i >= 0 && i < ressources.length){
			timeline.items[i-index].setAttribute('href', '?sol=' + ressources[i]['sol']);
			timeline.items[i-index].classList.remove('hide');
			timeline.items_infos[i-index].innerHTML = ressources[i]['sol'];
		}else{
			timeline.items[i-index].setAttribute('href', '?sol=' + ressources[ressources.length-1]['sol']);
			timeline.items[i-index].classList.add('hide');
			timeline.items_infos[i-index].innerHTML = '';
		}
	}
	selectTimeline(selected_in);
}

function selectTimeline(index){
	if(timeline.select == timeline.currentSelect){
		var ratio = (timeline.items[index].offsetLeft+6) / timeline.container.offsetWidth;
		timeline.items[index].classList.add('active');
		timeline.line.style.transform = 'scaleX('+ ratio +')';
		timeline.display_sol.classList.remove('hide');
		timeline.display_sol.style.transform = 'translate('+ (timeline.items[index].offsetLeft - 50) +'px)';
		timeline.display_sol.innerHTML = 'sol ' + ressources[(timeline.select + index)]['sol'];
	}
	else if(timeline.select > timeline.currentSelect){
		timeline.line.style.transform = 'scaleX(0)';
		for (var i = timeline.items.length - 1; i >= 0; i--) {
			timeline.items[i].classList.remove('active');
			timeline.display_sol.classList.add('hide');
		}
	}
	else if(timeline.select < timeline.currentSelect){
		timeline.line.style.transform = 'scaleX(1)';
		for (var i = timeline.items.length - 1; i >= 0; i--) {
			timeline.items[i].classList.remove('active');
			timeline.display_sol.classList.add('hide');
		}	
	}
}

function init(){
	setTimeline(timeline.select);
	selectTimeline(selected_in);
	svgInit();
	curiosityPath(0, sol_index, false);
	if(keys[sol_index+1] != undefined){
		curiosityPath(sol_index,(sol_index+1), true);
	}
	keys[sol_index].classList.add('active');
}

init();

document.addEventListener('keydown', function(e) {
	if(e.keyCode == 37 && sol_index != 0){
		keys[sol_index-1].click();
	}
	if(e.keyCode == 39 && sol_index != ressources.length-1){
		keys[sol_index+1].click();
	}
});


/******

LIGHTBOX

******/

function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

document.addEventListener('keydown', function(e) {
   if (e.keyCode == 27 || e.keyCode == 32) {
   	e.preventDefault();
    closeModal();
   }
});

if(photos){
	var slideIndex = 1;
	showSlides(slideIndex);

	document.addEventListener('keydown', function(e) {
	  	if (e.keyCode == 27 || e.keyCode == 32) {
	   		e.preventDefault();
	    	closeModal();
	   	}
	});
}

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots   = document.getElementsByClassName("demo");

  if (n > slides.length) {
    slideIndex = 1
  }
  if (n < 1) {
    slideIndex = slides.length
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

/**************
			ZOOM
**************/

var zoom = {};
zoom.map = document.querySelector('.zoom');
zoom.scale = 200;
zoom.scale_max = 200;


zoom.map.style.transform = 'scale(1)';

zoom.map.addEventListener('wheel', function(e){

	var x = e.pageX;
	var y = e.pageY;

	zoom.scale += e.deltaY;
	if(zoom.scale < zoom.scale_max){
		zoom.scale = zoom.scale_max;
	}
	var ratio = zoom.scale/zoom.scale_max;
	zoom.map.style.transformOrigin = x + 'px ' + y + 'px';
	zoom.map.style.transform = 'scale('+ ratio +')';
});























