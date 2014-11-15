/**!
 * Brickfolio - A jQuery plugin for equally spaced grid layouts
 * @version 0.0.2
 * @link https://github.com/fooplugins/brickfolio
 * @copyright Steven Usher & Brad Vincent 2014
 * @license Released under the GPL license.
 * You are free to use Brickfolio in personal projects as long as this copyright header is left intact.
 */
(function(t){function e(i,o){if(!(this instanceof e))return new e(i,o);var s=this,n={};return s.defaults={animation:"",filter:"",itemSelector:".bf-item",imageSelector:"img:first",gutter:40,responseTime:100,hideErrors:!1,loadTime:0,classes:{container:"brickfolio",loaded:"bf-loaded",item:"bf-item",error:"bf-error",filtered:"bf-filtered"}},s.$el=t(i),s.options=t.extend(!0,s.defaults,o),n.loader=null,n.layout=null,n.timer=null,n.isIE=null,n.damnYouIE=function(t){null==n.isIE&&(n.isIE=window.navigator.userAgent.indexOf("MSIE ")>0||!!navigator.userAgent.match(/Trident.*rv\:11\./)),1==n.isIE&&t.attr("src",t.attr("src"))},n.supportsAnimation=function(){var t,e=document.body||document.documentElement,i=e.style,o="animation";if("string"==typeof i[o])return!0;t=["Moz","Webkit","Khtml","O","ms"],o=o.charAt(0).toUpperCase()+o.substr(1);for(var s=0;t.length>s;s++)if("string"==typeof i[t[s]+o])return!0;return!1},n.init=function(){"static"==s.$el.css("position")&&s.$el.css("position","relative"),s.$el.addClass(s.options.classes.container).css("overflow","hidden"),n.supportsAnimation()&&s.$el.addClass(s.options.animation);var e=s.$el.find(s.options.itemSelector).addClass(s.options.classes.item).css({position:"absolute",display:"inline-block",margin:0,visibility:"hidden"});return e.length>0&&s.wait(e).always(function(){e=s.filter(e),t(window).on("resize.brickfolio",function(){null!=n.timer&&clearTimeout(n.timer),n.timer=setTimeout(function(){n.timer=null,s.layout(e)},s.options.responseTime)}),s.layout(e),e.css("visibility",""),s.$el.addClass(s.options.classes.loaded)}),s},s.reinit=function(e){t(window).off("resize.brickfolio"),s.$el.find(s.options.itemSelector).removeClass([s.options.classes.loaded,s.options.classes.error,s.options.classes.filtered].join(" ")).css("visibility","hidden").end().removeClass([s.options.animation,s.options.classes.loaded].join(" ")),s.options=t.extend(!0,s.options,e),n.init()},s.filter=function(t){return t.removeClass(s.options.classes.filtered),s.options.hideErrors&&t.filter("."+s.options.classes.error).addClass(s.options.classes.filtered).hide(),"string"==typeof s.options.filter&&s.options.filter.length>0&&t.not(s.options.filter).addClass(s.options.classes.filtered).hide(),t.not("."+s.options.classes.filtered).show()},s.wait=function(e){var i=[];return e.each(function(){var e=t(this),o=e.find(s.options.imageSelector),r=new t.Deferred(function(t){setTimeout(function(){if(0==o.length)t.resolve();else if(1==o.get(0).complete){var i=o.get(0);"naturalHeight"in i&&"naturalWidth"in i&&0==i.naturalHeight&&0==i.naturalWidth?e.addClass(s.options.classes.error):e.addClass(s.options.classes.loaded),t.resolve()}else o.on({"load.brickfolio":function(){o.off(".brickfolio"),e.addClass(s.options.classes.loaded),t.resolve()},"error.brickfolio":function(){o.off(".brickfolio"),e.addClass(s.options.classes.error),t.resolve()}}),n.damnYouIE(o)},s.options.loadTime)});i.push(r)}),t.when.apply(t,i)},s.layout=function(e){var i=e.first(":not(."+s.options.classes.error+")").outerWidth(),o=s.$el.width(),r=parseInt(s.$el.css("paddingLeft")),l=parseInt(s.$el.css("paddingTop")),a={height:0,outer:0},d=[],f=s.options.gutter,u=l,c=Math.floor(o/i);c=Math.floor((o-(c-1)*s.options.gutter)/i),s.options.hideErrors&&(e=e.not("."+s.options.classes.error)),e.each(function(e){var n=t(this),l=s.getHeights(n);0==e%c?(d.length>0&&(f=s.update(d,a.height,i,o,c,f,u,r),u+=a.outer+s.options.gutter),d.length=0,a=l,d.push(n)):(a=l.height>a.height?l:a,d.push(n))}),s.update(d,a.height,i,o,c,f,u,r),u+=a.outer-l,s.$el.height(u),n.layout&&clearTimeout(n.layout),n.layout=setTimeout(function(){o!=s.$el.width()&&s.layout(e)},600)},s.update=function(t,e,i,o,n,r,l,a){if(0==t.length)return r;var d=n>t.length||2>=t.length,f=o-t.length*i;if(1==t.length)s.setHeights(t[0],e),a+=f/2,t[0].css({top:l,left:a});else{r=d?r:Math.floor(f/(t.length-1)),a+=d?Math.floor((f-(t.length-1)*r)/2):0;for(var u=0;t.length>u;u++)s.setHeights(t[u],e),t[u].css({top:l,left:a+i*u+r*u})}return r},s.setHeights=function(t,e){void 0==t.data("brickfolio_height")&&t.data("brickfolio_height",{height:t.height(),outer:t.outerHeight()}),t.height(e)},s.getHeights=function(t){return void 0==t.data("brickfolio_height")?{height:t.height(),outer:t.outerHeight()}:t.data("brickfolio_height")},n.init(!1)}t.fn.brickfolio=function(t){return this.each(function(){this.__brickfolio__?this.__brickfolio__.reinit(t):this.__brickfolio__=new e(this,t)})}})(jQuery);

jQuery(function ($) {
	$('.foogallery-simple_portfolio').brickfolio( {imageSelector:"img.bf-img:first"} );
});