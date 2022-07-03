<nav class="navbar navbar-light navbar-expand-lg py-3 shadow-sm bg-light">
    <div class="container">
        <a class="navbar-brand text-black fw-bold" href="#">
            SD SEA Kantin
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link {{(isset($title) && $title === 'Home') ? 'active' : ''}}" href="/home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{(isset($title) && $title === 'Browse Items') ? 'active' : ''}}" href="/items">Browse Items</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @guest
                    <li class="nav-item pe-3">
                        <a class="nav-link {{(isset($title) && $title === 'Login') ? 'active' : ''}}" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="btn btn-primary" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown pe-3">
                        <a id="navbarDropdown-2" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Balance: Rp {{number_format(App\Models\Canteen::first()->balance, 0, ',', '.')}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown-2">
                            <a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#addBalance">Add balance</a>
                            <a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#wthBalance">Withdraw balance</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/my-items">
                                My items
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <div class="modal fade" id="addBalance" tabindex="-1" role="dialog" aria-labelledby="addBalanceLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="addBalanceLabel">Add balance</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/addBalance" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-2">Current balance: Rp {{number_format(App\Models\Canteen::first()->balance, 0, ',', '.')}}</div>
                                    <div class="form-group mb-3">
                                        <label for="addAmount" class="mb-1">Amount</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input id="addAmount" class="form-control @error('addAmount') is-invalid @enderror" type="number" name="amount" min="1" placeholder="Enter your amount" aria-label="Rupiah" required>
                                        </div>
                                        @error('addAmount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" onclick="">Add</button>
                                </div>
                            </form>
                          </div>
                        </div>
                    </div>
                    <div class="modal fade" id="wthBalance" tabindex="-1" role="dialog" aria-labelledby="wthBalanceLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="wthBalanceLabel">Withdraw balance</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form action="/wthBalance" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div>Current balance: Rp {{number_format(App\Models\Canteen::first()->balance, 0, ',', '.')}}</div>
                                    <div class="form-group mb-3">
                                        <label for="wthBalance" class="mb-1">Amount</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input id="wthAmount" class="form-control @error('wthAmount') is-invalid @enderror" type="number" name="amount" min="1" max="{{App\Models\Canteen::first()->balance}}" placeholder="Enter your amount" aria-label="Rupiah" required {{(App\Models\Canteen::first()->balance <= 0) ? 'disabled' : ''}}>
                                        </div>
                                        @error('wthAmount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @if(App\Models\Canteen::first()->balance <= 0)
                                            <div class="mt-2">
                                                <strong class="text-danger">Canteen money is empty!</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" {{(App\Models\Canteen::first()->balance <= 0) ? 'disabled' : ''}}>Withdraw</button>
                                </div>
                            </form>
                          </div>
                        </div>
                    </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>