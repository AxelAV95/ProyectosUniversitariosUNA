#include <iostream>

using namespace std;
#include "Suma.h"
/*En programaci�n orientada a objetos, el polimorfismo se refiere a la propiedad por la que 
es posible enviar mensajes sint�cticamente iguales a objetos de tipos distintos. El �nico requisito 
que deben cumplir los objetos que se utilizan de manera polim�rfica es saber responder al mensaje que se les env�a.*/




int main(int argc, char** argv) {
	
	Suma(2,2);
	Suma(3,2,2);
	
	int total_1= 0;
	int total_2 = 0;
	
	
	cout << "El total 1 es: "<< total_1;
	return 0;
}
