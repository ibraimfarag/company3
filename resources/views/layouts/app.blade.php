<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <script src="{{ asset('js/flasher.min.js') }}"></script>
    @include('seo.index')
    
    <script src="https://kit.fontawesome.com/7b5e9f3ec6.js" crossorigin="anonymous"></script>



    {!!$settings['header_code']!!}
    @livewireStyles
    @if(auth()->check())
        @php
        if(session('seen_notifications')==null)
            session(['seen_notifications'=>0]);
        $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
        $unreadNotifications=auth()->user()->unreadNotifications()->count();
        @endphp
    @endif
    @vite('resources/css/app.css')
   
    @yield('styles')
</head>
<body style="background:#eef4f5;margin-top: 65px;" class="body">
    <style type="text/css">
        #toast-container>div {
            opacity: 1;
        }
    </style>
    @yield('after-body')
    <div id="app">
        {{-- <div class="page-loader"></div> --}}
        <div id="body-overlay"onclick="document.getElementById('aside-menu').classList.toggle('active');document.getElementById('body-overlay').classList.toggle('active');"></div>
        <main class="p-0 font-2">
            @yield('content')
        </main>
        
    </div>


    @vite('resources/js/app.js')
    @livewireScripts
    @include('layouts.scripts')
    @auth
    <script type="module">
        var favicon = new Favico({bgColor: '#dc0000',textColor: '#fff',animation: 'slide',fontStyle: 'bold',fontFamily: 'sans',type: 'circle'});
        function get_website_title(){
            return $('meta[name="title"]').attr('content');
        }
        var notificationDropdown = document.getElementById('notificationDropdown')
        notificationDropdown.addEventListener('show.bs.dropdown', function() {
            $.ajax({
                method: "POST",
                url: "{{route('admin.notifications.see')}}",
                data: { _token: "{{csrf_token()}}" }
            }).done(function(res) {
                $('#dropdown-notifications-icon').fadeOut();
                favicon.badge(0);
            });
        });
        function append_notification_notifications(msg) {
            if (msg.count_unseen_notifications > 0) {
                $('#dropdown-notifications-icon').fadeIn(0);
                $('#dropdown-notifications-icon').text(msg.count_unseen_notifications);
            } else {
                $('#dropdown-notifications-icon').fadeOut(0);
                favicon.badge(0);
            }
            $('.notifications-container').empty();
            $('.notifications-container').append(msg.response);
            $('.notifications-container a').on('click', function() { window.location.href = $(this).attr('href'); });
        } 
        function get_notifications() {
            $.ajax({
                method: "GET",
                url: "{{route('admin.notifications.ajax')}}", 
                success: function(data, textStatus, xhr) {

                    favicon.badge(data.notifications.response.count_unseen_notifications);

                    if (data.alert) {
                        var audio = new Audio('{{asset("/sounds/notification.wav")}}');
                        audio.play();
                    }  
                    append_notification_notifications(data.notifications.response); 
                    if (data.notifications.response.count_unseen_notifications > 0) {
                        $('title').text('(' + parseInt(data.notifications.response.count_unseen_notifications) + ')' + " " +  
                        get_website_title());

                    } else {
                        $('title').text(get_website_title());
                    }
                }
            });
        } 
        window.focused = 25000;
        window.onfocus = function() {
            get_notifications(); 
            window.focused = 25000;
        };
        window.onblur = function() {
            window.focused = 60000;
        }; 
        function get_nots() {
            setTimeout(function() { 
                get_notifications();
                get_nots();
            }, window.focused);
        }
        get_nots();

        @if($unreadNotifications!=session('seen_notifications') && $unreadNotifications!=0)
            @php
            session(['seen_notifications'=>$unreadNotifications]);
            @endphp
            var audio = new Audio('{{asset("/sounds/notification.wav")}}');
            audio.play();
        @endif
    </script>
    @endauth
    @yield('scripts')
    {!!$settings['footer_code']!!}
</body>
</html>
