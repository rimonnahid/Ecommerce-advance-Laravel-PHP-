@extends('layout.nav')

@section('title','Add Product')

@section('content')
	


<div class="row">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right">Total </span>
                <h5>Orders</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($orders) }}</h1>
                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-danger float-right">Total </span>
                <h5>New Orders</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($neworders) }}</h1>
                <div class="stat-percent font-bold text-danger">98% <i class="fa fa-bolt"></i></div>
                <small>Currently</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right">Total </span>
                <h5>Order Done</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($doneorders) }}</h1>
                <div class="stat-percent font-bold text-success">58% <i class="fa fa-bolt"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right">Total </span>
                <h5>Order Process</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ count($processorders) }}</h1>
                <div class="stat-percent font-bold text-success">58% <i class="fa fa-bolt"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-success float-right">Total </span>
                <h5>Invest</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ App\Product::all()->sum('selling_price') }}</h1>
                <div class="stat-percent font-bold text-success">58% <i class="fa fa-bolt"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-primary float-right" style="float:right; padding-right: 1px;">All time </span>
                <h5>Total Order(TK)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $orders->sum('total_ammount') }}</h1>
                <div class="stat-percent font-bold text-primary">58% <i class="fa fa-bolt"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-danger float-right">Total </span>
                <h5>New Order(TK)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $neworders->sum('paying_ammount') }}</h1>
                <div class="stat-percent font-bold text-danger">58% <i class="fa fa-bolt"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-danger float-right">Total </span>
                <h5>Order queue(TK)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $processorders->sum('paying_ammount') }}</h1>
                <div class="stat-percent font-bold text-danger">58% <i class="fa fa-bolt"></i></div>
                <small>All Time</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <span class="label label-info float-right">Total </span>
                <h5>Order done(TK)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $doneorders->sum('paying_ammount') }}</h1>
                <div class="stat-percent font-bold text-info">58% <i class="fa fa-bolt"></i></div>
                <small>All Time</small>
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
                    <div data-toggle="buttons" class="btn-group btn-group-toggle">
                        <div class="nav nav-tabs">
                            <a class="btn btn-xs btn-white active" data-toggle="tab" href="#tab-1">Today</a>
                            <a class="btn btn-xs btn-white" data-toggle="tab" href="#tab-2">Monthly</a>
                            <a class="btn btn-xs btn-white" data-toggle="tab" href="#tab-3">Annual</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <ul class="stat-list">
                                    <li>
                                        <h2 class="no-margins">{{ $daily->sum('total_ammount')}}</h2>
                                        <small>Total orders in period</small>
                                        <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 48%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">{{ $daily->sum('paying_ammount') }}</h2>
                                        <small>Orders in last month</small>
                                        <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 60%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins "></h2>
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
                    <div id="tab-2" class="tab-pane">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <ul class="stat-list">
                                    <li>
                                        <h2 class="no-margins">
                                            {{ $monthly->sum('total_ammount') }}
                                        </h2>
                                        <small>Total orders in period</small>
                                        <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 48%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">{{ $monthly->sum('paying_ammount') }}</h2>
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
                    <div id="tab-3" class="tab-pane">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <ul class="stat-list">
                                    <li>
                                        <h2 class="no-margins">
                                            {{ $yearly->sum('total_ammount') }}
                                        </h2>
                                        <small>Total orders in period</small>
                                        <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 48%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">{{ $yearly->sum('paying_ammount') }}</h2>
                                        <small>Orders in last month</small>
                                        <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 60%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins ">year</h2>
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
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Basic Data Tables example with responsive plugin</h5>
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

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th width="10%">Sl</th>
                        <th>Category</th>
                        <th>Sub-category</th>
                        <th>Company</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th width="15%">Image</th>
                        <th>Quantity</th>
                        <th width="12%">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($product as $data)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $data->category->cate_name }}</td>
                        <td>{{ $data->subcate->name }}</td>
                        <td>{{ $data->brand->brand_name }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->selling_price }}</td>
                        <td>
                            <?php foreach(json_decode($data->image) as $image){?>
                            <img src="{{ asset('public/file/'.$image) }}" height="30px" width="40px">
                            <?php }?>
                        </td>
                        <td>{{ $data->quantity }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="btn btn-secondary btn-xs">View</a>
                            <a href="{{ URL::to('/admin/product/editproduct/'.$data->id) }}" class="btn btn-success btn-xs" >Edit</a>
                            <a href="{{ URL::to('/admin/product/addproduct/'.$data->id) }}" class="btn btn-danger btn-xs" id="delete">Delete</a>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Category</th>
                        <th>Sub-category</th>
                        <th>Company</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

        
@endsection
