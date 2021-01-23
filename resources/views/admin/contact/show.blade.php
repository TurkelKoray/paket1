@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> İletişim Detay </span>
    </div>

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">

                        <div class="col-md-4 mb15 ph10">
                            <label for="name" class="field prepend-icon mb5"> isim  </label>
                            <input name="name" type="text" class="gui-input form-control" value="{{ $contact->name }}">
                        </div>

                        <div class="col-md-4 mb15 ph10">
                            <label for="email" class="field prepend-icon mb5"> E-mail  </label>
                            <input name="email" type="text" class="gui-input form-control" value="{{ $contact->email }}">
                        </div>

                        <div class="col-md-4 mb15 ph10">
                            <label for="ip" class="field prepend-icon mb5"> IP Adersi  </label>
                            <input name="ip" type="text" class="gui-input form-control" value="{{ $contact->ip }}">
                        </div>

                        <div class="col-md-4 mb15 ph10">
                            <label for="subject" class="field prepend-icon mb5"> Konu  </label>
                            <input name="subject" type="text" class="gui-input form-control" value="{{ $contact->subject }}">
                        </div>

                        <div class="col-md-4 none mb15 ph10">
                            <label for="gsm" class="field prepend-icon mb5"> Gsm  </label>
                            <input name="gsm" type="text" class="gui-input form-control" value="{{ $contact->gsm }}">
                        </div>

                        <div class="col-md-4 mb15 ph10">
                            <label for="phone" class="field prepend-icon mb5"> Telefon  </label>
                            <input name="phone" type="text" class="gui-input form-control" value="{{ $contact->phone }}">
                        </div>

                        <div class="col-md-4 mb15 ph10">
                            <label for="tarih" class="field prepend-icon mb5"> Tarih  </label>
                            <input name="tarih" type="text" class="gui-input form-control" value="{{ $contact->created_at->format('d/m/Y') }} - {{ $contact->created_at->format('H:i') }}">
                        </div>



                        <div class="col-md-12 mb15 ph10">
                            <label for="message" class="field prepend-icon mb5"> Mesaj </label>
                            <textarea class="gui-textarea form-control" id="message" name="message">{{ $contact->message }}</textarea>
                        </div>


                    </div>
                </div>
            </div>
        </div>

@endsection

@section('topbar')
    <header id="topbar" class="ph10">
        <div class="topbar-left">
            <ul class="nav nav-list nav-list-topbar pull-left">
                <li class="active">
                    <a href="/admin/contact/index">Yeni Mesajlar</a>
                </li>
                <li>
                    <a href="/admin/contact/old">Okunmuş Mesajlar</a>
                </li>
            </ul>
        </div>
        <div style="display: none;" class="topbar-right hidden-xs hidden-sm">
            <a href="#" class="btn btn-default btn-sm light fw600 ml10 mt5">
                <span class="fa fa-anchor pr5"></span> Button Link </a>
            <a href="#" class="btn btn-default btn-sm light fw600 ml10 mt5">
                <span class="fa fa-bullseye pr5"></span> Button Link </a>
            <a href="#" class="btn btn-default btn-sm light fw600 ml10 mt5">
                <span class="fa fa-external-link pr5"></span> Button Link </a>
        </div>
    </header>
@endsection

@section('js')


@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/allcp/forms/css/forms.css') }}">

@endsection