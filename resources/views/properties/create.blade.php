@extends('layouts.app')

@section('content')

<h2 class='text-center'>物件入力ページ</h2>

<form action="{{ route('properties.store') }}" method="POST">
@csrf
  <div class='container'>
    <div class='row'>
    <table class='table table-borderd col-md-8 offset-3'>
        <tr>
            <div class='form-group'>
            <th>
               <label for='user_name'>情報入手者<br><span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>
            </th>
            <td>
                
                <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                @foreach($names as $name)
                <label class='btn btn-outline-secondary'>
                    <input type='radio' name='user_name' id='user_name' class="@error('user_name') is-invalid @enderror" value="{{ $name }}">{{ $name }}
                </label>
                @endforeach
                <label class='btn btn-outline-dark'>
                    <input type='radio' name='user_name' id='user_name' class="@error('user_name') is-invalid @enderror" value="なし">なし
                </label>
                    @error('user_name')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </div>
             
            </td>
            
        </tr>
        
        <tr>
            <div class='form-group'>
              <th>
                <label for ='status'>ステータス</label>
              </th>
            <td>
                <input type='radio' class="@error('status') is-invalid @enderror" name="status" value="なし"> なし
                <input type='radio' class="@error('status') is-invalid @enderror" name="status" value="要返答"> 要返答
                <input type='radio' class="@error('status') is-invalid @enderror" name="status" value="返答待ち"> 返答待ち
                <input type='radio' class="@error('status') is-invalid @enderror" name="status" value="値下待ち"> 値下待ち
                <input type='radio' class="@error('status') is-invalid @enderror" name="status" value="定期連絡"> 定期連絡
                <input type='radio' class="@error('status') is-invalid @enderror" name="status" value="見送り"> 見送り
                <input type='radio' class="@error('status') is-invalid @enderror" name="status" value="売止"> 売止<br>
                <input type='radio' class="@error('status') is-invalid @enderror" name="status" value="他決(契約前)"> 他決(契約前)
                <input type='radio' class="@error('status') is-invalid @enderror" name="status" value="他決(契約済)"> 他決(契約済)
                <input type='radio' class="@error('status') is-invalid @enderror" name="status" value="他決(決済済)"> 他決(決済済)
                @error('status')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                    
                @enderror
            </td>
            </div>
        </tr>

        <tr>
            <div class='form-group'>
            <th>
                <label for='property_name'>物件名<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>
            </th>
            <td>
                <input id='property_name' type='text' class="form-control @error('property_name') is-invalid @enderror" name='property_name' value="{{ old('property_name') }}" required autocomplete="property_name" autofocus>
                @error('property_name')
                    <div class='alert alert-danger'>{{ $message }}</div>
                @enderror
            </td>
            </div>
        </tr>

        <tr>
            <div class='form-group'>
                <th>
                    <label for='place'>所在地(住居表示)<br><span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>
                </th>
                <td>
                    <select id='place' name='prefecture'>
                        <option value='prefecture'>都道府県</option>
                        <option value='北海道'>北海道</option>
                        <option value='青森県'>青森県</option>
                        <option value='岩手県'>岩手県</option>
                        <option value='宮城県'>宮城県</option>
                        <option value='秋田県'>秋田県</option>
                        <option value='山形県'>山形県</option>
                        <option value='福島県'>福島県</option>
                        <option value='茨城県'>茨城県</option>
                        <option value='栃木県'>栃木県</option>
                        <option value='群馬県'>群馬県</option>
                        <option value='埼玉県'>埼玉県</option>
                        <option value='千葉県'>千葉県</option>
                        <option value='東京都'>東京都</option>
                        <option value='神奈川県'>神奈川県</option>
                        <option value='新潟県'>新潟県</option>
                        <option value='富山県'>富山県</option>
                        <option value='石川県'>石川県</option>
                        <option value='福井県'>福井県</option>
                        <option value='山梨県'>山梨県</option>
                        <option value='長野県'>長野県</option>
                        <option value='岐阜県'>岐阜県</option>
                        <option value='静岡県'>静岡県</option>
                        <option value='愛知県'>愛知県</option>
                        <option value='三重県'>三重県</option>
                        <option value='滋賀県'>滋賀県</option>
                        <option value='京都府'>京都府</option>
                        <option value='大阪府'>大阪府</option>
                        <option value='兵庫県'>兵庫県</option>
                        <option value='奈良県'>奈良県</option>
                        <option value='和歌山県'>和歌山県</option>
                        <option value='鳥取県'>鳥取県</option>
                        <option value='島根県'>島根県</option>
                        <option value='岡山県'>岡山県</option>
                        <option value='広島県'>広島県</option>
                        <option value='山口県'>山口県</option>
                        <option value='徳島県'>徳島県</option>
                        <option value='香川県'>香川県</option>
                        <option value='愛媛県'>愛媛県</option>
                        <option value='高知県'>高知県</option>
                        <option value='福岡県'>福岡県</option>
                        <option value='佐賀県'>佐賀県</option>
                        <option value='長崎県'>長崎県</option>
                        <option value='熊本県'>熊本県</option>
                        <option value='大分県'>大分県</option>
                        <option value='宮崎県'>宮崎県</option>
                        <option value='鹿児島県'>鹿児島県</option>
                        <option value='沖縄県'>沖縄県</option>
                    </select>
                    <input id='place' type='text' class="form-control @error('town') is-invalid @enderror" name='town' value="{{ old('town') }}" required autocomplete="town" autofocus>
                    @error('town')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror

                    <input id='place' type='text' class="form-control @error('house_number') is-invalid @enderror" name='house_number' value="{{ old('house_number') }}" required autocomplete="house_number" autofocus placeholder='番地'>
                    @error('house_number')
                        <div class='alert alert-danger'>{{ $message }}</div>
                    @enderror
                </td>
            </div>
        </tr>

        <tr>
            <div class='form-group input-group'>
              <th>
                <label for='price'>入手価格<br><span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>
              </th>
              <td>
                <div class='input-group-prepend'>
                <input id='price' type='text' class="@error('price') is-invalid @enderror" name='price' value="{{ old('price') }}" required autocomplete="price" autofocus aria-describedby="basic-addon1">
                <div class='input-group-append'>
                  <span class="input-group-text" id="basic-addon1">億</span>
                </div>
              </div>
                @error('price')
                  <div class='alert alert-danger'>{{ $message }}</div>
                @enderror
              </td>
            </div>
        </tr>

        <tr>
          <div class='form-group input-group'>
            <th>
              <label for='limit_price'>指値<span class='badge-pill badge-danger' style='margin:5px;'>必須 </label>
            </th>
            <td>
            <div class='input-group-prepend mb-3'>
              <input id='limit_price' type='text' class="@error('limit_price') is-invalid @enderror" name='limit_price' value="{{ old('limit_price') }}" required autocomplete="limit_price" autofocus aria-describedby="basic-addon2">
                
              <div class='input-group-append'>
                <span class="input-group-text" id='basic-addon2'>億</span>
              </div>
            </div>
                @error('limit_price')
                  <div class='alert alert-danger'>{{ $message }}</div>
                @enderror 
            </td>
          </div>
        </tr>

        <tr>
        <div class='form-group input-group'>
            <th>
              <label for='fulll_price'>満室想定賃料<br><span class='badge-pill badge-danger' style='margin:5px;'>必須 </label>
            </th>
            <td>
            <div class='input-group-prepend mb-3'>
              <input id='full_price' type='text' class="@error('full_price') is-invalid @enderror" name='full_price' value="{{ old('full_price') }}" required autocomplete="full_price" autofocus aria-describedby="basic-addon3">
              <div class='input-group-append'>  
              <span class='input-group-text' id='basic-addon3'>万</span>
            </div>
          </div>
                @error('full_price')
                  <div class='alert alert-danger'>{{ $message }}</div>
                @enderror 
            </td>
          </div>
        </tr>
          
        <tr>
            <div class='form-group'>
                <th>
                    <label for='age'>築年月<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>
                </th>
                <td>
                    <select id='age' name='build_year'>
                        <option value='age'>西暦/和暦</option>
                        <option value='1970'>1970年/昭和45年</option>
                        <option value='1971'>1971年/昭和46年</option>
                        <option value='1972'>1972年/昭和47年</option>
                        <option value='1973'>1973年/昭和48年</option>
                        <option value='1974'>1974年/昭和49年</option>
                        <option value='1975'>1975年/昭和50年</option>
                        <option value='1976'>1976年/昭和51年</option>
                        <option value='1977'>1977年/昭和52年</option>
                        <option value='1978'>1978年/昭和53年</option>
                        <option value='1979'>1979年/昭和54年</option>
                        <option value='1980'>1980年/昭和55年</option>
                        <option value='1981'>1981年/昭和56年</option>
                        <option value='1982'>1982年/昭和57年</option>
                        <option value='1983'>1983年/昭和58年</option>
                        <option value='1984'>1984年/昭和59年</option>
                        <option value='1985'>1985年/昭和60年</option>
                        <option value='1986'>1986年/昭和61年</option>
                        <option value='1987'>1987年/昭和62年</option>
                        <option value='1988'>1988年/昭和63年</option>
                        <option value='1989'>1989年/昭和64年</option>
                        <option value='1989'>1989年/平成1年</option>
                        <option value='1990'>1990年/平成2年</option>
                        <option value='1991'>1991年/平成3年</option>
                        <option value='1992'>1992年/平成4年</option>
                        <option value='1993'>1993年/平成5年</option>
                        <option value='1994'>1994年/平成6年</option>
                        <option value='1995'>1995年/平成7年</option>
                        <option value='1996'>1996年/平成8年</option>
                        <option value='1997'>1997年/平成9年</option>
                        <option value='1998'>1998年/平成10年</option>
                        <option value='1999'>1999年/平成11年</option>
                        <option value='2000'>2000年/平成12年</option>
                        <option value='2001'>2001年/平成13年</option>
                        <option value='2002'>2002年/平成14年</option>
                        <option value='2003'>2003年/平成15年</option>
                        <option value='2004'>2004年/平成16年</option>
                        <option value='2005'>2005年/平成17年</option>
                        <option value='2006'>2006年/平成18年</option>
                        <option value='2007'>2007年/平成19年</option>
                        <option value='2008'>2008年/平成20年</option>
                        <option value='2009'>2009年/平成21年</option>
                        <option value='2010'>2010年/平成22年</option>
                        <option value='2011'>2011年/平成23年</option>
                        <option value='2012'>2012年/平成24年</option>
                        <option value='2013'>2013年/平成25年</option>
                        <option value='2014'>2014年/平成26年</option>
                        <option value='2015'>2015年/平成27年</option>
                        <option value='2016'>2016年/平成28年</option>
                        <option value='2017'>2017年/平成29年</option>
                        <option value='2018'>2018年/平成30年</option>
                        <option value='2019'>2019年/平成31年</option>
                        <option value='2019'>2019年/令和1年</option>
                        <option value='2020'>2020年/令和2年</option>
                      </select>
                      @error('build_year')
                        <div class='alert alert-danger'>{{ $message }}</div>
                      @enderror
                      <select id='age' name='build_month'>
                        <option value='age'>月</option>
                        <option value='1月'>1月</option>
                        <option value='2月'>2月</option>
                        <option value='3月'>3月</option>
                        <option value='4月'>4月</option>
                        <option value='5月'>5月</option>
                        <option value='6月'>6月</option>
                        <option value='7月'>7月</option>
                        <option value='8月'>8月</option>
                        <option value='9月'>9月</option>
                        <option value='10月'>10月</option>
                        <option value='11月'>11月</option>
                        <option value='12月'>12月</option>
                      </select>
                      @error('build_month')
                        <div class='alert alert-danger'>{{ $message }}</div>
                      @enderror
                </td>

                <tr>
                  <div class='form-group'>
                    <th>
                      <label for='structure'>構造<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>
                    </th>
                    <td>
                      <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                        <label class='btn btn-outline-secondary'>
                          <input type='radio' name='structure' id='structure' class="@error('structure') is-invalid @enderror" value='不明'>不明
                        </label>
                        <label class='btn btn-outline-secondary'>
                          <input type='radio' name='structure' id='structure' class="@error('structure') is-invalid @enderror" value='RC'>RC
                        </label>
                        <label class='btn btn-outline-secondary'>
                          <input type='radio' name='structure' id='structure' class="@error('structure') is-invalid @enderror" value='鉄骨'>鉄骨
                        </label>
                        <label class='btn btn-outline-secondary'>
                          <input type='radio' name='structure' id='structure' class="@error('structure') is-invalid @enderror" value='軽鉄'>軽鉄
                        </label>
                        <label class='btn btn-outline-secondary'>
                          <input type='radio' name='structure' id='structure' class="@error('structure') is-invalid @enderror" value='木造'>木造
                        </label>
                        <label class='btn btn-outline-secondary'>
                          <input type='radio' name='structure' id='structure' class="@error('structure') is-invalid @enderror" value='土地'>土地
                        </label>
                        @error('structure')
                            <div class='alert alert-danger'>{{ $message }}</div>
                        @enderror
                     </div>
                    </td>
                  </div>
                </tr>
      </table>          
                  
                      <button type='submit' class='btn btn-primary btn-block'>登録する</button>
                    
                
    </div>                
  </div>
</form>

@endsection
