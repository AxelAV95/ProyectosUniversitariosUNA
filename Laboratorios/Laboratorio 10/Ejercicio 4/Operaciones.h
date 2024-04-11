class Operaciones{
	
	public:
		
		int calcularSalarioBruto(int hour){
			int salarioBruto;
			if(hour > 160){
				salarioBruto = hour*6900;
			}
			salarioBruto = hour*3200;
			
			return salarioBruto;
		}
		
		int calcularSalarioNeto(int salarioBruto){
			int salarioNeto;
			int aux;
			
			aux = (salarioBruto*9.34)/100;
			salarioNeto = salarioBruto - aux;
			
			return salarioNeto;
		}
		
		int calcularSumaSalarios(int salarios[], int nEmpleados){
			
			int suma = 0;
			int tamanio = 0;
			tamanio = sizeof salarios / sizeof *salarios;
			
			for(int i = 0; i < tamanio ; i++){
				suma = suma + salarios[i];
			}
			
			return suma;
		}
		
		int calcularPromedio(int suma, int nEmpleados){
			
			int promedio = 0;
			
			promedio = (suma/nEmpleados);
			
			return promedio;
		}
};
