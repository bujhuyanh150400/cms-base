import "./bootstrap";
import "bootstrap-icons/font/bootstrap-icons.css";
import jQuery from "jquery";
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
import "flatpickr/dist/themes/airbnb.css";
import { Vietnam } from "flatpickr/dist/l10n/vn.js"
window.$ = jQuery;
$(document).ready(function () {
    flatpickr.localize(Vietnam)
    // Dùng để select với date picker
    flatpickr('.datepicker', {
        altInput: true,
        altFormat: "d-m-Y",
        dateFormat: "Y-m-d",
        locale: Vietnam,
    });
});


