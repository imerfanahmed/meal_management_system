//console.log('Hello World From Custom Script');
//Function to fire a toast notification
function toastNotification(message, type, ) {
    toastr[type](
        message, {
            closeButton: true,
            tapToDismiss: false,
        }
    );
}

function addNew() {
    $('#id').val('').prop("disabled", false);
    $('#name').val('');
    $('#email').val('').prop("disabled", false);
    $('#phone').val('');
    $('#room_number').val('');
    $('#deposit').val('').prop("disabled", false);
};



function addMember() {
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'add_members',
        data: {
            'id': $('#id').val(),
            'name': $('#name').val(),
            'email': $('#email').val(),
            'phone': $('#phone').val(),
            'room_number': $('#room_number').val(),
            'deposit': $('#deposit').val(),
        },

        success: function (response) {
            //console.log(response);
            //console.log(response['data']['name']);
            if (response['status'] === 'ok') {
                $("#addMmember").modal('hide');
                $('#members-table').append(
                    '<tr><td>' +
                    response['data']['id'] +
                    '</td><td>' +
                    response['data']['name'] +
                    '</td><td>' +
                    response['data']['email'] +
                    '</td><td>' +
                    response['data']['phone_number'] +
                    '</td><td>' + response['data']['room_number'] +
                    '</td><td>' +
                    response['data']['deposit'] +
                    '</td><td>' +
                    '<button class="btn btn-outline-warning btn-sm" onclick="editMember_modal(' + response['data']['id'] + ')"><i class="fas fa-edit"></i> Edit</button>' + ' ' +

                    '<button class="btn btn-outline-danger btn-sm" onclick="deleteMember(' + response['data']['id'] + ')"><i class="fas fa-trash"></i> Delete</button>' +

                    '</td></tr>');
                $('#name').val('');
                $('#email').val('');
                $('#phone').val('');
                $('#room_number').val('');
                $('#deposit').val('');
                console.log(response['balance']);
                toastNotification(response['data']['name'] + ' added successfully', 'success');
            }
        },
        error: function (response) {
            toastNotification('Please resolve the errors', 'error');
            $('#idError').text(response.responseJSON.errors.id);
            $('#emailError').text(response.responseJSON.errors.email);
        }
    });
}

//Function to delete a member
function deleteMembers(id) {
    $.ajax({
        type: 'GET',
        url: 'delete_members',
        data: {
            'id': id
        },
        success: function (response) {
            console.log(response);
            if (response['status'] == 'ok') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Member deleted successfully',
                    timer: 2000
                });
                $('#member-' + id).remove();
            } else {
                alert('Error: ' + response.error);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
            alert('Error: ' + errorThrown);
        }
    });
}


//delete a member using sweetalert
function deleteMember(id) {
    Swal.fire({
        title: 'Warning',
        text: 'Are you sure you want to delete this member?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
    }).then(function (result) {
        if (result.value) {
            deleteMembers(id);
        } else {
            return false;
        }
    });
}

//updating a member using ajax
function editMember_modal(id) {
    $.ajax({
        type: 'GET',
        url: 'get_member',
        data: {
            'id': id
        },
        success: function (response) {
            console.log(response);
            if (response['status'] == 'ok') {
                $('#addMmember').modal('show');
                $('#id').val(response['data']['id']).prop("disabled", true);
                $('#name').val(response['data']['name']);
                $('#email').val(response['data']['email']).prop("disabled", true);
                $('#phone').val(response['data']['phone_number']);
                $('#room_number').val(response['data']['room_number']);
                $('#deposit').val(response['data']['deposit']).prop("disabled", true);
                $("#submit").html('Update').attr("onclick","sweetUpdate("+ id +")");
            } else {
                alert('Error: ' + response.error);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
            alert('Error: ' + errorThrown);
        }
    });
}

//function to updating a member
function sweetUpdate(id){
    Swal.fire({
        title: 'Warning',
        text: 'Are you sure you want to Update this member?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
    }).then(function (result) {
        if (result.value) {
            updateMember(id);
        } else {
            return false;
        }
    });
};

function updateMember(id) {
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'update_member',
        data: {
            'id': id,
            'name': $('#name').val(),
            'phone': $('#phone').val(),
            'room_number': $('#room_number').val(),
        },

        success: function (response) {
            location.reload();
           toastNotification(response['data']['name'] + ' updated successfully', 'success');
        },
        error: function (response) {
            console.log(response);
            toastNotification('Please resolve the errors', 'error');
            // $('#idError').text(response.responseJSON.errors.id);
            // $('#emailError').text(response.responseJSON.errors.email);
        }
    });
}



//cancel button for add member modal
$('#cancel').click(function () {
    $('#addMmember').modal('hide');
    $('#id').val('').prop("disabled", false);
    $('#email').val('').prop("disabled", false);
    $('#deposit').val('').prop("disabled", false);
});
