<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="datatables-basic table" id="members-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    @foreach ($members as $member)
                    <tr>
                        <td>{{$member->id}}</td>
                        <td>{{$member->name}}</td>
                        <td>{{$member->email}}</td>
                        <td>{{$member->phone_number}}</td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</section>
