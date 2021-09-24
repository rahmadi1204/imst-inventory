<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }}</title>

    <!-- Custom styles for this template-->
    <link href="{{ asset('/templates/alert/') }}/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet">
    <link href="{{ asset('/templates/admin/') }}/css/sb-admin-2.css" rel="stylesheet">
    <link href="{{ asset('/templates/admin/') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <img src="{{ asset('templates/login/images/imst-logo.jpeg') }}" alt="logo-image" class="brand-image">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/templates/admin') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('/templates/admin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/templates/admin') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/templates/admin') }}/js/sb-admin-2.min.js"></script>
    <script src="{{ asset('/templates/alert') }}/sweetalert2/sweetalert2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/templates/admin') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/templates/admin') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>
