var s;s=function(u){"use strict";function s(e,t){var s=this;s.element=e,s.$element=u(e),s.state={multiple:!!s.$element.attr("multiple"),enabled:!1,opened:!1,currValue:-1,selectedIdx:-1,highlightedIdx:-1},s.eventTriggers={open:s.open,close:s.close,destroy:s.destroy,refresh:s.refresh,init:s.init},s.init(t)}var t=u(document),l=u(window),r="selectric",i=".sl",n=["a","e","i","o","u","n","c","y"],a=[/[\xE0-\xE5]/g,/[\xE8-\xEB]/g,/[\xEC-\xEF]/g,/[\xF2-\xF6]/g,/[\xF9-\xFC]/g,/[\xF1]/g,/[\xE7]/g,/[\xFD-\xFF]/g];s.prototype={utils:{isMobile:function(){return/android|ip(hone|od|ad)/i.test(navigator.userAgent)},escapeRegExp:function(e){return e.replace(/[.*+?^${}()|[\]\\]/g,"\\$&")},replaceDiacritics:function(e){for(var t=a.length;t--;)e=e.toLowerCase().replace(a[t],n[t]);return e},format:function(e){var i=arguments;return(""+e).replace(/\{(?:(\d+)|(\w+))\}/g,function(e,t,s){return s&&i[1]?i[1][s]:i[t]})},nextEnabledItem:function(e,t){for(;e[t=(t+1)%e.length].disabled;);return t},previousEnabledItem:function(e,t){for(;e[t=(0<t?t:e.length)-1].disabled;);return t},toDash:function(e){return e.replace(/([a-z0-9])([A-Z])/g,"$1-$2").toLowerCase()},triggerCallback:function(e,t){var s=t.element,i=t.options["on"+e],t=[s].concat([].slice.call(arguments).slice(1));u.isFunction(i)&&i.apply(s,t),u(s).trigger(r+"-"+this.toDash(e),t)},arrayToClassname:function(e){e=u.grep(e,function(e){return!!e});return u.trim(e.join(" "))}},init:function(e){var t,s,i,l,n,a,o=this;o.options=u.extend(!0,{},u.fn[r].defaults,o.options,e),o.utils.triggerCallback("BeforeInit",o),o.destroy(!0),o.options.disableOnMobile&&o.utils.isMobile()?o.disableOnMobile=!0:(o.classes=o.getClassNames(),t=u("<input/>",{class:o.classes.input,readonly:o.utils.isMobile()}),s=u("<div/>",{class:o.classes.items,tabindex:-1}),i=u("<div/>",{class:o.classes.scroll}),l=u("<div/>",{class:o.classes.prefix,html:o.options.arrowButtonMarkup}),n=u("<span/>",{class:"label"}),a=o.$element.wrap("<div/>").parent().append(l.prepend(n),s,t),e=u("<div/>",{class:o.classes.hideselect}),o.elements={input:t,items:s,itemsScroll:i,wrapper:l,label:n,outerWrapper:a},o.options.nativeOnMobile&&o.utils.isMobile()&&(o.elements.input=void 0,e.addClass(o.classes.prefix+"-is-native"),o.$element.on("change",function(){o.refresh()})),o.$element.on(o.eventTriggers).wrap(e),o.originalTabindex=o.$element.prop("tabindex"),o.$element.prop("tabindex",-1),o.populate(),o.activate(),o.utils.triggerCallback("Init",o))},activate:function(){var e=this,t=e.elements.items.closest(":visible").children(":hidden").addClass(e.classes.tempshow),s=e.$element.width();t.removeClass(e.classes.tempshow),e.utils.triggerCallback("BeforeActivate",e),e.elements.outerWrapper.prop("class",e.utils.arrayToClassname([e.classes.wrapper,e.$element.prop("class").replace(/\S+/g,e.classes.prefix+"-$&"),e.options.responsive?e.classes.responsive:""])),e.options.inheritOriginalWidth&&0<s&&e.elements.outerWrapper.width(s),e.unbindEvents(),e.$element.prop("disabled")?(e.elements.outerWrapper.addClass(e.classes.disabled),e.elements.input&&e.elements.input.prop("disabled",!0)):(e.state.enabled=!0,e.elements.outerWrapper.removeClass(e.classes.disabled),e.$li=e.elements.items.removeAttr("style").find("li"),e.bindEvents()),e.utils.triggerCallback("Activate",e)},getClassNames:function(){var i=this,l=i.options.customClass,n={};return u.each("Input Items Open Disabled TempShow HideSelect Wrapper Focus Hover Responsive Above Below Scroll Group GroupLabel".split(" "),function(e,t){var s=l.prefix+t;n[t.toLowerCase()]=l.camelCase?s:i.utils.toDash(s)}),n.prefix=l.prefix,n},setLabel:function(){var t,e,s=this,i=s.options.labelBuilder;s.state.multiple?(e=0===(e=u.isArray(s.state.currValue)?s.state.currValue:[s.state.currValue]).length?[0]:e,t=u.map(e,function(t){return u.grep(s.lookupItems,function(e){return e.index===t})[0]}),t=u.grep(t,function(e){return 1<t.length||0===t.length?""!==u.trim(e.value):e}),t=u.map(t,function(e){return u.isFunction(i)?i(e):s.utils.format(i,e)}),s.options.multiple.maxLabelEntries&&(t.length>=s.options.multiple.maxLabelEntries+1?(t=t.slice(0,s.options.multiple.maxLabelEntries)).push(u.isFunction(i)?i({text:"..."}):s.utils.format(i,{text:"..."})):t.slice(t.length-1)),s.elements.label.html(t.join(s.options.multiple.separator))):(e=s.lookupItems[s.state.currValue],s.elements.label.html(u.isFunction(i)?i(e):s.utils.format(i,e)))},populate:function(){var i=this,e=i.$element.children(),t=i.$element.find("option"),s=t.filter(":selected"),l=t.index(s),n=0,t=i.state.multiple?[]:0;1<s.length&&i.state.multiple&&(l=[],s.each(function(){l.push(u(this).index())})),i.state.currValue=~l?l:t,i.state.selectedIdx=i.state.currValue,i.state.highlightedIdx=i.state.currValue,i.items=[],i.lookupItems=[],e.length&&(e.each(function(e){var s,t=u(this);t.is("optgroup")?(s={element:t,label:t.prop("label"),groupDisabled:t.prop("disabled"),items:[]},t.children().each(function(e){var t=u(this);s.items[e]=i.getItemData(n,t,s.groupDisabled||t.prop("disabled")),i.lookupItems[n]=s.items[e],n++}),i.items[e]=s):(i.items[e]=i.getItemData(n,t,t.prop("disabled")),i.lookupItems[n]=i.items[e],n++)}),i.setLabel(),i.elements.items.append(i.elements.itemsScroll.html(i.getItemsMarkup(i.items))))},getItemData:function(e,t,s){return{index:e,element:t,value:t.val(),className:t.prop("class"),text:t.html(),slug:u.trim(this.utils.replaceDiacritics(t.html())),alt:t.attr("data-alt"),selected:t.prop("selected"),disabled:s}},getItemsMarkup:function(e){var s=this,i="<ul>";return u.isFunction(s.options.listBuilder)&&s.options.listBuilder&&(e=s.options.listBuilder(e)),u.each(e,function(e,t){void 0!==t.label?(i+=s.utils.format('<ul class="{1}"><li class="{2}">{3}</li>',s.utils.arrayToClassname([s.classes.group,t.groupDisabled?"disabled":"",t.element.prop("class")]),s.classes.grouplabel,t.element.prop("label")),u.each(t.items,function(e,t){i+=s.getItemMarkup(t.index,t)}),i+="</ul>"):i+=s.getItemMarkup(t.index,t)}),i+"</ul>"},getItemMarkup:function(e,t){var s=this,i=s.options.optionsItemBuilder,l={value:t.value,text:t.text,slug:t.slug,index:t.index};return s.utils.format('<li data-index="{1}" class="{2}">{3}</li>',e,s.utils.arrayToClassname([t.className,e===s.items.length-1?"last":"",t.disabled?"disabled":"",t.selected?"selected":""]),u.isFunction(i)?s.utils.format(i(t,this.$element,e),t):s.utils.format(i,l))},unbindEvents:function(){this.elements.wrapper.add(this.$element).add(this.elements.outerWrapper).add(this.elements.input).off(i)},bindEvents:function(){var n=this;n.elements.outerWrapper.on("mouseenter.sl mouseleave"+i,function(e){u(this).toggleClass(n.classes.hover,"mouseenter"===e.type),n.options.openOnHover&&(clearTimeout(n.closeTimer),"mouseleave"===e.type?n.closeTimer=setTimeout(u.proxy(n.close,n),n.options.hoverIntentTimeout):n.open())}),n.elements.wrapper.on("click"+i,function(e){n.state.opened?n.close():n.open(e)}),n.options.nativeOnMobile&&n.utils.isMobile()||(n.$element.on("focus"+i,function(){n.elements.input.focus()}),n.elements.input.prop({tabindex:n.originalTabindex,disabled:!1}).on("keydown"+i,u.proxy(n.handleKeys,n)).on("focusin"+i,function(e){n.elements.outerWrapper.addClass(n.classes.focus),n.elements.input.one("blur",function(){n.elements.input.blur()}),n.options.openOnFocus&&!n.state.opened&&n.open(e)}).on("focusout"+i,function(){n.elements.outerWrapper.removeClass(n.classes.focus)}).on("input propertychange",function(){var e=n.elements.input.val(),l=new RegExp("^"+n.utils.escapeRegExp(e),"i");clearTimeout(n.resetStr),n.resetStr=setTimeout(function(){n.elements.input.val("")},n.options.keySearchTimeout),e.length&&u.each(n.items,function(e,t){if(!t.disabled){if(l.test(t.text)||l.test(t.slug))return n.highlight(e),!1;if(t.alt)for(var s=t.alt.split("|"),i=0;i<s.length&&s[i];i++)if(l.test(s[i].trim()))return n.highlight(e),!1}})})),n.$li.on({mousedown:function(e){e.preventDefault(),e.stopPropagation()},click:function(){return n.select(u(this).data("index")),!1}})},handleKeys:function(e){var t=this,s=e.which,i=t.options.keys,l=-1<u.inArray(s,i.previous),n=-1<u.inArray(s,i.next),a=-1<u.inArray(s,i.select),o=-1<u.inArray(s,i.open),r=t.state.highlightedIdx,p=l&&0===r||n&&r+1===t.items.length,i=0;if(13!==s&&32!==s||e.preventDefault(),l||n){if(!t.options.allowWrap&&p)return;l&&(i=t.utils.previousEnabledItem(t.lookupItems,r)),n&&(i=t.utils.nextEnabledItem(t.lookupItems,r)),t.highlight(i)}if(a&&t.state.opened)return t.select(r),void(t.state.multiple&&t.options.multiple.keepMenuOpen||t.close());o&&!t.state.opened&&t.open()},refresh:function(){this.populate(),this.activate(),this.utils.triggerCallback("Refresh",this)},setOptionsDimensions:function(){var e=this,t=e.elements.items.closest(":visible").children(":hidden").addClass(e.classes.tempshow),s=e.options.maxHeight,i=e.elements.items.outerWidth(),l=e.elements.wrapper.outerWidth()-(i-e.elements.items.width());!e.options.expandToItemText||i<l?e.finalWidth=l:(e.elements.items.css("overflow","scroll"),e.elements.outerWrapper.width(9e4),e.finalWidth=e.elements.items.width(),e.elements.items.css("overflow",""),e.elements.outerWrapper.width("")),e.elements.items.width(e.finalWidth).height()>s&&e.elements.items.height(s),t.removeClass(e.classes.tempshow)},isInViewport:function(){var e,t,s,i=this;!0===i.options.forceRenderAbove?i.elements.outerWrapper.addClass(i.classes.above):!0===i.options.forceRenderBelow?i.elements.outerWrapper.addClass(i.classes.below):(s=l.scrollTop(),t=l.height(),t=(e=i.elements.outerWrapper.offset().top)+i.elements.outerWrapper.outerHeight()+i.itemsHeight<=s+t,s=e-i.itemsHeight>s,s=!(t=!t&&s),i.elements.outerWrapper.toggleClass(i.classes.above,t),i.elements.outerWrapper.toggleClass(i.classes.below,s))},detectItemVisibility:function(e){var t=this,s=t.$li.filter("[data-index]");t.state.multiple&&(e=u.isArray(e)&&0===e.length?0:e,e=u.isArray(e)?Math.min.apply(Math,e):e);var i=s.eq(e).outerHeight(),l=s[e].offsetTop,s=t.elements.itemsScroll.scrollTop(),e=l+2*i;t.elements.itemsScroll.scrollTop(e>s+t.itemsHeight?e-t.itemsHeight:l-i<s?l-i:s)},open:function(e){var l=this;if(l.options.nativeOnMobile&&l.utils.isMobile())return!1;l.utils.triggerCallback("BeforeOpen",l),e&&(e.preventDefault(),l.options.stopPropagation&&e.stopPropagation()),l.state.enabled&&(l.setOptionsDimensions(),u("."+l.classes.hideselect,"."+l.classes.open).children()[r]("close"),l.state.opened=!0,l.itemsHeight=l.elements.items.outerHeight(),l.itemsInnerHeight=l.elements.items.height(),l.elements.outerWrapper.addClass(l.classes.open),l.elements.input.val(""),e&&"focusin"!==e.type&&l.elements.input.focus(),setTimeout(function(){t.on("click"+i,u.proxy(l.close,l)).on("scroll"+i,u.proxy(l.isInViewport,l))},1),l.isInViewport(),l.options.preventWindowScroll&&t.on("mousewheel.sl DOMMouseScroll"+i,"."+l.classes.scroll,function(e){var t=e.originalEvent,s=u(this).scrollTop(),i=0;"detail"in t&&(i=-1*t.detail),"wheelDelta"in t&&(i=t.wheelDelta),"wheelDeltaY"in t&&(i=t.wheelDeltaY),"deltaY"in t&&(i=-1*t.deltaY),(s===this.scrollHeight-l.itemsInnerHeight&&i<0||0===s&&0<i)&&e.preventDefault()}),l.detectItemVisibility(l.state.selectedIdx),l.highlight(l.state.multiple?-1:l.state.selectedIdx),l.utils.triggerCallback("Open",l))},close:function(){var e=this;e.utils.triggerCallback("BeforeClose",e),t.off(i),e.elements.outerWrapper.removeClass(e.classes.open),e.state.opened=!1,e.utils.triggerCallback("Close",e)},change:function(){var s=this;s.utils.triggerCallback("BeforeChange",s),s.state.multiple?(u.each(s.lookupItems,function(e){s.lookupItems[e].selected=!1,s.$element.find("option").prop("selected",!1)}),u.each(s.state.selectedIdx,function(e,t){s.lookupItems[t].selected=!0,s.$element.find("option").eq(t).prop("selected",!0)}),s.state.currValue=s.state.selectedIdx,s.setLabel(),s.utils.triggerCallback("Change",s)):s.state.currValue!==s.state.selectedIdx&&(s.$element.prop("selectedIndex",s.state.currValue=s.state.selectedIdx).data("value",s.lookupItems[s.state.selectedIdx].text),s.setLabel(),s.utils.triggerCallback("Change",s))},highlight:function(e){var t=this,s=t.$li.filter("[data-index]").removeClass("highlighted");t.utils.triggerCallback("BeforeHighlight",t),void 0===e||-1===e||t.lookupItems[e].disabled||(s.eq(t.state.highlightedIdx=e).addClass("highlighted"),t.detectItemVisibility(e),t.utils.triggerCallback("Highlight",t))},select:function(e){var t,s=this,i=s.$li.filter("[data-index]");s.utils.triggerCallback("BeforeSelect",s,e),void 0===e||-1===e||s.lookupItems[e].disabled||(s.state.multiple?(s.state.selectedIdx=u.isArray(s.state.selectedIdx)?s.state.selectedIdx:[s.state.selectedIdx],-1!==(t=u.inArray(e,s.state.selectedIdx))?s.state.selectedIdx.splice(t,1):s.state.selectedIdx.push(e),i.removeClass("selected").filter(function(e){return-1!==u.inArray(e,s.state.selectedIdx)}).addClass("selected")):i.removeClass("selected").eq(s.state.selectedIdx=e).addClass("selected"),s.state.multiple&&s.options.multiple.keepMenuOpen||s.close(),s.change(),s.utils.triggerCallback("Select",s,e))},destroy:function(e){var t=this;t.state&&t.state.enabled&&(t.elements.items.add(t.elements.wrapper).add(t.elements.input).remove(),e||t.$element.removeData(r).removeData("value"),t.$element.prop("tabindex",t.originalTabindex).off(i).off(t.eventTriggers).unwrap().unwrap(),t.state.enabled=!1)}},u.fn[r]=function(t){return this.each(function(){var e=u.data(this,r);e&&!e.disableOnMobile?"string"==typeof t&&e[t]?e[t]():e.init(t):u.data(this,r,new s(this,t))})},u.fn[r].defaults={onChange:function(e){u(e).change()},maxHeight:300,keySearchTimeout:500,arrowButtonMarkup:'<b class="button">&#x25be;</b>',disableOnMobile:!1,nativeOnMobile:!0,openOnFocus:!0,openOnHover:!1,hoverIntentTimeout:500,expandToItemText:!1,responsive:!1,preventWindowScroll:!0,inheritOriginalWidth:!1,allowWrap:!0,forceRenderAbove:!1,forceRenderBelow:!1,stopPropagation:!0,optionsItemBuilder:"{text}",labelBuilder:"{text}",listBuilder:!1,keys:{previous:[37,38],next:[39,40],select:[9,13,27],open:[13,32,37,38,39,40],close:[9,27]},customClass:{prefix:r,camelCase:!1},multiple:{separator:", ",keepMenuOpen:!0,maxLabelEntries:!1}}},"function"==typeof define&&define.amd?define(["jquery"],s):"object"==typeof module&&module.exports?module.exports=function(e,t){return void 0===t&&(t="undefined"!=typeof window?require("jquery"):require("jquery")(e)),s(t),t}:s(jQuery),$(document).ready(function(){$(".main-slider__list").length&&new Swiper(".main-slider__list",{slidesPerView:1,loop:!0,observer:!0,observeParents:!0,lazy:!0,navigation:{nextEl:".main-slider__next",prevEl:".main-slider__prev"}}),$(".main-category").length&&new Swiper(".main-category__container",{slidesPerView:4,spaceBetween:19,observer:!0,observeParents:!0,lazy:!0,navigation:{nextEl:".main-category__next",prevEl:".main-category__prev"}})});