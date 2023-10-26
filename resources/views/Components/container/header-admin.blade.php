<header class="fixed top-0 left-[20%] w-4/5 h-20 p-2 flex justify-center items-center">
    <div class="w-full h-full flex justify-between items-center bg-stone-100 bg-opacity-80 rounded-lg drop-shadow-xl backdrop-blur backdrop-saturate-200 px-4 py-2 border border-white">
        <div class="font-bold text-indigo-950">
            {{ $title }}
        </div>
        <div class="flex items-center gap-2">
            <button><i class="bi bi-bell"></i></button>
            <div class="drop_down_container relative">
                <button type="button"
                        data-dropdown="#userHeaderDropdown"
                        class="drop_drown_btn text-stone-600 bg-gray-300 backdrop-blur bg-opacity-60 p-1.5 transition duration-200 hover:bg-gray-400  font-medium rounded-lg text-sm text-center inline-flex items-center justify-center gap-1">
                    <i class="bi bi-person-circle"></i>
                    Xin chào, {{$user_name}}
                </button>
                <div id="userHeaderDropdown" class="drop_down_list absolute bg-gray-100 bg-opacity-80 hidden top-[120%] right-0 z-20 block bg-gray-100 rounded-lg shadow w-full">
                    <ul class="py-2 text-sm text-gray-800">
                        <li>
                            <a href="#" class="block px-4 py-2 transition duration-200 hover:bg-gray-400 hover:text-white">My Account</a>
                        </li>
                        <li>
                            <form action="{{ route('logout-admin') }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit"
                                        class="block w-full text-left px-4 py-2 transition text-red-400 duration-200 hover:bg-gray-400 hover:text-white"
                                >
                                    <i class="bi bi-box-arrow-right"></i> Log out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<script type="module">
    $(document).on('click', function(e) {
        let target = $(e.target);
        if (!target.closest('.drop_down_container').length) {
            $('.drop_down_list').slideUp(100);
        }
    });
    $('.drop_drown_btn').on('click', function() {
        let dropdown = $($(this).data('dropdown'));
        $('.drop_down_list').not(dropdown).hide();
        dropdown.slideToggle(100);
    });
    $('.drop_down_list').on('click',function (){
        $(this).slideUp(100);
    })
</script>
