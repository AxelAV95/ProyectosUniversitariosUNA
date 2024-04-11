class Operaciones: public Interfaz{
	
	public:
		int sumar(int cantidad){
			int suma = 0;
			int numero;
			
		if(cantidad > 4){
		return 1;
		
		}else{
			int arreglo[cantidad];
			
			for(int i = 0; i< cantidad; i++){
				
				numero = IngresarNumero();
				
				arreglo[i] = numero;
				suma = suma + arreglo[i];
				
			}	
	}
	
	return suma;
	
			
	}
	
		int restar(int cantidad){
				int resta = 0;
				int numero;
				
			if(cantidad > 2){
			exit (0);
			
			}else{
				int arreglo[cantidad];
				
				for(int i = 0; i< cantidad; i++){
					
					numero = IngresarNumero();
					
					arreglo[i] = numero;
					resta = arreglo[i-1] -  arreglo[i];
					
				}	
		}
		
		return resta;
		
				
		}
		
			int multiplicar(int cantidad){
				int mult = 0;
				int numero;
				
			if(cantidad > 2){
			exit (0);
			
			}else{
				int arreglo[cantidad];
				
				for(int i = 0; i< cantidad; i++){
					
					numero = IngresarNumero();
					
					arreglo[i] = numero;
					mult = arreglo[i-1] *  arreglo[i];
					
				}	
		}
		
		return mult;
		
				
		}
		
			int dividir(int cantidad){
				int div = 0;
				int numero;
				
			if(cantidad > 2){
			exit (0);
			
			}else{
				int arreglo[cantidad];
				
				for(int i = 0; i< cantidad; i++){
					
					numero = IngresarNumero();
					
					arreglo[i] = numero;
					div = arreglo[i-1] /  arreglo[i];
					
				}	
		}
		
		return div;
		
				
		}
};
