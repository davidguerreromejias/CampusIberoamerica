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

/* ========================================================================
 * Bootstrap: collapse.js v3.3.7
 * http://getbootstrap.com/javascript/#collapse
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */

/* jshint latedef: false */

+function ($) {
  'use strict';

  // COLLAPSE PUBLIC CLASS DEFINITION
  // ================================

  var Collapse = function (element, options) {
    this.$element      = $(element)
    this.options       = $.extend({}, Collapse.DEFAULTS, options)
    this.$trigger      = $('[data-toggle="collapse"][href="#' + element.id + '"],' +
                           '[data-toggle="collapse"][data-target="#' + element.id + '"]')
    this.transitioning = null

    if (this.options.parent) {
      this.$parent = this.getParent()
    } else {
      this.addAriaAndCollapsedClass(this.$element, this.$trigger)
    }

    if (this.options.toggle) this.toggle()
  }

  Collapse.VERSION  = '3.3.7'

  Collapse.TRANSITION_DURATION = 350

  Collapse.DEFAULTS = {
    toggle: true
  }

  Collapse.prototype.dimension = function () {
    var hasWidth = this.$element.hasClass('width')
    return hasWidth ? 'width' : 'height'
  }

  Collapse.prototype.show = function () {
    if (this.transitioning || this.$element.hasClass('in')) return

    var activesData
    var actives = this.$parent && this.$parent.children('.panel').children('.in, .collapsing')

    if (actives && actives.length) {
      activesData = actives.data('bs.collapse')
      if (activesData && activesData.transitioning) return
    }

    var startEvent = $.Event('show.bs.collapse')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return

    if (actives && actives.length) {
      Plugin.call(actives, 'hide')
      activesData || actives.data('bs.collapse', null)
    }

    var dimension = this.dimension()

    this.$element
      .removeClass('collapse')
      .addClass('collapsing')[dimension](0)
      .attr('aria-expanded', true)

    this.$trigger
      .removeClass('collapsed')
      .attr('aria-expanded', true)

    this.transitioning = 1

    var complete = function () {
      this.$element
        .removeClass('collapsing')
        .addClass('collapse in')[dimension]('')
      this.transitioning = 0
      this.$element
        .trigger('shown.bs.collapse')
    }

    if (!$.support.transition) return complete.call(this)

    var scrollSize = $.camelCase(['scroll', dimension].join('-'))

    this.$element
      .one('bsTransitionEnd', $.proxy(complete, this))
      .emulateTransitionEnd(Collapse.TRANSITION_DURATION)[dimension](this.$element[0][scrollSize])
  }

  Collapse.prototype.hide = function () {
    if (this.transitioning || !this.$element.hasClass('in')) return

    var startEvent = $.Event('hide.bs.collapse')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return

    var dimension = this.dimension()

    this.$element[dimension](this.$element[dimension]())[0].offsetHeight

    this.$element
      .addClass('collapsing')
      .removeClass('collapse in')
      .attr('aria-expanded', false)

    this.$trigger
      .addClass('collapsed')
      .attr('aria-expanded', false)

    this.transitioning = 1

    var complete = function () {
      this.transitioning = 0
      this.$element
        .removeClass('collapsing')
        .addClass('collapse')
        .trigger('hidden.bs.collapse')
    }

    if (!$.support.transition) return complete.call(this)

    this.$element
      [dimension](0)
      .one('bsTransitionEnd', $.proxy(complete, this))
      .emulateTransitionEnd(Collapse.TRANSITION_DURATION)
  }

  Collapse.prototype.toggle = function () {
    this[this.$element.hasClass('in') ? 'hide' : 'show']()
  }

  Collapse.prototype.getParent = function () {
    return $(this.options.parent)
      .find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]')
      .each($.proxy(function (i, element) {
        var $element = $(element)
        this.addAriaAndCollapsedClass(getTargetFromTrigger($element), $element)
      }, this))
      .end()
  }

  Collapse.prototype.addAriaAndCollapsedClass = function ($element, $trigger) {
    var isOpen = $element.hasClass('in')

    $element.attr('aria-expanded', isOpen)
    $trigger
      .toggleClass('collapsed', !isOpen)
      .attr('aria-expanded', isOpen)
  }

  function getTargetFromTrigger($trigger) {
    var href
    var target = $trigger.attr('data-target')
      || (href = $trigger.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') // strip for ie7

    return $(target)
  }


  // COLLAPSE PLUGIN DEFINITION
  // ==========================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.collapse')
      var options = $.extend({}, Collapse.DEFAULTS, $this.data(), typeof option == 'object' && option)

      if (!data && options.toggle && /show|hide/.test(option)) options.toggle = false
      if (!data) $this.data('bs.collapse', (data = new Collapse(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  var old = $.fn.collapse

  $.fn.collapse             = Plugin
  $.fn.collapse.Constructor = Collapse


  // COLLAPSE NO CONFLICT
  // ====================

  $.fn.collapse.noConflict = function () {
    $.fn.collapse = old
    return this
  }


  // COLLAPSE DATA-API
  // =================

  $(document).on('click.bs.collapse.data-api', '[data-toggle="collapse"]', function (e) {
    var $this   = $(this)

    if (!$this.attr('data-target')) e.preventDefault()

    var $target = getTargetFromTrigger($this)
    var data    = $target.data('bs.collapse')
    var option  = data ? 'toggle' : $this.data()

    Plugin.call($target, option)
  })

}(jQuery);

/* ========================================================================
 * Bootstrap: transition.js v3.3.7
 * http://getbootstrap.com/javascript/#transitions
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // CSS TRANSITION SUPPORT (Shoutout: http://www.modernizr.com/)
  // ============================================================

  function transitionEnd() {
    var el = document.createElement('bootstrap')

    var transEndEventNames = {
      WebkitTransition : 'webkitTransitionEnd',
      MozTransition    : 'transitionend',
      OTransition      : 'oTransitionEnd otransitionend',
      transition       : 'transitionend'
    }

    for (var name in transEndEventNames) {
      if (el.style[name] !== undefined) {
        return { end: transEndEventNames[name] }
      }
    }

    return false // explicit for ie8 (  ._.)
  }

  // http://blog.alexmaccaw.com/css-transitions
  $.fn.emulateTransitionEnd = function (duration) {
    var called = false
    var $el = this
    $(this).one('bsTransitionEnd', function () { called = true })
    var callback = function () { if (!called) $($el).trigger($.support.transition.end) }
    setTimeout(callback, duration)
    return this
  }

  $(function () {
    $.support.transition = transitionEnd()

    if (!$.support.transition) return

    $.event.special.bsTransitionEnd = {
      bindType: $.support.transition.end,
      delegateType: $.support.transition.end,
      handle: function (e) {
        if ($(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
      }
    }
  })

}(jQuery);

!function(t,e){"function"==typeof define&&define.amd?define(e):"object"==typeof exports?module.exports=e(require,exports,module):t.Tether=e()}(this,function(t,e,o){"use strict";function n(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function i(t){var e=t.getBoundingClientRect(),o={};for(var n in e)o[n]=e[n];if(t.ownerDocument!==document){var r=t.ownerDocument.defaultView.frameElement;if(r){var s=i(r);o.top+=s.top,o.bottom+=s.top,o.left+=s.left,o.right+=s.left}}return o}function r(t){var e=getComputedStyle(t)||{},o=e.position,n=[];if("fixed"===o)return[t];for(var i=t;(i=i.parentNode)&&i&&1===i.nodeType;){var r=void 0;try{r=getComputedStyle(i)}catch(s){}if("undefined"==typeof r||null===r)return n.push(i),n;var a=r,f=a.overflow,l=a.overflowX,h=a.overflowY;/(auto|scroll)/.test(f+h+l)&&("absolute"!==o||["relative","absolute","fixed"].indexOf(r.position)>=0)&&n.push(i)}return n.push(t.ownerDocument.body),t.ownerDocument!==document&&n.push(t.ownerDocument.defaultView),n}function s(){A&&document.body.removeChild(A),A=null}function a(t){var e=void 0;t===document?(e=document,t=document.documentElement):e=t.ownerDocument;var o=e.documentElement,n=i(t),r=P();return n.top-=r.top,n.left-=r.left,"undefined"==typeof n.width&&(n.width=document.body.scrollWidth-n.left-n.right),"undefined"==typeof n.height&&(n.height=document.body.scrollHeight-n.top-n.bottom),n.top=n.top-o.clientTop,n.left=n.left-o.clientLeft,n.right=e.body.clientWidth-n.width-n.left,n.bottom=e.body.clientHeight-n.height-n.top,n}function f(t){return t.offsetParent||document.documentElement}function l(){if(M)return M;var t=document.createElement("div");t.style.width="100%",t.style.height="200px";var e=document.createElement("div");h(e.style,{position:"absolute",top:0,left:0,pointerEvents:"none",visibility:"hidden",width:"200px",height:"150px",overflow:"hidden"}),e.appendChild(t),document.body.appendChild(e);var o=t.offsetWidth;e.style.overflow="scroll";var n=t.offsetWidth;o===n&&(n=e.clientWidth),document.body.removeChild(e);var i=o-n;return M={width:i,height:i}}function h(){var t=arguments.length<=0||void 0===arguments[0]?{}:arguments[0],e=[];return Array.prototype.push.apply(e,arguments),e.slice(1).forEach(function(e){if(e)for(var o in e)({}).hasOwnProperty.call(e,o)&&(t[o]=e[o])}),t}function d(t,e){if("undefined"!=typeof t.classList)e.split(" ").forEach(function(e){e.trim()&&t.classList.remove(e)});else{var o=new RegExp("(^| )"+e.split(" ").join("|")+"( |$)","gi"),n=c(t).replace(o," ");g(t,n)}}function u(t,e){if("undefined"!=typeof t.classList)e.split(" ").forEach(function(e){e.trim()&&t.classList.add(e)});else{d(t,e);var o=c(t)+(" "+e);g(t,o)}}function p(t,e){if("undefined"!=typeof t.classList)return t.classList.contains(e);var o=c(t);return new RegExp("(^| )"+e+"( |$)","gi").test(o)}function c(t){return t.className instanceof t.ownerDocument.defaultView.SVGAnimatedString?t.className.baseVal:t.className}function g(t,e){t.setAttribute("class",e)}function m(t,e,o){o.forEach(function(o){-1===e.indexOf(o)&&p(t,o)&&d(t,o)}),e.forEach(function(e){p(t,e)||u(t,e)})}function n(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function v(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}function y(t,e){var o=arguments.length<=2||void 0===arguments[2]?1:arguments[2];return t+o>=e&&e>=t-o}function b(){return"undefined"!=typeof performance&&"undefined"!=typeof performance.now?performance.now():+new Date}function w(){for(var t={top:0,left:0},e=arguments.length,o=Array(e),n=0;e>n;n++)o[n]=arguments[n];return o.forEach(function(e){var o=e.top,n=e.left;"string"==typeof o&&(o=parseFloat(o,10)),"string"==typeof n&&(n=parseFloat(n,10)),t.top+=o,t.left+=n}),t}function C(t,e){return"string"==typeof t.left&&-1!==t.left.indexOf("%")&&(t.left=parseFloat(t.left,10)/100*e.width),"string"==typeof t.top&&-1!==t.top.indexOf("%")&&(t.top=parseFloat(t.top,10)/100*e.height),t}function O(t,e){return"scrollParent"===e?e=t.scrollParents[0]:"window"===e&&(e=[pageXOffset,pageYOffset,innerWidth+pageXOffset,innerHeight+pageYOffset]),e===document&&(e=e.documentElement),"undefined"!=typeof e.nodeType&&!function(){var t=e,o=a(e),n=o,i=getComputedStyle(e);if(e=[n.left,n.top,o.width+n.left,o.height+n.top],t.ownerDocument!==document){var r=t.ownerDocument.defaultView;e[0]+=r.pageXOffset,e[1]+=r.pageYOffset,e[2]+=r.pageXOffset,e[3]+=r.pageYOffset}G.forEach(function(t,o){t=t[0].toUpperCase()+t.substr(1),"Top"===t||"Left"===t?e[o]+=parseFloat(i["border"+t+"Width"]):e[o]-=parseFloat(i["border"+t+"Width"])})}(),e}var E=function(){function t(t,e){for(var o=0;o<e.length;o++){var n=e[o];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,o,n){return o&&t(e.prototype,o),n&&t(e,n),e}}(),x=void 0;"undefined"==typeof x&&(x={modules:[]});var A=null,T=function(){var t=0;return function(){return++t}}(),S={},P=function(){var t=A;t||(t=document.createElement("div"),t.setAttribute("data-tether-id",T()),h(t.style,{top:0,left:0,position:"absolute"}),document.body.appendChild(t),A=t);var e=t.getAttribute("data-tether-id");return"undefined"==typeof S[e]&&(S[e]=i(t),k(function(){delete S[e]})),S[e]},M=null,W=[],k=function(t){W.push(t)},_=function(){for(var t=void 0;t=W.pop();)t()},B=function(){function t(){n(this,t)}return E(t,[{key:"on",value:function(t,e,o){var n=arguments.length<=3||void 0===arguments[3]?!1:arguments[3];"undefined"==typeof this.bindings&&(this.bindings={}),"undefined"==typeof this.bindings[t]&&(this.bindings[t]=[]),this.bindings[t].push({handler:e,ctx:o,once:n})}},{key:"once",value:function(t,e,o){this.on(t,e,o,!0)}},{key:"off",value:function(t,e){if("undefined"!=typeof this.bindings&&"undefined"!=typeof this.bindings[t])if("undefined"==typeof e)delete this.bindings[t];else for(var o=0;o<this.bindings[t].length;)this.bindings[t][o].handler===e?this.bindings[t].splice(o,1):++o}},{key:"trigger",value:function(t){if("undefined"!=typeof this.bindings&&this.bindings[t]){for(var e=0,o=arguments.length,n=Array(o>1?o-1:0),i=1;o>i;i++)n[i-1]=arguments[i];for(;e<this.bindings[t].length;){var r=this.bindings[t][e],s=r.handler,a=r.ctx,f=r.once,l=a;"undefined"==typeof l&&(l=this),s.apply(l,n),f?this.bindings[t].splice(e,1):++e}}}}]),t}();x.Utils={getActualBoundingClientRect:i,getScrollParents:r,getBounds:a,getOffsetParent:f,extend:h,addClass:u,removeClass:d,hasClass:p,updateClasses:m,defer:k,flush:_,uniqueId:T,Evented:B,getScrollBarSize:l,removeUtilElements:s};var z=function(){function t(t,e){var o=[],n=!0,i=!1,r=void 0;try{for(var s,a=t[Symbol.iterator]();!(n=(s=a.next()).done)&&(o.push(s.value),!e||o.length!==e);n=!0);}catch(f){i=!0,r=f}finally{try{!n&&a["return"]&&a["return"]()}finally{if(i)throw r}}return o}return function(e,o){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return t(e,o);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}(),E=function(){function t(t,e){for(var o=0;o<e.length;o++){var n=e[o];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,o,n){return o&&t(e.prototype,o),n&&t(e,n),e}}(),j=function(t,e,o){for(var n=!0;n;){var i=t,r=e,s=o;n=!1,null===i&&(i=Function.prototype);var a=Object.getOwnPropertyDescriptor(i,r);if(void 0!==a){if("value"in a)return a.value;var f=a.get;if(void 0===f)return;return f.call(s)}var l=Object.getPrototypeOf(i);if(null===l)return;t=l,e=r,o=s,n=!0,a=l=void 0}};if("undefined"==typeof x)throw new Error("You must include the utils.js file before tether.js");var Y=x.Utils,r=Y.getScrollParents,a=Y.getBounds,f=Y.getOffsetParent,h=Y.extend,u=Y.addClass,d=Y.removeClass,m=Y.updateClasses,k=Y.defer,_=Y.flush,l=Y.getScrollBarSize,s=Y.removeUtilElements,L=function(){if("undefined"==typeof document)return"";for(var t=document.createElement("div"),e=["transform","WebkitTransform","OTransform","MozTransform","msTransform"],o=0;o<e.length;++o){var n=e[o];if(void 0!==t.style[n])return n}}(),D=[],X=function(){D.forEach(function(t){t.position(!1)}),_()};!function(){var t=null,e=null,o=null,n=function i(){return"undefined"!=typeof e&&e>16?(e=Math.min(e-16,250),void(o=setTimeout(i,250))):void("undefined"!=typeof t&&b()-t<10||(null!=o&&(clearTimeout(o),o=null),t=b(),X(),e=b()-t))};"undefined"!=typeof window&&"undefined"!=typeof window.addEventListener&&["resize","scroll","touchmove"].forEach(function(t){window.addEventListener(t,n)})}();var F={center:"center",left:"right",right:"left"},H={middle:"middle",top:"bottom",bottom:"top"},N={top:0,left:0,middle:"50%",center:"50%",bottom:"100%",right:"100%"},U=function(t,e){var o=t.left,n=t.top;return"auto"===o&&(o=F[e.left]),"auto"===n&&(n=H[e.top]),{left:o,top:n}},V=function(t){var e=t.left,o=t.top;return"undefined"!=typeof N[t.left]&&(e=N[t.left]),"undefined"!=typeof N[t.top]&&(o=N[t.top]),{left:e,top:o}},R=function(t){var e=t.split(" "),o=z(e,2),n=o[0],i=o[1];return{top:n,left:i}},q=R,I=function(t){function e(t){var o=this;n(this,e),j(Object.getPrototypeOf(e.prototype),"constructor",this).call(this),this.position=this.position.bind(this),D.push(this),this.history=[],this.setOptions(t,!1),x.modules.forEach(function(t){"undefined"!=typeof t.initialize&&t.initialize.call(o)}),this.position()}return v(e,t),E(e,[{key:"getClass",value:function(){var t=arguments.length<=0||void 0===arguments[0]?"":arguments[0],e=this.options.classes;return"undefined"!=typeof e&&e[t]?this.options.classes[t]:this.options.classPrefix?this.options.classPrefix+"-"+t:t}},{key:"setOptions",value:function(t){var e=this,o=arguments.length<=1||void 0===arguments[1]?!0:arguments[1],n={offset:"0 0",targetOffset:"0 0",targetAttachment:"auto auto",classPrefix:"tether"};this.options=h(n,t);var i=this.options,s=i.element,a=i.target,f=i.targetModifier;if(this.element=s,this.target=a,this.targetModifier=f,"viewport"===this.target?(this.target=document.body,this.targetModifier="visible"):"scroll-handle"===this.target&&(this.target=document.body,this.targetModifier="scroll-handle"),["element","target"].forEach(function(t){if("undefined"==typeof e[t])throw new Error("Tether Error: Both element and target must be defined");"undefined"!=typeof e[t].jquery?e[t]=e[t][0]:"string"==typeof e[t]&&(e[t]=document.querySelector(e[t]))}),u(this.element,this.getClass("element")),this.options.addTargetClasses!==!1&&u(this.target,this.getClass("target")),!this.options.attachment)throw new Error("Tether Error: You must provide an attachment");this.targetAttachment=q(this.options.targetAttachment),this.attachment=q(this.options.attachment),this.offset=R(this.options.offset),this.targetOffset=R(this.options.targetOffset),"undefined"!=typeof this.scrollParents&&this.disable(),"scroll-handle"===this.targetModifier?this.scrollParents=[this.target]:this.scrollParents=r(this.target),this.options.enabled!==!1&&this.enable(o)}},{key:"getTargetBounds",value:function(){if("undefined"==typeof this.targetModifier)return a(this.target);if("visible"===this.targetModifier){if(this.target===document.body)return{top:pageYOffset,left:pageXOffset,height:innerHeight,width:innerWidth};var t=a(this.target),e={height:t.height,width:t.width,top:t.top,left:t.left};return e.height=Math.min(e.height,t.height-(pageYOffset-t.top)),e.height=Math.min(e.height,t.height-(t.top+t.height-(pageYOffset+innerHeight))),e.height=Math.min(innerHeight,e.height),e.height-=2,e.width=Math.min(e.width,t.width-(pageXOffset-t.left)),e.width=Math.min(e.width,t.width-(t.left+t.width-(pageXOffset+innerWidth))),e.width=Math.min(innerWidth,e.width),e.width-=2,e.top<pageYOffset&&(e.top=pageYOffset),e.left<pageXOffset&&(e.left=pageXOffset),e}if("scroll-handle"===this.targetModifier){var t=void 0,o=this.target;o===document.body?(o=document.documentElement,t={left:pageXOffset,top:pageYOffset,height:innerHeight,width:innerWidth}):t=a(o);var n=getComputedStyle(o),i=o.scrollWidth>o.clientWidth||[n.overflow,n.overflowX].indexOf("scroll")>=0||this.target!==document.body,r=0;i&&(r=15);var s=t.height-parseFloat(n.borderTopWidth)-parseFloat(n.borderBottomWidth)-r,e={width:15,height:.975*s*(s/o.scrollHeight),left:t.left+t.width-parseFloat(n.borderLeftWidth)-15},f=0;408>s&&this.target===document.body&&(f=-11e-5*Math.pow(s,2)-.00727*s+22.58),this.target!==document.body&&(e.height=Math.max(e.height,24));var l=this.target.scrollTop/(o.scrollHeight-s);return e.top=l*(s-e.height-f)+t.top+parseFloat(n.borderTopWidth),this.target===document.body&&(e.height=Math.max(e.height,24)),e}}},{key:"clearCache",value:function(){this._cache={}}},{key:"cache",value:function(t,e){return"undefined"==typeof this._cache&&(this._cache={}),"undefined"==typeof this._cache[t]&&(this._cache[t]=e.call(this)),this._cache[t]}},{key:"enable",value:function(){var t=this,e=arguments.length<=0||void 0===arguments[0]?!0:arguments[0];this.options.addTargetClasses!==!1&&u(this.target,this.getClass("enabled")),u(this.element,this.getClass("enabled")),this.enabled=!0,this.scrollParents.forEach(function(e){e!==t.target.ownerDocument&&e.addEventListener("scroll",t.position)}),e&&this.position()}},{key:"disable",value:function(){var t=this;d(this.target,this.getClass("enabled")),d(this.element,this.getClass("enabled")),this.enabled=!1,"undefined"!=typeof this.scrollParents&&this.scrollParents.forEach(function(e){e.removeEventListener("scroll",t.position)})}},{key:"destroy",value:function(){var t=this;this.disable(),D.forEach(function(e,o){e===t&&D.splice(o,1)}),0===D.length&&s()}},{key:"updateAttachClasses",value:function(t,e){var o=this;t=t||this.attachment,e=e||this.targetAttachment;var n=["left","top","bottom","right","middle","center"];"undefined"!=typeof this._addAttachClasses&&this._addAttachClasses.length&&this._addAttachClasses.splice(0,this._addAttachClasses.length),"undefined"==typeof this._addAttachClasses&&(this._addAttachClasses=[]);var i=this._addAttachClasses;t.top&&i.push(this.getClass("element-attached")+"-"+t.top),t.left&&i.push(this.getClass("element-attached")+"-"+t.left),e.top&&i.push(this.getClass("target-attached")+"-"+e.top),e.left&&i.push(this.getClass("target-attached")+"-"+e.left);var r=[];n.forEach(function(t){r.push(o.getClass("element-attached")+"-"+t),r.push(o.getClass("target-attached")+"-"+t)}),k(function(){"undefined"!=typeof o._addAttachClasses&&(m(o.element,o._addAttachClasses,r),o.options.addTargetClasses!==!1&&m(o.target,o._addAttachClasses,r),delete o._addAttachClasses)})}},{key:"position",value:function(){var t=this,e=arguments.length<=0||void 0===arguments[0]?!0:arguments[0];if(this.enabled){this.clearCache();var o=U(this.targetAttachment,this.attachment);this.updateAttachClasses(this.attachment,o);var n=this.cache("element-bounds",function(){return a(t.element)}),i=n.width,r=n.height;if(0===i&&0===r&&"undefined"!=typeof this.lastSize){var s=this.lastSize;i=s.width,r=s.height}else this.lastSize={width:i,height:r};var h=this.cache("target-bounds",function(){return t.getTargetBounds()}),d=h,u=C(V(this.attachment),{width:i,height:r}),p=C(V(o),d),c=C(this.offset,{width:i,height:r}),g=C(this.targetOffset,d);u=w(u,c),p=w(p,g);for(var m=h.left+p.left-u.left,v=h.top+p.top-u.top,y=0;y<x.modules.length;++y){var b=x.modules[y],O=b.position.call(this,{left:m,top:v,targetAttachment:o,targetPos:h,elementPos:n,offset:u,targetOffset:p,manualOffset:c,manualTargetOffset:g,scrollbarSize:S,attachment:this.attachment});if(O===!1)return!1;"undefined"!=typeof O&&"object"==typeof O&&(v=O.top,m=O.left)}var E={page:{top:v,left:m},viewport:{top:v-pageYOffset,bottom:pageYOffset-v-r+innerHeight,left:m-pageXOffset,right:pageXOffset-m-i+innerWidth}},A=this.target.ownerDocument,T=A.defaultView,S=void 0;return T.innerHeight>A.documentElement.clientHeight&&(S=this.cache("scrollbar-size",l),E.viewport.bottom-=S.height),T.innerWidth>A.documentElement.clientWidth&&(S=this.cache("scrollbar-size",l),E.viewport.right-=S.width),(-1===["","static"].indexOf(A.body.style.position)||-1===["","static"].indexOf(A.body.parentElement.style.position))&&(E.page.bottom=A.body.scrollHeight-v-r,E.page.right=A.body.scrollWidth-m-i),"undefined"!=typeof this.options.optimizations&&this.options.optimizations.moveElement!==!1&&"undefined"==typeof this.targetModifier&&!function(){var e=t.cache("target-offsetparent",function(){return f(t.target)}),o=t.cache("target-offsetparent-bounds",function(){return a(e)}),n=getComputedStyle(e),i=o,r={};if(["Top","Left","Bottom","Right"].forEach(function(t){r[t.toLowerCase()]=parseFloat(n["border"+t+"Width"])}),o.right=A.body.scrollWidth-o.left-i.width+r.right,o.bottom=A.body.scrollHeight-o.top-i.height+r.bottom,E.page.top>=o.top+r.top&&E.page.bottom>=o.bottom&&E.page.left>=o.left+r.left&&E.page.right>=o.right){var s=e.scrollTop,l=e.scrollLeft;E.offset={top:E.page.top-o.top+s-r.top,left:E.page.left-o.left+l-r.left}}}(),this.move(E),this.history.unshift(E),this.history.length>3&&this.history.pop(),e&&_(),!0}}},{key:"move",value:function(t){var e=this;if("undefined"!=typeof this.element.parentNode){var o={};for(var n in t){o[n]={};for(var i in t[n]){for(var r=!1,s=0;s<this.history.length;++s){var a=this.history[s];if("undefined"!=typeof a[n]&&!y(a[n][i],t[n][i])){r=!0;break}}r||(o[n][i]=!0)}}var l={top:"",left:"",right:"",bottom:""},d=function(t,o){var n="undefined"!=typeof e.options.optimizations,i=n?e.options.optimizations.gpu:null;if(i!==!1){var r=void 0,s=void 0;if(t.top?(l.top=0,r=o.top):(l.bottom=0,r=-o.bottom),t.left?(l.left=0,s=o.left):(l.right=0,s=-o.right),window.matchMedia){var a=window.matchMedia("only screen and (min-resolution: 1.3dppx)").matches||window.matchMedia("only screen and (-webkit-min-device-pixel-ratio: 1.3)").matches;a||(s=Math.round(s),r=Math.round(r))}l[L]="translateX("+s+"px) translateY("+r+"px)","msTransform"!==L&&(l[L]+=" translateZ(0)")}else t.top?l.top=o.top+"px":l.bottom=o.bottom+"px",t.left?l.left=o.left+"px":l.right=o.right+"px"},u=!1;if((o.page.top||o.page.bottom)&&(o.page.left||o.page.right)?(l.position="absolute",d(o.page,t.page)):(o.viewport.top||o.viewport.bottom)&&(o.viewport.left||o.viewport.right)?(l.position="fixed",d(o.viewport,t.viewport)):"undefined"!=typeof o.offset&&o.offset.top&&o.offset.left?!function(){l.position="absolute";var n=e.cache("target-offsetparent",function(){return f(e.target)});f(e.element)!==n&&k(function(){e.element.parentNode.removeChild(e.element),n.appendChild(e.element)}),d(o.offset,t.offset),u=!0}():(l.position="absolute",d({top:!0,left:!0},t.page)),!u){for(var p=!0,c=this.element.parentNode;c&&1===c.nodeType&&"BODY"!==c.tagName;){if("static"!==getComputedStyle(c).position){p=!1;break}c=c.parentNode}p||(this.element.parentNode.removeChild(this.element),this.element.ownerDocument.body.appendChild(this.element))}var g={},m=!1;for(var i in l){var v=l[i],b=this.element.style[i];b!==v&&(m=!0,g[i]=v)}m&&k(function(){h(e.element.style,g),e.trigger("repositioned")})}}}]),e}(B);I.modules=[],x.position=X;var $=h(I,x),z=function(){function t(t,e){var o=[],n=!0,i=!1,r=void 0;try{for(var s,a=t[Symbol.iterator]();!(n=(s=a.next()).done)&&(o.push(s.value),!e||o.length!==e);n=!0);}catch(f){i=!0,r=f}finally{try{!n&&a["return"]&&a["return"]()}finally{if(i)throw r}}return o}return function(e,o){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return t(e,o);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}(),Y=x.Utils,a=Y.getBounds,h=Y.extend,m=Y.updateClasses,k=Y.defer,G=["left","top","right","bottom"];x.modules.push({position:function(t){var e=this,o=t.top,n=t.left,i=t.targetAttachment;if(!this.options.constraints)return!0;var r=this.cache("element-bounds",function(){return a(e.element)}),s=r.height,f=r.width;if(0===f&&0===s&&"undefined"!=typeof this.lastSize){var l=this.lastSize;f=l.width,s=l.height}var d=this.cache("target-bounds",function(){return e.getTargetBounds()}),u=d.height,p=d.width,c=[this.getClass("pinned"),this.getClass("out-of-bounds")];this.options.constraints.forEach(function(t){var e=t.outOfBoundsClass,o=t.pinnedClass;e&&c.push(e),o&&c.push(o)}),c.forEach(function(t){["left","top","right","bottom"].forEach(function(e){c.push(t+"-"+e)})});var g=[],v=h({},i),y=h({},this.attachment);return this.options.constraints.forEach(function(t){var r=t.to,a=t.attachment,l=t.pin;"undefined"==typeof a&&(a="");var h=void 0,d=void 0;if(a.indexOf(" ")>=0){var c=a.split(" "),m=z(c,2);d=m[0],h=m[1]}else h=d=a;var b=O(e,r);("target"===d||"both"===d)&&(o<b[1]&&"top"===v.top&&(o+=u,v.top="bottom"),o+s>b[3]&&"bottom"===v.top&&(o-=u,v.top="top")),"together"===d&&("top"===v.top&&("bottom"===y.top&&o<b[1]?(o+=u,v.top="bottom",o+=s,y.top="top"):"top"===y.top&&o+s>b[3]&&o-(s-u)>=b[1]&&(o-=s-u,v.top="bottom",y.top="bottom")),"bottom"===v.top&&("top"===y.top&&o+s>b[3]?(o-=u,v.top="top",o-=s,y.top="bottom"):"bottom"===y.top&&o<b[1]&&o+(2*s-u)<=b[3]&&(o+=s-u,v.top="top",y.top="top")),"middle"===v.top&&(o+s>b[3]&&"top"===y.top?(o-=s,y.top="bottom"):o<b[1]&&"bottom"===y.top&&(o+=s,y.top="top"))),("target"===h||"both"===h)&&(n<b[0]&&"left"===v.left&&(n+=p,v.left="right"),n+f>b[2]&&"right"===v.left&&(n-=p,v.left="left")),"together"===h&&(n<b[0]&&"left"===v.left?"right"===y.left?(n+=p,v.left="right",n+=f,y.left="left"):"left"===y.left&&(n+=p,v.left="right",n-=f,y.left="right"):n+f>b[2]&&"right"===v.left?"left"===y.left?(n-=p,v.left="left",n-=f,y.left="right"):"right"===y.left&&(n-=p,v.left="left",n+=f,y.left="left"):"center"===v.left&&(n+f>b[2]&&"left"===y.left?(n-=f,y.left="right"):n<b[0]&&"right"===y.left&&(n+=f,y.left="left"))),("element"===d||"both"===d)&&(o<b[1]&&"bottom"===y.top&&(o+=s,y.top="top"),o+s>b[3]&&"top"===y.top&&(o-=s,y.top="bottom")),("element"===h||"both"===h)&&(n<b[0]&&("right"===y.left?(n+=f,y.left="left"):"center"===y.left&&(n+=f/2,y.left="left")),n+f>b[2]&&("left"===y.left?(n-=f,y.left="right"):"center"===y.left&&(n-=f/2,y.left="right"))),"string"==typeof l?l=l.split(",").map(function(t){return t.trim()}):l===!0&&(l=["top","left","right","bottom"]),l=l||[];var w=[],C=[];o<b[1]&&(l.indexOf("top")>=0?(o=b[1],w.push("top")):C.push("top")),o+s>b[3]&&(l.indexOf("bottom")>=0?(o=b[3]-s,w.push("bottom")):C.push("bottom")),n<b[0]&&(l.indexOf("left")>=0?(n=b[0],w.push("left")):C.push("left")),n+f>b[2]&&(l.indexOf("right")>=0?(n=b[2]-f,w.push("right")):C.push("right")),w.length&&!function(){var t=void 0;t="undefined"!=typeof e.options.pinnedClass?e.options.pinnedClass:e.getClass("pinned"),g.push(t),w.forEach(function(e){g.push(t+"-"+e)})}(),C.length&&!function(){var t=void 0;t="undefined"!=typeof e.options.outOfBoundsClass?e.options.outOfBoundsClass:e.getClass("out-of-bounds"),g.push(t),C.forEach(function(e){g.push(t+"-"+e)})}(),(w.indexOf("left")>=0||w.indexOf("right")>=0)&&(y.left=v.left=!1),(w.indexOf("top")>=0||w.indexOf("bottom")>=0)&&(y.top=v.top=!1),(v.top!==i.top||v.left!==i.left||y.top!==e.attachment.top||y.left!==e.attachment.left)&&(e.updateAttachClasses(y,v),e.trigger("update",{attachment:y,targetAttachment:v}))}),k(function(){e.options.addTargetClasses!==!1&&m(e.target,g,c),m(e.element,g,c)}),{top:o,left:n}}});var Y=x.Utils,a=Y.getBounds,m=Y.updateClasses,k=Y.defer;x.modules.push({position:function(t){var e=this,o=t.top,n=t.left,i=this.cache("element-bounds",function(){return a(e.element)}),r=i.height,s=i.width,f=this.getTargetBounds(),l=o+r,h=n+s,d=[];o<=f.bottom&&l>=f.top&&["left","right"].forEach(function(t){var e=f[t];(e===n||e===h)&&d.push(t)}),n<=f.right&&h>=f.left&&["top","bottom"].forEach(function(t){var e=f[t];(e===o||e===l)&&d.push(t)});var u=[],p=[],c=["left","top","right","bottom"];return u.push(this.getClass("abutted")),c.forEach(function(t){u.push(e.getClass("abutted")+"-"+t)}),d.length&&p.push(this.getClass("abutted")),d.forEach(function(t){p.push(e.getClass("abutted")+"-"+t)}),k(function(){e.options.addTargetClasses!==!1&&m(e.target,p,u),m(e.element,p,u)}),!0}});var z=function(){function t(t,e){var o=[],n=!0,i=!1,r=void 0;try{for(var s,a=t[Symbol.iterator]();!(n=(s=a.next()).done)&&(o.push(s.value),!e||o.length!==e);n=!0);}catch(f){i=!0,r=f}finally{try{!n&&a["return"]&&a["return"]()}finally{if(i)throw r}}return o}return function(e,o){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return t(e,o);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}();return x.modules.push({position:function(t){var e=t.top,o=t.left;if(this.options.shift){var n=this.options.shift;"function"==typeof this.options.shift&&(n=this.options.shift.call(this,{top:e,left:o}));var i=void 0,r=void 0;if("string"==typeof n){n=n.split(" "),n[1]=n[1]||n[0];var s=n,a=z(s,2);i=a[0],r=a[1],i=parseFloat(i,10),r=parseFloat(r,10)}else i=n.top,r=n.left;return e+=i,o+=r,{top:e,left:o}}}}),$});
!function(t,e){"function"==typeof define&&define.amd?define(["tether"],e):"object"==typeof exports?module.exports=e(require("tether")):t.Drop=e(t.Tether)}(this,function(t){"use strict";function e(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function n(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function, not "+typeof e);t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}function o(t){var e=t.split(" "),n=a(e,2),o=n[0],i=n[1];if(["left","right"].indexOf(o)>=0){var s=[i,o];o=s[0],i=s[1]}return[o,i].join(" ")}function i(t,e){for(var n=void 0,o=[];-1!==(n=t.indexOf(e));)o.push(t.splice(n,1));return o}function s(){var a=arguments.length<=0||void 0===arguments[0]?{}:arguments[0],h=function(){for(var t=arguments.length,e=Array(t),n=0;t>n;n++)e[n]=arguments[n];return new(r.apply(b,[null].concat(e)))};p(h,{createContext:s,drops:[],defaults:{}});var g={classPrefix:"drop",defaults:{position:"bottom left",openOn:"click",beforeClose:null,constrainToScrollParent:!0,constrainToWindow:!0,classes:"",remove:!1,openDelay:0,closeDelay:50,focusDelay:null,blurDelay:null,hoverOpenDelay:null,hoverCloseDelay:null,tetherOptions:{}}};p(h,g,a),p(h.defaults,g.defaults,a.defaults),"undefined"==typeof x[h.classPrefix]&&(x[h.classPrefix]=[]),h.updateBodyClasses=function(){for(var t=!1,e=x[h.classPrefix],n=e.length,o=0;n>o;++o)if(e[o].isOpened()){t=!0;break}t?d(document.body,h.classPrefix+"-open"):c(document.body,h.classPrefix+"-open")};var b=function(s){function r(t){if(e(this,r),u(Object.getPrototypeOf(r.prototype),"constructor",this).call(this),this.options=p({},h.defaults,t),this.target=this.options.target,"undefined"==typeof this.target)throw new Error("Drop Error: You must provide a target.");var n="data-"+h.classPrefix,o=this.target.getAttribute(n);o&&null==this.options.content&&(this.options.content=o);for(var i=["position","openOn"],s=0;s<i.length;++s){var a=this.target.getAttribute(n+"-"+i[s]);a&&null==this.options[i[s]]&&(this.options[i[s]]=a)}this.options.classes&&this.options.addTargetClasses!==!1&&d(this.target,this.options.classes),h.drops.push(this),x[h.classPrefix].push(this),this._boundEvents=[],this.bindMethods(),this.setupElements(),this.setupEvents(),this.setupTether()}return n(r,s),l(r,[{key:"_on",value:function(t,e,n){this._boundEvents.push({element:t,event:e,handler:n}),t.addEventListener(e,n)}},{key:"bindMethods",value:function(){this.transitionEndHandler=this._transitionEndHandler.bind(this)}},{key:"setupElements",value:function(){var t=this;if(this.drop=document.createElement("div"),d(this.drop,h.classPrefix),this.options.classes&&d(this.drop,this.options.classes),this.content=document.createElement("div"),d(this.content,h.classPrefix+"-content"),"function"==typeof this.options.content){var e=function(){var e=t.options.content.call(t,t);if("string"==typeof e)t.content.innerHTML=e;else{if("object"!=typeof e)throw new Error("Drop Error: Content function should return a string or HTMLElement.");t.content.innerHTML="",t.content.appendChild(e)}};e(),this.on("open",e.bind(this))}else"object"==typeof this.options.content?this.content.appendChild(this.options.content):this.content.innerHTML=this.options.content;this.drop.appendChild(this.content)}},{key:"setupTether",value:function(){var e=this.options.position.split(" ");e[0]=E[e[0]],e=e.join(" ");var n=[];this.options.constrainToScrollParent?n.push({to:"scrollParent",pin:"top, bottom",attachment:"together none"}):n.push({to:"scrollParent"}),this.options.constrainToWindow!==!1?n.push({to:"window",attachment:"together"}):n.push({to:"window"});var i={element:this.drop,target:this.target,attachment:o(e),targetAttachment:o(this.options.position),classPrefix:h.classPrefix,offset:"0 0",targetOffset:"0 0",enabled:!1,constraints:n,addTargetClasses:this.options.addTargetClasses};this.options.tetherOptions!==!1&&(this.tether=new t(p({},i,this.options.tetherOptions)))}},{key:"setupEvents",value:function(){var t=this;if(this.options.openOn){if("always"===this.options.openOn)return void setTimeout(this.open.bind(this));var e=this.options.openOn.split(" ");if(e.indexOf("click")>=0)for(var n=function(e){t.toggle(e),e.preventDefault()},o=function(e){t.isOpened()&&(e.target===t.drop||t.drop.contains(e.target)||e.target===t.target||t.target.contains(e.target)||t.close(e))},i=0;i<y.length;++i){var s=y[i];this._on(this.target,s,n),this._on(document,s,o)}var r=null,a=null,l=function(e){null!==a?clearTimeout(a):r=setTimeout(function(){t.open(e),r=null},("focus"===e.type?t.options.focusDelay:t.options.hoverOpenDelay)||t.options.openDelay)},u=function(e){null!==r?clearTimeout(r):a=setTimeout(function(){t.close(e),a=null},("blur"===e.type?t.options.blurDelay:t.options.hoverCloseDelay)||t.options.closeDelay)};e.indexOf("hover")>=0&&(this._on(this.target,"mouseover",l),this._on(this.drop,"mouseover",l),this._on(this.target,"mouseout",u),this._on(this.drop,"mouseout",u)),e.indexOf("focus")>=0&&(this._on(this.target,"focus",l),this._on(this.drop,"focus",l),this._on(this.target,"blur",u),this._on(this.drop,"blur",u))}}},{key:"isOpened",value:function(){return this.drop?f(this.drop,h.classPrefix+"-open"):void 0}},{key:"toggle",value:function(t){this.isOpened()?this.close(t):this.open(t)}},{key:"open",value:function(t){var e=this;this.isOpened()||(this.drop.parentNode||document.body.appendChild(this.drop),"undefined"!=typeof this.tether&&this.tether.enable(),d(this.drop,h.classPrefix+"-open"),d(this.drop,h.classPrefix+"-open-transitionend"),setTimeout(function(){e.drop&&d(e.drop,h.classPrefix+"-after-open")}),"undefined"!=typeof this.tether&&this.tether.position(),this.trigger("open"),h.updateBodyClasses())}},{key:"_transitionEndHandler",value:function(t){t.target===t.currentTarget&&(f(this.drop,h.classPrefix+"-open")||c(this.drop,h.classPrefix+"-open-transitionend"),this.drop.removeEventListener(m,this.transitionEndHandler))}},{key:"beforeCloseHandler",value:function(t){var e=!0;return this.isClosing||"function"!=typeof this.options.beforeClose||(this.isClosing=!0,e=this.options.beforeClose(t,this)!==!1),this.isClosing=!1,e}},{key:"close",value:function(t){this.isOpened()&&this.beforeCloseHandler(t)&&(c(this.drop,h.classPrefix+"-open"),c(this.drop,h.classPrefix+"-after-open"),this.drop.addEventListener(m,this.transitionEndHandler),this.trigger("close"),"undefined"!=typeof this.tether&&this.tether.disable(),h.updateBodyClasses(),this.options.remove&&this.remove(t))}},{key:"remove",value:function(t){this.close(t),this.drop.parentNode&&this.drop.parentNode.removeChild(this.drop)}},{key:"position",value:function(){this.isOpened()&&"undefined"!=typeof this.tether&&this.tether.position()}},{key:"destroy",value:function(){this.remove(),"undefined"!=typeof this.tether&&this.tether.destroy();for(var t=0;t<this._boundEvents.length;++t){var e=this._boundEvents[t],n=e.element,o=e.event,s=e.handler;n.removeEventListener(o,s)}this._boundEvents=[],this.tether=null,this.drop=null,this.content=null,this.target=null,i(x[h.classPrefix],this),i(h.drops,this)}}]),r}(v);return h}var r=Function.prototype.bind,a=function(){function t(t,e){var n=[],o=!0,i=!1,s=void 0;try{for(var r,a=t[Symbol.iterator]();!(o=(r=a.next()).done)&&(n.push(r.value),!e||n.length!==e);o=!0);}catch(l){i=!0,s=l}finally{try{!o&&a["return"]&&a["return"]()}finally{if(i)throw s}}return n}return function(e,n){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return t(e,n);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}(),l=function(){function t(t,e){for(var n=0;n<e.length;n++){var o=e[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}return function(e,n,o){return n&&t(e.prototype,n),o&&t(e,o),e}}(),u=function(t,e,n){for(var o=!0;o;){var i=t,s=e,r=n;o=!1,null===i&&(i=Function.prototype);var a=Object.getOwnPropertyDescriptor(i,s);if(void 0!==a){if("value"in a)return a.value;var l=a.get;if(void 0===l)return;return l.call(r)}var u=Object.getPrototypeOf(i);if(null===u)return;t=u,e=s,n=r,o=!0,a=u=void 0}},h=t.Utils,p=h.extend,d=h.addClass,c=h.removeClass,f=h.hasClass,v=h.Evented,y=["click"];"ontouchstart"in document.documentElement&&y.push("touchstart");var g={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"otransitionend",transition:"transitionend"},m="";for(var b in g)if({}.hasOwnProperty.call(g,b)){var O=document.createElement("p");"undefined"!=typeof O.style[b]&&(m=g[b])}var E={left:"right",right:"left",top:"bottom",bottom:"top",middle:"middle",center:"center"},x={},P=s();return document.addEventListener("DOMContentLoaded",function(){P.updateBodyClasses()}),P});
(function(root,factory){if(typeof exports==="object"&&typeof module==="object")module.exports=factory();else if(typeof define==="function"&&define.amd)define("EventBus",[],factory);else if(typeof exports==="object")exports["EventBus"]=factory();else root["EventBus"]=factory()})(this,function(){var EventBusClass={};EventBusClass=function(){this.listeners={}};EventBusClass.prototype={addEventListener:function(type,callback,scope){var args=[];var numOfArgs=arguments.length;for(var i=0;i<numOfArgs;i++){args.push(arguments[i])}args=args.length>3?args.splice(3,args.length-1):[];if(typeof this.listeners[type]!="undefined"){this.listeners[type].push({scope:scope,callback:callback,args:args})}else{this.listeners[type]=[{scope:scope,callback:callback,args:args}]}},removeEventListener:function(type,callback,scope){if(typeof this.listeners[type]!="undefined"){var numOfCallbacks=this.listeners[type].length;var newArray=[];for(var i=0;i<numOfCallbacks;i++){var listener=this.listeners[type][i];if(listener.scope==scope&&listener.callback==callback){}else{newArray.push(listener)}}this.listeners[type]=newArray}},hasEventListener:function(type,callback,scope){if(typeof this.listeners[type]!="undefined"){var numOfCallbacks=this.listeners[type].length;if(callback===undefined&&scope===undefined){return numOfCallbacks>0}for(var i=0;i<numOfCallbacks;i++){var listener=this.listeners[type][i];if((scope?listener.scope==scope:true)&&listener.callback==callback){return true}}}return false},dispatch:function(type,target){var numOfListeners=0;var event={type:type,target:target};var args=[];var numOfArgs=arguments.length;for(var i=0;i<numOfArgs;i++){args.push(arguments[i])}args=args.length>2?args.splice(2,args.length-1):[];args=[event].concat(args);if(typeof this.listeners[type]!="undefined"){var numOfCallbacks=this.listeners[type].length;for(var i=0;i<numOfCallbacks;i++){var listener=this.listeners[type][i];if(listener&&listener.callback){var concatArgs=args.concat(listener.args);listener.callback.apply(listener.scope,concatArgs);numOfListeners+=1}}}},getEvents:function(){var str="";for(var type in this.listeners){var numOfCallbacks=this.listeners[type].length;for(var i=0;i<numOfCallbacks;i++){var listener=this.listeners[type][i];str+=listener.scope&&listener.scope.className?listener.scope.className:"anonymous";str+=" listen for '"+type+"'\n"}}return str}};var EventBus=new EventBusClass;return EventBus});
/* perfect-scrollbar v0.6.12 */
!function t(e,n,r){function o(l,a){if(!n[l]){if(!e[l]){var s="function"==typeof require&&require;if(!a&&s)return s(l,!0);if(i)return i(l,!0);var c=new Error("Cannot find module '"+l+"'");throw c.code="MODULE_NOT_FOUND",c}var u=n[l]={exports:{}};e[l][0].call(u.exports,function(t){var n=e[l][1][t];return o(n?n:t)},u,u.exports,t,e,n,r)}return n[l].exports}for(var i="function"==typeof require&&require,l=0;l<r.length;l++)o(r[l]);return o}({1:[function(t,e,n){"use strict";function r(t){t.fn.perfectScrollbar=function(t){return this.each(function(){if("object"==typeof t||"undefined"==typeof t){var e=t;i.get(this)||o.initialize(this,e)}else{var n=t;"update"===n?o.update(this):"destroy"===n&&o.destroy(this)}})}}var o=t("../main"),i=t("../plugin/instances");if("function"==typeof define&&define.amd)define(["jquery"],r);else{var l=window.jQuery?window.jQuery:window.$;"undefined"!=typeof l&&r(l)}e.exports=r},{"../main":7,"../plugin/instances":18}],2:[function(t,e,n){"use strict";function r(t,e){var n=t.className.split(" ");n.indexOf(e)<0&&n.push(e),t.className=n.join(" ")}function o(t,e){var n=t.className.split(" "),r=n.indexOf(e);r>=0&&n.splice(r,1),t.className=n.join(" ")}n.add=function(t,e){t.classList?t.classList.add(e):r(t,e)},n.remove=function(t,e){t.classList?t.classList.remove(e):o(t,e)},n.list=function(t){return t.classList?Array.prototype.slice.apply(t.classList):t.className.split(" ")}},{}],3:[function(t,e,n){"use strict";function r(t,e){return window.getComputedStyle(t)[e]}function o(t,e,n){return"number"==typeof n&&(n=n.toString()+"px"),t.style[e]=n,t}function i(t,e){for(var n in e){var r=e[n];"number"==typeof r&&(r=r.toString()+"px"),t.style[n]=r}return t}var l={};l.e=function(t,e){var n=document.createElement(t);return n.className=e,n},l.appendTo=function(t,e){return e.appendChild(t),t},l.css=function(t,e,n){return"object"==typeof e?i(t,e):"undefined"==typeof n?r(t,e):o(t,e,n)},l.matches=function(t,e){return"undefined"!=typeof t.matches?t.matches(e):"undefined"!=typeof t.matchesSelector?t.matchesSelector(e):"undefined"!=typeof t.webkitMatchesSelector?t.webkitMatchesSelector(e):"undefined"!=typeof t.mozMatchesSelector?t.mozMatchesSelector(e):"undefined"!=typeof t.msMatchesSelector?t.msMatchesSelector(e):void 0},l.remove=function(t){"undefined"!=typeof t.remove?t.remove():t.parentNode&&t.parentNode.removeChild(t)},l.queryChildren=function(t,e){return Array.prototype.filter.call(t.childNodes,function(t){return l.matches(t,e)})},e.exports=l},{}],4:[function(t,e,n){"use strict";var r=function(t){this.element=t,this.events={}};r.prototype.bind=function(t,e){"undefined"==typeof this.events[t]&&(this.events[t]=[]),this.events[t].push(e),this.element.addEventListener(t,e,!1)},r.prototype.unbind=function(t,e){var n="undefined"!=typeof e;this.events[t]=this.events[t].filter(function(r){return n&&r!==e?!0:(this.element.removeEventListener(t,r,!1),!1)},this)},r.prototype.unbindAll=function(){for(var t in this.events)this.unbind(t)};var o=function(){this.eventElements=[]};o.prototype.eventElement=function(t){var e=this.eventElements.filter(function(e){return e.element===t})[0];return"undefined"==typeof e&&(e=new r(t),this.eventElements.push(e)),e},o.prototype.bind=function(t,e,n){this.eventElement(t).bind(e,n)},o.prototype.unbind=function(t,e,n){this.eventElement(t).unbind(e,n)},o.prototype.unbindAll=function(){for(var t=0;t<this.eventElements.length;t++)this.eventElements[t].unbindAll()},o.prototype.once=function(t,e,n){var r=this.eventElement(t),o=function(t){r.unbind(e,o),n(t)};r.bind(e,o)},e.exports=o},{}],5:[function(t,e,n){"use strict";e.exports=function(){function t(){return Math.floor(65536*(1+Math.random())).toString(16).substring(1)}return function(){return t()+t()+"-"+t()+"-"+t()+"-"+t()+"-"+t()+t()+t()}}()},{}],6:[function(t,e,n){"use strict";var r=t("./class"),o=t("./dom"),i=n.toInt=function(t){return parseInt(t,10)||0},l=n.clone=function(t){if(null===t)return null;if(t.constructor===Array)return t.map(l);if("object"==typeof t){var e={};for(var n in t)e[n]=l(t[n]);return e}return t};n.extend=function(t,e){var n=l(t);for(var r in e)n[r]=l(e[r]);return n},n.isEditable=function(t){return o.matches(t,"input,[contenteditable]")||o.matches(t,"select,[contenteditable]")||o.matches(t,"textarea,[contenteditable]")||o.matches(t,"button,[contenteditable]")},n.removePsClasses=function(t){for(var e=r.list(t),n=0;n<e.length;n++){var o=e[n];0===o.indexOf("ps-")&&r.remove(t,o)}},n.outerWidth=function(t){return i(o.css(t,"width"))+i(o.css(t,"paddingLeft"))+i(o.css(t,"paddingRight"))+i(o.css(t,"borderLeftWidth"))+i(o.css(t,"borderRightWidth"))},n.startScrolling=function(t,e){r.add(t,"ps-in-scrolling"),"undefined"!=typeof e?r.add(t,"ps-"+e):(r.add(t,"ps-x"),r.add(t,"ps-y"))},n.stopScrolling=function(t,e){r.remove(t,"ps-in-scrolling"),"undefined"!=typeof e?r.remove(t,"ps-"+e):(r.remove(t,"ps-x"),r.remove(t,"ps-y"))},n.env={isWebKit:"WebkitAppearance"in document.documentElement.style,supportsTouch:"ontouchstart"in window||window.DocumentTouch&&document instanceof window.DocumentTouch,supportsIePointer:null!==window.navigator.msMaxTouchPoints}},{"./class":2,"./dom":3}],7:[function(t,e,n){"use strict";var r=t("./plugin/destroy"),o=t("./plugin/initialize"),i=t("./plugin/update");e.exports={initialize:o,update:i,destroy:r}},{"./plugin/destroy":9,"./plugin/initialize":17,"./plugin/update":21}],8:[function(t,e,n){"use strict";e.exports={handlers:["click-rail","drag-scrollbar","keyboard","wheel","touch"],maxScrollbarLength:null,minScrollbarLength:null,scrollXMarginOffset:0,scrollYMarginOffset:0,stopPropagationOnClick:!0,suppressScrollX:!1,suppressScrollY:!1,swipePropagation:!0,useBothWheelAxes:!1,wheelPropagation:!1,wheelSpeed:1,theme:"default"}},{}],9:[function(t,e,n){"use strict";var r=t("../lib/helper"),o=t("../lib/dom"),i=t("./instances");e.exports=function(t){var e=i.get(t);e&&(e.event.unbindAll(),o.remove(e.scrollbarX),o.remove(e.scrollbarY),o.remove(e.scrollbarXRail),o.remove(e.scrollbarYRail),r.removePsClasses(t),i.remove(t))}},{"../lib/dom":3,"../lib/helper":6,"./instances":18}],10:[function(t,e,n){"use strict";function r(t,e){function n(t){return t.getBoundingClientRect()}var r=function(t){t.stopPropagation()};e.settings.stopPropagationOnClick&&e.event.bind(e.scrollbarY,"click",r),e.event.bind(e.scrollbarYRail,"click",function(r){var i=o.toInt(e.scrollbarYHeight/2),s=e.railYRatio*(r.pageY-window.pageYOffset-n(e.scrollbarYRail).top-i),c=e.railYRatio*(e.railYHeight-e.scrollbarYHeight),u=s/c;0>u?u=0:u>1&&(u=1),a(t,"top",(e.contentHeight-e.containerHeight)*u),l(t),r.stopPropagation()}),e.settings.stopPropagationOnClick&&e.event.bind(e.scrollbarX,"click",r),e.event.bind(e.scrollbarXRail,"click",function(r){var i=o.toInt(e.scrollbarXWidth/2),s=e.railXRatio*(r.pageX-window.pageXOffset-n(e.scrollbarXRail).left-i),c=e.railXRatio*(e.railXWidth-e.scrollbarXWidth),u=s/c;0>u?u=0:u>1&&(u=1),a(t,"left",(e.contentWidth-e.containerWidth)*u-e.negativeScrollAdjustment),l(t),r.stopPropagation()})}var o=t("../../lib/helper"),i=t("../instances"),l=t("../update-geometry"),a=t("../update-scroll");e.exports=function(t){var e=i.get(t);r(t,e)}},{"../../lib/helper":6,"../instances":18,"../update-geometry":19,"../update-scroll":20}],11:[function(t,e,n){"use strict";function r(t,e){function n(n){var o=r+n*e.railXRatio,l=Math.max(0,e.scrollbarXRail.getBoundingClientRect().left)+e.railXRatio*(e.railXWidth-e.scrollbarXWidth);0>o?e.scrollbarXLeft=0:o>l?e.scrollbarXLeft=l:e.scrollbarXLeft=o;var a=i.toInt(e.scrollbarXLeft*(e.contentWidth-e.containerWidth)/(e.containerWidth-e.railXRatio*e.scrollbarXWidth))-e.negativeScrollAdjustment;c(t,"left",a)}var r=null,o=null,a=function(e){n(e.pageX-o),s(t),e.stopPropagation(),e.preventDefault()},u=function(){i.stopScrolling(t,"x"),e.event.unbind(e.ownerDocument,"mousemove",a)};e.event.bind(e.scrollbarX,"mousedown",function(n){o=n.pageX,r=i.toInt(l.css(e.scrollbarX,"left"))*e.railXRatio,i.startScrolling(t,"x"),e.event.bind(e.ownerDocument,"mousemove",a),e.event.once(e.ownerDocument,"mouseup",u),n.stopPropagation(),n.preventDefault()})}function o(t,e){function n(n){var o=r+n*e.railYRatio,l=Math.max(0,e.scrollbarYRail.getBoundingClientRect().top)+e.railYRatio*(e.railYHeight-e.scrollbarYHeight);0>o?e.scrollbarYTop=0:o>l?e.scrollbarYTop=l:e.scrollbarYTop=o;var a=i.toInt(e.scrollbarYTop*(e.contentHeight-e.containerHeight)/(e.containerHeight-e.railYRatio*e.scrollbarYHeight));c(t,"top",a)}var r=null,o=null,a=function(e){n(e.pageY-o),s(t),e.stopPropagation(),e.preventDefault()},u=function(){i.stopScrolling(t,"y"),e.event.unbind(e.ownerDocument,"mousemove",a)};e.event.bind(e.scrollbarY,"mousedown",function(n){o=n.pageY,r=i.toInt(l.css(e.scrollbarY,"top"))*e.railYRatio,i.startScrolling(t,"y"),e.event.bind(e.ownerDocument,"mousemove",a),e.event.once(e.ownerDocument,"mouseup",u),n.stopPropagation(),n.preventDefault()})}var i=t("../../lib/helper"),l=t("../../lib/dom"),a=t("../instances"),s=t("../update-geometry"),c=t("../update-scroll");e.exports=function(t){var e=a.get(t);r(t,e),o(t,e)}},{"../../lib/dom":3,"../../lib/helper":6,"../instances":18,"../update-geometry":19,"../update-scroll":20}],12:[function(t,e,n){"use strict";function r(t,e){function n(n,r){var o=t.scrollTop;if(0===n){if(!e.scrollbarYActive)return!1;if(0===o&&r>0||o>=e.contentHeight-e.containerHeight&&0>r)return!e.settings.wheelPropagation}var i=t.scrollLeft;if(0===r){if(!e.scrollbarXActive)return!1;if(0===i&&0>n||i>=e.contentWidth-e.containerWidth&&n>0)return!e.settings.wheelPropagation}return!0}var r=!1;e.event.bind(t,"mouseenter",function(){r=!0}),e.event.bind(t,"mouseleave",function(){r=!1});var l=!1;e.event.bind(e.ownerDocument,"keydown",function(c){if(!(c.isDefaultPrevented&&c.isDefaultPrevented()||c.defaultPrevented)){var u=i.matches(e.scrollbarX,":focus")||i.matches(e.scrollbarY,":focus");if(r||u){var d=document.activeElement?document.activeElement:e.ownerDocument.activeElement;if(d){if("IFRAME"===d.tagName)d=d.contentDocument.activeElement;else for(;d.shadowRoot;)d=d.shadowRoot.activeElement;if(o.isEditable(d))return}var p=0,f=0;switch(c.which){case 37:p=-30;break;case 38:f=30;break;case 39:p=30;break;case 40:f=-30;break;case 33:f=90;break;case 32:f=c.shiftKey?90:-90;break;case 34:f=-90;break;case 35:f=c.ctrlKey?-e.contentHeight:-e.containerHeight;break;case 36:f=c.ctrlKey?t.scrollTop:e.containerHeight;break;default:return}s(t,"top",t.scrollTop-f),s(t,"left",t.scrollLeft+p),a(t),l=n(p,f),l&&c.preventDefault()}}})}var o=t("../../lib/helper"),i=t("../../lib/dom"),l=t("../instances"),a=t("../update-geometry"),s=t("../update-scroll");e.exports=function(t){var e=l.get(t);r(t,e)}},{"../../lib/dom":3,"../../lib/helper":6,"../instances":18,"../update-geometry":19,"../update-scroll":20}],13:[function(t,e,n){"use strict";function r(t,e){function n(n,r){var o=t.scrollTop;if(0===n){if(!e.scrollbarYActive)return!1;if(0===o&&r>0||o>=e.contentHeight-e.containerHeight&&0>r)return!e.settings.wheelPropagation}var i=t.scrollLeft;if(0===r){if(!e.scrollbarXActive)return!1;if(0===i&&0>n||i>=e.contentWidth-e.containerWidth&&n>0)return!e.settings.wheelPropagation}return!0}function r(t){var e=t.deltaX,n=-1*t.deltaY;return"undefined"!=typeof e&&"undefined"!=typeof n||(e=-1*t.wheelDeltaX/6,n=t.wheelDeltaY/6),t.deltaMode&&1===t.deltaMode&&(e*=10,n*=10),e!==e&&n!==n&&(e=0,n=t.wheelDelta),[e,n]}function o(e,n){var r=t.querySelector("textarea:hover, select[multiple]:hover, .ps-child:hover");if(r){if("TEXTAREA"!==r.tagName&&!window.getComputedStyle(r).overflow.match(/(scroll|auto)/))return!1;var o=r.scrollHeight-r.clientHeight;if(o>0&&!(0===r.scrollTop&&n>0||r.scrollTop===o&&0>n))return!0;var i=r.scrollLeft-r.clientWidth;if(i>0&&!(0===r.scrollLeft&&0>e||r.scrollLeft===i&&e>0))return!0}return!1}function a(a){var c=r(a),u=c[0],d=c[1];o(u,d)||(s=!1,e.settings.useBothWheelAxes?e.scrollbarYActive&&!e.scrollbarXActive?(d?l(t,"top",t.scrollTop-d*e.settings.wheelSpeed):l(t,"top",t.scrollTop+u*e.settings.wheelSpeed),s=!0):e.scrollbarXActive&&!e.scrollbarYActive&&(u?l(t,"left",t.scrollLeft+u*e.settings.wheelSpeed):l(t,"left",t.scrollLeft-d*e.settings.wheelSpeed),s=!0):(l(t,"top",t.scrollTop-d*e.settings.wheelSpeed),l(t,"left",t.scrollLeft+u*e.settings.wheelSpeed)),i(t),s=s||n(u,d),s&&(a.stopPropagation(),a.preventDefault()))}var s=!1;"undefined"!=typeof window.onwheel?e.event.bind(t,"wheel",a):"undefined"!=typeof window.onmousewheel&&e.event.bind(t,"mousewheel",a)}var o=t("../instances"),i=t("../update-geometry"),l=t("../update-scroll");e.exports=function(t){var e=o.get(t);r(t,e)}},{"../instances":18,"../update-geometry":19,"../update-scroll":20}],14:[function(t,e,n){"use strict";function r(t,e){e.event.bind(t,"scroll",function(){i(t)})}var o=t("../instances"),i=t("../update-geometry");e.exports=function(t){var e=o.get(t);r(t,e)}},{"../instances":18,"../update-geometry":19}],15:[function(t,e,n){"use strict";function r(t,e){function n(){var t=window.getSelection?window.getSelection():document.getSelection?document.getSelection():"";return 0===t.toString().length?null:t.getRangeAt(0).commonAncestorContainer}function r(){c||(c=setInterval(function(){return i.get(t)?(a(t,"top",t.scrollTop+u.top),a(t,"left",t.scrollLeft+u.left),void l(t)):void clearInterval(c)},50))}function s(){c&&(clearInterval(c),c=null),o.stopScrolling(t)}var c=null,u={top:0,left:0},d=!1;e.event.bind(e.ownerDocument,"selectionchange",function(){t.contains(n())?d=!0:(d=!1,s())}),e.event.bind(window,"mouseup",function(){d&&(d=!1,s())}),e.event.bind(window,"mousemove",function(e){if(d){var n={x:e.pageX,y:e.pageY},i={left:t.offsetLeft,right:t.offsetLeft+t.offsetWidth,top:t.offsetTop,bottom:t.offsetTop+t.offsetHeight};n.x<i.left+3?(u.left=-5,o.startScrolling(t,"x")):n.x>i.right-3?(u.left=5,o.startScrolling(t,"x")):u.left=0,n.y<i.top+3?(i.top+3-n.y<5?u.top=-5:u.top=-20,o.startScrolling(t,"y")):n.y>i.bottom-3?(n.y-i.bottom+3<5?u.top=5:u.top=20,o.startScrolling(t,"y")):u.top=0,0===u.top&&0===u.left?s():r()}})}var o=t("../../lib/helper"),i=t("../instances"),l=t("../update-geometry"),a=t("../update-scroll");e.exports=function(t){var e=i.get(t);r(t,e)}},{"../../lib/helper":6,"../instances":18,"../update-geometry":19,"../update-scroll":20}],16:[function(t,e,n){"use strict";function r(t,e,n,r){function o(n,r){var o=t.scrollTop,i=t.scrollLeft,l=Math.abs(n),a=Math.abs(r);if(a>l){if(0>r&&o===e.contentHeight-e.containerHeight||r>0&&0===o)return!e.settings.swipePropagation}else if(l>a&&(0>n&&i===e.contentWidth-e.containerWidth||n>0&&0===i))return!e.settings.swipePropagation;return!0}function s(e,n){a(t,"top",t.scrollTop-n),a(t,"left",t.scrollLeft-e),l(t)}function c(){Y=!0}function u(){Y=!1}function d(t){return t.targetTouches?t.targetTouches[0]:t}function p(t){return t.targetTouches&&1===t.targetTouches.length?!0:!(!t.pointerType||"mouse"===t.pointerType||t.pointerType===t.MSPOINTER_TYPE_MOUSE)}function f(t){if(p(t)){w=!0;var e=d(t);v.pageX=e.pageX,v.pageY=e.pageY,g=(new Date).getTime(),null!==y&&clearInterval(y),t.stopPropagation()}}function h(t){if(!w&&e.settings.swipePropagation&&f(t),!Y&&w&&p(t)){var n=d(t),r={pageX:n.pageX,pageY:n.pageY},i=r.pageX-v.pageX,l=r.pageY-v.pageY;s(i,l),v=r;var a=(new Date).getTime(),c=a-g;c>0&&(m.x=i/c,m.y=l/c,g=a),o(i,l)&&(t.stopPropagation(),t.preventDefault())}}function b(){!Y&&w&&(w=!1,clearInterval(y),y=setInterval(function(){return i.get(t)?Math.abs(m.x)<.01&&Math.abs(m.y)<.01?void clearInterval(y):(s(30*m.x,30*m.y),m.x*=.8,void(m.y*=.8)):void clearInterval(y)},10))}var v={},g=0,m={},y=null,Y=!1,w=!1;n&&(e.event.bind(window,"touchstart",c),e.event.bind(window,"touchend",u),e.event.bind(t,"touchstart",f),e.event.bind(t,"touchmove",h),e.event.bind(t,"touchend",b)),r&&(window.PointerEvent?(e.event.bind(window,"pointerdown",c),e.event.bind(window,"pointerup",u),e.event.bind(t,"pointerdown",f),e.event.bind(t,"pointermove",h),e.event.bind(t,"pointerup",b)):window.MSPointerEvent&&(e.event.bind(window,"MSPointerDown",c),e.event.bind(window,"MSPointerUp",u),e.event.bind(t,"MSPointerDown",f),e.event.bind(t,"MSPointerMove",h),e.event.bind(t,"MSPointerUp",b)))}var o=t("../../lib/helper"),i=t("../instances"),l=t("../update-geometry"),a=t("../update-scroll");e.exports=function(t){if(o.env.supportsTouch||o.env.supportsIePointer){var e=i.get(t);r(t,e,o.env.supportsTouch,o.env.supportsIePointer)}}},{"../../lib/helper":6,"../instances":18,"../update-geometry":19,"../update-scroll":20}],17:[function(t,e,n){"use strict";var r=t("../lib/helper"),o=t("../lib/class"),i=t("./instances"),l=t("./update-geometry"),a={"click-rail":t("./handler/click-rail"),"drag-scrollbar":t("./handler/drag-scrollbar"),keyboard:t("./handler/keyboard"),wheel:t("./handler/mouse-wheel"),touch:t("./handler/touch"),selection:t("./handler/selection")},s=t("./handler/native-scroll");e.exports=function(t,e){e="object"==typeof e?e:{},o.add(t,"ps-container");var n=i.add(t);n.settings=r.extend(n.settings,e),o.add(t,"ps-theme-"+n.settings.theme),n.settings.handlers.forEach(function(e){a[e](t)}),s(t),l(t)}},{"../lib/class":2,"../lib/helper":6,"./handler/click-rail":10,"./handler/drag-scrollbar":11,"./handler/keyboard":12,"./handler/mouse-wheel":13,"./handler/native-scroll":14,"./handler/selection":15,"./handler/touch":16,"./instances":18,"./update-geometry":19}],18:[function(t,e,n){"use strict";function r(t){function e(){s.add(t,"ps-focus")}function n(){s.remove(t,"ps-focus")}var r=this;r.settings=a.clone(c),r.containerWidth=null,r.containerHeight=null,r.contentWidth=null,r.contentHeight=null,r.isRtl="rtl"===u.css(t,"direction"),r.isNegativeScroll=function(){var e=t.scrollLeft,n=null;return t.scrollLeft=-1,n=t.scrollLeft<0,t.scrollLeft=e,n}(),r.negativeScrollAdjustment=r.isNegativeScroll?t.scrollWidth-t.clientWidth:0,r.event=new d,r.ownerDocument=t.ownerDocument||document,r.scrollbarXRail=u.appendTo(u.e("div","ps-scrollbar-x-rail"),t),r.scrollbarX=u.appendTo(u.e("div","ps-scrollbar-x"),r.scrollbarXRail),r.scrollbarX.setAttribute("tabindex",0),r.event.bind(r.scrollbarX,"focus",e),r.event.bind(r.scrollbarX,"blur",n),r.scrollbarXActive=null,r.scrollbarXWidth=null,r.scrollbarXLeft=null,r.scrollbarXBottom=a.toInt(u.css(r.scrollbarXRail,"bottom")),r.isScrollbarXUsingBottom=r.scrollbarXBottom===r.scrollbarXBottom,r.scrollbarXTop=r.isScrollbarXUsingBottom?null:a.toInt(u.css(r.scrollbarXRail,"top")),r.railBorderXWidth=a.toInt(u.css(r.scrollbarXRail,"borderLeftWidth"))+a.toInt(u.css(r.scrollbarXRail,"borderRightWidth")),u.css(r.scrollbarXRail,"display","block"),r.railXMarginWidth=a.toInt(u.css(r.scrollbarXRail,"marginLeft"))+a.toInt(u.css(r.scrollbarXRail,"marginRight")),u.css(r.scrollbarXRail,"display",""),r.railXWidth=null,r.railXRatio=null,r.scrollbarYRail=u.appendTo(u.e("div","ps-scrollbar-y-rail"),t),r.scrollbarY=u.appendTo(u.e("div","ps-scrollbar-y"),r.scrollbarYRail),r.scrollbarY.setAttribute("tabindex",0),r.event.bind(r.scrollbarY,"focus",e),r.event.bind(r.scrollbarY,"blur",n),r.scrollbarYActive=null,r.scrollbarYHeight=null,r.scrollbarYTop=null,r.scrollbarYRight=a.toInt(u.css(r.scrollbarYRail,"right")),r.isScrollbarYUsingRight=r.scrollbarYRight===r.scrollbarYRight,r.scrollbarYLeft=r.isScrollbarYUsingRight?null:a.toInt(u.css(r.scrollbarYRail,"left")),r.scrollbarYOuterWidth=r.isRtl?a.outerWidth(r.scrollbarY):null,r.railBorderYWidth=a.toInt(u.css(r.scrollbarYRail,"borderTopWidth"))+a.toInt(u.css(r.scrollbarYRail,"borderBottomWidth")),u.css(r.scrollbarYRail,"display","block"),r.railYMarginHeight=a.toInt(u.css(r.scrollbarYRail,"marginTop"))+a.toInt(u.css(r.scrollbarYRail,"marginBottom")),u.css(r.scrollbarYRail,"display",""),r.railYHeight=null,r.railYRatio=null}function o(t){return t.getAttribute("data-ps-id")}function i(t,e){t.setAttribute("data-ps-id",e)}function l(t){t.removeAttribute("data-ps-id")}var a=t("../lib/helper"),s=t("../lib/class"),c=t("./default-setting"),u=t("../lib/dom"),d=t("../lib/event-manager"),p=t("../lib/guid"),f={};n.add=function(t){var e=p();return i(t,e),f[e]=new r(t),f[e]},n.remove=function(t){delete f[o(t)],l(t)},n.get=function(t){return f[o(t)]}},{"../lib/class":2,"../lib/dom":3,"../lib/event-manager":4,"../lib/guid":5,"../lib/helper":6,"./default-setting":8}],19:[function(t,e,n){"use strict";function r(t,e){return t.settings.minScrollbarLength&&(e=Math.max(e,t.settings.minScrollbarLength)),t.settings.maxScrollbarLength&&(e=Math.min(e,t.settings.maxScrollbarLength)),e}function o(t,e){var n={width:e.railXWidth};e.isRtl?n.left=e.negativeScrollAdjustment+t.scrollLeft+e.containerWidth-e.contentWidth:n.left=t.scrollLeft,e.isScrollbarXUsingBottom?n.bottom=e.scrollbarXBottom-t.scrollTop:n.top=e.scrollbarXTop+t.scrollTop,a.css(e.scrollbarXRail,n);var r={top:t.scrollTop,height:e.railYHeight};e.isScrollbarYUsingRight?e.isRtl?r.right=e.contentWidth-(e.negativeScrollAdjustment+t.scrollLeft)-e.scrollbarYRight-e.scrollbarYOuterWidth:r.right=e.scrollbarYRight-t.scrollLeft:e.isRtl?r.left=e.negativeScrollAdjustment+t.scrollLeft+2*e.containerWidth-e.contentWidth-e.scrollbarYLeft-e.scrollbarYOuterWidth:r.left=e.scrollbarYLeft+t.scrollLeft,a.css(e.scrollbarYRail,r),a.css(e.scrollbarX,{left:e.scrollbarXLeft,width:e.scrollbarXWidth-e.railBorderXWidth}),a.css(e.scrollbarY,{top:e.scrollbarYTop,height:e.scrollbarYHeight-e.railBorderYWidth})}var i=t("../lib/helper"),l=t("../lib/class"),a=t("../lib/dom"),s=t("./instances"),c=t("./update-scroll");e.exports=function(t){var e=s.get(t);e.containerWidth=t.clientWidth,e.containerHeight=t.clientHeight,e.contentWidth=t.scrollWidth,e.contentHeight=t.scrollHeight;var n;t.contains(e.scrollbarXRail)||(n=a.queryChildren(t,".ps-scrollbar-x-rail"),n.length>0&&n.forEach(function(t){a.remove(t)}),a.appendTo(e.scrollbarXRail,t)),t.contains(e.scrollbarYRail)||(n=a.queryChildren(t,".ps-scrollbar-y-rail"),n.length>0&&n.forEach(function(t){a.remove(t)}),a.appendTo(e.scrollbarYRail,t)),!e.settings.suppressScrollX&&e.containerWidth+e.settings.scrollXMarginOffset<e.contentWidth?(e.scrollbarXActive=!0,e.railXWidth=e.containerWidth-e.railXMarginWidth,e.railXRatio=e.containerWidth/e.railXWidth,e.scrollbarXWidth=r(e,i.toInt(e.railXWidth*e.containerWidth/e.contentWidth)),e.scrollbarXLeft=i.toInt((e.negativeScrollAdjustment+t.scrollLeft)*(e.railXWidth-e.scrollbarXWidth)/(e.contentWidth-e.containerWidth))):e.scrollbarXActive=!1,!e.settings.suppressScrollY&&e.containerHeight+e.settings.scrollYMarginOffset<e.contentHeight?(e.scrollbarYActive=!0,e.railYHeight=e.containerHeight-e.railYMarginHeight,e.railYRatio=e.containerHeight/e.railYHeight,e.scrollbarYHeight=r(e,i.toInt(e.railYHeight*e.containerHeight/e.contentHeight)),e.scrollbarYTop=i.toInt(t.scrollTop*(e.railYHeight-e.scrollbarYHeight)/(e.contentHeight-e.containerHeight))):e.scrollbarYActive=!1,e.scrollbarXLeft>=e.railXWidth-e.scrollbarXWidth&&(e.scrollbarXLeft=e.railXWidth-e.scrollbarXWidth),e.scrollbarYTop>=e.railYHeight-e.scrollbarYHeight&&(e.scrollbarYTop=e.railYHeight-e.scrollbarYHeight),o(t,e),e.scrollbarXActive?l.add(t,"ps-active-x"):(l.remove(t,"ps-active-x"),e.scrollbarXWidth=0,e.scrollbarXLeft=0,c(t,"left",0)),e.scrollbarYActive?l.add(t,"ps-active-y"):(l.remove(t,"ps-active-y"),e.scrollbarYHeight=0,e.scrollbarYTop=0,c(t,"top",0))}},{"../lib/class":2,"../lib/dom":3,"../lib/helper":6,"./instances":18,"./update-scroll":20}],20:[function(t,e,n){"use strict";var r,o,i=t("./instances"),l=document.createEvent("Event"),a=document.createEvent("Event"),s=document.createEvent("Event"),c=document.createEvent("Event"),u=document.createEvent("Event"),d=document.createEvent("Event"),p=document.createEvent("Event"),f=document.createEvent("Event"),h=document.createEvent("Event"),b=document.createEvent("Event");l.initEvent("ps-scroll-up",!0,!0),a.initEvent("ps-scroll-down",!0,!0),s.initEvent("ps-scroll-left",!0,!0),c.initEvent("ps-scroll-right",!0,!0),u.initEvent("ps-scroll-y",!0,!0),d.initEvent("ps-scroll-x",!0,!0),p.initEvent("ps-x-reach-start",!0,!0),f.initEvent("ps-x-reach-end",!0,!0),h.initEvent("ps-y-reach-start",!0,!0),b.initEvent("ps-y-reach-end",!0,!0),e.exports=function(t,e,n){if("undefined"==typeof t)throw"You must provide an element to the update-scroll function";if("undefined"==typeof e)throw"You must provide an axis to the update-scroll function";if("undefined"==typeof n)throw"You must provide a value to the update-scroll function";"top"===e&&0>=n&&(t.scrollTop=n=0,t.dispatchEvent(h)),"left"===e&&0>=n&&(t.scrollLeft=n=0,t.dispatchEvent(p));var v=i.get(t);"top"===e&&n>=v.contentHeight-v.containerHeight&&(n=v.contentHeight-v.containerHeight,n-t.scrollTop<=1?n=t.scrollTop:t.scrollTop=n,t.dispatchEvent(b)),"left"===e&&n>=v.contentWidth-v.containerWidth&&(n=v.contentWidth-v.containerWidth,n-t.scrollLeft<=1?n=t.scrollLeft:t.scrollLeft=n,t.dispatchEvent(f)),r||(r=t.scrollTop),o||(o=t.scrollLeft),"top"===e&&r>n&&t.dispatchEvent(l),"top"===e&&n>r&&t.dispatchEvent(a),"left"===e&&o>n&&t.dispatchEvent(s),"left"===e&&n>o&&t.dispatchEvent(c),"top"===e&&(t.scrollTop=r=n,t.dispatchEvent(u)),"left"===e&&(t.scrollLeft=o=n,t.dispatchEvent(d))}},{"./instances":18}],21:[function(t,e,n){"use strict";var r=t("../lib/helper"),o=t("../lib/dom"),i=t("./instances"),l=t("./update-geometry"),a=t("./update-scroll");e.exports=function(t){var e=i.get(t);e&&(e.negativeScrollAdjustment=e.isNegativeScroll?t.scrollWidth-t.clientWidth:0,o.css(e.scrollbarXRail,"display","block"),o.css(e.scrollbarYRail,"display","block"),e.railXMarginWidth=r.toInt(o.css(e.scrollbarXRail,"marginLeft"))+r.toInt(o.css(e.scrollbarXRail,"marginRight")),e.railYMarginHeight=r.toInt(o.css(e.scrollbarYRail,"marginTop"))+r.toInt(o.css(e.scrollbarYRail,"marginBottom")),o.css(e.scrollbarXRail,"display","none"),o.css(e.scrollbarYRail,"display","none"),l(t),a(t,"top",t.scrollTop),a(t,"left",t.scrollLeft),o.css(e.scrollbarXRail,"display",""),o.css(e.scrollbarYRail,"display",""))}},{"../lib/dom":3,"../lib/helper":6,"./instances":18,"./update-geometry":19,"./update-scroll":20}]},{},[1]);
"use strict";

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol ? "symbol" : typeof obj; };

/* ImageMapster
   Version: 1.2.14-beta1 (6/18/2013)

Copyright 2011-2012 James Treworgy

http://www.outsharked.com/imagemapster
https://github.com/jamietre/ImageMapster

A jQuery plugin to enhance image maps.

*/
/// The above copyright notice and this permission notice shall be
/// NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
/** @license MIT License (c) copyright B Cavalier & J Hann */
!function (e) {
   e(function () {
      function e() {}function t(t) {
         var n = new e();return n.then = function (e) {
            var n;try {
               return e && (n = e(t)), s(n === _ ? t : n);
            } catch (i) {
               return a(i);
            }
         }, w(n);
      }function a(t) {
         var n = new e();return n.then = function (e, n) {
            var i;try {
               return n ? (i = n(t), s(i === _ ? t : i)) : a(t);
            } catch (o) {
               return a(o);
            }
         }, w(n);
      }function n(e) {
         return r(e, function (e) {
            return a(e);
         });
      }function i() {
         function n(e, t, a) {
            return p(e, t, a);
         }function o(e) {
            _d(t(e));
         }function r(e) {
            _d(a(e));
         }function s(e) {
            f(e);
         }var c, l, u, h, p, f, _d;return u = [], h = [], p = function p(e, t, a) {
            var n = i();return u.push(function (a) {
               a.then(e, t).then(n.resolve, n.reject, n.progress);
            }), a && h.push(a), n.promise;
         }, f = function f(e) {
            for (var t, a = 0; t = h[a++];) {
               t(e);
            }
         }, _d = function d(e) {
            var t,
                a = 0;for (p = e.then, _d = f = function f() {
               throw new Error("already completed");
            }, h = _; t = u[a++];) {
               t(e);
            }u = [];
         }, c = {}, l = new e(), l.then = c.then = n, c.promise = w(l), c.resolver = w({ resolve: c.resolve = o, reject: c.reject = r, progress: c.progress = s }), c;
      }function o(e) {
         return e && "function" == typeof e.then;
      }function r(e, t, a, n) {
         var i = s(e);return i.then(t, a, n);
      }function s(t) {
         var a, n;return t instanceof e ? a = t : (n = i(), o(t) ? (t.then(n.resolve, n.reject, n.progress), a = n.promise) : (n.resolve(t), a = n.promise)), a;
      }function c(e, t, a, n, o) {
         return v(2, arguments), r(e, function (e) {
            function s(e) {
               m(e);
            }function c(e) {
               g(e);
            }function l(e) {
               v(e);
            }function u() {
               m = g = v = y;
            }var h, p, f, d, m, g, v, w, b;if (w = e.length >>> 0, h = Math.max(0, Math.min(t, w)), p = [], d = i(), f = r(d, a, n, o), h) for (m = function m(e) {
               p.push(e), --h || (u(), d.resolve(p));
            }, g = function g(e) {
               u(), d.reject(e);
            }, v = d.progress, b = 0; w > b; ++b) {
               b in e && r(e[b], s, c, l);
            } else d.resolve(p);return f;
         });
      }function l(e, t, a, n) {
         return v(1, arguments), r(e, function (e) {
            return m(e, u, []);
         }).then(t, a, n);
      }function u(e, t, a) {
         return e[a] = t, e;
      }function h(e, t, a, n) {
         function i(e) {
            return t ? t(e[0]) : e[0];
         }return c(e, 1, i, a, n);
      }function p(e, t) {
         return r(e, function (e) {
            return f(e, t);
         });
      }function f(e, t) {
         var a, n, i;for (n = e.length >>> 0, a = new Array(n), i = 0; n > i; i++) {
            i in e && (a[i] = r(e[i], t));
         }return m(a, u, a);
      }function d(e) {
         var t = k.call(arguments, 1);return r(e, function (e) {
            return m.apply(_, [e].concat(t));
         });
      }function m(e, t, a) {
         var n, i;return n = e.length, i = [function (e, a, i) {
            return r(e, function (e) {
               return r(a, function (a) {
                  return t(e, a, i, n);
               });
            });
         }], arguments.length > 2 && i.push(a), b.apply(e, i);
      }function g(e, t, n) {
         var i = arguments.length > 2;return r(e, function (e) {
            return i && (e = n), t.resolve(e), e;
         }, function (e) {
            return t.reject(e), a(e);
         }, t.progress);
      }function v(e, t) {
         for (var a, n = t.length; n > e;) {
            if (a = t[--n], null != a && "function" != typeof a) throw new Error("callback is not a function");
         }
      }function y() {}var w, b, k, _;return r.defer = i, r.reject = n, r.isPromise = o, r.all = l, r.some = c, r.any = h, r.map = p, r.reduce = d, r.chain = g, w = Object.freeze || function (e) {
         return e;
      }, e.prototype = w({ always: function always(e, t) {
            return this.then(e, e, t);
         }, otherwise: function otherwise(e) {
            return this.then(_, e);
         } }), k = [].slice, b = [].reduce || function (e) {
         var t, a, n, i, o;if (o = 0, t = Object(this), i = t.length >>> 0, a = arguments, a.length <= 1) for (;;) {
            if (o in t) {
               n = t[o++];break;
            }if (++o >= i) throw new TypeError();
         } else n = a[1];for (; i > o; ++o) {
            o in t && (n = e(n, t[o], o, t));
         }return n;
      }, r;
   });
}("function" == typeof define ? define : function (e) {
   "undefined" != typeof module ? module.exports = e() : jQuery.mapster_when = e();
}), function ($) {
   $.fn.mapster = function (e) {
      var t = $.mapster.impl;return $.isFunction(t[e]) ? t[e].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != (typeof e === "undefined" ? "undefined" : _typeof(e)) && e ? void $.error("Method " + e + " does not exist on jQuery.mapster") : t.bind.apply(this, arguments);
   }, $.mapster = { version: "1.2.14-beta1", render_defaults: { isSelectable: !0, isDeselectable: !0, fade: !1, fadeDuration: 150, fill: !0, fillColor: "000000", fillColorMask: "FFFFFF", fillOpacity: .7, highlight: !0, stroke: !1, strokeColor: "ff0000", strokeOpacity: 1, strokeWidth: 1, includeKeys: "", altImage: null, altImageId: null, altImages: {} }, defaults: { clickNavigate: !1, wrapClass: null, wrapCss: null, onGetList: null, sortList: !1, listenToList: !1, mapKey: "", mapValue: "", singleSelect: !1, listKey: "value", listSelectedAttribute: "selected", listSelectedClass: null, onClick: null, onMouseover: null, onMouseout: null, mouseoutDelay: 0, onStateChange: null, boundList: null, onConfigured: null, configTimeout: 3e4, noHrefIsMask: !0, scaleMap: !0, safeLoad: !1, areas: [] }, shared_defaults: { render_highlight: { fade: !0 }, render_select: { fade: !1 }, staticState: null, selected: null }, area_defaults: { includeKeys: "", isMask: !1 }, canvas_style: { position: "absolute", left: 0, top: 0, padding: 0, border: 0 }, hasCanvas: null, isTouch: null, map_cache: [], hooks: {}, addHook: function addHook(e, t) {
         this.hooks[e] = (this.hooks[e] || []).push(t);
      }, callHooks: function callHooks(e, t) {
         $.each(this.hooks[e] || [], function (e, a) {
            a.apply(t);
         });
      }, utils: { when: $.mapster_when, defer: $.mapster_when.defer, subclass: function subclass(e, t) {
            var a = function a() {
               var a = this,
                   n = Array.prototype.slice.call(arguments, 0);a.base = e.prototype, a.base.init = function () {
                  e.prototype.constructor.apply(a, n);
               }, t.apply(a, n);
            };return a.prototype = new e(), a.prototype.constructor = a, a;
         }, asArray: function asArray(e) {
            return e.constructor === Array ? e : this.split(e);
         }, split: function split(e, t) {
            var a,
                n,
                i = e.split(",");for (a = 0; a < i.length; a++) {
               n = $.trim(i[a]), "" === n ? i.splice(a, 1) : i[a] = t ? t(n) : n;
            }return i;
         }, updateProps: function updateProps(e, t) {
            var a,
                n = e || {},
                i = $.isEmptyObject(n) ? t : e;return a = [], $.each(i, function (e) {
               a.push(e);
            }), $.each(Array.prototype.slice.call(arguments, 1), function (e, t) {
               $.each(t || {}, function (e) {
                  if (!a || $.inArray(e, a) >= 0) {
                     var i = t[e];$.isPlainObject(i) ? n[e] = $.extend(n[e] || {}, i) : i && i.constructor === Array ? n[e] = i.slice(0) : "undefined" != typeof i && (n[e] = t[e]);
                  }
               });
            }), n;
         }, isElement: function isElement(e) {
            return "object" == (typeof HTMLElement === "undefined" ? "undefined" : _typeof(HTMLElement)) ? e instanceof HTMLElement : e && "object" == (typeof e === "undefined" ? "undefined" : _typeof(e)) && 1 === e.nodeType && "string" == typeof e.nodeName;
         }, indexOf: function indexOf(e, t) {
            for (var a = 0; a < e.length; a++) {
               if (e[a] === t) return a;
            }return -1;
         }, indexOfProp: function indexOfProp(e, t, a) {
            var n = e.constructor === Array ? -1 : null;return $.each(e, function (e, i) {
               return i && (t ? i[t] : i) === a ? (n = e, !1) : void 0;
            }), n;
         }, boolOrDefault: function boolOrDefault(e, t) {
            return this.isBool(e) ? e : t || !1;
         }, isBool: function isBool(e) {
            return "boolean" == typeof e;
         }, isUndef: function isUndef(e) {
            return "undefined" == typeof e;
         }, ifFunction: function ifFunction(e, t, a) {
            $.isFunction(e) && e.call(t, a);
         }, size: function size(e, t) {
            var a = $.mapster.utils;return { width: t ? e.width || e.naturalWidth : a.imgWidth(e, !0), height: t ? e.height || e.naturalHeight : a.imgHeight(e, !0), complete: function complete() {
                  return !!this.height && !!this.width;
               } };
         }, setOpacity: function setOpacity(e, t) {
            $.mapster.hasCanvas() ? e.style.opacity = t : $(e).each(function (e, a) {
               "undefined" != typeof a.opacity ? a.opacity = t : $(a).css("opacity", t);
            });
         }, fader: function () {
            var e = {},
                t = 0,
                a = function a(n, i, o, r) {
               var s,
                   c,
                   l = r / 15,
                   u = $.mapster.utils;if ("number" == typeof n) {
                  if (c = e[n], !c) return;
               } else s = u.indexOfProp(e, null, n), s && delete e[s], e[++t] = c = n, n = t;o = o || 1, i = i + o / l > o - .01 ? o : i + o / l, u.setOpacity(c, i), o > i && setTimeout(function () {
                  a(n, i, o, r);
               }, 15);
            };return a;
         }() }, getBoundList: function getBoundList(e, t) {
         if (!e.boundList) return null;var a,
             n,
             i = $(),
             o = $.mapster.utils.split(t);return e.boundList.each(function (t, r) {
            for (a = 0; a < o.length; a++) {
               n = o[a], $(r).is("[" + e.listKey + '="' + n + '"]') && (i = i.add(r));
            }
         }), i;
      }, setBoundListProperties: function setBoundListProperties(e, t, a) {
         t.each(function (t, n) {
            e.listSelectedClass && (a ? $(n).addClass(e.listSelectedClass) : $(n).removeClass(e.listSelectedClass)), e.listSelectedAttribute && $(n).attr(e.listSelectedAttribute, a);
         });
      }, getMapDataIndex: function getMapDataIndex(e) {
         var t, a;switch (e.tagName && e.tagName.toLowerCase()) {case "area":
               a = $(e).parent().attr("name"), t = $("img[usemap='#" + a + "']")[0];break;case "img":
               t = e;}return t ? this.utils.indexOfProp(this.map_cache, "image", t) : -1;
      }, getMapData: function getMapData(e) {
         var t = this.getMapDataIndex(e.length ? e[0] : e);return t >= 0 ? t >= 0 ? this.map_cache[t] : null : void 0;
      }, queueCommand: function queueCommand(e, t, a, n) {
         return e && (!e.complete || e.currentAction) ? (e.commands.push({ that: t, command: a, args: n }), !0) : !1;
      }, unload: function unload() {
         this.impl.unload(), this.utils = null, this.impl = null, $.fn.mapster = null, $.mapster = null, $("*").unbind();
      } };var m = $.mapster,
       u = m.utils,
       ap = Array.prototype;$.each(["width", "height"], function (e, t) {
      var a = t.substr(0, 1).toUpperCase() + t.substr(1);u["img" + a] = function (e, n) {
         return (n ? $(e)[t]() : 0) || e[t] || e["natural" + a] || e["client" + a] || e["offset" + a];
      };
   }), m.Method = function (e, t, a, n) {
      var i = this;i.name = n.name, i.output = e, i.input = e, i.first = n.first || !1, i.args = n.args ? ap.slice.call(n.args, 0) : [], i.key = n.key, i.func_map = t, i.func_area = a, i.name = n.name, i.allowAsync = n.allowAsync || !1;
   }, m.Method.prototype = { constructor: m.Method, go: function go() {
         var e,
             t,
             a,
             n,
             i,
             o = this.input,
             r = [],
             s = this;for (n = o.length, e = 0; n > e; e++) {
            if (t = $.mapster.getMapData(o[e])) {
               if (!s.allowAsync && m.queueCommand(t, s.input, s.name, s.args)) {
                  this.first && (i = "");continue;
               }if (a = t.getData("AREA" === o[e].nodeName ? o[e] : this.key), a ? $.inArray(a, r) < 0 && r.push(a) : i = this.func_map.apply(t, s.args), this.first || "undefined" != typeof i) break;
            }
         }return $(r).each(function (e, t) {
            i = s.func_area.apply(t, s.args);
         }), "undefined" != typeof i ? i : this.output;
      } }, $.mapster.impl = function () {
      function hasVml() {
         var e = $("<div />").appendTo("body");e.html('<v:shape id="vml_flag1" adj="1" />');var t = e[0].firstChild;t.style.behavior = "url(#default#VML)";var a = t ? "object" == _typeof(t.adj) : !0;return e.remove(), a;
      }function namespaces() {
         return "object" == _typeof(document.namespaces) ? document.namespaces : null;
      }function hasCanvas() {
         var e = namespaces();return e && e.g_vml_ ? !1 : !!$("<canvas />")[0].getContext;
      }function merge_areas(e, t) {
         var a,
             n,
             i = e.options.areas;t && $.each(t, function (t, o) {
            o && o.key && (n = u.indexOfProp(i, "key", o.key), n >= 0 ? $.extend(i[n], o) : i.push(o), a = e.getDataForKey(o.key), a && $.extend(a.options, o));
         });
      }function merge_options(e, t) {
         var a = u.updateProps({}, t);delete a.areas, u.updateProps(e.options, a), merge_areas(e, t.areas), u.updateProps(e.area_options, e.options);
      }var me = {},
          addMap = function addMap(e) {
         return m.map_cache.push(e) - 1;
      },
          removeMap = function removeMap(e) {
         m.map_cache.splice(e.index, 1);for (var t = m.map_cache.length - 1; t >= this.index; t--) {
            m.map_cache[t].index--;
         }
      };return me.get = function (e) {
         var t = m.getMapData(this);if (!t || !t.complete) throw "Can't access data until binding complete.";return new m.Method(this, function () {
            return this.getSelected();
         }, function () {
            return this.isSelected();
         }, { name: "get", args: arguments, key: e, first: !0, allowAsync: !0, defaultReturn: "" }).go();
      }, me.data = function (e) {
         return new m.Method(this, null, function () {
            return this;
         }, { name: "data", args: arguments, key: e }).go();
      }, me.highlight = function (e) {
         return new m.Method(this, function () {
            if (e !== !1) {
               var t = this.highlightId;return t >= 0 ? this.data[t].key : null;
            }this.ensureNoHighlight();
         }, function () {
            this.highlight();
         }, { name: "highlight", args: arguments, key: e, first: !0 }).go();
      }, me.keys = function (e, t) {
         function a(e) {
            var a,
                i = [];t ? (a = e.areas(), $.each(a, function (e, t) {
               i = i.concat(t.keys);
            })) : i.push(e.key), $.each(i, function (e, t) {
               $.inArray(t, n) < 0 && n.push(t);
            });
         }var n = [],
             i = m.getMapData(this);if (!i || !i.complete) throw "Can't access data until binding complete.";return i && i.complete ? ("string" == typeof e ? t ? a(i.getDataForKey(e)) : n = [i.getKeysForGroup(e)] : (t = e, this.each(function (e, t) {
            "AREA" === t.nodeName && a(i.getDataForArea(t));
         })), n.join(",")) : "";
      }, me.select = function () {
         me.set.call(this, !0);
      }, me.deselect = function () {
         me.set.call(this, !1);
      }, me.set = function (e, t, a) {
         function n(t) {
            var a = e;if (t) {
               switch (e) {case !0:
                     t.select(h);break;case !1:
                     t.deselect(!0);break;default:
                     a = t.toggle(h);}return a;
            }
         }function i(e) {
            e && $.inArray(e, l) < 0 && (l.push(e), c += ("" === c ? "" : ",") + e.key);
         }function o(t) {
            $.each(l, function (e, a) {
               var i = n(a);t.options.boundList && m.setBoundListProperties(t.options, m.getBoundList(t.options, c), i);
            }), e || t.removeSelectionFinish();
         }var r,
             s,
             c,
             l,
             h = a;return this.filter("img,area").each(function (a, n) {
            var p;s = m.getMapData(n), s !== r && (r && o(r), l = [], c = ""), s && (p = "", "IMG" === n.nodeName.toUpperCase() ? m.queueCommand(s, $(n), "set", [e, t, h]) || (t instanceof Array ? t.length && (p = t.join(",")) : p = t, p && $.each(u.split(p), function (e, t) {
               i(s.getDataForKey(t.toString())), r = s;
            })) : (h = t, m.queueCommand(s, $(n), "set", [e, h]) || (i(s.getDataForArea(n)), r = s)));
         }), s && o(s), this;
      }, me.unbind = function (e) {
         return new m.Method(this, function () {
            this.clearEvents(), this.clearMapData(e), removeMap(this);
         }, null, { name: "unbind", args: arguments }).go();
      }, me.rebind = function (e) {
         return new m.Method(this, function () {
            var t = this;t.complete = !1, t.configureOptions(e), t.bindImages().then(function () {
               t.buildDataset(!0), t.complete = !0;
            });
         }, null, { name: "rebind", args: arguments }).go();
      }, me.get_options = function (e, t) {
         var a = u.isBool(e) ? e : t;return new m.Method(this, function () {
            var e = $.extend({}, this.options);return a && (e.render_select = u.updateProps({}, m.render_defaults, e, e.render_select), e.render_highlight = u.updateProps({}, m.render_defaults, e, e.render_highlight)), e;
         }, function () {
            return a ? this.effectiveOptions() : this.options;
         }, { name: "get_options", args: arguments, first: !0, allowAsync: !0, key: e }).go();
      }, me.set_options = function (e) {
         return new m.Method(this, function () {
            merge_options(this, e);
         }, null, { name: "set_options", args: arguments }).go();
      }, me.unload = function () {
         var e;for (e = m.map_cache.length - 1; e >= 0; e--) {
            m.map_cache[e] && me.unbind.call($(m.map_cache[e].image));
         }me.graphics = null;
      }, me.snapshot = function () {
         return new m.Method(this, function () {
            $.each(this.data, function (e, t) {
               t.selected = !1;
            }), this.base_canvas = this.graphics.createVisibleCanvas(this), $(this.image).before(this.base_canvas);
         }, null, { name: "snapshot" }).go();
      }, me.state = function () {
         var e,
             t = null;return $(this).each(function (a, n) {
            return "IMG" === n.nodeName ? (e = m.getMapData(n), e && (t = e.state()), !1) : void 0;
         }), t;
      }, me.bind = function (e) {
         return this.each(function (t, a) {
            var n, i, o, r;if (n = $(a), r = m.getMapData(a)) {
               if (me.unbind.apply(n), !r.complete) return n.bind(), !0;r = null;
            }return o = this.getAttribute("usemap"), i = o && $('map[name="' + o.substr(1) + '"]'), n.is("img") && o && i.length > 0 ? (n.css("border", 0), void (r || (r = new m.MapData(this, e), r.index = addMap(r), r.map = i, r.bindImages().then(function () {
               r.initialize();
            })))) : !0;
         });
      }, me.init = function (e) {
         var t, a;m.hasCanvas = function () {
            return u.isBool(m.hasCanvas.value) || (m.hasCanvas.value = u.isBool(e) ? e : hasCanvas()), m.hasCanvas.value;
         }, m.hasVml = function () {
            if (!u.isBool(m.hasVml.value)) {
               var e = namespaces();e && !e.v && (e.add("v", "urn:schemas-microsoft-com:vml"), t = document.createStyleSheet(), a = ["shape", "rect", "oval", "circ", "fill", "stroke", "imagedata", "group", "textbox"], $.each(a, function (e, a) {
                  t.addRule("v\\:" + a, "behavior: url(#default#VML); antialias:true");
               })), m.hasVml.value = hasVml();
            }return m.hasVml.value;
         }, m.isTouch = !!document.documentElement.ontouchstart, u.indexOf = Array.prototype.indexOf || u.indexOf, $.extend(m.defaults, m.render_defaults, m.shared_defaults), $.extend(m.area_defaults, m.render_defaults, m.shared_defaults);
      }, me.test = function (obj) {
         return eval(obj);
      }, me;
   }(), $.mapster.impl.init();
}(jQuery), function (e) {
   function t(t, a, n) {
      var i = t,
          o = i.map_data,
          r = n.isMask;e.each(a.areas(), function (e, t) {
         n.isMask = r || t.nohref && o.options.noHrefIsMask, i.addShape(t, n);
      }), n.isMask = r;
   }function a(e) {
      return Math.max(0, Math.min(parseInt(e, 16), 255));
   }function n(e, t) {
      return "rgba(" + a(e.substr(0, 2)) + "," + a(e.substr(2, 2)) + "," + a(e.substr(4, 2)) + "," + t + ")";
   }function i() {}var o,
       r,
       s,
       c = e.mapster,
       l = c.utils;c.Graphics = function (e) {
      var t = this;t.active = !1, t.canvas = null, t.width = 0, t.height = 0, t.shapes = [], t.masks = [], t.map_data = e;
   }, o = c.Graphics.prototype = { constructor: c.Graphics, begin: function begin(t, a) {
         var n = e(t);this.elementName = a, this.canvas = t, this.width = n.width(), this.height = n.height(), this.shapes = [], this.masks = [], this.active = !0;
      }, addShape: function addShape(e, t) {
         var a = t.isMask ? this.masks : this.shapes;a.push({ mapArea: e, options: t });
      }, createVisibleCanvas: function createVisibleCanvas(t) {
         return e(this.createCanvasFor(t)).addClass("mapster_el").css(c.canvas_style)[0];
      }, addShapeGroup: function addShapeGroup(a, n, i) {
         var o,
             r,
             s,
             u = this,
             h = this.map_data,
             p = a.effectiveRenderOptions(n);i && e.extend(p, i), "select" === n ? (r = "static_" + a.areaId.toString(), s = h.base_canvas) : s = h.overlay_canvas, u.begin(s, r), p.includeKeys && (o = l.split(p.includeKeys), e.each(o, function (e, a) {
            var i = h.getDataForKey(a.toString());t(u, i, i.effectiveRenderOptions(n));
         })), t(u, a, p), u.render(), p.fade && l.fader(c.hasCanvas() ? s : e(s).find("._fill").not(".mapster_mask"), 0, c.hasCanvas() ? 1 : p.fillOpacity, p.fadeDuration);
      } }, r = { renderShape: function renderShape(e, t, a) {
         var n,
             i = t.coords(null, a);switch (t.shape) {case "rect":
               e.rect(i[0], i[1], i[2] - i[0], i[3] - i[1]);break;case "poly":
               for (e.moveTo(i[0], i[1]), n = 2; n < t.length; n += 2) {
                  e.lineTo(i[n], i[n + 1]);
               }e.lineTo(i[0], i[1]);break;case "circ":case "circle":
               e.arc(i[0], i[1], i[2], 0, 2 * Math.PI, !1);}
      }, addAltImage: function addAltImage(e, t, a, n) {
         e.beginPath(), this.renderShape(e, a), e.closePath(), e.clip(), e.globalAlpha = n.altImageOpacity || n.fillOpacity, e.drawImage(t, 0, 0, a.owner.scaleInfo.width, a.owner.scaleInfo.height);
      }, render: function render() {
         var t,
             a,
             i = this,
             o = i.map_data,
             r = i.masks.length,
             s = i.createCanvasFor(o),
             c = s.getContext("2d"),
             l = i.canvas.getContext("2d");return r && (t = i.createCanvasFor(o), a = t.getContext("2d"), a.clearRect(0, 0, t.width, t.height), e.each(i.masks, function (e, t) {
            a.save(), a.beginPath(), i.renderShape(a, t.mapArea), a.closePath(), a.clip(), a.lineWidth = 0, a.fillStyle = "#000", a.fill(), a.restore();
         })), e.each(i.shapes, function (e, t) {
            c.save(), t.options.fill && (t.options.altImageId ? i.addAltImage(c, o.images[t.options.altImageId], t.mapArea, t.options) : (c.beginPath(), i.renderShape(c, t.mapArea), c.closePath(), c.fillStyle = n(t.options.fillColor, t.options.fillOpacity), c.fill())), c.restore();
         }), e.each(i.shapes.concat(i.masks), function (e, t) {
            var a = 1 === t.options.strokeWidth ? .5 : 0;t.options.stroke && (c.save(), c.strokeStyle = n(t.options.strokeColor, t.options.strokeOpacity), c.lineWidth = t.options.strokeWidth, c.beginPath(), i.renderShape(c, t.mapArea, a), c.closePath(), c.stroke(), c.restore());
         }), r ? (a.globalCompositeOperation = "source-out", a.drawImage(s, 0, 0), l.drawImage(t, 0, 0)) : l.drawImage(s, 0, 0), i.active = !1, i.canvas;
      }, createCanvasFor: function createCanvasFor(t) {
         return e('<canvas width="' + t.scaleInfo.width + '" height="' + t.scaleInfo.height + '"></canvas>')[0];
      }, clearHighlight: function clearHighlight() {
         var e = this.map_data.overlay_canvas;e.getContext("2d").clearRect(0, 0, e.width, e.height);
      }, refreshSelections: function refreshSelections() {
         var t,
             a = this.map_data;t = a.base_canvas, a.base_canvas = this.createVisibleCanvas(a), e(a.base_canvas).hide(), e(t).before(a.base_canvas), a.redrawSelections(), e(a.base_canvas).show(), e(t).remove();
      } }, s = { renderShape: function renderShape(t, a, n) {
         var i,
             o,
             r,
             s,
             c,
             l,
             u,
             h = this,
             p = t.coords();switch (c = h.elementName ? 'name="' + h.elementName + '" ' : "", l = n ? 'class="' + n + '" ' : "", s = '<v:fill color="#' + a.fillColor + '" class="_fill" opacity="' + (a.fill ? a.fillOpacity : 0) + '" /><v:stroke class="_fill" opacity="' + a.strokeOpacity + '"/>', o = a.stroke ? " strokeweight=" + a.strokeWidth + ' stroked="t" strokecolor="#' + a.strokeColor + '"' : ' stroked="f"', i = a.fill ? ' filled="t"' : ' filled="f"', t.shape) {case "rect":
               u = "<v:rect " + l + c + i + o + ' style="zoom:1;margin:0;padding:0;display:block;position:absolute;left:' + p[0] + "px;top:" + p[1] + "px;width:" + (p[2] - p[0]) + "px;height:" + (p[3] - p[1]) + 'px;">' + s + "</v:rect>";break;case "poly":
               u = "<v:shape " + l + c + i + o + ' coordorigin="0,0" coordsize="' + h.width + "," + h.height + '" path="m ' + p[0] + "," + p[1] + " l " + p.slice(2).join(",") + ' x e" style="zoom:1;margin:0;padding:0;display:block;position:absolute;top:0px;left:0px;width:' + h.width + "px;height:" + h.height + 'px;">' + s + "</v:shape>";break;case "circ":case "circle":
               u = "<v:oval " + l + c + i + o + ' style="zoom:1;margin:0;padding:0;display:block;position:absolute;left:' + (p[0] - p[2]) + "px;top:" + (p[1] - p[2]) + "px;width:" + 2 * p[2] + "px;height:" + 2 * p[2] + 'px;">' + s + "</v:oval>";}return r = e(u), e(h.canvas).append(r), r;
      }, render: function render() {
         var t,
             a = this;return e.each(this.shapes, function (e, t) {
            a.renderShape(t.mapArea, t.options);
         }), this.masks.length && e.each(this.masks, function (e, n) {
            t = l.updateProps({}, n.options, { fillOpacity: 1, fillColor: n.options.fillColorMask }), a.renderShape(n.mapArea, t, "mapster_mask");
         }), this.active = !1, this.canvas;
      }, createCanvasFor: function createCanvasFor(t) {
         var a = t.scaleInfo.width,
             n = t.scaleInfo.height;return e('<var width="' + a + '" height="' + n + '" style="zoom:1;overflow:hidden;display:block;width:' + a + "px;height:" + n + 'px;"></var>')[0];
      }, clearHighlight: function clearHighlight() {
         e(this.map_data.overlay_canvas).children().remove();
      }, removeSelections: function removeSelections(t) {
         t >= 0 ? e(this.map_data.base_canvas).find('[name="static_' + t.toString() + '"]').remove() : e(this.map_data.base_canvas).children().remove();
      } }, e.each(["renderShape", "addAltImage", "render", "createCanvasFor", "clearHighlight", "removeSelections", "refreshSelections"], function (e, t) {
      o[t] = function (e) {
         return function () {
            return o[e] = (c.hasCanvas() ? r[e] : s[e]) || i, o[e].apply(this, arguments);
         };
      }(t);
   });
}(jQuery), function (e) {
   var t = e.mapster,
       a = t.utils,
       n = [];t.MapImages = function (e) {
      this.owner = e, this.clear();
   }, t.MapImages.prototype = { constructor: t.MapImages, slice: function slice() {
         return n.slice.apply(this, arguments);
      }, splice: function splice() {
         n.slice.apply(this.status, arguments);var e = n.slice.apply(this, arguments);return e;
      }, complete: function complete() {
         return e.inArray(!1, this.status) < 0;
      }, _add: function _add(e) {
         var t = n.push.call(this, e) - 1;return this.status[t] = !1, t;
      }, indexOf: function indexOf(e) {
         return a.indexOf(this, e);
      }, clear: function clear() {
         var t = this;t.ids && t.ids.length > 0 && e.each(t.ids, function (e, a) {
            delete t[a];
         }), t.ids = [], t.length = 0, t.status = [], t.splice(0);
      }, add: function add(t, a) {
         var n,
             i,
             o = this;if (t) {
            if ("string" == typeof t) {
               if (i = t, t = o[i], "object" == (typeof t === "undefined" ? "undefined" : _typeof(t))) return o.indexOf(t);t = e("<img />").addClass("mapster_el").hide(), n = o._add(t[0]), t.bind("load", function (e) {
                  o.imageLoaded.call(o, e);
               }).bind("error", function (e) {
                  o.imageLoadError.call(o, e);
               }), t.attr("src", i);
            } else n = o._add(e(t)[0]);if (a) {
               if (this[a]) throw a + " is already used or is not available as an altImage alias.";o.ids.push(a), o[a] = o[n];
            }return n;
         }
      }, bind: function bind() {
         var e,
             t = this,
             n = t.owner.options.configTimeout / 200,
             i = function i() {
            var e;for (e = t.length; e-- > 0 && t.isLoaded(e);) {}t.complete() ? t.resolve() : n-- > 0 ? t.imgTimeout = window.setTimeout(function () {
               i.call(t, !0);
            }, 50) : t.imageLoadError.call(t);
         };return e = t.deferred = a.defer(), i(), e;
      }, resolve: function resolve() {
         var e = this,
             t = e.deferred;t && (e.deferred = null, t.resolve());
      }, imageLoaded: function imageLoaded(t) {
         var a = this,
             n = a.indexOf(t.target);n >= 0 && (a.status[n] = !0, e.inArray(!1, a.status) < 0 && a.resolve());
      }, imageLoadError: function imageLoadError(e) {
         clearTimeout(this.imgTimeout), this.triesLeft = 0;var t = e ? "The image " + e.target.src + " failed to load." : "The images never seemed to finish loading. You may just need to increase the configTimeout if images could take a long time to load.";throw t;
      }, isLoaded: function isLoaded(e) {
         var t,
             n = this,
             i = n.status;return i[e] ? !0 : (t = n[e], "undefined" != typeof t.complete ? i[e] = t.complete : i[e] = !!a.imgWidth(t), i[e]);
      } };
}(jQuery), function (e) {
   function t(t) {
      e.extend(t, { complete: !1, map: null, base_canvas: null, overlay_canvas: null, commands: [], data: [], mapAreas: [], _xref: {}, highlightId: -1, currentAreaId: -1, _tooltip_events: [], scaleInfo: null, index: -1, activeAreaEvent: null });
   }function a(e) {
      return [e, e.render_highlight, e.render_select];
   }function n(t) {
      var n = t.options,
          i = t.images;u.hasCanvas() && (e.each(n.altImages || {}, function (e, t) {
         i.add(t, e);
      }), e.each([n].concat(n.areas), function (t, n) {
         e.each(a(n), function (e, t) {
            t && t.altImage && (t.altImageId = i.add(t.altImage));
         });
      })), t.area_options = h.updateProps({}, u.area_defaults, n);
   }function i(e, t, a, n) {
      function o(t) {
         e.currentAreaId !== t && e.highlightId >= 0 && n.resolve();
      }return n = n || h.when.defer(), e.activeAreaEvent && (window.clearTimeout(e.activeAreaEvent), e.activeAreaEvent = 0), 0 > t ? n.reject() : a.owner.currentAction || t ? e.activeAreaEvent = window.setTimeout(function () {
         return function () {
            i(e, 0, a, n);
         };
      }(a), t || 100) : o(a.areaId), n;
   }function o(e) {
      u.hasCanvas() || this.blur(), e.preventDefault();
   }function r(t, a) {
      var n = t.getAllDataForArea(this),
          i = n.length ? n[0] : null;!i || i.isNotRendered() || i.owner.currentAction || t.currentAreaId !== i.areaId && (t.highlightId !== i.areaId && (t.clearEffects(), i.highlight(), t.options.showToolTip && e.each(n, function (e, t) {
         t.effectiveOptions().toolTip && t.showToolTip();
      })), t.currentAreaId = i.areaId, e.isFunction(t.options.onMouseover) && t.options.onMouseover.call(this, { e: a, options: i.effectiveOptions(), key: i.key, selected: i.isSelected() }));
   }function s(t, a) {
      var n,
          o = t.getDataForArea(this),
          r = t.options;t.currentAreaId < 0 || !o || (n = t.getDataForArea(a.relatedTarget), n !== o && (t.currentAreaId = -1, o.area = null, i(t, r.mouseoutDelay, o).then(t.clearEffects), e.isFunction(r.onMouseout) && r.onMouseout.call(this, { e: a, options: r, key: o.key, selected: o.isSelected() })));
   }function c(t) {
      var a = t.options;t.ensureNoHighlight(), a.toolTipClose && e.inArray("area-mouseout", a.toolTipClose) >= 0 && t.activeToolTip && t.clearToolTip();
   }function l(t, a) {
      function n(o) {
         var d, g;if (l = o.isSelectable() && (o.isDeselectable() || !o.isSelected()), c = l ? !o.isSelected() : o.isSelected(), s = u.getBoundList(m, o.key), e.isFunction(m.onClick) && (p = m.onClick.call(f, { e: a, listTarget: s, key: o.key, selected: c }), h.isBool(p))) {
            if (!p) return !1;if (g = e(o.area).attr("href"), "#" !== g) return window.location.href = g, !1;
         }l && (i = o.toggle()), m.boundList && m.boundList.length > 0 && u.setBoundListProperties(m, s, o.isSelected()), d = o.effectiveOptions(), d.includeKeys && (r = h.split(d.includeKeys), e.each(r, function (e, a) {
            var i = t.getDataForKey(a.toString());i.options.isMask || n(i);
         }));
      }var i,
          r,
          s,
          c,
          l,
          p,
          f = this,
          d = t.getDataForArea(this),
          m = t.options;return o.call(this, a), m.clickNavigate && d.href ? void (window.location.href = d.href) : void (d && !d.owner.currentAction && (m = t.options, n(d)));
   }var u = e.mapster,
       h = u.utils;u.MapData = function (e, a) {
      var n = this;n.image = e, n.images = new u.MapImages(n), n.graphics = new u.Graphics(n), n.imgCssText = e.style.cssText || null, t(n), n.configureOptions(a), n.mouseover = function (e) {
         r.call(this, n, e);
      }, n.mouseout = function (e) {
         s.call(this, n, e);
      }, n.click = function (e) {
         l.call(this, n, e);
      }, n.clearEffects = function (e) {
         c.call(this, n, e);
      };
   }, u.MapData.prototype = { constructor: u.MapData, configureOptions: function configureOptions(e) {
         this.options = h.updateProps({}, u.defaults, e);
      }, bindImages: function bindImages() {
         var e = this,
             t = e.images;return t.length > 2 ? t.splice(2) : 0 === t.length && (t.add(e.image), t.add(e.image.src)), n(e), e.images.bind();
      }, isActive: function isActive() {
         return !this.complete || this.currentAction;
      }, state: function state() {
         return { complete: this.complete, resizing: "resizing" === this.currentAction, zoomed: this.zoomed, zoomedArea: this.zoomedArea, scaleInfo: this.scaleInfo };
      }, wrapId: function wrapId() {
         return "mapster_wrap_" + this.index;
      }, _idFromKey: function _idFromKey(e) {
         return "string" == typeof e && this._xref.hasOwnProperty(e) ? this._xref[e] : -1;
      }, getSelected: function getSelected() {
         var t = "";return e.each(this.data, function (e, a) {
            a.isSelected() && (t += (t ? "," : "") + this.key);
         }), t;
      }, getAllDataForArea: function getAllDataForArea(t, a) {
         var n,
             i,
             o,
             r = this,
             s = e(t).filter("area").attr(r.options.mapKey);if (s) for (o = [], s = h.split(s), n = 0; n < (a || s.length); n++) {
            i = r.data[r._idFromKey(s[n])], i.area = t.length ? t[0] : t, o.push(i);
         }return o;
      }, getDataForArea: function getDataForArea(e) {
         var t = this.getAllDataForArea(e, 1);return t ? t[0] || null : null;
      }, getDataForKey: function getDataForKey(e) {
         return this.data[this._idFromKey(e)];
      }, getKeysForGroup: function getKeysForGroup(e) {
         var t = this.getDataForKey(e);return t ? t.isPrimary ? t.key : this.getPrimaryKeysForMapAreas(t.areas()).join(",") : "";
      }, getPrimaryKeysForMapAreas: function getPrimaryKeysForMapAreas(t) {
         var a = [];return e.each(t, function (t, n) {
            e.inArray(n.keys[0], a) < 0 && a.push(n.keys[0]);
         }), a;
      }, getData: function getData(e) {
         return "string" == typeof e ? this.getDataForKey(e) : e && e.mapster || h.isElement(e) ? this.getDataForArea(e) : null;
      }, ensureNoHighlight: function ensureNoHighlight() {
         var e;this.highlightId >= 0 && (this.graphics.clearHighlight(), e = this.data[this.highlightId], e.changeState("highlight", !1), this.setHighlightId(-1));
      }, setHighlightId: function setHighlightId(e) {
         this.highlightId = e;
      }, clearSelections: function clearSelections() {
         e.each(this.data, function (e, t) {
            t.selected && t.deselect(!0);
         }), this.removeSelectionFinish();
      }, setAreaOptions: function setAreaOptions(e) {
         var t, a, n;for (e = e || [], t = e.length - 1; t >= 0; t--) {
            a = e[t], a && (n = this.getDataForKey(a.key), n && (h.updateProps(n.options, a), h.isBool(a.selected) && (n.selected = a.selected)));
         }
      }, drawSelections: function drawSelections(e) {
         var t,
             a = h.asArray(e);for (t = a.length - 1; t >= 0; t--) {
            this.data[a[t]].drawSelection();
         }
      }, redrawSelections: function redrawSelections() {
         e.each(this.data, function (e, t) {
            t.isSelectedOrStatic() && t.drawSelection();
         });
      }, initialize: function initialize() {
         var t,
             a,
             n,
             i,
             o,
             r,
             s,
             c,
             l,
             p,
             f,
             d,
             m = this,
             g = m.options;if (!m.complete) {
            for (l = e(m.image), o = l.parent().attr("id"), o && o.length >= 12 && "mapster_wrap" === o.substring(0, 12) ? (i = l.parent(), i.attr("id", m.wrapId())) : (i = e('<div id="' + m.wrapId() + '"></div>'), g.wrapClass && (g.wrapClass === !0 ? i.addClass(l[0].className) : i.addClass(g.wrapClass))), m.wrapper = i, m.scaleInfo = d = h.scaleMap(m.images[0], m.images[1], g.scaleMap), m.base_canvas = a = m.graphics.createVisibleCanvas(m), m.overlay_canvas = n = m.graphics.createVisibleCanvas(m), t = e(m.images[1]).addClass("mapster_el " + m.images[0].className).attr({ id: null, usemap: null }), c = h.size(m.images[0]), c.complete && t.css({ width: c.width, height: c.height }), m.buildDataset(), r = { display: "block", position: "relative", padding: 0, width: d.width, height: d.height }, g.wrapCss && e.extend(r, g.wrapCss), l.parent()[0] !== m.wrapper[0] && l.before(m.wrapper), i.css(r), e(m.images.slice(2)).hide(), s = 1; s < m.images.length; s++) {
               i.append(m.images[s]);
            }i.append(a).append(n).append(l.css(u.canvas_style)), h.setOpacity(m.images[0], 0), e(m.images[1]).show(), h.setOpacity(m.images[1], 1), g.isSelectable && g.onGetList && (f = m.data.slice(0), g.sortList && (p = "desc" === g.sortList ? function (e, t) {
               return e === t ? 0 : e > t ? -1 : 1;
            } : function (e, t) {
               return e === t ? 0 : t > e ? -1 : 1;
            }, f.sort(function (e, t) {
               return e = e.value, t = t.value, p(e, t);
            })), m.options.boundList = g.onGetList.call(m.image, f)), m.complete = !0, m.processCommandQueue(), g.onConfigured && "function" == typeof g.onConfigured && g.onConfigured.call(l, !0);
         }
      }, buildDataset: function buildDataset(t) {
         function a(e, t) {
            var a = new u.AreaData(w, e, t);return a.areaId = w._xref[e] = w.data.push(a) - 1, a.areaId;
         }var n,
             i,
             o,
             r,
             s,
             c,
             l,
             h,
             p,
             f,
             d,
             m,
             g,
             v,
             y,
             w = this,
             b = w.options;for (w._xref = {}, w.data = [], t || (w.mapAreas = []), y = !b.mapKey, y && (b.mapKey = "data-mapster-key"), n = u.hasVml() ? "area" : y ? "area[coords]" : "area[" + b.mapKey + "]", i = e(w.map).find(n).unbind(".mapster"), d = 0; d < i.length; d++) {
            if (r = 0, c = i[d], s = e(c), c.coords) {
               for (y ? (l = String(d), s.attr("data-mapster-key", l)) : l = c.getAttribute(b.mapKey), t ? (h = w.mapAreas[s.data("mapster") - 1], h.configure(l)) : (h = new u.MapArea(w, c, l), w.mapAreas.push(h)), f = h.keys, o = f.length - 1; o >= 0; o--) {
                  p = f[o], b.mapValue && (m = s.attr(b.mapValue)), y ? (r = a(w.data.length, m), g = w.data[r], g.key = p = r.toString()) : (r = w._xref[p], r >= 0 ? (g = w.data[r], m && !w.data[r].value && (g.value = m)) : (r = a(p, m), g = w.data[r], g.isPrimary = 0 === o)), h.areaDataXref.push(r), g.areasXref.push(d);
               }v = s.attr("href"), v && "#" !== v && !g.href && (g.href = v), h.nohref || s.bind("click.mapster", w.click).bind("mouseover.mapster, touchstart.mapster", w.mouseover).bind("mouseout.mapster, touchend.mapster", w.mouseout).bind("mousedown.mapster", w.mousedown), s.data("mapster", d + 1);
            }
         }w.setAreaOptions(b.areas), w.redrawSelections();
      }, processCommandQueue: function processCommandQueue() {
         for (var e, t = this; !t.currentAction && t.commands.length;) {
            e = t.commands[0], t.commands.splice(0, 1), u.impl[e.command].apply(e.that, e.args);
         }
      }, clearEvents: function clearEvents() {
         e(this.map).find("area").unbind(".mapster"), e(this.images).unbind(".mapster");
      }, _clearCanvases: function _clearCanvases(t) {
         t || e(this.base_canvas).remove(), e(this.overlay_canvas).remove();
      }, clearMapData: function clearMapData(t) {
         var a = this;this._clearCanvases(t), e.each(this.data, function (e, t) {
            t.reset();
         }), this.data = null, t || (this.image.style.cssText = this.imgCssText, e(this.wrapper).before(this.image).remove()), a.images.clear(), this.image = null, h.ifFunction(this.clearTooltip, this);
      }, removeSelectionFinish: function removeSelectionFinish() {
         var e = this.graphics;e.refreshSelections(), e.clearHighlight();
      } };
}(jQuery), function (e) {
   function t(t) {
      var a = this,
          n = a.owner;n.options.singleSelect && n.clearSelections(), a.isSelected() || (t && (a.optsCache = e.extend(a.effectiveRenderOptions("select"), t, { altImageId: n.images.add(t.altImage) })), a.drawSelection(), a.selected = !0, a.changeState("select", !0)), n.options.singleSelect && n.graphics.refreshSelections();
   }function a(e) {
      var t = this;t.selected = !1, t.changeState("select", !1), t.optsCache = null, t.owner.graphics.removeSelections(t.areaId), e || t.owner.removeSelectionFinish();
   }function n(e) {
      var t = this;return t.isSelected() ? t.deselect() : t.select(e), t.isSelected();
   }var i = e.mapster,
       o = i.utils;i.AreaData = function (t, a, n) {
      e.extend(this, { owner: t, key: a || "", isPrimary: !0, areaId: -1, href: "", value: n || "", options: {}, selected: null, areasXref: [], area: null, optsCache: null });
   }, i.AreaData.prototype = { constuctor: i.AreaData, select: t, deselect: a, toggle: n, areas: function areas() {
         var e,
             t = [];for (e = 0; e < this.areasXref.length; e++) {
            t.push(this.owner.mapAreas[this.areasXref[e]]);
         }return t;
      }, coords: function coords(t) {
         var a = [];return e.each(this.areas(), function (e, n) {
            a = a.concat(n.coords(t));
         }), a;
      }, reset: function reset() {
         e.each(this.areas(), function (e, t) {
            t.reset();
         }), this.areasXref = [], this.options = null;
      }, isSelectedOrStatic: function isSelectedOrStatic() {
         var e = this.effectiveOptions();return o.isBool(e.staticState) ? e.staticState : this.isSelected();
      }, isSelected: function isSelected() {
         return o.isBool(this.selected) ? this.selected : o.isBool(this.owner.area_options.selected) ? this.owner.area_options.selected : !1;
      }, isSelectable: function isSelectable() {
         return o.isBool(this.effectiveOptions().staticState) ? !1 : o.isBool(this.owner.options.staticState) ? !1 : o.boolOrDefault(this.effectiveOptions().isSelectable, !0);
      }, isDeselectable: function isDeselectable() {
         return o.isBool(this.effectiveOptions().staticState) ? !1 : o.isBool(this.owner.options.staticState) ? !1 : o.boolOrDefault(this.effectiveOptions().isDeselectable, !0);
      }, isNotRendered: function isNotRendered() {
         var t = e(this.area);return t.attr("nohref") || !t.attr("href") || this.effectiveOptions().isMask;
      }, effectiveOptions: function effectiveOptions(e) {
         var t = o.updateProps({}, this.owner.area_options, this.options, e || {}, { id: this.areaId });return t.selected = this.isSelected(), t;
      }, effectiveRenderOptions: function effectiveRenderOptions(t, a) {
         var n,
             i = this.optsCache;return i && "highlight" !== t || (n = this.effectiveOptions(a), i = o.updateProps({}, n, n["render_" + t]), "highlight" !== t && (this.optsCache = i)), e.extend({}, i);
      }, changeState: function changeState(t, a) {
         e.isFunction(this.owner.options.onStateChange) && this.owner.options.onStateChange.call(this.owner.image, { key: this.key, state: t, selected: a });
      }, highlight: function highlight(e) {
         var t = this.owner;this.effectiveOptions().highlight && t.graphics.addShapeGroup(this, "highlight", e), t.setHighlightId(this.areaId), this.changeState("highlight", !0);
      }, drawSelection: function drawSelection() {
         this.owner.graphics.addShapeGroup(this, "select");
      } }, i.MapArea = function (t, a, n) {
      if (t) {
         var i = this;i.owner = t, i.area = a, i.areaDataXref = [], i.originalCoords = [], e.each(o.split(a.coords), function (e, t) {
            i.originalCoords.push(parseFloat(t));
         }), i.length = i.originalCoords.length, i.shape = a.shape.toLowerCase(), i.nohref = a.nohref || !a.href, i.configure(n);
      }
   }, i.MapArea.prototype = { constructor: i.MapArea, configure: function configure(e) {
         this.keys = o.split(e);
      }, reset: function reset() {
         this.area = null;
      }, coords: function coords(t) {
         return e.map(this.originalCoords, function (e) {
            return t ? e : e + t;
         });
      } };
}(jQuery), function (e) {
   var t = e.mapster.utils;t.areaCorners = function (a, n, i, o, r) {
      var s,
          c,
          l,
          u,
          h,
          p,
          f,
          d,
          m,
          g,
          v,
          y,
          w,
          b,
          k,
          _,
          C,
          A,
          I,
          S,
          x = 0,
          T = 0,
          M = [];for (a = a.length ? a : [a], i = e(i ? i : document.body), s = i.offset(), k = s.left, _ = s.top, n && (s = e(n).offset(), x = s.left, T = s.top), b = 0; b < a.length; b++) {
         if (S = a[b], "AREA" === S.nodeName) {
            switch (C = t.split(S.coords, parseInt), S.shape) {case "circle":
                  for (v = C[0], y = C[1], A = C[2], M = [], b = 0; 360 > b; b += 20) {
                     I = b * Math.PI / 180, M.push(v + A * Math.cos(I), y + A * Math.sin(I));
                  }break;case "rect":
                  M.push(C[0], C[1], C[2], C[1], C[2], C[3], C[0], C[3]);break;default:
                  M = M.concat(C);}for (b = 0; b < M.length; b += 2) {
               M[b] = parseInt(M[b], 10) + x, M[b + 1] = parseInt(M[b + 1], 10) + T;
            }
         } else S = e(S), s = S.position(), M.push(s.left, s.top, s.left + S.width(), s.top, s.left + S.width(), s.top + S.height(), s.left, s.top + S.height());
      }for (l = u = f = m = 999999, h = p = d = g = -1, b = M.length - 2; b >= 0; b -= 2) {
         v = M[b], y = M[b + 1], l > v && (l = v, g = y), v > h && (h = v, m = y), u > y && (u = y, d = v), y > p && (p = y, f = v);
      }return o && r && (c = !1, e.each([[d - o, u - r], [f, u - r], [l - o, g - r], [l - o, m], [h, g - r], [h, m], [d - o, p], [f, p]], function (e, t) {
         return !c && t[0] > k && t[1] > _ ? (w = t, c = !0, !1) : void 0;
      }), c || (w = [h, p])), w;
   };
}(jQuery), function (e) {
   var t = e.mapster,
       a = t.utils,
       n = t.MapArea.prototype;t.utils.getScaleInfo = function (e, t) {
      var a;return t ? (a = e.width / t.width || e.height / t.height, a > .98 && 1.02 > a && (a = 1)) : (a = 1, t = e), { scale: 1 !== a, scalePct: a, realWidth: t.width, realHeight: t.height, width: e.width, height: e.height, ratio: e.width / e.height };
   }, t.utils.scaleMap = function (e, t, n) {
      var i = a.size(e),
          o = a.size(t, !0);if (!o.complete()) throw "Another script, such as an extension, appears to be interfering with image loading. Please let us know about this.";return i.complete() || (i = o), this.getScaleInfo(i, n ? o : null);
   }, t.MapData.prototype.resize = function (n, i, o, r) {
      function s(a, n, i) {
         t.hasCanvas() ? (a.width = n, a.height = i) : (e(a).width(n), e(a).height(i));
      }function c() {
         v.currentAction = "", e.isFunction(r) && r(), v.processCommandQueue();
      }function l() {
         if (s(v.overlay_canvas, n, i), m >= 0) {
            var e = v.data[m];e.tempOptions = { fade: !1 }, v.getDataForKey(e.key).highlight(), e.tempOptions = null;
         }s(v.base_canvas, n, i), v.redrawSelections(), c();
      }function u() {
         e(v.image).css(f), v.scaleInfo = a.getScaleInfo({ width: n, height: i }, { width: v.scaleInfo.realWidth, height: v.scaleInfo.realHeight }), e.each(v.data, function (t, a) {
            e.each(a.areas(), function (e, t) {
               t.resize();
            });
         });
      }var h,
          p,
          f,
          d,
          m,
          g,
          v = this;r = r || o, v.scaleInfo.width === n && v.scaleInfo.height === i || (m = v.highlightId, n || (g = i / v.scaleInfo.realHeight, n = Math.round(v.scaleInfo.realWidth * g)), i || (g = n / v.scaleInfo.realWidth, i = Math.round(v.scaleInfo.realHeight * g)), f = { width: String(n) + "px", height: String(i) + "px" }, t.hasCanvas() || e(v.base_canvas).children().remove(), d = e(v.wrapper).find(".mapster_el").add(v.wrapper), o ? (p = [], v.currentAction = "resizing", d.each(function (t, n) {
         h = a.defer(), p.push(h), e(n).animate(f, { duration: o, complete: h.resolve, easing: "linear" });
      }), h = a.defer(), p.push(h), a.when.all(p).then(l), u(), h.resolve()) : (d.css(f), u(), l()));
   }, t.MapArea = a.subclass(t.MapArea, function () {
      this.base.init(), this.owner.scaleInfo.scale && this.resize();
   }), n.coords = function (e, t) {
      var a,
          n = [],
          i = e || this.owner.scaleInfo.scalePct,
          o = t || 0;if (1 === i && 0 === t) return this.originalCoords;for (a = 0; a < this.length; a++) {
         n.push(Math.round(this.originalCoords[a] * i) + o);
      }return n;
   }, n.resize = function () {
      this.area.coords = this.coords().join(",");
   }, n.reset = function () {
      this.area.coords = this.coords(1).join(",");
   }, t.impl.resize = function (e, a, n, i) {
      if (!e && !a) return !1;var o = new t.Method(this, function () {
         this.resize(e, a, n, i);
      }, null, { name: "resize", args: arguments }).go();return o;
   };
}(jQuery), function (e) {
   function t(t, a, n) {
      var i;return a ? (i = "string" == typeof a ? e(a) : e(a).clone(), i.append(t)) : i = e(t), i.css(e.extend(n || {}, { display: "block", position: "absolute" })).hide(), e("body").append(i), i.attr("data-opacity", i.css("opacity")).css("opacity", 0), i.show();
   }function a(e, t) {
      var a = { left: t.left + "px", top: t.top + "px" },
          n = e.attr("data-opacity") || 0,
          i = e.css("z-index");0 !== parseInt(i, 10) && "auto" !== i || (a["z-index"] = 9999), e.css(a).addClass("mapster_tooltip"), t.fadeDuration && t.fadeDuration > 0 ? s.fader(e[0], 0, n, t.fadeDuration) : s.setOpacity(e[0], n);
   }function n(t, a, n, i, o, r) {
      var s = n + ".mapster-tooltip";return e.inArray(a, t) >= 0 ? (i.unbind(s).bind(s, function (e) {
         o && !o.call(this, e) || (i.unbind(".mapster-tooltip"), r && r.call(this));
      }), { object: i, event: s }) : void 0;
   }function i(e, t, n, i, o) {
      var r,
          c = {};return o = o || {}, t ? (r = s.areaCorners(t, n, i, e.outerWidth(!0), e.outerHeight(!0)), c.left = r[0], c.top = r[1]) : (c.left = o.left, c.top = o.top), c.left += o.offsetx || 0, c.top += o.offsety || 0, c.css = o.css, c.fadeDuration = o.fadeDuration, a(e, c), e;
   }function o(e) {
      return e ? "string" == typeof e || e.jquery ? e : e.content : null;
   }var r = e.mapster,
       s = r.utils;e.extend(r.defaults, { toolTipContainer: '<div style="border: 2px solid black; background: #EEEEEE; width:160px; padding:4px; margin: 4px; -moz-box-shadow: 3px 3px 5px #535353; -webkit-box-shadow: 3px 3px 5px #535353; box-shadow: 3px 3px 5px #535353; -moz-border-radius: 6px 6px 6px 6px; -webkit-border-radius: 6px; border-radius: 6px 6px 6px 6px; opacity: 0.9;"></div>', showToolTip: !1, toolTipFade: !0, toolTipClose: ["area-mouseout", "image-mouseout"], onShowToolTip: null, onHideToolTip: null }), e.extend(r.area_defaults, { toolTip: null, toolTipClose: null }), r.MapData.prototype.clearToolTip = function () {
      this.activeToolTip && (this.activeToolTip.stop().remove(), this.activeToolTip = null, this.activeToolTipID = null, s.ifFunction(this.options.onHideToolTip, this));
   }, r.AreaData.prototype.showToolTip = function (a, o) {
      var r,
          c,
          l,
          u,
          h,
          p = {},
          f = this,
          d = f.owner,
          m = f.effectiveOptions();return o = o ? e.extend({}, o) : {}, a = a || m.toolTip, c = o.closeEvents || m.toolTipClose || d.options.toolTipClose || "tooltip-click", h = "undefined" != typeof o.template ? o.template : d.options.toolTipContainer, o.closeEvents = "string" == typeof c ? c = s.split(c) : c, o.fadeDuration = o.fadeDuration || (d.options.toolTipFade ? d.options.fadeDuration || m.fadeDuration : 0), l = f.area ? f.area : e.map(f.areas(), function (e) {
         return e.area;
      }), d.activeToolTipID !== f.areaId ? (d.clearToolTip(), d.activeToolTip = r = t(a, h, o.css), d.activeToolTipID = f.areaId, u = function u() {
         d.clearToolTip();
      }, n(c, "area-click", "click", e(d.map), null, u), n(c, "tooltip-click", "click", r, null, u), n(c, "image-mouseout", "mouseout", e(d.image), function (e) {
         return e.relatedTarget && "AREA" !== e.relatedTarget.nodeName && e.relatedTarget !== f.area;
      }, u), i(r, l, d.image, o.container, h, o), s.ifFunction(d.options.onShowToolTip, f.area, { toolTip: r, options: p, areaOptions: m, key: f.key, selected: f.isSelected() }), r) : void 0;
   }, r.impl.tooltip = function (a, s) {
      return new r.Method(this, function () {
         var r,
             c,
             l = this;if (a) {
            if (c = e(a), l.activeToolTipID === c[0]) return;l.clearToolTip(), l.activeToolTip = r = t(o(s), s.template || l.options.toolTipContainer, s.css), l.activeToolTipID = c[0], n(["tooltip-click"], "tooltip-click", "click", r, null, function () {
               l.clearToolTip();
            }), l.activeToolTip = r = i(r, c, l.image, s.container, s);
         } else l.clearToolTip();
      }, function () {
         e.isPlainObject(a) && !s && (s = a), this.showToolTip(o(s), s);
      }, { name: "tooltip", args: arguments, key: a }).go();
   };
}(jQuery);
//# sourceMappingURL=0vendor.js.map
