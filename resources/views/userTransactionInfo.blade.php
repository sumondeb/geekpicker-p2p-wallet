@extends('layout')

@section('title', 'User Transaction Info')

@section('content')

    <div class="content">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">User Transaction Info</strong>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Transaction info for a particular user</h3>
                                    </div>
                                    <hr>
                                    <form action="#" method="post" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-12 col-md-6 offset-md-3">
                                                <div class="row form-group">
                                                    <div class="col-9" style="padding-right: 0;">
                                                        <select name="select" id="select" class="form-control">
                                                            <option value="0">Please select</option>
                                                            <option value="1">Option #1</option>
                                                            <option value="2">Option #2</option>
                                                            <option value="3">Option #3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="button" class="btn btn-info pull-right" style="width:100%;"><i class="fa fa-search"></i>&nbsp; Search</button>
                                                    </div>
                                                </div>

                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:300px;">Name</td>
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
                                                            <td>Converted Amount by Sending</td>
                                                            <td>500.00 USD</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Converted Amount by Receiving</td>
                                                            <td>500.00 USD</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Converted Amount</td>
                                                            <td>500.00 USD</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Third Highest Transaction Amount</td>
                                                            <td>500.00 USD</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div><!--/.col-->

            </div>

        </div><!-- .animated -->
    </div><!-- .content -->

@endsection
