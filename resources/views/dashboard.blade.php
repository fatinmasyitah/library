@extends('layouts.backend')
@section('title', 'Dashboard')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-chart">
                    <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-inbox"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Today's book issued</h4>
                    </div>
                    <div class="card-body">
                        {{ $todayIssued ?? 0 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-chart">
                    <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Book</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalBook ?? 0 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-chart">
                    <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-hourglass"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending Issued</h4>
                    </div>
                    <div class="card-body">
                        {{ $pendingIssued ?? 0 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Book Issued List</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.bookissued') }}" class="btn btn-danger">View all Book Issued <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                            @foreach ($proceeds as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td><span class="badge {{ $item->bookstatus === 0 ? 'badge-warning':($item->bookstatus === 1 ? 'badge-success':'badge-danger') }}">{{ $item->bookstatus === 0 ? 'pending':($item->bookstatus === 1 ? 'approved':'canceled') }}</span></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Book List</h4>
                    <div class="card-header-action">
                        <a href="{{ route('book.index') }}" class="btn btn-danger">View all Books <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Book Image</th>
                                <th>Book Title</th>
                                <th>Status</th>
                            </tr>
                            @foreach ($books as $item)
                            <tr>
                                <td><img src="{{ asset($item->bookimage) }}" class="avatar-book" alt="{{ $item->booktitle }}" width="60"></td>
                                <td>{{ $item->booktitle }}</td>
                                <td><span class="badge {{ $item->status == 1 ? 'badge-success':'badge-danger' }}">{{ $item->status == 1 ? 'Available':'Issued' }}</span></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection