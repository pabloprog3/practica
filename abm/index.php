<?php

require_once("clases\producto.php");
$tituloVentana = "MASCOTAS";
?>
<html>
<head>
	<title> <?php echo $tituloVentana; ?> </title>
	  
		<!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="./JavaScript/funciones.js"></script>
		
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>PRODUCTOS</h1>      
		</div>
		<div class="CajaInicio" style="width:1100px">
			<h1>ABM DE MASCOTAS </h1>
			<table>
				<tbody>
					<tr>
						<td width="50%">
							<div id="divFrm" style="height:250px;overflow:auto;margin-top:20px">
								<input type="text" name="nombre" id="nombre" placeholder="Ingrese aqui el nombre" required />
								<input type="text" name="edad" id="edad" placeholder="Ingrese edad" required />
								<br>
								<input type="date" name="fecha" id="fecha" placeholder="ingrese fecha de nacimiento"required />
								<br>
								<br>
								<select name="tipo">
									<option value="perro">Perro</option>
									<option value="gato">Gato</option>
								</select>
								<br>
																<input type="radio" name="sexo" value="Macho" /> Macho
								<input type="radio" name="sexo" value="hembra" /> Hembra
								<br>
								<input type="file" name="archivo" id="archivo" onchange="SubirFoto()" /> 
								
								<input type="button" class="MiBotonUTN" onclick="AgregarProducto()" value="Guardar"  />
								<input type="hidden" id="hdnQueHago" value="agregar" />
							</div>
						</td>
						<td rowspan="2">
							<div id="divGrilla" style="height:610px;overflow:auto;border-style:solid">
							
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div id="divFoto" style="height:350px;overflow:auto">
							
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>