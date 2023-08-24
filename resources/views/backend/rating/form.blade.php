@csrf
                                
<div class="form-group">
    <label>Title:</label>
    <input type="text" class="form-control" name="title" value="{{old('title', optional($edit)->title)}}" required>
    @error('title')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <label>Content:</label>
    <textarea type="text" class="form-control" name="content" rows="3" required>{{old('content', optional($edit)->content)}}</textarea>
    @error('content')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <label for="">Avatar: (100 x 100)</label>
    <input type="file" class="form-control" accept=".jpeg, .png, .gif, .svg, .webp" id="avatar" name="avatar" required>
    <span class="note"><strong>Accepted Image Type:</strong> .jpeg, .jpg, .png, .gif, .svg, .webp</span>
    @error('avatar')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>
<div class="form-group d-block">
    <label class="d-block">Avatar Preview:</label>
    <div class="row">
        <div class="col-lg-2 col-md-4">
            <br>
            @if(optional($edit)->avatar)
            <img id="avatar_preview" class="img-thumbnail" src="{{asset('/frontend/img/avatars/'.optional($edit)->avatar)}}">
            @else
            <img id="avatar_preview" class="img-thumbnail" src="https://via.placeholder.com/100x100">
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