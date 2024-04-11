class Operaciones{
	
	public:
		
		bool verificarPrimo(int numero){
		  int contador = 2;
		  bool primo=true;
		  while ((primo) && (contador!=numero)){
		    if (numero % contador == 0)
		      primo = false;
		    contador++;
		  }
		  return primo;
		}
		
		double calcularPromedio(double suma, double nPrimos){
			
			return suma/nPrimos;
		}
};
