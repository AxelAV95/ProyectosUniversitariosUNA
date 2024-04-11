#include <iostream>

using namespace std;
#include "Interfaz.h"
#include "Operaciones.h"

int main(int argc, char** argv) {
	
	Interfaz in;
	int cantidad;
	Operaciones op;
	int opcion;
	
	in.mostrarMenu();
	
	cin>>opcion;
	switch(opcion){
	
		case 1: { 
		
			int resultadoSuma;
			cantidad = in.IngresarCantidad();
			resultadoSuma = op.sumar(cantidad);
			cout<<" El resultado es: "<<resultadoSuma;
			break;
		}
		
		case 2: {
			
			int resultadoResta;
			cantidad = in.IngresarCantidad();
			resultadoResta = op.restar(cantidad);
			cout<<" El resultado es: "<<resultadoResta;
			break;
		}
		
		case 3: {
			
			int resultadoMult;
			cantidad = in.IngresarCantidad();
			resultadoMult = op.multiplicar(cantidad);
			cout<<" El resultado es: "<<resultadoMult;
			break;
		}
		
		case 4: {
			
			int resultadoDiv;
			cantidad = in.IngresarCantidad();
			resultadoDiv = op.dividir(cantidad);
			cout<<" El resultado es: "<<resultadoDiv;
			break;
		}
	}
	return 0;
}
