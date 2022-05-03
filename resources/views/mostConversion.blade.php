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
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:200px;">Name</td>
                                                        <td>Sumon Deb</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>sumondeb5@gmail.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Current Wallet</td>
                                                        <td>500.00 USD</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Number of Conversion</td>
                                                        <td>20</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
