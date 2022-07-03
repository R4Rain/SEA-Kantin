@if(request('select'))
    <input type="hidden" name="select" value="{{request('select')}}">
@endif
<div class="d-flex justify-content-center w-100 mb-5">
        <div class="input-group mb-3" style="max-width: 1000px;">
            <input
                id="searchBar"
                type="text"
                class="form-control"
                placeholder="Search here..."
                aria-describedby="button-addon2"
                name="search"
                value="{{request('search')}}"
            />
            <button class="btn btn-primary" type="submit" id="button-addon2" data-mdb-ripple-color="dark">
                Search
            </button>
        </div>  
</div>