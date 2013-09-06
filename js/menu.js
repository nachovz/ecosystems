var layers = $("div.section")
var activeLayer = 0;

var animateUpSettings = {
	duration: 1000,
	done: function() {
		document.body.style.overflow = 'auto';
		var strBrowser = navigator.userAgent.toLowerCase();
		if (strBrowser.indexOf('chrome') > 0 || strBrowser.indexOf('safari') > 0) {
			if(history.pushState) {
		        window.history.replaceState(null, window.document.title, '#'+layers[activeLayer].id);
			}else{
				location.hash = '#' + layers[activeLayer].id;
			}
		}	
	}
};

var animateDownSettings = {
	duration: 2000,
	easing: 'sqrt',
	done: animateUpSettings.done
};

/*
	Navigation
*/
var nav = document.getElementById('nav');
var links = nav.getElementsByTagName('a');

nav.onclick = function(e) {
	e = e || window.event;
	var target = e.target || e.srcElement;
	
	if(target.tagName !== 'A') {
		return;
	}
	var id = target.href.match(/#(.+)$/)[1];
	var snapPos = 0;
	
	if(id === "b1"){
		snapPos = 0;
	}else if(id === "b2"){
		snapPos = 4400;
	}else if(id === "b3"){
		snapPos = 8400;
	}
	
	var snapEl = document.getElementById(id);
	if(!snapEl) {
		return;
	}
	
	//var snapPos = s.relativeToAbsolute(snapEl, 'top', 'top');
	
	document.body.style.overflow = 'hidden';
	
	if(snapPos > s.getScrollTop()) {
		s.animateTo(snapPos, animateDownSettings);
	}
	//Up
	else {
		s.animateTo(snapPos, animateUpSettings);
	}
	
	//correct the index of the last layer
	for(var i = 0; i < links.length; i++) {
		if(target === links[i]) {
			activeLayer = i;
			break;
		}
	}

	if(e.preventDefault) {
		e.preventDefault();
	}

	e.returnValue = false;
	
	return false;
};

/*
	Deep linking
*/
/*if(location.hash.indexOf('#') > -1) {
	for(var i = 0; i < layers.length; i++) {
		if(location.hash.indexOf('#' + layers[i].id) > -1) {
			activeLayer = i;
			break;
		}
	}
}*/