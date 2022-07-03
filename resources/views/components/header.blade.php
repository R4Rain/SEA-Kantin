<div>
    <div
      class="text-center bg-image"
      style="
        background-image: url('images/background1.jpg');
        height: 500px;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;"
     >
      <div class="mask" style="
        background-color: rgba(0, 0, 0, 0.6);
        height: 100%;"
       >
        <div class="d-flex justify-content-center align-items-center h-100">
          <div class="text-white mx-1">
            <h1 class="mb-2 w-auto fw-bold">Welcome to Kantin Kejujuran!</h1>
            <h5 class="w-auto mb-5">Place for student to buy and sell items</h5>
            @guest
              <a href="/register" class="btn btn-primary">Get started</a>
            @endguest
          </div>
        </div>
      </div>
    </div>
</div>