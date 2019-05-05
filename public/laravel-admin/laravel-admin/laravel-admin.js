// 全局数据表格 筛选控制隐藏显示状态
$('.btn-dropbox').on('click',function () {
    if ($('#filter-box').hasClass('hide')) {
        $('#filter-box').removeClass('hide');
    } else {
        $('#filter-box').addClass('hide');
    }
});