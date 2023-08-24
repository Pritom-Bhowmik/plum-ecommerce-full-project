@csrf
                                
<div class="form-group">
    <label>Title:</label>
    <input type="text" class="form-control" name="title" value="{{old('title', optional($edit)->title)}}" required>
    @error('title')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <label for="">Content</label>
    <textarea class="form-control" name="content">{{old('content', optional($edit)->content)}}</textarea>
    @error('content')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <label for="">Thumbnail: (800x1200)</label>
    <input type="file" class="form-control" accept=".jpeg, .png, .gif, .svg, .webp" id="avatar" name="thumbnail">
    <span class="note"><strong>Accepted Image Type:</strong> .jpeg, .jpg, .png, .gif, .svg, .webp</span>
    @error('thumbnail')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>

<div class="form-group d-block">
    <label class="d-block">Thumbnail Preview:</label>
    <div class="row">
        <div class="col-lg-2 col-md-4">
            <br>
            @if(optional($edit)->thumbnail)
            <img id="avatar_preview" class="img-thumbnail" src="{{asset('/frontend/img/portfolio/wide/'.optional($edit)->thumbnail)}}">
            @else
            <img id="avatar_preview" class="img-thumbnail" src="https://via.placeholder.com/629x472">
            @endif
        </div>
    </div>
</div>
<br>
<br>

<div class="form-group">
    <label for="">Hover Thumbnail: (800x1200)</label>
    <input type="file" class="form-control" accept=".jpeg, .png, .gif, .svg, .webp" id="avatar" name="thumbnail_hover">
    <span class="note"><strong>Accepted Image Type:</strong> .jpeg, .jpg, .png, .gif, .svg, .webp</span>
    @error('thumbnail')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>

<div class="form-group d-block">
    <label class="d-block">Thumbnail Hover Preview:</label>
    <div class="row">
        <div class="col-lg-2 col-md-4">
            <br>
            @if(optional($edit)->thumbnail_hover)
            <img id="avatar_preview" class="img-thumbnail" src="{{asset('/frontend/img/portfolio/wide/'.optional($edit)->thumbnail_hover)}}">
            @else
            <img id="avatar_preview" class="img-thumbnail" src="https://via.placeholder.com/629x472">
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