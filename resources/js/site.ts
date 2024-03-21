import Router, {Consent, Gtag} from "skeleton-router";

interface InstagramFeedItem {
    id: string;
    caption: string;
    media_url: string;
    permalink: string;
    media_type: string;
}

const doc = document;
const $body = doc.querySelector('body');
const $header = $body.querySelector('header');
const $navLinks = $body.querySelectorAll('nav a') as NodeListOf<HTMLAnchorElement>;
const $cookieReset = doc.getElementById('reset');

const router = new Router();
const gtag = new Gtag('UA-103555137-1');
const consent = new Consent({
    modules: [
        gtag,
        {
            load: () => $cookieReset.parentElement.style.display = 'block',
        }
    ]
});

const isCollapsedClass = 'is-collapsed';
const isScrolledClass = 'is-scrolled';
const hasMenuClass = 'has-menu';
const hiddenClass = 'hidden';

const addClass = ($el: HTMLElement, className?: string) => $el.classList.add(className || router.a);
const removeClass = ($el: HTMLElement, className?: string) => $el && $el.classList.remove(className || router.a);

const setHeaderHeight = () => headerHeight = $header.offsetHeight
const resetMenu = () => removeClass($body, hasMenuClass);

const clickHandler = (querySelector: string, callback: EventListenerOrEventListenerObject) => {
    doc.querySelectorAll(querySelector).forEach((el) => {
        el.addEventListener('click', callback);
    })
}

const initToggleOnClick = () => {
    clickHandler('.toggle', (e) => {
        const $btn = e.target as HTMLButtonElement;

        document.querySelectorAll($btn.dataset.target).forEach(($target: HTMLElement) => {
            $target.classList.toggle(router.a);
        });
    });
}

const observer = new IntersectionObserver(function (e) {
    for (let i = 0; i < e.length; i++) {
        if (e[i].isIntersecting) {
            const $el = e[i].target as HTMLVideoElement;

            const animation = $el.dataset.animation;
            const delay = $el.dataset.animationDelay;
            const src = $el.dataset.src;

            if (animation) {
                addClass($el, animation);

                if (delay) {
                    $el.style.animationDelay = delay;
                }
            }

            if (src) {
                $el.src = src;
            }

            observer.unobserve($el);
        }
    }
}, {threshold: [0]});

const renderInstagram = () => {
    if (instagramItems === undefined) {
        instagramItems = [];

        fetch('https://instafeed.anakin.cloud/adelheid').then(response => response.json()).then(data => {
            console.log(data);
            if (data.data) {
                instagramItems = data.data;
                renderInstagram();
            }
        });
    } else {
        instagramItems.forEach((item, i) => {
            const container = router.main.querySelector(`.instagram-${i}`);

            const content = item.media_type === 'VIDEO' ?
                `<video class="observe" data-src="${item.media_url}" autoplay loop muted playsinline></video>` :
                `<img loading="lazy" src="${item.media_url}" alt>`;

            if (container) {
                container.innerHTML = `<a class="canvas" href="${item.permalink}" target="_blank">${content}</a>`;
            }
        });
    }
}

const isMobile = () => window.innerWidth < 1200;

const onScroll = () => {
    const scrollY = window.scrollY;

    if (!isMobile()) {
        if (!isHeaderCollapsed && scrollY > lastYScroll && scrollY > headerHeight) {
            addClass($body, isCollapsedClass);
            isHeaderCollapsed = true;

        } else if (isHeaderCollapsed && scrollY < lastYScroll) {
            removeClass($body, isCollapsedClass);
            isHeaderCollapsed = false;
        }

        if (!isScrolled && scrollY > (headerHeight * 2)) {
            addClass($body, isScrolledClass);
            isScrolled = true;

        } else if (isScrolled && !scrollY) {
            removeClass($body, isScrolledClass);
            isScrolled = false;
        }

        lastYScroll = scrollY;
    }
}

let isScrolled = false;
let isHeaderCollapsed = false;
let headerHeight = 0;
let lastYScroll = 0;
let yPos = 0;
let instagramItems: Array<InstagramFeedItem> | undefined;

(doc.querySelector('.menu-toggle') as HTMLButtonElement).onclick = () => {
    if ($body.classList.contains(hasMenuClass)) {
        resetMenu();

        if (isMobile()) {
            window.scrollTo(0, yPos)
        }
    } else {
        if (isMobile()) {
            yPos = window.scrollY;
            window.scrollTo(0, 0);
        }

        addClass($body, hasMenuClass);
    }
};

clickHandler('.scroll-top', () => {
    router.scrollTo(0);
});

$cookieReset.onclick = () => {
    consent.setCookie(null, true);
    location.reload();
};

if (consent.getCookie()) {
    removeClass($cookieReset.parentElement, hiddenClass);
}

router.onUnhandledClick = () => {
    router.scrollTo(0);
    resetMenu();
}

router.afterRender = () => {
    resetMenu();

    // Menu.
    const url = new URL(location.href);
    const href = url.origin + url.pathname;

    $navLinks.forEach($link => $link.classList.toggle(router.a, $link.href === href));

    // Home.
    clickHandler('.scroll-down', () => {
        router.scrollTo(window.scrollY + window.innerHeight / 2);
    });

    // Crossfade.
    router.main.querySelectorAll('.crossfade').forEach(($el: HTMLElement) => {
        const $images = $el.querySelectorAll('img');
        let $active = $images[0];
        let index = 1;

        const interval = setInterval(() => {
            if (!$body.contains($active)) {
                clearInterval(interval);
                return;
            }

            $active.classList.remove('active');
            $active = ($active.nextElementSibling || $images[0]) as HTMLImageElement;

            addClass($active);
            $active.style.zIndex = "" + (index++);

        }, parseInt($el.dataset.timeout));
    });

    // Instagram.
    if (router.main.querySelector('.grid-instagram')) {
        renderInstagram();
    }

    // Team.
    let activeTeam: HTMLElement;

    const removeActiveTeam = () => {
        if (activeTeam) {
            activeTeam.classList.remove(router.a);
            activeTeam = null;
        }
    }

    router.main.querySelectorAll('.team-open').forEach(el => {
        el.addEventListener('click', () => {
            removeActiveTeam();

            activeTeam = el.closest('.item');
            activeTeam.classList.add(router.a)
        });
    });

    clickHandler('.team-close', removeActiveTeam);

    // Observer
    setTimeout(() => doc.querySelectorAll('.observe').forEach($el => observer.observe($el)), 1);

    // gtag.sendPageView();

    onScroll();
}

setHeaderHeight();
initToggleOnClick();

router.afterRender();

window.addEventListener('scroll', onScroll, {passive: true});
window.addEventListener('scroll', setHeaderHeight, {passive: true});