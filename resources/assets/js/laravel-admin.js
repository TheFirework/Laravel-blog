require('./bootstrap');

require('sweetalert');

// 全局数据表格 筛选控制隐藏显示状态
$('.btn-dropbox').on('click',function () {
    if ($('#filter-box').hasClass('hide')) {
        $('#filter-box').removeClass('hide');
    } else {
        $('#filter-box').addClass('hide');
    }
});


$(function () {
    $('.sidebar-menu li:not(.treeview) > a').on('click', function () {
        console.log(this);
        var $parent = $(this).parent().addClass('active');
        $parent.siblings('.treeview.active').find('> a').trigger('click');
        $parent.siblings().removeClass('active').find('li').removeClass('active');
    });
    var menu = $('.sidebar-menu li > a[href="' + (location.pathname + location.search + location.hash) + '"]').parent().addClass('active');
    menu.parents('ul.treeview-menu').addClass('menu-open');
    menu.parents('li.treeview').addClass('active');

    $('[data-toggle="popover"]').popover();
});