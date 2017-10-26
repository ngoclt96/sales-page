$(function () {
    // Checkbox
    $('.checkall').click(function () {
        $(':checkbox.check-el').prop('checked', this.checked);
        if ($(':checkbox.check-el:checked').length){
            $('.btn-bulk').show();
        } else {
            $('.btn-bulk').hide();
        } ;
        getCheckedCheckbox();
    });
    $(':checkbox.check-el').click(function () {
        if ($(':checkbox.check-el:checked').length){
            $(this).closest('tr').addClass('selected');
            $('.btn-bulk').show();
        } else {
            $('.btn-bulk').hide();
            $(this).closest('tr').removeClass('selected');
        } ;
        getCheckedCheckbox();
    });
    // Sorting
    $('a.sorting').on('click', function () {
        changeSort(this);
    });

    // Search heading table
    $('tr.table-heading a.btn-search').on('click', function () {
       doSearch(this);
    });
    $('tr.table-heading').on('keypress', function (e) {
        var keyCode = (event.keyCode ? event.keyCode : event.which);
        if (keyCode == 13) {
            doSearch(this);
        }
    })
    // Reset searching
    $('tr.table-heading a.btn-reset').on('click', function () {
        var originUrl = window.location.href.split('?')[0];
        document.location.href = originUrl;
    });


    $('#limit-page').on('change', function () {
        var val = $(this).val();
        var url = window.location.href;
        url = updateURLParams(url, 'limit', val);
        document.location.href = url;
    });

    $('.form-reload').click(function () {
        $(this).closest('form').find('input').each(function () {
            $(this).val('');
        });
        $(this).closest('form').submit();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $('.lang').click(function(){
        var lang = $(this).data('lang');
        var url = window.location.href;
        url = updateURLParams(url, 'lang', lang);
        document.location.href = url;
    });

    $('.preview-img').on('click', function () {
        var elementId = $(this).attr('id').replace('-preview', '');
        $(this).html('');
        $('#' + elementId).val('');
    });

    $('input.date').daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_2",
        autoUpdateInput: false,
        locale: {
            format: 'YYYY年MM月DD日'
        },
        showDropdowns: true

    }).on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY年MM月DD日'));
    });

    $('.ckeditor').each(function () {
        var id = $(this).attr('id');
        CKEDITOR.replace(id ,
        {
            filebrowserBrowseUrl: '/js/plugin/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '/js/plugin/ckfinder/ckfinder.html?type=Images',
            filebrowserUploadUrl: '/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        });
    })
});

function showModal(title, body, target, reload, url) {
    $(target).on('show.bs.modal', function (event) {
        var modal = $(this)
        modal.find('.modal-title').text(title)
        modal.find('.modal-body').text(body)
    });
    if(reload) {
        if(url){
            $(target).on('hide.bs.modal', function (event) {
                location.href = url;
            });
        } else {
            $(target).on('hide.bs.modal', function (event) {
                location.reload();
            });
        }
    }
    $(target).modal();
}

function showReportModal(title, content, targetModal, targetContent,reload) {
    $(targetModal).on('show.bs.modal', function (event) {
        var modal = $(this)
        modal.find(targetContent).val(content)
        modal.find('.modal-title').text(title)
    });
    if(reload) {
        $(targetModal).on('hide.bs.modal', function (event) {
            location.reload();
        });
    }
    $(targetModal).modal();
}

function getFormatDate(d) {
    return d.getMonth() + 1 + '/' + d.getDate() + '/' + d.getFullYear()
}

var updateURLParams =  function(url, paramName, paramValue) {
        if(paramValue == null)
            paramValue = '';
        var pattern = new RegExp('\\b(' + paramName + '=).*?(&|$)')
        if(url.search(pattern)>=0){
            return url.replace(pattern, '$1' + paramValue + '$2');
        }
        return url + (url.indexOf('?') > 0 ? '&' : '?') + paramName + '=' + paramValue
}

var getParamValue = function (name) {
    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
        var regexS = "[\\?&]" + name + "=([^&#]*)";
        var regex = new RegExp( regexS );
        var results = regex.exec( window.location.href );
        if( results == null )
            return "";
        else
            return results[1];
}


function browseImage(elementId) {
    CKFinder.popup( {
        chooseFiles: true,
        width: 800,
        height: 600,
        resourceType: 'Images',
        onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                var output = document.getElementById( elementId );
                output.value = file.getUrl();
                $('#' + elementId + '-preview').html('<img src="' + file.getUrl() + '" title="Click to remove"/>');
            } );

            finder.on( 'file:choose:resizedImage', function( evt ) {
                var output = document.getElementById( elementId );
                output.value = evt.data.resizedUrl;
                $('#' + elementId + '-preview').html('<img src="' + evt.data.resizedUrl + '" title="Click to remove"/>');
            } );
        }
    } );
}

function strToTime(time) {
    var time = time.split(' ');
    var date = time['0'];
    var hour = time['1'];

    var dates = date.split('-');
    var times = hour.split(':');
    return new Date(dates['0'], Number(dates['1']) - 1, dates['2'], times['0'], times['1'], times['2']);
}

// Change param sort function
function changeSort(el) {
    var name = $(el).data('type');
    var sort = $(el).data('target');
    sort = sort == 'asc' ? 'desc' : 'asc';
    var url = window.location.href;
    url = updateURLParams(url, 'sort', name + '-' + sort);
    document.location.href = url;

}

function getCheckedCheckbox() {
    var result = [];
    $(':checkbox.check-el:checked').each(function () {
        result.push($(this).attr('name'));
    });
    var str = result.join(',');

    $('form.bulk-action').find('input[name="id"]').val(str);
}

function doSearch(el) {
    var param = []
    // Textbox
    $(el).closest('tr.table-heading').find('input[type="text"],  select').each(function () {
        if ($(this).val().trim()){
            param.push($(this).attr('name') + '=' + $(this).val().trim());
        }
    });
    var str = param.join('&');
    var originUrl = window.location.href.split('?')[0];
    var url = originUrl + '?' + str;
    document.location.href = url;
}
