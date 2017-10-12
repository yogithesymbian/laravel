@extends('app')
@section('content')
<!-- laravel/resources/views/yogi/index.blade.php -->
  <div  class="row">
    <div  class="col-md-12">
      <br>
        <h1>Laravel Ajax Crud</h1>
    </div>
  </div>
  <br>

<br>
<div  class="form-group row add">
  <div class="col-md-5">
    <input type="text"  class="form-control"  id="judulyogiaw" name="judulyogiaw" placeholder="Judul Anda Disini" required>
    <p  class="error text-center alert alert-danger hidden"></p>
  </div>
  <div class="col-md-5">
    <input type="text"  class="form-control"  id="deskripsiyogiaw" name="deskripsiyogiaw" placeholder="Deskripsi Anda Disini" required>
    <p  class="error text-center alert alert-danger hidden"></p>
  </div>
  <div class="col-md-2">
    <button class="btn btn-warning" id="addyogi" type="submit" name="button">
      <span class="glyphicon glyphicon-plus"></span> Add New Data
    </button>
  </div>
</div>
<div class="row">
  <div class="table-responsive">
    <table  class="table table-borderless"  id="table">
      <tr>
        <th>No.</th>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
      {{ csrf_field() }}
      <?php $no=1; ?>
      <?php foreach ($yogis as $yogi ): ?>
        <tr class="item {{ $yogi->id }} ">
          <td>{{ $no++ }}</td>
          <td>{{ $yogi->judulyogiaw }}</td>
          <td>{{ $yogi->deskripsiyogiaw }}</td>
          <td>
            <button class="edit-modal btn btn-primary"  data-id="{{$yogi->id}}" data-judulyogiaw="{{$yogi->judulyogiaw}}"  data-deskripsiyogiaw="{{$yogi->deskripsiyogiaw}}">
              <span class="glyphicon glyphicon-edit"></span> Edit
            </button>
            <button class="delete-modal btn btn-danger"  data-id="{{$yogi->id}}" data-judulyogiaw="{{$yogi->judulyogiaw}}" data-deskripsiyogiaw="{{$yogi->deskripsiyogiaw}}">
              <span class="glyphicon glyphicon-trash"></span> Delete
            </button>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>

<div  id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="post">
          <div class="form-group">
            <label class="control-label col-sm-2" for="id">ID : </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fid" disabled>
            </div>
          </div>
          <div class="form-group">
            <label  class="control-label col-sm-2" for="judulyogiaw">Title : </label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="judulyogiawx">
            </div>
          </div>
          <div class="form-group">
            <label  class="control-label col-sm-2" for="deskripsiyogiaw">Description:</label>
            <div class="col-sm-10">
              <input type="name"  class="form-control" id="deskripsiyogiawx">
            </div>
          </div>
        </form>
        <div class="deleteContent">
          Are you Sure you want to delete <span class="judulyogiaw"></span> ?
          <span class="hidden id"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class='glyphicon'> </span>
          </button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class='glyphicon glyphicon-remove'></span> Close
          </button>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
