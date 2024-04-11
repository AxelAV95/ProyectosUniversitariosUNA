#include <iostream>

using namespace std;

int main(int argc, char** argv) {
	
	int suma=0;
	int multiplicador=0;
	int multiplicando=0;

	cout << "Ingrese el multiplicador: ";
	cin >> multiplicador;
	cout << "Ingrese el multiplicando: ";
	cin >> multiplicando;


	cout << "Multiplicador\tMultiplicando\n";
	for(int i = multiplicador-1; multiplicador > 1; i++){
		multiplicador=multiplicador/2;
		multiplicando=multiplicando*2;
		if(multiplicador%2==1){ //multiplicador es impar
			suma=suma+multiplicando;
		}
		
		cout  << multiplicador << "\t\t" << multiplicando << endl;
		
	}	
	
	
	

	
	
	cout << "Suma: " << suma;
	return 0;
	
}
	

