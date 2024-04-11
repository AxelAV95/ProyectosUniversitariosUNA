#include <iostream>
#include <string>
using namespace std;
#include "Perro.h"
#include "Interfaz.cpp"





int main(int argc, char** argv) {
	//crear instancias de ambos
	Interfaz n;
	Perro perrillo = 	Perro(n.solicitarNombre(),n.solicitarRaza(),n.solicitarAnio(),n.solicitarColor());
	///para orden se le da reversa
	
	//in.imprimirDetalles(p1.getnombre(),etc) //Imprimir detalles
	
	/*string nombre = n.solicitarNombre();
	p1 = Perro(nombre)*/
//	Perro(n.solicitarNombre(),n.solicitarRaza(),n.solicitarAnio(),n.solicitarColor());
	

}
	

