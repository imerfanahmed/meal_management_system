     function addMember() {
            //console.log($('#name').val() + ' ' + $('#email').val() + ' ' + $('#phone').val());
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            url: 'add_members',
            data: {
            'name': $('#name').val(),
            'email': $('#email').val(),
            'phone': $('#phone').val()
            },

            success: function (response) {
            console.log(response);
            //console.log(response['data']['name']);
            if (response['status'] === 'ok') {
                $("#addMmember").modal('hide');
                $('#members-table').append('<tr><td>'+ response['data']['id']+ '</td><td>' + response['data']['name'] + '</td><td>' + response['data']['email'] + '</td><td>' + response['data']['phone_number'] + '</td></tr>');
                $('#name').val('');
                $('#email').val('');
                $('#phone').val('');
            }
            else {
                alert('Error: ' + response.error);
            }
            },
            error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
            alert('Please Fill Up the Form Properly');
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

