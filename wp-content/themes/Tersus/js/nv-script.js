
/* NorthVantage Javascript Combination File
--------------------------------------------- */


/* jQuery Flash */
(function(){var $$;$$=jQuery.fn.flash=function(htmlOptions,pluginOptions,replace,update){var block=replace||$$.replace;pluginOptions=$$.copy($$.pluginOptions,pluginOptions);if(!$$.hasFlash(pluginOptions.version)){if(pluginOptions.expressInstall && $$.hasFlash(6,0,65)){var expressInstallOptions={flashvars:{MMredirectURL:location,MMplayerType:'PlugIn',MMdoctitle:jQuery('title').text()}};}else if(pluginOptions.update){block=update||$$.update;}else{return this;}}htmlOptions=$$.copy($$.htmlOptions,expressInstallOptions,htmlOptions);return this.each(function(){block.call(this,$$.copy(htmlOptions));});};$$.copy=function(){var options={},flashvars={};for(var i=0;i<arguments.length;i++){var arg=arguments[i];if(arg==undefined) continue;jQuery.extend(options,arg);if(arg.flashvars==undefined) continue;jQuery.extend(flashvars,arg.flashvars);}options.flashvars=flashvars;return options;};$$.hasFlash=function(){if(/hasFlash\=true/.test(location)) return true;if(/hasFlash\=false/.test(location)) return false;var pv=$$.hasFlash.playerVersion().match(/\d+/g);var rv=String([arguments[0],arguments[1],arguments[2]]).match(/\d+/g)||String($$.pluginOptions.version).match(/\d+/g);for(var i=0;i<3;i++){pv[i]=parseInt(pv[i]||0);rv[i]=parseInt(rv[i]||0);if(pv[i]<rv[i]) return false;if(pv[i]>rv[i]) return true;}return true;};$$.hasFlash.playerVersion=function(){try{try{var axo=new ActiveXObject('ShockwaveFlash.ShockwaveFlash.6');try{axo.AllowScriptAccess='always';}catch(e){return '6,0,0';}}catch(e){}return new ActiveXObject('ShockwaveFlash.ShockwaveFlash').GetVariable('$version').replace(/\D+/g,',').match(/^,?(.+),?$/)[1];}catch(e){try{if(navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin){return(navigator.plugins["Shockwave Flash 2.0"]||navigator.plugins["Shockwave Flash"]).description.replace(/\D+/g,",").match(/^,?(.+),?$/)[1];}}catch(e){}}return '0,0,0';};$$.htmlOptions={height:240,flashvars:{},pluginspage:'http://www.adobe.com/go/getflashplayer',src:'#',type:'application/x-shockwave-flash',width:320};$$.pluginOptions={expressInstall:false,update:true,version:'6.0.65'};$$.replace=function(htmlOptions){this.innerHTML='<div class="alt">'+this.innerHTML+'</div>';jQuery(this).addClass('flash-replaced').prepend($$.transform(htmlOptions));};$$.update=function(htmlOptions){var url=String(location).split('?');url.splice(1,0,'?hasFlash=true&');url=url.join('');var msg='<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>This content requires the Flash Player.<a href="http://www.adobe.com/go/getflashplayer">Download Flash Player</a>. Already have Flash Player?<a href="'+url+'">Click here.</a></p>';this.innerHTML='<span class="alt">'+this.innerHTML+'</span>';jQuery(this).addClass('flash-update').prepend(msg);};function toAttributeString(){var s='';for(var key in this)if(typeof this[key] !='function')s+=key+'="'+this[key]+'" ';return s;};function toFlashvarsString(){var s='';for(var key in this)if(typeof this[key] !='function')s+=key+'='+encodeURIComponent(this[key])+'&';return s.replace(/&$/,'');};$$.transform=function(htmlOptions){htmlOptions.toString=toAttributeString;if(htmlOptions.flashvars) htmlOptions.flashvars.toString=toFlashvarsString;return '<embed '+String(htmlOptions)+'/>';};if(window.attachEvent){window.attachEvent("onbeforeunload",function(){__flash_unloadHandler=function(){};__flash_savedUnloadHandler=function(){};});}})();


/*
 * jQuery UI Effects 1.8.18
 *
 * Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Effects/
 */jQuery.effects||function(a,b){function l(b){if(!b||typeof b=="number"||a.fx.speeds[b])return!0;if(typeof b=="string"&&!a.effects[b])return!0;return!1}function k(b,c,d,e){typeof b=="object"&&(e=c,d=null,c=b,b=c.effect),a.isFunction(c)&&(e=c,d=null,c={});if(typeof c=="number"||a.fx.speeds[c])e=d,d=c,c={};a.isFunction(d)&&(e=d,d=null),c=c||{},d=d||c.duration,d=a.fx.off?0:typeof d=="number"?d:d in a.fx.speeds?a.fx.speeds[d]:a.fx.speeds._default,e=e||c.complete;return[b,c,d,e]}function j(a,b){var c={_:0},d;for(d in b)a[d]!=b[d]&&(c[d]=b[d]);return c}function i(b){var c,d;for(c in b)d=b[c],(d==null||a.isFunction(d)||c in g||/scrollbar/.test(c)||!/color/i.test(c)&&isNaN(parseFloat(d)))&&delete b[c];return b}function h(){var a=document.defaultView?document.defaultView.getComputedStyle(this,null):this.currentStyle,b={},c,d;if(a&&a.length&&a[0]&&a[a[0]]){var e=a.length;while(e--)c=a[e],typeof a[c]=="string"&&(d=c.replace(/\-(\w)/g,function(a,b){return b.toUpperCase()}),b[d]=a[c])}else for(c in a)typeof a[c]=="string"&&(b[c]=a[c]);return b}function d(b,d){var e;do{e=a.curCSS(b,d);if(e!=""&&e!="transparent"||a.nodeName(b,"body"))break;d="backgroundColor"}while(b=b.parentNode);return c(e)}function c(b){var c;if(b&&b.constructor==Array&&b.length==3)return b;if(c=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(b))return[parseInt(c[1],10),parseInt(c[2],10),parseInt(c[3],10)];if(c=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(b))return[parseFloat(c[1])*2.55,parseFloat(c[2])*2.55,parseFloat(c[3])*2.55];if(c=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(b))return[parseInt(c[1],16),parseInt(c[2],16),parseInt(c[3],16)];if(c=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(b))return[parseInt(c[1]+c[1],16),parseInt(c[2]+c[2],16),parseInt(c[3]+c[3],16)];if(c=/rgba\(0, 0, 0, 0\)/.exec(b))return e.transparent;return e[a.trim(b).toLowerCase()]}a.effects={},a.each(["backgroundColor","borderBottomColor","borderLeftColor","borderRightColor","borderTopColor","borderColor","color","outlineColor"],function(b,e){a.fx.step[e]=function(a){a.colorInit||(a.start=d(a.elem,e),a.end=c(a.end),a.colorInit=!0),a.elem.style[e]="rgb("+Math.max(Math.min(parseInt(a.pos*(a.end[0]-a.start[0])+a.start[0],10),255),0)+","+Math.max(Math.min(parseInt(a.pos*(a.end[1]-a.start[1])+a.start[1],10),255),0)+","+Math.max(Math.min(parseInt(a.pos*(a.end[2]-a.start[2])+a.start[2],10),255),0)+")"}});var e={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0],transparent:[255,255,255]},f=["add","remove","toggle"],g={border:1,borderBottom:1,borderColor:1,borderLeft:1,borderRight:1,borderTop:1,borderWidth:1,margin:1,padding:1};a.effects.animateClass=function(b,c,d,e){a.isFunction(d)&&(e=d,d=null);return this.queue(function(){var g=a(this),k=g.attr("style")||" ",l=i(h.call(this)),m,n=g.attr("class");a.each(f,function(a,c){b[c]&&g[c+"Class"](b[c])}),m=i(h.call(this)),g.attr("class",n),g.animate(j(l,m),{queue:!1,duration:c,easing:d,complete:function(){a.each(f,function(a,c){b[c]&&g[c+"Class"](b[c])}),typeof g.attr("style")=="object"?(g.attr("style").cssText="",g.attr("style").cssText=k):g.attr("style",k),e&&e.apply(this,arguments),a.dequeue(this)}})})},a.fn.extend({_addClass:a.fn.addClass,addClass:function(b,c,d,e){return c?a.effects.animateClass.apply(this,[{add:b},c,d,e]):this._addClass(b)},_removeClass:a.fn.removeClass,removeClass:function(b,c,d,e){return c?a.effects.animateClass.apply(this,[{remove:b},c,d,e]):this._removeClass(b)},_toggleClass:a.fn.toggleClass,toggleClass:function(c,d,e,f,g){return typeof d=="boolean"||d===b?e?a.effects.animateClass.apply(this,[d?{add:c}:{remove:c},e,f,g]):this._toggleClass(c,d):a.effects.animateClass.apply(this,[{toggle:c},d,e,f])},switchClass:function(b,c,d,e,f){return a.effects.animateClass.apply(this,[{add:c,remove:b},d,e,f])}}),a.extend(a.effects,{version:"1.8.18",save:function(a,b){for(var c=0;c<b.length;c++)b[c]!==null&&a.data("ec.storage."+b[c],a[0].style[b[c]])},restore:function(a,b){for(var c=0;c<b.length;c++)b[c]!==null&&a.css(b[c],a.data("ec.storage."+b[c]))},setMode:function(a,b){b=="toggle"&&(b=a.is(":hidden")?"show":"hide");return b},getBaseline:function(a,b){var c,d;switch(a[0]){case"top":c=0;break;case"middle":c=.5;break;case"bottom":c=1;break;default:c=a[0]/b.height}switch(a[1]){case"left":d=0;break;case"center":d=.5;break;case"right":d=1;break;default:d=a[1]/b.width}return{x:d,y:c}},createWrapper:function(b){if(b.parent().is(".ui-effects-wrapper"))return b.parent();var c={width:b.outerWidth(!0),height:b.outerHeight(!0),"float":b.css("float")},d=a("<div></div>").addClass("ui-effects-wrapper").css({fontSize:"100%",background:"transparent",border:"none",margin:0,padding:0}),e=document.activeElement;b.wrap(d),(b[0]===e||a.contains(b[0],e))&&a(e).focus(),d=b.parent(),b.css("position")=="static"?(d.css({position:"relative"}),b.css({position:"relative"})):(a.extend(c,{position:b.css("position"),zIndex:b.css("z-index")}),a.each(["top","left","bottom","right"],function(a,d){c[d]=b.css(d),isNaN(parseInt(c[d],10))&&(c[d]="auto")}),b.css({position:"relative",top:0,left:0,right:"auto",bottom:"auto"}));return d.css(c).show()},removeWrapper:function(b){var c,d=document.activeElement;if(b.parent().is(".ui-effects-wrapper")){c=b.parent().replaceWith(b),(b[0]===d||a.contains(b[0],d))&&a(d).focus();return c}return b},setTransition:function(b,c,d,e){e=e||{},a.each(c,function(a,c){unit=b.cssUnit(c),unit[0]>0&&(e[c]=unit[0]*d+unit[1])});return e}}),a.fn.extend({effect:function(b,c,d,e){var f=k.apply(this,arguments),g={options:f[1],duration:f[2],callback:f[3]},h=g.options.mode,i=a.effects[b];if(a.fx.off||!i)return h?this[h](g.duration,g.callback):this.each(function(){g.callback&&g.callback.call(this)});return i.call(this,g)},_show:a.fn.show,show:function(a){if(l(a))return this._show.apply(this,arguments);var b=k.apply(this,arguments);b[1].mode="show";return this.effect.apply(this,b)},_hide:a.fn.hide,hide:function(a){if(l(a))return this._hide.apply(this,arguments);var b=k.apply(this,arguments);b[1].mode="hide";return this.effect.apply(this,b)},__toggle:a.fn.toggle,toggle:function(b){if(l(b)||typeof b=="boolean"||a.isFunction(b))return this.__toggle.apply(this,arguments);var c=k.apply(this,arguments);c[1].mode="toggle";return this.effect.apply(this,c)},cssUnit:function(b){var c=this.css(b),d=[];a.each(["em","px","%","pt"],function(a,b){c.indexOf(b)>0&&(d=[parseFloat(c),b])});return d}}),a.easing.jswing=a.easing.swing,a.extend(a.easing,{def:"easeOutQuad",swing:function(b,c,d,e,f){return a.easing[a.easing.def](b,c,d,e,f)},easeInQuad:function(a,b,c,d,e){return d*(b/=e)*b+c},easeOutQuad:function(a,b,c,d,e){return-d*(b/=e)*(b-2)+c},easeInOutQuad:function(a,b,c,d,e){if((b/=e/2)<1)return d/2*b*b+c;return-d/2*(--b*(b-2)-1)+c},easeInCubic:function(a,b,c,d,e){return d*(b/=e)*b*b+c},easeOutCubic:function(a,b,c,d,e){return d*((b=b/e-1)*b*b+1)+c},easeInOutCubic:function(a,b,c,d,e){if((b/=e/2)<1)return d/2*b*b*b+c;return d/2*((b-=2)*b*b+2)+c},easeInQuart:function(a,b,c,d,e){return d*(b/=e)*b*b*b+c},easeOutQuart:function(a,b,c,d,e){return-d*((b=b/e-1)*b*b*b-1)+c},easeInOutQuart:function(a,b,c,d,e){if((b/=e/2)<1)return d/2*b*b*b*b+c;return-d/2*((b-=2)*b*b*b-2)+c},easeInQuint:function(a,b,c,d,e){return d*(b/=e)*b*b*b*b+c},easeOutQuint:function(a,b,c,d,e){return d*((b=b/e-1)*b*b*b*b+1)+c},easeInOutQuint:function(a,b,c,d,e){if((b/=e/2)<1)return d/2*b*b*b*b*b+c;return d/2*((b-=2)*b*b*b*b+2)+c},easeInSine:function(a,b,c,d,e){return-d*Math.cos(b/e*(Math.PI/2))+d+c},easeOutSine:function(a,b,c,d,e){return d*Math.sin(b/e*(Math.PI/2))+c},easeInOutSine:function(a,b,c,d,e){return-d/2*(Math.cos(Math.PI*b/e)-1)+c},easeInExpo:function(a,b,c,d,e){return b==0?c:d*Math.pow(2,10*(b/e-1))+c},easeOutExpo:function(a,b,c,d,e){return b==e?c+d:d*(-Math.pow(2,-10*b/e)+1)+c},easeInOutExpo:function(a,b,c,d,e){if(b==0)return c;if(b==e)return c+d;if((b/=e/2)<1)return d/2*Math.pow(2,10*(b-1))+c;return d/2*(-Math.pow(2,-10*--b)+2)+c},easeInCirc:function(a,b,c,d,e){return-d*(Math.sqrt(1-(b/=e)*b)-1)+c},easeOutCirc:function(a,b,c,d,e){return d*Math.sqrt(1-(b=b/e-1)*b)+c},easeInOutCirc:function(a,b,c,d,e){if((b/=e/2)<1)return-d/2*(Math.sqrt(1-b*b)-1)+c;return d/2*(Math.sqrt(1-(b-=2)*b)+1)+c},easeInElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(b==0)return c;if((b/=e)==1)return c+d;g||(g=e*.3);if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return-(h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g))+c},easeOutElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(b==0)return c;if((b/=e)==1)return c+d;g||(g=e*.3);if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return h*Math.pow(2,-10*b)*Math.sin((b*e-f)*2*Math.PI/g)+d+c},easeInOutElastic:function(a,b,c,d,e){var f=1.70158,g=0,h=d;if(b==0)return c;if((b/=e/2)==2)return c+d;g||(g=e*.3*1.5);if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);if(b<1)return-0.5*h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)+c;return h*Math.pow(2,-10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)*.5+d+c},easeInBack:function(a,c,d,e,f,g){g==b&&(g=1.70158);return e*(c/=f)*c*((g+1)*c-g)+d},easeOutBack:function(a,c,d,e,f,g){g==b&&(g=1.70158);return e*((c=c/f-1)*c*((g+1)*c+g)+1)+d},easeInOutBack:function(a,c,d,e,f,g){g==b&&(g=1.70158);if((c/=f/2)<1)return e/2*c*c*(((g*=1.525)+1)*c-g)+d;return e/2*((c-=2)*c*(((g*=1.525)+1)*c+g)+2)+d},easeInBounce:function(b,c,d,e,f){return e-a.easing.easeOutBounce(b,f-c,0,e,f)+d},easeOutBounce:function(a,b,c,d,e){return(b/=e)<1/2.75?d*7.5625*b*b+c:b<2/2.75?d*(7.5625*(b-=1.5/2.75)*b+.75)+c:b<2.5/2.75?d*(7.5625*(b-=2.25/2.75)*b+.9375)+c:d*(7.5625*(b-=2.625/2.75)*b+.984375)+c},easeInOutBounce:function(b,c,d,e,f){if(c<f/2)return a.easing.easeInBounce(b,c*2,0,e,f)*.5+d;return a.easing.easeOutBounce(b,c*2-f,0,e,f)*.5+e*.5+d}})}(jQuery);
 
 /*
 * jQuery UI Effects Fade 1.8.18
 *
 * Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Effects/Fade
 *
 * Depends:
 *	jquery.effects.core.js
 */(function(a,b){a.effects.fade=function(b){return this.queue(function(){var c=a(this),d=a.effects.setMode(c,b.options.mode||"hide");c.animate({opacity:d},{queue:!1,duration:b.duration,easing:b.options.easing,complete:function(){b.callback&&b.callback.apply(this,arguments),c.dequeue()}})})}})(jQuery);
 
 /*
 * jQuery UI Effects Slide 1.8.18
 *
 * Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Effects/Slide
 *
 * Depends:
 *	jquery.effects.core.js
 */(function(a,b){a.effects.slide=function(b){return this.queue(function(){var c=a(this),d=["position","top","bottom","left","right"],e=a.effects.setMode(c,b.options.mode||"show"),f=b.options.direction||"left";a.effects.save(c,d),c.show(),a.effects.createWrapper(c).css({overflow:"hidden"});var g=f=="up"||f=="down"?"top":"left",h=f=="up"||f=="left"?"pos":"neg",i=b.options.distance||(g=="top"?c.outerHeight({margin:!0}):c.outerWidth({margin:!0}));e=="show"&&c.css(g,h=="pos"?isNaN(i)?"-"+i:-i:i);var j={};j[g]=(e=="show"?h=="pos"?"+=":"-=":h=="pos"?"-=":"+=")+i,c.animate(j,{queue:!1,duration:b.duration,easing:b.options.easing,complete:function(){e=="hide"&&c.hide(),a.effects.restore(c,d),a.effects.removeWrapper(c),b.callback&&b.callback.apply(this,arguments),c.dequeue()}})})}})(jQuery);
 
 

/**
 * jQuery Plugin to obtain touch gestures from iPhone, iPod Touch and iPad, should also work with Android mobile phones (not tested yet!)
 * Common usage: wipe images (left and right to show the previous or next image)
 * 
 * @author Andreas Waltl, netCU Internetagentur (http://www.netcu.de)
 * @version 1.1.1 (9th December 2010) - fix bug (older IE's had problems)
 * @version 1.1 (1st September 2010) - support wipe up and wipe down
 * @version 1.0 (15th July 2010)
 */
(function($){$.fn.touchwipe=function(settings){var config={min_move_x:20,min_move_y:20,wipeLeft:function(){},wipeRight:function(){},wipeUp:function(){},wipeDown:function(){},preventDefaultEvents:true};if(settings)$.extend(config,settings);this.each(function(){var startX;var startY;var isMoving=false;function cancelTouch(){this.removeEventListener('touchmove',onTouchMove);startX=null;isMoving=false}function onTouchMove(e){if(config.preventDefaultEvents){e.preventDefault()}if(isMoving){var x=e.touches[0].pageX;var y=e.touches[0].pageY;var dx=startX-x;var dy=startY-y;if(Math.abs(dx)>=config.min_move_x){cancelTouch();if(dx>0){config.wipeLeft()}else{config.wipeRight()}}else if(Math.abs(dy)>=config.min_move_y){cancelTouch();if(dy>0){config.wipeDown()}else{config.wipeUp()}}}}function onTouchStart(e){if(e.touches.length==1){startX=e.touches[0].pageX;startY=e.touches[0].pageY;isMoving=true;this.addEventListener('touchmove',onTouchMove,false)}}if('ontouchstart'in document.documentElement){this.addEventListener('touchstart',onTouchStart,false)}});return this}})(jQuery);



/*	reflection.js for jQuery v1.1 - (c) 2006-2011 Christophe Beyls <http://www.digitalia.be>
--------------------------------------------- */

(function(a){a.fn.extend({reflect:function(b){b=a.extend({height:1/3,opacity:0.5},b);return this.unreflect().each(function(){var c=this;if(/^img$/i.test(c.tagName)){function d(){var g=c.width,f=c.height,l,i,m,h,k;i=Math.floor((b.height>1)?Math.min(f,b.height):f*b.height);l=a("<canvas />")[0];if(l.getContext){h=l.getContext("2d");try{a(l).attr({width:g,height:i});h.save();h.translate(0,f-1);h.scale(1,-1);h.drawImage(c,0,0,g,f);h.restore();h.globalCompositeOperation="destination-out";k=h.createLinearGradient(0,0,0,i);k.addColorStop(0,"rgba(255, 255, 255, "+(1-b.opacity)+")");k.addColorStop(1,"rgba(255, 255, 255, 1.0)");h.fillStyle=k;h.rect(0,0,g,i);h.fill()}catch(j){return}}else{if(!a.browser.msie){return}l=a("<img />").attr("src",c.src).css({width:g,height:f,marginBottom:i-f,filter:"FlipV progid:DXImageTransform.Microsoft.Alpha(Opacity="+(b.opacity*100)+", FinishOpacity=0, Style=1, StartX=0, StartY=0, FinishX=0, FinishY="+(i/f*100)+")"})[0]}a(l).css({display:"block",border:0});m=a(/^a$/i.test(c.parentNode.tagName)?"<span />":"<div />").insertAfter(c).append([c,l])[0];m.className=c.className;a.data(c,"reflected",m.style.cssText=c.style.cssText);a(m).css({width:g,height:f+i,overflow:"hidden"});c.style.cssText="display: block; border: 0px";c.className="reflected"}if(c.complete){d()}else{a(c).load(d)}}})},unreflect:function(){return this.unbind("load").each(function(){var c=this,b=a.data(this,"reflected"),d;if(b!==undefined){d=c.parentNode;c.className=d.className;c.style.cssText=b;a.removeData(c,"reflected");d.parentNode.replaceChild(c,d)}})}})})(jQuery);





/*!
 * jQuery Tools v1.2.5 - The missing UI library for the Web
 * 
 * tooltip/tooltip.js
 * 
 * NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.
 * 
 * http://flowplayer.org/tools/
 * 
 */
(function(a){a.tools=a.tools||{version:"v1.2.5"},a.tools.tooltip={conf:{effect:"toggle",fadeOutSpeed:"fast",predelay:0,delay:30,opacity:1,tip:0,position:["top","center"],offset:[0,0],relative:!1,cancelDefault:!0,events:{def:"mouseenter,mouseleave",input:"focus,blur",widget:"focus mouseenter,blur mouseleave",tooltip:"mouseenter,mouseleave"},layout:"<div/>",tipClass:"tooltip"},addEffect:function(a,c,d){b[a]=[c,d]}};var b={toggle:[function(a){var b=this.getConf(),c=this.getTip(),d=b.opacity;d<1&&c.css({opacity:d}),c.show(),a.call()},function(a){this.getTip().hide(),a.call()}],fade:[function(a){var b=this.getConf();this.getTip().fadeTo(b.fadeInSpeed,b.opacity,a)},function(a){this.getTip().fadeOut(this.getConf().fadeOutSpeed,a)}]};function c(b,c,d){var e=d.relative?b.position().top:b.offset().top,f=d.relative?b.position().left:b.offset().left,g=d.position[0];e-=c.outerHeight()-d.offset[0],f+=b.outerWidth()+d.offset[1],/iPad/i.test(navigator.userAgent)&&(e-=a(window).scrollTop());var h=c.outerHeight()+b.outerHeight();g=="center"&&(e+=h/2),g=="bottom"&&(e+=h),g=d.position[1];var i=c.outerWidth()+b.outerWidth();g=="center"&&(f-=i/2),g=="left"&&(f-=i);return{top:e,left:f}}function d(d,e){var f=this,g=d.add(f),h,i=0,j=0,k=d.attr("title"),l=d.attr("data-tooltip"),m=b[e.effect],n,o=d.is(":input"),p=o&&d.is(":checkbox, :radio, select, :button, :submit"),q=d.attr("type"),r=e.events[q]||e.events[o?p?"widget":"input":"def"];if(!m)throw"Nonexistent effect \""+e.effect+"\"";r=r.split(/,\s*/);if(r.length!=2)throw"Tooltip: bad events configuration for "+q;d.bind(r[0],function(a){clearTimeout(i),e.predelay?j=setTimeout(function(){f.show(a)},e.predelay):f.show(a)}).bind(r[1],function(a){clearTimeout(j),e.delay?i=setTimeout(function(){f.hide(a)},e.delay):f.hide(a)}),k&&e.cancelDefault&&(d.removeAttr("title"),d.data("title",k)),a.extend(f,{show:function(b){if(!h){l?h=a(l):e.tip?h=a(e.tip).eq(0):k?h=a(e.layout).addClass(e.tipClass).appendTo(document.body).hide().append(k):(h=d.next(),h.length||(h=d.parent().next()));if(!h.length)throw"Cannot find tooltip for "+d}if(f.isShown())return f;h.stop(!0,!0);var o=c(d,h,e);e.tip&&h.html(d.data("title")),b=b||a.Event(),b.type="onBeforeShow",g.trigger(b,[o]);if(b.isDefaultPrevented())return f;o=c(d,h,e),h.css({position:"absolute",top:o.top,left:o.left}),n=!0,m[0].call(f,function(){b.type="onShow",n="full",g.trigger(b)});var p=e.events.tooltip.split(/,\s*/);h.data("__set")||(h.bind(p[0],function(){clearTimeout(i),clearTimeout(j)}),p[1]&&!d.is("input:not(:checkbox, :radio), textarea")&&h.bind(p[1],function(a){a.relatedTarget!=d[0]&&d.trigger(r[1].split(" ")[0])}),h.data("__set",!0));return f},hide:function(c){if(!h||!f.isShown())return f;c=c||a.Event(),c.type="onBeforeHide",g.trigger(c);if(!c.isDefaultPrevented()){n=!1,b[e.effect][1].call(f,function(){c.type="onHide",g.trigger(c)});return f}},isShown:function(a){return a?n=="full":n},getConf:function(){return e},getTip:function(){return h},getTrigger:function(){return d}}),a.each("onHide,onBeforeShow,onShow,onBeforeHide".split(","),function(b,c){a.isFunction(e[c])&&a(f).bind(c,e[c]),f[c]=function(b){b&&a(f).bind(c,b);return f}})}a.fn.tooltip=function(b){var c=this.data("tooltip");if(c)return c;b=a.extend(!0,{},a.tools.tooltip.conf,b),typeof b.position=="string"&&(b.position=b.position.split(/,?\s/)),this.each(function(){c=new d(a(this),b),a(this).data("tooltip",c)});return b.api?c:this}})(jQuery);


(function(a){a.tools=a.tools||{version:"v1.2.5"},a.tools.tooltip={conf:{effect:"toggle",fadeOutSpeed:"fast",predelay:0,delay:30,opacity:1,tip:0,position:["top","center"],offset:[0,0],relative:!1,cancelDefault:!0,events:{def:"mouseenter,mouseleave",input:"focus,blur",widget:"focus mouseenter,blur mouseleave",tooltip:"mouseenter,mouseleave"},layout:"<div/>",tipClass:"tooltip"},addEffect:function(a,c,d){b[a]=[c,d]}};var b={toggle:[function(a){var b=this.getConf(),c=this.getTip(),d=b.opacity;d<1&&c.css({opacity:d}),c.show(),a.call()},function(a){this.getTip().hide(),a.call()}],fade:[function(a){var b=this.getConf();this.getTip().fadeTo(b.fadeInSpeed,b.opacity,a)},function(a){this.getTip().fadeOut(this.getConf().fadeOutSpeed,a)}]};function c(b,c,d){var e=d.relative?b.position().top:b.offset().top,f=d.relative?b.position().left:b.offset().left,g=d.position[0];e-=c.outerHeight()-d.offset[0],f+=b.outerWidth()+d.offset[1],/iPad/i.test(navigator.userAgent)&&(e-=a(window).scrollTop());var h=c.outerHeight()+b.outerHeight();g=="center"&&(e+=h/2),g=="bottom"&&(e+=h),g=d.position[1];var i=c.outerWidth()+b.outerWidth();g=="center"&&(f-=i/2),g=="left"&&(f-=i);return{top:e,left:f}}function d(d,e){var f=this,g=d.add(f),h,i=0,j=0,k=d.attr("title"),l=d.attr("data-tooltip"),m=b[e.effect],n,o=d.is(":input"),p=o&&d.is(":checkbox, :radio, select, :button, :submit"),q=d.attr("type"),r=e.events[q]||e.events[o?p?"widget":"input":"def"];if(!m)throw"Nonexistent effect \""+e.effect+"\"";r=r.split(/,\s*/);if(r.length!=2)throw"Tooltip: bad events configuration for "+q;d.bind(r[0],function(a){clearTimeout(i),e.predelay?j=setTimeout(function(){f.show(a)},e.predelay):f.show(a)}).bind(r[1],function(a){clearTimeout(j),e.delay?i=setTimeout(function(){f.hide(a)},e.delay):f.hide(a)}),k&&e.cancelDefault&&(d.removeAttr("title"),d.data("title",k)),a.extend(f,{show:function(b){if(!h){l?h=a(l):e.tip?h=a(e.tip).eq(0):k?h=a(e.layout).addClass(e.tipClass).appendTo(document.body).hide().append(k):(h=d.next(),h.length||(h=d.parent().next()));if(!h.length)throw"Cannot find tooltip for "+d}if(f.isShown())return f;h.stop(!0,!0);var o=c(d,h,e);e.tip&&h.html(d.data("title")),b=b||a.Event(),b.type="onBeforeShow",g.trigger(b,[o]);if(b.isDefaultPrevented())return f;o=c(d,h,e),h.css({position:"absolute",top:o.top,left:o.left}),n=!0,m[0].call(f,function(){b.type="onShow",n="full",g.trigger(b)});var p=e.events.tooltip.split(/,\s*/);h.data("__set")||(h.bind(p[0],function(){clearTimeout(i),clearTimeout(j)}),p[1]&&!d.is("input:not(:checkbox, :radio), textarea")&&h.bind(p[1],function(a){a.relatedTarget!=d[0]&&d.trigger(r[1].split(" ")[0])}),h.data("__set",!0));return f},hide:function(c){if(!h||!f.isShown())return f;c=c||a.Event(),c.type="onBeforeHide",g.trigger(c);if(!c.isDefaultPrevented()){n=!1,b[e.effect][1].call(f,function(){c.type="onHide",g.trigger(c)});return f}},isShown:function(a){return a?n=="full":n},getConf:function(){return e},getTip:function(){return h},getTrigger:function(){return d}}),a.each("onHide,onBeforeShow,onShow,onBeforeHide".split(","),function(b,c){a.isFunction(e[c])&&a(f).bind(c,e[c]),f[c]=function(b){b&&a(f).bind(c,b);return f}})}a.fn.tooltip=function(b){var c=this.data("tooltip");if(c)return c;b=a.extend(!0,{},a.tools.tooltip.conf,b),typeof b.position=="string"&&(b.position=b.position.split(/,?\s/)),this.each(function(){c=new d(a(this),b),a(this).data("tooltip",c)});return b.api?c:this}})(jQuery);


/*! fancyBox v2.0.6 fancyapps.com | fancyapps.com/fancybox/#license */
(function(s,l,d,t){var m=d(s),q=d(l),a=d.fancybox=function(){a.open.apply(this,arguments)},u=!1,k=l.createTouch!==t,o=function(a){return"string"===d.type(a)},n=function(b,c){c&&o(b)&&0<b.indexOf("%")&&(b=a.getViewport()[c]/100*parseInt(b,10));return Math.round(b)+"px"};d.extend(a,{version:"2.0.5",defaults:{padding:15,margin:20,width:800,height:600,minWidth:100,minHeight:100,maxWidth:9999,maxHeight:9999,autoSize:!0,autoResize:!k,autoCenter:!k,fitToView:!0,aspectRatio:!1,topRatio:0.5,fixed:!1,scrolling:"auto",
wrapCSS:"",arrows:!0,closeBtn:!0,closeClick:!1,nextClick:!1,mouseWheel:!0,autoPlay:!1,playSpeed:3E3,preload:3,modal:!1,loop:!0,ajax:{dataType:"html",headers:{"X-fancyBox":!0}},keys:{next:[13,32,34,39,40],prev:[8,33,37,38],close:[27]},tpl:{wrap:'<div class="fancybox-wrap"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',image:'<img class="fancybox-image" src="{href}" alt="" />',iframe:'<iframe class="fancybox-iframe" name="fancybox-frame{rnd}" frameborder="0" hspace="0"'+
(d.browser.msie?' allowtransparency="true"':"")+"></iframe>",swf:'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="wmode" value="transparent" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{href}" /><embed src="{href}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="100%" height="100%" wmode="transparent"></embed></object>',error:'<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
closeBtn:'<div title="Close" class="fancybox-item fancybox-close"></div>',next:'<a title="Next" class="fancybox-nav fancybox-next"><span></span></a>',prev:'<a title="Previous" class="fancybox-nav fancybox-prev"><span></span></a>'},openEffect:"fade",openSpeed:300,openEasing:"swing",openOpacity:!0,openMethod:"zoomIn",closeEffect:"fade",closeSpeed:300,closeEasing:"swing",closeOpacity:!0,closeMethod:"zoomOut",nextEffect:"elastic",nextSpeed:300,nextEasing:"swing",nextMethod:"changeIn",prevEffect:"elastic",
prevSpeed:300,prevEasing:"swing",prevMethod:"changeOut",helpers:{overlay:{speedIn:0,speedOut:300,opacity:0.8,css:{cursor:"pointer"},closeClick:!0},title:{type:"float"}}},group:{},opts:{},coming:null,current:null,isOpen:!1,isOpened:!1,player:{timer:null,isActive:!1},ajaxLoad:null,imgPreload:null,transitions:{},helpers:{},open:function(b,c){a.close(!0);b&&!d.isArray(b)&&(b=b instanceof d?d(b).get():[b]);a.isActive=!0;a.opts=d.extend(!0,{},a.defaults,c);d.isPlainObject(c)&&c.keys!==t&&(a.opts.keys=c.keys?
d.extend({},a.defaults.keys,c.keys):!1);a.group=b;a._start(a.opts.index||0)},cancel:function(){a.coming&&!1===a.trigger("onCancel")||(a.coming=null,a.hideLoading(),a.ajaxLoad&&a.ajaxLoad.abort(),a.ajaxLoad=null,a.imgPreload&&(a.imgPreload.onload=a.imgPreload.onabort=a.imgPreload.onerror=null))},close:function(b){a.cancel();a.current&&!1!==a.trigger("beforeClose")&&(a.unbindEvents(),!a.isOpen||b&&!0===b[0]?(d(".fancybox-wrap").stop().trigger("onReset").remove(),a._afterZoomOut()):(a.isOpen=a.isOpened=
!1,d(".fancybox-item, .fancybox-nav").remove(),a.wrap.stop(!0).removeClass("fancybox-opened"),a.inner.css("overflow","hidden"),a.transitions[a.current.closeMethod]()))},play:function(b){var c=function(){clearTimeout(a.player.timer)},e=function(){c();a.current&&a.player.isActive&&(a.player.timer=setTimeout(a.next,a.current.playSpeed))},f=function(){c();d("body").unbind(".player");a.player.isActive=!1;a.trigger("onPlayEnd")};if(a.player.isActive||b&&!1===b[0])f();else if(a.current&&(a.current.loop||
a.current.index<a.group.length-1))a.player.isActive=!0,d("body").bind({"afterShow.player onUpdate.player":e,"onCancel.player beforeClose.player":f,"beforeLoad.player":c}),e(),a.trigger("onPlayStart")},next:function(){a.current&&a.jumpto(a.current.index+1)},prev:function(){a.current&&a.jumpto(a.current.index-1)},jumpto:function(b){a.current&&(b=parseInt(b,10),1<a.group.length&&a.current.loop&&(b>=a.group.length?b=0:0>b&&(b=a.group.length-1)),a.group[b]!==t&&(a.cancel(),a._start(b)))},reposition:function(b,
c){var e;a.isOpen&&(e=a._getPosition(c),b&&"scroll"===b.type?(delete e.position,a.wrap.stop(!0,!0).animate(e,200)):a.wrap.css(e))},update:function(b){a.isOpen&&(u||setTimeout(function(){var c=a.current,e=!b||b&&"orientationchange"===b.type;if(u&&(u=!1,c)){if(!b||"scroll"!==b.type||e)c.autoSize&&"iframe"!==c.type&&(a.inner.height("auto"),c.height=a.inner.height()),(c.autoResize||e)&&a._setDimension(),c.canGrow&&"iframe"!==c.type&&a.inner.height("auto");(c.autoCenter||e)&&a.reposition(b);a.trigger("onUpdate")}},
200),u=!0)},toggle:function(){a.isOpen&&(a.current.fitToView=!a.current.fitToView,a.update())},hideLoading:function(){q.unbind("keypress.fb");d("#fancybox-loading").remove()},showLoading:function(){a.hideLoading();q.bind("keypress.fb",function(b){27===b.keyCode&&(b.preventDefault(),a.cancel())});d('<div id="fancybox-loading"><div></div></div>').click(a.cancel).appendTo("body")},getViewport:function(){return{x:m.scrollLeft(),y:m.scrollTop(),w:k&&s.innerWidth?s.innerWidth:m.width(),h:k&&s.innerHeight?
s.innerHeight:m.height()}},unbindEvents:function(){a.wrap&&a.wrap.unbind(".fb");q.unbind(".fb");m.unbind(".fb")},bindEvents:function(){var b=a.current,c=b.keys;b&&(m.bind("resize.fb orientationchange.fb"+(b.autoCenter&&!b.fixed?" scroll.fb":""),a.update),c&&q.bind("keydown.fb",function(b){var f;f=b.target||b.srcElement;if(!b.ctrlKey&&!b.altKey&&!b.shiftKey&&!b.metaKey&&(!f||!f.type&&!d(f).is("[contenteditable]")))f=b.keyCode,-1<d.inArray(f,c.close)?(a.close(),b.preventDefault()):-1<d.inArray(f,c.next)?
(a.next(),b.preventDefault()):-1<d.inArray(f,c.prev)&&(a.prev(),b.preventDefault())}),d.fn.mousewheel&&b.mouseWheel&&1<a.group.length&&a.wrap.bind("mousewheel.fb",function(b,c){var d=b.target||null;if(0!==c&&(!d||0===d.clientHeight||d.scrollHeight===d.clientHeight&&d.scrollWidth===d.clientWidth))b.preventDefault(),a[0<c?"prev":"next"]()}))},trigger:function(b,c){var e,f=c||a[-1<d.inArray(b,["onCancel","beforeLoad","afterLoad"])?"coming":"current"];if(f){d.isFunction(f[b])&&(e=f[b].apply(f,Array.prototype.slice.call(arguments,
1)));if(!1===e)return!1;f.helpers&&d.each(f.helpers,function(c,e){if(e&&d.isPlainObject(a.helpers[c])&&d.isFunction(a.helpers[c][b]))a.helpers[c][b](e,f)});d.event.trigger(b+".fb")}},isImage:function(a){return o(a)&&a.match(/\.(jpe?g|gif|png|bmp)((\?|#).*)?$/i)},isSWF:function(a){return o(a)&&a.match(/\.(swf)((\?|#).*)?$/i)},_start:function(b){var c={},e=a.group[b]||null,f,g,i;if(e&&(e.nodeType||e instanceof d))f=!0,d.metadata&&(c=d(e).metadata());c=d.extend(!0,{},a.opts,{index:b,element:e},d.isPlainObject(e)?
e:c);d.each(["href","title","content","type"],function(b,g){c[g]=a.opts[g]||f&&d(e).attr(g)||c[g]||null});"number"===typeof c.margin&&(c.margin=[c.margin,c.margin,c.margin,c.margin]);c.modal&&d.extend(!0,c,{closeBtn:!1,closeClick:!1,nextClick:!1,arrows:!1,mouseWheel:!1,keys:null,helpers:{overlay:{css:{cursor:"auto"},closeClick:!1}}});a.coming=c;if(!1===a.trigger("beforeLoad"))a.coming=null;else{g=c.type;b=c.href||e;g||(f&&(g=d(e).data("fancybox-type"),g||(g=(g=e.className.match(/fancybox\.(\w+)/))?
g[1]:null)),!g&&o(b)&&(a.isImage(b)?g="image":a.isSWF(b)?g="swf":b.match(/^#/)&&(g="inline")),g||(g=f?"inline":"html"),c.type=g);if("inline"===g||"html"===g){if(c.content||(c.content="inline"===g?d(o(b)?b.replace(/.*(?=#[^\s]+$)/,""):b):e),!c.content||!c.content.length)g=null}else b||(g=null);"ajax"===g&&o(b)&&(i=b.split(/\s+/,2),b=i.shift(),c.selector=i.shift());c.href=b;c.group=a.group;c.isDom=f;switch(g){case "image":a._loadImage();break;case "ajax":a._loadAjax();break;case "inline":case "iframe":case "swf":case "html":a._afterLoad();
break;default:a._error("type")}}},_error:function(b){a.hideLoading();d.extend(a.coming,{type:"html",autoSize:!0,minWidth:0,minHeight:0,padding:15,hasError:b,content:a.coming.tpl.error});a._afterLoad()},_loadImage:function(){var b=a.imgPreload=new Image;b.onload=function(){this.onload=this.onerror=null;a.coming.width=this.width;a.coming.height=this.height;a._afterLoad()};b.onerror=function(){this.onload=this.onerror=null;a._error("image")};b.src=a.coming.href;(b.complete===t||!b.complete)&&a.showLoading()},
_loadAjax:function(){a.showLoading();a.ajaxLoad=d.ajax(d.extend({},a.coming.ajax,{url:a.coming.href,error:function(b,c){a.coming&&"abort"!==c?a._error("ajax",b):a.hideLoading()},success:function(b,c){"success"===c&&(a.coming.content=b,a._afterLoad())}}))},_preloadImages:function(){var b=a.group,c=a.current,e=b.length,f,g,i,h=Math.min(c.preload,e-1);if(c.preload&&!(2>b.length))for(i=1;i<=h;i+=1)if(f=b[(c.index+i)%e],g=f.href||d(f).attr("href")||f,"image"===f.type||a.isImage(g))(new Image).src=g},_afterLoad:function(){a.hideLoading();
!a.coming||!1===a.trigger("afterLoad",a.current)?a.coming=!1:(a.isOpened?(d(".fancybox-item, .fancybox-nav").remove(),a.wrap.stop(!0).removeClass("fancybox-opened"),a.inner.css("overflow","hidden"),a.transitions[a.current.prevMethod]()):(d(".fancybox-wrap").stop().trigger("onReset").remove(),a.trigger("afterClose")),a.unbindEvents(),a.isOpen=!1,a.current=a.coming,a.wrap=d(a.current.tpl.wrap).addClass("fancybox-"+(k?"mobile":"desktop")+" fancybox-type-"+a.current.type+" fancybox-tmp "+a.current.wrapCSS).appendTo("body"),
a.skin=d(".fancybox-skin",a.wrap).css("padding",n(a.current.padding)),a.outer=d(".fancybox-outer",a.wrap),a.inner=d(".fancybox-inner",a.wrap),a._setContent())},_setContent:function(){var b=a.current,c=b.content,e=b.type,f=b.minWidth,g=b.minHeight,i=b.maxWidth,h=b.maxHeight;switch(e){case "inline":case "ajax":case "html":b.selector?c=d("<div>").html(c).find(b.selector):c instanceof d&&(c.parent().hasClass("fancybox-inner")&&c.parents(".fancybox-wrap").unbind("onReset"),c=c.show().detach(),d(a.wrap).bind("onReset",
function(){c.appendTo("body").hide()}));b.autoSize&&(f=d('<div class="fancybox-wrap '+a.current.wrapCSS+' fancybox-tmp"></div>').appendTo("body").css({minWidth:n(f,"w"),minHeight:n(g,"h"),maxWidth:n(i,"w"),maxHeight:n(h,"h")}).append(c),b.width=f.width(),b.height=f.height(),f.width(a.current.width),f.height()>b.height&&(f.width(b.width+1),b.width=f.width(),b.height=f.height()),c=f.contents().detach(),f.remove());break;case "image":c=b.tpl.image.replace("{href}",b.href);b.aspectRatio=!0;break;case "swf":c=
b.tpl.swf.replace(/\{width\}/g,b.width).replace(/\{height\}/g,b.height).replace(/\{href\}/g,b.href);break;case "iframe":c=d(b.tpl.iframe.replace("{rnd}",(new Date).getTime())).attr("scrolling",b.scrolling).attr("src",b.href),b.scrolling=k?"scroll":"auto"}if("image"===e||"swf"===e)b.autoSize=!1,b.scrolling="visible";"iframe"===e&&b.autoSize?(a.showLoading(),a._setDimension(),a.inner.css("overflow",b.scrolling),c.bind({onCancel:function(){d(this).unbind();a._afterZoomOut()},load:function(){a.hideLoading();
try{this.contentWindow.document.location&&(a.current.height=d(this).contents().find("body").height())}catch(b){a.current.autoSize=!1}a[a.isOpen?"_afterZoomIn":"_beforeShow"]()}}).appendTo(a.inner)):(a.inner.append(c),a._beforeShow())},_beforeShow:function(){a.coming=null;a.trigger("beforeShow");a._setDimension();a.wrap.hide().removeClass("fancybox-tmp");a.bindEvents();a._preloadImages();a.transitions[a.isOpened?a.current.nextMethod:a.current.openMethod]()},_setDimension:function(){var b=a.wrap,c=
a.inner,e=a.current,f=a.getViewport(),g=e.margin,i=2*e.padding,h=e.width,j=e.height,r=e.maxWidth+i,k=e.maxHeight+i,l=e.minWidth+i,m=e.minHeight+i,p;f.w-=g[1]+g[3];f.h-=g[0]+g[2];o(h)&&0<h.indexOf("%")&&(h=(f.w-i)*parseFloat(h)/100);o(j)&&0<j.indexOf("%")&&(j=(f.h-i)*parseFloat(j)/100);g=h/j;h+=i;j+=i;e.fitToView&&(r=Math.min(f.w,r),k=Math.min(f.h,k));if(e.aspectRatio){if(h>r&&(h=r,j=(h-i)/g+i),j>k&&(j=k,h=(j-i)*g+i),h<l&&(h=l,j=(h-i)/g+i),j<m)j=m,h=(j-i)*g+i}else h=Math.max(l,Math.min(h,r)),j=Math.max(m,
Math.min(j,k));h=Math.round(h);j=Math.round(j);d(b.add(c)).width("auto").height("auto");c.width(h-i).height(j-i);b.width(h);p=b.height();if(h>r||p>k)for(;(h>r||p>k)&&h>l&&p>m;)j-=10,e.aspectRatio?(h=Math.round((j-i)*g+i),h<l&&(h=l,j=(h-i)/g+i)):h-=10,c.width(h-i).height(j-i),b.width(h),p=b.height();e.dim={width:n(h),height:n(p)};e.canGrow=e.autoSize&&j>m&&j<k;e.canShrink=!1;e.canExpand=!1;if(h-i<e.width||j-i<e.height)e.canExpand=!0;else if((h>f.w||p>f.h)&&h>l&&j>m)e.canShrink=!0;a.innerSpace=p-i-
c.height()},_getPosition:function(b){var c=a.current,e=a.getViewport(),f=c.margin,d=a.wrap.width()+f[1]+f[3],i=a.wrap.height()+f[0]+f[2],h={position:"absolute",top:f[0]+e.y,left:f[3]+e.x};c.autoCenter&&c.fixed&&!b&&i<=e.h&&d<=e.w&&(h={position:"fixed",top:f[0],left:f[3]});h.top=n(Math.max(h.top,h.top+(e.h-i)*c.topRatio));h.left=n(Math.max(h.left,h.left+0.5*(e.w-d)));return h},_afterZoomIn:function(){var b=a.current,c=b?b.scrolling:"no";if(b&&(a.isOpen=a.isOpened=!0,a.wrap.addClass("fancybox-opened"),
a.inner.css("overflow","yes"===c?"scroll":"no"===c?"hidden":c),a.trigger("afterShow"),a.update(),(b.closeClick||b.nextClick)&&a.inner.css("cursor","pointer").bind("click.fb",function(c){if(!d(c.target).is("a")&&!d(c.target).parent().is("a"))a[b.closeClick?"close":"next"]()}),b.closeBtn&&d(b.tpl.closeBtn).appendTo(a.skin).bind("click.fb",a.close),b.arrows&&1<a.group.length&&((b.loop||0<b.index)&&d(b.tpl.prev).appendTo(a.outer).bind("click.fb",a.prev),(b.loop||b.index<a.group.length-1)&&d(b.tpl.next).appendTo(a.outer).bind("click.fb",
a.next)),a.opts.autoPlay&&!a.player.isActive))a.opts.autoPlay=!1,a.play()},_afterZoomOut:function(){var b=a.current;a.wrap.trigger("onReset").remove();d.extend(a,{group:{},opts:{},current:null,isActive:!1,isOpened:!1,isOpen:!1,wrap:null,skin:null,outer:null,inner:null});a.trigger("afterClose",b)}});a.transitions={getOrigPosition:function(){var b=a.current,c=b.element,e=b.padding,f=d(b.orig),g={},i=50,h=50;!f.length&&b.isDom&&d(c).is(":visible")&&(f=d(c).find("img:first"),f.length||(f=d(c)));f.length?
(g=f.offset(),f.is("img")&&(i=f.outerWidth(),h=f.outerHeight())):(b=a.getViewport(),g.top=b.y+0.5*(b.h-h),g.left=b.x+0.5*(b.w-i));return g={top:n(g.top-e),left:n(g.left-e),width:n(i+2*e),height:n(h+2*e)}},step:function(b,c){var e=c.prop,d,g;if("width"===e||"height"===e)d=Math.ceil(b-2*a.current.padding),"height"===e&&(g=(b-c.start)/(c.end-c.start),c.start>c.end&&(g=1-g),d-=a.innerSpace*g),a.inner[e](d)},zoomIn:function(){var b=a.wrap,c=a.current,e=c.openEffect,f="elastic"===e,g=d.extend({},c.dim,
a._getPosition(f)),i=d.extend({opacity:1},g);delete i.position;f?(g=this.getOrigPosition(),c.openOpacity&&(g.opacity=0),a.outer.add(a.inner).width("auto").height("auto")):"fade"===e&&(g.opacity=0);b.css(g).show().animate(i,{duration:"none"===e?0:c.openSpeed,easing:c.openEasing,step:f?this.step:null,complete:a._afterZoomIn})},zoomOut:function(){var b=a.wrap,c=a.current,d=c.openEffect,f="elastic"===d,g={opacity:0};f&&("fixed"===b.css("position")&&b.css(a._getPosition(!0)),g=this.getOrigPosition(),c.closeOpacity&&
(g.opacity=0));b.animate(g,{duration:"none"===d?0:c.closeSpeed,easing:c.closeEasing,step:f?this.step:null,complete:a._afterZoomOut})},changeIn:function(){var b=a.wrap,c=a.current,d=c.nextEffect,f="elastic"===d,g=a._getPosition(f),i={opacity:1};g.opacity=0;f&&(g.top=n(parseInt(g.top,10)-200),i.top="+=200px");b.css(g).show().animate(i,{duration:"none"===d?0:c.nextSpeed,easing:c.nextEasing,complete:a._afterZoomIn})},changeOut:function(){var b=a.wrap,c=a.current,e=c.prevEffect,f={opacity:0};b.removeClass("fancybox-opened");
"elastic"===e&&(f.top="+=200px");b.animate(f,{duration:"none"===e?0:c.prevSpeed,easing:c.prevEasing,complete:function(){d(this).trigger("onReset").remove()}})}};a.helpers.overlay={overlay:null,update:function(){var a,c;this.overlay.width("100%").height("100%");d.browser.msie||k?(a=Math.max(l.documentElement.scrollWidth,l.body.scrollWidth),c=Math.max(l.documentElement.offsetWidth,l.body.offsetWidth),a=a<c?m.width():a):a=q.width();this.overlay.width(a).height(q.height())},beforeShow:function(b){this.overlay||
(b=d.extend(!0,{},a.defaults.helpers.overlay,b),this.overlay=d('<div id="fancybox-overlay"></div>').css(b.css).appendTo("body"),b.closeClick&&this.overlay.bind("click.fb",a.close),a.current.fixed&&!k?this.overlay.addClass("overlay-fixed"):(this.update(),this.onUpdate=function(){this.update()}),this.overlay.fadeTo(b.speedIn,b.opacity))},afterClose:function(a){this.overlay&&this.overlay.fadeOut(a.speedOut||0,function(){d(this).remove()});this.overlay=null}};a.helpers.title={beforeShow:function(b){var c;
if(c=a.current.title)c=d('<div class="fancybox-title fancybox-title-'+b.type+'-wrap">'+c+"</div>").appendTo("body"),"float"===b.type&&(c.width(c.width()),c.wrapInner('<span class="child"></span>'),a.current.margin[2]+=Math.abs(parseInt(c.css("margin-bottom"),10))),c.appendTo("over"===b.type?a.inner:"outside"===b.type?a.wrap:a.skin)}};d.fn.fancybox=function(b){var c=d(this),e=this.selector||"",f,g=function(g){var h=this,j=f,k;!g.ctrlKey&&!g.altKey&&!g.shiftKey&&!g.metaKey&&!d(h).is(".fancybox-wrap")&&
(g.preventDefault(),g=b.groupAttr||"data-fancybox-group",k=d(h).attr(g),k||(g="rel",k=h[g]),k&&""!==k&&"nofollow"!==k&&(h=e.length?d(e):c,h=h.filter("["+g+'="'+k+'"]'),j=h.index(this)),b.index=j,a.open(h,b))},b=b||{};f=b.index||0;e?q.undelegate(e,"click.fb-start").delegate(e,"click.fb-start",g):c.unbind("click.fb-start").bind("click.fb-start",g);return this};d(l).ready(function(){a.defaults.fixed=d.support.fixedPosition||!(d.browser.msie&&6>=d.browser.version)&&!k})})(window,document,jQuery);
  /*!
 * Media helper for fancyBox
 * version: 1.0.0
 * @requires fancyBox v2.0 or later
 *
 * Usage:
 *     $(".fancybox").fancybox({
 *         media: {}
 *     });
 *
 *  Supports:
 *      Youtube
 *          http://www.youtube.com/watch?v=opj24KnzrWo
 *          http://youtu.be/opj24KnzrWo
 *      Vimeo
 *          http://vimeo.com/25634903
 *      Metacafe
 *          http://www.metacafe.com/watch/7635964/dr_seuss_the_lorax_movie_trailer/
 *          http://www.metacafe.com/watch/7635964/
 *      Dailymotion
 *          http://www.dailymotion.com/video/xoytqh_dr-seuss-the-lorax-premiere_people
 *      Twitvid
 *          http://twitvid.com/QY7MD
 *      Twitpic
 *          http://twitpic.com/7p93st
 *      Instagram
 *          http://instagr.am/p/IejkuUGxQn/
 *          http://instagram.com/p/IejkuUGxQn/
 *      Google maps
 *          http://maps.google.com/maps?q=Eiffel+Tower,+Avenue+Gustave+Eiffel,+Paris,+France&t=h&z=17
 *          http://maps.google.com/?ll=48.857995,2.294297&spn=0.007666,0.021136&t=m&z=16
 *          http://maps.google.com/?ll=48.859463,2.292626&spn=0.000965,0.002642&t=m&z=19&layer=c&cbll=48.859524,2.292532&panoid=YJ0lq28OOy3VT2IqIuVY0g&cbp=12,151.58,,0,-15.56
 */

(function ($) {
	//Shortcut for fancyBox object
	var F = $.fancybox;

	//Add helper object
	F.helpers.media = {
		beforeLoad : function(opts, obj) {
			var href = obj.href || '',
				type = false,
				rez;

			if ((rez = href.match(/(youtube\.com|youtu\.be)\/(v\/|u\/|embed\/|watch\?v=)?([^#\&\?]*).*/i))) {
				href = '//www.youtube.com/embed/' + rez[3] + '?autoplay=1&autohide=1&fs=1&rel=0&enablejsapi=1';
				type = 'iframe';

			} else if ((rez = href.match(/vimeo.com\/(\d+)\/?(.*)/))) {
				href = '//player.vimeo.com/video/' + rez[1] + '?hd=1&autoplay=1&show_title=1&show_byline=1&show_portrait=0&color=&fullscreen=1';
				type = 'iframe';

			} else if ((rez = href.match(/metacafe.com\/watch\/(\d+)\/?(.*)/))) {
				href = '//www.metacafe.com/fplayer/' + rez[1] + '/.swf?playerVars=autoPlay=yes';
				type = 'swf';

			} else if ((rez = href.match(/dailymotion.com\/video\/(.*)\/?(.*)/))) {
				href = '//www.dailymotion.com/swf/video/' + rez[1] + '?additionalInfos=0&autoStart=1';
				type = 'swf';

			} else if ((rez = href.match(/twitvid\.com\/([a-zA-Z0-9_\-\?\=]+)/i))) {
				href = '//www.twitvid.com/embed.php?autoplay=0&guid=' + rez[1];
				type = 'iframe';

			} else if ((rez = href.match(/twitpic\.com\/(?!(?:place|photos|events)\/)([a-zA-Z0-9\?\=\-]+)/i))) {
				href = '//twitpic.com/show/full/' + rez[1];
				type = 'image';

			} else if ((rez = href.match(/(instagr\.am|instagram\.com)\/p\/([a-zA-Z0-9_\-]+)\/?/i))) {
				href = '//' + rez[1] + '/p/' + rez[2] + '/media/?size=l';
				type = 'image';

			} else if ((rez = href.match(/maps\.google\.com\/(\?ll=|maps\/?\?q=)(.*)/i))) {
				href = '//maps.google.com/' + rez[1] + '' + rez[2] + '&output=' + (rez[2].indexOf('layer=c') ? 'svembed' : 'embed');
				type = 'iframe';
			}

			if (type) {
				obj.href = href;
				obj.type = type;
			}
		}
	}

}(jQuery));


/*
 * jQuery Cycle Plugin (with Transition Definitions)
 * Examples and documentation at: http://jquery.malsup.com/cycle/
 * Copyright (c) 2007-2010 M. Alsup
 * Version: 2.99 (12-MAR-2011)
 * Dual licensed under the MIT and GPL licenses.
 * http://jquery.malsup.com/license.html
 * Requires: jQuery v1.3.2 or later
 */
(function($){var ver="2.99";if($.support==undefined){$.support={opacity:!($.browser.msie)};}function debug(s){$.fn.cycle.debug&&log(s);}function log(){window.console&&console.log&&console.log("[cycle] "+Array.prototype.join.call(arguments," "));}$.expr[":"].paused=function(el){return el.cyclePause;};$.fn.cycle=function(options,arg2){var o={s:this.selector,c:this.context};if(this.length===0&&options!="stop"){if(!$.isReady&&o.s){log("DOM not ready, queuing slideshow");$(function(){$(o.s,o.c).cycle(options,arg2);});return this;}log("terminating; zero elements found by selector"+($.isReady?"":" (DOM not ready)"));return this;}return this.each(function(){var opts=handleArguments(this,options,arg2);if(opts===false){return;}opts.updateActivePagerLink=opts.updateActivePagerLink||$.fn.cycle.updateActivePagerLink;if(this.cycleTimeout){clearTimeout(this.cycleTimeout);}this.cycleTimeout=this.cyclePause=0;var $cont=$(this);var $slides=opts.slideExpr?$(opts.slideExpr,this):$cont.children();var els=$slides.get();if(els.length<2){log("terminating; too few slides: "+els.length);return;}var opts2=buildOptions($cont,$slides,els,opts,o);if(opts2===false){return;}var startTime=opts2.continuous?10:getTimeout(els[opts2.currSlide],els[opts2.nextSlide],opts2,!opts2.backwards);if(startTime){startTime+=(opts2.delay||0);if(startTime<10){startTime=10;}debug("first timeout: "+startTime);this.cycleTimeout=setTimeout(function(){go(els,opts2,0,!opts.backwards);},startTime);}});};function handleArguments(cont,options,arg2){if(cont.cycleStop==undefined){cont.cycleStop=0;}if(options===undefined||options===null){options={};}if(options.constructor==String){switch(options){case"destroy":case"stop":var opts=$(cont).data("cycle.opts");if(!opts){return false;}cont.cycleStop++;if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);}cont.cycleTimeout=0;$(cont).removeData("cycle.opts");if(options=="destroy"){destroy(opts);}return false;case"toggle":cont.cyclePause=(cont.cyclePause===1)?0:1;checkInstantResume(cont.cyclePause,arg2,cont);return false;case"pause":cont.cyclePause=1;return false;case"resume":cont.cyclePause=0;checkInstantResume(false,arg2,cont);return false;case"prev":case"next":var opts=$(cont).data("cycle.opts");if(!opts){log('options not found, "prev/next" ignored');return false;}$.fn.cycle[options](opts);return false;default:options={fx:options};}return options;}else{if(options.constructor==Number){var num=options;options=$(cont).data("cycle.opts");if(!options){log("options not found, can not advance slide");return false;}if(num<0||num>=options.elements.length){log("invalid slide index: "+num);return false;}options.nextSlide=num;if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);cont.cycleTimeout=0;}if(typeof arg2=="string"){options.oneTimeFx=arg2;}go(options.elements,options,1,num>=options.currSlide);return false;}}return options;function checkInstantResume(isPaused,arg2,cont){if(!isPaused&&arg2===true){var options=$(cont).data("cycle.opts");if(!options){log("options not found, can not resume");return false;}if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);cont.cycleTimeout=0;}go(options.elements,options,1,!options.backwards);}}}function removeFilter(el,opts){if(!$.support.opacity&&opts.cleartype&&el.style.filter){try{el.style.removeAttribute("filter");}catch(smother){}}}function destroy(opts){if(opts.next){$(opts.next).unbind(opts.prevNextEvent);}if(opts.prev){$(opts.prev).unbind(opts.prevNextEvent);}if(opts.pager||opts.pagerAnchorBuilder){$.each(opts.pagerAnchors||[],function(){this.unbind().remove();});}opts.pagerAnchors=null;if(opts.destroy){opts.destroy(opts);}}function buildOptions($cont,$slides,els,options,o){var opts=$.extend({},$.fn.cycle.defaults,options||{},$.metadata?$cont.metadata():$.meta?$cont.data():{});if(opts.autostop){opts.countdown=opts.autostopCount||els.length;}var cont=$cont[0];$cont.data("cycle.opts",opts);opts.$cont=$cont;opts.stopCount=cont.cycleStop;opts.elements=els;opts.before=opts.before?[opts.before]:[];opts.after=opts.after?[opts.after]:[];if(!$.support.opacity&&opts.cleartype){opts.after.push(function(){removeFilter(this,opts);});}if(opts.continuous){opts.after.push(function(){go(els,opts,0,!opts.backwards);});}saveOriginalOpts(opts);if(!$.support.opacity&&opts.cleartype&&!opts.cleartypeNoBg){clearTypeFix($slides);}if($cont.css("position")=="static"){$cont.css("position","relative");}if(opts.width){$cont.width(opts.width);}if(opts.height&&opts.height!="auto"){$cont.height(opts.height);}if(opts.startingSlide){opts.startingSlide=parseInt(opts.startingSlide);}else{if(opts.backwards){opts.startingSlide=els.length-1;}}if(opts.random){opts.randomMap=[];for(var i=0;i<els.length;i++){opts.randomMap.push(i);}opts.randomMap.sort(function(a,b){return Math.random()-0.5;});opts.randomIndex=1;opts.startingSlide=opts.randomMap[1];}else{if(opts.startingSlide>=els.length){opts.startingSlide=0;}}opts.currSlide=opts.startingSlide||0;var first=opts.startingSlide;$slides.css({position:"absolute",top:0,left:0}).hide().each(function(i){var z;if(opts.backwards){z=first?i<=first?els.length+(i-first):first-i:els.length-i;}else{z=first?i>=first?els.length-(i-first):first-i:els.length-i;}$(this).css("z-index",z);});$(els[first]).css("opacity",1).show();removeFilter(els[first],opts);if(opts.fit&&opts.width){$slides.width(opts.width);}if(opts.fit&&opts.height&&opts.height!="auto"){$slides.height(opts.height);}var reshape=opts.containerResize&&!$cont.innerHeight();if(reshape){var maxw=0,maxh=0;for(var j=0;j<els.length;j++){var $e=$(els[j]),e=$e[0],w=$e.outerWidth(),h=$e.outerHeight();if(!w){w=e.offsetWidth||e.width||$e.attr("width");}if(!h){h=e.offsetHeight||e.height||$e.attr("height");}maxw=w>maxw?w:maxw;maxh=h>maxh?h:maxh;}if(maxw>0&&maxh>0){$cont.css({width:maxw+"px",height:maxh+"px"});}}if(opts.pause){$cont.hover(function(){this.cyclePause++;},function(){this.cyclePause--;});}if(supportMultiTransitions(opts)===false){return false;}var requeue=false;options.requeueAttempts=options.requeueAttempts||0;$slides.each(function(){var $el=$(this);this.cycleH=(opts.fit&&opts.height)?opts.height:($el.height()||this.offsetHeight||this.height||$el.attr("height")||0);this.cycleW=(opts.fit&&opts.width)?opts.width:($el.width()||this.offsetWidth||this.width||$el.attr("width")||0);if($el.is("img")){var loadingIE=($.browser.msie&&this.cycleW==28&&this.cycleH==30&&!this.complete);var loadingFF=($.browser.mozilla&&this.cycleW==34&&this.cycleH==19&&!this.complete);var loadingOp=($.browser.opera&&((this.cycleW==42&&this.cycleH==19)||(this.cycleW==37&&this.cycleH==17))&&!this.complete);var loadingOther=(this.cycleH==0&&this.cycleW==0&&!this.complete);if(loadingIE||loadingFF||loadingOp||loadingOther){if(o.s&&opts.requeueOnImageNotLoaded&&++options.requeueAttempts<100){log(options.requeueAttempts," - img slide not loaded, requeuing slideshow: ",this.src,this.cycleW,this.cycleH);setTimeout(function(){$(o.s,o.c).cycle(options);},opts.requeueTimeout);requeue=true;return false;}else{log("could not determine size of image: "+this.src,this.cycleW,this.cycleH);}}}return true;});if(requeue){return false;}opts.cssBefore=opts.cssBefore||{};opts.cssAfter=opts.cssAfter||{};opts.cssFirst=opts.cssFirst||{};opts.animIn=opts.animIn||{};opts.animOut=opts.animOut||{};$slides.not(":eq("+first+")").css(opts.cssBefore);$($slides[first]).css(opts.cssFirst);if(opts.timeout){opts.timeout=parseInt(opts.timeout);if(opts.speed.constructor==String){opts.speed=$.fx.speeds[opts.speed]||parseInt(opts.speed);}if(!opts.sync){opts.speed=opts.speed/2;}var buffer=opts.fx=="none"?0:opts.fx=="shuffle"?500:250;while((opts.timeout-opts.speed)<buffer){opts.timeout+=opts.speed;}}if(opts.easing){opts.easeIn=opts.easeOut=opts.easing;}if(!opts.speedIn){opts.speedIn=opts.speed;}if(!opts.speedOut){opts.speedOut=opts.speed;}opts.slideCount=els.length;opts.currSlide=opts.lastSlide=first;if(opts.random){if(++opts.randomIndex==els.length){opts.randomIndex=0;}opts.nextSlide=opts.randomMap[opts.randomIndex];}else{if(opts.backwards){opts.nextSlide=opts.startingSlide==0?(els.length-1):opts.startingSlide-1;}else{opts.nextSlide=opts.startingSlide>=(els.length-1)?0:opts.startingSlide+1;}}if(!opts.multiFx){var init=$.fn.cycle.transitions[opts.fx];if($.isFunction(init)){init($cont,$slides,opts);}else{if(opts.fx!="custom"&&!opts.multiFx){log("unknown transition: "+opts.fx,"; slideshow terminating");return false;}}}var e0=$slides[first];if(opts.before.length){opts.before[0].apply(e0,[e0,e0,opts,true]);}if(opts.after.length){opts.after[0].apply(e0,[e0,e0,opts,true]);}if(opts.next){$(opts.next).bind(opts.prevNextEvent,function(){return advance(opts,1);});}if(opts.prev){$(opts.prev).bind(opts.prevNextEvent,function(){return advance(opts,0);});}if(opts.pager||opts.pagerAnchorBuilder){buildPager(els,opts);}exposeAddSlide(opts,els);return opts;}function saveOriginalOpts(opts){opts.original={before:[],after:[]};opts.original.cssBefore=$.extend({},opts.cssBefore);opts.original.cssAfter=$.extend({},opts.cssAfter);opts.original.animIn=$.extend({},opts.animIn);opts.original.animOut=$.extend({},opts.animOut);$.each(opts.before,function(){opts.original.before.push(this);});$.each(opts.after,function(){opts.original.after.push(this);});}function supportMultiTransitions(opts){var i,tx,txs=$.fn.cycle.transitions;if(opts.fx.indexOf(",")>0){opts.multiFx=true;opts.fxs=opts.fx.replace(/\s*/g,"").split(",");for(i=0;i<opts.fxs.length;i++){var fx=opts.fxs[i];tx=txs[fx];if(!tx||!txs.hasOwnProperty(fx)||!$.isFunction(tx)){log("discarding unknown transition: ",fx);opts.fxs.splice(i,1);i--;}}if(!opts.fxs.length){log("No valid transitions named; slideshow terminating.");return false;}}else{if(opts.fx=="all"){opts.multiFx=true;opts.fxs=[];for(p in txs){tx=txs[p];if(txs.hasOwnProperty(p)&&$.isFunction(tx)){opts.fxs.push(p);}}}}if(opts.multiFx&&opts.randomizeEffects){var r1=Math.floor(Math.random()*20)+30;for(i=0;i<r1;i++){var r2=Math.floor(Math.random()*opts.fxs.length);opts.fxs.push(opts.fxs.splice(r2,1)[0]);}debug("randomized fx sequence: ",opts.fxs);}return true;}function exposeAddSlide(opts,els){opts.addSlide=function(newSlide,prepend){var $s=$(newSlide),s=$s[0];if(!opts.autostopCount){opts.countdown++;}els[prepend?"unshift":"push"](s);if(opts.els){opts.els[prepend?"unshift":"push"](s);}opts.slideCount=els.length;$s.css("position","absolute");$s[prepend?"prependTo":"appendTo"](opts.$cont);if(prepend){opts.currSlide++;opts.nextSlide++;}if(!$.support.opacity&&opts.cleartype&&!opts.cleartypeNoBg){clearTypeFix($s);}if(opts.fit&&opts.width){$s.width(opts.width);}if(opts.fit&&opts.height&&opts.height!="auto"){$s.height(opts.height);}s.cycleH=(opts.fit&&opts.height)?opts.height:$s.height();s.cycleW=(opts.fit&&opts.width)?opts.width:$s.width();$s.css(opts.cssBefore);if(opts.pager||opts.pagerAnchorBuilder){$.fn.cycle.createPagerAnchor(els.length-1,s,$(opts.pager),els,opts);}if($.isFunction(opts.onAddSlide)){opts.onAddSlide($s);}else{$s.hide();}};}$.fn.cycle.resetState=function(opts,fx){fx=fx||opts.fx;opts.before=[];opts.after=[];opts.cssBefore=$.extend({},opts.original.cssBefore);opts.cssAfter=$.extend({},opts.original.cssAfter);opts.animIn=$.extend({},opts.original.animIn);opts.animOut=$.extend({},opts.original.animOut);opts.fxFn=null;$.each(opts.original.before,function(){opts.before.push(this);});$.each(opts.original.after,function(){opts.after.push(this);});var init=$.fn.cycle.transitions[fx];if($.isFunction(init)){init(opts.$cont,$(opts.elements),opts);}};function go(els,opts,manual,fwd){if(manual&&opts.busy&&opts.manualTrump){debug("manualTrump in go(), stopping active transition");$(els).stop(true,true);opts.busy=0;}if(opts.busy){debug("transition active, ignoring new tx request");return;}var p=opts.$cont[0],curr=els[opts.currSlide],next=els[opts.nextSlide];if(p.cycleStop!=opts.stopCount||p.cycleTimeout===0&&!manual){return;}if(!manual&&!p.cyclePause&&!opts.bounce&&((opts.autostop&&(--opts.countdown<=0))||(opts.nowrap&&!opts.random&&opts.nextSlide<opts.currSlide))){if(opts.end){opts.end(opts);}return;}var changed=false;if((manual||!p.cyclePause)&&(opts.nextSlide!=opts.currSlide)){changed=true;var fx=opts.fx;curr.cycleH=curr.cycleH||$(curr).height();curr.cycleW=curr.cycleW||$(curr).width();next.cycleH=next.cycleH||$(next).height();next.cycleW=next.cycleW||$(next).width();if(opts.multiFx){if(opts.lastFx==undefined||++opts.lastFx>=opts.fxs.length){opts.lastFx=0;}fx=opts.fxs[opts.lastFx];opts.currFx=fx;}if(opts.oneTimeFx){fx=opts.oneTimeFx;opts.oneTimeFx=null;}$.fn.cycle.resetState(opts,fx);if(opts.before.length){$.each(opts.before,function(i,o){if(p.cycleStop!=opts.stopCount){return;}o.apply(next,[curr,next,opts,fwd]);});}var after=function(){opts.busy=0;$.each(opts.after,function(i,o){if(p.cycleStop!=opts.stopCount){return;}o.apply(next,[curr,next,opts,fwd]);});};debug("tx firing("+fx+"); currSlide: "+opts.currSlide+"; nextSlide: "+opts.nextSlide);opts.busy=1;if(opts.fxFn){opts.fxFn(curr,next,opts,after,fwd,manual&&opts.fastOnEvent);}else{if($.isFunction($.fn.cycle[opts.fx])){$.fn.cycle[opts.fx](curr,next,opts,after,fwd,manual&&opts.fastOnEvent);}else{$.fn.cycle.custom(curr,next,opts,after,fwd,manual&&opts.fastOnEvent);}}}if(changed||opts.nextSlide==opts.currSlide){opts.lastSlide=opts.currSlide;if(opts.random){opts.currSlide=opts.nextSlide;if(++opts.randomIndex==els.length){opts.randomIndex=0;}opts.nextSlide=opts.randomMap[opts.randomIndex];if(opts.nextSlide==opts.currSlide){opts.nextSlide=(opts.currSlide==opts.slideCount-1)?0:opts.currSlide+1;}}else{if(opts.backwards){var roll=(opts.nextSlide-1)<0;if(roll&&opts.bounce){opts.backwards=!opts.backwards;opts.nextSlide=1;opts.currSlide=0;}else{opts.nextSlide=roll?(els.length-1):opts.nextSlide-1;opts.currSlide=roll?0:opts.nextSlide+1;}}else{var roll=(opts.nextSlide+1)==els.length;if(roll&&opts.bounce){opts.backwards=!opts.backwards;opts.nextSlide=els.length-2;opts.currSlide=els.length-1;}else{opts.nextSlide=roll?0:opts.nextSlide+1;opts.currSlide=roll?els.length-1:opts.nextSlide-1;}}}}if(changed&&opts.pager){opts.updateActivePagerLink(opts.pager,opts.currSlide,opts.activePagerClass);}var ms=0;if(opts.timeout&&!opts.continuous){ms=getTimeout(els[opts.currSlide],els[opts.nextSlide],opts,fwd);}else{if(opts.continuous&&p.cyclePause){ms=10;}}if(ms>0){p.cycleTimeout=setTimeout(function(){go(els,opts,0,!opts.backwards);},ms);}}$.fn.cycle.updateActivePagerLink=function(pager,currSlide,clsName){$(pager).each(function(){$(this).children().removeClass(clsName).eq(currSlide).addClass(clsName);});};function getTimeout(curr,next,opts,fwd){if(opts.timeoutFn){var t=opts.timeoutFn.call(curr,curr,next,opts,fwd);while(opts.fx!="none"&&(t-opts.speed)<250){t+=opts.speed;}debug("calculated timeout: "+t+"; speed: "+opts.speed);if(t!==false){return t;}}return opts.timeout;}$.fn.cycle.next=function(opts){advance(opts,1);};$.fn.cycle.prev=function(opts){advance(opts,0);};function advance(opts,moveForward){var val=moveForward?1:-1;var els=opts.elements;var p=opts.$cont[0],timeout=p.cycleTimeout;if(timeout){clearTimeout(timeout);p.cycleTimeout=0;}if(opts.random&&val<0){opts.randomIndex--;if(--opts.randomIndex==-2){opts.randomIndex=els.length-2;}else{if(opts.randomIndex==-1){opts.randomIndex=els.length-1;}}opts.nextSlide=opts.randomMap[opts.randomIndex];}else{if(opts.random){opts.nextSlide=opts.randomMap[opts.randomIndex];}else{opts.nextSlide=opts.currSlide+val;if(opts.nextSlide<0){if(opts.nowrap){return false;}opts.nextSlide=els.length-1;}else{if(opts.nextSlide>=els.length){if(opts.nowrap){return false;}opts.nextSlide=0;}}}}var cb=opts.onPrevNextEvent||opts.prevNextClick;if($.isFunction(cb)){cb(val>0,opts.nextSlide,els[opts.nextSlide]);}go(els,opts,1,moveForward);return false;}function buildPager(els,opts){var $p=$(opts.pager);$.each(els,function(i,o){$.fn.cycle.createPagerAnchor(i,o,$p,els,opts);});opts.updateActivePagerLink(opts.pager,opts.startingSlide,opts.activePagerClass);}$.fn.cycle.createPagerAnchor=function(i,el,$p,els,opts){var a;if($.isFunction(opts.pagerAnchorBuilder)){a=opts.pagerAnchorBuilder(i,el);debug("pagerAnchorBuilder("+i+", el) returned: "+a);}else{a='<a href="#">'+(i+1)+"</a>";}if(!a){return;}var $a=$(a);if($a.parents("body").length===0){var arr=[];if($p.length>1){$p.each(function(){var $clone=$a.clone(true);$(this).append($clone);arr.push($clone[0]);});$a=$(arr);}else{$a.appendTo($p);}}opts.pagerAnchors=opts.pagerAnchors||[];opts.pagerAnchors.push($a);$a.bind(opts.pagerEvent,function(e){e.preventDefault();opts.nextSlide=i;var p=opts.$cont[0],timeout=p.cycleTimeout;if(timeout){clearTimeout(timeout);p.cycleTimeout=0;}var cb=opts.onPagerEvent||opts.pagerClick;if($.isFunction(cb)){cb(opts.nextSlide,els[opts.nextSlide]);}go(els,opts,1,opts.currSlide<i);});if(!/^click/.test(opts.pagerEvent)&&!opts.allowPagerClickBubble){$a.bind("click.cycle",function(){return false;});}if(opts.pauseOnPagerHover){$a.hover(function(){opts.$cont[0].cyclePause++;},function(){opts.$cont[0].cyclePause--;});}};$.fn.cycle.hopsFromLast=function(opts,fwd){var hops,l=opts.lastSlide,c=opts.currSlide;if(fwd){hops=c>l?c-l:opts.slideCount-l;}else{hops=c<l?l-c:l+opts.slideCount-c;}return hops;};function clearTypeFix($slides){debug("applying clearType background-color hack");function hex(s){s=parseInt(s).toString(16);return s.length<2?"0"+s:s;}function getBg(e){for(;e&&e.nodeName.toLowerCase()!="html";e=e.parentNode){var v=$.css(e,"background-color");if(v&&v.indexOf("rgb")>=0){var rgb=v.match(/\d+/g);return"#"+hex(rgb[0])+hex(rgb[1])+hex(rgb[2]);}if(v&&v!="transparent"){return v;}}return"#ffffff";}$slides.each(function(){$(this).css("background-color",getBg(this));});}$.fn.cycle.commonReset=function(curr,next,opts,w,h,rev){$(opts.elements).not(curr).hide();if(typeof opts.cssBefore.opacity=="undefined"){opts.cssBefore.opacity=1;}opts.cssBefore.display="block";if(opts.slideResize&&w!==false&&next.cycleW>0){opts.cssBefore.width=next.cycleW;}if(opts.slideResize&&h!==false&&next.cycleH>0){opts.cssBefore.height=next.cycleH;}opts.cssAfter=opts.cssAfter||{};opts.cssAfter.display="none";$(curr).css("zIndex",opts.slideCount+(rev===true?1:0));$(next).css("zIndex",opts.slideCount+(rev===true?0:1));};$.fn.cycle.custom=function(curr,next,opts,cb,fwd,speedOverride){var $l=$(curr),$n=$(next);var speedIn=opts.speedIn,speedOut=opts.speedOut,easeIn=opts.easeIn,easeOut=opts.easeOut;$n.css(opts.cssBefore);if(speedOverride){if(typeof speedOverride=="number"){speedIn=speedOut=speedOverride;}else{speedIn=speedOut=1;}easeIn=easeOut=null;}var fn=function(){$n.animate(opts.animIn,speedIn,easeIn,function(){cb();});};$l.animate(opts.animOut,speedOut,easeOut,function(){$l.css(opts.cssAfter);if(!opts.sync){fn();}});if(opts.sync){fn();}};$.fn.cycle.transitions={fade:function($cont,$slides,opts){$slides.not(":eq("+opts.currSlide+")").css("opacity",0);opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.opacity=0;});opts.animIn={opacity:1};opts.animOut={opacity:0};opts.cssBefore={top:0,left:0};}};$.fn.cycle.ver=function(){return ver;};$.fn.cycle.defaults={activePagerClass:"activeSlide",after:null,allowPagerClickBubble:false,animIn:null,animOut:null,autostop:0,autostopCount:0,backwards:false,before:null,cleartype:!$.support.opacity,cleartypeNoBg:false,containerResize:1,continuous:0,cssAfter:null,cssBefore:null,delay:0,easeIn:null,easeOut:null,easing:null,end:null,fastOnEvent:0,fit:0,fx:"fade",fxFn:null,height:"auto",manualTrump:true,next:null,nowrap:0,onPagerEvent:null,onPrevNextEvent:null,pager:null,pagerAnchorBuilder:null,pagerEvent:"click.cycle",pause:0,pauseOnPagerHover:0,prev:null,prevNextEvent:"click.cycle",random:0,randomizeEffects:1,requeueOnImageNotLoaded:true,requeueTimeout:250,rev:0,shuffle:null,slideExpr:null,slideResize:1,speed:1000,speedIn:null,speedOut:null,startingSlide:0,sync:1,timeout:4000,timeoutFn:null,updateActivePagerLink:null};})(jQuery);
/*
 * jQuery Cycle Plugin Transition Definitions
 * This script is a plugin for the jQuery Cycle Plugin
 * Examples and documentation at: http://malsup.com/jquery/cycle/
 * Copyright (c) 2007-2010 M. Alsup
 * Version:	 2.73
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 */
(function($){$.fn.cycle.transitions.none=function($cont,$slides,opts){opts.fxFn=function(curr,next,opts,after){$(next).show();$(curr).hide();after();};};$.fn.cycle.transitions.fadeout=function($cont,$slides,opts){$slides.not(":eq("+opts.currSlide+")").css({display:"block",opacity:1});opts.before.push(function(curr,next,opts,w,h,rev){$(curr).css("zIndex",opts.slideCount+(!rev===true?1:0));$(next).css("zIndex",opts.slideCount+(!rev===true?0:1));});opts.animIn.opacity=1;opts.animOut.opacity=0;opts.cssBefore.opacity=1;opts.cssBefore.display="block";opts.cssAfter.zIndex=0;};$.fn.cycle.transitions.scrollUp=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var h=$cont.height();opts.cssBefore.top=h;opts.cssBefore.left=0;opts.cssFirst.top=0;opts.animIn.top=0;opts.animOut.top=-h;};$.fn.cycle.transitions.scrollDown=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var h=$cont.height();opts.cssFirst.top=0;opts.cssBefore.top=-h;opts.cssBefore.left=0;opts.animIn.top=0;opts.animOut.top=h;};$.fn.cycle.transitions.scrollLeft=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var w=$cont.width();opts.cssFirst.left=0;opts.cssBefore.left=w;opts.cssBefore.top=0;opts.animIn.left=0;opts.animOut.left=0-w;};$.fn.cycle.transitions.scrollRight=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var w=$cont.width();opts.cssFirst.left=0;opts.cssBefore.left=-w;opts.cssBefore.top=0;opts.animIn.left=0;opts.animOut.left=w;};$.fn.cycle.transitions.scrollHorz=function($cont,$slides,opts){$cont.css("overflow","hidden").width();opts.before.push(function(curr,next,opts,fwd){if(opts.rev){fwd=!fwd;}$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.left=fwd?(next.cycleW-1):(1-next.cycleW);opts.animOut.left=fwd?-curr.cycleW:curr.cycleW;});opts.cssFirst.left=0;opts.cssBefore.top=0;opts.animIn.left=0;opts.animOut.top=0;};$.fn.cycle.transitions.scrollVert=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push(function(curr,next,opts,fwd){if(opts.rev){fwd=!fwd;}$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.top=fwd?(1-next.cycleH):(next.cycleH-1);opts.animOut.top=fwd?curr.cycleH:-curr.cycleH;});opts.cssFirst.top=0;opts.cssBefore.left=0;opts.animIn.top=0;opts.animOut.left=0;};$.fn.cycle.transitions.slideX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$(opts.elements).not(curr).hide();$.fn.cycle.commonReset(curr,next,opts,false,true);opts.animIn.width=next.cycleW;});opts.cssBefore.left=0;opts.cssBefore.top=0;opts.cssBefore.width=0;opts.animIn.width="show";opts.animOut.width=0;};$.fn.cycle.transitions.slideY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$(opts.elements).not(curr).hide();$.fn.cycle.commonReset(curr,next,opts,true,false);opts.animIn.height=next.cycleH;});opts.cssBefore.left=0;opts.cssBefore.top=0;opts.cssBefore.height=0;opts.animIn.height="show";opts.animOut.height=0;};$.fn.cycle.transitions.shuffle=function($cont,$slides,opts){var i,w=$cont.css("overflow","visible").width();$slides.css({left:0,top:0});opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);});if(!opts.speedAdjusted){opts.speed=opts.speed/2;opts.speedAdjusted=true;}opts.random=0;opts.shuffle=opts.shuffle||{left:-w,top:15};opts.els=[];for(i=0;i<$slides.length;i++){opts.els.push($slides[i]);}for(i=0;i<opts.currSlide;i++){opts.els.push(opts.els.shift());}opts.fxFn=function(curr,next,opts,cb,fwd){if(opts.rev){fwd=!fwd;}var $el=fwd?$(curr):$(next);$(next).css(opts.cssBefore);var count=opts.slideCount;$el.animate(opts.shuffle,opts.speedIn,opts.easeIn,function(){var hops=$.fn.cycle.hopsFromLast(opts,fwd);for(var k=0;k<hops;k++){fwd?opts.els.push(opts.els.shift()):opts.els.unshift(opts.els.pop());}if(fwd){for(var i=0,len=opts.els.length;i<len;i++){$(opts.els[i]).css("z-index",len-i+count);}}else{var z=$(curr).css("z-index");$el.css("z-index",parseInt(z)+1+count);}$el.animate({left:0,top:0},opts.speedOut,opts.easeOut,function(){$(fwd?this:curr).hide();if(cb){cb();}});});};$.extend(opts.cssBefore,{display:"block",opacity:1,top:0,left:0});};$.fn.cycle.transitions.turnUp=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.cssBefore.top=next.cycleH;opts.animIn.height=next.cycleH;opts.animOut.width=next.cycleW;});opts.cssFirst.top=0;opts.cssBefore.left=0;opts.cssBefore.height=0;opts.animIn.top=0;opts.animOut.height=0;};$.fn.cycle.transitions.turnDown=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssFirst.top=0;opts.cssBefore.left=0;opts.cssBefore.top=0;opts.cssBefore.height=0;opts.animOut.height=0;};$.fn.cycle.transitions.turnLeft=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.cssBefore.left=next.cycleW;opts.animIn.width=next.cycleW;});opts.cssBefore.top=0;opts.cssBefore.width=0;opts.animIn.left=0;opts.animOut.width=0;};$.fn.cycle.transitions.turnRight=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.animIn.width=next.cycleW;opts.animOut.left=curr.cycleW;});$.extend(opts.cssBefore,{top:0,left:0,width:0});opts.animIn.left=0;opts.animOut.width=0;};$.fn.cycle.transitions.zoom=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,false,true);opts.cssBefore.top=next.cycleH/2;opts.cssBefore.left=next.cycleW/2;$.extend(opts.animIn,{top:0,left:0,width:next.cycleW,height:next.cycleH});$.extend(opts.animOut,{width:0,height:0,top:curr.cycleH/2,left:curr.cycleW/2});});opts.cssFirst.top=0;opts.cssFirst.left=0;opts.cssBefore.width=0;opts.cssBefore.height=0;};$.fn.cycle.transitions.fadeZoom=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,false);opts.cssBefore.left=next.cycleW/2;opts.cssBefore.top=next.cycleH/2;$.extend(opts.animIn,{top:0,left:0,width:next.cycleW,height:next.cycleH});});opts.cssBefore.width=0;opts.cssBefore.height=0;opts.animOut.opacity=0;};$.fn.cycle.transitions.blindX=function($cont,$slides,opts){var w=$cont.css("overflow","hidden").width();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.width=next.cycleW;opts.animOut.left=curr.cycleW;});opts.cssBefore.left=w;opts.cssBefore.top=0;opts.animIn.left=0;opts.animOut.left=w;};$.fn.cycle.transitions.blindY=function($cont,$slides,opts){var h=$cont.css("overflow","hidden").height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssBefore.top=h;opts.cssBefore.left=0;opts.animIn.top=0;opts.animOut.top=h;};$.fn.cycle.transitions.blindZ=function($cont,$slides,opts){var h=$cont.css("overflow","hidden").height();var w=$cont.width();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssBefore.top=h;opts.cssBefore.left=w;opts.animIn.top=0;opts.animIn.left=0;opts.animOut.top=h;opts.animOut.left=w;};$.fn.cycle.transitions.growX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.cssBefore.left=this.cycleW/2;opts.animIn.left=0;opts.animIn.width=this.cycleW;opts.animOut.left=0;});opts.cssBefore.top=0;opts.cssBefore.width=0;};$.fn.cycle.transitions.growY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.cssBefore.top=this.cycleH/2;opts.animIn.top=0;opts.animIn.height=this.cycleH;opts.animOut.top=0;});opts.cssBefore.height=0;opts.cssBefore.left=0;};$.fn.cycle.transitions.curtainX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true,true);opts.cssBefore.left=next.cycleW/2;opts.animIn.left=0;opts.animIn.width=this.cycleW;opts.animOut.left=curr.cycleW/2;opts.animOut.width=0;});opts.cssBefore.top=0;opts.cssBefore.width=0;};$.fn.cycle.transitions.curtainY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false,true);opts.cssBefore.top=next.cycleH/2;opts.animIn.top=0;opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH/2;opts.animOut.height=0;});opts.cssBefore.height=0;opts.cssBefore.left=0;};$.fn.cycle.transitions.cover=function($cont,$slides,opts){var d=opts.direction||"left";var w=$cont.css("overflow","hidden").width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);if(d=="right"){opts.cssBefore.left=-w;}else{if(d=="up"){opts.cssBefore.top=h;}else{if(d=="down"){opts.cssBefore.top=-h;}else{opts.cssBefore.left=w;}}}});opts.animIn.left=0;opts.animIn.top=0;opts.cssBefore.top=0;opts.cssBefore.left=0;};$.fn.cycle.transitions.uncover=function($cont,$slides,opts){var d=opts.direction||"left";var w=$cont.css("overflow","hidden").width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);if(d=="right"){opts.animOut.left=w;}else{if(d=="up"){opts.animOut.top=-h;}else{if(d=="down"){opts.animOut.top=h;}else{opts.animOut.left=-w;}}}});opts.animIn.left=0;opts.animIn.top=0;opts.cssBefore.top=0;opts.cssBefore.left=0;};$.fn.cycle.transitions.toss=function($cont,$slides,opts){var w=$cont.css("overflow","visible").width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);if(!opts.animOut.left&&!opts.animOut.top){$.extend(opts.animOut,{left:w*2,top:-h/2,opacity:0});}else{opts.animOut.opacity=0;}});opts.cssBefore.left=0;opts.cssBefore.top=0;opts.animIn.left=0;};$.fn.cycle.transitions.wipe=function($cont,$slides,opts){var w=$cont.css("overflow","hidden").width();var h=$cont.height();opts.cssBefore=opts.cssBefore||{};var clip;if(opts.clip){if(/l2r/.test(opts.clip)){clip="rect(0px 0px "+h+"px 0px)";}else{if(/r2l/.test(opts.clip)){clip="rect(0px "+w+"px "+h+"px "+w+"px)";}else{if(/t2b/.test(opts.clip)){clip="rect(0px "+w+"px 0px 0px)";}else{if(/b2t/.test(opts.clip)){clip="rect("+h+"px "+w+"px "+h+"px 0px)";}else{if(/zoom/.test(opts.clip)){var top=parseInt(h/2);var left=parseInt(w/2);clip="rect("+top+"px "+left+"px "+top+"px "+left+"px)";}}}}}}opts.cssBefore.clip=opts.cssBefore.clip||clip||"rect(0px 0px 0px 0px)";var d=opts.cssBefore.clip.match(/(\d+)/g);var t=parseInt(d[0]),r=parseInt(d[1]),b=parseInt(d[2]),l=parseInt(d[3]);opts.before.push(function(curr,next,opts){if(curr==next){return;}var $curr=$(curr),$next=$(next);$.fn.cycle.commonReset(curr,next,opts,true,true,false);opts.cssAfter.display="block";var step=1,count=parseInt((opts.speedIn/13))-1;(function f(){var tt=t?t-parseInt(step*(t/count)):0;var ll=l?l-parseInt(step*(l/count)):0;var bb=b<h?b+parseInt(step*((h-b)/count||1)):h;var rr=r<w?r+parseInt(step*((w-r)/count||1)):w;$next.css({clip:"rect("+tt+"px "+rr+"px "+bb+"px "+ll+"px)"});(step++<=count)?setTimeout(f,13):$curr.css("display","none");})();});$.extend(opts.cssBefore,{display:"block",opacity:1,top:0,left:0});opts.animIn={left:0};opts.animOut={left:0};};})(jQuery);



/*
* hoverFlow - A Solution to Animation Queue Buildup in jQuery
* Version 1.00
*
* Copyright (c) 2009 Ralf Stoltze, http://www.2meter3.de/code/hoverFlow/
* Dual-licensed under the MIT and GPL licenses.
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
(function($){$.fn.hoverFlow=function(c,d,e,f,g){if($.inArray(c,['mouseover','mouseenter','mouseout','mouseleave'])==-1){return this}var h=typeof e==='object'?e:{complete:g||!g&&f||$.isFunction(e)&&e,duration:e,easing:g&&f||f&&!$.isFunction(f)&&f};h.queue=false;var i=h.complete;h.complete=function(){$(this).dequeue();if($.isFunction(i)){i.call(this)}};return this.each(function(){var b=$(this);if(c=='mouseover'||c=='mouseenter'){b.data('jQuery.hoverFlow',true)}else{b.removeData('jQuery.hoverFlow')}b.queue(function(){var a=(c=='mouseover'||c=='mouseenter')?b.data('jQuery.hoverFlow')!==undefined:b.data('jQuery.hoverFlow')===undefined;if(a){b.animate(d,h)}else{b.queue([])}})})}})(jQuery);



/* :: NorthVantage functions
--------------------------------------------- */

jQuery(document).ready(function($){


/* :: Header Search											      
--------------------------------------------- */

$('#panelsearchsubmit').click(function() {
	if($("#panelsearchform").hasClass("disabled")) {
	
		$('#panelsearchform').animate({
			width: 140
		  }, 500, function() {
			// Animation complete.
		});	

		$('#panelsearchform #drops').animate({
			opacity: 1
		  }, 500, function() {
			// Animation complete.
		});	
		
        $( "#panelsearchform" ).switchClass( "disabled","active");

			 
		 
	} else if($("#panelsearchform").hasClass("active")) {
		
		if($("#panelsearchform #drops").val()!='') {
			
			$("#panelsearchform").submit();
			
		} else {
			
			$('#panelsearchform #drops').animate({
				opacity: 0
			  }, 500, function() {
				// Animation complete.
			});	
				
			$('#panelsearchform').animate({
				width: 22
			  }, 500, function() {
				// Animation complete.
			});	

			$( "#panelsearchform" ).switchClass( "active", "disabled");		
				 
		}
	}
});

	
/* :: Navigation												      
--------------------------------------------- */

	$('#nv_selectmenu select').change(function() {
		if ($(this).val()!='') {
			if($(this).hasClass('wp-page-nav')) {
				window.location.href='?p='+$(this).val();
			} else {
				window.location.href=$(this).val();
			}
    	}
	});

	$('ul.sub-menu,ul.children').parent().addClass('hasdropmenu');
	$('ul.sub-menu,ul.children').parent().prepend('<span class="dropmenu-icon"></span>');
	
	if($('#nv-tabs').hasClass('center')) {

		$('#nv-tabs ul li.hasdropmenu').not('#nv-tabs ul li ul li.hasdropmenu, #nv-tabs #megaMenu ul li.hasdropmenu').find('.dropmenu-icon').delay(500).animate({
			opacity:1
		});
	
	} else {

		$('#nv-tabs ul li.hasdropmenu').not('#nv-tabs ul li ul li.hasdropmenu, #nv-tabs #megaMenu ul li.hasdropmenu').delay(500).animate({
			paddingRight:'15px'
			},function() {
			$(this).find('.dropmenu-icon').animate({
				opacity:1
				});
		});	
	
	}
	

	

	$('#nv-tabs ul li').not('#nv-tabs ul li ul li,#nv-tabs ul li.extended-menu ul li,#nv-tabs ul li .dropmenu-icon, #nv-tabs ul li.submenu-left').hover(function(e) {
			
			$(this).find('ul:first').css('display','none').hoverFlow(e.type, { 
			height: "show",
			opacity:0.97,
			left: '0'
			}, 550, "easeInOutCubic");
			}, function(e) {
			$(this).find('ul:first').css('display','block').hoverFlow(e.type, { 
			height: "hide",
			left: '-50px',
			opacity:0 
			}, 350, "easeInBack");
	});

	$('#nv-tabs ul li.submenu-left').not('#nv-tabs ul li ul li,#nv-tabs ul li.extended-menu ul li,#nv-tabs ul li .dropmenu-icon').hover(function(e) {
			
			$(this).find('ul:first').css('display','none').hoverFlow(e.type, { 
			height: "show",
			opacity:0.97,
			right: '0'
			}, 550, "easeInOutCubic");
			}, function(e) {
			$(this).find('ul:first').css('display','block').hoverFlow(e.type, { 
			height: "hide",
			right: '-50px',
			opacity:0 
			}, 350, "easeInBack");
	});	

	$('#nv-tabs ul li ul li').not('#nv-tabs ul li.extended-menu ul li,#nv-tabs ul li.submenu-left ul li').hover(function(f) {
			
			$(this).find('ul:first').css('display','none').hoverFlow(f.type, { 
			height: "show",
			opacity:0.97,
			left: '199px'
			}, 550, "easeInOutCubic");
			}, function(f) {
			$(this).find('ul:first').css('display','block').hoverFlow(f.type, { 
			height: "hide",
			left: '0',
			opacity:0 
			}, 350, "easeInBack");
	});
	

	$('#nv-tabs ul li.submenu-left ul li').not('#nv-tabs ul li.extended-menu ul li').hover(function(f) {
			
			$(this).find('ul:first').css('display','none').hoverFlow(f.type, { 
			height: "show",
			opacity:0.97,
			right: '199px'
			}, 550, "easeInOutCubic");
			}, function(f) {
			$(this).find('ul:first').css('display','block').hoverFlow(f.type, { 
			height: "hide",
			right: '0',
			opacity:0 
			}, 350, "easeInBack");
	});	

	
	$('#nv-tabs li a').not('#nv-tabs li li a, #nv-tabs #megaMenu ul li a').prepend('<span class="menu-highlight"></span>');
							 
	$('#nv-tabs li').not('#nv-tabs li.hasdropmenu,#nv-tabs li.current_page_item').hover(function(g) {
	
	$(this).find('.menu-highlight').hoverFlow(g.type, {
		width: '100%',
		opacity: 1
	  }, 250, "easeInOutCubic", function() {
		// Animation complete.
	  });
	  
	}, function(g) {
	
	$(this).find('.menu-highlight').hoverFlow(g.type, {
		width: '0',
		opacity: 0
	  }, 110, "easeOutQuad", function() {
		// Animation complete.
	  });
	
	});


	if($.browser.msie && $.browser.version == 7) {
		var menuwidth=$('#nv-tabs.center').width();
		menuwidth=menuwidth/2;
		$('#nv-tabs.center').css({
			'left':'50%',
			'margin-left':'-'+menuwidth+'px',
			'float':'left'
			});
	}
	


/* :: Text Resizer									      
--------------------------------------------- */	
	


  // Increase Font Size
  $(".increaseFont").click(function(){
    var currentFontSize = $('.content-wrap').css('font-size');
    var currentFontSizeNum = parseFloat(currentFontSize, 10);
    var newFontSize = currentFontSizeNum*1.1;
    $('.content-wrap').css('font-size', newFontSize);	
    return false;
  });
  // Decrease Font Size
  $(".decreaseFont").click(function(){
    var currentFontSize = $('.content-wrap').css('font-size');
    var currentFontSizeNum = parseFloat(currentFontSize, 10);
    var newFontSize = currentFontSizeNum*0.9;
    $('.content-wrap').css('font-size', newFontSize);
    return false;
  });
	

/* :: WPEC Modifications										      
--------------------------------------------- */
	

$(".product_form").live('submit' , function() { 
			if($(this).parents('form:first').find('select.wpsc_select_variation[value=0]:first').length)
				return false;
    		var cartCount = $('.shop-cart .shop-cart-itemnum').text();
    		var cartInt = parseInt(cartCount);
    		var quantity = parseInt($('.cartcount').val());
    		if (quantity > 1)
    			cartInt += quantity;
    		else
    			cartInt++;
 			$('.shop-cart .shop-cart-itemnum').text(cartInt);
    	});
    	$('a.emptycart').click(function(){
    		$('.shop-cart .shop-cart-itemnum').text("0");
    	});

	$('.shop-cart').hover(function(e) {
			$(this).find('.shop-cart-contents').hoverFlow(e.type, { height: "show" }, 150, "easeInOutCubic");
			}, function(e) {
			$(this).find('.shop-cart-contents').hoverFlow(e.type, { height: "hide" }, 250, "easeInBack");
	});
	
	
	$('.wpcart_gallery a').each(function() {
	$('.wpcart_gallery a.thickbox').unbind('click');	
	$(this).removeClass('thickbox').addClass('galleryimg');
	var rel = $(this).attr("rel");
	$(this).attr('rel', 'fancybox['+rel+']');
	$(this).attr('title', rel);
	$(this).removeAttr('rev');
	
	});	
	
	
/* :: 	Add target blank										      
--------------------------------------------- */

$('.target_blank a').each(function() {
       $(this).click(function(event) {
           event.preventDefault();
           event.stopPropagation();
           window.open(this.href, '_blank');
       });
});


/* :: 	Back to top Animation									      
--------------------------------------------- */

$('.hozbreak-top a,.autototop a').click(function(){
     $('html, body').animate({scrollTop: '0px'}, 400,"easeInOutCubic");
     return false;
});

$(function () { // run this code on page load (AKA DOM load)
 
	/* set variables locally for increased performance */
	var scroll_timer;
	var displayed = false;
	var $message = $('div.autototop a');
	var $window = $(window);
	var top = $(document.body).children(0).position().top;
 
	/* react to scroll event on window */
	$window.scroll(function () {
		window.clearTimeout(scroll_timer);
		scroll_timer = window.setTimeout(function () { // use a timer for performance
			if($window.scrollTop() <= top) // hide if at the top of the page
			{
				displayed = false;
				$message.fadeOut(500);
			}
			else if(displayed == false) // show if scrolling down
			{
				displayed = true;
				$message.stop(true, true).show().click(function () { $message.fadeOut(500); });
			}
		}, 100,"easeInOutCubic");
	});
});



/* :: 	Drop Panel												      
--------------------------------------------- */
	
	// Expand Panel
	$("#open").click(function(){
		$("div#panel").animate({height: "show"}, 900, "easeInOutCubic");
		$("div#panel").addClass('open');
	});	
	
	$(".contacttrigger").click(function(){
		$("div#panel").animate({height: "show"}, 900, "easeInOutCubic");
		$("div#panel").addClass('open');
		$("#toggle a.toggle").toggle();
	
	});	

	$(".droppaneltrigger").click(function(){
		
		if($("div#panel").hasClass('open')) {
			
			$("div#panel").removeClass('open');
			$("#toggle a.toggle").toggle();
			
			$('html, body').animate({scrollTop: '0px'}, 800,"easeInOutCubic",function() {
				$("div#panel").animate({height: "hide"}, 900, "easeInBack");	
			});
			return false;
			
			
		} else {

			$("#toggle a.toggle").toggle();
			$("div#panel").addClass('open');

			$('html, body').animate({scrollTop: '0px'}, 800,"easeInOutCubic",function() {
				$("div#panel").animate({height: "show"}, 900, "easeInOutCubic");
			});
			return false;

		}
	});	
	
	// Collapse Panel
	$("#close").click(function(){
		$("div#panel").animate({height: "hide"}, 900, "easeInBack");	
		$("div#panel").removeClass('open');
	});		
	
	// Switch buttons on click
	$("#toggle a.toggle").click(function () {
		$("#toggle a.toggle").toggle();
	});		



/* :: 	Header Infobar											      
--------------------------------------------- */

	$("span.infobar-close a").click(function () {
		$("div.header-infobar").animate({height:0,opacity:0});
	});		


/* :: 	Social Icons Animate									      
--------------------------------------------- */
	
	// Show Social Icons
	$(".socialinit").click(function(){
		$("div.socialicons").not('div.socialicons.display').animate({width: 'show'});
	
	});	
	
	// Hide Social Icons
	$(".socialhide").click(function(){
		$("div.socialicons").not('div.socialicons.display').animate({width: 'hide'});
	
	});		

	// Switch buttons on click
	$("#togglesocial li").click(function () {
		$("#togglesocial li").toggle();
	});	

	$('.socialicons ul li div.social-icon,.socialinit .socialinithide,.socialhide .socialinithide, .textresize li').hover(function () {
		$(this).animate({opacity:0.6,marginTop:2},100,'easeOutQuad');
	});

	$('.socialicons ul li div.social-icon,.socialinit .socialinithide,.socialhide .socialinithide, .textresize li').mouseout(function () {
		$(this).animate({opacity:1,marginTop:0},170,'easeOutQuad');
	});	
	

	$('#searchsubmit,#panelsearchsubmit').hover(function () {
		$(this).animate({opacity:0.6},100,'easeOutQuad');
	});

	$('#searchsubmit,#panelsearchsubmit').mouseout(function () {
		$(this).animate({opacity:1},170,'easeOutQuad');
	});		


/* :: 	Gallery Image Hover 									      
--------------------------------------------- */

	
$('.galleryimg,.shortcodeimg,.shortcodevid,.galleryvid').hover(
		
		// Mouseover, fadeIn the hidden hover class	
		function() {
		$(this).children('div.hoverimg,div.hovervid').css('display', 'block'); // FIX IE BUG	
		$(this).children('div.hoverimg,div.hovervid').fadeTo("slow",1);
				
		}, 
	
		//Mouseout, fadeOut the hover class
		function() {
		$(this).children('div.hoverimg,div.hovervid').fadeTo("fast",0, function() {
			$(this).css('display', 'none'); // FIX IE BUG	
		});
		
		
	});



/* :: 	Contact Form										      	  
--------------------------------------------- */

	$('form#contactForm').submit(function() {
		$('form#contactForm .error').remove();
		var hasError = false;
		$('.requiredField').each(function() {
			if($.trim($(this).val()) == '') {
				var labelText = $(this).prev('label').text();
				$(this).parent().append('<span class="error">You forgot to enter your '+labelText+'.</span>');
				hasError = true;
			} else if($(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test($.trim($(this).val()))) {
					var labelText = $(this).prev('label').text();
					$(this).parent().append('<span class="error">You entered an invalid '+labelText+'.</span>');
					hasError = true;
				}
			}
		});
		if(!hasError) {
			var formInput = $(this).serialize();
			$.post($(this).attr('action'),formInput, function(data){
				$('form#contactForm').slideUp("fast", function() {				   
					$(this).before('<p class="thanks"><strong>Thanks!</strong> Your email was successfully sent. I check my email all the time, so I should be in touch soon.</p>');
				});
			});
		}
		
		return false;
		
	});



/* :: 	Tabs												      	  
--------------------------------------------- */

	$(".nv-tabs").tabs({ fx: { opacity:'toggle', duration:200 }  });	


/* :: 	Reveal Content 										      	  
--------------------------------------------- */
	
	$(".reveal-content").hide();
	
	// Toggle classes for reveal
	$("h4.reveal").toggle(function(){
		$(this).addClass("ui-state-active");}, function() {
		$(this).removeClass("ui-state-active ");
	});

	
	// Reveal content
	$("h4.reveal").click(function(){
	$(this).next(".reveal-content").animate({"height": "toggle"}, { duration: 300, easing: "easeInOutCubic" });
	});
	

	
/* :: 	Gallery Overlay												  
--------------------------------------------- */
	$('.gridimg-wrap').hover(function(e) {
			$(this).find('.title').hoverFlow(e.type, { height: "show" }, 400, "easeInOutCubic");
			}, function(e) {
			$(this).find('.title').hoverFlow(e.type, { height: "hide" }, 400, "easeInBack");
	});


	
/* :: 	iSlider Nav 												  
--------------------------------------------- */

	$('.stage-slider-wrap.islider,.post-gallery-wrap, .group-slider.shortcode, .gallery-wrap.vertical').hover(function() {
		$(this).find('.islider-nav-wrap .nvcolor-wrap, .slidernav-left,.slidernav-right').fadeTo(500,1);	
	}, function() {
		$(this).find('.islider-nav-wrap .nvcolor-wrap, .slidernav-left,.slidernav-right').fadeTo(200,0);	
	});



/* :: 	Preload Images											      
--------------------------------------------- */


if(!$.browser.msie) {
	$('.container .gridimg-wrap, .custom-layer .fullimage').not('.container.videotype .gridimg-wrap').addClass('preload');
}


$.fn.preloadImages = function(options,f) {

	var defaults = {
	showSpeed: 800,
	easing: 'easeOutQuad'
	};

	var options = $.extend(defaults, options);

	return this.each(function(){
	var container = $(this);
	var image = container.find('img').not('.hovervid img,.hoverimg img');

	$(image).css({ "visibility": "hidden", "opacity": "0" });
	$(image).bind('load error', function(){
		$(this).css({ "visibility": "visible" }).animate({ opacity:"1" }, {duration:options.showSpeed, easing:options.easing}).closest(container).removeClass('preload');
		if($(image).hasClass('reflected')) {
			$(this).parent().css({ "visibility": "visible" }).animate({ opacity:"1" }, {duration:options.showSpeed, easing:options.easing}).closest(container).removeClass('preload');
		}
	}).each(function(){
			if(this.complete || ($.browser.msie && parseInt($.browser.version) == 6)) { $(this).trigger('load'); }
	});
	});
	
};


/* :: Reflection Canvas Reszier
--------------------------------------------- */

if($.browser.msie || $.browser.opera) {
	$(window).resize(function() {
		$('div.reflect canvas,span.reflect canvas').each(function() {
			var canvas_h=$(this).height();
			var gridwrap_h = $(this).closest('.gridimg-wrap').height();
			var new_canvas_h = (gridwrap_h-canvas_h);
			new_canvas_h=(new_canvas_h/100*12);
			$(this).css('height',new_canvas_h);
		});
	});
}

});

(function( $ ){
	
	$.fn.resize_canvas = function(get_elem_h) {
		
		var elem=$(this);
		
		$(elem).find('.reflect canvas').each(function() {
			var canvas_h=$(this).height();
		
			var gridwrap_h = $(this).closest(get_elem_h).height();
			var new_canvas_h = gridwrap_h-canvas_h;
			new_canvas_h=new_canvas_h/100*12;
			$(this).css('height',new_canvas_h);
		});
	}
	
})( jQuery );


/* :: iSlider Resizer 
--------------------------------------------- */

(function( $ ){
	
	$.fn.resize_islider = function(get_elem_h,animate) {
	
		var slide_height = $(this).find(get_elem_h).height();
		if(animate) {
			$(this).find('.islider-nav-ul').animate({height: slide_height},750);
		} else {
			$(this).find('.islider-nav-ul').css('height', slide_height);
		}
		
		$(this).find('.islider-nav-ul img').css({
			'height': slide_height/3+1
		});
	
	};
		
})( jQuery );


/* :: Gallery Reszier
--------------------------------------------- */

(function( $ ){
	
	$.fn.resizegallery = function(height,action,priElement,secElement,iSlider,forceHeight) {
			
		var currentheight='';
			
		if(!height) { 
			$(this).find(priElement).each( function(e) {
				if($(this).css('display') == 'block') {
					currentheight=$(this).height();
					if(!currentheight && forceHeight) {		
						currentheight = forceHeight;	
					}
				}
			});
		} else { 
			currentheight=height;
		}
		
		if(action=='animate') {	
		
		if(iSlider) {var speed = 250;} else {var speed = 750;}
		
			$(this).find(secElement).animate({
				height: currentheight
			}, speed, function() {
				// Animation complete.
			});		
		} else {
			$(this).find(secElement).css({
				height: currentheight
			});				
		}
			
	};
		
})( jQuery );

	
/* :: 	Stage Text								      
--------------------------------------------- */

(function( $ ){
	
	$.fn.stage_overlay = function(state) {
	
		if(state=='before') {
			$(this).find('div.stagetextwrap.left').css({left:'-200%',opacity:0});
			$(this).find('div.stagetextwrap.right').css({right:'-200%',opacity:0});
		} else if(state=='after') {
			var imgheight = $(this).find('.gridimg-wrap img:first').height();
			$(this).find('div.stagetextwrap').css({height:imgheight});
			$(this).find('div.stagetextwrap.left').animate({left:0,opacity:1,height:imgheight},500,'easeOutBack');
			$(this).find('div.stagetextwrap.right').animate({right:0,opacity:1,height:imgheight},500,'easeOutBack');
		}
		
	}

})( jQuery );


/* :: 	Gallery Image Shadow 									      
--------------------------------------------- */

function nv_posshadow(templateurl,element) {
jQuery(document).ready(function($){

if(!element) { element='.shadowreflection .gridimg-wrap,.shadow .gridimg-wrap, div.stage-slider-wrap.islider.shadowreflection, div.stage-slider-wrap.islider.shadow,div.stage-slider-wrap.nivo.shadowreflection .slider-inner-wrap, div.stage-slider-wrap.nivo.shadow .slider-inner-wrap, div.accordion-gallery-wrap.shadow,div.accordion-gallery-wrap.shadowreflection, div.post-gallery-wrap.islider.shadow, div.post-gallery-wrap.islider.shadowreflection,div.post-gallery-wrap.nivo.shadow, div.post-gallery-wrap.nivo.shadowreflection, #item-header-avatar span.avatar';
}


$(element).not('.nivo .gridimg-wrap,.islider .gridimg-wrap, .gridimg-wrap.none').each(function(index) {

	$(this).append('<div class="shadow-wrap"><img src="'+templateurl+'/images/shadow-a.png" /></div>');
	
});
	
});

}



/* :: 	Accordion Gallery Based on Kwicks - http://www.jeremymartin.name/projects.php?project=kwicks
--------------------------------------------- */

(function ($) {
	$.fn.kwicks = function (options) {
		var defaults = {
			isVertical: false,
			sticky: false,
			defaultKwick: 0,
			autorotation: true,
			autorotationSpeed: 3,
			gallerywidth: 500,
			event: 'mouseover',
			spacing: 0,
			duration: 600
		}, o, WoH, LoT, container, kwicks, slide_count, current_slide, slide_width, slide_height, acc_interval, normWoH, container_width, accordion_id, preCalcLoTs;

		o = $.extend(defaults, options);
		WoH = (o.isVertical ? 'height' : 'width'); // WoH = Width or Height
		LoT = (o.isVertical ? 'top' : 'left'); // LoT = Left or Top
		
	
		return this.each(function () {		   
			container = $(this);
			kwicks = container.children('li');
			slide_count 	= kwicks.length;
			current_slide = 0;
			slide_width = container.width() / slide_count; 	// width of the slides
			slide_height = container.height();
			acc_interval = '';
			normWoH = slide_width;
			container_width=options.gallerywidth;
			accordion_id=options.id;
			
			
			
			kwicks.css({ width : slide_width, height: slide_height });
					
			o.max = container.width() - slide_width;
			
			kwicks.find('.excerpt,.title').css({width : o.max });
			kwicks.find('.title').slideDown();
			
			if (!o.max) {
				o.max = (normWoH * kwicks.size()) - (o.min * (kwicks.size() - 1));
			} else {
				o.min = ((normWoH * kwicks.size()) - o.max) / (kwicks.size() - 1);
			}
			// set width of container ul
			if (o.isVertical) {
				container.css({
					width : kwicks.eq(0).css('width'),
					height : (normWoH * kwicks.size()) + (o.spacing * (kwicks.size() - 1)) + 'px'
				});				
			} 

			// pre calculate left or top values for all kwicks but the first and last
			// i = index of currently hovered kwick, j = index of kwick we're calculating
			preCalcLoTs = []; // preCalcLoTs = pre-calculated Left or Top's
			for(i = 0; i < kwicks.size(); i++) {
				preCalcLoTs[i] = [];
				// don't need to calculate values for first or last kwick
				for(j = 1; j < kwicks.size() - 1; j++) {
					if (i == j) {
						preCalcLoTs[i][j] = o.isVertical ? j * o.min + (j * o.spacing) : j * o.min + (j * o.spacing);
					} else {
						preCalcLoTs[i][j] = (j <= i ? (j * o.min) : (j-1) * o.min + o.max) + (j * o.spacing);
					}
				}
			}
			
			// loop through all kwick elements
			kwicks.each(function (i) {
				var kwick = $(this);
				
				// set initial width or height and left or top values
				// set first kwick
				
				if (i === 0) {
					kwick.css(LoT, '0px');
				} else if (i == kwicks.size() - 1) {
					kwick.css(o.isVertical ? 'bottom' : 'right', '0px');
				} else {
					if (o.sticky) {
						kwick.css(LoT, preCalcLoTs[o.defaultKwick][i]);
					} else {
						kwick.css(LoT, (i * normWoH) + (i * o.spacing));
					}
				}
				// correct size in sticky mode
				if (o.sticky) {
					if (o.defaultKwick == i) {
						kwick.css(WoH, o.max + 'px');
						kwick.addClass('active');
					} else {
						kwick.css(WoH, o.min + 'px');
					}
				}
				kwick.css({
					margin: 0,
					position: 'absolute'
				});
				
				kwick.bind("mouseleave", function () {
				kwick.find('.excerpt').slideUp();	

				});
				

				
				kwick.bind(o.event, function () {
			
					// calculate previous width or heights and left or top values
					var prevWoHs = []; // prevWoHs = previous Widths or Heights
					var prevLoTs = []; // prevLoTs = previous Left or Tops
					kwicks.stop().removeClass('active');
					for(j = 0; j < kwicks.size(); j++) {
						prevWoHs[j] = kwicks.eq(j).css(WoH).replace(/px/, '');
						prevLoTs[j] = kwicks.eq(j).css(LoT).replace(/px/, '');
					}
					var aniObj = {};
					aniObj[WoH] = o.max;
					var maxDif = o.max - prevWoHs[i];
					var prevWoHsMaxDifRatio = prevWoHs[i]/maxDif;
					
					kwick.find('.shadow').animate({right: -30},300);
					
					kwick.addClass('active').animate(aniObj, {
						step: function (now) {
							
							// calculate animation completeness as percentage
							var percentage = maxDif != 0 ? now/maxDif - prevWoHsMaxDifRatio : 1;
							// adjsut other elements based on percentage
							kwicks.each(function (j) {
								if (j != i) {
									kwicks.eq(j).css(WoH, prevWoHs[j] - ((prevWoHs[j] - o.min) * percentage) + 'px');
								}
								if (j > 0 && j < kwicks.size() - 1) { // if not the first or last kwick
									kwicks.eq(j).css(LoT, prevLoTs[j] - ((prevLoTs[j] - preCalcLoTs[i][j]) * percentage) + 'px');
								}
							});						
						},
						duration: o.duration,
						easing: o.easing
						
					});
					kwick.find('.title').slideUp();
					kwick.find('.excerpt').slideDown();

					var autostartvid = jQuery(this).find('.jwplayer.accplay').attr("id");
					
					jQuery('#'+accordion_id).find('.jwplayer.accplay.playing').each(function (index) {	
							str='';
							str = jQuery(this).attr("id");
							if (str != autostartvid) {
								jwplayer(str).stop();
								jQuery('#'+str).removeClass('playing');
							}
					});
					
					if (autostartvid) {
						var autostart = jQuery('#'+autostartvid).hasClass('autostart');
						if (autostart) {
							
							jwplayer(autostartvid).onPlay(function () { jQuery('#'+autostartvid).addClass('playing'); });
							
							var isplaying = jQuery('#'+autostartvid).hasClass('playing');
							
							if (!isplaying) {
								jwplayer(autostartvid).stop().play();	
							}
							
						}
					}
					
				});
			
			});
			
			if (!o.sticky) {
				container.bind("mouseleave", function () {
					var prevWoHs = [];
					var prevLoTs = [];
					kwicks.find('.shadow').animate({right: '0'},100);
					kwicks.find('.title').slideDown();
					
						jQuery('#'+accordion_id).find('.jwplayer.accplay').each(function (index) {	
							str='';
							str = jQuery(this).attr("id");
							jwplayer(str).stop();
							jQuery(this).removeClass('playing');
						});
					
					kwicks.find('.excerpt').slideUp();
					kwicks.removeClass('active').stop();
					for(i = 0; i < kwicks.size(); i++) {
						prevWoHs[i] = kwicks.eq(i).css(WoH).replace(/px/, '');
						prevLoTs[i] = kwicks.eq(i).css(LoT).replace(/px/, '');
					}
					var aniObj = {};
					aniObj[WoH] = normWoH;
					var normDif = normWoH - prevWoHs[0];
					kwicks.eq(0).animate(aniObj, {
						step: function (now) {
							var percentage = normDif != 0 ? (now - prevWoHs[0])/normDif : 1;
							for(i = 1; i < kwicks.size(); i++) {
								kwicks.eq(i).css(WoH, prevWoHs[i] - ((prevWoHs[i] - normWoH) * percentage) + 'px');
								if (i < kwicks.size() - 1) {
									kwicks.eq(i).css(LoT, prevLoTs[i] - ((prevLoTs[i] - ((i * normWoH) + (i * o.spacing))) * percentage) + 'px');
								}
							}
						},
						duration: o.duration,
						easing: o.easing
					});
					
					if (options.autorotation) {
					acc_interval = setInterval(function () { autorotation(); }, (parseInt(options.autorotationSpeed) * 1000));
					}

				});
			}

			container.bind(options.event, function (event, continue_autorotate)
			{	
				//onevent stop auto rotation
				if (!continue_autorotate)
						{
							clearInterval(acc_interval);
										
							var activeslide = container.find('li').not('.active');
							activeslide.find('.shadow').animate({right: '0'},100);
							activeslide.find('.excerpt').slideUp();
							activeslide.find('.title').slideUp();
						}
		
			});
			

			if (options.autorotation) {
				acc_interval = setInterval(function () {
				autorotation();
												
				}, (parseInt(options.autorotationSpeed) * 1000));
	
				function autorotation()
				{	
				
					if (slide_count == current_slide)
					{						
						current_slide = 0;
					}
					else
					{
						kwicks.find('.shadow').animate({right: '0'},100);
						kwicks.find('.excerpt').slideUp();
						jQuery('#'+accordion_id).find('.jwplayer.accplay').each(function (index) {	
							str='';
							str = jQuery(this).attr("id");
							jwplayer(str).stop();
							jQuery(this).removeClass('playing');
						});
						
						kwicks.find('.title').slideUp();
						kwicks.filter(':eq('+current_slide+')').trigger(options.event,[true]);
						current_slide ++;					
					}
					
				}
			}

		});
	
	
	};
	
})(jQuery);


/* :: 	Filtering Posts 											  
--------------------------------------------- */

// JavaScript Document
/*
 * jQuery Nivo Slider v2.6
 * http://nivo.dev7studios.com
 *
 * Copyright 2011, Gilbert Pellegrom
 * Free to use and abuse under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * March 2010
 */

(function ($) {

    var NivoSlider = function(element, options) {
		//Defaults are below
		var settings = $.extend({}, $.fn.nivoSlider.defaults, options);

        //Useful variables. Play carefully.
        var vars = {
            currentSlide: 0,
            currentImage: '',
            totalSlides: 0,
            randAnim: '',
            running: false,
            paused: false,
            stop: false
        };
    	
        //Get this slider
        var slider = $(element);
        slider.data('nivo:vars', vars);
        slider.css('position','relative');
        slider.addClass('nivoSlider');
		var sliderid = settings.sliderid;
        
        //Find our slider children
        var kids = slider.children();
        kids.each(function() {
            var child = $(this);
            var link = '';
            if(!child.is('img')) {
                if(child.find('.gridimg-wrap a').not(".title a")) {
                    child.find('.gridimg-wrap a').not(".title a").addClass('nivo-imageLink');
                    link = child.find('a.nivo-imageLink');
                }
                child = child.find('img:first');
            }
            //Get img width & height
            var childWidth = child.width();
            if(childWidth === 0) {childWidth = child.attr('width');}
            var childHeight = child.height();
            if(childHeight === 0) {childHeight = child.attr('height');}
            //Resize the slider
            if(childWidth > slider.width()) {
                slider.width(childWidth);
            }
            if(childHeight > slider.height()) {
                slider.height(childHeight);
            }
            if(link !== '') {
                link.css('display','none');
            }
            child.css('display','none');
            vars.totalSlides++;
        });
        
        //Set startSlide
        if(settings.startSlide > 0) {
            if(settings.startSlide >= vars.totalSlides) { settings.startSlide = vars.totalSlides - 1; }
            vars.currentSlide = settings.startSlide;
        }
        
        //Get initial image
        if($(kids[vars.currentSlide]).is('img')) {
            vars.currentImage = $(kids[vars.currentSlide]);
        } else {
            vars.currentImage = $(kids[vars.currentSlide]).find('img:first');
        }
        
        //Show initial link
        if($(kids[vars.currentSlide]).find('a.nivo-imageLink')) {
            $(kids[vars.currentSlide]).find('a.nivo-imageLink').css('display','block');
        }
        
        //Set first background
        slider.css('background','url("'+ vars.currentImage.attr('src') +'") no-repeat');

        //Create caption
        slider.append($('<div class="nivo-caption"><p></p></div>').css({ display:'none', opacity:settings.captionOpacity }));			
		
		// Process caption function
		var processCaption = function(settings) {
			var nivoCaption = $('.nivo-caption', slider);
			if(vars.currentImage.attr('title') !== '' && vars.currentImage.attr('title') !== undefined) {
				var title = vars.currentImage.attr('title');
				
				var style = $(title).attr('style');
				
				if(title.substr(0,1) === '#') { title = $(title).html();}
				nivoCaption.attr('style',style);
				
				if(nivoCaption.css('display') === 'block') {
					nivoCaption.find('p').fadeOut(settings.animSpeed, function() {
						$(this).html(title);
						$(this).fadeIn(settings.animSpeed);
					});
				} else {
					nivoCaption.find('p').html(title);
				}					
				nivoCaption.fadeIn(settings.animSpeed);
			} else {
				nivoCaption.fadeOut(settings.animSpeed);
			}
		};
		
        //Process initial  caption
        processCaption(settings);
        
        //In the words of Super Mario "let's a go!"
        var timer = 0;
        if(!settings.manualAdvance && kids.length > 1) {
            timer = setInterval(function() { nivoRun(slider, kids, settings, false); }, settings.pauseTime);
        }

        //Add Direction nav
        if(settings.directionNav) {
            slider.append('<div class="nivo-directionNav"><a class="nivo-prevNav">'+ settings.prevText +'</a><a class="nivo-nextNav">'+ settings.nextText +'</a></div>');
            
            //Hide Direction nav
            if(settings.directionNavHide) {
                $('.nivo-directionNav', slider).hide();
                slider.hover(function() {
                    $('.nivo-directionNav', slider).show();
                }, function() {
                    $('.nivo-directionNav', slider).hide();
                });
            }
            
            $('a.nivo-prevNav.id'+sliderid).live('click', function() {
                if(vars.running) {return false;}
                clearInterval(timer);
                timer = '';
                vars.currentSlide -= 2;
                nivoRun(slider, kids, settings, 'prev');
            });
            
            $('a.nivo-nextNav.id'+sliderid).live('click', function() {
                if(vars.running) { return false; }
                clearInterval(timer);
                timer = '';
                nivoRun(slider, kids, settings, 'next');
            });
        }
        
        //Add Control nav
        if(settings.controlNav) {
            var nivoControl = $('<div class="nivo-controlNav id'+sliderid+'"></div>');
            slider.parent().parent().find('.control-wrap').append(nivoControl);
            for(var i = 0; i < kids.length; i++) {
                if(settings.controlNavThumbs) {
                    var child = kids.eq(i);
                    if(!child.is('img')) {
                        child = child.find('img:first');
                    }
                    if (settings.controlNavThumbsFromRel) {
                        nivoControl.append('<a class="nivo-control" rel="'+ i +'"><img src="'+ child.attr('rel') + '" alt="" /></a>');
                    } else {
                        nivoControl.append('<a class="nivo-control" rel="'+ i +'"><img src="'+ child.attr('src').replace(settings.controlNavThumbsSearch, settings.controlNavThumbsReplace) +'" alt="" /></a>');
                    }
                } else {
                    nivoControl.append('<a class="nivo-control" rel="'+ i +'">'+ (i + 1) +'</a>');
                }
                
            }
            //Set initial active link
            $('.nivo-controlNav.id'+sliderid+' a:eq('+ vars.currentSlide +')').addClass('active');
            
            $('.nivo-controlNav.id'+sliderid+' a').live('click', function() {
                if(vars.running) {return false;}
                if($(this).hasClass('active')) { return false;}
                clearInterval(timer);
                timer = '';
                slider.css('background','url("'+ vars.currentImage.attr('src') +'") no-repeat');
                vars.currentSlide = $(this).attr('rel') - 1;
                nivoRun(slider, kids, settings, 'control');
            });
        }
        
        //Keyboard Navigation
        if(settings.keyboardNav) {
            $(window).keypress(function(event) {
                //Left
                if(event.keyCode === '37') {
                    if(vars.running) {return false;}
                    clearInterval(timer);
                    timer = '';
                    vars.currentSlide-=2;
                    nivoRun(slider, kids, settings, 'prev');
                }
                //Right
                if(event.keyCode === '39') {
                    if(vars.running) {return false;}
                    clearInterval(timer);
                    timer = '';
                    nivoRun(slider, kids, settings, 'next');
                }
            });
        }
        
        //For pauseOnHover setting
        if(settings.pauseOnHover) {
            slider.hover(function() {
                vars.paused = true;
                clearInterval(timer);
                timer = '';
            }, function() {
                vars.paused = false;
                //Restart the timer
                if(timer === '' && !settings.manualAdvance) {
                    timer = setInterval(function() { nivoRun(slider, kids, settings, false); }, settings.pauseTime);
                }
            });
        }
        
        //Event when Animation finishes
        slider.bind('nivo:animFinished', function() { 
            vars.running = false; 
            //Hide child links
            $(kids).each(function() {
                if($(this).find('a.nivo-imageLink')) {
                    $(this).find('a.nivo-imageLink').css('display','none');
                }
            });
            //Show current link
            if($(kids[vars.currentSlide]).find('a.nivo-imageLink')) {
                $(kids[vars.currentSlide]).find('a.nivo-imageLink').css('display','block');
            }
            //Restart the timer
            if(timer === '' && !vars.paused && !settings.manualAdvance) {
                timer = setInterval(function() { nivoRun(slider, kids, settings, false); }, settings.pauseTime);
            }
            //Trigger the afterChange callback
            settings.afterChange.call(this);
        });
        
        // Add slices for slice animations
        var createSlices = function(slider, settings, vars) {
            for(var i = 0; i < settings.slices; i++) {
				var sliceWidth = Math.round(slider.width()/settings.slices);
				if(i === settings.slices-1) {
					slider.append(
						$('<div class="nivo-slice"></div>').css({ 
							left:(sliceWidth*i)+'px', width:(slider.width()-(sliceWidth*i))+'px',
							height:'0px', 
							opacity:'0', 
							background: 'url("'+ vars.currentImage.attr('src') +'") no-repeat -'+ ((sliceWidth + (i * sliceWidth)) - sliceWidth) +'px 0%'
						})
					);
				} else {
					slider.append(
						$('<div class="nivo-slice"></div>').css({ 
							left:(sliceWidth*i)+'px', width:sliceWidth+'px',
							height:'0px', 
							opacity:'0', 
							background: 'url("'+ vars.currentImage.attr('src') +'") no-repeat -'+ ((sliceWidth + (i * sliceWidth)) - sliceWidth) +'px 0%'
						})
					);
				}
			}
        };
		
		// Add boxes for box animations
		var createBoxes = function(slider, settings, vars) {
			var boxWidth = Math.round(slider.width()/settings.boxCols);
			var boxHeight = Math.round(slider.height()/settings.boxRows);
			
			for(var rows = 0; rows < settings.boxRows; rows++) {
				for(var cols = 0; cols < settings.boxCols; cols++) {
					if(cols === settings.boxCols-1) {
						slider.append(
							$('<div class="nivo-box"></div>').css({ 
								opacity:0,
								left:(boxWidth*cols)+'px', 
								top:(boxHeight*rows)+'px',
								width:(slider.width()-(boxWidth*cols))+'px',
								height:boxHeight+'px',
								background: 'url("'+ vars.currentImage.attr('src') +'") no-repeat -'+ ((boxWidth + (cols * boxWidth)) - boxWidth) +'px -'+ ((boxHeight + (rows * boxHeight)) - boxHeight) +'px'
							})
						);
					} else {
						slider.append(
							$('<div class="nivo-box"></div>').css({ 
								opacity:0,
								left:(boxWidth*cols)+'px', 
								top:(boxHeight*rows)+'px',
								width:boxWidth+'px',
								height:boxHeight+'px',
								background: 'url("'+ vars.currentImage.attr('src') +'") no-repeat -'+ ((boxWidth + (cols * boxWidth)) - boxWidth) +'px -'+ ((boxHeight + (rows * boxHeight)) - boxHeight) +'px'
							})
						);
					}
				}
			}
		};

        // Private run method
		var nivoRun = function(slider, kids, settings, nudge) {
			//Get our vars
			var vars = slider.data('nivo:vars');
            
            //Trigger the lastSlide callback
            if(vars && (vars.currentSlide === vars.totalSlides - 1)) { 
				settings.lastSlide.call(this);
			}
            
            // Stop
			if((!vars || vars.stop) && !nudge) {return false;}
			
			//Trigger the beforeChange callback
			settings.beforeChange.call(this);
					
			//Set current background before change
			if(!nudge) {
				slider.css('background','url("'+ vars.currentImage.attr('src') +'") no-repeat');
			} else {
				if(nudge === 'prev') {
					slider.css('background','url("'+ vars.currentImage.attr('src') +'") no-repeat');
				}
				if(nudge === 'next') {
					slider.css('background','url("'+ vars.currentImage.attr('src') +'") no-repeat');
				}
			}
			vars.currentSlide++;
            //Trigger the slideshowEnd callback
			if(vars.currentSlide === vars.totalSlides) { 
				vars.currentSlide = 0;
				settings.slideshowEnd.call(this);
			}
			if(vars.currentSlide < 0) {vars.currentSlide = (vars.totalSlides - 1);}
			//Set vars.currentImage
			if($(kids[vars.currentSlide]).is('img')) {
				vars.currentImage = $(kids[vars.currentSlide]);
			} else {
				vars.currentImage = $(kids[vars.currentSlide]).find('img:first');
			}
			
			//Set active links
			if(settings.controlNav) {
				$('.nivo-controlNav.id'+sliderid+' a').removeClass('active');
				$('.nivo-controlNav.id'+sliderid+' a:eq('+ vars.currentSlide +')').addClass('active');
			}
			
			//Process caption
			processCaption(settings);
			
			// Remove any slices from last transition
			$('.nivo-slice', slider).remove();
			
			// Remove any boxes from last transition
			$('.nivo-box', slider).remove();
			
			if(settings.effect === 'random') {
				var anims = new Array('sliceDownRight','sliceDownLeft','sliceUpRight','sliceUpLeft','sliceUpDown','sliceUpDownLeft','fold','fade','boxRandom','boxRain','boxRainReverse','boxRainGrow','boxRainGrowReverse');
				vars.randAnim = anims[Math.floor(Math.random()*(anims.length + 1))];
				if(vars.randAnim === undefined) {vars.randAnim = 'fade';}
			}
            
            //Run random effect from specified set (eg: effect:'fold,fade')
            if(settings.effect.indexOf(',') !== -1) {
                var anims = settings.effect.split(',');
                vars.randAnim = anims[Math.floor(Math.random()*(anims.length))];
				if(vars.randAnim === undefined) {vars.randAnim = 'fade';}
            }
		
			//Run effects
			vars.running = true;
			if(settings.effect === 'sliceDown' || settings.effect === 'sliceDownRight' || vars.randAnim === 'sliceDownRight' || settings.effect === 'sliceDownLeft' || vars.randAnim === 'sliceDownLeft') {
				createSlices(slider, settings, vars);
				var timeBuff = 0;
				var i = 0;
				var slices = $('.nivo-slice', slider);
				if(settings.effect === 'sliceDownLeft' || vars.randAnim === 'sliceDownLeft') { slices = $('.nivo-slice', slider)._reverse();}
				
				slices.each(function() {
					var slice = $(this);
					slice.css({ 'top': '0px' });
					if(i === settings.slices-1) {
						setTimeout(function() {
							slice.animate({ height:'100%', opacity:'1.0' }, settings.animSpeed, '', function() { slider.trigger('nivo:animFinished'); });
						}, (100 + timeBuff));
					} else {
						setTimeout(function() {
							slice.animate({ height:'100%', opacity:'1.0' }, settings.animSpeed);
						}, (100 + timeBuff));
					}
					timeBuff += 50;
					i++;
				});
			} 
			else if(settings.effect === 'sliceUp' || settings.effect === 'sliceUpRight' || vars.randAnim === 'sliceUpRight' ||	settings.effect === 'sliceUpLeft' || vars.randAnim === 'sliceUpLeft') {
				createSlices(slider, settings, vars);
				var timeBuff = 0;
				var i = 0;
				var slices = $('.nivo-slice', slider);
				if(settings.effect === 'sliceUpLeft' || vars.randAnim === 'sliceUpLeft') { slices = $('.nivo-slice', slider)._reverse();}
				
				slices.each(function() {
					var slice = $(this);
					slice.css({ 'bottom': '0px' });
					if(i === settings.slices-1) {
						setTimeout(function() {
							slice.animate({ height:'100%', opacity:'1.0' }, settings.animSpeed, '', function() { slider.trigger('nivo:animFinished'); });
						}, (100 + timeBuff));
					} else {
						setTimeout(function() {
							slice.animate({ height:'100%', opacity:'1.0' }, settings.animSpeed);
						}, (100 + timeBuff));
					}
					timeBuff += 50;
					i++;
				});
			} 
			else if(settings.effect === 'sliceUpDown' || settings.effect === 'sliceUpDownRight' || vars.randAnim === 'sliceUpDown' || 	settings.effect === 'sliceUpDownLeft' || vars.randAnim === 'sliceUpDownLeft') {
				createSlices(slider, settings, vars);
				var timeBuff = 0;
				var i = 0;
				var v = 0;
				var slices = $('.nivo-slice', slider);
				if(settings.effect === 'sliceUpDownLeft' || vars.randAnim === 'sliceUpDownLeft') {slices = $('.nivo-slice', slider)._reverse();}
				
				slices.each(function() {
					var slice = $(this);
					if(i === 0) {
						slice.css('top','0px');
						i++;
					} else {
						slice.css('bottom','0px');
						i = 0;
					}
					
					if(v === settings.slices-1) {
						setTimeout(function() {
							slice.animate({ height:'100%', opacity:'1.0' }, settings.animSpeed, '', function() { slider.trigger('nivo:animFinished'); });
						}, (100 + timeBuff));
					} else {
						setTimeout(function() {
							slice.animate({ height:'100%', opacity:'1.0' }, settings.animSpeed);
						}, (100 + timeBuff));
					}
					timeBuff += 50;
					v++;
				});
			} 
			else if(settings.effect === 'fold' || vars.randAnim === 'fold') {
				createSlices(slider, settings, vars);
				var timeBuff = 0;
				var i = 0;
				
				$('.nivo-slice', slider).each(function() {
					var slice = $(this);
					var origWidth = slice.width();
					slice.css({ top:'0px', height:'100%', width:'0px' });
					if(i === settings.slices-1) {
						setTimeout(function() {
							slice.animate({ width:origWidth, opacity:'1.0' }, settings.animSpeed, '', function() { slider.trigger('nivo:animFinished'); });
						}, (100 + timeBuff));
					} else {
						setTimeout(function() {
							slice.animate({ width:origWidth, opacity:'1.0' }, settings.animSpeed);
						}, (100 + timeBuff));
					}
					timeBuff += 50;
					i++;
				});
			}  
			else if(settings.effect === 'fade' || vars.randAnim === 'fade') {
				createSlices(slider, settings, vars);
				
				var firstSlice = $('.nivo-slice:first', slider);
                firstSlice.css({
                    'height': '100%',
                    'width': slider.width() + 'px'
                });
    
				firstSlice.animate({ opacity:'1.0' }, (settings.animSpeed*2), '', function() { slider.trigger('nivo:animFinished'); });
			}          
            else if(settings.effect === 'slideInRight' || vars.randAnim === 'slideInRight') {
				createSlices(slider, settings, vars);
				
                var firstSlice = $('.nivo-slice:first', slider);
                firstSlice.css({
                    'height': '100%',
                    'width': '0px',
                    'opacity': '1'
                });

                firstSlice.animate({ width: slider.width() + 'px' }, (settings.animSpeed*2), '', function() { slider.trigger('nivo:animFinished'); });
            }
            else if(settings.effect === 'slideInLeft' || vars.randAnim === 'slideInLeft') {
				createSlices(slider, settings, vars);
				
                var firstSlice = $('.nivo-slice:first', slider);
                firstSlice.css({
                    'height': '100%',
                    'width': '0px',
                    'opacity': '1',
                    'left': '',
                    'right': '0px'
                });

                firstSlice.animate({ width: slider.width() + 'px' }, (settings.animSpeed*2), '', function() { 
                    // Reset positioning
                    firstSlice.css({
                        'left': '0px',
                        'right': ''
                    });
                    slider.trigger('nivo:animFinished'); 
                });
            }
			else if(settings.effect === 'boxRandom' || vars.randAnim === 'boxRandom') {
				createBoxes(slider, settings, vars);
				
				var totalBoxes = settings.boxCols * settings.boxRows;
				var i = 0;
				var timeBuff = 0;
				
				var boxes = shuffle($('.nivo-box', slider));
				boxes.each(function() {
					var box = $(this);
					if(i === totalBoxes-1) {
						setTimeout(function() {
							box.animate({ opacity:'1' }, settings.animSpeed, '', function() { slider.trigger('nivo:animFinished'); });
						}, (100 + timeBuff));
					} else {
						setTimeout(function() {
							box.animate({ opacity:'1' }, settings.animSpeed);
						}, (100 + timeBuff));
					}
					timeBuff += 20;
					i++;
				});
			}
			else if(settings.effect === 'boxRain' || vars.randAnim === 'boxRain' || settings.effect === 'boxRainReverse' || vars.randAnim === 'boxRainReverse' || settings.effect === 'boxRainGrow' || vars.randAnim === 'boxRainGrow' || settings.effect === 'boxRainGrowReverse' || vars.randAnim === 'boxRainGrowReverse') {
				createBoxes(slider, settings, vars);
				
				var totalBoxes = settings.boxCols * settings.boxRows;
				var i = 0;
				var timeBuff = 0;
				
				// Split boxes into 2D array
				var rowIndex = 0;
				var colIndex = 0;
				var box2Darr = new Array();
				box2Darr[rowIndex] = new Array();
				var boxes = $('.nivo-box', slider);
				if(settings.effect === 'boxRainReverse' || vars.randAnim === 'boxRainReverse' || settings.effect === 'boxRainGrowReverse' || vars.randAnim === 'boxRainGrowReverse') {
					boxes = $('.nivo-box', slider)._reverse();
				}
				boxes.each(function() {
					box2Darr[rowIndex][colIndex] = $(this);
					colIndex++;
					if(colIndex === settings.boxCols) {
						rowIndex++;
						colIndex = 0;
						box2Darr[rowIndex] = new Array();
					}
				});
				
				// Run animation
				for(var cols = 0; cols < (settings.boxCols * 2); cols++) {
					var prevCol = cols;
					for(var rows = 0; rows < settings.boxRows; rows++) {
						if(prevCol >= 0 && prevCol < settings.boxCols) {
							/* Due to some weird JS bug with loop vars 
							being used in setTimeout, this is wrapped
							with an anonymous function call */
							(function(row, col, time, i, totalBoxes) {
								var box = $(box2Darr[row][col]);
                                var w = box.width();
                                var h = box.height();
                                if(settings.effect === 'boxRainGrow' || vars.randAnim === 'boxRainGrow' || settings.effect === 'boxRainGrowReverse' || vars.randAnim === 'boxRainGrowReverse') {
                                    box.width(0).height(0);
                                }
								if(i === totalBoxes-1) {
									setTimeout(function() {
										box.animate({ opacity:'1', width:w, height:h }, settings.animSpeed/1.3, '', function() { slider.trigger('nivo:animFinished'); });
									}, (100 + time));
								} else {
									setTimeout(function() {
										box.animate({ opacity:'1', width:w, height:h }, settings.animSpeed/1.3);
									}, (100 + time));
								}
							})(rows, prevCol, timeBuff, i, totalBoxes);
							i++;
						}
						prevCol--;
					}
					timeBuff += 100;
				}
			}
		};
		
		// Shuffle an array
		var shuffle = function(arr) {
			for(var j, x, i = arr.length; i; j = parseInt(Math.random() * i), x = arr[--i], arr[i] = arr[j], arr[j] = x)
			return arr;
		};
        
        // For debugging
        var trace = function(msg) {
            if (this.console && typeof console.log !== "undefined") { console.log(msg);}
        };
        
        // Start / Stop
        this.stop = function() {
            if(!$(element).data('nivo:vars').stop) {
                $(element).data('nivo:vars').stop = true;
                trace('Stop Slider');
            }
        };
        
        this.start = function() {
            if($(element).data('nivo:vars').stop) {
                $(element).data('nivo:vars').stop = false;
                trace('Start Slider');
            }
        };
        
        //Trigger the afterLoad callback
        settings.afterLoad.call(this);
		
		return this;
    };
        
    $.fn.nivoSlider = function(options) {
    
        return this.each(function(key, value) {
            var element = $(this);
            // Return early if this element already has a plugin instance
            if (element.data('nivoslider')) { return element.data('nivoslider');}
            // Pass options to plugin constructor
            var nivoslider = new NivoSlider(this, options);
            // Store plugin object in this element's data
            element.data('nivoslider', nivoslider);
        });

	};
	
	//Default settings
	$.fn.nivoSlider.defaults = {
		effect: 'random',
		slices: 15,
		boxCols: 8,
		boxRows: 4,
		animSpeed: 500,
		pauseTime: 3000,
		startSlide: 0,
		directionNav: true,
		directionNavHide: true,
		controlNav: true,
		controlNavThumbs: false,
        controlNavThumbsFromRel: false,
		controlNavThumbsSearch: '.jpg',
		controlNavThumbsReplace: '_thumb.jpg',
		keyboardNav: true,
		pauseOnHover: true,
		manualAdvance: false,
		captionOpacity: 0.8,
		prevText: 'Prev',
		nextText: 'Next',
		beforeChange: function() {},
		afterChange: function() {},
		slideshowEnd: function() {},
        lastSlide: function() {},
        afterLoad: function() {}
	};
	
	$.fn._reverse = [].reverse;
	
})(jQuery);

/*

Quicksand 1.2.2

Reorder and filter items with a nice shuffling animation.

Copyright (c) 2010 Jacek Galanciak (razorjack.net) and agilope.com
Big thanks for Piotr Petrus (riddle.pl) for deep code review and wonderful docs & demos.

Dual licensed under the MIT and GPL version 2 licenses.
http://github.com/jquery/jquery/blob/master/MIT-LICENSE.txt
http://github.com/jquery/jquery/blob/master/GPL-LICENSE.txt

Project site: http://razorjack.net/quicksand
Github site: http://github.com/razorjack/quicksand

*/

(function ($) {
    $.fn.quicksand = function (collection, customOptions) {     
        var options = {
            duration: 750,
            easing: 'swing',
            attribute: 'data-id', // attribute to recognize same items within source and dest
            adjustHeight: 'auto', // 'dynamic' animates height during shuffling (slow), 'auto' adjusts it before or after the animation, false leaves height constant
            useScaling: true, // disable it if you're not using scaling effect or want to improve performance
            enhancement: function(c) {}, // Visual enhacement (eg. font replacement) function for cloned elements
            selector: '> *',
            dx: 0,
            dy: 0
        };
        $.extend(options, customOptions);
        
        if ($.browser.msie || (typeof($.fn.scale) == 'undefined')) {
            // Got IE and want scaling effect? Kiss my ass.
            options.useScaling = false;
        }
        
        var callbackFunction;
        if (typeof(arguments[1]) == 'function') {
            var callbackFunction = arguments[1];
        } else if (typeof(arguments[2] == 'function')) {
            var callbackFunction = arguments[2];
        }
    
        
        return this.each(function (i) {
            var val;
            var animationQueue = []; // used to store all the animation params before starting the animation; solves initial animation slowdowns
            var $collection = $(collection).clone(); // destination (target) collection
            var $sourceParent = $(this); // source, the visible container of source collection
            var sourceHeight = $(this).css('height'); // used to keep height and document flow during the animation
            
            var destHeight;
            var adjustHeightOnCallback = false;
            
            var offset = $($sourceParent).offset(); // offset of visible container, used in animation calculations
            var offsets = []; // coordinates of every source collection item            
            
            var $source = $(this).find(options.selector); // source collection items
            
            // Replace the collection and quit if IE6
            if ($.browser.msie && $.browser.version.substr(0,1)<7) {
                $sourceParent.html('').append($collection);
                return;
            }

            // Gets called when any animation is finished
            var postCallbackPerformed = 0; // prevents the function from being called more than one time
            var postCallback = function () {
                
                if (!postCallbackPerformed) {
                    postCallbackPerformed = 1;
                    
                    // hack: 
                    // used to be: $sourceParent.html($dest.html()); // put target HTML into visible source container
                    // but new webkit builds cause flickering when replacing the collections
                    $toDelete = $sourceParent.find('> *');
                    $sourceParent.prepend($dest.find('> *'));
                    $toDelete.remove();
                         
                    if (adjustHeightOnCallback) {
                        $sourceParent.css('height', destHeight);
                    }
                    options.enhancement($sourceParent); // Perform custom visual enhancements on a newly replaced collection
                    if (typeof callbackFunction == 'function') {
                        callbackFunction.call(this);
                    }                    
                }
            };
            
            // Position: relative situations
            var $correctionParent = $sourceParent.offsetParent();
            var correctionOffset = $correctionParent.offset();
            if ($correctionParent.css('position') == 'relative') {
                if ($correctionParent.get(0).nodeName.toLowerCase() == 'body') {

                } else {
                    correctionOffset.top += (parseFloat($correctionParent.css('border-top-width')) || 0);
                    correctionOffset.left +=( parseFloat($correctionParent.css('border-left-width')) || 0);
                }
            } else {
                correctionOffset.top -= (parseFloat($correctionParent.css('border-top-width')) || 0);
                correctionOffset.left -= (parseFloat($correctionParent.css('border-left-width')) || 0);
                correctionOffset.top -= (parseFloat($correctionParent.css('margin-top')) || 0);
                correctionOffset.left -= (parseFloat($correctionParent.css('margin-left')) || 0);
            }
            
            // perform custom corrections from options (use when Quicksand fails to detect proper correction)
            if (isNaN(correctionOffset.left)) {
                correctionOffset.left = 0;
            }
            if (isNaN(correctionOffset.top)) {
                correctionOffset.top = 0;
            }
            
            correctionOffset.left -= options.dx;
            correctionOffset.top -= options.dy;

            // keeps nodes after source container, holding their position
            $sourceParent.css('height', $(this).height());
            
            // get positions of source collections
            $source.each(function (i) {
                offsets[i] = $(this).offset();
            });
            
            // stops previous animations on source container
            $(this).stop();
            var dx = 0; var dy = 0;
            $source.each(function (i) {
                $(this).stop(); // stop animation of collection items
                var rawObj = $(this).get(0);
                if (rawObj.style.position == 'absolute') {
                    dx = -options.dx;
                    dy = -options.dy;
                } else {
                    dx = options.dx;
                    dy = options.dy;                    
                }

                rawObj.style.position = 'absolute';
                rawObj.style.margin = '0';

                rawObj.style.top = (offsets[i].top - parseFloat(rawObj.style.marginTop) - correctionOffset.top + dy) + 'px';
                rawObj.style.left = (offsets[i].left - parseFloat(rawObj.style.marginLeft) - correctionOffset.left + dx) + 'px';
            });
                    
            // create temporary container with destination collection
            var $dest = $($sourceParent).clone();
            var rawDest = $dest.get(0);
            rawDest.innerHTML = '';
            rawDest.setAttribute('id', '');
            rawDest.style.height = 'auto';
            rawDest.style.width = $sourceParent.width() + 'px';
            $dest.append($collection);      
            // insert node into HTML
            // Note that the node is under visible source container in the exactly same position
            // The browser render all the items without showing them (opacity: 0.0)
            // No offset calculations are needed, the browser just extracts position from underlayered destination items
            // and sets animation to destination positions.
            $dest.insertBefore($sourceParent);
            $dest.css('opacity', 0.0);
            rawDest.style.zIndex = -1;
            
            rawDest.style.margin = '0';
            rawDest.style.position = 'absolute';
            rawDest.style.top = offset.top - correctionOffset.top + 'px';
            rawDest.style.left = offset.left - correctionOffset.left + 'px';
            
            
    
            

            if (options.adjustHeight === 'dynamic') {
                // If destination container has different height than source container
                // the height can be animated, adjusting it to destination height
                $sourceParent.animate({height: $dest.height()}, options.duration, options.easing);
            } else if (options.adjustHeight === 'auto') {
                destHeight = $dest.height();
                if (parseFloat(sourceHeight) < parseFloat(destHeight)) {
                    // Adjust the height now so that the items don't move out of the container
                    $sourceParent.css('height', destHeight);
                } else {
                    //  Adjust later, on callback
                    adjustHeightOnCallback = true;
                }
            }
                
            // Now it's time to do shuffling animation
            // First of all, we need to identify same elements within source and destination collections    
            $source.each(function (i) {
                var destElement = [];
                if (typeof(options.attribute) == 'function') {
                    
                    val = options.attribute($(this));
                    $collection.each(function() {
                        if (options.attribute(this) == val) {
                            destElement = $(this);
                            return false;
                        }
                    });
                } else {
                    destElement = $collection.filter('[' + options.attribute + '=' + $(this).attr(options.attribute) + ']');
                }
                if (destElement.length) {
                    // The item is both in source and destination collections
                    // It it's under different position, let's move it
                    if (!options.useScaling) {
                        animationQueue.push(
                                            {
                                                element: $(this), 
                                                animation: 
                                                    {top: destElement.offset().top - correctionOffset.top, 
                                                     left: destElement.offset().left - correctionOffset.left, 
                                                     opacity: 1.0
                                                    }
                                            });

                    } else {
                        animationQueue.push({
                                            element: $(this), 
                                            animation: {top: destElement.offset().top - correctionOffset.top, 
                                                        left: destElement.offset().left - correctionOffset.left, 
                                                        opacity: 1.0, 
                                                        scale: '1.0'
                                                       }
                                            });

                    }
                } else {
                    // The item from source collection is not present in destination collections
                    // Let's remove it
                    if (!options.useScaling) {
                        animationQueue.push({element: $(this), 
                                             animation: {opacity: '0.0'}});
                    } else {
                        animationQueue.push({element: $(this), animation: {opacity: '0.0', 
                                         scale: '0.0'}});
                    }
                }
            });
            
            $collection.each(function (i) {
                // Grab all items from target collection not present in visible source collection
                
                var sourceElement = [];
                var destElement = [];
                if (typeof(options.attribute) == 'function') {
                    val = options.attribute($(this));
                    $source.each(function() {
                        if (options.attribute(this) == val) {
                            sourceElement = $(this);
                            return false;
                        }
                    });                 

                    $collection.each(function() {
                        if (options.attribute(this) == val) {
                            destElement = $(this);
                            return false;
                        }
                    });
                } else {
                    sourceElement = $source.filter('[' + options.attribute + '=' + $(this).attr(options.attribute) + ']');
                    destElement = $collection.filter('[' + options.attribute + '=' + $(this).attr(options.attribute) + ']');
                }
                
                var animationOptions;
                if (sourceElement.length === 0) {
                    // No such element in source collection...
                    if (!options.useScaling) {
                        animationOptions = {
                            opacity: '1.0'
                        };
                    } else {
                        animationOptions = {
                            opacity: '1.0',
                            scale: '1.0'
                        };
                    }
                    // Let's create it
                    d = destElement.clone();
                    var rawDestElement = d.get(0);
                    rawDestElement.style.position = 'absolute';
                    rawDestElement.style.margin = '0';
                    rawDestElement.style.top = destElement.offset().top - correctionOffset.top + 'px';
                    rawDestElement.style.left = destElement.offset().left - correctionOffset.left + 'px';
                    d.css('opacity', 0.0); // IE
                    if (options.useScaling) {
                        d.css('transform', 'scale(0.0)');
                    }
                    d.appendTo($sourceParent);
                    
                    animationQueue.push({element: $(d), 
                                         animation: animationOptions});
                }
            });
            
            $dest.remove();
            options.enhancement($sourceParent); // Perform custom visual enhancements during the animation
            for (i = 0; i < animationQueue.length; i++) {
                animationQueue[i].element.animate(animationQueue[i].animation, options.duration, options.easing, postCallback);
            }
        });
    };


})(jQuery);





/* :: Cufon Font
--------------------------------------------- */

var Cufon=(function(){var m=function(){return m.replace.apply(null,arguments)};var x=m.DOM={ready:(function(){var C=false,E={loaded:1,complete:1};var B=[],D=function(){if(C){return}C=true;for(var F;F=B.shift();F()){}};if(document.addEventListener){document.addEventListener("DOMContentLoaded",D,false);window.addEventListener("pageshow",D,false)}if(!window.opera&&document.readyState){(function(){E[document.readyState]?D():setTimeout(arguments.callee,10)})()}if(document.readyState&&document.createStyleSheet){(function(){try{document.body.doScroll("left");D()}catch(F){setTimeout(arguments.callee,1)}})()}q(window,"load",D);return function(F){if(!arguments.length){D()}else{C?F():B.push(F)}}})(),root:function(){return document.documentElement||document.body}};var n=m.CSS={Size:function(C,B){this.value=parseFloat(C);this.unit=String(C).match(/[a-z%]*$/)[0]||"px";this.convert=function(D){return D/B*this.value};this.convertFrom=function(D){return D/this.value*B};this.toString=function(){return this.value+this.unit}},addClass:function(C,B){var D=C.className;C.className=D+(D&&" ")+B;return C},color:j(function(C){var B={};B.color=C.replace(/^rgba\((.*?),\s*([\d.]+)\)/,function(E,D,F){B.opacity=parseFloat(F);return"rgb("+D+")"});return B}),fontStretch:j(function(B){if(typeof B=="number"){return B}if(/%$/.test(B)){return parseFloat(B)/100}return{"ultra-condensed":0.5,"extra-condensed":0.625,condensed:0.75,"semi-condensed":0.875,"semi-expanded":1.125,expanded:1.25,"extra-expanded":1.5,"ultra-expanded":2}[B]||1}),getStyle:function(C){var B=document.defaultView;if(B&&B.getComputedStyle){return new a(B.getComputedStyle(C,null))}if(C.currentStyle){return new a(C.currentStyle)}return new a(C.style)},gradient:j(function(F){var G={id:F,type:F.match(/^-([a-z]+)-gradient\(/)[1],stops:[]},C=F.substr(F.indexOf("(")).match(/([\d.]+=)?(#[a-f0-9]+|[a-z]+\(.*?\)|[a-z]+)/ig);for(var E=0,B=C.length,D;E<B;++E){D=C[E].split("=",2).reverse();G.stops.push([D[1]||E/(B-1),D[0]])}return G}),quotedList:j(function(E){var D=[],C=/\s*((["'])([\s\S]*?[^\\])\2|[^,]+)\s*/g,B;while(B=C.exec(E)){D.push(B[3]||B[1])}return D}),recognizesMedia:j(function(G){var E=document.createElement("style"),D,C,B;E.type="text/css";E.media=G;try{E.appendChild(document.createTextNode("/**/"))}catch(F){}C=g("head")[0];C.insertBefore(E,C.firstChild);D=(E.sheet||E.styleSheet);B=D&&!D.disabled;C.removeChild(E);return B}),removeClass:function(D,C){var B=RegExp("(?:^|\\s+)"+C+"(?=\\s|$)","g");D.className=D.className.replace(B,"");return D},supports:function(D,C){var B=document.createElement("span").style;if(B[D]===undefined){return false}B[D]=C;return B[D]===C},textAlign:function(E,D,B,C){if(D.get("textAlign")=="right"){if(B>0){E=" "+E}}else{if(B<C-1){E+=" "}}return E},textShadow:j(function(F){if(F=="none"){return null}var E=[],G={},B,C=0;var D=/(#[a-f0-9]+|[a-z]+\(.*?\)|[a-z]+)|(-?[\d.]+[a-z%]*)|,/ig;while(B=D.exec(F)){if(B[0]==","){E.push(G);G={};C=0}else{if(B[1]){G.color=B[1]}else{G[["offX","offY","blur"][C++]]=B[2]}}}E.push(G);return E}),textTransform:(function(){var B={uppercase:function(C){return C.toUpperCase()},lowercase:function(C){return C.toLowerCase()},capitalize:function(C){return C.replace(/\b./g,function(D){return D.toUpperCase()})}};return function(E,D){var C=B[D.get("textTransform")];return C?C(E):E}})(),whiteSpace:(function(){var D={inline:1,"inline-block":1,"run-in":1};var C=/^\s+/,B=/\s+$/;return function(H,F,G,E){if(E){if(E.nodeName.toLowerCase()=="br"){H=H.replace(C,"")}}if(D[F.get("display")]){return H}if(!G.previousSibling){H=H.replace(C,"")}if(!G.nextSibling){H=H.replace(B,"")}return H}})()};n.ready=(function(){var B=!n.recognizesMedia("all"),E=false;var D=[],H=function(){B=true;for(var K;K=D.shift();K()){}};var I=g("link"),J=g("style");function C(K){return K.disabled||G(K.sheet,K.media||"screen")}function G(M,P){if(!n.recognizesMedia(P||"all")){return true}if(!M||M.disabled){return false}try{var Q=M.cssRules,O;if(Q){search:for(var L=0,K=Q.length;O=Q[L],L<K;++L){switch(O.type){case 2:break;case 3:if(!G(O.styleSheet,O.media.mediaText)){return false}break;default:break search}}}}catch(N){}return true}function F(){if(document.createStyleSheet){return true}var L,K;for(K=0;L=I[K];++K){if(L.rel.toLowerCase()=="stylesheet"&&!C(L)){return false}}for(K=0;L=J[K];++K){if(!C(L)){return false}}return true}x.ready(function(){if(!E){E=n.getStyle(document.body).isUsable()}if(B||(E&&F())){H()}else{setTimeout(arguments.callee,10)}});return function(K){if(B){K()}else{D.push(K)}}})();function s(D){var C=this.face=D.face,B={"\u0020":1,"\u00a0":1,"\u3000":1};this.glyphs=D.glyphs;this.w=D.w;this.baseSize=parseInt(C["units-per-em"],10);this.family=C["font-family"].toLowerCase();this.weight=C["font-weight"];this.style=C["font-style"]||"normal";this.viewBox=(function(){var F=C.bbox.split(/\s+/);var E={minX:parseInt(F[0],10),minY:parseInt(F[1],10),maxX:parseInt(F[2],10),maxY:parseInt(F[3],10)};E.width=E.maxX-E.minX;E.height=E.maxY-E.minY;E.toString=function(){return[this.minX,this.minY,this.width,this.height].join(" ")};return E})();this.ascent=-parseInt(C.ascent,10);this.descent=-parseInt(C.descent,10);this.height=-this.ascent+this.descent;this.spacing=function(L,N,E){var O=this.glyphs,M,K,G,P=[],F=0,J=-1,I=-1,H;while(H=L[++J]){M=O[H]||this.missingGlyph;if(!M){continue}if(K){F-=G=K[H]||0;P[I]-=G}F+=P[++I]=~~(M.w||this.w)+N+(B[H]?E:0);K=M.k}P.total=F;return P}}function f(){var C={},B={oblique:"italic",italic:"oblique"};this.add=function(D){(C[D.style]||(C[D.style]={}))[D.weight]=D};this.get=function(H,I){var G=C[H]||C[B[H]]||C.normal||C.italic||C.oblique;if(!G){return null}I={normal:400,bold:700}[I]||parseInt(I,10);if(G[I]){return G[I]}var E={1:1,99:0}[I%100],K=[],F,D;if(E===undefined){E=I>400}if(I==500){I=400}for(var J in G){if(!k(G,J)){continue}J=parseInt(J,10);if(!F||J<F){F=J}if(!D||J>D){D=J}K.push(J)}if(I<F){I=F}if(I>D){I=D}K.sort(function(M,L){return(E?(M>=I&&L>=I)?M<L:M>L:(M<=I&&L<=I)?M>L:M<L)?-1:1});return G[K[0]]}}function r(){function D(F,G){if(F.contains){return F.contains(G)}return F.compareDocumentPosition(G)&16}function B(G){var F=G.relatedTarget;if(!F||D(this,F)){return}C(this,G.type=="mouseover")}function E(F){C(this,F.type=="mouseenter")}function C(F,G){setTimeout(function(){var H=d.get(F).options;m.replace(F,G?h(H,H.hover):H,true)},10)}this.attach=function(F){if(F.onmouseenter===undefined){q(F,"mouseover",B);q(F,"mouseout",B)}else{q(F,"mouseenter",E);q(F,"mouseleave",E)}}}function u(){var C=[],D={};function B(H){var E=[],G;for(var F=0;G=H[F];++F){E[F]=C[D[G]]}return E}this.add=function(F,E){D[F]=C.push(E)-1};this.repeat=function(){var E=arguments.length?B(arguments):C,F;for(var G=0;F=E[G++];){m.replace(F[0],F[1],true)}}}function A(){var D={},B=0;function C(E){return E.cufid||(E.cufid=++B)}this.get=function(E){var F=C(E);return D[F]||(D[F]={})}}function a(B){var D={},C={};this.extend=function(E){for(var F in E){if(k(E,F)){D[F]=E[F]}}return this};this.get=function(E){return D[E]!=undefined?D[E]:B[E]};this.getSize=function(F,E){return C[F]||(C[F]=new n.Size(this.get(F),E))};this.isUsable=function(){return !!B}}function q(C,B,D){if(C.addEventListener){C.addEventListener(B,D,false)}else{if(C.attachEvent){C.attachEvent("on"+B,function(){return D.call(C,window.event)})}}}function v(C,B){var D=d.get(C);if(D.options){return C}if(B.hover&&B.hoverables[C.nodeName.toLowerCase()]){b.attach(C)}D.options=B;return C}function j(B){var C={};return function(D){if(!k(C,D)){C[D]=B.apply(null,arguments)}return C[D]}}function c(F,E){var B=n.quotedList(E.get("fontFamily").toLowerCase()),D;for(var C=0;D=B[C];++C){if(i[D]){return i[D].get(E.get("fontStyle"),E.get("fontWeight"))}}return null}function g(B){return document.getElementsByTagName(B)}function k(C,B){return C.hasOwnProperty(B)}function h(){var C={},B,F;for(var E=0,D=arguments.length;B=arguments[E],E<D;++E){for(F in B){if(k(B,F)){C[F]=B[F]}}}return C}function o(E,M,C,N,F,D){var K=document.createDocumentFragment(),H;if(M===""){return K}var L=N.separate;var I=M.split(p[L]),B=(L=="words");if(B&&t){if(/^\s/.test(M)){I.unshift("")}if(/\s$/.test(M)){I.push("")}}for(var J=0,G=I.length;J<G;++J){H=z[N.engine](E,B?n.textAlign(I[J],C,J,G):I[J],C,N,F,D,J<G-1);if(H){K.appendChild(H)}}return K}function l(D,M){var C=D.nodeName.toLowerCase();if(M.ignore[C]){return}var E=!M.textless[C];var B=n.getStyle(v(D,M)).extend(M);var F=c(D,B),G,K,I,H,L,J;if(!F){return}for(G=D.firstChild;G;G=I){K=G.nodeType;I=G.nextSibling;if(E&&K==3){if(H){H.appendData(G.data);D.removeChild(G)}else{H=G}if(I){continue}}if(H){D.replaceChild(o(F,n.whiteSpace(H.data,B,H,J),B,M,G,D),H);H=null}if(K==1){if(G.firstChild){if(G.nodeName.toLowerCase()=="cufon"){z[M.engine](F,null,B,M,G,D)}else{arguments.callee(G,M)}}J=G}}}var t=" ".split(/\s+/).length==0;var d=new A();var b=new r();var y=new u();var e=false;var z={},i={},w={autoDetect:false,engine:null,forceHitArea:false,hover:false,hoverables:{a:true},ignore:{applet:1,canvas:1,col:1,colgroup:1,head:1,iframe:1,map:1,optgroup:1,option:1,script:1,select:1,style:1,textarea:1,title:1,pre:1},printable:true,selector:(window.Sizzle||(window.jQuery&&function(B){return jQuery(B)})||(window.dojo&&dojo.query)||(window.Ext&&Ext.query)||(window.YAHOO&&YAHOO.util&&YAHOO.util.Selector&&YAHOO.util.Selector.query)||(window.$$&&function(B){return $$(B)})||(window.$&&function(B){return $(B)})||(document.querySelectorAll&&function(B){return document.querySelectorAll(B)})||g),separate:"words",textless:{dl:1,html:1,ol:1,table:1,tbody:1,thead:1,tfoot:1,tr:1,ul:1},textShadow:"none"};var p={words:/\s/.test("\u00a0")?/[^\S\u00a0]+/:/\s+/,characters:"",none:/^/};m.now=function(){x.ready();return m};m.refresh=function(){y.repeat.apply(y,arguments);return m};m.registerEngine=function(C,B){if(!B){return m}z[C]=B;return m.set("engine",C)};m.registerFont=function(D){if(!D){return m}var B=new s(D),C=B.family;if(!i[C]){i[C]=new f()}i[C].add(B);return m.set("fontFamily",'"'+C+'"')};m.replace=function(D,C,B){C=h(w,C);if(!C.engine){return m}if(!e){n.addClass(x.root(),"cufon-active cufon-loading");n.ready(function(){n.addClass(n.removeClass(x.root(),"cufon-loading"),"cufon-ready")});e=true}if(C.hover){C.forceHitArea=true}if(C.autoDetect){delete C.fontFamily}if(typeof C.textShadow=="string"){C.textShadow=n.textShadow(C.textShadow)}if(typeof C.color=="string"&&/^-/.test(C.color)){C.textGradient=n.gradient(C.color)}else{delete C.textGradient}if(!B){y.add(D,arguments)}if(D.nodeType||typeof D=="string"){D=[D]}n.ready(function(){for(var F=0,E=D.length;F<E;++F){var G=D[F];if(typeof G=="string"){m.replace(C.selector(G),C,true)}else{l(G,C)}}});return m};m.set=function(B,C){w[B]=C;return m};return m})();Cufon.registerEngine("vml",(function(){var e=document.namespaces;if(!e){return}e.add("cvml","urn:schemas-microsoft-com:vml");e=null;var b=document.createElement("cvml:shape");b.style.behavior="url(#default#VML)";if(!b.coordsize){return}b=null;var h=(document.documentMode||0)<8;document.write(('<style type="text/css">cufoncanvas{text-indent:0;}@media screen{cvml\\:shape,cvml\\:rect,cvml\\:fill,cvml\\:shadow{behavior:url(#default#VML);display:block;antialias:true;position:absolute;}cufoncanvas{position:absolute;text-align:left;}cufon{display:inline-block;position:relative;vertical-align:'+(h?"middle":"text-bottom")+";}cufon cufontext{position:absolute;left:-10000in;font-size:1px;}a cufon{cursor:pointer}}@media print{cufon cufoncanvas{display:none;}}</style>").replace(/;/g,"!important;"));function c(i,j){return a(i,/(?:em|ex|%)$|^[a-z-]+$/i.test(j)?"1em":j)}function a(l,m){if(m==="0"){return 0}if(/px$/i.test(m)){return parseFloat(m)}var k=l.style.left,j=l.runtimeStyle.left;l.runtimeStyle.left=l.currentStyle.left;l.style.left=m.replace("%","em");var i=l.style.pixelLeft;l.style.left=k;l.runtimeStyle.left=j;return i}function f(l,k,j,n){var i="computed"+n,m=k[i];if(isNaN(m)){m=k.get(n);k[i]=m=(m=="normal")?0:~~j.convertFrom(a(l,m))}return m}var g={};function d(p){var q=p.id;if(!g[q]){var n=p.stops,o=document.createElement("cvml:fill"),i=[];o.type="gradient";o.angle=180;o.focus="0";o.method="sigma";o.color=n[0][1];for(var m=1,l=n.length-1;m<l;++m){i.push(n[m][0]*100+"% "+n[m][1])}o.colors=i.join(",");o.color2=n[l][1];g[q]=o}return g[q]}return function(ac,G,Y,C,K,ad,W){var n=(G===null);if(n){G=K.alt}var I=ac.viewBox;var p=Y.computedFontSize||(Y.computedFontSize=new Cufon.CSS.Size(c(ad,Y.get("fontSize"))+"px",ac.baseSize));var y,q;if(n){y=K;q=K.firstChild}else{y=document.createElement("cufon");y.className="cufon cufon-vml";y.alt=G;q=document.createElement("cufoncanvas");y.appendChild(q);if(C.printable){var Z=document.createElement("cufontext");Z.appendChild(document.createTextNode(G));y.appendChild(Z)}if(!W){y.appendChild(document.createElement("cvml:shape"))}}var ai=y.style;var R=q.style;var l=p.convert(I.height),af=Math.ceil(l);var V=af/l;var P=V*Cufon.CSS.fontStretch(Y.get("fontStretch"));var U=I.minX,T=I.minY;R.height=af;R.top=Math.round(p.convert(T-ac.ascent));R.left=Math.round(p.convert(U));ai.height=p.convert(ac.height)+"px";var F=Y.get("color");var ag=Cufon.CSS.textTransform(G,Y).split("");var L=ac.spacing(ag,f(ad,Y,p,"letterSpacing"),f(ad,Y,p,"wordSpacing"));if(!L.length){return null}var k=L.total;var x=-U+k+(I.width-L[L.length-1]);var ah=p.convert(x*P),X=Math.round(ah);var O=x+","+I.height,m;var J="r"+O+"ns";var u=C.textGradient&&d(C.textGradient);var o=ac.glyphs,S=0;var H=C.textShadow;var ab=-1,aa=0,w;while(w=ag[++ab]){var D=o[ag[ab]]||ac.missingGlyph,v;if(!D){continue}if(n){v=q.childNodes[aa];while(v.firstChild){v.removeChild(v.firstChild)}}else{v=document.createElement("cvml:shape");q.appendChild(v)}v.stroked="f";v.coordsize=O;v.coordorigin=m=(U-S)+","+T;v.path=(D.d?"m"+D.d+"xe":"")+"m"+m+J;v.fillcolor=F;if(u){v.appendChild(u.cloneNode(false))}var ae=v.style;ae.width=X;ae.height=af;if(H){var s=H[0],r=H[1];var B=Cufon.CSS.color(s.color),z;var N=document.createElement("cvml:shadow");N.on="t";N.color=B.color;N.offset=s.offX+","+s.offY;if(r){z=Cufon.CSS.color(r.color);N.type="double";N.color2=z.color;N.offset2=r.offX+","+r.offY}N.opacity=B.opacity||(z&&z.opacity)||1;v.appendChild(N)}S+=L[aa++]}var M=v.nextSibling,t,A;if(C.forceHitArea){if(!M){M=document.createElement("cvml:rect");M.stroked="f";M.className="cufon-vml-cover";t=document.createElement("cvml:fill");t.opacity=0;M.appendChild(t);q.appendChild(M)}A=M.style;A.width=X;A.height=af}else{if(M){q.removeChild(M)}}ai.width=Math.max(Math.ceil(p.convert(k*P)),0);if(h){var Q=Y.computedYAdjust;if(Q===undefined){var E=Y.get("lineHeight");if(E=="normal"){E="1em"}else{if(!isNaN(E)){E+="em"}}Y.computedYAdjust=Q=0.5*(a(ad,E)-parseFloat(ai.height))}if(Q){ai.marginTop=Math.ceil(Q)+"px";ai.marginBottom=Q+"px"}}return y}})());Cufon.registerEngine("canvas",(function(){var b=document.createElement("canvas");if(!b||!b.getContext||!b.getContext.apply){return}b=null;var a=Cufon.CSS.supports("display","inline-block");var e=!a&&(document.compatMode=="BackCompat"||/frameset|transitional/i.test(document.doctype.publicId));var f=document.createElement("style");f.type="text/css";f.appendChild(document.createTextNode(("cufon{text-indent:0;}@media screen,projection{cufon{display:inline;display:inline-block;position:relative;vertical-align:middle;"+(e?"":"font-size:1px;line-height:1px;")+"}cufon cufontext{display:-moz-inline-box;display:inline-block;width:0;height:0;overflow:hidden;text-indent:-10000in;}"+(a?"cufon canvas{position:relative;}":"cufon canvas{position:absolute;}")+"}@media print{cufon{padding:0;}cufon canvas{display:none;}}").replace(/;/g,"!important;")));document.getElementsByTagName("head")[0].appendChild(f);function d(p,h){var n=0,m=0;var g=[],o=/([mrvxe])([^a-z]*)/g,k;generate:for(var j=0;k=o.exec(p);++j){var l=k[2].split(",");switch(k[1]){case"v":g[j]={m:"bezierCurveTo",a:[n+~~l[0],m+~~l[1],n+~~l[2],m+~~l[3],n+=~~l[4],m+=~~l[5]]};break;case"r":g[j]={m:"lineTo",a:[n+=~~l[0],m+=~~l[1]]};break;case"m":g[j]={m:"moveTo",a:[n=~~l[0],m=~~l[1]]};break;case"x":g[j]={m:"closePath"};break;case"e":break generate}h[g[j].m].apply(h,g[j].a)}return g}function c(m,k){for(var j=0,h=m.length;j<h;++j){var g=m[j];k[g.m].apply(k,g.a)}}return function(V,w,P,t,C,W){var k=(w===null);if(k){w=C.getAttribute("alt")}var A=V.viewBox;var m=P.getSize("fontSize",V.baseSize);var B=0,O=0,N=0,u=0;var z=t.textShadow,L=[];if(z){for(var U=z.length;U--;){var F=z[U];var K=m.convertFrom(parseFloat(F.offX));var I=m.convertFrom(parseFloat(F.offY));L[U]=[K,I];if(I<B){B=I}if(K>O){O=K}if(I>N){N=I}if(K<u){u=K}}}var Z=Cufon.CSS.textTransform(w,P).split("");var E=V.spacing(Z,~~m.convertFrom(parseFloat(P.get("letterSpacing"))||0),~~m.convertFrom(parseFloat(P.get("wordSpacing"))||0));if(!E.length){return null}var h=E.total;O+=A.width-E[E.length-1];u+=A.minX;var s,n;if(k){s=C;n=C.firstChild}else{s=document.createElement("cufon");s.className="cufon cufon-canvas";s.setAttribute("alt",w);n=document.createElement("canvas");s.appendChild(n);if(t.printable){var S=document.createElement("cufontext");S.appendChild(document.createTextNode(w));s.appendChild(S)}}var aa=s.style;var H=n.style;var j=m.convert(A.height);var Y=Math.ceil(j);var M=Y/j;var G=M*Cufon.CSS.fontStretch(P.get("fontStretch"));var J=h*G;var Q=Math.ceil(m.convert(J+O-u));var o=Math.ceil(m.convert(A.height-B+N));n.width=Q;n.height=o;H.width=Q+"px";H.height=o+"px";B+=A.minY;H.top=Math.round(m.convert(B-V.ascent))+"px";H.left=Math.round(m.convert(u))+"px";var r=Math.max(Math.ceil(m.convert(J)),0)+"px";if(a){aa.width=r;aa.height=m.convert(V.height)+"px"}else{aa.paddingLeft=r;aa.paddingBottom=(m.convert(V.height)-1)+"px"}var X=n.getContext("2d"),D=j/A.height;X.scale(D,D*M);X.translate(-u,-B);X.save();function T(){var x=V.glyphs,ab,l=-1,g=-1,y;X.scale(G,1);while(y=Z[++l]){var ab=x[Z[l]]||V.missingGlyph;if(!ab){continue}if(ab.d){X.beginPath();if(ab.code){c(ab.code,X)}else{ab.code=d("m"+ab.d,X)}X.fill()}X.translate(E[++g],0)}X.restore()}if(z){for(var U=z.length;U--;){var F=z[U];X.save();X.fillStyle=F.color;X.translate.apply(X,L[U]);T()}}var q=t.textGradient;if(q){var v=q.stops,p=X.createLinearGradient(0,A.minY,0,A.maxY);for(var U=0,R=v.length;U<R;++U){p.addColorStop.apply(p,v[U])}X.fillStyle=p}else{X.fillStyle=P.get("color")}T();return s}})());