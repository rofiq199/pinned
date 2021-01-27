@extends('admin.master')
@section('content')
    <!-- BORDERED TABLE -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Bordered Table</h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Steve</td>
                        <td>Jobs</td>
                        <td>@steve</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Simon</td>
                        <td>Philips</td>
                        <td>@simon</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Jane</td>
                        <td>Doe</td>
                        <td>@jane</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
