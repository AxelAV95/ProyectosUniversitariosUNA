class Operaciones{
	
	public:
		
		int fibo(int n){
    		if(n == 0 || n == 1)
       		return n;
    	else
       		return fibo(n - 2) + fibo(n - 1);
		}
		
		int calcularFibonacci(int x){
			
			for(int i = 1; i <= x; i++){
		
				if(fibo(i) != 0){
				cout << fibo(i) << endl;	
					
				}

			}
		}
		
		int calcularSumatoria(int x){
			int suma = 0;
			
			for(int i = 1; i <= x; i++){
				cout << i;
				cout << endl;
				suma = suma + i;
			}
	
			cout << "La suma es: " << suma;
			cout << "\n";
		}
		
		int calcularNumeroPerfecto(int x){
			int suma = 0;
			
			for(int i = 1; i < x;i++){
				if(x%i==0){
					suma = suma + i;
					cout << i << endl;
					
				}
			}
	
			if(suma == x){
				cout << suma << "==" << x << endl;
				cout << "Es perfecto" << "\n";
			}else{
				cout << suma << "!=" << x << endl;
				cout << "No es perfecto" << "\n";
			}
		}
	
		
	
};
