/*
@功能：购物车页面js
@作者：diamondwang
@时间：2013年11月14日
*/

$(function(){
	
	//减少
	$(".reduce_num").click(function(){
		var amount = $(this).parent().find(".amount");
        var num = parseInt($(amount).val()) - 1;
		if (num <= 0){
			alert("商品数量最少为1");
		} else{
            //修改价格
			$(amount).val(num);
            var id = $(this).attr('goodsid');
            var attr = $(this).attr('attrstr');
            updateCart(id, attr, num);
		}
		//小计
		var subtotal = parseFloat($(this).parent().parent().find(".col3 span").text()) * parseInt($(amount).val());
		$(this).parent().parent().find(".col5 span").text(subtotal.toFixed(2));
		//总计金额
		var total = 0;
		$(".col5 span").each(function(){
			total += parseFloat($(this).text());
		});

		$("#total").text(total.toFixed(2));
	});

	//增加
	$(".add_num").click(function(){
		var amount = $(this).parent().find(".amount");
        var num = parseInt($(amount).val()) + 1;
        var max = $(this).attr('count');
        if(num > max){
            alert('超过库存');
            $(amount).val(max);
        }else{
            $(amount).val(num);
            //价格修改
            var id = $(this).attr('goodsid');
            var attr = $(this).attr('attrstr');
            updateCart(id, attr, num);
        }
		//小计
		var subtotal = parseFloat($(this).parent().parent().find(".col3 span").text()) * parseInt($(amount).val());
		$(this).parent().parent().find(".col5 span").text(subtotal.toFixed(2));
		//总计金额
		var total = 0;
		$(".col5 span").each(function(){
			total += parseFloat($(this).text());
		});

		$("#total").text(total.toFixed(2));
	});

	//直接输入
	$(".amount").blur(function(){
        var num = parseInt($(this).val())
        var max = $(this).attr('count');
        if(/^[1-9]\d*$/.test(num)) {
            if (num < 1) {
                alert("商品数量最少为1");
                $(this).val(1);
            }else if(num > max){
                alert("商品数量超出库存量");
                $(this).val(max);
            }
            //价格修改
            var id = $(this).attr('goodsid');
            var attr = $(this).attr('attrstr');
            updateCart(id, attr, num);
            //小计
            var subtotal = parseFloat($(this).parent().parent().find(".col3 span").text()) * parseInt($(this).val());
            $(this).parent().parent().find(".col5 span").text(subtotal.toFixed(2));
            //总计金额
            var total = 0;
            $(".col5 span").each(function () {
                total += parseFloat($(this).text());
            });

            $("#total").text(total.toFixed(2));
        }else{
            alert('必须是数字');
            $(this).val(1);
        }
	});

    //删除购物车
    $('.del').click(function () {
        if(confirm('确定要删除 ?')){
            attr = $(this).attr('attrstr');
            sum = parseFloat($('#total').html());
            tr = $(this).parent().parent();
            curprice = parseFloat(tr.find('.cur').html());
            total = parseFloat(sum - curprice).toFixed(2);
            goodsid = $(this).attr('goodsid');
            url = site+'?r=cart/delete&goodsid='+ goodsid + '&attr='+attr;
            $.ajax({
                type : 'GET',
                url:url,
                success:function(){
                    tr.remove();
                    //修改价格
                    $('#total').html(total);
                }
            });
        }
    });
});


/*修改购物车*/
function updateCart(id, attr, num){
    url = site+'?r=cart/update&goodsid='+ id + '&attr='+attr + '&num='+num;
    $.ajax({
        type : 'GET',
        url:url,
        success:function(){
        }
    });
}