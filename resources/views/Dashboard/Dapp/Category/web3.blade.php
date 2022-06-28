@extends('layouts.dashboard')
@section('dashboard_title')
  Dashboard
@endsection
@section('dashboard_breadcum')
  <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Dapp</a></li>
  <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);"></a>Web3</li>
@endsection
@section('dashboard_content')
  <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
      @include('Alerts.alerts')
      <a href="#" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#create">
          Add New Web3
      </a>
      <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Create Web3</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          X
                      </button>
                  </div>
                  <form action="{!! route('dashboard.dapp.category.save') !!}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="modal-body">
                        <label for="">Dapp Web3</label>
                        <input type="text" class="form-control mb-3" name="category">
                      </div>
                      <div class="modal-footer">
                          <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                          <button type="submit" class="btn btn-success">Save</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>

      <div class="widget-content widget-content-area br-6">
          <div class="table-responsive mb-4 mt-4">
              <table id="zero-config" class="table table-hover" style="width:100%">
                  <thead>
                      <tr>
                          <th>Web3</th>
                          <th>Status</th>
                          <th>Create At</th>
                          <th class="no-content"></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)
                      <tr>
                        <td>
                          {{ $category->category }}
                        </td>
                        <td>
                          <small class="badge badge-success">Active</small>
                        </td>
                        <td>
                           {{ \Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                         </td>
                        <td>
                          <a href="#" class="btn btn-info" data-toggle="modal" data-target="#edit{{ $loop->index }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                          </a>
                          <a href="{!! route('dashboard.dapp.category.delete', $category->id) !!}" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                        </td>
                      </tr>

                      <div class="modal fade" id="edit{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          X
                                      </button>
                                  </div>
                                  <form action="{!! route('dashboard.dapp.category.update', $category->id) !!}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <div class="modal-body">
                                        <label for="">Web3 Name</label>
                                        <input type="text" class="form-control mb-3" name="category" value="{{ $category->category }}">
                                      </div>
                                      <div class="modal-footer">
                                          <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                          <button type="submit" class="btn btn-success">Save</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>

                    @endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Web3</th>
                        <th>Status</th>
                        <th>Create At</th>
                        <th class="no-content"></th>
                      </tr>
                  </tfoot>
              </table>
          </div>
      </div>
  </div>
@endsection
