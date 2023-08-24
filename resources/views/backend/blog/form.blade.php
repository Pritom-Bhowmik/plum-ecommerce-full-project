@csrf
                                
<div class="form-group">
    <label>Title:</label>
    <input type="text" class="form-control" name="title" value="{{old('title', optional($edit)->title)}}" required>
    @error('title')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label>Description:</label>
    <input type="text" class="form-control" name="description" value="{{old('description', optional($edit)->description)}}" required>
    @error('description')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <label for="">Thumbnail: (1800 x 1801)</label>
    <input type="file" class="form-control" accept=".jpeg, .png, .gif, .svg, .webp" id="avatar" name="thumbnail" required>
    <span class="note"><strong>Accepted Image Type:</strong> .jpeg, .jpg, .png, .gif, .svg, .webp</span>
    @error('avatar')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>
<div class="form-group d-block">
    <label class="d-block">Thumbnail Preview:</label>
    <div class="row">
        <div class="col-lg-2 col-md-4">
            <br>
            @if(optional($edit)->thumbnail)
            <img id="avatar_preview" class="img-thumbnail" src="{{asset('/frontend/img/blog/'.optional($edit)->thumbnail)}}">
            @else
            <img id="avatar_preview" class="img-thumbnail" src="https://via.placeholder.com/300x400">
            @endif
        </div>
    </div>
</div>
<br>
<br>

<div class="d-block">
    <button type="submit" class="spin btn btn-purple waves-effect waves-light">
        Submit
    </button>
</div>