<div>
  <style>
      /* **********************************
      Reset CSS
      ************************************** */
      
      html,
      body,
      div,
      span,
      applet,
      object,
      iframe,
      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      p,
      blockquote,
      pre,
      a,
      abbr,
      acronym,
      address,
      big,
      cite,
      code,
      del,
      dfn,
      em,
      img,
      ins,
      kbd,
      q,
      s,
      samp,
      small,
      strike,
      strong,
      sub,
      sup,
      tt,
      var,
      b,
      u,
      i,
      center,
      dl,
      dt,
      dd,
      ol,
      ul,
      li,
      fieldset,
      form,
      label,
      legend,
      table,
      caption,
      tbody,
      tfoot,
      thead,
      tr,
      th,
      td,
      article,
      aside,
      canvas,
      details,
      embed,
      figure,
      figcaption,
      footer,
      header,
      hgroup,
      menu,
      nav,
      output,
      ruby,
      section,
      summary,
      time,
      mark,
      audio,
      video {
          margin: 0;
          padding: 0;
          border: 0;
          font-size: 100%;
          font: inherit;
          vertical-align: baseline;
      }
      
      
      /* HTML5 display-role reset for older browsers */
      
      article,
      aside,
      details,
      figcaption,
      figure,
      footer,
      header,
      hgroup,
      menu,
      nav,
      section {
          display: block;
      }
      
      body {
          line-height: 1.5;
      }
      
      ol,
      ul {
          list-style: none;
      }
      
      blockquote,
      q {
          quotes: none;
      }
      
      blockquote:before,
      blockquote:after,
      q:before,
      q:after {
          content: '';
          content: none;
      }
      
      table {
          border-collapse: collapse;
          border-spacing: 0;
      }
      
      
      /********************************
      Typography Style
      ******************************** */
      
      body {
          margin: 0;
          font-family: 'Open Sans', sans-serif;
          line-height: 1.5;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
      }
      
      html {
          min-height: 100%;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
      }
      
      h1 {
          font-size: 36px;
      }
      
      h2 {
          font-size: 30px;
      }
      
      h3 {
          font-size: 26px;
      }
      
      h4 {
          font-size: 22px;
      }
      
      h5 {
          font-size: 18px;
      }
      
      h6 {
          font-size: 16px;
      }
      
      p {
          font-size: 15px;
      }
      
      a {
          text-decoration: none;
          font-size: 15px;
      }
      
      * {
      margin-bottom: 0;
      }
      
      
      /* *******************************
      message-area
      ******************************** */
      
      .message-area {
          height: 100vh;
          overflow: hidden;
          padding: 30px 0;
          background: #f5f5f5;
      }
      
      .chat-area {
          position: relative;
          width: 100%;
          background-color: #fff;
          border-radius: 0.3rem;
          height: 90vh;
          overflow: hidden;
          min-height: calc(100% - 1rem);
      }
      
      .chatlist {
          outline: 0;
          height: 100%;
          overflow: hidden;
          width: 300px;
          float: left;
          padding: 15px;
      }
      
      .chat-area .modal-content {
          border: none;
          border-radius: 0;
          outline: 0;
          height: 100%;
      }
      
      .chat-area .modal-dialog-scrollable {
          height: 100% !important;
      }
      
      .chatbox {
          width: auto;
          overflow-x: hidden;
          overflow-y:auto; 
          height: 100%;
          border-left: 1px solid #ccc;
      }
      
      .chatbox .modal-dialog,
      .chatlist .modal-dialog {
          max-width: 100%;
          margin: 0;
      }
      
      .msg-search {
          display: flex;
          align-items: center;
          justify-content: space-between;
      }
      
      .chat-area .form-control {
          display: block;
          width: 80%;
          padding: 0.375rem 0.75rem;
          font-size: 14px;
          font-weight: 400;
          line-height: 1.5;
          color: #222;
          background-color: #fff;
          background-clip: padding-box;
          border: 1px solid #ccc;
          -webkit-appearance: none;
          -moz-appearance: none;
          appearance: none;
          border-radius: 0.25rem;
          transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
      }
      
      .chat-area .form-control:focus {
          outline: 0;
          box-shadow: inherit;
      }
      
      a.add img {
          height: 36px;
      }
      
      .chat-area .nav-tabs {
          border-bottom: 1px solid #dee2e6;
          align-items: center;
          justify-content: space-between;
          flex-wrap: inherit;
      }
      
      .chat-area .nav-tabs .nav-item {
          width: 100%;
      }
      
      .chat-area .nav-tabs .nav-link {
          width: 100%;
          color: #180660;
          font-size: 14px;
          font-weight: 500;
          line-height: 1.5;
          text-transform: capitalize;
          margin-top: 5px;
          margin-bottom: -1px;
          background: 0 0;
          border: 1px solid transparent;
          border-top-left-radius: 0.25rem;
          border-top-right-radius: 0.25rem;
      }
      
      .chat-area .nav-tabs .nav-item.show .nav-link,
      .chat-area .nav-tabs .nav-link.active {
          color: #222;
          background-color: #fff;
          border-color: transparent transparent #000;
      }
      
      .chat-area .nav-tabs .nav-link:focus,
      .chat-area .nav-tabs .nav-link:hover {
          border-color: transparent transparent #000;
          isolation: isolate;
      }
      
      .chat-list h3 {
          color: #222;  
          font-size: 16px;
          font-weight: 500;
          line-height: 1.5;
          text-transform: capitalize;
          margin-bottom: 0;
      }
      
      .chat-list p {
          color: #343434;
          font-size: 14px;
          font-weight: 400;
          line-height: 1.5;
          text-transform: capitalize;
          margin-bottom: 0;
      }
      
      .chat-list a.d-flex {
          margin-bottom: 15px;
          position: relative;
          text-decoration: none;
      }
      
      .chat-list .active {
          display: block;
          content: '';
          clear: both;
          position: absolute;
          bottom: 3px;
          left: 34px;
          height: 12px;
          width: 12px;
          background: #00DB75;
          border-radius: 50%;
          border: 2px solid #fff;
      }
      .chat-list .offline {
          display: block;
          content: '';
          clear: both;
          position: absolute;
          bottom: 3px;
          left: 34px;
          height: 12px;
          width: 12px;
          background: gray;
          border-radius: 50%;
          border: 2px solid #fff;
      }
      
      .msg-head h3 {
          color: #222;
          font-size: 18px;
          font-weight: 600;
          line-height: 1.5;
          margin-bottom: 0;
      }
      
      .msg-head p {
          color: #343434;
          font-size: 14px;
          font-weight: 400;
          line-height: 1.5;
          text-transform: capitalize;
          margin-bottom: 0;
      }
      
      .msg-head {
          padding: 15px;
          border-bottom: 1px solid #ccc;
      }
      
      .moreoption {
          display: flex;
          align-items: center;
          justify-content: end;
      }
      
      .moreoption .navbar {
          padding: 0;
      }
      
      .moreoption li .nav-link {
          color: #222;
          font-size: 16px;
      }
      
      .moreoption .dropdown-toggle::after {
          display: none;
      }
      
      .moreoption .dropdown-menu[data-bs-popper] {
          top: 100%;
          left: auto;
          right: 0;
          margin-top: 0.125rem;
      }
      
      .msg-body ul {
          overflow: hidden;
      }
      
      .msg-body ul li {
          list-style: none;
          margin: 15px 0;
      }
      
      .msg-body ul li.sender {
          display: block;
          width: 100%;
          position: relative;
      }
      
      .msg-body ul li.sender:before {
          display: block;
          clear: both;
          content: '';
          position: absolute;
          top: -6px;
          left: -7px;
          width: 0;
          height: 0;
          border-style: solid;
          border-width: 0 12px 15px 12px;
          border-color: transparent transparent #f5f5f5 transparent;
          -webkit-transform: rotate(-37deg);
          -ms-transform: rotate(-37deg);
          transform: rotate(-37deg);
      }
      
      .msg-body ul li.sender p {
          color: #000;
          font-size: 14px;
          line-height: 1.5;
          font-weight: 400;
          padding: 15px;
          background: #f5f5f5;
          display: inline-block;
          border-bottom-left-radius: 10px;
          border-top-right-radius: 10px;
          border-bottom-right-radius: 10px;
          margin-bottom: 0;
      }
      
      .msg-body ul li.sender p b {
          display: block;
          color: #180660;
          font-size: 14px;
          line-height: 1.5;
          font-weight: 500;
      }
      
      .msg-body ul li.repaly {
          display: block;
          width: 100%;
          text-align: right;
          position: relative;
      }
      
      .msg-body ul li.repaly:before {
          display: block;
          clear: both;
          content: '';
          position: absolute;
          bottom: 15px;
          right: -7px;
          width: 0;
          height: 0;
          border-style: solid;
          border-width: 0 12px 15px 12px;
          border-color: transparent transparent #4b7bec transparent;
          -webkit-transform: rotate(37deg);
          -ms-transform: rotate(37deg);
          transform: rotate(37deg);
      }
      
      .msg-body ul li.repaly p {
          color: #fff;
          font-size: 14px;
          line-height: 1.5;
          font-weight: 400;
          padding: 15px;
          background: #4b7bec;
          display: inline-block;
          border-top-left-radius: 10px;
          border-top-right-radius: 10px;
          border-bottom-left-radius: 10px;
          margin-bottom: 0;
      }
      
      .msg-body ul li.repaly p b {
          display: block;
          color: #061061;
          font-size: 14px;
          line-height: 1.5;
          font-weight: 500;
      }
      
      .msg-body ul li.repaly:after {
          display: block;
          content: '';
          clear: both;
      }
      
      .time {
          display: block;
          color: #000;
          font-size: 12px;
          line-height: 1.5;
          font-weight: 400;
      }
      
      li.repaly .time {
          margin-right: 20px;
      }
      
      .divider {
          position: relative;
          z-index: 1;
          text-align: center;
      }
      
      .msg-body h6 {
          text-align: center;
          font-weight: normal;
          font-size: 14px;
          line-height: 1.5;
          color: #222;
          background: #fff;
          display: inline-block;
          padding: 0 5px;
          margin-bottom: 0;
      }
      
      .divider:after {
          display: block;
          content: '';
          clear: both;
          position: absolute;
          top: 12px;
          left: 0;
          border-top: 1px solid #EBEBEB;
          width: 100%;
          height: 100%;
          z-index: -1;
      }
      
      .send-box {
          padding: 15px;
          border-top: 1px solid #ccc;
      }
      
      .send-box form {
          display: flex;
          align-items: center;
          justify-content: space-between;
          margin-bottom: 15px;
      }
      
      .send-box .form-control {
          display: block;
          width: 85%;
          padding: 0.375rem 0.75rem;
          font-size: 14px;
          font-weight: 400;
          line-height: 1.5;
          color: #222;
          background-color: #fff;
          background-clip: padding-box;
          border: 1px solid #ccc;
          -webkit-appearance: none;
          -moz-appearance: none;
          appearance: none;
          border-radius: 0.25rem;
          transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
      }
      
      .send-box button {
          border: none;
          background: #3867d6;
          padding: 0.375rem 5px;
          color: #fff;
          border-radius: 0.25rem;
          font-size: 14px;
          font-weight: 400;
          width: 24%;
          margin-left: 1%;
      }
      
      .send-box button i {
          margin-right: 5px;
      }
      
      .send-btns .button-wrapper {
          position: relative;
          width: 125px;
          height: auto;
          text-align: left;
          margin: 0 auto;
          display: block;
          background: #F6F7FA;
          border-radius: 3px;
          padding: 5px 15px;
          float: left;
          margin-right: 5px;
          margin-bottom: 5px;
          overflow: hidden;
      }
      
      .send-btns .button-wrapper span.label {
          position: relative;
          z-index: 1;
          display: -webkit-box;
          display: -ms-flexbox;
          display: flex;
          -webkit-box-align: center;
          -ms-flex-align: center;
          align-items: center;
          width: 100%;
          cursor: pointer;
          color: #343945;
          font-weight: 400;
          text-transform: capitalize;
          font-size: 13px;
      }
      
      #upload {
          display: inline-block;
          position: absolute;
          z-index: 1;
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
          opacity: 0;
          cursor: pointer;
      }
      
      .send-btns .attach .form-control {
          display: inline-block;
          width: 120px;
          height: auto;
          padding: 5px 8px;
          font-size: 13px;
          font-weight: 400;
          line-height: 1.5;
          color: #343945;
          background-color: #F6F7FA;
          background-clip: padding-box;
          border: 1px solid #F6F7FA;
          border-radius: 3px;
          margin-bottom: 5px;
      }
      
      .send-btns .button-wrapper span.label img {
          margin-right: 5px;
      }
      
      .button-wrapper {
          position: relative;
          width: 100px;
          height: 100px;
          text-align: center;
          margin: 0 auto;
      }
      
      button:focus {
          outline: 0;
      }
      
      .add-apoint {
          display: inline-block;
          margin-left: 5px;
      }
      
      .add-apoint a {
          text-decoration: none;
          background: #F6F7FA;
          border-radius: 8px;
          padding: 8px 8px;
          font-size: 13px;
          font-weight: 400;
          line-height: 1.2;
          color: #343945;
      }
      
      .add-apoint a svg {
          margin-right: 5px;
      }
      
      .chat-icon {
          display: none;
      }
      
      .closess i {
          display: none;
      }
      
      /* for online offline profile */
      .icon-container {
      width: 50px;
      height: 50px;
      position: relative;
      }

      .profile-img {
      height: 100%;
      width: 100%;
      border-radius: 50%;
      }
      .my-img{
        width: 80%;
        height: 100%;
        position: absolute;
        top: 0;
        z-index: 2;
      }
      .status-circle-online {
      width: 15px;
      height: 15px;
      border-radius: 50%;
      background-color: rgb(27, 250, 27);
      border: 2px solid white;
      bottom: 0;
      right: 0;
      position: absolute;
      }
      .status-circle-offline {
      width: 15px;
      height: 15px;
      border-radius: 50%;
      background-color: gray;
      border: 2px solid white;
      bottom: 0;
      right: 0;
      position: absolute;
      }

      .backIcon{
         font-size:20px;
         padding-bottom:20px;
      }
      @media (max-width: 767px) {
          .chat-icon {
              display: block;
              margin-right: 5px;
          }
          .chatlist {
              width: 100%;
          }
          .chatbox {
              position: absolute;
              width: 100%;
              left: 0;
              background: #fff;
              border-left: none;
              display: none;
          }
          /* .chatbox {
              position: absolute;
              width: 100%;
              left: 1000px;
              right: 0;
              background: #fff;
              transition: all 0.5s ease;
              border-left: none;
          } */
          .showbox {
              left: 0 !important;
              transition: all 0.5s ease;
          }
          .msg-head h3 {
              font-size: 14px;
          }
          .msg-head p {
              font-size: 12px;
          }
          .msg-head .flex-shrink-0 img {
              height: 30px;
          }
          .send-box button {
              width: 28%;
          }
          .send-box .form-control {
              width: 70%;
          }
          .chat-list h3 {
              font-size: 14px;
          }
          .chat-list p {
              font-size: 12px;
          }
          .msg-body ul li.sender p {
              font-size: 13px;
              padding: 8px;
              border-bottom-left-radius: 6px;
              border-top-right-radius: 6px;
              border-bottom-right-radius: 6px;
          }
          .msg-body ul li.repaly p {
              font-size: 13px;
              padding: 8px;
              border-top-left-radius: 6px;
              border-top-right-radius: 6px;
              border-bottom-left-radius: 6px;
          }
      }
  </style>
  <!-- Google Fonts -->
  <!-- Option 1: Include in HTML -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  <!-- char-area -->
  <section class="message-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="chat-area">
            <!-- chatlist -->
            <div class="chatlist">
                <a href="{{route('home')}}"><i class="bi bi-arrow-left-circle-fill backIcon"></i></a>    
              <div class="modal-dialog-scrollable">
                <div class="modal-content"> 
                  <div class="chat-header">
                    <div class="msg-search">
                      <input type="text" class="form-control" id="inlineFormInputGroup" name="search" placeholder="@lang('en.search')" aria-label="search">
                      <a class="add" href="#"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/add.svg" alt="add"></a>
                    </div>
  
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="Open-tab" data-bs-toggle="tab" data-bs-target="#Open" type="button" role="tab" aria-controls="Open" aria-selected="true">@lang('en.open')</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Closed-tab" data-bs-toggle="tab" data-bs-target="#Closed" type="button" role="tab" aria-controls="Closed" aria-selected="false">@lang('en.close')</button>
                      </li>
                    </ul>
                  </div>
  
                  <div class="modal-body">
                    <!-- chat-list -->
                    <div class="chat-lists">
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
                          <!-- chat-list -->
                          <div class="chat-list profile-list">
                            <div class="profile-btn">
                                @foreach($users as $data)
                                  <a href="#" data-id="{{$data->id}}" class="d-flex align-items-center receiver-user-link">
                                      <div class='icon-container'>
                                        <img class="profile-img" src="https://cdn2.iconfinder.com/data/icons/flatfaces-everyday-people-square/128/beard_male_man_face_avatar-512.png" />
                                        @if($data->current == 1)
                                          <div class='status-circle-online'></div>
                                        @else
                                          <div class='status-circle-offline'></div>
                                        @endif
                                      </div>                                          
                                        <div class="flex-grow-1 ms-3">
                                        <h3>{{$data->name}} </h3>
                                        @if($data->current == 1)
                                          <span class="text-success">Active Now</span>
                                        @else
                                          <span style="font-size: 13px;color:gray;">{{\Carbon\Carbon::parse($data->last_seen)->diffForHumans()}}</span>
                                        @endif

                                        {{-- for auth user unread noti who is sending to auth user --}}
                                        @php
                                          $messageCount = DB::table('notifications')
                                            ->where('notifiable_id', auth()->user()->id)
                                            ->where('notifiable_type', get_class($data))
                                            ->where('data->type', 'message')
                                            ->where('read_at', null)
                                            ->where('data->sender', $data->id)
                                            ->count();
                                        @endphp
                                      @if ($messageCount > 0)
                                        <span class="noti-count">{{$messageCount}}</span>
                                      @endif     
                                      {{-- end here get count and remove zero results --}}
                                      
                                    </div>
                                  </a>
                                @endforeach
                              </div>
                          </div>
                          <!-- chat-list -->
                        </div>
                        <div class="tab-pane fade" id="Closed" role="tabpanel" aria-labelledby="Closed-tab">
                        </div>
                      </div>
                    </div>
                    <!-- chat-list -->
                  </div>
                </div>
              </div>
            </div>
            <!-- chatlist -->
  
            <!-- chatbox -->
            <div class="chatbox">
              <div class="modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="msg-head">
                    <div class="row">
                      <span class="col-1 chat-icon mt-2"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" width="10" alt="image title"></span>
                      <div class="col-8">
                        <div class="d-flex align-items-center receiver-info-h">
                        </div>
                      </div>
                    </div>
                  </div>
  
                  <div class="modal-body">
                    <div class="msg-body">
                      <ul class="messages-list">
                        <li class="sender">
                          <p> Hey, Are you there? </p>
                          <span class="time">10:06 am</span>
                        </li>
                        <li class="repaly">
                          <p> Last Minute Festive Packages From Superbreak</p>
                          <span class="time">10:20 am</span>
                        </li>
                        <li>
                          <div class="divider">
                            <h6>Today</h6>
                          </div>
                        </li>    
                      </ul>
                    </div>
                  </div>
  
                  <div class="send-box">
                    <form class="send-message">
                      <input type="text" id="message-input" class="form-control" aria-label="message…" placeholder="@lang('en.write message...')">
                      <input type="hidden" name="receiver_id" class="hidden-form-receiver">
                      <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> @lang('en.send')</button>
                    </form>
  
                    <div class="send-btns">
                      <div class="attach">
                        <div class="button-wrapper">
                          <span class="label">
                            <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/upload.svg" width="10" alt="image title"> attached file
                          </span><input type="file" name="image" id="upload" class="upload-box" placeholder="Upload File" aria-label="Upload File">
                        </div>
  
                          </div>
                    </div>
  
                  </div>
                </div>
              </div>
              <img class="my-img" src="{{asset('assets/image/logo/bg.jpg')}}" alt="">
            </div>
          </div>
          <!-- chatbox -->
  
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- char-area -->
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <script>
    let receiverId;

    // arrow to close modal box in mobile view
      $('.chat-icon').click(function(){
        $('.chatbox').hide('slide', {direction:'right'});
      })

      //click profile-btn and reach detail chats 
      $('.profile-btn').on('click', '.receiver-user-link', function() {
          $('.my-img').fadeOut(2000);
          var receiver_id = $(this).attr('data-id');
          $.ajax({
              url: '{{URL::to('/chat/message')}}',
              method: 'GET',
              data: {receiver_id: receiver_id},
              success: function(response) {
                  if(response.receiver.current == 1){
                    var header ='<div class="icon-container">'+
                                  '<img class="profile-img" src="https://cdn2.iconfinder.com/data/icons/flatfaces-everyday-people-square/128/beard_male_man_face_avatar-512.png" />'+
                                  '<div class="status-circle-online"></div>'+
                                '</div>'+
                                '<div class="flex-grow-1 ms-3">'+
                                '<h3>'+ response.receiver.name +'</h3>'+
                                '<p class="text-success"> Active Now </p>'+
                                '</div>';
                  }else{
                    var header ='<div class="icon-container">'+
                                  '<img class="profile-img" src="https://cdn2.iconfinder.com/data/icons/flatfaces-everyday-people-square/128/beard_male_man_face_avatar-512.png" />'+
                                  '<div class="status-circle-offline"></div>'+
                                '</div>'+
                                '<div class="flex-grow-1 ms-3">'+
                                '<h3>'+ response.receiver.name +'</h3>'+
                                '<p> Offline </p>'+
                                '</div>';
                  }
                  var contents = '';
                  $.each(response.messages, function(index, item) {
                    if(parseInt({{auth()->user()->id}}) == item.sender_id){
                       contents += '<li class="repaly">'+
                          '<p>'+ item.message +'</p>'+
                          '<span class="time">'+ item.created_at +'</span>'+
                        '</li>';
                    }
                  });
                  $('.noti-count').remove();
                  $('.receiver-info-h').html(header);
                  $('.hidden-form-receiver').val(receiverId);
                  $('.messages-list').html(contents);
              },
          });
          receiverId = receiver_id; // Replace with the receiver's ID
          setInterval(getMessages, 2000);

      })
      function getMessages(){
          $.ajax({
              url: '{{ route('chat.message')}}',
              method: 'GET',
              data: {receiver_id: receiverId},
              success: function(response) {
                  var messages = response.messages;
                  var html = '';
                  messages.forEach(function(message){
                    const dateTimeString = message.created_at;
                    const dateTime = new Date(dateTimeString);
                    const options = {
                      hour: "numeric",
                      minute: "numeric",
                      hour12: true
                    };

                    const formattedTime = dateTime.toLocaleString("en-US", options);

                    if({{auth()->user()->id}} == message.sender_id){
                      html += '<li class="repaly">'+
                          '<p>'+ message.message +'</p>'+
                          '<span class="time">'+ formattedTime +'</span>'+
                        '</li>';
                    }else{
                      html += '<li class="sender">'+
                              '<p>'+ message.message + '</p>'+
                              '<span class="time">'+ formattedTime +'</span>'+
                            '</li>';
                    }
                  });
                  $('.messages-list').html(html);
              }
          });
      }
      $('.send-message').submit(function(e){
          e.preventDefault();
          var message = $('#message-input').val();
          var receiverId = $('.hidden-form-receiver').val()
          $.ajax({
              url: '{{ route('chat.send') }}',
              type: 'GET',
              data: { receiver_id: receiverId, message: message },
              success: function(response) {
                  getMessages();
              }
          });

          $('#message-input').val('');
      });

      // search users by name
      $('#inlineFormInputGroup').keyup(function(){
        var searchText = $(this).val();
        $.ajax({
            url: '{{route('searchUser')}}',
            type: 'GET',
            data: {searchText: searchText},
            success: function(response){
              var profile = '';
              $.each(response.data, function(index, item) {
                console.log(item.name); 
                if(item.current == 1){
                  profile += '<a href="#" data-id="'+item.id+'" class="d-flex align-items-center receiver-user-link">'+
                                '<div class="icon-container">'+
                                  '<img class="profile-img" src="https://cdn2.iconfinder.com/data/icons/flatfaces-everyday-people-square/128/beard_male_man_face_avatar-512.png"/>'+
                                  '<div class="status-circle-online"></div>'+
                                '</div>'+     
                                '<div class="flex-grow-1 ms-3">'+
                                  '<h3>'+item.name+'</h3>'+
                                  '<span class="text-success">Active Now</span>'+
                                '</div>'+
                              '</a>';  
                }else{
                  profile += '<a href="#" data-id="'+item.id+'" class="d-flex align-items-center receiver-user-link">'+
                                '<div class="icon-container">'+
                                  '<img class="profile-img" src="https://cdn2.iconfinder.com/data/icons/flatfaces-everyday-people-square/128/beard_male_man_face_avatar-512.png"/>'+
                                  '<div class="status-circle-offline"></div>'+
                                '</div>'+     
                                '<div class="flex-grow-1 ms-3">'+
                                  '<h3>'+item.name+'</h3>'+
                                  '<span class="text-success">Offline</span>'+
                                '</div>'+
                              '</a>';  
                          
                }
                $('.profile-btn').html(profile);
              })},
            }
            )});


        // In mobile view
      function resize() {
      var screenWidth = $(window).width();
      if (screenWidth <= 768) {
        $('.chat-list a').click(function(){
          $('.chatbox').show("slide", {direction: 'right'});
        })
      } 
    };
    setInterval(resize, 2000);

  </script>
</div>
