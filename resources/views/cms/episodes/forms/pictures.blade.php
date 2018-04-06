<div class="profile_picture">
    <img
        alt="image"
        class="img-thumbnail episode-picture"
        src="{{ $episode->picture }}" />
    <div class="file-input">
      <form>
        <input type="file" name="episode_picture" id="episode_picture">
      </form>
    </div>
    <div class="upload-div">
      <button type="button" id="upload-button" class="btn btn-primary">
        <i class="fa fa-upload"></i>
        Change
      </button>
    </div>
    <div class="pictureSpinner" style="display: none" id="spinner">
      <i class="fa fa-spinner fa-spin fa-3x fa-fw text-primary"></i>
    </div>
</div>

<div style="text-align: center; margin: auto;">
  <p class="help-block">Hover to change</p>
  <p id="picture-error" class="text-danger" style="display:none;"></p>
</div>
