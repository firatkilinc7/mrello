<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Log In / Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css"
    />
    <link rel="stylesheet" href="{{asset("assets/front/css/login.css")}}" />
  </head>
  <body>
    <div class="section">
      <div class="container">
        <div class="row full-height justify-content-center">
          <div class="col-12 text-center align-self-center py-5">
            <div class="section pb-5 pt-5 pt-sm-2 text-center">
              <h6 class="mb-0 pb-3">
                <span>Log In </span><span>Sign Up</span>
              </h6>
              <input
                class="checkbox"
                type="checkbox"
                id="reg-log"
                name="reg-log"
              />
              <label for="reg-log"></label>
              <div class="card-3d-wrap mx-auto">
                <div class="card-3d-wrapper">
                  <div class="card-front">
                    <div class="center-wrap">
                      <div class="section text-center">
                        <h4 class="mb-4 pb-3">Log In</h4>
                          <form action="{{url('login/do-login')}}" method="post" id="login-form">
                                <div class="form-group">
                                  <input
                                    type="email"
                                    name="email"
                                    class="form-style"
                                    placeholder="Your Email"
                                    autocomplete="off"
                                  />
                                  <i class="input-icon uil uil-at"></i>
                                </div>
                                <div class="form-group mt-2">
                                  <input
                                    type="password"
                                    name="password"
                                    class="form-style"
                                    placeholder="Your Password"
                                    autocomplete="off"
                                  />
                                  <i class="input-icon uil uil-lock-alt"></i>
                                </div>
                              @if($errors)
                                  @foreach($errors->all() as $error)
                                      <small class="pull-right input-form-error"> {{$error}}</small><p></p>
                                  @endforeach
                              @endif
                                @csrf
                                <a href="#" class="btn mt-4" onclick="document.getElementById('login-form').submit()" >Submit</a>
                          </form>
                        <p class="mb-0 mt-4 text-center">
                          <a href="#0" class="link">Forgot your password?</a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="card-back">
                    <div class="center-wrap">
                      <div class="section text-center">
                        <h4 class="mb-4 pb-3">Sign Up</h4>
                          <form action="{{url('register/do-register')}}" method="post" id="register-form">
                            <div class="form-group mt-2">
                              <input
                                type="email"
                                name="email"
                                class="form-style"
                                placeholder="Your Email"
                                autocomplete="off"
                              />
                              <i class="input-icon uil uil-at"></i>
                            </div>
                            <div class="form-group mt-2">
                              <input
                                  type="text"
                                  name="fullname"
                                  class="form-style"
                                  placeholder="Full Name"
                                  autocomplete="off"
                              />
                              <i class="input-icon uil uil-user"></i>
                            </div>
                            <div class="form-group mt-2">
                              <input
                                  type="text"
                                  name="username"
                                  class="form-style"
                                  placeholder="Username"
                                  autocomplete="off"
                              />
                              <i class="input-icon uil uil-user-circle"></i>
                            </div>
                            <div class="form-group mt-2">
                              <input
                                type="password"
                                name="password"
                                class="form-style"
                                placeholder="Your Password"
                                autocomplete="off"
                              />
                              <i class="input-icon uil uil-lock-alt"></i>
                            </div>
                              @if($errors)
                                  @foreach($errors->all() as $error)
                                      <small class="pull-right input-form-error"> {{$error}}</small><p></p>
                                  @endforeach
                              @endif
                            @csrf
                            <a href="#" class="btn mt-4" onclick="document.getElementById('register-form').submit()">Submit</a>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>

