class Operaciones{
	
	
		
	public:
		
		bool verificarCredito(double salario, int dep){
		
			
			
			if(salario == 320000 && dep == 0){
				return true;
			}else if(salario == 405000 && dep == 1){
				return true;
			}else if(salario == 485000 && dep == 2){
				return true;
			}else if(salario == 578000 && (dep == 3 || dep > 3)){
				return true;
			}else{
				return false;
			}
			
			
		}
		
		double calcularCuota(){
		 
			
			
			return (float) (pow(10,7)*2*(0.09));
		}
};
