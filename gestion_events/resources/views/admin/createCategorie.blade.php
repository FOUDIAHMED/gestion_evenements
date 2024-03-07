
<x-Admin-layout>
<form action="{{ route('addCategory') }}" method="POST" >
    @csrf
    <div class="form-group">
        <span for="name">Category Name:</span>
        <input type="text" name="name" id="name" class="form-control mt-3" required>
    </div>
    
    <button type="submit" class="btn btn-success submit mb-4">Submit</button>
</form>
</x-Admin-layout>