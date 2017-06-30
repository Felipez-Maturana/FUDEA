<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 	<style>
		.wrapper{width:60%; margin:5% auto;height:100vh;  box-shadow:0 0 2px #aaa; font-family:Hind;}
		.logo_header{width:100%; height:70px;background:#1CA8DD; padding:10px;}
		.email_body{width:100%; padding:0 15px;}
		.receipt_list{width:100%;}
		.receipt_list .left_list{float:left; width:60%;}
		.receipt_list .right_list{float:left; width:40%;}
		.left_list b,.right_list b{width:100%; float:left; margin:0 0 10px 0;}
		.left_list span,.right_list span{width:100%; float:left; margin:0 0 5px 0;}
		.right_list span{text-align:left; padding-left:15%;}
		.list_divider{width:100%; border-top:1px solid rgba(0,0,0,0.2);float:left;}
		.invoice_trans{width:100%;float:left; margin:5px 0;}
		.invoice_left{float:left; width:60%;}
		.invoice_right{float:left; width:40%;}
	</style>
</head>
<body>
  <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
  <div class="container">
	<div class="row">
        <div class="wrapper">
            <div class="logo_header" style="background:url(http://c1.staticflickr.com/5/4240/35386299181_ab919ea4cc_b.jpg) no-repeat center;" >
                
            </div>
            <div class="email_banner img-responsive">

            </div>
            <div class="email_body">
                <h1 class="text-center">Nueva solicitud ingresada: </h1>
                <p>
                    La solicitud ha sido ingresada: {{date("Y-m-d H:i:s")}} GMT-4 
                </p>
                
                <div class="receipt_list">
                    <div class="left_list">
                        <b>Datos Personales</b>
                      
                        <span>Nombre:</span>
                          <span>Apellidos:</span>
                            <span>Correo electrónico:</span>
                            <span>Teléfono:</span>
                          <span>Carrera:</span>
                            <span>Año de egreso:</span>
                        
                    </div>
                      <div class="right_list">
                        <b>Futuro socio</b>
                             <span>{!!$nombre!!}</span>
                             <span>{!!$apellidos!!}</span>
                             <span>{!!$email!!}</span>
                             <span>{!!$telefono!!}</span>
                             <span>{!!$carrera!!}</span>
                             <span>{!!$egreso!!}</span>
                    </div>
                    
                </div>
            </div>
        </div>       
	</div>
</div>
</body>
</html>
