



<!DOCTYPE html><!--[if lt IE 7]>
<html lang="en-US" class="static detail-page contents ie ie6 lte9 lte8 lte7"> <![endif]--><!--[if IE 7]>
<html lang="en-US" class="static detail-page contents contents ie ie7 lte9 lte8 lte7"> <![endif]--><!--[if IE 8]>
<html lang="en-US" class="static detail-page contents contents contents ie ie8 lte9 lte8"> <![endif]--><!--[if IE 9]>
<html lang="en-US" class="static detail-page contents contents contents contents ie ie9 lte9"> <![endif]--><!--[if gt IE 9]>
<html lang="en-US" class="static detail-page contents contents contents contents contents"><![endif]--><!--[if !IE]><!-->
<html lang="en-US" class="static detail-page contents contents contents contents contents contents"><!--<![endif]-->
<head>
    <meta charset="UTF8">
    <base href="http://m.visitjamaica.com/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><script type="text/javascript">window.NREUM||(NREUM={});NREUM.info = {"beacon":"bam.nr-data.net","errorBeacon":"bam.nr-data.net","licenseKey":"5b8260701e","applicationID":"2142263","transactionName":"MQZXNhMHWUFRBREKDQhMfRYVFn9TXgIJBhBJLEcBCQdFVh4rEwBMNAxAFgQVGWFYAwkPMAkWQQdKLkNGQCcWGgwFK1QMBQpSQA==","queueTime":0,"applicationTime":1106,"ttGuid":"7CBF3FDFA9BFEF5","agent":""}</script><script type="text/javascript">window.NREUM||(NREUM={}),__nr_require=function(e,n,t){function r(t){if(!n[t]){var o=n[t]={exports:{}};e[t][0].call(o.exports,function(n){var o=e[t][1][n];return r(o||n)},o,o.exports)}return n[t].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<t.length;o++)r(t[o]);return r}({1:[function(e,n,t){function r(){}function o(e,n,t){return function(){return i(e,[c.now()].concat(u(arguments)),n?null:this,t),n?void 0:this}}var i=e("handle"),a=e(2),u=e(3),f=e("ee").get("tracer"),c=e("loader"),s=NREUM;"undefined"==typeof window.newrelic&&(newrelic=s);var p=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],d="api-",l=d+"ixn-";a(p,function(e,n){s[n]=o(d+n,!0,"api")}),s.addPageAction=o(d+"addPageAction",!0),s.setCurrentRouteName=o(d+"routeName",!0),n.exports=newrelic,s.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(e,n){var t={},r=this,o="function"==typeof n;return i(l+"tracer",[c.now(),e,t],r),function(){if(f.emit((o?"":"no-")+"fn-start",[c.now(),r,o],t),o)try{return n.apply(this,arguments)}finally{f.emit("fn-end",[c.now()],t)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(e,n){m[n]=o(l+n)}),newrelic.noticeError=function(e){"string"==typeof e&&(e=new Error(e)),i("err",[e,c.now()])}},{}],2:[function(e,n,t){function r(e,n){var t=[],r="",i=0;for(r in e)o.call(e,r)&&(t[i]=n(r,e[r]),i+=1);return t}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],3:[function(e,n,t){function r(e,n,t){n||(n=0),"undefined"==typeof t&&(t=e?e.length:0);for(var r=-1,o=t-n||0,i=Array(o<0?0:o);++r<o;)i[r]=e[n+r];return i}n.exports=r},{}],4:[function(e,n,t){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(e,n,t){function r(){}function o(e){function n(e){return e&&e instanceof r?e:e?f(e,u,i):i()}function t(t,r,o,i){if(!d.aborted||i){e&&e(t,r,o);for(var a=n(o),u=m(t),f=u.length,c=0;c<f;c++)u[c].apply(a,r);var p=s[y[t]];return p&&p.push([b,t,r,a]),a}}function l(e,n){v[e]=m(e).concat(n)}function m(e){return v[e]||[]}function w(e){return p[e]=p[e]||o(t)}function g(e,n){c(e,function(e,t){n=n||"feature",y[t]=n,n in s||(s[n]=[])})}var v={},y={},b={on:l,emit:t,get:w,listeners:m,context:n,buffer:g,abort:a,aborted:!1};return b}function i(){return new r}function a(){(s.api||s.feature)&&(d.aborted=!0,s=d.backlog={})}var u="nr@context",f=e("gos"),c=e(2),s={},p={},d=n.exports=o();d.backlog=s},{}],gos:[function(e,n,t){function r(e,n,t){if(o.call(e,n))return e[n];var r=t();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(e,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return e[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(e,n,t){function r(e,n,t,r){o.buffer([e],r),o.emit(e,n,t)}var o=e("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(e,n,t){function r(e){var n=typeof e;return!e||"object"!==n&&"function"!==n?-1:e===window?0:a(e,i,function(){return o++})}var o=1,i="nr@id",a=e("gos");n.exports=r},{}],loader:[function(e,n,t){function r(){if(!x++){var e=h.info=NREUM.info,n=d.getElementsByTagName("script")[0];if(setTimeout(s.abort,3e4),!(e&&e.licenseKey&&e.applicationID&&n))return s.abort();c(y,function(n,t){e[n]||(e[n]=t)}),f("mark",["onload",a()+h.offset],null,"api");var t=d.createElement("script");t.src="https://"+e.agent,n.parentNode.insertBefore(t,n)}}function o(){"complete"===d.readyState&&i()}function i(){f("mark",["domContent",a()+h.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(u=Math.max((new Date).getTime(),u))-h.offset}var u=(new Date).getTime(),f=e("handle"),c=e(2),s=e("ee"),p=window,d=p.document,l="addEventListener",m="attachEvent",w=p.XMLHttpRequest,g=w&&w.prototype;NREUM.o={ST:setTimeout,SI:p.setImmediate,CT:clearTimeout,XHR:w,REQ:p.Request,EV:p.Event,PR:p.Promise,MO:p.MutationObserver};var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1044.min.js"},b=w&&g&&g[l]&&!/CriOS/.test(navigator.userAgent),h=n.exports={offset:u,now:a,origin:v,features:{},xhrWrappable:b};e(1),d[l]?(d[l]("DOMContentLoaded",i,!1),p[l]("load",r,!1)):(d[m]("onreadystatechange",o),p[m]("onload",r)),f("mark",["firstbyte",u],null,"api");var x=0,E=e(4)},{}]},{},["loader"]);</script>
    <meta name="author" content="Hellocomputer">
    <meta name="viewport" content="width=device-width">

    <meta property="og:title" content=">Visit Jamaica" />
    <meta property="og:type" content="website" />

    <meta property="og:site_name" content="Visit Jamaica" />
    <meta property="og:locale" content="en_US" />

    <meta name="twitter:card" content="summary">

    <meta name="twitter:title" content="Visit Jamaica">
    <meta name="twitter:site" content="Visit Jamaica">
    <meta name="twitter:creator" content="Visit Jamaica">

    <title>Visit Jamaica</title>
    <link rel="canonical" href="http://m.visitjamaica.com/conventions/jtb-services">

    <link href="/Themes/VisitJamaicaMobi/Styles/site.min.css" rel="stylesheet" type="text/css" />
<link href="/Media/Default/_PiedoneModules/Combinator/Styles/-343369900-2.css?timestamp=131098014650000000" rel="stylesheet" type="text/css" />
<link href="/Themes/VisitJamaicaMobi/content/favicon.ico" rel="shortcut icon" type="image/x-icon" />
@yield('css-head')

    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-5637618-1']);
        _gaq.push(['_setDomainName', 'visitjamaica.com']);
        _gaq.push(['_setAllowLinker', true]);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <script>(function (d) { d.className = "dyn" + d.className.substring(6, d.className.length); })(document.documentElement);</script>
    <script type="text/javascript">
        // won't work without valid partner ID for p=
        var _adara_script = document.createElement("script");
        var pathName = location.pathname;
        _adara_script.setAttribute("src", "https://tag.yieldoptimizer.com/ps/ps?t=s&p=1934&pg=" + pathName);
        document.getElementsByTagName("head")[0].appendChild(_adara_script);
    </script>
    <script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
    ]) !!};
    </script>

    @yield('script-head')
</head>
<body onload="@yield('body-onload')">
    <!--[if lte IE 8]>
        <div class="container">
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        </div>
    <![endif]-->



<div class="split-13" id="layout-wrapper">


    <div id="layout-navigation" class="group">
        <div class="zone zone-mobi-navigation">
<article class="widget-main-nav-mobi widget-mobi-navigation widget-visit-jamaica-mobi-navigation-widget widget">
    <div id="main-nav-container">
    <div id="mobi-nav">
        <ul>
            <li><a title="Things to do" href="/things-to-do">Things to do<br/> <span>Get out and about on the island of All Right.</span></a></li>
            <li><a title="Feel the vibe" href="/feel-the-vibe">Feel the vibe<br/> <span>Learn about all things that make jamaica special.</span></a></li>
            <li><a title="Your travel guide" href="/your-travel-guide">Your travel guide<br/> <span>Planning your travels is easier than you think.</span></a></li>
            <li><a title="Where to stay" href="/where-to-stay">Where to stay<br/> <span>Find your island accommodation.</span></a></li>
            <li><a title="Wedding and Honeymoons" href="/weddings-and-honeymoons">Wedding & Honeymoons<br/> <span>Tying the knot is a piece of cake on the island of all right.</span></a></li>
            <li><a title="Conventions" href="/conventions">Conventions<br/> <span>Increase your productivity in an island environment.</span></a></li>
        </ul>
    </div>
    <div class="site-logo"><a href="/" title="Visit Jamaica"><img alt="Visit Jamaica" src="/themes/visitjamaicamobi/content/logo-mobile.png" /></a></div>
    <div class="search-icon"><a href="#" title="Menu"><img alt="Visit Jamaica" src="/themes/visitjamaicamobi/content/mobile-search-icon.png" /></a></div>
    <div class="collapse-icon"><a href="#" title="Menu"><img alt="Visit Jamaica" src="/themes/visitjamaicamobi/content/collapsed-menu-icon.png" /></a></div>
</div>
</article>
<article class="widget-mobi-search-form widget-mobi-navigation widget-search-form widget">




<form action="/Search" class="search-form" method="get">    <fieldset>
        <input id="q" name="q" type="text" value="" />
        <button type="submit">Search</button>
    </fieldset>
</form>
</article></div>
    </div>



    <div id="content" class="group section">
        <div class="zone zone-mobi-content">





<div id="page-header-titles">
    <h1 style="font-family:impact;">Travel Agent Locator</h1>
</div>
    <div id="page-header-share">
        <header>
            <h1>Share:</h1>
        </header>
        <a href="http://www.facebook.com/sharer.php?u=http%3a%2f%2fm.visitjamaica.com%2fconventions%2fjtb-services" title="Facebook" id="facebook" class="share-facebook" onclick="_gaq.push(['_trackEvent', 'Social Share Buttons', 'Facebook', window.location.href]);"></a>
        <a href="https://twitter.com/share?url=http%3a%2f%2fm.visitjamaica.com%2fconventions%2fjtb-services" title="Twitter" id="twitter" class="share-twitter" onclick="_gaq.push(['_trackEvent', 'Social Share Buttons', 'Twitter', window.location.href]);"></a>
        <a target="_blank" href="https://plus.google.com/share?url=http%3a%2f%2fm.visitjamaica.com%2fconventions%2fjtb-services" class="share-google" onclick="_gaq.push(['_trackEvent', 'Social Share Buttons', 'Google+', window.location.href]);"></a>
        <a href="http://pinterest.com/pin/create/button/?media=http%3a%2f%2fm.visitjamaica.com%2fconventions%2fjtb-services" data-pin-do="buttonPin" title="Pinterest" id="pinterest" class="share-pinterest" onclick="_gaq.push(['_trackEvent', 'Social Share Buttons', 'Pinterest', window.location.href]);"></a>
    </div>

<div id="Meet the JTB" class="content-section" nav-side="" p="">
  @yield('content')

</div>
</div>
    </div>

    <div id="footer-sig" class="group">
        <div class="zone zone-mobi-footer">
<article class="widget-social-footer-menu widget-mobi-footer widget-html-widget widget">


<div id="page-header-titles">
    <header>
<h1 style="font-family:impact;">Follow us on</h1>
</header><nav>
<ul class="menu menu-social-menu">
<li class="first">
<p><a href="https://www.facebook.com/visitjamaica" class="social-facebook" target="_blank">&nbsp;</a></p>
</li>
<li>
<p><a href="https://twitter.com/VisitJamaicaNow" class="social-twitter" target="_blank">&nbsp;</a></p>
</li>
<li>
<p><a href="http://www.instagram.com/visitjamaica" class="social-insta" target="_blank">&nbsp;</a></p>
</li>
<li>
<p><a href="http://www.youtube.com/myjamaicajtb" class="social-youtube" target="_blank">&nbsp;</a></p>
</li>
<li class="last">
<p><a href="http://www.pinterest.com/myjamaica/" class="social-pin" target="_blank">&nbsp;</a></p>
</li>
</ul>
</nav>
</div>
</article>
<article class="widget-footer-mobi widget-mobi-footer widget-visit-jamaica-mobi-footer-widget widget">
    <div id="footer-links">
    <ul>
        <li class="title">Best of Jamaica</li>
        <li><a title="Why Visit Jamaica" href="/top-10/why-visit-jamaica">Why Visit Jamaica</a></li>
        <li><a title="All Right Activities" href="/top-10/all-right-activities">All Right Activities</a></li>
        <li><a title="All Right Experiences" href="/top-10/all-right-experiences">All Right Experiences</a></li>
        <li><a title="All Right Events" href="/top-10/all-right-events">All Right Events</a></li>
    </ul>
    <ul>
        <li class="title">LOCATIONS</li>
        <li><a title="Kingston" href="/explore-the-island/kingston">Kingston</a></li>
        <li><a title="Montego Bay" href="/explore-the-island/montego-bay">Montego Bay</a></li>
        <li><a title="Negril" href="/explore-the-island/negril">Negril</a></li>
        <li><a title="Ocho Rios" href="/explore-the-island/ocho-rios">Ocho Rios</a></li>
        <li><a title="Port Antonio" href="/explore-the-island/port-antonio">Port Antonio</a></li>
        <li><a title="South Coast" href="/explore-the-island/south-coast">South Coast</a></li>
    </ul>
    <ul>
        <li class="title">TRAVEL GUIDE</li>
        <li><a title="Explore the Island" href="/explore-the-island">Explore the Island</a></li>
        <li><a title="Currency" href="your-travel-guide/currency-banks-money">Currency</a></li>
        <li><a title="Getting There" href="/your-travel-guide/getting-there">Getting There</a></li>
        <li><a title="Travel Tips" href="/your-travel-guide/travel-tips">Travel Tips</a></li>
    </ul>
</div>

<div id="footer-legal">
    <div class="logo">
        Jamaica
    </div>
    <ul>
        <li><a title="Contact Us" href="/contact-us">Contact Us</a></li>
        <li><a title="Terms of Use" href="/terms-of-use">Terms of Use</a></li>
        <li><a title="Privacy Policy" href="/privacy-policy">Privacy Policy</a></li>
        <li><a title="Press Room" target="_blank" href="http://www.jtbonline.org/pages/default.aspx">Press Room</a></li>
        <li><a title="JTB Information Portal" target="_blank" href="http://www.jtbonline.org/">JTB Information Portal</a></li>
    </ul>
    <div class="thumb-content-underlay"></div>
</div>
</article></div>
    </div>

</div>

<div id="fb-root"></div>


<input type="hidden" id="globalRequestToken" value="I9S-BIbfXJU6-Az3yVcM1Dl3W5eak25ZqTrua-7Ews1ce4cbFFdI_zVhRb8Orb4OO_Tf7wEDoQQBR9D21Tn4hb_5XWKAtQcsgxLOsk27FHwSbwt75YMVjrB5Sv5u0WLe7-Ehl2efIWj9RVkFBpQ83eN88d-1aI4TmDk2_rK4wrI1"  />
    <script>
        window.jamaica = window.jamaica || {};
        window.jamaica.fbappid = "593706467352732";
        window.jamaica.appPath = "/";
        window.jamaica.themePath = '/Themes/VisitJamaicaMobi';
    </script>
    <script src="/Media/Default/_PiedoneModules/Combinator/Scripts/-994934508-1.js?timestamp=131098014660000000" type="text/javascript"></script>
<script src="/Media/Default/_PiedoneModules/Combinator/Scripts/-994934508-2.js?timestamp=131098014660000000" type="text/javascript"></script>
<script src="/Media/Default/_PiedoneModules/Combinator/Scripts/-994934508-3.js?timestamp=131098014780000000" type="text/javascript"></script>
<script src="/Media/Default/_PiedoneModules/Combinator/Scripts/-994934508-4.js?timestamp=131098014790000000" type="text/javascript"></script>
<script src="/Media/Default/_PiedoneModules/Combinator/Scripts/-994934508-5.js?timestamp=131098015260000000" type="text/javascript"></script>


  @yield('scripts')

</body>
</html>
