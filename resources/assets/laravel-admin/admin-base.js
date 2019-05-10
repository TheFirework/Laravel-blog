// $.pjax.defaults.timeout = 5000;
// $.pjax.defaults.maxCacheLength = 0;
// $(document).pjax('a:not(a[target="_blank"])', {
//     container: '#pjax-container'
// });
//
// NProgress.configure({parent: '#pjax-container'});
//
// $(document).on('pjax:timeout', function (event) {
//     event.preventDefault();
// });
//
// $(document).on('submit', 'form[pjax-container]', function (event) {
//     $.pjax.submit(event, '#pjax-container')
// });
//
// $(document).on("pjax:popstate", function () {
// });
//
// $(document).on('pjax:send', function (xhr) {
//     NProgress.start();
// });
//
// $(document).on('pjax:end', function () {
//
//     NProgress.done();
// });
// $(document).on('pjax:complete', function (xhr) {
//     NProgress.done();
// });