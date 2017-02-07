/**
 * Created by Administrator on 08/12/2016.
 */

function showModal (id) {
    $("#delete_users").modal();
    $("#id_user_DL").val(id);
}

function delete_user ()
{
    var id_user = $("#id_user_DL").val();
    $.ajax({
        method: "post",
        url: "/users/delete",
        data: {
            id: id_user,
            action: "delete"
        },
        success: function (data) {

            if (data = "delete_thanhcong")
            {
                $("#row-user-" + id_user ).remove()
            }
        }
    })
    $("#delete_users").modal("toggle");
}

// post
function showModal_post (id) {
    $("#delete_posts").modal();
    $("#id_post").val(id);
}
function delete_post ()
{
    var id_post = $("#id_post").val();
    $.ajax({
        method: "post",
        url: "/posts/delete",
        data: {
            id: id_post,
            action: "delete"
        },
        success: function (data) {

            if (data = "delete_thanhcong")
            {
                $("#row-post-" + id_post ).remove()
            }
        }
    })
    $("#delete_posts").modal("toggle");
}
$(document).ready(function() {

    $('#post_content_create').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,            // set maximum height of editor
        focus: true                  // set focus to editable area after initializing summernote
    });

    $('#add_post').click(function () {
        var content = $('#post_content_create').summernote('code');
        $('#post_content').val(content);
    });

    $.fn.editable.defaults.mode = 'popup';

    var id = $("#category_id").text();

    //make name, description category editable
    $('#name_category').editable({
        type: "text",
        url: "/categories/edit_category/" + id,
        pk: id,
        name:  'name_category',
        title: 'Edit category',
        ajaxOptions:{
            type: "post"
        },
        success: function(response, newValue) {
            if (response.status == 'error')
                return response.msg; //msg will be shown in editable form
            console.log(newValue);
        }
    });

    $('#category_description').editable({
        type: "textarea",
        url: "/categories/edit_category/" + id,
        pk: id,
        name:  'category_description',
        title: 'Edit description',
        success: function(response, newValue) {
            if (response.status == 'error')
                return response.msg; //msg will be shown in editable form
            console.log(newValue);
        }
    });

    var user_id = $("#user_id").text();
    var group_id = $("#group_id").text();
    //make rule user editable
    $('#rule').editable({
        type: "select",
        url: "/users/edit_user/" + user_id,
        pk: user_id,
        name:  'rule',
        title: 'Edit rule',
        value : group_id,
        source: [
            {value: 0, text: 'Dân thường'},
            {value: 1, text: 'Dân chơi'}
        ],
        success: function(response, newValue) {
            if (response.status == 'error')
                return response.msg; //msg will be shown in editable form
            console.log(newValue);
        }
    });

    var edit_content = $("#edit_post_content").val();
    $('#post_content_edit').summernote('code', edit_content);

    $('#edit_post').click(function () {
        var content = $('#post_content_edit').summernote('code');
        $('#edit_post_content').val(content);
    })

});