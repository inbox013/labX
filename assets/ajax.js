$loginVal = "<?=$login ?>";
$passVal = "<?=$password ?>";

$.ajax({
  url: "http://127.0.0.1/openserver/phpmyadmin/index.php",
  method: "post",
  dataType: "html",
  data: { login: "loginVal", password: "passVal" },
  success: function (data) {
    alert(data);
  },
});
