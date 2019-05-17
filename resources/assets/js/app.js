/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('jscroll');

window.Vue = require('vue');

$(function ($) {
    var currentPage = 0;
    var pathname = window.location.pathname;
    var $document = $(document);
    var $result = $('.article-list');
    var buffer = 300;

    var ticking = false;
    var isLoading = false;

    //文档在垂直方向已滚动的像素值
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
        var paginationRegex = /(?:page=)(\d)(?:\/)$/i;

        // 从路径中删除哈希参数
        path = path.replace(/#(.*)$/g, '').replace('////g', '/');

        if (path.match(paginationRegex)) {
            currentPage = parseInt(path.match(paginationRegex)[1]);
            path = path.replace(paginationRegex, '');
        }
        return path;
    }

    function infiniteScroll() {
        // sanitize the pathname from possible pagination or hash params
        pathname = sanitizePathname(pathname);

        // 如果已经加载就返回
        if (isLoading) {
            return;
        }

        // 如果没有滚动到底部就返回
        if (lastScrollY + lastWindowHeight <= lastDocumentHeight - buffer) {
            ticking = false;
            return;
        }

        /**
         * 如果超过了最大页数，就接触绑定事件 scroll 和 resize
         */
        if (currentPage >= maxPages) {
            window.removeEventListener('scroll', onScroll, {
                passive: true
            });
            window.removeEventListener('resize', onResize);
            return;
        }

        isLoading = true;

        // 下一页
        currentPage += 1;

        // 加载更多地址拼接
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
    $(window).trigger('resize')
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
