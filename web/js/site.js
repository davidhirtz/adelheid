var d=class{constructor(e){let t=this;Object.assign(t,Object.assign({l:window.location,main:document.querySelector("main"),a:"active",headers:{"X-Requested-With":"XMLHttpRequest","X-Ajax-Request":"route"},cache:{},positions:{},referrer:null,noXhrClass:"no-xhr",noCacheClass:"no-cache"},e)),t.init()}init(){let e=this;window.addEventListener("popstate",function(t){e.onPopState.call(e,t)},!1),document.addEventListener("click",t=>{let s=t.target;for(;s;){if(s.matches("a")){e.onClick.call(e,t,s);break}s=s.parentElement}},!1),e.scrollToHash()}onClick(e,t){let s=this,n=t.href?new URL(t.href):!1;if(!(e.defaultPrevented||e.ctrlKey||e.metaKey||e.shiftKey||!n||t.hasAttribute("download")||t.classList.contains(s.noXhrClass)||t.target&&t.target!=="_self"||n.host!==s.l.host)){if(e.preventDefault(),n.pathname!==s.l.pathname||n.search!==s.l.search){history.pushState(null,t.title||document.title,s.sanitizeUrl(t.href)),s.load(t.classList.contains(s.noCacheClass));return}if(n.hash){let a=document.getElementById(n.hash.substring(1));if(a){s.scrollTo(a,s.scrollToHashOffset());return}}s.onUnhandledClick(e,t)}}onUnhandledClick(e,t){}onPopState(e){let t=this;t.isPopState=!0,t.load(),e.preventDefault()}beforeLoad(){return!0}load(e){let t=this;if(t.positions[t.referrer]={x:window.scrollX,y:window.scrollY},t.getRequest(),t.beforeLoad())if(e||!t.cache[t.href]){let s=new XMLHttpRequest;s.open("GET",t.href,!0),Object.keys(t.headers).forEach(n=>{s.setRequestHeader(n,t.headers[n])}),s.onload=function(){if(this.status>=300&&this.status<400){let n=s.getResponseHeader("X-Redirect");n&&(n.indexOf(t.l.host)===-1?t.l.replace(n):(history.replaceState(null,document.title,t.sanitizeUrl(n)),t.load(!1)))}else t.cache[t.href]=this.response,t.afterLoad()},s.send()}else t.afterLoad()}afterLoad(){this.render()}beforeRender(){return!0}render(){let e=this;e.beforeRender()&&(e.renderContent(e.cache[e.href]),e.afterRender()),e.referrer=e.href,e.isPopState=!1}renderContent(e){let t=this;e&&e.trim().startsWith("<!DOC")?location.reload():(t.setInnerHTML(t.main,e),t.resetScrollPosition(),t.scrollToHash())}afterRender(){}resetScrollPosition(){let e=this,t=e.isPopState&&e.positions[e.href];window.scrollTo(t?e.positions[e.href].x:0,t?e.positions[e.href].y:0)}getRequest(){let e=this;e.href=e.sanitizeUrl(e.l.href),e.params=e.l.pathname.replace(/^\//,"").split(/[/?#]/)}sanitizeUrl(e){return e.replace(/\/$/,"")}setInnerHTML(e,t){e.innerHTML=t,Array.from(e.querySelectorAll("script")).forEach(s=>{let n=document.createElement("script");Array.from(s.attributes).forEach(a=>n.setAttribute(a.name,a.value)),n.appendChild(document.createTextNode(s.innerHTML)),s.parentNode.replaceChild(n,s)})}scrollTo(e,t){var s;scroll({top:(typeof e=="number"?e:(s=e.offsetTop)!==null&&s!==void 0?s:0)+(t||0),behavior:"smooth"})}scrollToHash(){let e=this,t=location.hash?document.getElementById(location.hash.substring(1)):null;t&&e.scrollTo(t,e.scrollToHashOffset())}scrollToHashOffset(){return 0}};var m={ANALYTICS:"analytics",EXTERNAL:"external",MARKETING:"marketing"},u=class{constructor(e){this.setCookie=function(s,n){let a=this,c=a.expires;if(n)c="Thu, 01 Jan 1970 00:00:01 GMT";else if(!c){let r=new Date;r.setFullYear(r.getFullYear()+1),c=r.toUTCString()}document.cookie=`${a.cookieName}=${s}; expires=${c}`+(a.cookieDomain?`; domain=${a.cookieDomain}`:"")+"; path=/; sameSite=Lax"};let t=this;Object.assign(t,Object.assign({categories:[m.ANALYTICS,m.MARKETING,m.EXTERNAL],container:document.getElementById("cc"),cookieName:"_cc",modules:[]},e)),t.init()}init(){let e=this,t=e.getCookie();t?e.loadModules(t):e.initContainer(),e.initButtons()}initButtons(){let e=this;e.getButtons().forEach(t=>{t.addEventListener("click",s=>{if(t.hasAttribute("data-consent"))e.setCategories(t.dataset.consent);else{let n=[];e.getCheckboxes().forEach(a=>{a.checked&&!a.disabled&&(a.dataset.consent||"").split(",").forEach(r=>{n.includes(r)||n.push(r)})}),e.setCategories(n?n.join(","):null)}s.preventDefault()})})}initContainer(){let e=this;e.container&&e.container.classList.add("active")}loadModules(e){let t=this;typeof e=="string"&&(e=e.split(",")),t.modules.forEach(s=>{(!s.categories||s.categories.every(n=>e.includes(n)))&&s.load()})}setCategories(e){let t=this;t.setCookie(e),t.loadModules(e),t.container&&t.container.classList.remove("active")}hasCategory(e){let t=this.getCookie();return t&&t.split(",").includes(e)}getCookie(){let e=document.cookie?document.cookie.split("; "):[];for(let t=0;t<e.length;t++){let s=e[t].split("=");if(s[0]===this.cookieName)return s[1]}return!1}getButtons(){return document.querySelectorAll(".cc-confirm")}getCheckboxes(){return document.querySelectorAll(".cc-checkbox")}};function S(o,e){let t=document.createElement("script"),s=document.getElementsByTagName("script")[0];t.async=!0,t.onload=t.onreadystatechange=()=>{(!t.readyState||/loaded|complete/.test(t.readyState))&&(t.onload=t.onreadystatechange=null,t=void 0,e&&setTimeout(e,0))},t.src=o,s.parentNode.insertBefore(t,s)}var f=class{constructor(e){let t=this;Object.assign(t,{categories:[m.ANALYTICS],id:null,gtag:null,_isActive:!1}),e&&(t.id=Array.isArray(t.id)?e:[e])}enable(){this._isActive=!0}disable(){this._isActive=!1}isActive(){let e=this;return e.isActive&&e.gtag&&e.id}load(){let e=this;e.id&&navigator.userAgent.indexOf("Speed Insights")===-1&&S(`https://www.googletagmanager.com/gtag/js?id=${e.id[0]}`,()=>{window.dataLayer=window.dataLayer||[],e.gtag=function(){window.dataLayer.push(arguments)},e.gtag("js",new Date),e.id.forEach(t=>e.gtag("config",t)),e.enable()})}sendPageView(e){let t=this;t.isActive()&&t.id.forEach(s=>{let n=window.location;t.gtag("event","page_view",Object.assign({page_title:document.title,page_location:n.href,page_path:n.pathname,send_to:s},e))})}};var h=document,l=h.querySelector("body"),P=l.querySelector("header"),z=l.querySelectorAll("nav a"),T=h.getElementById("reset"),O="observe",I="is-collapsed",H="is-scrolled",b="has-menu",D="hidden",q="external",i=new d,U=new f("UA-103555137-1"),k=new u({modules:[U,{load:()=>T.parentElement.style.display="block"},{categories:[q],load:()=>setTimeout(x,500)}]}),L=(o,e)=>o.classList.add(e||i.a),g=(o,e)=>o&&o.classList.remove(e||i.a),R=o=>i.main.querySelectorAll(o),_=()=>g(l,b),N=(o,e)=>{h.querySelectorAll(o).forEach(t=>{t.addEventListener("click",e)})},X=()=>{N(".toggle",o=>{let e=o.target;document.querySelectorAll(e.dataset.target).forEach(t=>{t.classList.toggle(i.a)})})},j=new IntersectionObserver(function(o){for(let e=0;e<o.length;e++)if(o[e].isIntersecting){let t=o[e].target,s=t.dataset.animation,n=t.dataset.animationDelay,a=t.dataset.src;s&&(L(t,s),n&&(t.style.animationDelay=n)),a&&(t.src=a),j.unobserve(t),g(t,O)}},{threshold:[0]}),x=()=>{R(".feed")&&k.hasCategory(q)&&(v===void 0?(v=[],fetch("https://instafeed.anakin.cloud/adelheid").then(o=>o.json()).then(o=>{o.data&&(v=o.data,x())})):(v.forEach((o,e)=>{let t=i.main.querySelector(`.feed-${e}`),s=o.media_type==="VIDEO"?`<video class="observe" data-src="${o.media_url}" autoplay loop muted playsinline></video>`:`<img loading="lazy" src="${o.media_url}" alt>`;t&&(t.innerHTML=`<a class="block" href="${o.permalink}" target="_blank">${s}</a>`)}),B()))},w=()=>window.innerWidth<1200,$=()=>{if(!w()){let o=window.scrollY,e=P.offsetHeight;!y&&o>E&&o>e?(L(l,I),y=!0):y&&o<E&&(g(l,I),y=!1),!p&&o>e*2?(L(l,H),p=!0):p&&!o&&(g(l,H),p=!1),E=o}},B=()=>setTimeout(()=>h.querySelectorAll(`.${O}`).forEach(o=>j.observe(o)),1),p=!1,y=!1,E=0,M=0,v;h.querySelector(".menu-toggle").onclick=()=>{l.classList.contains(b)?(_(),w()&&window.scrollTo(0,M)):(w()&&(M=window.scrollY,window.scrollTo(0,0)),L(l,b))};i.afterRender=()=>{let o=new URL(location.href),e=o.origin+o.pathname;z.forEach(t=>t.classList.toggle(i.a,t.href===e)),N(".back",t=>{i.referrer&&(history.back(),t.preventDefault())}),R(".crossfade").forEach(t=>{let s=t.querySelectorAll(".crossfade-item"),n=s.length-1,a=()=>{r<n&&s[r+1].classList.add("preloaded")},c=setInterval(()=>{if(!l.contains(t)){clearInterval(c),console.log("Clearing interval...");return}let A=r<n?r+1:0,C=s[A];C.classList.add("active"),C.style.zIndex="2",setTimeout(()=>{C.style.zIndex="",s[r].classList.remove("active"),r=A,a()},1e3)},4e3),r=0;a()}),x(),B(),$()};X();h.getElementById("scroll-top").onclick=()=>i.scrollTo(0);T.onclick=()=>{k.setCookie("none",!0),location.reload()};k.getCookie()&&g(T.parentElement,D);i.onUnhandledClick=()=>{i.scrollTo(0),_()};i.afterRender();window.addEventListener("scroll",$,{passive:!0});
//# sourceMappingURL=site.js.map
