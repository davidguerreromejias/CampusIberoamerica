

/* ========================================================================
 * Bootstrap: button.js v3.3.7
 * http://getbootstrap.com/javascript/#buttons
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // BUTTON PUBLIC CLASS DEFINITION
  // ==============================

  var Button = function (element, options) {
    this.$element  = $(element)
    this.options   = $.extend({}, Button.DEFAULTS, options)
    this.isLoading = false
  }

  Button.VERSION  = '3.3.7'

  Button.DEFAULTS = {
    loadingText: 'loading...'
  }

  Button.prototype.setState = function (state) {
    var d    = 'disabled'
    var $el  = this.$element
    var val  = $el.is('input') ? 'val' : 'html'
    var data = $el.data()

    state += 'Text'

    if (data.resetText == null) $el.data('resetText', $el[val]())

    // push to event loop to allow forms to submit
    setTimeout($.proxy(function () {
      $el[val](data[state] == null ? this.options[state] : data[state])

      if (state == 'loadingText') {
        this.isLoading = true
        $el.addClass(d).attr(d, d).prop(d, true)
      } else if (this.isLoading) {
        this.isLoading = false
        $el.removeClass(d).removeAttr(d).prop(d, false)
      }
    }, this), 0)
  }

  Button.prototype.toggle = function () {
    var changed = true
    var $parent = this.$element.closest('[data-toggle="buttons"]')

    if ($parent.length) {
      var $input = this.$element.find('input')
      if ($input.prop('type') == 'radio') {
        if ($input.prop('checked')) changed = false
        $parent.find('.active').removeClass('active')
        this.$element.addClass('active')
      } else if ($input.prop('type') == 'checkbox') {
        if (($input.prop('checked')) !== this.$element.hasClass('active')) changed = false
        this.$element.toggleClass('active')
      }
      $input.prop('checked', this.$element.hasClass('active'))
      if (changed) $input.trigger('change')
    } else {
      this.$element.attr('aria-pressed', !this.$element.hasClass('active'))
      this.$element.toggleClass('active')
    }
  }


  // BUTTON PLUGIN DEFINITION
  // ========================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.button')
      var options = typeof option == 'object' && option

      if (!data) $this.data('bs.button', (data = new Button(this, options)))

      if (option == 'toggle') data.toggle()
      else if (option) data.setState(option)
    })
  }

  var old = $.fn.button

  $.fn.button             = Plugin
  $.fn.button.Constructor = Button


  // BUTTON NO CONFLICT
  // ==================

  $.fn.button.noConflict = function () {
    $.fn.button = old
    return this
  }


  // BUTTON DATA-API
  // ===============

  $(document)
    .on('click.bs.button.data-api', '[data-toggle^="button"]', function (e) {
      var $btn = $(e.target).closest('.btn')
      Plugin.call($btn, 'toggle')
      if (!($(e.target).is('input[type="radio"], input[type="checkbox"]'))) {
        // Prevent double click on radios, and the double selections (so cancellation) on checkboxes
        e.preventDefault()
        // The target component still receive the focus
        if ($btn.is('input,button')) $btn.trigger('focus')
        else $btn.find('input:visible,button:visible').first().trigger('focus')
      }
    })
    .on('focus.bs.button.data-api blur.bs.button.data-api', '[data-toggle^="button"]', function (e) {
      $(e.target).closest('.btn').toggleClass('focus', /^focus(in)?$/.test(e.type))
    })

}(jQuery);

!function(t,e){"function"==typeof define&&define.amd?define(e):"object"==typeof exports?module.exports=e(require,exports,module):t.Tether=e()}(this,function(t,e,o){"use strict";function n(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function i(t){var e=t.getBoundingClientRect(),o={};for(var n in e)o[n]=e[n];if(t.ownerDocument!==document){var r=t.ownerDocument.defaultView.frameElement;if(r){var s=i(r);o.top+=s.top,o.bottom+=s.top,o.left+=s.left,o.right+=s.left}}return o}function r(t){var e=getComputedStyle(t)||{},o=e.position,n=[];if("fixed"===o)return[t];for(var i=t;(i=i.parentNode)&&i&&1===i.nodeType;){var r=void 0;try{r=getComputedStyle(i)}catch(s){}if("undefined"==typeof r||null===r)return n.push(i),n;var a=r,f=a.overflow,l=a.overflowX,h=a.overflowY;/(auto|scroll)/.test(f+h+l)&&("absolute"!==o||["relative","absolute","fixed"].indexOf(r.position)>=0)&&n.push(i)}return n.push(t.ownerDocument.body),t.ownerDocument!==document&&n.push(t.ownerDocument.defaultView),n}function s(){A&&document.body.removeChild(A),A=null}function a(t){var e=void 0;t===document?(e=document,t=document.documentElement):e=t.ownerDocument;var o=e.documentElement,n=i(t),r=P();return n.top-=r.top,n.left-=r.left,"undefined"==typeof n.width&&(n.width=document.body.scrollWidth-n.left-n.right),"undefined"==typeof n.height&&(n.height=document.body.scrollHeight-n.top-n.bottom),n.top=n.top-o.clientTop,n.left=n.left-o.clientLeft,n.right=e.body.clientWidth-n.width-n.left,n.bottom=e.body.clientHeight-n.height-n.top,n}function f(t){return t.offsetParent||document.documentElement}function l(){var t=document.createElement("div");t.style.width="100%",t.style.height="200px";var e=document.createElement("div");h(e.style,{position:"absolute",top:0,left:0,pointerEvents:"none",visibility:"hidden",width:"200px",height:"150px",overflow:"hidden"}),e.appendChild(t),document.body.appendChild(e);var o=t.offsetWidth;e.style.overflow="scroll";var n=t.offsetWidth;o===n&&(n=e.clientWidth),document.body.removeChild(e);var i=o-n;return{width:i,height:i}}function h(){var t=arguments.length<=0||void 0===arguments[0]?{}:arguments[0],e=[];return Array.prototype.push.apply(e,arguments),e.slice(1).forEach(function(e){if(e)for(var o in e)({}).hasOwnProperty.call(e,o)&&(t[o]=e[o])}),t}function u(t,e){if("undefined"!=typeof t.classList)e.split(" ").forEach(function(e){e.trim()&&t.classList.remove(e)});else{var o=new RegExp("(^| )"+e.split(" ").join("|")+"( |$)","gi"),n=c(t).replace(o," ");g(t,n)}}function d(t,e){if("undefined"!=typeof t.classList)e.split(" ").forEach(function(e){e.trim()&&t.classList.add(e)});else{u(t,e);var o=c(t)+(" "+e);g(t,o)}}function p(t,e){if("undefined"!=typeof t.classList)return t.classList.contains(e);var o=c(t);return new RegExp("(^| )"+e+"( |$)","gi").test(o)}function c(t){return t.className instanceof t.ownerDocument.defaultView.SVGAnimatedString?t.className.baseVal:t.className}function g(t,e){t.setAttribute("class",e)}function m(t,e,o){o.forEach(function(o){-1===e.indexOf(o)&&p(t,o)&&u(t,o)}),e.forEach(function(e){p(t,e)||d(t,e)})}function n(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function v(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}function y(t,e){var o=arguments.length<=2||void 0===arguments[2]?1:arguments[2];return t+o>=e&&e>=t-o}function b(){return"undefined"!=typeof performance&&"undefined"!=typeof performance.now?performance.now():+new Date}function w(){for(var t={top:0,left:0},e=arguments.length,o=Array(e),n=0;e>n;n++)o[n]=arguments[n];return o.forEach(function(e){var o=e.top,n=e.left;"string"==typeof o&&(o=parseFloat(o,10)),"string"==typeof n&&(n=parseFloat(n,10)),t.top+=o,t.left+=n}),t}function C(t,e){return"string"==typeof t.left&&-1!==t.left.indexOf("%")&&(t.left=parseFloat(t.left,10)/100*e.width),"string"==typeof t.top&&-1!==t.top.indexOf("%")&&(t.top=parseFloat(t.top,10)/100*e.height),t}function O(t,e){return"scrollParent"===e?e=t.scrollParents[0]:"window"===e&&(e=[pageXOffset,pageYOffset,innerWidth+pageXOffset,innerHeight+pageYOffset]),e===document&&(e=e.documentElement),"undefined"!=typeof e.nodeType&&!function(){var t=e,o=a(e),n=o,i=getComputedStyle(e);if(e=[n.left,n.top,o.width+n.left,o.height+n.top],t.ownerDocument!==document){var r=t.ownerDocument.defaultView;e[0]+=r.pageXOffset,e[1]+=r.pageYOffset,e[2]+=r.pageXOffset,e[3]+=r.pageYOffset}$.forEach(function(t,o){t=t[0].toUpperCase()+t.substr(1),"Top"===t||"Left"===t?e[o]+=parseFloat(i["border"+t+"Width"]):e[o]-=parseFloat(i["border"+t+"Width"])})}(),e}var E=function(){function t(t,e){for(var o=0;o<e.length;o++){var n=e[o];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,o,n){return o&&t(e.prototype,o),n&&t(e,n),e}}(),x=void 0;"undefined"==typeof x&&(x={modules:[]});var A=null,T=function(){var t=0;return function(){return++t}}(),S={},P=function(){var t=A;t||(t=document.createElement("div"),t.setAttribute("data-tether-id",T()),h(t.style,{top:0,left:0,position:"absolute"}),document.body.appendChild(t),A=t);var e=t.getAttribute("data-tether-id");return"undefined"==typeof S[e]&&(S[e]=i(t),M(function(){delete S[e]})),S[e]},W=[],M=function(t){W.push(t)},_=function(){for(var t=void 0;t=W.pop();)t()},k=function(){function t(){n(this,t)}return E(t,[{key:"on",value:function(t,e,o){var n=arguments.length<=3||void 0===arguments[3]?!1:arguments[3];"undefined"==typeof this.bindings&&(this.bindings={}),"undefined"==typeof this.bindings[t]&&(this.bindings[t]=[]),this.bindings[t].push({handler:e,ctx:o,once:n})}},{key:"once",value:function(t,e,o){this.on(t,e,o,!0)}},{key:"off",value:function(t,e){if("undefined"!=typeof this.bindings&&"undefined"!=typeof this.bindings[t])if("undefined"==typeof e)delete this.bindings[t];else for(var o=0;o<this.bindings[t].length;)this.bindings[t][o].handler===e?this.bindings[t].splice(o,1):++o}},{key:"trigger",value:function(t){if("undefined"!=typeof this.bindings&&this.bindings[t]){for(var e=0,o=arguments.length,n=Array(o>1?o-1:0),i=1;o>i;i++)n[i-1]=arguments[i];for(;e<this.bindings[t].length;){var r=this.bindings[t][e],s=r.handler,a=r.ctx,f=r.once,l=a;"undefined"==typeof l&&(l=this),s.apply(l,n),f?this.bindings[t].splice(e,1):++e}}}}]),t}();x.Utils={getActualBoundingClientRect:i,getScrollParents:r,getBounds:a,getOffsetParent:f,extend:h,addClass:d,removeClass:u,hasClass:p,updateClasses:m,defer:M,flush:_,uniqueId:T,Evented:k,getScrollBarSize:l,removeUtilElements:s};var B=function(){function t(t,e){var o=[],n=!0,i=!1,r=void 0;try{for(var s,a=t[Symbol.iterator]();!(n=(s=a.next()).done)&&(o.push(s.value),!e||o.length!==e);n=!0);}catch(f){i=!0,r=f}finally{try{!n&&a["return"]&&a["return"]()}finally{if(i)throw r}}return o}return function(e,o){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return t(e,o);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}(),E=function(){function t(t,e){for(var o=0;o<e.length;o++){var n=e[o];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,o,n){return o&&t(e.prototype,o),n&&t(e,n),e}}(),z=function(t,e,o){for(var n=!0;n;){var i=t,r=e,s=o;n=!1,null===i&&(i=Function.prototype);var a=Object.getOwnPropertyDescriptor(i,r);if(void 0!==a){if("value"in a)return a.value;var f=a.get;if(void 0===f)return;return f.call(s)}var l=Object.getPrototypeOf(i);if(null===l)return;t=l,e=r,o=s,n=!0,a=l=void 0}};if("undefined"==typeof x)throw new Error("You must include the utils.js file before tether.js");var j=x.Utils,r=j.getScrollParents,a=j.getBounds,f=j.getOffsetParent,h=j.extend,d=j.addClass,u=j.removeClass,m=j.updateClasses,M=j.defer,_=j.flush,l=j.getScrollBarSize,s=j.removeUtilElements,Y=function(){if("undefined"==typeof document)return"";for(var t=document.createElement("div"),e=["transform","WebkitTransform","OTransform","MozTransform","msTransform"],o=0;o<e.length;++o){var n=e[o];if(void 0!==t.style[n])return n}}(),L=[],D=function(){L.forEach(function(t){t.position(!1)}),_()};!function(){var t=null,e=null,o=null,n=function i(){return"undefined"!=typeof e&&e>16?(e=Math.min(e-16,250),void(o=setTimeout(i,250))):void("undefined"!=typeof t&&b()-t<10||(null!=o&&(clearTimeout(o),o=null),t=b(),D(),e=b()-t))};"undefined"!=typeof window&&"undefined"!=typeof window.addEventListener&&["resize","scroll","touchmove"].forEach(function(t){window.addEventListener(t,n)})}();var X={center:"center",left:"right",right:"left"},F={middle:"middle",top:"bottom",bottom:"top"},H={top:0,left:0,middle:"50%",center:"50%",bottom:"100%",right:"100%"},N=function(t,e){var o=t.left,n=t.top;return"auto"===o&&(o=X[e.left]),"auto"===n&&(n=F[e.top]),{left:o,top:n}},U=function(t){var e=t.left,o=t.top;return"undefined"!=typeof H[t.left]&&(e=H[t.left]),"undefined"!=typeof H[t.top]&&(o=H[t.top]),{left:e,top:o}},V=function(t){var e=t.split(" "),o=B(e,2),n=o[0],i=o[1];return{top:n,left:i}},R=V,q=function(t){function e(t){var o=this;n(this,e),z(Object.getPrototypeOf(e.prototype),"constructor",this).call(this),this.position=this.position.bind(this),L.push(this),this.history=[],this.setOptions(t,!1),x.modules.forEach(function(t){"undefined"!=typeof t.initialize&&t.initialize.call(o)}),this.position()}return v(e,t),E(e,[{key:"getClass",value:function(){var t=arguments.length<=0||void 0===arguments[0]?"":arguments[0],e=this.options.classes;return"undefined"!=typeof e&&e[t]?this.options.classes[t]:this.options.classPrefix?this.options.classPrefix+"-"+t:t}},{key:"setOptions",value:function(t){var e=this,o=arguments.length<=1||void 0===arguments[1]?!0:arguments[1],n={offset:"0 0",targetOffset:"0 0",targetAttachment:"auto auto",classPrefix:"tether"};this.options=h(n,t);var i=this.options,s=i.element,a=i.target,f=i.targetModifier;if(this.element=s,this.target=a,this.targetModifier=f,"viewport"===this.target?(this.target=document.body,this.targetModifier="visible"):"scroll-handle"===this.target&&(this.target=document.body,this.targetModifier="scroll-handle"),["element","target"].forEach(function(t){if("undefined"==typeof e[t])throw new Error("Tether Error: Both element and target must be defined");"undefined"!=typeof e[t].jquery?e[t]=e[t][0]:"string"==typeof e[t]&&(e[t]=document.querySelector(e[t]))}),d(this.element,this.getClass("element")),this.options.addTargetClasses!==!1&&d(this.target,this.getClass("target")),!this.options.attachment)throw new Error("Tether Error: You must provide an attachment");this.targetAttachment=R(this.options.targetAttachment),this.attachment=R(this.options.attachment),this.offset=V(this.options.offset),this.targetOffset=V(this.options.targetOffset),"undefined"!=typeof this.scrollParents&&this.disable(),"scroll-handle"===this.targetModifier?this.scrollParents=[this.target]:this.scrollParents=r(this.target),this.options.enabled!==!1&&this.enable(o)}},{key:"getTargetBounds",value:function(){if("undefined"==typeof this.targetModifier)return a(this.target);if("visible"===this.targetModifier){if(this.target===document.body)return{top:pageYOffset,left:pageXOffset,height:innerHeight,width:innerWidth};var t=a(this.target),e={height:t.height,width:t.width,top:t.top,left:t.left};return e.height=Math.min(e.height,t.height-(pageYOffset-t.top)),e.height=Math.min(e.height,t.height-(t.top+t.height-(pageYOffset+innerHeight))),e.height=Math.min(innerHeight,e.height),e.height-=2,e.width=Math.min(e.width,t.width-(pageXOffset-t.left)),e.width=Math.min(e.width,t.width-(t.left+t.width-(pageXOffset+innerWidth))),e.width=Math.min(innerWidth,e.width),e.width-=2,e.top<pageYOffset&&(e.top=pageYOffset),e.left<pageXOffset&&(e.left=pageXOffset),e}if("scroll-handle"===this.targetModifier){var t=void 0,o=this.target;o===document.body?(o=document.documentElement,t={left:pageXOffset,top:pageYOffset,height:innerHeight,width:innerWidth}):t=a(o);var n=getComputedStyle(o),i=o.scrollWidth>o.clientWidth||[n.overflow,n.overflowX].indexOf("scroll")>=0||this.target!==document.body,r=0;i&&(r=15);var s=t.height-parseFloat(n.borderTopWidth)-parseFloat(n.borderBottomWidth)-r,e={width:15,height:.975*s*(s/o.scrollHeight),left:t.left+t.width-parseFloat(n.borderLeftWidth)-15},f=0;408>s&&this.target===document.body&&(f=-11e-5*Math.pow(s,2)-.00727*s+22.58),this.target!==document.body&&(e.height=Math.max(e.height,24));var l=this.target.scrollTop/(o.scrollHeight-s);return e.top=l*(s-e.height-f)+t.top+parseFloat(n.borderTopWidth),this.target===document.body&&(e.height=Math.max(e.height,24)),e}}},{key:"clearCache",value:function(){this._cache={}}},{key:"cache",value:function(t,e){return"undefined"==typeof this._cache&&(this._cache={}),"undefined"==typeof this._cache[t]&&(this._cache[t]=e.call(this)),this._cache[t]}},{key:"enable",value:function(){var t=this,e=arguments.length<=0||void 0===arguments[0]?!0:arguments[0];this.options.addTargetClasses!==!1&&d(this.target,this.getClass("enabled")),d(this.element,this.getClass("enabled")),this.enabled=!0,this.scrollParents.forEach(function(e){e!==t.target.ownerDocument&&e.addEventListener("scroll",t.position)}),e&&this.position()}},{key:"disable",value:function(){var t=this;u(this.target,this.getClass("enabled")),u(this.element,this.getClass("enabled")),this.enabled=!1,"undefined"!=typeof this.scrollParents&&this.scrollParents.forEach(function(e){e.removeEventListener("scroll",t.position)})}},{key:"destroy",value:function(){var t=this;this.disable(),L.forEach(function(e,o){e===t&&L.splice(o,1)}),0===L.length&&s()}},{key:"updateAttachClasses",value:function(t,e){var o=this;t=t||this.attachment,e=e||this.targetAttachment;var n=["left","top","bottom","right","middle","center"];"undefined"!=typeof this._addAttachClasses&&this._addAttachClasses.length&&this._addAttachClasses.splice(0,this._addAttachClasses.length),"undefined"==typeof this._addAttachClasses&&(this._addAttachClasses=[]);var i=this._addAttachClasses;t.top&&i.push(this.getClass("element-attached")+"-"+t.top),t.left&&i.push(this.getClass("element-attached")+"-"+t.left),e.top&&i.push(this.getClass("target-attached")+"-"+e.top),e.left&&i.push(this.getClass("target-attached")+"-"+e.left);var r=[];n.forEach(function(t){r.push(o.getClass("element-attached")+"-"+t),r.push(o.getClass("target-attached")+"-"+t)}),M(function(){"undefined"!=typeof o._addAttachClasses&&(m(o.element,o._addAttachClasses,r),o.options.addTargetClasses!==!1&&m(o.target,o._addAttachClasses,r),delete o._addAttachClasses)})}},{key:"position",value:function(){var t=this,e=arguments.length<=0||void 0===arguments[0]?!0:arguments[0];if(this.enabled){this.clearCache();var o=N(this.targetAttachment,this.attachment);this.updateAttachClasses(this.attachment,o);var n=this.cache("element-bounds",function(){return a(t.element)}),i=n.width,r=n.height;if(0===i&&0===r&&"undefined"!=typeof this.lastSize){var s=this.lastSize;i=s.width,r=s.height}else this.lastSize={width:i,height:r};var h=this.cache("target-bounds",function(){return t.getTargetBounds()}),u=h,d=C(U(this.attachment),{width:i,height:r}),p=C(U(o),u),c=C(this.offset,{width:i,height:r}),g=C(this.targetOffset,u);d=w(d,c),p=w(p,g);for(var m=h.left+p.left-d.left,v=h.top+p.top-d.top,y=0;y<x.modules.length;++y){var b=x.modules[y],O=b.position.call(this,{left:m,top:v,targetAttachment:o,targetPos:h,elementPos:n,offset:d,targetOffset:p,manualOffset:c,manualTargetOffset:g,scrollbarSize:S,attachment:this.attachment});if(O===!1)return!1;"undefined"!=typeof O&&"object"==typeof O&&(v=O.top,m=O.left)}var E={page:{top:v,left:m},viewport:{top:v-pageYOffset,bottom:pageYOffset-v-r+innerHeight,left:m-pageXOffset,right:pageXOffset-m-i+innerWidth}},A=this.target.ownerDocument,T=A.defaultView,S=void 0;return A.body.scrollWidth>T.innerWidth&&(S=this.cache("scrollbar-size",l),E.viewport.bottom-=S.height),A.body.scrollHeight>T.innerHeight&&(S=this.cache("scrollbar-size",l),E.viewport.right-=S.width),(-1===["","static"].indexOf(A.body.style.position)||-1===["","static"].indexOf(A.body.parentElement.style.position))&&(E.page.bottom=A.body.scrollHeight-v-r,E.page.right=A.body.scrollWidth-m-i),"undefined"!=typeof this.options.optimizations&&this.options.optimizations.moveElement!==!1&&"undefined"==typeof this.targetModifier&&!function(){var e=t.cache("target-offsetparent",function(){return f(t.target)}),o=t.cache("target-offsetparent-bounds",function(){return a(e)}),n=getComputedStyle(e),i=o,r={};if(["Top","Left","Bottom","Right"].forEach(function(t){r[t.toLowerCase()]=parseFloat(n["border"+t+"Width"])}),o.right=A.body.scrollWidth-o.left-i.width+r.right,o.bottom=A.body.scrollHeight-o.top-i.height+r.bottom,E.page.top>=o.top+r.top&&E.page.bottom>=o.bottom&&E.page.left>=o.left+r.left&&E.page.right>=o.right){var s=e.scrollTop,l=e.scrollLeft;E.offset={top:E.page.top-o.top+s-r.top,left:E.page.left-o.left+l-r.left}}}(),this.move(E),this.history.unshift(E),this.history.length>3&&this.history.pop(),e&&_(),!0}}},{key:"move",value:function(t){var e=this;if("undefined"!=typeof this.element.parentNode){var o={};for(var n in t){o[n]={};for(var i in t[n]){for(var r=!1,s=0;s<this.history.length;++s){var a=this.history[s];if("undefined"!=typeof a[n]&&!y(a[n][i],t[n][i])){r=!0;break}}r||(o[n][i]=!0)}}var l={top:"",left:"",right:"",bottom:""},u=function(t,o){var n="undefined"!=typeof e.options.optimizations,i=n?e.options.optimizations.gpu:null;if(i!==!1){var r=void 0,s=void 0;t.top?(l.top=0,r=o.top):(l.bottom=0,r=-o.bottom),t.left?(l.left=0,s=o.left):(l.right=0,s=-o.right),l[Y]="translateX("+Math.round(s)+"px) translateY("+Math.round(r)+"px)","msTransform"!==Y&&(l[Y]+=" translateZ(0)")}else t.top?l.top=o.top+"px":l.bottom=o.bottom+"px",t.left?l.left=o.left+"px":l.right=o.right+"px"},d=!1;if((o.page.top||o.page.bottom)&&(o.page.left||o.page.right)?(l.position="absolute",u(o.page,t.page)):(o.viewport.top||o.viewport.bottom)&&(o.viewport.left||o.viewport.right)?(l.position="fixed",u(o.viewport,t.viewport)):"undefined"!=typeof o.offset&&o.offset.top&&o.offset.left?!function(){l.position="absolute";var n=e.cache("target-offsetparent",function(){return f(e.target)});f(e.element)!==n&&M(function(){e.element.parentNode.removeChild(e.element),n.appendChild(e.element)}),u(o.offset,t.offset),d=!0}():(l.position="absolute",u({top:!0,left:!0},t.page)),!d){for(var p=!0,c=this.element.parentNode;c&&1===c.nodeType&&"BODY"!==c.tagName;){if("static"!==getComputedStyle(c).position){p=!1;break}c=c.parentNode}p||(this.element.parentNode.removeChild(this.element),this.element.ownerDocument.body.appendChild(this.element))}var g={},m=!1;for(var i in l){var v=l[i],b=this.element.style[i];b!==v&&(m=!0,g[i]=v)}m&&M(function(){h(e.element.style,g),e.trigger("repositioned")})}}}]),e}(k);q.modules=[],x.position=D;var I=h(q,x),B=function(){function t(t,e){var o=[],n=!0,i=!1,r=void 0;try{for(var s,a=t[Symbol.iterator]();!(n=(s=a.next()).done)&&(o.push(s.value),!e||o.length!==e);n=!0);}catch(f){i=!0,r=f}finally{try{!n&&a["return"]&&a["return"]()}finally{if(i)throw r}}return o}return function(e,o){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return t(e,o);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}(),j=x.Utils,a=j.getBounds,h=j.extend,m=j.updateClasses,M=j.defer,$=["left","top","right","bottom"];x.modules.push({position:function(t){var e=this,o=t.top,n=t.left,i=t.targetAttachment;if(!this.options.constraints)return!0;var r=this.cache("element-bounds",function(){return a(e.element)}),s=r.height,f=r.width;if(0===f&&0===s&&"undefined"!=typeof this.lastSize){var l=this.lastSize;f=l.width,s=l.height}var u=this.cache("target-bounds",function(){return e.getTargetBounds()}),d=u.height,p=u.width,c=[this.getClass("pinned"),this.getClass("out-of-bounds")];this.options.constraints.forEach(function(t){var e=t.outOfBoundsClass,o=t.pinnedClass;e&&c.push(e),o&&c.push(o)}),c.forEach(function(t){["left","top","right","bottom"].forEach(function(e){c.push(t+"-"+e)})});var g=[],v=h({},i),y=h({},this.attachment);return this.options.constraints.forEach(function(t){var r=t.to,a=t.attachment,l=t.pin;"undefined"==typeof a&&(a="");var h=void 0,u=void 0;if(a.indexOf(" ")>=0){var c=a.split(" "),m=B(c,2);u=m[0],h=m[1]}else h=u=a;var b=O(e,r);("target"===u||"both"===u)&&(o<b[1]&&"top"===v.top&&(o+=d,v.top="bottom"),o+s>b[3]&&"bottom"===v.top&&(o-=d,v.top="top")),"together"===u&&("top"===v.top&&("bottom"===y.top&&o<b[1]?(o+=d,v.top="bottom",o+=s,y.top="top"):"top"===y.top&&o+s>b[3]&&o-(s-d)>=b[1]&&(o-=s-d,v.top="bottom",y.top="bottom")),"bottom"===v.top&&("top"===y.top&&o+s>b[3]?(o-=d,v.top="top",o-=s,y.top="bottom"):"bottom"===y.top&&o<b[1]&&o+(2*s-d)<=b[3]&&(o+=s-d,v.top="top",y.top="top")),"middle"===v.top&&(o+s>b[3]&&"top"===y.top?(o-=s,y.top="bottom"):o<b[1]&&"bottom"===y.top&&(o+=s,y.top="top"))),("target"===h||"both"===h)&&(n<b[0]&&"left"===v.left&&(n+=p,v.left="right"),n+f>b[2]&&"right"===v.left&&(n-=p,v.left="left")),"together"===h&&(n<b[0]&&"left"===v.left?"right"===y.left?(n+=p,v.left="right",n+=f,y.left="left"):"left"===y.left&&(n+=p,v.left="right",n-=f,y.left="right"):n+f>b[2]&&"right"===v.left?"left"===y.left?(n-=p,v.left="left",n-=f,y.left="right"):"right"===y.left&&(n-=p,v.left="left",n+=f,y.left="left"):"center"===v.left&&(n+f>b[2]&&"left"===y.left?(n-=f,y.left="right"):n<b[0]&&"right"===y.left&&(n+=f,y.left="left"))),("element"===u||"both"===u)&&(o<b[1]&&"bottom"===y.top&&(o+=s,y.top="top"),o+s>b[3]&&"top"===y.top&&(o-=s,y.top="bottom")),("element"===h||"both"===h)&&(n<b[0]&&("right"===y.left?(n+=f,y.left="left"):"center"===y.left&&(n+=f/2,y.left="left")),n+f>b[2]&&("left"===y.left?(n-=f,y.left="right"):"center"===y.left&&(n-=f/2,y.left="right"))),"string"==typeof l?l=l.split(",").map(function(t){return t.trim()}):l===!0&&(l=["top","left","right","bottom"]),l=l||[];var w=[],C=[];o<b[1]&&(l.indexOf("top")>=0?(o=b[1],w.push("top")):C.push("top")),o+s>b[3]&&(l.indexOf("bottom")>=0?(o=b[3]-s,w.push("bottom")):C.push("bottom")),n<b[0]&&(l.indexOf("left")>=0?(n=b[0],w.push("left")):C.push("left")),n+f>b[2]&&(l.indexOf("right")>=0?(n=b[2]-f,w.push("right")):C.push("right")),w.length&&!function(){var t=void 0;t="undefined"!=typeof e.options.pinnedClass?e.options.pinnedClass:e.getClass("pinned"),g.push(t),w.forEach(function(e){g.push(t+"-"+e)})}(),C.length&&!function(){var t=void 0;t="undefined"!=typeof e.options.outOfBoundsClass?e.options.outOfBoundsClass:e.getClass("out-of-bounds"),g.push(t),C.forEach(function(e){g.push(t+"-"+e)})}(),(w.indexOf("left")>=0||w.indexOf("right")>=0)&&(y.left=v.left=!1),(w.indexOf("top")>=0||w.indexOf("bottom")>=0)&&(y.top=v.top=!1),(v.top!==i.top||v.left!==i.left||y.top!==e.attachment.top||y.left!==e.attachment.left)&&(e.updateAttachClasses(y,v),e.trigger("update",{attachment:y,targetAttachment:v}))}),M(function(){e.options.addTargetClasses!==!1&&m(e.target,g,c),m(e.element,g,c)}),{top:o,left:n}}});var j=x.Utils,a=j.getBounds,m=j.updateClasses,M=j.defer;x.modules.push({position:function(t){var e=this,o=t.top,n=t.left,i=this.cache("element-bounds",function(){return a(e.element)}),r=i.height,s=i.width,f=this.getTargetBounds(),l=o+r,h=n+s,u=[];o<=f.bottom&&l>=f.top&&["left","right"].forEach(function(t){var e=f[t];(e===n||e===h)&&u.push(t)}),n<=f.right&&h>=f.left&&["top","bottom"].forEach(function(t){var e=f[t];(e===o||e===l)&&u.push(t)});var d=[],p=[],c=["left","top","right","bottom"];return d.push(this.getClass("abutted")),c.forEach(function(t){d.push(e.getClass("abutted")+"-"+t)}),u.length&&p.push(this.getClass("abutted")),u.forEach(function(t){p.push(e.getClass("abutted")+"-"+t)}),M(function(){e.options.addTargetClasses!==!1&&m(e.target,p,d),m(e.element,p,d)}),!0}});var B=function(){function t(t,e){var o=[],n=!0,i=!1,r=void 0;try{for(var s,a=t[Symbol.iterator]();!(n=(s=a.next()).done)&&(o.push(s.value),!e||o.length!==e);n=!0);}catch(f){i=!0,r=f}finally{try{!n&&a["return"]&&a["return"]()}finally{if(i)throw r}}return o}return function(e,o){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return t(e,o);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}();return x.modules.push({position:function(t){var e=t.top,o=t.left;if(this.options.shift){var n=this.options.shift;"function"==typeof this.options.shift&&(n=this.options.shift.call(this,{top:e,left:o}));var i=void 0,r=void 0;if("string"==typeof n){n=n.split(" "),n[1]=n[1]||n[0];var s=n,a=B(s,2);i=a[0],r=a[1],i=parseFloat(i,10),r=parseFloat(r,10)}else i=n.top,r=n.left;return e+=i,o+=r,{top:e,left:o}}}}),I});
/*! tether-select 1.1.2 */
/* global Tether */

'use strict';

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

var _get = function get(_x3, _x4, _x5) { var _again = true; _function: while (_again) { var object = _x3, property = _x4, receiver = _x5; _again = false; if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { _x3 = parent; _x4 = property; _x5 = receiver; _again = true; desc = parent = undefined; continue _function; } } else if ('value' in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

function _inherits(subClass, superClass) { if (typeof superClass !== 'function' && superClass !== null) { throw new TypeError('Super expression must either be null or a function, not ' + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var _Tether$Utils = Tether.Utils;
var extend = _Tether$Utils.extend;
var addClass = _Tether$Utils.addClass;
var removeClass = _Tether$Utils.removeClass;
var hasClass = _Tether$Utils.hasClass;
var getBounds = _Tether$Utils.getBounds;
var Evented = _Tether$Utils.Evented;

var ENTER = 13;
var ESCAPE = 27;
var SPACE = 32;
var UP = 38;
var DOWN = 40;

var touchDevice = ('ontouchstart' in document.documentElement);
var clickEvent = touchDevice ? 'touchstart' : 'click';

function _useNative() {
  var innerWidth = window.innerWidth;
  var innerHeight = window.innerHeight;

  return touchDevice && (innerWidth <= 640 || innerHeight <= 640);
}

function isRepeatedChar(str) {
  return Array.prototype.reduce.call(str, function (a, b) {
    return a === b ? b : false;
  });
}

function getFocusedSelect() {
  var focusedTarget = document.querySelector('.select-target-focused');
  return focusedTarget ? focusedTarget.selectInstance : null;
}

var searchText = '';
var searchTextTimeout = undefined;

document.addEventListener('keypress', function (e) {
  var select = getFocusedSelect();
  if (!select || e.charCode === 0) {
    return;
  }

  if (e.keyCode === SPACE) {
    e.preventDefault();
  }

  clearTimeout(searchTextTimeout);
  searchTextTimeout = setTimeout(function () {
    searchText = '';
  }, 500);

  searchText += String.fromCharCode(e.charCode);

  var options = select.findOptionsByPrefix(searchText);

  if (options.length === 1) {
    // We have an exact match, choose it
    select.selectOption(options[0]);
  }

  if (searchText.length > 1 && isRepeatedChar(searchText)) {
    // They hit the same char over and over, maybe they want to cycle through
    // the options that start with that char
    var repeatedOptions = select.findOptionsByPrefix(searchText[0]);

    if (repeatedOptions.length) {
      var selected = repeatedOptions.indexOf(select.getChosen());

      // Pick the next thing (if something with this prefix wasen't selected
      // we'll end up with the first option)
      selected += 1;
      selected = selected % repeatedOptions.length;

      select.selectOption(repeatedOptions[selected]);
      return;
    }
  }

  if (options.length) {
    // We have multiple things that start with this prefix.  Based on the
    // behavior of native select, this is considered after the repeated case.
    select.selectOption(options[0]);
    return;
  }

  // No match at all, do nothing
});

document.addEventListener('keydown', function (e) {
  // We consider this independently of the keypress handler so we can intercept
  // keys that have built-in functions.
  var select = getFocusedSelect();
  if (!select) {
    return;
  }

  if ([UP, DOWN, ESCAPE].indexOf(e.keyCode) >= 0) {
    e.preventDefault();
  }

  if (select.isOpen()) {
    switch (e.keyCode) {
      case UP:
      case DOWN:
        select.moveHighlight(e.keyCode);
        break;
      case ENTER:
        select.selectHighlightedOption();
        break;
      case ESCAPE:
        select.close();
        select.target.focus();
    }
  } else {
    if ([UP, DOWN, SPACE].indexOf(e.keyCode) >= 0) {
      select.open();
    }
  }
});

var Select = (function (_Evented) {
  _inherits(Select, _Evented);

  function Select(options) {
    _classCallCheck(this, Select);

    _get(Object.getPrototypeOf(Select.prototype), 'constructor', this).call(this, options);
    this.options = extend({}, Select.defaults, options);
    this.select = this.options.el;

    if (typeof this.select.selectInstance !== 'undefined') {
      throw new Error('This element has already been turned into a Select');
    }

    this.update = this.update.bind(this);

    this.setupTarget();
    this.renderTarget();

    this.setupDrop();
    this.renderDrop();

    this.setupSelect();

    this.setupTether();
    this.bindClick();

    this.bindMutationEvents();

    this.value = this.select.value;
  }

  _createClass(Select, [{
    key: 'useNative',
    value: function useNative() {
      var native = this.options.useNative;
      return native === true || _useNative() && native !== false;
    }
  }, {
    key: 'setupTarget',
    value: function setupTarget() {
      var _this = this;

      this.target = document.createElement('a');
      this.target.href = 'javascript:;';

      addClass(this.target, 'select-target');

      var tabIndex = this.select.getAttribute('tabindex') || 0;
      this.target.setAttribute('tabindex', tabIndex);

      if (this.options.className) {
        addClass(this.target, this.options.className);
      }

      this.target.selectInstance = this;

      this.target.addEventListener('click', function () {
        if (!_this.isOpen()) {
          _this.target.focus();
        } else {
          _this.target.blur();
        }
      });

      this.target.addEventListener('focus', function () {
        addClass(_this.target, 'select-target-focused');
      });

      this.target.addEventListener('blur', function (_ref) {
        var relatedTarget = _ref.relatedTarget;

        if (_this.isOpen()) {
          if (relatedTarget && !_this.drop.contains(relatedTarget)) {
            _this.close();
          }
        }

        removeClass(_this.target, 'select-target-focused');
      });

      this.select.parentNode.insertBefore(this.target, this.select.nextSibling);
    }
  }, {
    key: 'setupDrop',
    value: function setupDrop() {
      var _this2 = this;

      this.drop = document.createElement('div');
      addClass(this.drop, 'select');

      if (this.options.className) {
        addClass(this.drop, this.options.className);
      }

      document.body.appendChild(this.drop);

      this.drop.addEventListener('click', function (e) {
        if (hasClass(e.target, 'select-option')) {
          _this2.pickOption(e.target);
        }

        // Built-in selects don't propagate click events in their drop directly
        // to the body, so we don't want to either.
        e.stopPropagation();
      });

      this.drop.addEventListener('mousemove', function (e) {
        if (hasClass(e.target, 'select-option')) {
          _this2.highlightOption(e.target);
        }
      });

      this.content = document.createElement('div');
      addClass(this.content, 'select-content');
      this.drop.appendChild(this.content);
    }
  }, {
    key: 'open',
    value: function open() {
      var _this3 = this;

      if (this.useNative()) {
        this.select.style.display = 'block';

        setTimeout(function () {
          var event = document.createEvent('MouseEvents');
          event.initEvent('mousedown', true, true);
          _this3.select.dispatchEvent(event);
        });

        return;
      }

      setTimeout(function () {
        addClass(_this3.target, 'select-open');
        addClass(_this3.drop, 'select-open');
        _this3.tether.enable();
        _this3.tether.position();
      });

      var selectedOption = this.drop.querySelector('.select-option-selected');

      if (!selectedOption) {
        return;
      }

      this.highlightOption(selectedOption);
      this.scrollDropContentToOption(selectedOption);

      var positionSelectStyle = function positionSelectStyle() {
        if (hasClass(_this3.drop, 'tether-abutted-left') || hasClass(_this3.drop, 'tether-abutted-bottom')) {
          var dropBounds = getBounds(_this3.drop);
          var optionBounds = getBounds(selectedOption);

          var offset = dropBounds.top - (optionBounds.top + optionBounds.height);

          _this3.drop.style.top = (parseFloat(_this3.drop.style.top) || 0) + offset + 'px';
        }
      };

      var alignToHighlighted = this.options.alignToHighlighted;
      var _content = this.content;
      var scrollHeight = _content.scrollHeight;
      var clientHeight = _content.clientHeight;

      if (alignToHighlighted === 'always' || alignToHighlighted === 'auto' && scrollHeight <= clientHeight) {
        setTimeout(function () {
          positionSelectStyle();
        });
      }

      this.trigger('open');
    }
  }, {
    key: 'close',
    value: function close() {
      removeClass(this.target, 'select-open');

      if (this.useNative()) {
        this.select.blur();
      }

      this.tether.disable();

      removeClass(this.drop, 'select-open');

      this.trigger('close');
    }
  }, {
    key: 'toggle',
    value: function toggle() {
      if (this.isOpen()) {
        this.close();
      } else {
        this.open();
      }
    }
  }, {
    key: 'isOpen',
    value: function isOpen() {
      return hasClass(this.drop, 'select-open');
    }
  }, {
    key: 'bindClick',
    value: function bindClick() {
      var _this4 = this;

      var lastScrollY = 0;
      var eventoTouchLanzado = false;

      this.target.addEventListener('touchstart', elementClicked.bind(this));
      this.target.addEventListener('touchend', elementClicked.bind(this));
      this.target.addEventListener('click', elementClicked.bind(this));

      function elementClicked(e) {
        if (e.type === 'click') {
          if (!eventoTouchLanzado) {
            this.toggle();
          }
          eventoTouchLanzado = false;
        }

        if (e.type === 'touchstart') {
          ultimoScrollY = getScrollY(this.options.scrollParent);
          console.log('touchstart scrollY: ' + ultimoScrollY);
        }

        if (e.type === 'touchend') {
          eventoTouchLanzado = true;
          var scrollDiff = ultimoScrollY - getScrollY(this.options.scrollParent);
          if (scrollDiff < 0) scrollDiff = scrollDiff * -1;
          console.log('scrollDiff: ' + scrollDiff);

          // Al pulsar, aunque haya un pequeño scroll lo damos válido como click
          if (scrollDiff <= 5) {
            this.toggle();
          }
        }

        function getScrollY(scrollParent) {
          if (scrollParent) {
            return scrollParent.scrollTop;
          } else {
            return window.scrollY;
          }
        }
      }

      document.addEventListener(clickEvent, function (event) {
        if (!_this4.isOpen()) {
          return;
        }

        // Clicking inside dropdown
        if (event.target === _this4.drop || _this4.drop.contains(event.target)) {
          return;
        }

        // Clicking target
        if (event.target === _this4.target || _this4.target.contains(event.target)) {
          return;
        }

        _this4.close();
      });
    }
  }, {
    key: 'setupTether',
    value: function setupTether() {
      this.tether = new Tether(extend({
        element: this.drop,
        target: this.target,
        attachment: 'top left',
        targetAttachment: 'bottom left',
        classPrefix: 'select',
        constraints: [{
          to: 'window',
          attachment: 'together'
        }]
      }, this.options.tetherOptions));
    }
  }, {
    key: 'renderTarget',
    value: function renderTarget() {
      this.target.innerHTML = '';

      var options = this.select.querySelectorAll('option');
      for (var i = 0; i < options.length; ++i) {
        var option = options[i];
        if (option.selected) {
          this.target.innerHTML = option.innerHTML;
          break;
        }
      }

      this.target.appendChild(document.createElement('b'));
    }
  }, {
    key: 'renderDrop',
    value: function renderDrop() {
      var optionList = document.createElement('ul');
      addClass(optionList, 'select-options');

      var options = this.select.querySelectorAll('option');
      for (var i = 0; i < options.length; ++i) {
        var el = options[i];
        var option = document.createElement('li');
        addClass(option, 'select-option');

        option.setAttribute('data-value', el.value);
        option.innerHTML = el.innerHTML;

        if (el.selected) {
          addClass(option, 'select-option-selected');
        }

        optionList.appendChild(option);
      }

      this.content.innerHTML = '';
      this.content.appendChild(optionList);
    }
  }, {
    key: 'update',
    value: function update() {
      this.renderDrop();
      this.renderTarget();
    }
  }, {
    key: 'setupSelect',
    value: function setupSelect() {
      this.select.selectInstance = this;

      addClass(this.select, 'select-select');

      this.select.addEventListener('change', this.update);
    }
  }, {
    key: 'bindMutationEvents',
    value: function bindMutationEvents() {
      if (typeof window.MutationObserver !== 'undefined') {
        this.observer = new MutationObserver(this.update);
        this.observer.observe(this.select, {
          childList: true,
          attributes: true,
          characterData: true,
          subtree: true
        });
      } else {
        this.select.addEventListener('DOMSubtreeModified', this.update);
      }
    }
  }, {
    key: 'findOptionsByPrefix',
    value: function findOptionsByPrefix(text) {
      var options = this.drop.querySelectorAll('.select-option');

      text = text.toLowerCase();

      return Array.prototype.filter.call(options, function (option) {
        return option.innerHTML.toLowerCase().substr(0, text.length) === text;
      });
    }
  }, {
    key: 'findOptionsByValue',
    value: function findOptionsByValue(val) {
      var options = this.drop.querySelectorAll('.select-option');

      return Array.prototype.filter.call(options, function (option) {
        return option.getAttribute('data-value') === val;
      });
    }
  }, {
    key: 'getChosen',
    value: function getChosen() {
      if (this.isOpen()) {
        return this.drop.querySelector('.select-option-highlight');
      }
      return this.drop.querySelector('.select-option-selected');
    }
  }, {
    key: 'selectOption',
    value: function selectOption(option) {
      if (this.isOpen()) {
        this.highlightOption(option);
        this.scrollDropContentToOption(option);
      } else {
        this.pickOption(option, false);
      }
    }
  }, {
    key: 'resetSelection',
    value: function resetSelection() {
      this.selectOption(this.drop.querySelector('.select-option'));
    }
  }, {
    key: 'highlightOption',
    value: function highlightOption(option) {
      var highlighted = this.drop.querySelector('.select-option-highlight');
      if (highlighted) {
        removeClass(highlighted, 'select-option-highlight');
      }

      addClass(option, 'select-option-highlight');

      this.trigger('highlight', { option: option });
    }
  }, {
    key: 'moveHighlight',
    value: function moveHighlight(directionKeyCode) {
      var highlighted = this.drop.querySelector('.select-option-highlight');
      if (!highlighted) {
        this.highlightOption(this.drop.querySelector('.select-option'));
        return;
      }

      var options = this.drop.querySelectorAll('.select-option');

      var highlightedIndex = Array.prototype.indexOf.call(options, highlighted);
      if (!(highlightedIndex >= 0)) {
        return;
      }

      if (directionKeyCode === UP) {
        highlightedIndex -= 1;
      } else {
        highlightedIndex += 1;
      }

      if (highlightedIndex < 0 || highlightedIndex >= options.length) {
        return;
      }

      var newHighlight = options[highlightedIndex];

      this.highlightOption(newHighlight);
      this.scrollDropContentToOption(newHighlight);
    }
  }, {
    key: 'scrollDropContentToOption',
    value: function scrollDropContentToOption(option) {
      var _content2 = this.content;
      var scrollHeight = _content2.scrollHeight;
      var clientHeight = _content2.clientHeight;
      var scrollTop = _content2.scrollTop;

      if (scrollHeight > clientHeight) {
        var contentBounds = getBounds(this.content);
        var optionBounds = getBounds(option);

        this.content.scrollTop = optionBounds.top - (contentBounds.top - scrollTop);
      }
    }
  }, {
    key: 'selectHighlightedOption',
    value: function selectHighlightedOption() {
      this.pickOption(this.drop.querySelector('.select-option-highlight'));
    }
  }, {
    key: 'pickOption',
    value: function pickOption(option) {
      var _this5 = this;

      var close = arguments.length <= 1 || arguments[1] === undefined ? true : arguments[1];

      this.value = this.select.value = option.getAttribute('data-value');
      this.triggerChange();

      if (close) {
        setTimeout(function () {
          _this5.close();
          _this5.target.focus();
        });
      }
    }
  }, {
    key: 'triggerChange',
    value: function triggerChange() {
      var event = document.createEvent("HTMLEvents");
      event.initEvent("change", true, false);
      this.select.dispatchEvent(event);

      this.trigger('change', { value: this.select.value });
    }
  }, {
    key: 'change',
    value: function change(val) {
      var options = this.findOptionsByValue(val);

      if (!options.length) {
        throw new Error('Select Error: An option with the value "' + val + '" doesn\'t exist');
      }

      this.pickOption(options[0], false);
    }
  }]);

  return Select;
})(Evented);

Select.defaults = {
  alignToHighlighed: 'auto',
  className: 'select-theme-default'
};

Select.init = function () {
  var options = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      return Select.init(options);
    });
    return;
  }

  if (typeof options.selector === 'undefined') {
    options.selector = 'select';
  }

  var selectors = document.querySelectorAll(options.selector);
  for (var i = 0; i < selectors.length; ++i) {
    var el = selectors[i];
    if (!el.selectInstance) {
      new Select(extend({ el: el }, options));
    }
  }
};
!function(t,e){"function"==typeof define&&define.amd?define(["tether"],e):"object"==typeof exports?module.exports=e(require("tether")):t.Drop=e(t.Tether)}(this,function(t){"use strict";function e(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function n(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}function o(t){var e=t.split(" "),n=a(e,2),o=n[0],i=n[1];if(["left","right"].indexOf(o)>=0){var s=[i,o];o=s[0],i=s[1]}return[o,i].join(" ")}function i(t,e){for(var n=void 0,o=[];-1!==(n=t.indexOf(e));)o.push(t.splice(n,1));return o}function s(){var a=arguments.length<=0||void 0===arguments[0]?{}:arguments[0],h=function(){for(var t=arguments.length,e=Array(t),n=0;t>n;n++)e[n]=arguments[n];return new(r.apply(b,[null].concat(e)))};p(h,{createContext:s,drops:[],defaults:{}});var g={classPrefix:"drop",defaults:{position:"bottom left",openOn:"click",beforeClose:null,constrainToScrollParent:!0,constrainToWindow:!0,classes:"",remove:!1,openDelay:0,closeDelay:50,focusDelay:null,blurDelay:null,hoverOpenDelay:null,hoverCloseDelay:null,tetherOptions:{}}};p(h,g,a),p(h.defaults,g.defaults,a.defaults),"undefined"==typeof x[h.classPrefix]&&(x[h.classPrefix]=[]),h.updateBodyClasses=function(){for(var t=!1,e=x[h.classPrefix],n=e.length,o=0;n>o;++o)if(e[o].isOpened()){t=!0;break}t?d(document.body,h.classPrefix+"-open"):c(document.body,h.classPrefix+"-open")};var b=function(s){function r(t){if(e(this,r),u(Object.getPrototypeOf(r.prototype),"constructor",this).call(this),this.options=p({},h.defaults,t),this.target=this.options.target,"undefined"==typeof this.target)throw new Error("Drop Error: You must provide a target.");var n="data-"+h.classPrefix,o=this.target.getAttribute(n);o&&null==this.options.content&&(this.options.content=o);for(var i=["position","openOn"],s=0;s<i.length;++s){var a=this.target.getAttribute(n+"-"+i[s]);a&&null==this.options[i[s]]&&(this.options[i[s]]=a)}this.options.classes&&this.options.addTargetClasses!==!1&&d(this.target,this.options.classes),h.drops.push(this),x[h.classPrefix].push(this),this._boundEvents=[],this.bindMethods(),this.setupElements(),this.setupEvents(),this.setupTether()}return n(r,s),l(r,[{key:"_on",value:function(t,e,n){this._boundEvents.push({element:t,event:e,handler:n}),t.addEventListener(e,n)}},{key:"bindMethods",value:function(){this.transitionEndHandler=this._transitionEndHandler.bind(this)}},{key:"setupElements",value:function(){var t=this;if(this.drop=document.createElement("div"),d(this.drop,h.classPrefix),this.options.classes&&d(this.drop,this.options.classes),this.content=document.createElement("div"),d(this.content,h.classPrefix+"-content"),"function"==typeof this.options.content){var e=function(){var e=t.options.content.call(t,t);if("string"==typeof e)t.content.innerHTML=e;else{if("object"!=typeof e)throw new Error("Drop Error: Content function should return a string or HTMLElement.");t.content.innerHTML="",t.content.appendChild(e)}};e(),this.on("open",e.bind(this))}else"object"==typeof this.options.content?this.content.appendChild(this.options.content):this.content.innerHTML=this.options.content;this.drop.appendChild(this.content)}},{key:"setupTether",value:function(){var e=this.options.position.split(" ");e[0]=E[e[0]],e=e.join(" ");var n=[];this.options.constrainToScrollParent?n.push({to:"scrollParent",pin:"top, bottom",attachment:"together none"}):n.push({to:"scrollParent"}),this.options.constrainToWindow!==!1?n.push({to:"window",attachment:"together"}):n.push({to:"window"});var i={element:this.drop,target:this.target,attachment:o(e),targetAttachment:o(this.options.position),classPrefix:h.classPrefix,offset:"0 0",targetOffset:"0 0",enabled:!1,constraints:n,addTargetClasses:this.options.addTargetClasses};this.options.tetherOptions!==!1&&(this.tether=new t(p({},i,this.options.tetherOptions)))}},{key:"setupEvents",value:function(){var t=this;if(this.options.openOn){if("always"===this.options.openOn)return void setTimeout(this.open.bind(this));var e=this.options.openOn.split(" ");if(e.indexOf("click")>=0)for(var n=function(e){t.toggle(e),e.preventDefault()},o=function(e){t.isOpened()&&(e.target===t.drop||t.drop.contains(e.target)||e.target===t.target||t.target.contains(e.target)||t.close(e))},i=0;i<y.length;++i){var s=y[i];this._on(this.target,s,n),this._on(document,s,o)}var r=null,a=null,l=function(e){null!==a?clearTimeout(a):r=setTimeout(function(){t.open(e),r=null},("focus"===e.type?t.options.focusDelay:t.options.hoverOpenDelay)||t.options.openDelay)},u=function(e){null!==r?clearTimeout(r):a=setTimeout(function(){t.close(e),a=null},("blur"===e.type?t.options.blurDelay:t.options.hoverCloseDelay)||t.options.closeDelay)};e.indexOf("hover")>=0&&(this._on(this.target,"mouseover",l),this._on(this.drop,"mouseover",l),this._on(this.target,"mouseout",u),this._on(this.drop,"mouseout",u)),e.indexOf("focus")>=0&&(this._on(this.target,"focus",l),this._on(this.drop,"focus",l),this._on(this.target,"blur",u),this._on(this.drop,"blur",u))}}},{key:"isOpened",value:function(){return this.drop?f(this.drop,h.classPrefix+"-open"):void 0}},{key:"toggle",value:function(t){this.isOpened()?this.close(t):this.open(t)}},{key:"open",value:function(t){var e=this;this.isOpened()||(this.drop.parentNode||document.body.appendChild(this.drop),"undefined"!=typeof this.tether&&this.tether.enable(),d(this.drop,h.classPrefix+"-open"),d(this.drop,h.classPrefix+"-open-transitionend"),setTimeout(function(){e.drop&&d(e.drop,h.classPrefix+"-after-open")}),"undefined"!=typeof this.tether&&this.tether.position(),this.trigger("open"),h.updateBodyClasses())}},{key:"_transitionEndHandler",value:function(t){t.target===t.currentTarget&&(f(this.drop,h.classPrefix+"-open")||c(this.drop,h.classPrefix+"-open-transitionend"),this.drop.removeEventListener(m,this.transitionEndHandler))}},{key:"beforeCloseHandler",value:function(t){var e=!0;return this.isClosing||"function"!=typeof this.options.beforeClose||(this.isClosing=!0,e=this.options.beforeClose(t,this)!==!1),this.isClosing=!1,e}},{key:"close",value:function(t){this.isOpened()&&this.beforeCloseHandler(t)&&(c(this.drop,h.classPrefix+"-open"),c(this.drop,h.classPrefix+"-after-open"),this.drop.addEventListener(m,this.transitionEndHandler),this.trigger("close"),"undefined"!=typeof this.tether&&this.tether.disable(),h.updateBodyClasses(),this.options.remove&&this.remove(t))}},{key:"remove",value:function(t){this.close(t),this.drop.parentNode&&this.drop.parentNode.removeChild(this.drop)}},{key:"position",value:function(){this.isOpened()&&"undefined"!=typeof this.tether&&this.tether.position()}},{key:"destroy",value:function(){this.remove(),"undefined"!=typeof this.tether&&this.tether.destroy();for(var t=0;t<this._boundEvents.length;++t){var e=this._boundEvents[t],n=e.element,o=e.event,s=e.handler;n.removeEventListener(o,s)}this._boundEvents=[],this.tether=null,this.drop=null,this.content=null,this.target=null,i(x[h.classPrefix],this),i(h.drops,this)}}]),r}(v);return h}var r=Function.prototype.bind,a=function(){function t(t,e){var n=[],o=!0,i=!1,s=void 0;try{for(var r,a=t[Symbol.iterator]();!(o=(r=a.next()).done)&&(n.push(r.value),!e||n.length!==e);o=!0);}catch(l){i=!0,s=l}finally{try{!o&&a["return"]&&a["return"]()}finally{if(i)throw s}}return n}return function(e,n){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return t(e,n);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}(),l=function(){function t(t,e){for(var n=0;n<e.length;n++){var o=e[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}return function(e,n,o){return n&&t(e.prototype,n),o&&t(e,o),e}}(),u=function(t,e,n){for(var o=!0;o;){var i=t,s=e,r=n;o=!1,null===i&&(i=Function.prototype);var a=Object.getOwnPropertyDescriptor(i,s);if(void 0!==a){if("value"in a)return a.value;var l=a.get;if(void 0===l)return;return l.call(r)}var u=Object.getPrototypeOf(i);if(null===u)return;t=u,e=s,n=r,o=!0,a=u=void 0}},h=t.Utils,p=h.extend,d=h.addClass,c=h.removeClass,f=h.hasClass,v=h.Evented,y=["click"];"ontouchstart"in document.documentElement&&y.push("touchstart");var g={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"otransitionend",transition:"transitionend"},m="";for(var b in g)if({}.hasOwnProperty.call(g,b)){var O=document.createElement("p");"undefined"!=typeof O.style[b]&&(m=g[b])}var E={left:"right",right:"left",top:"bottom",bottom:"top",middle:"middle",center:"center"},x={},P=s();return document.addEventListener("DOMContentLoaded",function(){P.updateBodyClasses()}),P});
(function(root,factory){if(typeof exports==="object"&&typeof module==="object")module.exports=factory();else if(typeof define==="function"&&define.amd)define("EventBus",[],factory);else if(typeof exports==="object")exports["EventBus"]=factory();else root["EventBus"]=factory()})(this,function(){var EventBusClass={};EventBusClass=function(){this.listeners={}};EventBusClass.prototype={addEventListener:function(type,callback,scope){var args=[];var numOfArgs=arguments.length;for(var i=0;i<numOfArgs;i++){args.push(arguments[i])}args=args.length>3?args.splice(3,args.length-1):[];if(typeof this.listeners[type]!="undefined"){this.listeners[type].push({scope:scope,callback:callback,args:args})}else{this.listeners[type]=[{scope:scope,callback:callback,args:args}]}},removeEventListener:function(type,callback,scope){if(typeof this.listeners[type]!="undefined"){var numOfCallbacks=this.listeners[type].length;var newArray=[];for(var i=0;i<numOfCallbacks;i++){var listener=this.listeners[type][i];if(listener.scope==scope&&listener.callback==callback){}else{newArray.push(listener)}}this.listeners[type]=newArray}},hasEventListener:function(type,callback,scope){if(typeof this.listeners[type]!="undefined"){var numOfCallbacks=this.listeners[type].length;if(callback===undefined&&scope===undefined){return numOfCallbacks>0}for(var i=0;i<numOfCallbacks;i++){var listener=this.listeners[type][i];if((scope?listener.scope==scope:true)&&listener.callback==callback){return true}}}return false},dispatch:function(type,target){var numOfListeners=0;var event={type:type,target:target};var args=[];var numOfArgs=arguments.length;for(var i=0;i<numOfArgs;i++){args.push(arguments[i])}args=args.length>2?args.splice(2,args.length-1):[];args=[event].concat(args);if(typeof this.listeners[type]!="undefined"){var numOfCallbacks=this.listeners[type].length;for(var i=0;i<numOfCallbacks;i++){var listener=this.listeners[type][i];if(listener&&listener.callback){var concatArgs=args.concat(listener.args);listener.callback.apply(listener.scope,concatArgs);numOfListeners+=1}}}},getEvents:function(){var str="";for(var type in this.listeners){var numOfCallbacks=this.listeners[type].length;for(var i=0;i<numOfCallbacks;i++){var listener=this.listeners[type][i];str+=listener.scope&&listener.scope.className?listener.scope.className:"anonymous";str+=" listen for '"+type+"'\n"}}return str}};var EventBus=new EventBusClass;return EventBus});
/* perfect-scrollbar v0.6.12 */
!function t(e,n,r){function o(l,a){if(!n[l]){if(!e[l]){var s="function"==typeof require&&require;if(!a&&s)return s(l,!0);if(i)return i(l,!0);var c=new Error("Cannot find module '"+l+"'");throw c.code="MODULE_NOT_FOUND",c}var u=n[l]={exports:{}};e[l][0].call(u.exports,function(t){var n=e[l][1][t];return o(n?n:t)},u,u.exports,t,e,n,r)}return n[l].exports}for(var i="function"==typeof require&&require,l=0;l<r.length;l++)o(r[l]);return o}({1:[function(t,e,n){"use strict";function r(t){t.fn.perfectScrollbar=function(t){return this.each(function(){if("object"==typeof t||"undefined"==typeof t){var e=t;i.get(this)||o.initialize(this,e)}else{var n=t;"update"===n?o.update(this):"destroy"===n&&o.destroy(this)}})}}var o=t("../main"),i=t("../plugin/instances");if("function"==typeof define&&define.amd)define(["jquery"],r);else{var l=window.jQuery?window.jQuery:window.$;"undefined"!=typeof l&&r(l)}e.exports=r},{"../main":7,"../plugin/instances":18}],2:[function(t,e,n){"use strict";function r(t,e){var n=t.className.split(" ");n.indexOf(e)<0&&n.push(e),t.className=n.join(" ")}function o(t,e){var n=t.className.split(" "),r=n.indexOf(e);r>=0&&n.splice(r,1),t.className=n.join(" ")}n.add=function(t,e){t.classList?t.classList.add(e):r(t,e)},n.remove=function(t,e){t.classList?t.classList.remove(e):o(t,e)},n.list=function(t){return t.classList?Array.prototype.slice.apply(t.classList):t.className.split(" ")}},{}],3:[function(t,e,n){"use strict";function r(t,e){return window.getComputedStyle(t)[e]}function o(t,e,n){return"number"==typeof n&&(n=n.toString()+"px"),t.style[e]=n,t}function i(t,e){for(var n in e){var r=e[n];"number"==typeof r&&(r=r.toString()+"px"),t.style[n]=r}return t}var l={};l.e=function(t,e){var n=document.createElement(t);return n.className=e,n},l.appendTo=function(t,e){return e.appendChild(t),t},l.css=function(t,e,n){return"object"==typeof e?i(t,e):"undefined"==typeof n?r(t,e):o(t,e,n)},l.matches=function(t,e){return"undefined"!=typeof t.matches?t.matches(e):"undefined"!=typeof t.matchesSelector?t.matchesSelector(e):"undefined"!=typeof t.webkitMatchesSelector?t.webkitMatchesSelector(e):"undefined"!=typeof t.mozMatchesSelector?t.mozMatchesSelector(e):"undefined"!=typeof t.msMatchesSelector?t.msMatchesSelector(e):void 0},l.remove=function(t){"undefined"!=typeof t.remove?t.remove():t.parentNode&&t.parentNode.removeChild(t)},l.queryChildren=function(t,e){return Array.prototype.filter.call(t.childNodes,function(t){return l.matches(t,e)})},e.exports=l},{}],4:[function(t,e,n){"use strict";var r=function(t){this.element=t,this.events={}};r.prototype.bind=function(t,e){"undefined"==typeof this.events[t]&&(this.events[t]=[]),this.events[t].push(e),this.element.addEventListener(t,e,!1)},r.prototype.unbind=function(t,e){var n="undefined"!=typeof e;this.events[t]=this.events[t].filter(function(r){return n&&r!==e?!0:(this.element.removeEventListener(t,r,!1),!1)},this)},r.prototype.unbindAll=function(){for(var t in this.events)this.unbind(t)};var o=function(){this.eventElements=[]};o.prototype.eventElement=function(t){var e=this.eventElements.filter(function(e){return e.element===t})[0];return"undefined"==typeof e&&(e=new r(t),this.eventElements.push(e)),e},o.prototype.bind=function(t,e,n){this.eventElement(t).bind(e,n)},o.prototype.unbind=function(t,e,n){this.eventElement(t).unbind(e,n)},o.prototype.unbindAll=function(){for(var t=0;t<this.eventElements.length;t++)this.eventElements[t].unbindAll()},o.prototype.once=function(t,e,n){var r=this.eventElement(t),o=function(t){r.unbind(e,o),n(t)};r.bind(e,o)},e.exports=o},{}],5:[function(t,e,n){"use strict";e.exports=function(){function t(){return Math.floor(65536*(1+Math.random())).toString(16).substring(1)}return function(){return t()+t()+"-"+t()+"-"+t()+"-"+t()+"-"+t()+t()+t()}}()},{}],6:[function(t,e,n){"use strict";var r=t("./class"),o=t("./dom"),i=n.toInt=function(t){return parseInt(t,10)||0},l=n.clone=function(t){if(null===t)return null;if(t.constructor===Array)return t.map(l);if("object"==typeof t){var e={};for(var n in t)e[n]=l(t[n]);return e}return t};n.extend=function(t,e){var n=l(t);for(var r in e)n[r]=l(e[r]);return n},n.isEditable=function(t){return o.matches(t,"input,[contenteditable]")||o.matches(t,"select,[contenteditable]")||o.matches(t,"textarea,[contenteditable]")||o.matches(t,"button,[contenteditable]")},n.removePsClasses=function(t){for(var e=r.list(t),n=0;n<e.length;n++){var o=e[n];0===o.indexOf("ps-")&&r.remove(t,o)}},n.outerWidth=function(t){return i(o.css(t,"width"))+i(o.css(t,"paddingLeft"))+i(o.css(t,"paddingRight"))+i(o.css(t,"borderLeftWidth"))+i(o.css(t,"borderRightWidth"))},n.startScrolling=function(t,e){r.add(t,"ps-in-scrolling"),"undefined"!=typeof e?r.add(t,"ps-"+e):(r.add(t,"ps-x"),r.add(t,"ps-y"))},n.stopScrolling=function(t,e){r.remove(t,"ps-in-scrolling"),"undefined"!=typeof e?r.remove(t,"ps-"+e):(r.remove(t,"ps-x"),r.remove(t,"ps-y"))},n.env={isWebKit:"WebkitAppearance"in document.documentElement.style,supportsTouch:"ontouchstart"in window||window.DocumentTouch&&document instanceof window.DocumentTouch,supportsIePointer:null!==window.navigator.msMaxTouchPoints}},{"./class":2,"./dom":3}],7:[function(t,e,n){"use strict";var r=t("./plugin/destroy"),o=t("./plugin/initialize"),i=t("./plugin/update");e.exports={initialize:o,update:i,destroy:r}},{"./plugin/destroy":9,"./plugin/initialize":17,"./plugin/update":21}],8:[function(t,e,n){"use strict";e.exports={handlers:["click-rail","drag-scrollbar","keyboard","wheel","touch"],maxScrollbarLength:null,minScrollbarLength:null,scrollXMarginOffset:0,scrollYMarginOffset:0,stopPropagationOnClick:!0,suppressScrollX:!1,suppressScrollY:!1,swipePropagation:!0,useBothWheelAxes:!1,wheelPropagation:!1,wheelSpeed:1,theme:"default"}},{}],9:[function(t,e,n){"use strict";var r=t("../lib/helper"),o=t("../lib/dom"),i=t("./instances");e.exports=function(t){var e=i.get(t);e&&(e.event.unbindAll(),o.remove(e.scrollbarX),o.remove(e.scrollbarY),o.remove(e.scrollbarXRail),o.remove(e.scrollbarYRail),r.removePsClasses(t),i.remove(t))}},{"../lib/dom":3,"../lib/helper":6,"./instances":18}],10:[function(t,e,n){"use strict";function r(t,e){function n(t){return t.getBoundingClientRect()}var r=function(t){t.stopPropagation()};e.settings.stopPropagationOnClick&&e.event.bind(e.scrollbarY,"click",r),e.event.bind(e.scrollbarYRail,"click",function(r){var i=o.toInt(e.scrollbarYHeight/2),s=e.railYRatio*(r.pageY-window.pageYOffset-n(e.scrollbarYRail).top-i),c=e.railYRatio*(e.railYHeight-e.scrollbarYHeight),u=s/c;0>u?u=0:u>1&&(u=1),a(t,"top",(e.contentHeight-e.containerHeight)*u),l(t),r.stopPropagation()}),e.settings.stopPropagationOnClick&&e.event.bind(e.scrollbarX,"click",r),e.event.bind(e.scrollbarXRail,"click",function(r){var i=o.toInt(e.scrollbarXWidth/2),s=e.railXRatio*(r.pageX-window.pageXOffset-n(e.scrollbarXRail).left-i),c=e.railXRatio*(e.railXWidth-e.scrollbarXWidth),u=s/c;0>u?u=0:u>1&&(u=1),a(t,"left",(e.contentWidth-e.containerWidth)*u-e.negativeScrollAdjustment),l(t),r.stopPropagation()})}var o=t("../../lib/helper"),i=t("../instances"),l=t("../update-geometry"),a=t("../update-scroll");e.exports=function(t){var e=i.get(t);r(t,e)}},{"../../lib/helper":6,"../instances":18,"../update-geometry":19,"../update-scroll":20}],11:[function(t,e,n){"use strict";function r(t,e){function n(n){var o=r+n*e.railXRatio,l=Math.max(0,e.scrollbarXRail.getBoundingClientRect().left)+e.railXRatio*(e.railXWidth-e.scrollbarXWidth);0>o?e.scrollbarXLeft=0:o>l?e.scrollbarXLeft=l:e.scrollbarXLeft=o;var a=i.toInt(e.scrollbarXLeft*(e.contentWidth-e.containerWidth)/(e.containerWidth-e.railXRatio*e.scrollbarXWidth))-e.negativeScrollAdjustment;c(t,"left",a)}var r=null,o=null,a=function(e){n(e.pageX-o),s(t),e.stopPropagation(),e.preventDefault()},u=function(){i.stopScrolling(t,"x"),e.event.unbind(e.ownerDocument,"mousemove",a)};e.event.bind(e.scrollbarX,"mousedown",function(n){o=n.pageX,r=i.toInt(l.css(e.scrollbarX,"left"))*e.railXRatio,i.startScrolling(t,"x"),e.event.bind(e.ownerDocument,"mousemove",a),e.event.once(e.ownerDocument,"mouseup",u),n.stopPropagation(),n.preventDefault()})}function o(t,e){function n(n){var o=r+n*e.railYRatio,l=Math.max(0,e.scrollbarYRail.getBoundingClientRect().top)+e.railYRatio*(e.railYHeight-e.scrollbarYHeight);0>o?e.scrollbarYTop=0:o>l?e.scrollbarYTop=l:e.scrollbarYTop=o;var a=i.toInt(e.scrollbarYTop*(e.contentHeight-e.containerHeight)/(e.containerHeight-e.railYRatio*e.scrollbarYHeight));c(t,"top",a)}var r=null,o=null,a=function(e){n(e.pageY-o),s(t),e.stopPropagation(),e.preventDefault()},u=function(){i.stopScrolling(t,"y"),e.event.unbind(e.ownerDocument,"mousemove",a)};e.event.bind(e.scrollbarY,"mousedown",function(n){o=n.pageY,r=i.toInt(l.css(e.scrollbarY,"top"))*e.railYRatio,i.startScrolling(t,"y"),e.event.bind(e.ownerDocument,"mousemove",a),e.event.once(e.ownerDocument,"mouseup",u),n.stopPropagation(),n.preventDefault()})}var i=t("../../lib/helper"),l=t("../../lib/dom"),a=t("../instances"),s=t("../update-geometry"),c=t("../update-scroll");e.exports=function(t){var e=a.get(t);r(t,e),o(t,e)}},{"../../lib/dom":3,"../../lib/helper":6,"../instances":18,"../update-geometry":19,"../update-scroll":20}],12:[function(t,e,n){"use strict";function r(t,e){function n(n,r){var o=t.scrollTop;if(0===n){if(!e.scrollbarYActive)return!1;if(0===o&&r>0||o>=e.contentHeight-e.containerHeight&&0>r)return!e.settings.wheelPropagation}var i=t.scrollLeft;if(0===r){if(!e.scrollbarXActive)return!1;if(0===i&&0>n||i>=e.contentWidth-e.containerWidth&&n>0)return!e.settings.wheelPropagation}return!0}var r=!1;e.event.bind(t,"mouseenter",function(){r=!0}),e.event.bind(t,"mouseleave",function(){r=!1});var l=!1;e.event.bind(e.ownerDocument,"keydown",function(c){if(!(c.isDefaultPrevented&&c.isDefaultPrevented()||c.defaultPrevented)){var u=i.matches(e.scrollbarX,":focus")||i.matches(e.scrollbarY,":focus");if(r||u){var d=document.activeElement?document.activeElement:e.ownerDocument.activeElement;if(d){if("IFRAME"===d.tagName)d=d.contentDocument.activeElement;else for(;d.shadowRoot;)d=d.shadowRoot.activeElement;if(o.isEditable(d))return}var p=0,f=0;switch(c.which){case 37:p=-30;break;case 38:f=30;break;case 39:p=30;break;case 40:f=-30;break;case 33:f=90;break;case 32:f=c.shiftKey?90:-90;break;case 34:f=-90;break;case 35:f=c.ctrlKey?-e.contentHeight:-e.containerHeight;break;case 36:f=c.ctrlKey?t.scrollTop:e.containerHeight;break;default:return}s(t,"top",t.scrollTop-f),s(t,"left",t.scrollLeft+p),a(t),l=n(p,f),l&&c.preventDefault()}}})}var o=t("../../lib/helper"),i=t("../../lib/dom"),l=t("../instances"),a=t("../update-geometry"),s=t("../update-scroll");e.exports=function(t){var e=l.get(t);r(t,e)}},{"../../lib/dom":3,"../../lib/helper":6,"../instances":18,"../update-geometry":19,"../update-scroll":20}],13:[function(t,e,n){"use strict";function r(t,e){function n(n,r){var o=t.scrollTop;if(0===n){if(!e.scrollbarYActive)return!1;if(0===o&&r>0||o>=e.contentHeight-e.containerHeight&&0>r)return!e.settings.wheelPropagation}var i=t.scrollLeft;if(0===r){if(!e.scrollbarXActive)return!1;if(0===i&&0>n||i>=e.contentWidth-e.containerWidth&&n>0)return!e.settings.wheelPropagation}return!0}function r(t){var e=t.deltaX,n=-1*t.deltaY;return"undefined"!=typeof e&&"undefined"!=typeof n||(e=-1*t.wheelDeltaX/6,n=t.wheelDeltaY/6),t.deltaMode&&1===t.deltaMode&&(e*=10,n*=10),e!==e&&n!==n&&(e=0,n=t.wheelDelta),[e,n]}function o(e,n){var r=t.querySelector("textarea:hover, select[multiple]:hover, .ps-child:hover");if(r){if("TEXTAREA"!==r.tagName&&!window.getComputedStyle(r).overflow.match(/(scroll|auto)/))return!1;var o=r.scrollHeight-r.clientHeight;if(o>0&&!(0===r.scrollTop&&n>0||r.scrollTop===o&&0>n))return!0;var i=r.scrollLeft-r.clientWidth;if(i>0&&!(0===r.scrollLeft&&0>e||r.scrollLeft===i&&e>0))return!0}return!1}function a(a){var c=r(a),u=c[0],d=c[1];o(u,d)||(s=!1,e.settings.useBothWheelAxes?e.scrollbarYActive&&!e.scrollbarXActive?(d?l(t,"top",t.scrollTop-d*e.settings.wheelSpeed):l(t,"top",t.scrollTop+u*e.settings.wheelSpeed),s=!0):e.scrollbarXActive&&!e.scrollbarYActive&&(u?l(t,"left",t.scrollLeft+u*e.settings.wheelSpeed):l(t,"left",t.scrollLeft-d*e.settings.wheelSpeed),s=!0):(l(t,"top",t.scrollTop-d*e.settings.wheelSpeed),l(t,"left",t.scrollLeft+u*e.settings.wheelSpeed)),i(t),s=s||n(u,d),s&&(a.stopPropagation(),a.preventDefault()))}var s=!1;"undefined"!=typeof window.onwheel?e.event.bind(t,"wheel",a):"undefined"!=typeof window.onmousewheel&&e.event.bind(t,"mousewheel",a)}var o=t("../instances"),i=t("../update-geometry"),l=t("../update-scroll");e.exports=function(t){var e=o.get(t);r(t,e)}},{"../instances":18,"../update-geometry":19,"../update-scroll":20}],14:[function(t,e,n){"use strict";function r(t,e){e.event.bind(t,"scroll",function(){i(t)})}var o=t("../instances"),i=t("../update-geometry");e.exports=function(t){var e=o.get(t);r(t,e)}},{"../instances":18,"../update-geometry":19}],15:[function(t,e,n){"use strict";function r(t,e){function n(){var t=window.getSelection?window.getSelection():document.getSelection?document.getSelection():"";return 0===t.toString().length?null:t.getRangeAt(0).commonAncestorContainer}function r(){c||(c=setInterval(function(){return i.get(t)?(a(t,"top",t.scrollTop+u.top),a(t,"left",t.scrollLeft+u.left),void l(t)):void clearInterval(c)},50))}function s(){c&&(clearInterval(c),c=null),o.stopScrolling(t)}var c=null,u={top:0,left:0},d=!1;e.event.bind(e.ownerDocument,"selectionchange",function(){t.contains(n())?d=!0:(d=!1,s())}),e.event.bind(window,"mouseup",function(){d&&(d=!1,s())}),e.event.bind(window,"mousemove",function(e){if(d){var n={x:e.pageX,y:e.pageY},i={left:t.offsetLeft,right:t.offsetLeft+t.offsetWidth,top:t.offsetTop,bottom:t.offsetTop+t.offsetHeight};n.x<i.left+3?(u.left=-5,o.startScrolling(t,"x")):n.x>i.right-3?(u.left=5,o.startScrolling(t,"x")):u.left=0,n.y<i.top+3?(i.top+3-n.y<5?u.top=-5:u.top=-20,o.startScrolling(t,"y")):n.y>i.bottom-3?(n.y-i.bottom+3<5?u.top=5:u.top=20,o.startScrolling(t,"y")):u.top=0,0===u.top&&0===u.left?s():r()}})}var o=t("../../lib/helper"),i=t("../instances"),l=t("../update-geometry"),a=t("../update-scroll");e.exports=function(t){var e=i.get(t);r(t,e)}},{"../../lib/helper":6,"../instances":18,"../update-geometry":19,"../update-scroll":20}],16:[function(t,e,n){"use strict";function r(t,e,n,r){function o(n,r){var o=t.scrollTop,i=t.scrollLeft,l=Math.abs(n),a=Math.abs(r);if(a>l){if(0>r&&o===e.contentHeight-e.containerHeight||r>0&&0===o)return!e.settings.swipePropagation}else if(l>a&&(0>n&&i===e.contentWidth-e.containerWidth||n>0&&0===i))return!e.settings.swipePropagation;return!0}function s(e,n){a(t,"top",t.scrollTop-n),a(t,"left",t.scrollLeft-e),l(t)}function c(){Y=!0}function u(){Y=!1}function d(t){return t.targetTouches?t.targetTouches[0]:t}function p(t){return t.targetTouches&&1===t.targetTouches.length?!0:!(!t.pointerType||"mouse"===t.pointerType||t.pointerType===t.MSPOINTER_TYPE_MOUSE)}function f(t){if(p(t)){w=!0;var e=d(t);v.pageX=e.pageX,v.pageY=e.pageY,g=(new Date).getTime(),null!==y&&clearInterval(y),t.stopPropagation()}}function h(t){if(!w&&e.settings.swipePropagation&&f(t),!Y&&w&&p(t)){var n=d(t),r={pageX:n.pageX,pageY:n.pageY},i=r.pageX-v.pageX,l=r.pageY-v.pageY;s(i,l),v=r;var a=(new Date).getTime(),c=a-g;c>0&&(m.x=i/c,m.y=l/c,g=a),o(i,l)&&(t.stopPropagation(),t.preventDefault())}}function b(){!Y&&w&&(w=!1,clearInterval(y),y=setInterval(function(){return i.get(t)?Math.abs(m.x)<.01&&Math.abs(m.y)<.01?void clearInterval(y):(s(30*m.x,30*m.y),m.x*=.8,void(m.y*=.8)):void clearInterval(y)},10))}var v={},g=0,m={},y=null,Y=!1,w=!1;n&&(e.event.bind(window,"touchstart",c),e.event.bind(window,"touchend",u),e.event.bind(t,"touchstart",f),e.event.bind(t,"touchmove",h),e.event.bind(t,"touchend",b)),r&&(window.PointerEvent?(e.event.bind(window,"pointerdown",c),e.event.bind(window,"pointerup",u),e.event.bind(t,"pointerdown",f),e.event.bind(t,"pointermove",h),e.event.bind(t,"pointerup",b)):window.MSPointerEvent&&(e.event.bind(window,"MSPointerDown",c),e.event.bind(window,"MSPointerUp",u),e.event.bind(t,"MSPointerDown",f),e.event.bind(t,"MSPointerMove",h),e.event.bind(t,"MSPointerUp",b)))}var o=t("../../lib/helper"),i=t("../instances"),l=t("../update-geometry"),a=t("../update-scroll");e.exports=function(t){if(o.env.supportsTouch||o.env.supportsIePointer){var e=i.get(t);r(t,e,o.env.supportsTouch,o.env.supportsIePointer)}}},{"../../lib/helper":6,"../instances":18,"../update-geometry":19,"../update-scroll":20}],17:[function(t,e,n){"use strict";var r=t("../lib/helper"),o=t("../lib/class"),i=t("./instances"),l=t("./update-geometry"),a={"click-rail":t("./handler/click-rail"),"drag-scrollbar":t("./handler/drag-scrollbar"),keyboard:t("./handler/keyboard"),wheel:t("./handler/mouse-wheel"),touch:t("./handler/touch"),selection:t("./handler/selection")},s=t("./handler/native-scroll");e.exports=function(t,e){e="object"==typeof e?e:{},o.add(t,"ps-container");var n=i.add(t);n.settings=r.extend(n.settings,e),o.add(t,"ps-theme-"+n.settings.theme),n.settings.handlers.forEach(function(e){a[e](t)}),s(t),l(t)}},{"../lib/class":2,"../lib/helper":6,"./handler/click-rail":10,"./handler/drag-scrollbar":11,"./handler/keyboard":12,"./handler/mouse-wheel":13,"./handler/native-scroll":14,"./handler/selection":15,"./handler/touch":16,"./instances":18,"./update-geometry":19}],18:[function(t,e,n){"use strict";function r(t){function e(){s.add(t,"ps-focus")}function n(){s.remove(t,"ps-focus")}var r=this;r.settings=a.clone(c),r.containerWidth=null,r.containerHeight=null,r.contentWidth=null,r.contentHeight=null,r.isRtl="rtl"===u.css(t,"direction"),r.isNegativeScroll=function(){var e=t.scrollLeft,n=null;return t.scrollLeft=-1,n=t.scrollLeft<0,t.scrollLeft=e,n}(),r.negativeScrollAdjustment=r.isNegativeScroll?t.scrollWidth-t.clientWidth:0,r.event=new d,r.ownerDocument=t.ownerDocument||document,r.scrollbarXRail=u.appendTo(u.e("div","ps-scrollbar-x-rail"),t),r.scrollbarX=u.appendTo(u.e("div","ps-scrollbar-x"),r.scrollbarXRail),r.scrollbarX.setAttribute("tabindex",0),r.event.bind(r.scrollbarX,"focus",e),r.event.bind(r.scrollbarX,"blur",n),r.scrollbarXActive=null,r.scrollbarXWidth=null,r.scrollbarXLeft=null,r.scrollbarXBottom=a.toInt(u.css(r.scrollbarXRail,"bottom")),r.isScrollbarXUsingBottom=r.scrollbarXBottom===r.scrollbarXBottom,r.scrollbarXTop=r.isScrollbarXUsingBottom?null:a.toInt(u.css(r.scrollbarXRail,"top")),r.railBorderXWidth=a.toInt(u.css(r.scrollbarXRail,"borderLeftWidth"))+a.toInt(u.css(r.scrollbarXRail,"borderRightWidth")),u.css(r.scrollbarXRail,"display","block"),r.railXMarginWidth=a.toInt(u.css(r.scrollbarXRail,"marginLeft"))+a.toInt(u.css(r.scrollbarXRail,"marginRight")),u.css(r.scrollbarXRail,"display",""),r.railXWidth=null,r.railXRatio=null,r.scrollbarYRail=u.appendTo(u.e("div","ps-scrollbar-y-rail"),t),r.scrollbarY=u.appendTo(u.e("div","ps-scrollbar-y"),r.scrollbarYRail),r.scrollbarY.setAttribute("tabindex",0),r.event.bind(r.scrollbarY,"focus",e),r.event.bind(r.scrollbarY,"blur",n),r.scrollbarYActive=null,r.scrollbarYHeight=null,r.scrollbarYTop=null,r.scrollbarYRight=a.toInt(u.css(r.scrollbarYRail,"right")),r.isScrollbarYUsingRight=r.scrollbarYRight===r.scrollbarYRight,r.scrollbarYLeft=r.isScrollbarYUsingRight?null:a.toInt(u.css(r.scrollbarYRail,"left")),r.scrollbarYOuterWidth=r.isRtl?a.outerWidth(r.scrollbarY):null,r.railBorderYWidth=a.toInt(u.css(r.scrollbarYRail,"borderTopWidth"))+a.toInt(u.css(r.scrollbarYRail,"borderBottomWidth")),u.css(r.scrollbarYRail,"display","block"),r.railYMarginHeight=a.toInt(u.css(r.scrollbarYRail,"marginTop"))+a.toInt(u.css(r.scrollbarYRail,"marginBottom")),u.css(r.scrollbarYRail,"display",""),r.railYHeight=null,r.railYRatio=null}function o(t){return t.getAttribute("data-ps-id")}function i(t,e){t.setAttribute("data-ps-id",e)}function l(t){t.removeAttribute("data-ps-id")}var a=t("../lib/helper"),s=t("../lib/class"),c=t("./default-setting"),u=t("../lib/dom"),d=t("../lib/event-manager"),p=t("../lib/guid"),f={};n.add=function(t){var e=p();return i(t,e),f[e]=new r(t),f[e]},n.remove=function(t){delete f[o(t)],l(t)},n.get=function(t){return f[o(t)]}},{"../lib/class":2,"../lib/dom":3,"../lib/event-manager":4,"../lib/guid":5,"../lib/helper":6,"./default-setting":8}],19:[function(t,e,n){"use strict";function r(t,e){return t.settings.minScrollbarLength&&(e=Math.max(e,t.settings.minScrollbarLength)),t.settings.maxScrollbarLength&&(e=Math.min(e,t.settings.maxScrollbarLength)),e}function o(t,e){var n={width:e.railXWidth};e.isRtl?n.left=e.negativeScrollAdjustment+t.scrollLeft+e.containerWidth-e.contentWidth:n.left=t.scrollLeft,e.isScrollbarXUsingBottom?n.bottom=e.scrollbarXBottom-t.scrollTop:n.top=e.scrollbarXTop+t.scrollTop,a.css(e.scrollbarXRail,n);var r={top:t.scrollTop,height:e.railYHeight};e.isScrollbarYUsingRight?e.isRtl?r.right=e.contentWidth-(e.negativeScrollAdjustment+t.scrollLeft)-e.scrollbarYRight-e.scrollbarYOuterWidth:r.right=e.scrollbarYRight-t.scrollLeft:e.isRtl?r.left=e.negativeScrollAdjustment+t.scrollLeft+2*e.containerWidth-e.contentWidth-e.scrollbarYLeft-e.scrollbarYOuterWidth:r.left=e.scrollbarYLeft+t.scrollLeft,a.css(e.scrollbarYRail,r),a.css(e.scrollbarX,{left:e.scrollbarXLeft,width:e.scrollbarXWidth-e.railBorderXWidth}),a.css(e.scrollbarY,{top:e.scrollbarYTop,height:e.scrollbarYHeight-e.railBorderYWidth})}var i=t("../lib/helper"),l=t("../lib/class"),a=t("../lib/dom"),s=t("./instances"),c=t("./update-scroll");e.exports=function(t){var e=s.get(t);e.containerWidth=t.clientWidth,e.containerHeight=t.clientHeight,e.contentWidth=t.scrollWidth,e.contentHeight=t.scrollHeight;var n;t.contains(e.scrollbarXRail)||(n=a.queryChildren(t,".ps-scrollbar-x-rail"),n.length>0&&n.forEach(function(t){a.remove(t)}),a.appendTo(e.scrollbarXRail,t)),t.contains(e.scrollbarYRail)||(n=a.queryChildren(t,".ps-scrollbar-y-rail"),n.length>0&&n.forEach(function(t){a.remove(t)}),a.appendTo(e.scrollbarYRail,t)),!e.settings.suppressScrollX&&e.containerWidth+e.settings.scrollXMarginOffset<e.contentWidth?(e.scrollbarXActive=!0,e.railXWidth=e.containerWidth-e.railXMarginWidth,e.railXRatio=e.containerWidth/e.railXWidth,e.scrollbarXWidth=r(e,i.toInt(e.railXWidth*e.containerWidth/e.contentWidth)),e.scrollbarXLeft=i.toInt((e.negativeScrollAdjustment+t.scrollLeft)*(e.railXWidth-e.scrollbarXWidth)/(e.contentWidth-e.containerWidth))):e.scrollbarXActive=!1,!e.settings.suppressScrollY&&e.containerHeight+e.settings.scrollYMarginOffset<e.contentHeight?(e.scrollbarYActive=!0,e.railYHeight=e.containerHeight-e.railYMarginHeight,e.railYRatio=e.containerHeight/e.railYHeight,e.scrollbarYHeight=r(e,i.toInt(e.railYHeight*e.containerHeight/e.contentHeight)),e.scrollbarYTop=i.toInt(t.scrollTop*(e.railYHeight-e.scrollbarYHeight)/(e.contentHeight-e.containerHeight))):e.scrollbarYActive=!1,e.scrollbarXLeft>=e.railXWidth-e.scrollbarXWidth&&(e.scrollbarXLeft=e.railXWidth-e.scrollbarXWidth),e.scrollbarYTop>=e.railYHeight-e.scrollbarYHeight&&(e.scrollbarYTop=e.railYHeight-e.scrollbarYHeight),o(t,e),e.scrollbarXActive?l.add(t,"ps-active-x"):(l.remove(t,"ps-active-x"),e.scrollbarXWidth=0,e.scrollbarXLeft=0,c(t,"left",0)),e.scrollbarYActive?l.add(t,"ps-active-y"):(l.remove(t,"ps-active-y"),e.scrollbarYHeight=0,e.scrollbarYTop=0,c(t,"top",0))}},{"../lib/class":2,"../lib/dom":3,"../lib/helper":6,"./instances":18,"./update-scroll":20}],20:[function(t,e,n){"use strict";var r,o,i=t("./instances"),l=document.createEvent("Event"),a=document.createEvent("Event"),s=document.createEvent("Event"),c=document.createEvent("Event"),u=document.createEvent("Event"),d=document.createEvent("Event"),p=document.createEvent("Event"),f=document.createEvent("Event"),h=document.createEvent("Event"),b=document.createEvent("Event");l.initEvent("ps-scroll-up",!0,!0),a.initEvent("ps-scroll-down",!0,!0),s.initEvent("ps-scroll-left",!0,!0),c.initEvent("ps-scroll-right",!0,!0),u.initEvent("ps-scroll-y",!0,!0),d.initEvent("ps-scroll-x",!0,!0),p.initEvent("ps-x-reach-start",!0,!0),f.initEvent("ps-x-reach-end",!0,!0),h.initEvent("ps-y-reach-start",!0,!0),b.initEvent("ps-y-reach-end",!0,!0),e.exports=function(t,e,n){if("undefined"==typeof t)throw"You must provide an element to the update-scroll function";if("undefined"==typeof e)throw"You must provide an axis to the update-scroll function";if("undefined"==typeof n)throw"You must provide a value to the update-scroll function";"top"===e&&0>=n&&(t.scrollTop=n=0,t.dispatchEvent(h)),"left"===e&&0>=n&&(t.scrollLeft=n=0,t.dispatchEvent(p));var v=i.get(t);"top"===e&&n>=v.contentHeight-v.containerHeight&&(n=v.contentHeight-v.containerHeight,n-t.scrollTop<=1?n=t.scrollTop:t.scrollTop=n,t.dispatchEvent(b)),"left"===e&&n>=v.contentWidth-v.containerWidth&&(n=v.contentWidth-v.containerWidth,n-t.scrollLeft<=1?n=t.scrollLeft:t.scrollLeft=n,t.dispatchEvent(f)),r||(r=t.scrollTop),o||(o=t.scrollLeft),"top"===e&&r>n&&t.dispatchEvent(l),"top"===e&&n>r&&t.dispatchEvent(a),"left"===e&&o>n&&t.dispatchEvent(s),"left"===e&&n>o&&t.dispatchEvent(c),"top"===e&&(t.scrollTop=r=n,t.dispatchEvent(u)),"left"===e&&(t.scrollLeft=o=n,t.dispatchEvent(d))}},{"./instances":18}],21:[function(t,e,n){"use strict";var r=t("../lib/helper"),o=t("../lib/dom"),i=t("./instances"),l=t("./update-geometry"),a=t("./update-scroll");e.exports=function(t){var e=i.get(t);e&&(e.negativeScrollAdjustment=e.isNegativeScroll?t.scrollWidth-t.clientWidth:0,o.css(e.scrollbarXRail,"display","block"),o.css(e.scrollbarYRail,"display","block"),e.railXMarginWidth=r.toInt(o.css(e.scrollbarXRail,"marginLeft"))+r.toInt(o.css(e.scrollbarXRail,"marginRight")),e.railYMarginHeight=r.toInt(o.css(e.scrollbarYRail,"marginTop"))+r.toInt(o.css(e.scrollbarYRail,"marginBottom")),o.css(e.scrollbarXRail,"display","none"),o.css(e.scrollbarYRail,"display","none"),l(t),a(t,"top",t.scrollTop),a(t,"left",t.scrollLeft),o.css(e.scrollbarXRail,"display",""),o.css(e.scrollbarYRail,"display",""))}},{"../lib/dom":3,"../lib/helper":6,"./instances":18,"./update-geometry":19,"./update-scroll":20}]},{},[1]);
'use strict';

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

x = jQuery.noConflict();
x(function ($) {
  // Convertir los menús de cabecera en drop menus
  $(".js-drop-menu").each(function (index, item) {
    var $item = $(item);

    var drop;
    drop = new Drop(_defineProperty({
      target: $item[0],
      content: $item.next()[0],
      position: 'bottom left',
      openOn: 'click',
      classes: 'drop-menu'
    }, 'position', 'bottom center'));
  });

  // apertura y cierre de los overlay page
  $(".js-open-overlay").each(function (index, item) {
    var $item = $(item);
    var $target = $($item.data('target'));

    // Gestión del click de apertura del overlay
    $item.on('click', function () {
      return $target.addClass('is-visible');
    });

    // Gestión del click de cierre del overlay
    $target.find('.js-overlay-close').on('click', function () {
      return $target.removeClass('is-visible');
    });
  });

  // scroll personalizado para los overlay page
  $('.js-overlay-page-content').perfectScrollbar();
  $(window).resize(function () {
    return $('.js-overlay-page-content').perfectScrollbar('update');
  });

  // Inicio del formulario de búsqueda de la home
  $('.js-busqueda-home').on('click', function (event) {
    var $item = $(this);
    EventBus.dispatch("abrirBuscadorHome", this, $item.data('tipo'));
  });

  //past DATE

  var now = new Date;
  $('.plazo-solicitud-fin').each(function (i, v) {
      var id = $(this).attr('id');
      var x = $(this).first().text();
      var fin = new Date(x);
      if (now > fin) {
          $('#' + id + ' .plazo-cerrado').append('<div><img class="" src="/sites/all/themes/zen/Nexos/assets/images/programa_cerrado.png" alt="Cerrado"></div>');
          $('#' + id + ' .plazo-cerrado').removeClass('open');
      }
  });

  var now2 = new Date;
  $('.plazo-solicitud-fin').each(function (i, v) {
      var x = $(this).first().text();
      console.log(x);
      var fin = new Date(x);
      console.log(fin);
      if (now2 > fin) {
          $('.plazo-cerrado-ficha').append('<div><img class="" src="/sites/all/themes/zen/Nexos/assets/images/programa_cerrado.png" alt="Cerrado"></div>');
          $('.plazo-cerrado-ficha').removeClass('open');
      }
  });

  //add class to input search
  $('input[type=text]').addClass('input-action__input');
  $('input[id=edit-field-instituci-n-que-promueve-value]').attr("placeholder", "Busca tu Univ. o centro desde aqui");

  //add tag after input
  $(".form-text .input-action__input").after( "<button class='input-action__button'><i class='icon-lupa'></i></button>" );

  if ($("input[name=field_instituci_n_que_promueve_value]").is(":focus")) {
    $('.input-action__button').addClass('input-action__button-azul');
  }

  var availableTags = Array();

  //get universities of taxonomies
  $.getJSON('/sites/all/themes/zen/Nexos/assets/json/universitats.json', function(data) {   
    var uniCentros = data["xml"].items.item;
    for (var i = 0; i < uniCentros.length; ++i) {
      var singleUniCentro = uniCentros[i].universidad;
      availableTags.push(singleUniCentro);
    };
  });
/*
 $.getJSON('taxonomy_term.json?vocabulary=37', function(data) {   
    var uniCentros = data["list"];
    var singleUniCentro = uniCentros[Object.keys(uniCentros)[1]];
    for (var i = 0; i < uniCentros.length; ++i) {
        var singleUniCentro = uniCentros[Object.keys(uniCentros)[i]];
        availableTags.push(singleUniCentro["name"]);
    };
});*/

  // get "areas de conocimiento" of taxonomies
  $.getJSON('/taxonomy_term.json?vocabulary=10', function(data) {   
    // TO DO
    var areas = data["list"];
    var singlArea = areas[Object.keys(areas)[1]];

    for (var i = 0; i < areas.length; ++i) {
      var singlArea = areas[Object.keys(areas)[i]];
      $("select[name=areaPre]").append($('<option>', {
        text: singlArea["name"]
      }));
    };
  });

    //HELP
  $('#wrapper').dialog({
  autoOpen: false,
  title: 'Ayuda'
  });
      $( "#ayuda" ).on( "click", function() {
      $( "#wrapper" ).dialog( "open" );
    });

  // get countries of taxonomies
  $.getJSON('/taxonomy_term.json?vocabulary=7', function(data) {   
    // TO DO
    var countries = data["list"];
    var singleCountry = countries[Object.keys(countries)[1]];

    for (var i = 0; i < countries.length; ++i) {
      var singleCountry = countries[Object.keys(countries)[i]];
      $("select[name=field_ambito_pais_tid_1]").append($('<option>', {
        value: singleCountry["tid"],
        text: singleCountry["name"]
      }));
      $("select[name=field_pais_origen_solicitante_tid]").append($('<option>', {
        value: singleCountry["tid"],
        text: singleCountry["name"]
      }));
      $("select[name=paisPre]").append($('<option>', {
        value: singleCountry["tid"],
        text: singleCountry["name"]
      }));
    };
  });

  // get "subareas de conocimiento" of taxonomies
  $.getJSON('/taxonomy_term.json?vocabulary=43', function(data) {   
    // TO DO
    var subareas = data["list"];
    var singleSubarea = subareas[Object.keys(subareas)[1]];

    for (var i = 0; i < subareas.length; ++i) {
      var singleSubarea = subareas[Object.keys(subareas)[i]];
      $("select[name=field_instituci_n_que_promueve_value]").append($('<option>', {
        text: singleSubarea["name"]
      }));
    };
  });

  $( "#tags" ).autocomplete({
    source: availableTags,
    minLength: 3
  });
  $( "#tagsPost" ).autocomplete({
    source: availableTags,
    minLength: 3
  });
  $( "#tagsInv" ).autocomplete({
    source: availableTags,
    minLength: 3
  });
 

  var lang = window.location.pathname;
  if (lang.includes("/pt")) {
    $(".u-mr---.u-valing-middle.lang").text('POR');
  }
  else{
    $(".u-mr---.u-valing-middle.lang").text('ESP');
  }

  //minimize filter of search
  $(".search-filter__down-arrow").click(function(event){
    $(this).parents(".search-filter.is-open").find('.search-filter__blocks-container').slideToggle();
  });

  //hide div if pre/post
  var valorCampo = $("select[name=tid] option:selected").text();
  if(valorCampo == 'Postgrado' || valorCampo == 'Pregrado'){
    $("#edit-field-ambito-pais-tid-wrapper .search-filter__blocks-container").css('display', 'none');
  }

  var pathname = window.location.pathname;
  if(pathname.includes("pregrado")){
    $('select[name="tid"]').val("1339");
  }
  else if(pathname.includes("postgrado")){
    $('select[name="tid"]').val("1340");
  }
  else if(pathname.includes("investigadores")){
    $('select[name="tid"]').val("1341");
  }

  //collapse
  $('[data-cerrar-filtros]').on('click', function () {
    $('body').removeClass('filtros-desplegados');
  });
  $('[data-abrir-filtros]').on('click', function () {
    $('body').addClass('filtros-desplegados');
  });

  $('[data-toggle="layer"]').on('click', function () {
    var $this = $(this);
    var $target = $($this.data('target'));
    var toggleClassName = $this.data('toggle-class');
    $target.toggleClass(toggleClassName);
  });

});
'use strict';

y = jQuery.noConflict();
y(function ($) {
  var $overlay = $('#busquedaOverlay');
  var $formularios = $overlay.find('[data-form-tipo]');

  // Click de uno de los 3 tipos de cursos
  $overlay.find('[data-opcion]').on('click', function dataOpcionClick() {
    var tipo = $(this).children().val();
    seleccionarTipo(tipo);
  });
  function btnPregradoBusqueda() {
    var uni = $('select[name="centro"]').find(":selected").text();
    var nombre = $('input[name=programa]').val();
    location.href= "www.google.es";
    //location.href = "/busqueda-avanzada?field_instituci_n_que_promueve_value="+ uni +"&tid=1339&field_ambito_pais_tid=All&field_univ_o_centro_de_destino_value=&keys="+ nombre ;
  };

  function seleccionarTipo(tipo) {
    $formularios.hide();
    $overlay.find('[data-form-tipo="' + tipo + '"]').show();
    $overlay.find('[data-opcion] > input[value="' + tipo + '"]').parent().button('toggle');

    refrescarOverlay();
  }

  function refrescarOverlay() {
    setTimeout(function () {
      // actualizamos el scroll del overlay
      $overlay.find('.js-overlay-page-content').perfectScrollbar('update');
    });
  }

  // Código de inicialización
  EventBus.addEventListener("abrirBuscadorHome", abrirBuscadorHome);
  function abrirBuscadorHome(event, tipo) {
    seleccionarTipo(tipo);
  }

  // Convertimos en personalizados los select del buscador
  $('.js-buscador-select').each(function (index, item) {
    // Construimos un select personalizado para cada combo
    var select = new Select({
      el: item,
      className: 'p-buscador_select',
      scrollParent: $overlay.find('.js-overlay-page-content')[0]
    });

    // Ajustamos la anchura de los elementos al tamaño del select (target)
    select.on('open', function () {
      $(select.drop).width($(select.target).outerWidth(true));
    });

    // Cerramos el select si se redimensiona la pantalla
    $(window).resize(function () {
      if (select.isOpen()) {
        select.close();
      }
    });
  });

  // Ocultar / mostrar step 2 de los formularios en base al estado del step 1
  $('[data-form-tipo]').each(function (index, form) {
    var $form = $(form);
    var $step1 = $form.find('[data-step="1"]');
    var $step2 = $form.find('[data-step="2"]');
    var $camposObligatorios = $step1.find("select, input");

    $camposObligatorios.on('change', function (event) {
      var mostrarStep2 = todosLosCamposRellenados($camposObligatorios);
      

      if (mostrarStep2) {
        $step2.show();
      } else {
        $step2.hide();
      }
      refrescarOverlay();
    });

    function todosLosCamposRellenados($campos) {
      for (var x = 0; x < $campos.length; x++) {
        if (!$($campos[x]).val()) {
          return false;
        }
      }
      return true;
    }

    $step2.hide();
  });
});

jQuery(document).ready(function ($) {

  var $mapa = $("#mapa");

  if ($mapa.length === 0) return;

  var strPaises = "Andorra,Argentina,Bolivia,Brasil,Colombia,Costa Rica,Cuba,Chile,República Dominicana,Ecuador,El Salvador,España,Guatemala,Honduras,México,Nicaragua,Panamá,Paraguay,Perú,Portugal,Uruguay,Venezuela";

  var arrPaises = strPaises.split(',');
  var arrAreas = [];

  $.each(arrPaises, function (i, val) {
    var area = { key: val.trim(), toolTip: val.trim(), selected: true };
    arrAreas.push(area);
  });;

  var config = {
    fillOpacity: 1,
    render_highlight: {
      fillColor: '#008C9F',
      stroke: false,
      altImage: null
    },
    render_select: {
      fillColor: '4EBDCC',
      stroke: false,
      altImage: null
    },

    isSelectable: false,

    mapKey: 'data-full',
    mapValue: 'data-state',

    showToolTip: true,
    toolTipClose: ["area-mouseout"],
    toolTipContainer: '<div class="tooltip-container"></div>',

    areas: arrAreas,

    onClick: function onClick(e) {
      window.location.href = $("area[data-full='" + e.key + "'").attr('href');
    }
  };

  $mapa.mapster(config);
});
//# sourceMappingURL=index.js.map


