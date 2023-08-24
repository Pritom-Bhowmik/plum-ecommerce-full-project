@csrf
                                
<div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" value="{{old('name', optional($edit)->name)}}" required>
    @error('name')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label>Designation:</label>
    <input type="text" class="form-control" name="designation" value="{{old('designation', optional($edit)->designation)}}" required>
    @error('designation')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label>Facebook:</label>
    <input type="text" class="form-control" name="facebook" value="{{old('facebook', optional($edit)->facebook)}}">
    @error('facebook')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label>Twitter:</label>
    <input type="text" class="form-control" name="twitter" value="{{old('twitter', optional($edit)->twitter)}}">
    @error('twitter')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label>Instagram:</label>
    <input type="text" class="form-control" name="instagram" value="{{old('instagram', optional($edit)->instagram)}}">
    @error('instagram')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label>Linkedin:</label>
    <input type="text" class="form-control" name="linkedin" value="{{old('linkedin', optional($edit)->linkedin)}}">
    @error('linkedin')
        <span class="error-message">{{$message}}</span>
    @enderror
</div>


<div class="form-group">
    <label for="">Avatar: (1800 x 1801)</label>
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
            <img id="avatar_preview" class="img-thumbnail" src="{{asset('/frontend/img/team/'.optional($edit)->avatar)}}">
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