/**
 * hommdemoplugin plugin for Craft CMS
 *
 * Index Field JS
 *
 * @author    Domenik Hofer
 * @copyright Copyright (c) 2019 Domenik Hofer
 * @link      http://www.homm.ch
 * @package   Hommdemoplugin
 * @since     0.0.1
 */

$('document').ready(function () {
    $('.hommdemoplugin_deleteEntry').on('click', function (e) {
        e.preventDefault();
        if(confirm('Löschen?')){
            window.location.href = $(this).attr('href');
        }
    })
})