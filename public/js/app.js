const app = {
    dropdown: {
        dropdownBtn: $('.dropdown__btn'),
        dropdownContent: $('.dropdown__content'),
        initDropdown: function () {
            $(document).on('click', function (e) {
                if (!$(e.target).closest('.dropdown__container').length) {
                    this.dropdownContent.slideUp(100);
                }
            }.bind(this));
            $('.dropdown__btn').on('click', this.toggleDropdown.bind(this));
        },
        toggleDropdown: function () {
            const thisDropdown = $(`${this.dropdownBtn.data('dropdown')}`);
            $('.dropdown__content').not(thisDropdown).hide();
            thisDropdown.slideToggle(100);
        }
    },
    navMenu: {
        subNav: null,
        menus: $('.navmenu__left-item'),
        subMenus: $('.navmenu__left-sub-item'),
        toggleSubNav: function () {
            this.menus.each(function (index, menu) {
                if ($(menu).data('sub-key') !== undefined) {
                    let subKey = $(menu).data('sub-key');
                    $(menu).on('click', function () {
                        $(`.navmenu__left-sub-item[data-key="${subKey}"]`).slideToggle(100);
                    })
                }
            });
        },
        prepareSubNav: function () {
            this.subMenus.each(function (index, subMenu) {
                const subMenuActive = $(subMenu).find("li[data-active='true']");
                if (subMenuActive.length > 0) {
                    $(subMenu).show();
                } else {
                    $(subMenu).hide();
                }
            });

        },
        start: function () {
            this.prepareSubNav();
            this.toggleSubNav();
        }
    },
    showToast: (message, type = 'success', timeout = 5000) => {
        let icon;
        switch (type) {
            case 'error':
                icon = '<i class="bi bi-exclamation-lg"></i>';
                break;
            case 'success':
                icon = '<i class="bi bi-check"></i>';
                break;
            case 'warning':
            default:
                type = 'warning';
                icon = '<i class="bi bi-cone"></i>';
                break;
        }
        let html =
            `<div class="toast-container" role="${type}"><div class="icon-holder">${icon}</div><div class="content">${message}</div><button type="button" class="btn-close"><i class="bi bi-x"></i></button></div>`;
        $('#toast-section').append(html);
        $('.toast-container').each(function (index, item) {
            $(item).on('click', function () {
                $(this).hide(100);
                setTimeout(() => {
                    $(this).remove()
                }, 100)
            })
            setTimeout(() => {
                $(this).fadeOut(3000);
                setTimeout(() => {
                    $(this).remove()
                }, 3000)
            }, timeout)
        })
    },
    select2Custom: (element) => {
        element.each(function (index, item) {
            const select = $(item);
            select.hide();
            select.wrap('<div class="select-custom-container"></div>');
            select.before('<button type="button" class="select-custom-button"></button>');
            select.after('<div class="select-custom-dropdown"></div>');
            const dropdown = select.next('.select-custom-dropdown');
            const option = select.find('option');
            dropdown.append(
                '<input type="text" class="select-custom-search" placeholder="Search...">');
            dropdown.append('<ul class="select-custom-results"></ul>');
            const searchInput = dropdown.find('.select-custom-search');
            const resultsList = dropdown.find('.select-custom-results');
            const buttonSelect = select.parent('.select-custom-container').find(
                '.select-custom-button');
            buttonSelect.on('click', function () {
                dropdown.slideToggle(100);
                $('.select-custom-dropdown').not(select.parent('.select-custom-container')
                    .find('.select-custom-dropdown')).hide();
            });
            option.each(function () {
                const value = $(this).val();
                const text = $(this).text();
                if ($(this).prop('selected')) {
                    buttonSelect.text(text);
                } else {
                    buttonSelect.text(option.first().text());
                }
                resultsList.append(`<li data-value="${value}">${text}</li>`);
            });
            searchInput.on('input', function () {
                let searchTerm = $(this).val().toLowerCase();
                resultsList.find('li').each(function () {
                    let text = $(this).text().toLowerCase();
                    if (text.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            resultsList.on('click', 'li', function () {
                let value = $(this).data('value');
                let text = $(this).text();
                buttonSelect.text(text);
                select.val(value);
                select.trigger('change');
                dropdown.slideUp(100);
                searchInput.val('');
                resultsList.find('li').show();
            });
            $(document).on('click', function (e) {
                let target = $(e.target);
                if (!target.closest('.select-custom-container').length) {
                    $('.select-custom-dropdown').slideUp(100);
                }
            });
        })
    },

    start: function () {
        this.navMenu.start();
        this.dropdown.initDropdown();
        this.select2Custom($('.customSelect'));
    }
}
app.start();

export default app;