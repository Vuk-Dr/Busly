import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import jQuery from 'jquery';
window.$ = jQuery;
window.jQuery = jQuery;

import 'bootstrap';

import 'lucide';
import {createIcons, icons} from "lucide";

import select2 from 'select2';
select2();

import toastr from "toastr";
window.toastr = toastr;
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: "toast-bottom-right",
    timeOut: 3000
};



