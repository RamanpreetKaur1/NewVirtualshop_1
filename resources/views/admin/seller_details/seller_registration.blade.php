<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register</title>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 <!-- Bootstrap Css -->
 <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
 <!-- Icons Css -->
 <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
 <!-- App Css-->
 <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    }

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button {
        background-color: #04AA6D;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #04AA6D;
    }

    /* seller's plan */
            @import url(https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,700,900italic,900);
@import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);
@import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);
body{background-color:#eee;}

#generic_price_table{
  background-color: #f0eded;
}

/*PRICE COLOR CODE START*/
#generic_price_table .generic_content{
  background-color: #fff;
}

#generic_price_table .generic_content .generic_head_price{
  background-color: #f6f6f6;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg{
  border-color: #e4e4e4 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #e4e4e4;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head span{
  color: #525252;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign{
    color: #414141;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency{
    color: #414141;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent{
    color: #414141;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .month{
    color: #414141;
}

#generic_price_table .generic_content .generic_feature_list ul li{
  color: #a7a7a7;
}

#generic_price_table .generic_content .generic_feature_list ul li span{
  color: #414141;
}
#generic_price_table .generic_content .generic_feature_list ul li:hover{
  background-color: #E4E4E4;
  border-left: 5px solid #2ECC71;
}

#generic_price_table .generic_content .generic_price_btn a{
  border: 1px solid #2ECC71;
    color: #2ECC71;
}

#generic_price_table .generic_content.active .generic_head_price .generic_head_content .head_bg,
#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg{
  border-color: #2ECC71 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #2ECC71;
  color: #fff;
}

#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head span,
#generic_price_table .generic_content.active .generic_head_price .generic_head_content .head span{
  color: #fff;
}

#generic_price_table .generic_content:hover .generic_price_btn a,
#generic_price_table .generic_content.active .generic_price_btn a{
  background-color: #2ECC71;
  color: #fff;
}
#generic_price_table{
  margin: 50px 0 50px 0;
    font-family: 'Raleway', sans-serif;
}
.row .table{
    padding: 28px 0;
}

/*PRICE BODY CODE START*/

#generic_price_table .generic_content{
  overflow: hidden;
  position: relative;
  text-align: center;
}

#generic_price_table .generic_content .generic_head_price {
  margin: 0 0 20px 0;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content{
  margin: 0 0 50px 0;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg{
    border-style: solid;
    border-width: 90px 1411px 23px 399px;
  position: absolute;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head{
  padding-top: 40px;
  position: relative;
  z-index: 1;
}

#generic_price_table .generic_content .generic_head_price .generic_head_content .head span{
    font-family: "Raleway",sans-serif;
    font-size: 28px;
    font-weight: 400;
    letter-spacing: 2px;
    margin: 0;
    padding: 0;
    text-transform: uppercase;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag{
  padding: 0 0 20px;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price{
  display: block;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign{
    display: inline-block;
    font-family: "Lato",sans-serif;
    font-size: 28px;
    font-weight: 400;
    vertical-align: middle;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency{
    font-family: "Lato",sans-serif;
    font-size: 50px;
    font-weight: 300;
    letter-spacing: -2px;
    line-height: 60px;
    padding: 0;
    vertical-align: middle;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent{
    display: inline-block;
    font-family: "Lato",sans-serif;
    font-size: 24px;
    font-weight: 400;
    vertical-align: bottom;
}

#generic_price_table .generic_content .generic_head_price .generic_price_tag .month{
    font-family: "Lato",sans-serif;
    font-size: 18px;
    font-weight: 400;
    letter-spacing: 3px;
    vertical-align: bottom;
}

#generic_price_table .generic_content .generic_feature_list ul{
  list-style: none;
  padding: 0;
  margin: 0;
}

#generic_price_table .generic_content .generic_feature_list ul li{
  font-family: "Lato",sans-serif;
  font-size: 18px;
  padding: 15px 0;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table .generic_content .generic_feature_list ul li:hover{
  transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  -ms-transition: all 0.3s ease-in-out 0s;
  -o-transition: all 0.3s ease-in-out 0s;
  -webkit-transition: all 0.3s ease-in-out 0s;

}
#generic_price_table .generic_content .generic_feature_list ul li .fa{
  padding: 0 10px;
}
#generic_price_table .generic_content .generic_price_btn{
  margin: 20px 0 32px;
}

#generic_price_table .generic_content .generic_price_btn a{
    border-radius: 50px;
  -moz-border-radius: 50px;
  -ms-border-radius: 50px;
  -o-border-radius: 50px;
  -webkit-border-radius: 50px;
    display: inline-block;
    font-family: "Lato",sans-serif;
    font-size: 18px;
    outline: medium none;
    padding: 12px 30px;
    text-decoration: none;
    text-transform: uppercase;
}

#generic_price_table .generic_content,
#generic_price_table .generic_content:hover,
#generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg,
#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg,
#generic_price_table .generic_content .generic_head_price .generic_head_content .head h2,
#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head h2,
#generic_price_table .generic_content .price,
#generic_price_table .generic_content:hover .price,
#generic_price_table .generic_content .generic_price_btn a,
#generic_price_table .generic_content:hover .generic_price_btn a{
  transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  -ms-transition: all 0.3s ease-in-out 0s;
  -o-transition: all 0.3s ease-in-out 0s;
  -webkit-transition: all 0.3s ease-in-out 0s;
}
@media (max-width: 320px) {
}

@media (max-width: 767px) {
  #generic_price_table .generic_content{
    margin-bottom:75px;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  #generic_price_table .col-md-3{
    float:left;
    width:50%;
  }

  #generic_price_table .col-md-4{
    float:left;
    width:50%;
  }

  #generic_price_table .generic_content{
    margin-bottom:75px;
  }
}
@media (min-width: 992px) and (max-width: 1199px) {
}
@media (min-width: 1200px) {
}
#generic_price_table_home{
   font-family: 'Raleway', sans-serif;
}

.text-center h1,
.text-center h1 a{
  color: #7885CB;
  font-size: 30px;
  font-weight: 300;
  text-decoration: none;
}
.demo-pic{
  margin: 0 auto;
}
.demo-pic:hover{
  opacity: 0.7;
}

#generic_price_table_home ul{
  margin: 0 auto;
  padding: 0;
  list-style: none;
  display: table;
}
#generic_price_table_home li{
  float: left;
}
#generic_price_table_home li + li{
  margin-left: 10px;
  padding-bottom: 10px;
}
#generic_price_table_home li a{
  display: block;
  width: 50px;
  height: 50px;
  font-size: 0px;
}
#generic_price_table_home .blue{
  background: #3498DB;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .emerald{
  background: #2ECC71;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .grey{
  background: #7F8C8D;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .midnight{
  background: #34495E;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .orange{
  background: #E67E22;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .purple{
  background: #9B59B6;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .red{
  background: #E74C3C;
  transition:all 0.3s ease-in-out 0s;
}
#generic_price_table_home .turquoise{
  background: #1ABC9C;
  transition: all 0.3s ease-in-out 0s;
}

#generic_price_table_home .blue:hover,
#generic_price_table_home .emerald:hover,
#generic_price_table_home .grey:hover,
#generic_price_table_home .midnight:hover,
#generic_price_table_home .orange:hover,
#generic_price_table_home .purple:hover,
#generic_price_table_home .red:hover,
#generic_price_table_home .turquoise:hover{
  border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
  transition: all 0.3s ease-in-out 0s;
}
#generic_price_table_home .divider{
  border-bottom: 1px solid #ddd;
  margin-bottom: 20px;
  padding: 20px;
}
#generic_price_table_home .divider span{
  width: 100%;
  display: table;
  height: 2px;
  background: #ddd;
  margin: 50px auto;
  line-height: 2px;
}
#generic_price_table_home .itemname{
  text-align: center;
  font-size: 50px ;
  padding: 50px 0 20px ;
  border-bottom: 1px solid #ddd;
  margin-bottom: 40px;
  text-decoration: none;
    font-weight: 300;
}
#generic_price_table_home .itemnametext{
    text-align: center;
    font-size: 20px;
    padding-top: 5px;
    text-transform: uppercase;
    display: inline-block;
}
#generic_price_table_home .footer{
  padding:40px 0;
}

.price-heading{
    text-align: center;
}
.price-heading h1{
  color: #666;
  margin: 0;
  padding: 0 0 50px 0;
}
.demo-button {
    background-color: #333333;
    color: #ffffff;
    display: table;
    font-size: 20px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
    margin-bottom: 50px;
    outline-color: -moz-use-text-color;
    outline-style: none;
    outline-width: medium ;
    padding: 10px;
    text-align: center;
    text-transform: uppercase;
}
.bottom_btn{
  background-color: #333333;
    color: #ffffff;
    display: table;
    font-size: 28px;
    margin: 60px auto 20px;
    padding: 10px 25px;
    text-align: center;
    text-transform: uppercase;
}
.demo-button:hover{
  background-color: #666;
  color: #FFF;
  text-decoration:none;

}
.bottom_btn:hover{
  background-color: #666;
  color: #FFF;
  text-decoration:none;
}

</style>

<body>

    <div class="row">
        <div class="col-12">
            <form  id="regForm" method="POST" action="{{ route('seller-registration') }}" enctype="multipart/form-data">
                @csrf


                <h1>Register:</h1>
                <!-- One "tab" for each step in the form: -->
                <div class="tab">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input id="name"  type="text" name="seller_name" class="form-control" placeholder="Enter Name"  value="{{ old('seller_name') }}">

                                @if ($errors->has('seller_name'))
                                 <span class="text-danger">*{{ $errors->first('seller_name') }}</span>
                                 @endif

                            </div>
                            <div class="mb-3">
                                <label for="seller_mobile">Mobile</label>
                                <input id="seller_mobile" type="text" name="seller_mobile" class="form-control" placeholder="Enter Mobile" value="{{ old('seller_mobile') }}">
                                @if ($errors->has('seller_mobile'))
                                <span class="text-danger">*{{ $errors->first('seller_mobile') }}</span>
                                @endif

                            </div>
                            <div class="mb-3">
                                <label for="seller_email">Email</label>
                                <input id="seller_email" type="email" name="seller_email" class="form-control" placeholder="Enter Email" autocomplete="off" value="{{ old('seller_email') }}">

                                @if ($errors->has('seller_email'))
                                <span class="text-danger">*{{ $errors->first('seller_email') }}</span>
                                @endif

                            </div>
                            <div class="mb-3">
                                <label for="seller_password">Password</label>
                                <input id="seller_password"  type="password" name="seller_password" class="form-control" placeholder="Enter Password" autocomplete="off" value="{{ old('seller_password') }}">


                                @if ($errors->has('seller_password'))
                                <span class="text-danger">*{{ $errors->first('seller_password') }}</span>
                                @endif

                            </div>

                            <div class="mb-3">
                                <label for="seller_image" class="form-label">Image </label>
                                <input type="file" class="form-control" id="seller_image"
                                    name="seller_image" value="{{ old('seller_image') }}">

                                    @if ($errors->has('seller_image'))
                                    <span class="text-danger">*{{ $errors->first('seller_image') }}</span>
                                    @endif

                                </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="seller_city">City</label>
                                <input id="seller_city" type="text" name="seller_city" class="form-control" placeholder="Enter City" value="{{ old('seller_city') }}">
                                @if ($errors->has('seller_city'))
                                <span class="text-danger">*{{ $errors->first('seller_city') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="seller_state">State</label>
                                <input id="state"  type="text" name="seller_state" class="form-control" placeholder="Enter State" value="{{ old('seller_state') }}">

                                @if ($errors->has('seller_state'))
                                <span class="text-danger">*{{ $errors->first('seller_state') }}</span>
                                @endif

                            </div>

                            <div class="mb-3">
                                <label for="seller_country" class="form-label"> Country</label>

                                    <select name="seller_country" id="seller_country" class="form-select">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country )
                                            <option value="{{ $country['country_name'] }}" >{{ $country['country_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('seller_country'))
                                    <span class="text-danger">*{{ $errors->first('seller_country') }}</span>
                                    @endif

                            </div>

                            <div class="mb-3">
                                <label for="seller_pincode">Pincode</label>
                                <input id="pincode"  type="text" name="seller_pincode" class="form-control"  placeholder="Enter Pincode" value="{{ old('seller_pincode') }}">

                                @if ($errors->has('seller_pincode'))
                                <span class="text-danger">*{{ $errors->first('seller_pincode') }}</span>
                                @endif

                            </div>

                            <div class="mb-3">
                                <label for="seller_address">Address</label>
                                <textarea class="form-control" id="address" name="seller_address" rows="3"  placeholder="Enter Address">{{ old('seller_address') }}</textarea>

                                @if ($errors->has('seller_address'))
                                <span class="text-danger">*{{ $errors->first('seller_address') }}</span>
                                @endif

                            </div>

                        </div>
                        <hr>

                        <h4 class="card-title">Shop Information</h4>
                        <p class="card-title-desc">Fill all information below</p>


                        <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="shop_name" class="form-label">Shop Name</label>
                            <input type="text" class="form-control" id="shop_name" placeholder="Enter Shop name"
                                name="shop_name" value="{{ old('shop_name') }}">
                                @if ($errors->has('shop_name'))
                                <span class="text-danger">*{{ $errors->first('shop_name') }}</span>
                                @endif

                        </div>
                        <div class="mb-3">
                            <label for="shop_mobile" class="form-label">Shop Mobile</label>
                            <input type="text" class="form-control" maxlength="10"
                                minlength="10" id="shop_mobile" name="shop_mobile"
                                placeholder="Enter shop Mobile" value="{{ old('shop_mobile') }}">

                                @if ($errors->has('shop_mobile'))
                                <span class="text-danger">*{{ $errors->first('shop_mobile') }}</span>
                                @endif

                        </div>

                        <div class="mb-3">
                            <label for="shop_category" class="form-label">Select Shop Category</label>
                            <select name="shop_category" id="shop_category" class="form-select">
                                <option value="">select</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['category_name'] }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('shop_category'))
                            <span class="text-danger">*{{ $errors->first('shop_category') }}</span>
                            @endif

                        </div>

                        <div class="mb-3">
                            <label for="address_proof" class="form-label">Address Proof</label>
                            <select class="form-select" name="address_proof" id="address_proof">
                                <option value="">select</option>
                                <option value="Passport"  {{old('address_proof') == 'Passport' ? "selected" : ''}}     >Passport</option>
                                <option value="Voting Card"   {{old('address_proof') == 'Voting Card' ? "selected" : ''}}     >Voting Card</option>
                                <option value="PAN"            {{old('address_proof') == 'PAN' ? "selected" : ''}}    >PAN</option>
                                <option value="Driving License"  {{old('address_proof') == 'Driving License' ? "selected" : ''}}   >Driving License</option>
                                <option value="Aadhar Card"     {{old('address_proof') == 'Aadhar Card' ? "selected" : ''}}   >Aadhar Card</option>

                            </select>

                            @if ($errors->has('address_proof'))
                            <span class="text-danger">*{{ $errors->first('address_proof') }}</span>
                            @endif

                        </div>

                        <div class="mb-3">
                            <label for="address_proof_image" class="form-label">Address Proof
                                Image </label>
                            <input type="file" class="form-control" id="address_proof_image"
                                name="address_proof_image" {{ old('address_proof_image') }}>
                                @if ($errors->has('address_proof_image'))
                                <span class="text-danger">*{{ $errors->first('address_proof_image') }}</span>
                                @endif

                        </div>

                        <div class="mb-3">
                            <label for="shop_banner" class="form-label">Shop Banner </label>

                            <input type="file" class="form-control" id="shop_banner"
                                name="shop_banner" {{ old('shop_banner') }}>
                                @if ($errors->has('shop_banner'))
                                <span class="text-danger">*{{ $errors->first('shop_banner') }}</span>
                                @endif

                        </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="shop_city" class="form-label">Shop City</label>
                                <input type="text" class="form-control" id="shop_city"
                                    name="shop_city" placeholder="Enter Shop City" value="{{ old('shop_city') }}">
                                    @if ($errors->has('shop_city'))
                                    <span class="text-danger">*{{ $errors->first('shop_city') }}</span>
                                    @endif

                            </div>
                            <div class="mb-3">
                                <label for="shop_state" class="form-label">Shop State</label>
                                <input type="text" class="form-control" id="shop_state"
                                    name="shop_state" placeholder="Enter Shop State" value="{{ old('shop_state') }}">
                                    @if ($errors->has('shop_state'))
                                    <span class="text-danger">*{{ $errors->first('shop_state') }}</span>
                                    @endif

                            </div>
                            <div class="mb-3">
                                <label for="shop_country" class="form-label">Shop Country</label>
                                    <select name="shop_country" id="shop_country" class="form-control">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country )
                                            <option value="{{ $country['country_name'] }}"  {{ old('shop_country') == $country ?  'selected' : '' }} >{{ $country['country_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('shop_country'))
                                    <span class="text-danger">*{{ $errors->first('shop_country') }}</span>
                                    @endif
                            </div>
                            <div class="mb-3">
                                <label for="shop_pincode" class="form-label">Shop Pincode</label>
                                <input type="text" class="form-control" id="shop_pincode"
                                    placeholder="Enter Shop Pincode" name="shop_pincode" value="{{ old('shop_pincode') }}">
                                    @if ($errors->has('shop_pincode'))
                                    <span class="text-danger">*{{ $errors->first('shop_pincode') }}</span>
                                    @endif

                            </div>

                            <div class="mb-3">
                                <label for="shop_address" class="form-label">Shop Address</label>
                                <textarea name="shop_address" id="shop_address" cols="10" rows="3" class="form-control"
                                    placeholder="Enter Shop Address">{{ old('shop_address') }}</textarea>

                                    @if ($errors->has('shop_address'))
                                    <span class="text-danger">*{{ $errors->first('shop_address') }}</span>
                                    @endif

                            </div>

                            <div class="mb-3">
                                <label for="shop_logo" class="form-label">Shop Logo</label>

                                <input type="file" class="form-control" id="shop_logo"
                                    name="shop_logo" {{ old('shop_logo') }}>
                                    @if ($errors->has('shop_logo'))
                                    <span class="text-danger">*{{ $errors->first('shop_logo') }}</span>
                                    @endif

                            </div>

                        </div>
                        <hr>

                        <h4 class="card-title">Bank Information</h4>
                        <p class="card-title-desc">Fill all information below</p>

                        <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="account_holder_name" class="form-label">Account Holder Name</label>
                            <input type="text" class="form-control" id="account_holder_name"
                                name="account_holder_name" placeholder="Enter Account  Holder Name" value="{{ old('account_holder_name') }}">
                                @if ($errors->has('account_holder_name'))
                                 <span class="text-danger">*{{ $errors->first('account_holder_name') }}</span>
                                 @endif
                        </div>

                        <div class="mb-3">
                            <label for="bank_name" class="form-label">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name"
                                name="bank_name" placeholder="Enter Bank Name" value="{{ old('bank_name') }}">
                                @if ($errors->has('bank_name'))
                                <span class="text-danger">*{{ $errors->first('bank_name') }}</span>
                                @endif


                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="account_number" class="form-label">Account Number
                                License Number</label>
                            <input type="text" class="form-control" id="account_number" name="account_number"
                                placeholder="Enter Account Number" value="{{ old('account_number') }}">
                                @if ($errors->has('account_number'))
                                <span class="text-danger">*{{ $errors->first('account_number') }}</span>
                                @endif


                        </div>

                        <div class="mb-3">
                            <label for="bank_ifsc_code" class="form-label">Bank IFSC Code</label>
                            <input type="text" class="form-control" id="bank_ifsc_code" name="bank_ifsc_code"
                                placeholder="Enter IFSC code" value="{{ old('bank_ifsc_code') }}">
                                @if ($errors->has('bank_ifsc_code'))
                                <span class="text-danger">*{{ $errors->first('bank_ifsc_code') }}</span>
                                @endif

                        </div>
                        </div>

                    </div>
                </div>
                <div class="tab">
                    <div id="generic_price_table">
                        <section>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--PRICE HEADING START-->
                                            <div class="price-heading clearfix">
                                                <h1>Choose a Plan</h1>
                                            </div>
                                            <!--//PRICE HEADING END-->
                                        </div>
                                    </div>
                                </div>
                                <div class="container">

                                    <!--BLOCK ROW START-->
                                    <div class="row">
                                        <div class="col-md-4">

                                          <!--PRICE CONTENT START-->
                                            <div class="generic_content clearfix">

                                                <!--HEAD PRICE DETAIL START-->
                                                <div class="generic_head_price clearfix">

                                                    <!--HEAD CONTENT START-->
                                                    <div class="generic_head_content clearfix">

                                                      <!--HEAD START-->
                                                        <div class="head_bg"></div>
                                                        <div class="head">
                                                            <span>Basic</span>
                                                        </div>
                                                        <!--//HEAD END-->

                                                    </div>
                                                    <!--//HEAD CONTENT END-->

                                                    <!--PRICE START-->
                                                    <div class="generic_price_tag clearfix">
                                                        <span class="price">
                                                            <span class="sign">Rs.</span>
                                                            <span class="currency">99</span>
                                                            <span class="cent">.99</span>
                                                            <span class="month">/MON</span>
                                                        </span>
                                                    </div>
                                                    <!--//PRICE END-->

                                                </div>
                                                <!--//HEAD PRICE DETAIL END-->

                                                <!--FEATURE LIST START-->
                                                <div class="generic_feature_list">
                                                  <ul>
                                                      <li> Add Upto <span>2 Products</span>  </li>
                                                        {{-- <li><span>150GB</span> Storage</li>
                                                        <li><span>12</span> Accounts</li>
                                                        <li><span>7</span> Host Domain</li>
                                                        <li><span>24/7</span> Support</li> --}}
                                                    </ul>
                                                </div>
                                                <!--//FEATURE LIST END-->

                                                <!--BUTTON START-->
                                                <div class="generic_price_btn clearfix">
                                                    {{-- <input type="button" name="plan_a" value="Get Started" class="btn btn-success"> --}}
                                                    <button type="submit" name="plan_a" value="plan_a">Get Started</button>
                                                  {{-- <a class="" href="#">Get started</a> --}}
                                                </div>
                                                <!--//BUTTON END-->

                                            </div>
                                            <!--//PRICE CONTENT END-->

                                        </div>

                                        <div class="col-md-4">

                                          <!--PRICE CONTENT START-->
                                            <div class="generic_content active clearfix">

                                                <!--HEAD PRICE DETAIL START-->
                                                <div class="generic_head_price clearfix">

                                                    <!--HEAD CONTENT START-->
                                                    <div class="generic_head_content clearfix">

                                                      <!--HEAD START-->
                                                        <div class="head_bg"></div>
                                                        <div class="head">
                                                            <span>Standard</span>
                                                        </div>
                                                        <!--//HEAD END-->

                                                    </div>
                                                    <!--//HEAD CONTENT END-->

                                                    <!--PRICE START-->
                                                    <div class="generic_price_tag clearfix">
                                                        <span class="price">
                                                            <span class="sign">Rs.</span>
                                                            <span class="currency">199</span>
                                                            <span class="cent">.99</span>
                                                            <span class="month">/MON</span>
                                                        </span>
                                                    </div>
                                                    <!--//PRICE END-->

                                                </div>
                                                <!--//HEAD PRICE DETAIL END-->

                                                <!--FEATURE LIST START-->
                                                <div class="generic_feature_list">
                                                  <ul>
                                                    <li> Add Upto <span>10 Products</span>  </li>
                                                        {{-- <li><span>150GB</span> Storage</li>
                                                        <li><span>12</span> Accounts</li>
                                                        <li><span>7</span> Host Domain</li>
                                                        <li><span>24/7</span> Support</li> --}}
                                                    </ul>
                                                </div>
                                                <!--//FEATURE LIST END-->

                                                <!--BUTTON START-->
                                                <div class="generic_price_btn clearfix">
                                                    {{-- <input type="button" name="plan_a" value="Get Started" class="btn btn-success"> --}}
                                                    <button type="submit" name="plan_b" value="plan_b">Get Started</button>
                                                  {{-- <a class="" href="">Get started</a> --}}
                                                </div>
                                                <!--//BUTTON END-->

                                            </div>
                                            <!--//PRICE CONTENT END-->

                                        </div>
                                        <div class="col-md-4">

                                          <!--PRICE CONTENT START-->
                                            <div class="generic_content clearfix">

                                                <!--HEAD PRICE DETAIL START-->
                                                <div class="generic_head_price clearfix">

                                                    <!--HEAD CONTENT START-->
                                                    <div class="generic_head_content clearfix">

                                                      <!--HEAD START-->
                                                        <div class="head_bg"></div>
                                                        <div class="head">
                                                            <span>Unlimited</span>
                                                        </div>
                                                        <!--//HEAD END-->

                                                    </div>
                                                    <!--//HEAD CONTENT END-->

                                                    <!--PRICE START-->
                                                    <div class="generic_price_tag clearfix">
                                                        <span class="price">
                                                            <span class="sign">Rs.</span>
                                                            <span class="currency">299</span>
                                                            <span class="cent">.99</span>
                                                            <span class="month">/MON</span>
                                                        </span>
                                                    </div>
                                                    <!--//PRICE END-->

                                                </div>
                                                <!--//HEAD PRICE DETAIL END-->

                                                <!--FEATURE LIST START-->
                                                <div class="generic_feature_list">
                                                  <ul>
                                                    <li> Add Upto <span>100 Products</span>  </li>
                                                        {{-- <li><span>150GB</span> Storage</li>
                                                        <li><span>12</span> Accounts</li>
                                                        <li><span>7</span> Host Domain</li>
                                                        <li><span>24/7</span> Support</li> --}}
                                                    </ul>
                                                </div>
                                                <!--//FEATURE LIST END-->

                                                <!--BUTTON START-->
                                                <div class="generic_price_btn clearfix">
                                                    {{-- <input type="button" name="plan_a" value="Get Started" class="btn btn-success"> --}}
                                                    <button type="submit" name="plan_c" value="plan_c">Get Started</button>
                                                  {{-- <a class="" href="">Get started</a> --}}
                                                </div>
                                                <!--//BUTTON END-->

                                            </div>
                                            <!--//PRICE CONTENT END-->

                                        </div>
                                    </div>
                                    <!--//BLOCK ROW END-->

                                </div>
                            </section>
                          <footer>
                              {{-- <a class="bottom_btn" href="#">&copy; MrSahar</a> --}}
                            </footer>
                    </div>

                </div>
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    {{-- <span class="step"></span>
                    <span class="step"></span> --}}
                </div>
                {{-- <div class="d-flex flex-wrap gap-2">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Register</button>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                </div> --}}
            </form>
            <div class="mt-5 text-center">

                <div>
                    <p>Already have an account ? <a href="{{ route('admin/login') }}" class="fw-medium text-primary"> Login</a> </p>
                    <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                </div>
            </div>
        </div>

    </div>


    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>

       <!-- JAVASCRIPT -->
       <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
       <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
       <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
       <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
       <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>

       <!-- App js -->
       <script src="{{ asset('admin/assets/js/app.js') }}"></script>
           <!-- validation init -->
           <script src="{{ asset('admin/assets/js/pages/validation.init.js') }}"></script>
           <script src="{{ asset('admin/assets/js/jquery.validate.js') }}"></script>
           <script src="{{ asset('front/assets/js/front_script.js') }}"></script>


</body>

</html>





