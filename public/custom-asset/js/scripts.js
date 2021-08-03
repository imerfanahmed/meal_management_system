console.log('Hello World From Custom Script');
//Function to fire a toast notification
        function toastNotification(message,type,) {
            toastr[type](
                message,
                {
                  closeButton: true,
                  tapToDismiss: false,
                }
              );
            }
function addMember() {
            //console.log($('#name').val() + ' ' + $('#email').val() + ' ' + $('#phone').val());
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
                    $('#members-table').append('<tr><td>'+ response['data']['id']+ '</td><td>' + response['data']['name'] + '</td><td>' + response['data']['email'] + '</td><td>' + response['data']['phone_number'] +'</td><td>'+ response['data']['room_number'] + '</td><td>'+ response['data']['deposit'] +'</td></tr>');
                    $('#name').val('');
                    $('#email').val('');
                    $('#phone').val('');
                    $('#room_number').val('');
                    $('#deposit').val('');
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

        //ajax request to delete members
        function deleteMembers(id) {
        $.ajax({
            type: 'GET',
            url: 'delete_members',
            data: {
            'id': id
            },
            success: function (response) {
            console.log(response);
            if (response.status == 'OK') {
                $('#member-' + id).remove();
            }
            else {
                alert('Error: ' + response.error);
            }
            },
            error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
            alert('Error: ' + errorThrown);
            }
        });
        }

