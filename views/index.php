<!DOCTYPE html>
<html>
<head><meta charset="euc-jp">
  <?php $xajax->printJavascript('lib/'); ?>
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clinica</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <link href="dist/img/logicon.png" rel="icon">
  <link rel="shortcut icon" href="dist/img/logicon.png">
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 12032925;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.morangesoft.com/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.morangesoft.com/" rel="noopener nofollow" target="_blank">Morangesoft</a></noscript>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
    .form-control {
      background-color: transparent !important;
      border: 1px solid #ced4da !important;
      border-radius: 0 !important;
      border: 0px !important;
      border-bottom: 1px solid green !important;
      font-size: 15px;
      min-height: 48px;
      font-weight: 500;
  }

   .morangesoft-background-primary {
      background: #1B8FC8;
      border-color: #058FD2;
      color: #fff;
      font-size: 15px;
      font-weight: 600;
      min-height: 48px;
  }
  </style>
</head>
<body class="hold-transition login-page">

<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body" style="margin-top: 60px">  
    <p class="login-box-msg">
      
      <center>
        <a>
          <img src="dist/img/logo.png" class="img-responsive" style="max-height: 135px; ">
        </a>
      </center>
    </p>

    <form action="javascript:ingresarusuario()" style="margin-top: 30px">
      <center>
        <?php echo $info; ?>
      </center>      
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Escribe tu Correo" required="required" id="usuario" value="admin" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Escribe tu Clave" required="required"  id="clave"  value="admin" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12" style="text-align: right;">
          <a href="olvidoclave" >Recuperar contraseña</a><br><br>  
        </div>

        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" id="btnentr" class=" rounded-pill btn-lg morangesoft-background-primary
                btn-block text-uppercase">ACCEDER</button>	  
        </div>
        
        <div class="col-xs-12" style="text-align: center; margin-top: 10px">
          <a href="registro" style="font-size: 17px; color: #000">¿No tienes una cuenta? <strong>Registrate ahora</strong></a><br><br>  
        </div>
	
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "5ef37e585eb72900076526af";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<!-- End of ChatBot code -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="dist/js/func.js"></script>
<script src="lib/bootbox/bootbox.js"></script>

</body>
</html>
