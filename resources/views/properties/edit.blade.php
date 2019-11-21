@extends('layouts.app')

@section('content')


@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors -> all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2 class='text-center'>物件編集ページ</h2>
{!! Form::model($property,['route' => ['properties.update', $property->id],'method'=>'put']) !!}


@csrf
  <div class='container'>
    <div class='row'>
    <table class='table table-borderd col-md-8 offset-3'>
        <tr>
            <div class='form-group'>
            <th>
            {!! Form::label('user_name', '情報入手者') !!}<span class=" badge-pill badge-danger" style='margin:5px;'>必須 </span>
            </th>
            
            <td>
            <div class='btn-group btn-group-toggle' data-toggle='buttons'>
            @foreach($names as $name)
                <label class='btn btn-outline-secondary'>
                    {!! Form::radio('user_name',old('user_name'), ['value'=> $name ]) !!}{{$name}}
                </label>
           @endforeach
                <label class='btn btn-outline-dark'>
                    {!! Form::radio('user_name',old('user_name'), ['value'=>"なし"]) !!}なし
                </label>
                   
                </div>
            @error('user_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </td>
            
        </tr>
        
        <tr>
            <div class='form-group'>
              <th>
                {!! Form::label('status','ステータス') !!}
              </th>
            <td>
                
                {!! Form::radio('status','なし',old('status')) !!}なし
                
                {!! Form::radio('status','要返答',old('status')) !!}要返答


                {!! Form::radio('status','返答待ち',old('status')) !!}返答待ち

                {!! Form::radio('status','値下待ち',old('status')) !!}値下待ち
    

                {!! Form::radio('status','定期連絡',old('status')) !!}定期連絡
    

                {!! Form::radio('status','見送り',old('status')) !!}見送り


                {!! Form::radio('status','売止',old('status')) !!}売止

                {!! Form::radio('status','他決(契約前)' ,old('status')) !!}他決(契約前)<br>
                

                {!! Form::radio('status','他決(契約済)',old('status')) !!}他決(契約済)
                

                {!! Form::radio('status','他決(決済済)',old('status')) !!}他決(決済済)
                

                {!! Form::radio('status','売止',old('status')) !!}売止
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
            </div>
        </tr>

        <tr>
            <div class='form-group'>
            <th>
                {!! Form::label('property_name', '物件名') !!}<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span>
           
            </th>
            <td>
            {!! Form::text('property_name',old('property_name'), ['class'=>"form-control"]) !!}
            @error('property_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </td>
            </div>
        </tr>

        <tr>
            <div class='form-group'>
                <th>
                    {!! Form::label('prefecture', '所在地(住居表示)') !!}<br><span class='badge-pill badge-danger' style='margin:5px;'>必須 </span>
                    
                </th>
                <td>{!! Form::select('prefecture',["選択してください","北海道"=>"北海道","青森県"=>"青森県","岩手県"=>"岩手県","宮城県"=>"宮城県","秋田県"=>"秋田県",
                "山形県"=>"山形県","福島県"=>"福島県","茨城県"=>"茨城県","栃木県"=>"栃木県","群馬県"=>"群馬県","埼玉県"=>"埼玉県","千葉県"=>"千葉県","東京都"=>"東京都",
                "神奈川県"=>"神奈川県","新潟県"=>"新潟県","富山県"=>"富山県","石川県"=>"石川県","福井県"=>"福井県","山梨県"=>"山梨県","長野県"=>"長野県",
                "岐阜県"=>"岐阜県","静岡県"=>"静岡県","愛知県"=>"愛知県","三重県"=>"三重県","滋賀県"=>"滋賀県","京都府"=>"京都府","大阪府"=>"大阪府",
                "兵庫県"=>"兵庫県","奈良県"=>"奈良県","和歌山県"=>"和歌山県","鳥取県"=>"鳥取県",
                "島根県"=>"島根県","広島県"=>"広島県","岡山県"=>"岡山県","山口県"=>"山口県","徳島県"=>"徳島県","香川県"=>"香川県","愛媛県"=>"愛媛県",
                "高知県"=>"高知県","福岡県"=>"福岡県","佐賀県"=>"佐賀県","長崎県"=>"長崎県","熊本県"=>"熊本県","大分県"=>"大分県","宮崎県"=>"宮崎県",
                "鹿児島県"=>"鹿児島県","沖縄県"=>"沖縄県"], old('prefecture'), ['class' => "select"]) !!}
                @error('prefecture')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                 
                {!! Form::text('town',old('town'),['class'=>"form-control"]) !!}
                @error('town')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                {!! Form::text('house_number',old('house_number'),['class'=>"form-control"]) !!}
                @error('house_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </td>
            </div>
        </tr>

        <tr>
            <div class='form-group input-group'>
              <th>
              {!! Form::label('price', '入手価格') !!}<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span>
              </th>
              <td>
                <div class='input-group-prepend mb-3'>
                    {!! Form::text('price',old('price'),['aria-describedby'=>"basic-addon1"]) !!}
                
                <div class='input-group-append'>
                  <span class="input-group-text" id="basic-addon1">億</span>
                </div>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
                
              </td>
            </div>
        </tr>

        <tr>
          <div class='form-group input-group'>
            <th>
            {!! Form::label('limit_price', '指値') !!}<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span>
            </th>
            <td>
            <div class='input-group-prepend mb-3'>
              {!! Form::text('limit_price',old('limit_price'),['aria-describedby'=>"basic-addon2"]) !!}
                
              <div class='input-group-append'>
                <span class="input-group-text" id='basic-addon2'>億</span>
             </div>
                @error('limit_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror     
            </td>
          </div>
        </tr>

        <tr>
        <div class='form-group input-group'>
            <th>
            {!! Form::label('full_price', '満室想定賃料') !!}<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span>
            </th>
            <td>
            <div class='input-group-prepend mb-3'>
                {!! Form::text('full_price',old('full_price'),['aria-describedby'=>"basic-addon3"]) !!}
              <div class='input-group-append'>  
               <span class='input-group-text' id='basic-addon3'>万</span>
              </div>
                @error('full_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
          </div>
        </tr>
          
        <tr>
            <div class='form-group'>
                <th>
                {!! Form::label('build_year', '築年月') !!}<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>
                </th>
                <td>{!! Form::select('build_year',["西暦/和暦","1970"=>"1970年/昭和45年","1971"=>"1971年/昭和46年","1972"=>"1972年/昭和47年","1973"=>"1973年/昭和48年",
                    "1974"=>"1974年/昭和49年","1975"=>"1975年/昭和50年","1976"=>"1976年/昭和51年","1977"=>"1977年/昭和52年","1978"=>"1978年/昭和53年","1979"=>"1979年/昭和54年",
                    "1980"=>"1980年/昭和55年","1981"=>"1981年/昭和56年","1982"=>"1982年/昭和57年","1983"=>"1983年/昭和58年","1984"=>"1984年/昭和59年","1985"=>"1985年/昭和60年",
                    "1986"=>"1986年/昭和61年","1987"=>"1987年/昭和62年","1988"=>"1988年/昭和63年","1989"=>"1989年/昭和64年","1989"=>"1989年/平成1年","1990"=>"1990年/平成2年",
                    "1991"=>"1991年/平成3年","1992"=>"1992年/平成4年","1993"=>"1993年/平成5年","1994"=>"1994年/平成6年","1995"=>"1995年/平成7年","1996"=>"1996年/平成8年",
                    "1997"=>"1997年/平成9年","1998"=>"1998年/平成10年","1999"=>"1999年/平成11年","2000"=>"2000年/平成12年","2001"=>"2001年/平成13年","2002"=>"2002年/平成14年",
                    "2003"=>"2003年/平成15年","2004"=>"2004年/平成16年","2005"=>"2005年/平成17年","2006"=>"2006年/平成18年","2007"=>"2007年/平成19年","2008"=>"2008年/平成20年",
                    "2009"=>"2009年/平成21年","2010"=>"2010年/平成22年","2011"=>"2011年/平成23年","2012"=>"2012年/平成24年","2013"=>"2013年/平成25年","2014"=>"2014年/平成26年",
                    "2015"=>"2015年/平成27年","2016"=>"2016年/平成28年","2017"=>"2017年/平成29年","2018"=>"2018年/平成30年","2019"=>"2019年/平成31年","2019"=>"2019年/令和1年","2020"=>"2020年/令和2年"],
                    old('build_year'),['class'=>"select"]) !!}
                   
                    
                     
                      {!! Form::select('build_month',["月","1月"=>"1月","2月"=>"2月","3月"=>"3月","4月"=>"4月","5月"=>"5月","6月"=>"6月","7月"=>"7月","8月"=>"8月","9月"=>"9月","10月"=>"10月",
                        "11月"=>"11月","12月"=>"12月"],old('build_month'),['class'=>"select"]) !!}
                    @error('build_year')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('build_month')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                </td>

                <tr>
                  <div class='form-group'>
                    <th>
                      {!! Form::label('structure','構造') !!}<span class='badge-pill badge-danger' style='margin:5px;'>必須 </span></label>
                    </th>
                    <td>
                      <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                            <label class='btn btn-outline-secondary'>
                                {!! Form::radio('structure',old('structure'), ['value'=>'RC']) !!}RC
                            </label>
                            <label class='btn btn-outline-secondary'> 
                                {!! Form::radio('structure',old('structure'), ['value'=>'不明']) !!}不明
                            </label>
                            <label class='btn btn-outline-secondary'>
                                {!! Form::radio('structure',old('structure'), ['value'=>'鉄骨']) !!}鉄骨
                            </label>
                            <label class='btn btn-outline-secondary'>
                                {!! Form::radio('structure',old('structure'), ['value'=>'軽鉄']) !!}軽鉄
                            </label>
                            <label class='btn btn-outline-secondary'>
                                {!! Form::radio('structure',old('structure'), ['value'=>'木造']) !!}木造
                            </label>
                            <label class='btn btn-outline-secondary'>
                                {!! Form::radio('structure',old('structure'), ['value'=>'土地']) !!}土地
                            </label>
                            
                     </div>
                        @error('structure')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                  </div>
                </tr>
      </table>          
                    {!! Form::submit('変更する',['class'=>'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
                    
                
    </div>                
  </div>
</form>

@endsection
