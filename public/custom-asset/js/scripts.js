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
            if (response.status == 'ok') {
                $('#add-members').modal('hide');
                // $('#members-table').append('<tr><td>' + response.name + '</td><td>' + response.email + '</td><td>' + response.phone + '</td></tr>');
                // $('#name').val('');
                // $('#email').val('');
                // $('#phone').val('');
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

