$("#thumbnail").change(
    function () {
        readURL(this);
    }
);
function delInput(event)
{
    var parent = $(event.target).parent().attr('class');
    $('.'+parent).remove();
}
function readURL(input)
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result).attr('style', 'height: 200px;width: 300px;');
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(
    function () {
        $(".btn-outline-success").click(
            function () {
                $('.will-add').removeClass('d-none');
                var currentdate = new Date();
                var datetime = currentdate.getFullYear() + '-'
                        + currentdate.getHours()
                        + currentdate.getMinutes()
                        + currentdate.getSeconds();
                var number = 1 + Math.floor(Math.random() * 99999999999);
                var a = '<div class="addmore'+ datetime + number +'">'+
                    '<input type="file" name="image[]">'+
                    '<button class="btn btn-outline-danger btn-sm delBtn'+ datetime + number +'" onclick="delInput(event)" type="button">Remove</button>'+
                    '</div>';
                
                $('.will-add').append(a);
            }
        );
    }
);
