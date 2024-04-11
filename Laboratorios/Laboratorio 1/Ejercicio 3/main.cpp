#include <iostream>
#include <math.h>
using namespace std;

#include "Operaciones.h"
#include "Interfaz.h"

int main(int argc, char** argv){
	
	Interfaz in;
	Operaciones op;
	double r, l, vol = 0;
	
	
	r= in.solicitarRadio();
	cout << endl;
	l = in.solicitarLongitud();
	
	vol = op.calcularVolumen(r,l);
	cout << endl;
	cout << "El volumen es: " << vol << endl;
	
	return 0;
}
