$(document).ready(function(){
	$(document).on('click','table tr.hasort a',function(){
		sort = $(this).attr('title');
		type = $(this).parent().attr('title');
		member = $('#category').val();
		status = $('#status').val();
		total = $('tbody tr[data-href]').length;
		$.post(url,{flag:'sort',sort:sort, type:type,start:start,total:total,member:member,status:status},function(result){
			$('#wrap').html(result);
		});
		return false;
	});
	$(document).on('click','input#submit', function(){
		member = $('#category').val();
		status = $('#status').val();
		total = $('tbody tr[data-href]').length;
		if(member == "" && status == ""){
			alert("Please select 会員種別 and ステータス");
		}else{
			$.post(url, {flag:'search',member:member, status:status,total:total}, function(result){
				$('#wrap').html(result);
			});
		}
		return false;
	});
});