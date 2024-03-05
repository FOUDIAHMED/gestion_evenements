

<form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <span for="name">Menu Name:</span>
        <input type="text" name="name" id="name" class="form-control mt-3" required>
    </div>
    <div class="form-group">
        <span for="description">Menu Description:</span>
        <input type="text" name="description" id="description" class="form-control mt-3" required>
    </div>
    <div class="form-group">
        <span for="media">ADD vedio Or image:</span>
        <input type="file" name="media" id="media" class="form-control mt-3" accept="image/*,video/*" required>
    </div>
    <button type="submit" class="btn btn-success submit mb-4">Submit</button>
</form>