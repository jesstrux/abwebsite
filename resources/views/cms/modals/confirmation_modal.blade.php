<div id="{{$id}}" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 600px !important;">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">{{$title}}</h4>
      </div>
        <div class="modal-body">
          <div class="container">
            <form name="action_confirmation_form"
              id="action_confirmation_form">
              <p id="confirmation_text">{{$text}}</p>
              <div class="form-group">
                <button class="btn btn-default"
                  data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary"
                  type="button" onclick="{{ $function }}">{{$action}}</button>
                @include('cms.inline_loader')
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
