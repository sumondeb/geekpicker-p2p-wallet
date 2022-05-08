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
                                    <div class="row">
                                        <div class="col-12 col-md-6 offset-md-3">
                                            <form action="{{route('userTransactionInfo')}}" method="get" novalidate="novalidate">
                                                <div class="row form-group">
                                                    <div class="col-9" style="padding-right: 0;">
                                                        <select name="user" id="user" class="form-control">
                                                            <option value="">Please select user</option>
                                                            @foreach($allUsers as $userData)
                                                            <option @if($userData->id==$user_id){{'selected=selected'}}@endif value="{{$userData->id}}">{{$userData->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="submit" class="btn btn-info pull-right" style="width:100%;"><i class="fa fa-search"></i>&nbsp; Search</button>
                                                    </div>
                                                </div>
                                            </form>

                                            @if(!empty($userInfo))
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:300px;">Name</td>
                                                        <td>{{$userInfo->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{$userInfo->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Current Wallet</td>
                                                        <td>{{number_format($userInfo->wallet, 2) . ' ' . $userInfo->currency}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Converted Amount by Sending</td>
                                                        <td id="sendingConvertedAmount">{{number_format($sendingConvertedAmount, 2) . ' ' . $userInfo->currency}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Converted Amount by Receiving</td>
                                                        <td id="receivingConvertedAmount">{{number_format($receivingConvertedAmount, 2) . ' ' . $userInfo->currency}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Converted Amount</td>
                                                        <td id="totalConvertedAmount">{{number_format(($sendingConvertedAmount+$receivingConvertedAmount), 2) . ' ' . $userInfo->currency}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Third Highest Transaction Amount</td>
                                                        <td id="thirdHighestTransaction">{{!empty($thirdHighestTransaction) ? number_format($thirdHighestTransaction[0]->transactionAmount, 2) . ' ' . $userInfo->currency : 'Third transaction not found'}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            @else
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">Select a particular user</td>
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
