@csrf
<div class="form-group">
    <label for="parent_id">Parent Category</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value>Not set</option>
        @foreach($categories as $rowCategory)
            @if(isset($category) && $category->parent && $rowCategory->id == $category->parent->id)
                <option value="{{ $rowCategory->id }}" selected>{{ $rowCategory->name }}</option>
            @else
                <option value="{{ $rowCategory->id }}">{{ $rowCategory->name }}</option>
            @endif
        @endforeach
    </select>
    @if ($errors->first('parent_id'))
        <span class="text-danger">
          {{ $errors->first('parent_id') }}
        </span>
    @endif
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ isset($category)?$category->name : '' }}">
    @if ($errors->first('name'))
        <span class="text-danger">
          {{ $errors->first('name') }}
        </span>
    @endif

</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">
        {{ isset($category)?$category->description : '' }}
    </textarea>
    @if ($errors->first('description'))
        <span class="text-danger">
          {{ $errors->first('description') }}
        </span>
    @endif
</div>
<div class="text-center">
    <button type="submit" class="btn btn-success">Save</button>
</div>
