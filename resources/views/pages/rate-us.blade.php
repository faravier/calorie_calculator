<!-- This is your form for rating and providing feedback -->
<form action="{{ route('feedback.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="rating" class="form-label">Usefulness Rating:</label>
        <div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="rating1" name="rating" value="1">
                <label class="form-check-label" for="rating1">1 - Not Useful</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="rating2" name="rating" value="2">
                <label class="form-check-label" for="rating2">2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="rating3" name="rating" value="3">
                <label class="form-check-label" for="rating3">3 - Neutral</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="rating4" name="rating" value="4">
                <label class="form-check-label" for="rating4">4</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="rating5" name="rating" value="5">
                <label class="form-check-label" for="rating5">5 - Very Useful</label>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="comments" class="form-label">Additional Comments:</label>
        <textarea class="form-control" id="comments" name="comments" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- This is where you display success or error messages -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
