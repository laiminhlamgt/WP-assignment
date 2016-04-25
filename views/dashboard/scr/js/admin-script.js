function EditUser(id){
	BeginEdit();
	$('#d-db-modal-view-container').html('');
	$.ajax({
		url: Define_URL + 'dashboard/user_edit_form',
		// The type of request.
		type: "get",
		// The type of data that is getting returned.
		data: {id:id},
			success: function( response ){
				$('#d-db-modal-view-container').html(response);
		}
	});
}

function SubmitEditUserForm(){
	var postData = $('#editUserForm').serializeArray();
    var formURL = $('#editUserForm').attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        dataType : "json",
        success:function(data, textStatus, jqXHR) 
        {
            console.log(data);
            if(data.status == true)
            {
                $('#editUserForm_PasswordInput').val('');
                if(data.new_id != null)
                {
                    alert('Create successful!');
                    $('#editUserFormTitle').html('Edit User');
                    $('#editUserForm_UserId').val(data.new_id);
                    $('#editUserForm_EmailInput').prop('disabled', true);
                    $('#editUserForm_EmailLabel').append(' (can not change)');
                    console.log($('#editUserForm_UserId').val());
                }
                else
                {
                    alert('Edit successful!');
                }
            }
            else
            {
            	alert(data.message);	
            }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {  
            alert('error :' + jqXHR.responseText);   
        }
    });
    
}

function BeginEdit(){
	$('#d-db-bg-cover').show();
	$('body').css('overflow', 'hidden');
}

function CloseEdit(){
	$('#d-db-bg-cover').hide();
	$('body').css('overflow', 'auto');
}

function ChangePage(control)
{
    $.ajax(
    {
        url : Define_URL + 'dashboard/list_users',
        type: "GET",
        data: {page:control.value},
        success:function(data, textStatus, jqXHR) 
        {
            $('#mainContent').html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {  
            alert('error :' + jqXHR.responseText);   
        }
    });
}

function DeleteUser()
{
    var confirmText = prompt("Please enter 'delete' to confirm", "");
    if(confirmText != 'delete')
        return;
    var userId = $('#editUserForm_UserId').val();
    $.ajax(
    {
        url : Define_URL + 'dashboard/delete_user',
        type: "POST",
        data: {id: userId},
        dataType: "json",
        success:function(data, textStatus, jqXHR) 
        {
            if(data.status == true)
            {
                alert('Deleted');
                CloseEdit();
                $('#tr_' + userId).remove();
            }
            else
            {
                alert(data.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {  
            alert('error :' + jqXHR.responseText);   
        }
    });

}