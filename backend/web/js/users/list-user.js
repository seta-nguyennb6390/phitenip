$(document).ready(function(){
	$(document).on('click','table tr.hasort a',function(){
		sort = $(this).attr('title');
		type = $(this).parent().attr('title');
		total = $('tbody tr[data-href]').length;
		$.post(url,{flag:'sort',sort:sort, type:type,start:start,total:total},function(result){
			$('#wrap').html(result);
		});
		return false;
	});
	$(document).on('click','input#submit', function(){
		member = $('#category').val();
		status = $('#status').val();
		if(member == "" && status == ""){
			alert("Please select 会員種別 and ステータス");
		}else{
			$.post(url, {flag:'search',member:member, status:status}, function(result){
				//alert(result);
			});
		}
		return false;
	});
});