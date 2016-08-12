@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Upload A Secure File</div>

                <div class="panel-body">
                  {{ Form::open(array('url' => 'upload', 'files' => true,'method' => 'post')) }}
                    <div class="form-group">
                      <label for="file_name">File Name</label>
                      <input type="text" class="form-control" id="file_name" name="file_name" placeholder="File Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" name="file">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
