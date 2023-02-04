<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		form{
			width: 130px;
			display: flex;
			flex-direction: column;
		}
	</style>
</head>
<body>
<center>
	<div style="width: 500px; height: 400px; border:10px double #2f2d31; border-radius:  4px; padding: 4px 4px 4px 4px;">
	<form id="calc-form">
		
		
		<br>
		<label style="width:190px;margin-left:-22px;"><h4 style="font-family: 'Quicksand', sans-serif;font-size: 23px;">Consumo m³: </h4></label><input style=" text-align: center;width:300px;margin-left: -83px; margin-top: 70px;" type="number" id="metroscubicos" name="metroscubicos">
		<br>
		<input style="display: inline-block;
    border: none;
    border-radius: 10px;
    padding: 0.5rem 1.5rem;
    margin-left: -37px;
    text-decoration: none;
    background: #0069ed;
    color: #ffffff;
    font-family: 'Quicksand', sans-serif;
    font-size: 1rem;
    cursor: pointer;
    text-align: center;
    transition: background 250ms ease-in-out, 
                transform 150ms ease;
    -webkit-appearance: none;
    -moz-appearance: none;background: #333; font-size: 23px; font-weight: bolder; width: 200px;" id="metroscubicos" type="submit" name="" value="Calcular">

	</form>
	<br><br>
	
	</div>
	<div id="resultado" style="display:flex; justify-content: center;
  align-items: center;width: 450px;height:300px;border: 1px solid black; margin-top: 10px; margin-bottom: 10px; border-radius:  4px; padding: 4px 4px 4px 4px; "></div>
	</center>


	<script>

	var metros = $('#metroscubicos').val();

	</script>


</body>
</html>