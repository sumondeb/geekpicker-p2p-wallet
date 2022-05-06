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
                                                    <th class="text-center" style="width: 20%;">Transaction At</th>
                                                    <th class="text-center" style="width: 20%;">Sender</th>
                                                    <th class="text-center" style="width: 17%;">Sending Amount</th>
                                                    <th class="text-center" style="width: 20%;">Receiver</th>
                                                    <th class="text-center" style="width: 17%;">Receiving Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $trRole = ''; @endphp
                                                @foreach($transactionHistory as $transaction)
                                                <tr role="row" class="{{$trRole = $trRole=='odd' ? 'even' : 'odd'}}">
                                                    <td class="text-center">{{$sl++}}</td>
                                                    <td class="text-center">{{(new DateTime($transaction->transaction_at))->format('d/m/Y H:i:s')}}</td>
                                                    <td>{{$transaction->senderName}}</td>
                                                    <td class="text-center">{{number_format($transaction->sending_amount, 2) . ' ' . $transaction->sender_currency}}</td>
                                                    <td>{{$transaction->receiverName}}</td>
                                                    <td class="text-center">{{number_format($transaction->receiving_amount, 2) . ' ' . $transaction->receiver_currency}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="dataTables_paginate paging_simple_numbers pull-right" id="bootstrap-data-table_paginate">
                                            {{ $transactionHistory->links() }}
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
