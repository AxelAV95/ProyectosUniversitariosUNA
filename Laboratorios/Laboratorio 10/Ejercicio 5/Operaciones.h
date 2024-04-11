class Operaciones{
	
	public:
		double calcularImpuesto(double precio,int opcion, int cantidad){
			
			double totalSinImpuesto = 0;
			double impuesto = 0;
			double total = 0;
			double aux = 0;
			
			if(opcion == 1){
				total = precio*cantidad;
			}
			if(opcion == 2){
				aux = (precio*5)/100; 
				impuesto = precio+ aux;
					if(impuesto < 5000){
						totalSinImpuesto = precio*cantidad;
						total = cantidad*impuesto;
						
					}else{
						cout << "No se pueden aplicar mas impuestos sobre estos productos.\nSe cancela la facturacion.\n";
						exit(0);
					}
				
			}
			if(opcion == 3){
				if(cantidad < 10){
					aux = (precio*7)/100; 
					impuesto = precio+ aux;
					if(impuesto < 5000){
						totalSinImpuesto = precio*cantidad;
						total = cantidad*impuesto;
						
					}else{
						cout << "No se pueden aplicar mas impuestos sobre estos productos.\nSe cancela la facturacion.\n";
						exit(0);
					}
					
				}else if(cantidad > 10){
					aux = (precio*4)/100; 
					impuesto = precio+ aux;
					if(impuesto < 5000){
						totalSinImpuesto = precio*cantidad;
						total = cantidad*impuesto;
						
					}else{
						cout << "No se pueden aplicar mas impuestos sobre estos productos.\nSe cancela la facturacion.\n";
						exit(0);
					}
					
				}
				
			}
			if(opcion == 4){
				total = precio*cantidad;
			}
			
			return total;
		}
		
		

		

};
