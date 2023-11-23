@extends('Layouts.layout_backend')

@section('title', $title)
@section('title-header', $titleHeader)

@section('main')
    <h1 class="my-2 font-medium text-lg">{{ $titleHeader }}</h1>
    <div class="grid grid-cols-2 gap-2">
        <div class="">
            @foreach ($menus as $menu)
                {{ $menu->title }}
            @endforeach
        </div>
        <div class="flex justify-center items-center w-full h-full">
            <button type="button" id="btn__formMenu-open"
                class="px-4 py-2 rounded-lg bg-gradient-to-br from-violet-900 to-pink-500 text-white text-sm font-medium duration-200 outline-none border-none hover:-translate-y-0.5 hover:shadow-lg ">
                Thêm menu
            </button>
        </div>
        <div id="formMenu" class="flex flex-col gap-2">
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium" for="title">
                    Tên menu
                </label>
                <input value="" class="rounded-lg p-2 outline-purple-300 text-sm border duration-200 focus:shadow-md"
                    type="text" id="title" name="title" placeholder="Tên menu" />
            </div>
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium" for="description">
                    Mô tả menu
                </label>
                <textarea class="rounded-lg p-2 outline-purple-300 text-sm border duration-200 focus:shadow-md" id="description"
                    rows="5" name="description" placeholder="Mô tả"></textarea>
            </div>
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium" for="parentId">
                    Là menu con của
                </label>
                <select class="customSelect" id="parentId" name="parentId">
                    <option value="">Không có</option>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium" for="action">
                    Action dẫn URL (theo route)
                </label>
                <input value="" class="rounded-lg p-2 outline-purple-300 text-sm border duration-200 focus:shadow-md"
                    type="text" id="action" name="action" placeholder="Route" />
            </div>
            <div class="">
                <button type="button" id="btn__formMenu-close"
                    class="px-4 py-2 rounded-lg bg-gray-500/50 text-white text-sm font-medium duration-200 outline-none border-none hover:-translate-y-0.5 hover:shadow-lg ">
                    Huỷ
                </button>
                <button type="button" id="btn__formMenu-submit"
                    class="px-4 py-2 rounded-lg bg-gradient-to-br from-violet-900 to-pink-500 text-white text-sm font-medium duration-200 outline-none border-none hover:-translate-y-0.5 hover:shadow-lg ">
                    Lưu
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="module">
        import app from '/js/app.js';
        const menu = {
            formMenu: $('#formMenu'),
            toggleMenu: function() {
                this.formMenu.toggle();
            },
            showError: function(input, type) {
                switch (type) {
                    case true:
                        $(`#${input}`).parent().find(`label[for="${input}"]`).addClass('text-red-500');
                        $(`#${input}`).addClass('border-red-300 outline-red-300');
                        break;
                    case false:
                        $(`#${input}`).parent().find(`label[for="${input}"]`).removeClass('text-red-500');
                        $(`#${input}`).removeClass('border-red-300 outline-red-300');
                        break;
                }
            },
            valdation: function() {
                let status = true;
                if ($('#title').val().trim() === '') {
                    app.showToast('Title ko được để trống', 'error');
                    this.showError('title', true);
                    status = false;
                } else {
                    this.showError('title', false);
                    status = true;
                }
                return status;
            },
            submitMenu: function() {
                const _this = this;
                if (_this.valdation() === true) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('menu/add-ajax') }}",
                        data: {
                            "title": $('#title').val(),
                            "parent-id": $('#parent-id').val(),
                            "description": $('#description').val(),
                            "action": $('#action').val(),
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        dataType: "json",
                        success: function(res) {
                            if (res.status === true) {
                                app.showToast(`${res.message}`, 'success');
                            } else {
                                for (const key in res.message) {
                                    if (res.message.hasOwnProperty(key)) {
                                        const errorMessage = res.message[key][0];
                                        app.showToast(`<b>${key}</b> : ${errorMessage} `, 'error');
                                    }
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            app.showToast('Title ko được để trống', 'error');
                        }
                    });
                } else {

                }
            },
            getAllMenu: function() {
                $.ajax({
                    type: "method",
                    url: "url",
                    data: "data",
                    dataType: "dataType",
                    success: function (response) {
                        
                    }
                });
            },
            start: function() {
                const _this = this;
                _this.formMenu.hide();
                $('#btn__formMenu-open').on('click', function() {
                    _this.toggleMenu();
                    $(this).parent().hide();
                });
                $('#btn__formMenu-close').on('click', function() {
                    _this.toggleMenu();
                    $('#btn__formMenu-open').parent().show();
                });
                $('#btn__formMenu-submit').on('click', function() {
                    _this.submitMenu();
                })
            }
        }
        menu.start();
    </script>
@endsection
