$(function(){
    id = $('#goods_id').val();
    url = site+'?r=goods/getpriceandnum&id='+id + '&attr='+attr;
    $.ajax({
        type : 'GET',
        url:url,
        dataType: 'json',
        success:function(data){
            $('#shop_price').append(data.price);
            if(data.num > 0)
                num = data.num;
            else
                num = '暂时缺货'
            $('#count').append(num);
    }
    });
})