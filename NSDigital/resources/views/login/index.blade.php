@extends('layouts.login.layout')

@section('content')
  <div class="album text-muted">
    <div class="container">
      <div class="row">
        <div class="ml-auto mr-auto col-12 col-md-8 col-lg-4">
          <form class="">
            <div class="card-login card-plain card">

              <div class="card-header">
                <div class="logo-container">
                  <h3>NS Digital</h3>
                </div>
              </div>

              <div class="card-body">
                <div class="no-border form-control-lg input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-user-circle"></i>
                    </span>
                  </div>
                  <input placeholder="Usuário" name="user" type="text" class="form-control" />
                </div>
                <div class="no-border form-control-lg  input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input placeholder="Senha" name="password" type="password" class="form-control" />
                </div>
              </div>
              
              <div class="card-footer">
                <a href="#" class="btn btn-primary btn-lg btn-block">
                  Login
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
