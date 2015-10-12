/*
 * jQuery File Upload Plugin JS Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/* global $, window */
var dd ;
$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: 'upload/',
        filesContainer: $('table'),
        uploadTemplateId: null,
        downloadTemplateId : null,
        uploadTemplate: function (o) {
            var rows = $();
            $.each(o.files, function (index, file) {
                var row = $('<tr class="template-upload fade">' +
                    '<td><span class="preview"></span></td>' +
                    '<td><p class="name"></p>' +
                    '<strong class="error text-danger"></strong>' +
                    '</td>' +
                    '<td><p class="size">Processing</p>' +
                    '<div class="progress prgoress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">' +
                    '<div class="progress-bar progress-bar-success" style="width:0%;"></div></div>' +
                    '</td>' +
                    '<td>' +
                    // (!index && !o.options.autoUpload ?
                    // '<button class="btn btn-primary start" disabled>Start</button>' : '') +
                    (!index ? '<button class="btn btn-warning cancel"><i class="fa fa-ban"></i></button>' : '') +
                    '</td>' +
                    '</tr>');
                row.find('.name').text(file.name);
                row.find('.size').text(o.formatFileSize(file.size));
                if (file.error) {
                    row.find('.error').text(file.error);
                }
                rows = rows.add(row);
            });
            return rows;
        },
        downloadTemplate: function (o) {
            var rows = $();
            $.each(o.files, function (index, file) {
                var row = $('<tr class="template-download fade">' +
                    '<td><span class="preview"></span></td>' +
                    '<td><p class="name"></p>' +
                    (file.error ? '<div class="error"></div>' : '') +
                    '</td>' +
                    '<td><span class="size"></span></td>' +
                    '<td><button class="btn btn-danger delete" data-type="DELETE" data-url="'+
                    file.deleteUrl+'"><i class="fa fa-trash"></i></button></td></tr>');
                row.find('.size').text(o.formatFileSize(file.size));
                if (file.error) {
                    row.find('.name').text(file.name);
                    row.find('.error').text(file.error);
                } else {
                    row.find('.name').append($('<a></a>').text(file.name));
                    if (file.thumbnailUrl) {
                        row.find('.preview').append(
                            $('<a></a>').append(
                                $('<img>').prop('src', file.thumbnailUrl)
                            )
                        );
                    }
                    row.find('a')
                        .attr('data-gallery', '')
                        .prop('href', file.url);
                    row.find('button.delete')
                        .attr('data-type', file.delete_type)
                        .attr('data-url', file.delete_url);
                }
                rows = rows.add(row);
            });
            return rows;
        }
    });
});
