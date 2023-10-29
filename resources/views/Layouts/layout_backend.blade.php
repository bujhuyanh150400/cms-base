<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="p-0 m-0 bg-stone-200">
    <div class="absolute min-h-[300px] bg-orange-500 w-full top-0 left-0 z-[-1]"></div>
    <x-container.navbar-admin/>
    <main class="section-main-admin">
        <x-container.header-admin>
            <x-slot name="headerTitle">@yield('title-header')</x-slot>
        </x-container.header-admin>
        <div class="py-5">
            @yield('main')
        </div>
    </main>
</body>
</html>

<script type="module">
    $(document).on('click', function(e) {
        let target = $(e.target);
        if (!target.closest('.drop_down_container').length) {
            $('.drop_down_list').slideUp(100);
        }
    });
    $('.drop_drown_btn').on('click', function() {
        let dropdown = $('#' + $(this).data('dropdown'));
        $('.drop_down_list').not(dropdown).hide();
        dropdown.slideToggle(100);
    });
    $('.drop_down_list').on('click',function (){
        $(this).slideUp(100);
    })
    $('.menu-list-btn').on('click',function (){
        const menuList = $(this).parent();
        menuList.find('.sub-menu-list').slideToggle(100);
    })
    $(document).ready(function (){
        $('.menu-list').each(function (index,item){
            if($(this).find('.active-menu-sub').length == 1){
                $(this).find('.sub-menu-list').show();
                $(this).find('.menu-list-btn').addClass('active-menu');
            }
        })
    });
    $('#admin-btn_show-hide').on('click',function (){
        if($('.navbar-admin').hasClass('hidden-navbar-admin') == true){
            $(this).html('<i class="bi bi-list-nested"></i>');
            $('.navbar-admin').removeClass('hidden-navbar-admin');
            $('.section-main-admin').removeClass('section-main-admin-hidden-navbar')
        }else{
            $(this).html('<i class="bi bi-list"></i>');
            $('.navbar-admin').addClass('hidden-navbar-admin');
            $('.section-main-admin').addClass('section-main-admin-hidden-navbar')

        }

    });
</script>
