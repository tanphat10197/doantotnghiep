 <script src="{$path_smarty}Public/css_js_admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{$path_smarty}Public/css_js_admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="{$path_smarty}Public/css_js_admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{$path_smarty}Public/css_js_admin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{$path_smarty}Public/css_js_admin/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{$path_smarty}Public/css_js_admin/dist/js/demo.js"></script>

    <script>
        $(document).ready(function(){
            $("#ten_id").blur(function(){
                var ten_mon=$("#ten_id").val();
                if(ten_mon !="")
                {
                    $("#ten_id_url").val(bodau(ten_mon));
                }
            });
        });
        
        function bodau(str){
        str= str.toLowerCase();
        str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
        str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
        str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
        str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
        str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
        str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
        str= str.replace(/đ/g,"d");
        str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
        str= str.replace(/-+-/g,"-");
        str= str.replace(/^\-+|\-+$/g,"");
        return str;
        }
    </script>