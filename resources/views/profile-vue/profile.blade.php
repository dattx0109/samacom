@extends('layouts.base')

@section('content')
    <div id="profile">
        <section class="page-detail p-b-30 p-t-40">
            <div class="container animated fadeInDown">
                <div class="page-detail-head">
                    <div class="page-block page-block--split m-b-30">
                        <div class="page-block-top m-p-b-30">
                            <avatar :profile="profile" v-if=" ! isLoadingPercentageProfile"></avatar>
                        </div>
                    </div>
                     <profile-base :profile="profile" @pass-data-to-paren="passDataToParent">
                     </profile-base>
                     <profile-gold :profile="profile" @pass-data-to-paren="passDataToParent"></profile-gold>
                    <profile-character v-if=" ! isLoadingCharactor" :profile="profile"></profile-character>
                    <profile-exp :profile="profile" @pass-data-to-paren="passDataToParent"></profile-exp>
                    <profile-skill :profile="profile" @pass-data-to-paren="passDataToParent"></profile-skill>
                    <profile-school :profile="profile" @pass-data-to-paren="passDataToParent"></profile-school>
                    <profile-desire :profile="profile" @pass-data-to-paren="passDataToParent" v-if=" ! isLoadingDesire"></profile-desire>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('CSS')
    <style>
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
    <link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
{{--    <link href="{{asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
@endsection

@section('javascript-vue')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/profile/profile.js')}}"></script>
    <script src="{{asset('js-service/fixed-top.js')}}" ></script>
@endsection
