@extends('cms.layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 style="font-weight: bold; color: #337ab7;" class="pull-left">
      Change Password: </h3>
     <div class="clearfix"></div>
  </div>
  <div class="panel-body">
    <div class="container">

      <div id="error-alert" class="alert alert-danger"
        style="display: none;">
      </div>

      @if ($errors->any())
        <div class="alert alert-danger" style="display: inline-block;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <form name="reset_password_form" id="reset_password_form"
        method="post" action="{{ route('password.request') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="current_password">Current Password:</option>
          <input type="password" id="current_password"
            name="current_password" class="form-control"
            placeholder="current password" autofocus>
        </div>

        <div class="form-group">
          <label for="new_password">New Password:</option>
          <input type="password" id="new_password" name="password"
            class="form-control" placeholder="new password">
        </div>

        <div class="form-group">
          <label for="password_confirmation">Confirm Password:</option>
          <input type="password" id="password_confirmation" name="password_confirmation"
            class="form-control" placeholder="confirm password">
        </div>

        <div class="form-group">
          <button class="btn btn-success" type="submit">
            Submit
          </button>
        </div>

      </form>

    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/reset_password.js') }}"></script>
@endsection
