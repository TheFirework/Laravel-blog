
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('jscroll');

window.Vue = require('vue');

$('#app').css('display','none');

//监听加载状态改变
document.onreadystatechange = completeLoading;

const delay = timeout => new Promise((resolve, reject)=> {
    setTimeout(resolve,timeout)
});
async function main(){
    const root = document.querySelector("#app");
    await delay(1000);

    root.setAttribute("style","display:block")
}

//加载状态为complete时移除loading效果
function completeLoading() {
    if (document.readyState == "complete") {
        $('.loader').css('display','none');
        main();
    }
}

$(function ($) {
    var currentPage = 0;
    var pathname = window.location.pathname;
    var $document = $(document);
    var $result = $('.article-list');
    var buffer = 127;

    var ticking = false;
    var isLoading = false;

    //文档当前垂直滚动的像素数
    var lastScrollY = window.scrollY;
    //窗口的高
    var lastWindowHeight = window.innerHeight;
    //整个文档的高度
    var lastDocumentHeight = $document.height();

    function onScroll() {
        lastScrollY = window.scrollY;
        requestTick();
    }

    function onResize() {
        lastWindowHeight = window.innerHeight;
        lastDocumentHeight = $document.height();
        requestTick();
    }

    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(infiniteScroll);
        }
        ticking = true;
    }

    function sanitizePathname(path) {
        var paginationRegex = /(?:page\/)(\d)(?:\/)$/i;

        // remove hash params from path
        path = path.replace(/#(.*)$/g, '').replace('////g', '/');

        // remove pagination from the path and replace the current pages
        // with the actual requested page. E. g. `/page/3/` indicates that
        // the user actually requested page 3, so we should request page 4
        // next, unless it's the last page already.
        if (path.match(paginationRegex)) {
            currentPage = parseInt(path.match(paginationRegex)[1]);

            path = path.replace(paginationRegex, '');
        }

        return path;
    }

    function infiniteScroll() {
        // sanitize the pathname from possible pagination or hash params
        pathname = sanitizePathname(pathname);

        // return if already loading
        if (isLoading) {
            return;
        }

        // return if not scroll to the bottom
        if (lastScrollY + lastWindowHeight <= lastDocumentHeight - buffer) {
            ticking = false;
            return;
        }

        /**
         * maxPages is defined in default.hbs and is the value
         * of the amount of pagination pages.
         * If we reached the last page or are past it,
         * we return and disable the listeners.
         */
        if (currentPage >= maxPages) {
            window.removeEventListener('scroll', onScroll, {
                passive: true
            });
            window.removeEventListener('resize', onResize);
            return;
        }

        isLoading = true;

        // next page
        currentPage += 1;

        // Load more
        var nextPage = pathname + '?page=' + currentPage;

        $.get(nextPage, function (content) {
            var parse = document.createRange().createContextualFragment(content);
            var posts = parse.querySelectorAll('.article-item');
            if (posts.length) {
                [].forEach.call(posts, function (post) {
                    $result[0].appendChild(post);
                });
            }
        }).fail(function (xhr) {
            // 404 indicates we've run out of pages
            if (xhr.status === 404) {
                window.removeEventListener('scroll', onScroll, {
                    passive: true
                });
                window.removeEventListener('resize', onResize);
            }
        }).always(function () {
            lastDocumentHeight = $document.height();
            isLoading = false;
            ticking = false;
        });
    }

    window.addEventListener('scroll', onScroll, {
        passive: true
    });
    window.addEventListener('resize', onResize);

    infiniteScroll();

    $(window).trigger("resize");
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });
