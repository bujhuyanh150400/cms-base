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

    <div id="toast-section">
    </div>

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


    const app = {
        select2Custom: (element) => {
            element.each(function (index,item){
                const select = $(item);
                select.hide();
                select.wrap('<div class="select-custom-container"></div>');
                select.before('<button type="button" class="select-custom-button"></button>');
                select.after('<div class="select-custom-dropdown"></div>');
                const dropdown = select.next('.select-custom-dropdown');
                const option = select.find('option');
                dropdown.append('<input type="text" class="select-custom-search" placeholder="Search...">');
                dropdown.append('<ul class="select-custom-results"></ul>');
                const searchInput = dropdown.find('.select-custom-search');
                const resultsList = dropdown.find('.select-custom-results');
                const buttonSelect = select.parent('.select-custom-container').find('.select-custom-button');
                buttonSelect.on('click',function (){
                    dropdown.slideToggle(100);
                    $('.select-custom-dropdown').not(select.parent('.select-custom-container').find('.select-custom-dropdown')).hide();
                });
                option.each(function() {
                    const value = $(this).val();
                    const text = $(this).text();
                    if($(this).prop('selected')){
                        buttonSelect.text(text);
                    }else{
                        buttonSelect.text(option.first().text());
                    }
                    resultsList.append(`<li data-value="${value}">${text}</li>`);
                });
                searchInput.on('input', function() {
                    let searchTerm = $(this).val().toLowerCase();
                    resultsList.find('li').each(function() {
                        let text = $(this).text().toLowerCase();
                        if (text.includes(searchTerm)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });
                resultsList.on('click', 'li', function() {
                    let value = $(this).data('value');
                    let text = $(this).text();
                    buttonSelect.text(text);
                    select.val(value);
                    select.trigger('change');
                    dropdown.slideUp(100);
                    searchInput.val('');
                    resultsList.find('li').show();
                });
                $(document).on('click', function(e) {
                    let target = $(e.target);
                    if (!target.closest('.select-custom-container').length) {
                        $('.select-custom-dropdown').slideUp(100);
                    }
                });
            })
        },


        showToast: (message,type = 'success',timeout = 5000) =>{
            let icon;
            switch (type){
                case 'error':
                    icon = '<i class="bi bi-exclamation-lg"></i>';
                    break;
                case 'warning':
                    break;
                    icon = '<i class="bi bi-cone"></i>';
                case 'success':
                    icon = '<i class="bi bi-check"></i>';
                    break;
                default:
                    type = 'warning';
                    icon = '<i class="bi bi-cone"></i>';
                    break;
            }
            const container = $('#toast-section');
            let html =`
                <div class="toast-container" role="${type}">
                    <div class="icon-holder">
                           ${icon}
                    </div>
                    <div class="content">${message}</div>
                    <button type="button" class="btn-close">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
            `;
            container.append(html);
            $('.toast-container').each(function (index,item){
                $(item).on('click',function (){
                    $(this).hide(100);
                    setTimeout(()=>{
                        $(this).remove()
                    },100)
                })
                setTimeout(()=>{
                    $(this).fadeOut(3000);
                    setTimeout(()=>{
                        $(this).remove()
                    },3000)
                },timeout)
            })

        }
    }
    $(document).ready(function() {
        app.select2Custom($('.customSelect'));
    });
    @if(session('success'))
        app.showToast('{{ session('success') }}','success');
    @endif
    @if(session('error'))
        app.showToast('{{ session('error') }}','error');
    @endif
</script>

<script type="module">

</script>
