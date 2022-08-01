
<div class="col-10">
    Customer in For
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fullname">
            @error('fullname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                name="email">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                name="phone">
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                name="address">
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Notes</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                name="notes">
            @error('notes')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Notes</label>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">
                  <option selected>Open this select menu</option>
                  <option value="no">Not yes</option>
                  <option value="yes">Yes</option>
                </select>
            @error('statuts')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Total Money</label>
            <input  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                name="totalmoney" value="">
            @error('totalmoney')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>