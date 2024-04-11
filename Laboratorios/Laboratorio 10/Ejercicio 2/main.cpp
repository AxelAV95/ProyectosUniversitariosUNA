#include <iostream>

using namespace std;
#include "Animal.h"

int main(int argc, char** argv) {
	
	
	Animal Dog = Animal(" Mamifero", "Chihuahua", "Altamente entrenado");
	Animal Snake = Animal("Vertebrado", "Cascabel", "Ninguna");
	Animal Cat = Animal("Conny", "1 anio y 2 meses");
	
	cout  << Cat.getNombre()<<endl;
	cout << Cat.getEdad();
	
	return 0;
}

