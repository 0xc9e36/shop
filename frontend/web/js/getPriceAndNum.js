$(function(){
    //取价格
    getPrice();
    //取库存
    getNum();
    $('.attr').val(attr);
    id = $('#goods_id').val();
    //加入购物车
    $('.add_btn').click(function(){
        //获取商品数量
        var num = $('.amount').val();
        if(/^[1-9]\d*$/.test(num)){
            //var attr = $('.attr').val();
            $.ajax({
                type : 'GET',
                url:site + '?r=cart/addcart&goodsid=' + id + '&attr=' + attr + '&goodsnum=' + num,
                success:function(){
                    location.href = site + '?r=cart/mycart';
                }
            });
        }else{
            alert('商品数量必须是整数');
            $('.amount').val(1);
        }
    });
})

function getPrice(){
    id = $('#goods_id').val();
    attr = [];
    $('.goodsatt').each(function(){
        checked = $(this).attr('checked');
        if(checked) attr.push($(this).val());
    });
    attr = attr.join(',');
    url = site+'?r=goods/getprice&id='+ id + '&attr='+attr;
    $.ajax({
        type : 'GET',
        url:url,
        success:function(price){
            $('#shop_price').html(price);
        }
    });
}

/*取库存*/
function getNum(){
    id = $('#goods_id').val();
    attr = [];
    $('.goodsatt').each(function(){
        checked = $(this).attr('checked');
        if(checked) attr.push($(this).val());
    });
    attr = attr.join(',');
    url = site+'?r=goods/getnum&id=' + id + '&attr='+attr;
    $.ajax({
        type : 'GET',
        url:url,
        dataType: 'json',
        success:function(count){
            if(count <= 0)
                count = '缺货';
            $('#num').html(count);
        }
    });
}
