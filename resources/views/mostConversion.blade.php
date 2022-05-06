@extends('layout')

@section('title', 'Most Conversion')

@section('content')

    <div class="content">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Most Conversion</strong>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">User who used most currency conversion</h3>
                                    </div>
                                    <hr>
                                    <div class="form-group text-center">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-cc-visa fa-2x"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 offset-md-3">
                                            @if(!empty($mostConversion))
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:200px;">Name</td>
                                                        <td>{{$mostConversionUser->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{$mostConversionUser->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Current Wallet</td>
                                                        <td>{{number_format($mostConversionUser->wallet, 2) . ' ' . $mostConversionUser->currency}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Number of Conversion</td>
                                                        <td>{{$mostConversion->conversionQuantity}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            @else
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">No data found</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            @endif
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
