var l=class{constructor(e){let t=this;Object.assign(t,Object.assign({l:window.location,main:document.querySelector("main"),a:"active",headers:{"X-Requested-With":"XMLHttpRequest","X-Ajax-Request":"route"},cache:{},positions:{},referrer:null,noXhrClass:"no-xhr",noCacheClass:"no-cache"},e)),t.init()}init(){let e=this;window.addEventListener("popstate",function(t){e.onPopState.call(e,t)},!1),document.addEventListener("click",t=>{let s=t.target;for(;s;){if(s.matches("a")){e.onClick.call(e,t,s);break}s=s.parentElement}},!1),e.scrollToHash()}onClick(e,t){let s=this,n=t.href?new URL(t.href):!1;if(!(e.defaultPrevented||e.ctrlKey||e.metaKey||e.shiftKey||!n||t.hasAttribute("download")||t.classList.contains(s.noXhrClass)||t.target&&t.target!=="_self"||n.host!==s.l.host)){if(e.preventDefault(),n.pathname!==s.l.pathname||n.search!==s.l.search){history.pushState(null,t.title||document.title,s.sanitizeUrl(t.href)),s.load(t.classList.contains(s.noCacheClass));return}if(n.hash){let r=document.getElementById(n.hash.substring(1));if(r){s.scrollTo(r,s.scrollToHashOffset());return}}s.onUnhandledClick(e,t)}}onUnhandledClick(e,t){}onPopState(e){let t=this;t.isPopState=!0,t.load(),e.preventDefault()}beforeLoad(){return!0}load(e){let t=this;if(t.positions[t.referrer]={x:window.scrollX,y:window.scrollY},t.getRequest(),t.beforeLoad())if(e||!t.cache[t.href]){let s=new XMLHttpRequest;s.open("GET",t.href,!0),Object.keys(t.headers).forEach(n=>{s.setRequestHeader(n,t.headers[n])}),s.onload=function(){if(this.status>=300&&this.status<400){let n=s.getResponseHeader("X-Redirect");n&&(n.indexOf(t.l.host)===-1?t.l.replace(n):(history.replaceState(null,document.title,t.sanitizeUrl(n)),t.load(!1)))}else t.cache[t.href]=this.response,t.afterLoad()},s.send()}else t.afterLoad()}afterLoad(){this.render()}beforeRender(){return!0}render(){let e=this;e.beforeRender()&&(e.renderContent(e.cache[e.href]),e.afterRender()),e.referrer=e.href,e.isPopState=!1}renderContent(e){let t=this;e&&e.trim().startsWith("<!DOC")?location.reload():(t.setInnerHTML(t.main,e),t.resetScrollPosition(),t.scrollToHash())}afterRender(){}resetScrollPosition(){let e=this,t=e.isPopState&&e.positions[e.href];window.scrollTo(t?e.positions[e.href].x:0,t?e.positions[e.href].y:0)}getRequest(){let e=this;e.href=e.sanitizeUrl(e.l.href),e.params=e.l.pathname.replace(/^\//,"").split(/[/?#]/)}sanitizeUrl(e){return e.replace(/\/$/,"")}setInnerHTML(e,t){e.innerHTML=t,Array.from(e.querySelectorAll("script")).forEach(s=>{let n=document.createElement("script");Array.from(s.attributes).forEach(r=>n.setAttribute(r.name,r.value)),n.appendChild(document.createTextNode(s.innerHTML)),s.parentNode.replaceChild(n,s)})}scrollTo(e,t){var s;scroll({top:(typeof e=="number"?e:(s=e.offsetTop)!==null&&s!==void 0?s:0)+(t||0),behavior:"smooth"})}scrollToHash(){let e=this,t=location.hash?document.getElementById(location.hash.substring(1)):null;t&&e.scrollTo(t,e.scrollToHashOffset())}scrollToHashOffset(){return 0}};var f={ANALYTICS:"analytics",MARKETING:"marketing",SOCIAL:"social"},c=class{constructor(e){this.setCookie=function(s,n){let r=this,m="Thu, 01 Jan 1970 00:00:01 GMT";if(!n){let E=new Date;E.setFullYear(E.getFullYear()+1),m=E.toUTCString()}document.cookie=`${r.cookieName}=${s}; expires=${m}`+(r.cookieDomain?`; domain=${r.cookieDomain}`:"")+"; path=/; sameSite=Lax"};let t=this;Object.assign(t,Object.assign({buttons:document.querySelectorAll(".cc-button"),categories:[f.ANALYTICS,f.MARKETING,f.SOCIAL],container:document.getElementById("cc"),cookieName:"_cc",defaultValue:"none",modules:[]},e)),t.init()}init(){let e=this,t=e.getCookie();t?e.loadModules(t):e.initContainer(),e.initButtons()}initButtons(){let e=this;e.buttons&&e.buttons.forEach(t=>{t.addEventListener("click",s=>{e.setCategories(t.dataset.consent||e.defaultValue),s.preventDefault()})})}initContainer(){let e=this;e.container&&e.container.classList.add("active")}loadModules(e){let t=this;typeof e=="string"&&(e=e.split(",")),t.modules.forEach(s=>{s.categories.every(n=>e.includes(n))&&s.load()})}setCategories(e){let t=this;t.setCookie(e),t.loadModules(e),t.container&&t.container.classList.remove("active")}hasCategory(e){let t=this.getCookie();return t&&t.split(",").includes(e)}getCookie(){let e=document.cookie?document.cookie.split("; "):[];for(let t=0;t<e.length;t++){let s=e[t].split("=");if(s[0]===this.cookieName)return s[1]}return!1}};function b(o,e){let t=document.createElement("script"),s=document.getElementsByTagName("script")[0];t.async=!0,t.onload=t.onreadystatechange=()=>{(!t.readyState||/loaded|complete/.test(t.readyState))&&(t.onload=t.onreadystatechange=null,t=void 0,e&&setTimeout(e,0))},t.src=o,s.parentNode.insertBefore(t,s)}var d=class{constructor(e){let t=this;Object.assign(t,{categories:[f.ANALYTICS],id:null,gtag:null,_isActive:!1}),e&&(t.id=Array.isArray(t.id)?e:[e])}enable(){this._isActive=!0}disable(){this._isActive=!1}isActive(){let e=this;return e.isActive&&e.gtag&&e.id}load(){let e=this;e.id&&navigator.userAgent.indexOf("Speed Insights")===-1&&b(`https://www.googletagmanager.com/gtag/js?id=${e.id[0]}`,()=>{window.dataLayer=window.dataLayer||[],e.gtag=function(){window.dataLayer.push(arguments)},e.gtag("js",new Date),e.id.forEach(t=>e.gtag("config",t)),e.enable()})}sendPageView(e){let t=this;t.isActive()&&t.id.forEach(s=>{let n=window.location;t.gtag("event","page_view",Object.assign({page_title:document.title,page_location:n.href,page_path:n.pathname,send_to:s},e))})}};var a=new l,O=new d("UA-103555137-1"),q=new c({modules:[O]}),u=document,i=u.querySelector("body"),_=u.querySelector("header"),R=i.querySelectorAll("nav a"),j=u.getElementById("reset"),S="is-collapsed",k="is-scrolled",C="has-menu",N="hidden",h=(o,e)=>o.classList.add(e||a.a),L=(o,e)=>o&&o.classList.remove(e||a.a),I=()=>L(i,C),H=()=>w=_.offsetHeight,T=(o,e)=>{u.querySelectorAll(o).forEach(t=>{t.addEventListener("click",e)})},x=new IntersectionObserver(function(o){for(let e=0;e<o.length;e++)if(o[e].isIntersecting){let t=o[e].target,s=t.dataset.animation,n=t.dataset.animationDelay,r=t.dataset.src;s&&(h(t,s),n&&(t.style.animationDelay=n)),r&&(t.src=r),x.unobserve(t)}},{threshold:[0]}),M=()=>{v===void 0?(v=[],fetch("https://instafeed.anakin.cloud/adelheid").then(o=>o.json()).then(o=>{console.log(o),o.data&&(v=o.data,M())})):v.forEach((o,e)=>{let t=a.main.querySelector(`.instagram-${e}`),s=o.media_type==="VIDEO"?`<video class="observe" data-src="${o.media_url}" autoplay loop muted playsinline></video>`:`<img loading="lazy" src="${o.media_url}" alt>`;t&&(t.innerHTML=`<a class="canvas" href="${o.permalink}" target="_blank">${s}</a>`)})},P=()=>window.innerWidth<1200,$=()=>{let o=window.scrollY;P()||(!g&&o>y&&o>w?(h(i,S),g=!0):g&&o<y&&(L(i,S),g=!1),y=o,!p&&o>w*2?(h(i,k),p=!0):p&&o<w&&(L(i,k),p=!1),y=o)},p=!1,w=0,g=!1,y=0,A=0,v;u.querySelector(".menu-toggle").onclick=()=>{let o=window.innerWidth<1024;i.classList.contains(C)?(I(),o&&window.scrollTo(0,A)):(o&&(A=window.scrollY,window.scrollTo(0,0)),h(i,C))};T(".scroll-top",()=>{a.scrollTo(0)});q.getCookie()&&L(j.parentElement,N);a.onUnhandledClick=()=>{a.scrollTo(0),I()};a.afterRender=()=>{R.forEach(t=>t.classList.toggle(a.a,t.href===location.href)),T(".scroll-down",()=>{a.scrollTo(window.scrollY+window.innerHeight/2)}),a.main.querySelectorAll(".crossfade").forEach(t=>{let s=t.querySelectorAll("img"),n=s[0],r=1,m=setInterval(()=>{if(!i.contains(n)){clearInterval(m);return}n.classList.remove("active"),n=n.nextElementSibling||s[0],h(n),n.style.zIndex=""+r++},parseInt(t.dataset.timeout))}),a.main.querySelector(".grid-instagram")&&M();let o,e=()=>{o&&(o.classList.remove(a.a),o=null)};a.main.querySelectorAll(".team-open").forEach(t=>{t.addEventListener("click",()=>{e(),o=t.closest(".item"),o.classList.add(a.a)})}),T(".team-close",e),setTimeout(()=>u.querySelectorAll(".observe").forEach(t=>x.observe(t)),1),$()};H();a.afterRender();window.addEventListener("scroll",$,{passive:!0});window.addEventListener("resize",H,{passive:!0});
//# sourceMappingURL=site.js.map