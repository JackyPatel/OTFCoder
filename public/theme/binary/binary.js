function deleteRecord(delete_path,title,text,token,table,type,id)
{
	swal({
		title: title,
		text: text,
		type: type,
		showCancelButton: true,
		confirmButtonText: "Yes, delete it!",
		cancelButtonText: "No, cancel it!",
		closeOnConfirm: true,
		closeOnCancel: true
	}, function(isConfirm) {
		if (isConfirm) {
			deleteRequest(delete_path,id,token);
		} 
	});
}

function checkLength(delete_id)
{
    var selected_length = delete_id.size();

    if(0 == selected_length){
        EmptyData();
    }else{
        var id = [];
        $.each(delete_id, function(i, ele){
            id.push($(ele).val());
        });
        deleteRecord(delete_path,title,text,token,table,type,id)
    }
}

function deleteRequest(delete_path,id,token)
{
    $.ajax({
        url: delete_path,
        type:'post',
        dataType:'json',
        data:{id:id,_token: token},
        beforeSend:function(){
            $('div.overlay').show();
        },
        complete:function(){
            $('div.overlay').hide();
            var redrawtable = $('#'+table).dataTable();
                redrawtable.fnStandingRedraw();
        },
        success: function (respObj) {
            if (respObj) {
                toastr.success('Record deleted Successfully');
            };
        }
    });
}
function EmptyData(){
    swal({
       title: "please select a record to delete",
       type:"error",
       timer: 2000,
       showConfirmButton: false 
    });
}