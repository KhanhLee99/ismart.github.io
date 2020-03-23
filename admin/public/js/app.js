$(document).ready(function() {

    // $("#num_order").change(function() {
    //     var price = $("#price").text();
    //     var num_order = $("#num_order").val();
    //     var data = { num_order: num_order, price: price };
    //     console.log(data);
    //     $.ajax({
    //         url: 'process.php', //trang xử lí, mặc định trang hiện tại
    //         method: 'POST', //Post  or Get, mặc định Get
    //         data: data, //Dữ liệu truyền lên server
    //         dataType: 'json', //html,text, script or json
    //         success: function(data) {
    //             // $("#total").text(data.total);
    //             $("#total").html("<strong>" + data.total + "</strong>");
    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status);
    //             alert(thrownError);
    //         }
    //     });
    // });

    $(".delete").click(function() {
        var id = $(this).attr("id");
        //var status = $(".status_" + id).text();
        // alert(status);
        var data = { id: id };

        $.ajax({
            url: '?mod=page&action=deleteAjax', //trang xử lí, mặc định trang hiện tại
            method: 'POST', //Post  or Get, mặc định Get
            data: data, //Dữ liệu truyền lên server
            dataType: 'json', //html,text, script or json
            success: function(data) {
                $(".status_" + id).text(data.status);
                //alert(data.deleted_at);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

    $('#select').change(function() {
        // var id = $('.option').attr("id");
        var parent_Cat = $('#select').val();
        // alert(post_cat);
        var data = { parent_Cat: parent_Cat };

        $.ajax({
            url: '?mod=posts&controller=post&action=addPostAjax', //trang xử lí, mặc định trang hiện tại
            method: 'POST', //Post  or Get, mặc định Get
            data: data, //Dữ liệu truyền lên server
            dataType: 'json', //html,text, script or json
            success: function(data) {
                // alert(data.list_post_cat_lv1);
                // console.log(data.list_post_cat_lv1);
                $("#son_Cat").html(data.list_post_cat_lv1);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });

    });


});