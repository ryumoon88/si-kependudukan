@extends('admins.layouts.main')
@section('content')
    <div class="section">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Citizens</div>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Marital Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1370000000000000</td>
                            <td>Naufal Hady</td>
                            <td>Male</td>
                            <td>Single</td>
                            <td><a href="" class="btn btn-sm">Details</a></td>
                        </tr>
                        <tr>
                            <td scope="row">1370000000000000</td>
                            <td>Naufal Hady</td>
                            <td>Male</td>
                            <td>Single</td>
                            <td><a href="" class="btn btn-sm">Details</a></td>
                        </tr>
                        <tr>
                            <td scope="row">1370000000000000</td>
                            <td>Naufal Hady</td>
                            <td>Male</td>
                            <td>Single</td>
                            <td><a href="" class="btn btn-sm">Details</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="module">
        $(function() {
            $('table.datatable').each(function(el) {
                var datatable = $(this).DataTable({

                });
            })
        })
    </script>
@endpush
