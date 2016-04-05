<div id='small'><?php $str = "<img src={$dir['small']} />";  echo $str; ?></div>

<div id='s'><?php echo $dir['small']; ?></div>
<div id='medium'><?php echo $dir['median']; ?></div>
<div id='big'><?php echo $dir['big']; ?></div>
<div id='primary'><?php echo $dir['primary']; ?></div>
<script src="/Js/jquery.min.js"></script>
<script>
     var newBox = $( "<span class='imgarea'><span class='s1'></span><a class='deleteImg'  href='#'>[-]</a> <input id='small' type='hidden' name='simg[]' /><input type='hidden' id='big' name='bimg[]'/> <input type='hidden'  id='medium'  name='mimg[]' /> <input type='hidden' id='primary'  name='pimg[]' /></span>");
     img = $('#small').html();
     s = $('#s').html();
     medium = $('#medium').html();
     big = $('#big').html();
     primary = $('#primary').html();
     newBox.find('.s1').html(img);
     newBox.find('#small').val(s);
     newBox.find('#medium').val(medium);
     newBox.find('#big').val(big);
     newBox.find('#primary').val(primary);
     box = parent.$('#picture');
     newBox.insertBefore(box);
     parent. $("#mydialog" ).dialog( "close" );
</script>