@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info" style='color:white;'>新入社員登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype='multipart/form-data'>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ふりがな<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>

                            <div class="col-md-6">
                                <input id="how_to_read" type="text" class="form-control @error('how_to_read') is-invalid @enderror" name="how_to_read" value="{{ old('how_to_read') }}" required autocomplete="how_to_read" autofocus>

                                @error('how_to_read')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">BCアドレス<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <small text="muted">*ログイン用メールアドレスになります。</small>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gmail" class="col-md-4 col-form-label text-md-right">Gmailアドレス<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>

                            <div class="col-md-6">
                                <input id="gmail" type="gmail" class="form-control @error('gmail') is-invalid @enderror" name="gmail" value="{{ old('gmail') }}" required autocomplete="gmail">
                                
                                @error('gmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">携帯電話<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no" autofocus>
                                <small text='muted'>*ハイフン(-)なしで入力してください。</small>
                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="depart" class="col-md-4 col-form-label text-md-right">部署<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>

                            <div class="col-md-6">
                                <input type='radio' class="@error('depart') is-invalid @enderror" name="depart" value="{{ old('depart') }}" required autocomplete="depart" autofocus value="代表取締役"> 代表取締役
                                <input type='radio' class="@error('depart') is-invalid @enderror" name="depart" value="{{ old('depart') }}" required autocomplete="depart" autofocus value='不動産投資営業部'> 不動産投資営業部<br>
                                <input type='radio' class="@error('depart') is-invalid @enderror" name="depart" value="{{ old('depart') }}" required autocomplete="depart" autofocus value='システム開発部'> システム開発部
                                <input type='radio' class="@error('depart') is-invalid @enderror" name="depart" value="{{ old('depart') }}" required autocomplete="depart" autofocus value='不動産経営戦略部'> 不動産経営戦略部<br>
                                <input type='radio' class="@error('depart') is-invalid @enderror" name="depart" value="{{ old('depart') }}" required autocomplete="depart" autofocus value='不動産営業戦略部'> 不動産営業戦略部
                                <input type='radio' class="@error('depart') is-invalid @enderror" name="depart" value="{{ old('depart') }}" required autocomplete="depart" autofocus value='経営企画室'> 経営企画室
                                

                                @error('depart')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="post" class="col-md-4 col-form-label text-md-right">役職<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>

                            <div class="col-md-6">
                                <input id="post" type="text" class="form-control @error('post') is-invalid @enderror" name="post" value="{{ old('post') }}" required autocomplete="post" autofocus>

                                @error('post')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file_name" class="col-md-4 col-form-label text-md-right">プロフィール写真</label>

                            <div class="col-md-6">
                                <input id="file_name" type="file" class="@error('post') is-invalid @enderror" name="file_name" autofocus>

                                @error('file_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <small text="muted">*8文字以上</small>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード確認<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    登録する
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
