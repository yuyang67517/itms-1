@if ($message = Session::get('success'))
    <div class = "container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
  
@if ($message = Session::get('error'))
    <div class = "container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
   
@if ($message = Session::get('warning'))
    <div class = "container">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
   
@if ($message = Session::get('info'))
    <div class = "container">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
  
 
@if ($errors->any())
    <div class = "container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Some error occured, please check the error description</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif 
