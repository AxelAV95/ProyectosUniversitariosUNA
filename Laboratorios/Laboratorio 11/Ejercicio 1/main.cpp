#include <iostream>

using namespace std;
#include "Interfaz.h"


int main(int argc, char** argv) {
	
	int cantidad;
	int precio;
	int categoria;
	int edad;
	int descuento= 0;
	int totalDescuento= 0;
	Interfaz in;

	
	cantidad = in.solicitarCantidadPersonas();
	
	for(int i = 0; i < cantidad; i++){
		categoria = in.solicitarCategoria();
		precio = in.ingresarPrecio();
		
		switch(categoria){
			case 1:{
				descuento= (precio*35)/100;
				break;
			}
			case 2:{
				descuento= (precio*25)/100;
				break;
			}
			case 3:{
				descuento= (precio*10)/100;
				break;
			}
			case 4:{
				descuento= (precio*25)/100;
				break;
			}
			case 5:{
				descuento= (precio*35)/100;
				break;
			}
		}
	
	totalDescuento += descuento;
	}
	
	cout << "El teatro deja de percibir: " << totalDescuento;
	return 0;
}
