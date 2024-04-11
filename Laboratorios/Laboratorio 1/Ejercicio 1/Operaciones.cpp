





class Operaciones{
	
	
	public:
		
		Operaciones(){
		}
		
		
		int calcularHorasMensuales(int horas){
			
			return horas * 4;
			
		}
		
		int calcularSalarioBruto(int horasMes){
			
			
			return horasMes * 4300;
		}
		
		int calcularDeduccion(int salarioBruto){
		
			return salarioBruto - (salarioBruto*0.10);
		}
	
	
};
