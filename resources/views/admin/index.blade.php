@extends('layout.nav')

@section('title','Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right">Total </span>
                <h5>Admin</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($admin_list) }}</h1>
                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                <small>Total income</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-info float-right">Total</span>
                <h5>Customer</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($user_list) }}</h1>
                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                <small>New orders</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-primary float-right">Total</span>
                <h5>Products</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($product) }}</h1>
                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                <small>New Category</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-primary float-right">Total</span>
                <h5>Category</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($category) }}</h1>
                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                <small>New Category</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-danger float-right"> value</span>
                <h5> Sub-category</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($subcategory) }}</h1>
                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                <small>In first month</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-danger float-right"> value</span>
                <h5> Brands</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($brand) }}</h1>
                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                <small>New Brand</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right"> Total</span>
                <h5> Blog Posts</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($blog) }}</h1>
                <div class="stat-percent font-bold text-success">38% <i class="fa fa-level-down"></i></div>
                <small>New Blog Posts</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right"> Total</span>
                <h5> Coupon</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($coupon) }}</h1>
                <div class="stat-percent font-bold text-success">38% <i class="fa fa-level-down"></i></div>
                <small>New Blog Posts</small>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Orders</h5>
                <div class="float-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-xs btn-white active">Today</button>
                        <button type="button" class="btn btn-xs btn-white">Monthly</button>
                        <button type="button" class="btn btn-xs btn-white">Annual</button>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <ul class="stat-list">
                            <li>
                                <h2 class="no-margins">2,346</h2>
                                <small>Total orders in period</small>
                                <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                <div class="progress progress-mini">
                                    <div style="width: 48%;" class="progress-bar"></div>
                                </div>
                            </li>
                            <li>
                                <h2 class="no-margins ">4,422</h2>
                                <small>Orders in last month</small>
                                <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                <div class="progress progress-mini">
                                    <div style="width: 60%;" class="progress-bar"></div>
                                </div>
                            </li>
                            <li>
                                <h2 class="no-margins ">9,180</h2>
                                <small>Monthly income from orders</small>
                                <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                <div class="progress progress-mini">
                                    <div style="width: 22%;" class="progress-bar"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>All Admin List </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" class="dropdown-item">Config option 1</a>
                        </li>
                        <li><a href="#" class="dropdown-item">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-sm-9 m-b-xs">
                        <div data-toggle="buttons" class="btn-group btn-group-toggle">
                            <ul class="nav nav-tabs">
                                <li><a class="btn btn-xs btn-white" data-toggle="tab" href="#tab-1"><i class="fa fa-circle text-navy"></i> Admin</a></li>
                                <li><a class="btn btn-xs btn-white" data-toggle="tab" href="#tab-2"><i class="fa fa-circle text-danger"></i> User</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-primary" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                </div>

                  
                        
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="ibox-title">
                                    <h5>There are all Active User list</h5>
                                </div> 
                                <div class="full-height-scroll">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                            </tr>
                                            @foreach($admin_list as $data)
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                
                                                    @if($data->userdetail)
                                                    <td>
                                                    {{ $data->userdetail->phone }}
                                                    </td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('demote-admin',$data->id) }}" class="btn btn-xs btn-danger">Demote</a></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="ibox-title">
                                    <h5>There are all Inactive User list</h5>
                                </div> 
                                <div class="full-height-scroll">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Promote</th>
                                            </tr>
                                            @foreach($user_list as $data)
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>
                                                </td>
                                                <td><a href="{{ route('promote-admin',$data->id) }}" class="btn btn-xs btn-success">Promote</a></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection