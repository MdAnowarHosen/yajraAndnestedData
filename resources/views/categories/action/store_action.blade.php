<div class=" d-flex">
    <div class="mx-2">
        <a href="#" class="btn btn-sm btn-info">Edit</a>
    </div>
    <div class="mx-2">
        <form action="#" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>

    </div>
</div>
