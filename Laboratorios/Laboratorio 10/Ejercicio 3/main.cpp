#include <iostream>

using namespace std;
#include "Interfaz.h"
#include "Operaciones.h"

int main(int argc, char** argv) {
	
	int opcion;
	int numero;
	Interfaz in;
	Operaciones op;
	
	do{
		cout << "\n1)Realizar sumatoria\n2)Realizar calculo fibonacci\n3)Realizar calculo numero perfecto\n4)Salir\n";
	cin >> opcion;
	switch(opcion){
		case 1:{
			 system("cls");
			 numero = in.ingresarNumero();
			 op.calcularSumatoria(numero);
			 system("pause");
			 system("cls");
			 
			break;
		}
		case 2:{
			system("cls");
			numero = in.ingresarNumero();
			op.calcularFibonacci(numero);
			system("pause");
			system("cls");
			
			break;
		}
		case 3:{
			system("cls");
			numero = in.ingresarNumero();
			op.calcularNumeroPerfecto(numero);
			
			system("pause");
			system("cls");
			
			break;
		}
		
		
		
	}
		
	}while(opcion != 4);
	
	return 0;
}
