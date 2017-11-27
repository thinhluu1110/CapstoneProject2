var applicationUrl;
//refresh trang
function refreshPage() {
    window.location.reload(true);
}
//chuyển trang
function redirectPage(link) {
    window.parent.location = link;
}
//tạo link theo Url của website
function createBaseLink(url) {
    return applicationUrl + url;
}
//Hiển thị biểu tượng loading
function showLoader() {
    $("#ajax-loader").show();
}
//Ẩn hiển thị biểu tượng loading
function hideLoader() {
    $("#ajax-loader").hide();
}
//bắt các link popup
function triggerPopupLink() {
    $(".popup-link").click(function (e) {
        e.preventDefault();
        popupLink(this);
    });
}
//Lấy nội dung của 1 trang có địa chỉ tại link (dùng GET method) và hiển thị nội dung trong  container
function getPageContent(container, link) {
    $.ajax({
        type: "GET",
        url: link,
        beforeSend: function () {
            showLoader();
        },
        complete: function () {
            hideLoader();
        },
        async: false,
        error: function () {
            alert("Your request is not valid!");
        },
        success: function (data) {
            $(container).html(data);
        }
    });
}
//Lấy nội dung của 1 trang có địa chỉ tại link (dùng POST method và truyền dữ liệu ở postData) và hiển thị nội dung trong container
function postPageContent(container, link, postData) {
    $.ajax({
        url: link,
        type: "POST",
        data: postData,
        async: false,
        beforeSend: function () {
            showLoader();
        },
        complete: function () {
            hideLoader();
        },
        error: function () {
            alert("Your request is not valid!");
        },
        success: function (data) {
            $(container).html(data);
        }
    });
}
//get data by ajax
function getData(url, data) {
    var result;
    $.ajax({
        url: url,
        type: "GET",
        data: data,
        async: false,
        beforeSend: function () {
            showLoader();
        },
        complete: function () {
            hideLoader();
        },
        error: function () {
            result = "Invalid GET Request";
        },
        success: function (res) {
            result = res;
        }
    });
    return result;
}
//post data by ajax
function postData(url, data) {
    var result;
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        async: false,
        beforeSend: function () {
            showLoader();
        },
        complete: function () {
            hideLoader();
        },
        error: function () {
            result = "Invalid Request!";
        },
        success: function (res) {
            result = res;
        }
    });
    return result;
}
function popupLink(obj) {
    var container = "#dialogMain";
    var url = $(obj).attr("href");
    var w = $(obj).data("width");
    var h = $(obj).data("height");
    $.ajax({
        type: "GET",
        url: url,
        beforeSend: function () {
            showLoader();
        },
        complete: function () {
            hideLoader();
        },
        async: false,
        error: function () {
            alert("Your request is not valid!");
        },
        success: function (data) {
            $(container).html(data);
            $(container).modal();
            $(container + " .modal-dialog").attr({ 'style': 'width:' + w + 'px !important;height:' + h + 'px !important' });
        }
    });
}
//Post dữ liệu từ form theo action
function doPostAjaxForm(form, action) {
    var postData = $(form).serializeArray();
    var result;
    $.ajax({
        url: action,
        type: "POST",
        data: postData,
        async: false,
        beforeSend: function () {
            showLoader();
        },
        complete: function () {
            hideLoader();
        },
        error: function () {
            result = "Invalid Request";
        },
        success: function (data) {
            result = data;
        }
    });
    return result;
}
//Close dialogMain
function closeDialogMain() {
    $("#dialogMain").empty();
    $("#dialogMain").modal("hide");
}