/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Botble from './utils';

require('./bootstrap');
require('./form');
require('./avatar');

$(document).ready(() => {
    if (window.noticeMessages) {
        window.noticeMessages.forEach(message => {
            Botble.showNotice(message.type, message.message, message.type === 'error' ? (window.trans && window.trans.error ? window.trans.error : 'Error!') : (window.trans && window.trans.success ? window.trans.success : 'Success!'));
        });
    }

    $(document).on('click', '.button-renew', event => {
        event.preventDefault();
        let _self = $(event.currentTarget);

        $('.button-confirm-renew').data('section', _self.prop('href')).data('parent-table', _self.closest('.table').prop('id'));
        $('.modal-confirm-renew').modal('show');
    });

    $('.button-confirm-renew').on('click', event => {
        event.preventDefault();
        let _self = $(event.currentTarget);

        let url = _self.data('section');

        _self.addClass('button-loading');

        $.ajax({
            url: url,
            type: 'POST',
            success: data => {
                if (data.error) {
                    Botble.showError(data.message);
                } else {
                    window.LaravelDataTables[_self.data('parent-table')].row($('a[data-section="' + url + '"]').closest('tr')).remove().draw();
                    Botble.showSuccess(data.message);
                }

                _self.closest('.modal').modal('hide');
                _self.removeClass('button-loading');
            },
            error: data => {
                Botble.handleError(data);
                _self.removeClass('button-loading');
            }
        });
    });

    $(document).on('click', '.btn_remove_image', event => {
        event.preventDefault();
        $(event.currentTarget).closest('.image-box').find('.preview-image-wrapper').hide();
        $(event.currentTarget).closest('.image-box').find('.image-data').val('');
    });

    $('.toggle-coupon-form').on('click', () => $('.coupon-form').toggle('fast'))

    $('.apply-coupon-code').on('click', (e) => {
        e.preventDefault()

        const $button = $(e.currentTarget)

        $.ajax({
            url: $button.data('url'),
            type: 'POST',
            data: {
                coupon_code: $button.closest('form').find('input[name="coupon_code"]').val(),
            },
            beforeSend: () => {
                $button.addClass('button-loading')
            },
            success: ({ error, message }) => {
                if (error) {
                    Botble.showError(message)

                    return
                }

                Botble.showSuccess(message)

                setTimeout(() => window.location.reload(), 1000)
            },
            error: (error) => {
                Botble.handleError(error)
            },
            complete: () => {
                $button.removeClass('button-loading')
            }
        })
    })

    $('.remove-coupon-code').on('click', (e) => {
        e.preventDefault()

        const $button = $(e.currentTarget)

        $.ajax({
            url: $button.data('url'),
            type: 'POST',
            beforeSend: () => {
                $button.addClass('button-loading')
            },
            success: ({ message, error }) => {
                if (error) {
                    Botble.showError(message)

                    return
                }

                setTimeout(() => window.location.reload(), 1000)
                Botble.showSuccess(message)
            },
            error: (error) => {
                Botble.handleError(error)
            },
            complete: () => {
                $button.removeClass('button-loading')
            },
        })
    })
});
