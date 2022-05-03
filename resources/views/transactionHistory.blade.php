@extends('layout')

@section('title', 'All Transaction History')

@section('content')

    <div class="content">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">All Transaction History</strong>
                        </div>
                        <div class="card-body">
                            <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer" style="padding-top: 15px;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="text-center" style="width: 6%;">SL</th>
                                                    <th class="text-center" style="width: 20%;">Transaction Date & Time</th>
                                                    <th class="text-center" style="width: 20%;">Sender</th>
                                                    <th class="text-center" style="width: 17%;">Sending Amount</th>
                                                    <th class="text-center" style="width: 20%;">Receiver</th>
                                                    <th class="text-center" style="width: 17%;">Receiving Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" class="odd">
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">2022-05-03 03:05:00</td>
                                                    <td>User A</td>
                                                    <td class="text-center">$162,700</td>
                                                    <td>User B</td>
                                                    <td class="text-center">$162,700</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">2022-05-03 03:05:00</td>
                                                    <td>User B</td>
                                                    <td class="text-center">$162,700</td>
                                                    <td>User A</td>
                                                    <td class="text-center">$162,700</td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">2022-05-03 03:05:00</td>
                                                    <td>User A</td>
                                                    <td class="text-center">$162,700</td>
                                                    <td>User B</td>
                                                    <td class="text-center">$162,700</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">2022-05-03 03:05:00</td>
                                                    <td>User B</td>
                                                    <td class="text-center">$162,700</td>
                                                    <td>User A</td>
                                                    <td class="text-center">$162,700</td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class="text-center">5</td>
                                                    <td class="text-center">2022-05-03 03:05:00</td>
                                                    <td>User A</td>
                                                    <td class="text-center">$162,700</td>
                                                    <td>User B</td>
                                                    <td class="text-center">$162,700</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="text-center">6</td>
                                                    <td class="text-center">2022-05-03 03:05:00</td>
                                                    <td>User B</td>
                                                    <td class="text-center">$162,700</td>
                                                    <td>User A</td>
                                                    <td class="text-center">$162,700</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="dataTables_paginate paging_simple_numbers pull-right" id="bootstrap-data-table_paginate">
                                            <ul class="pagination"><li class="paginate_button page-item previous disabled" id="bootstrap-data-table_previous"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="bootstrap-data-table_next"><a href="#" aria-controls="bootstrap-data-table" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div> <!-- .card -->

                </div><!--/.col-->

            </div>

        </div><!-- .animated -->
    </div><!-- .content -->

@endsection
