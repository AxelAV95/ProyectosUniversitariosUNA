#include <iostream>
#include <math.h>

using namespace std;
#include "Operaciones.h"
#include "Interfaz.h"



int main(int argc, char** argv) {
	string nombre;
	string cedula;
	string apellidos;
	double salarioMes;
	int dependientes;
	Interfaz in;
	Operaciones op;
	bool verificar = false;
	long cuota = 0;
	
	cout << "Ingrese nombre: ";
	cin >> nombre;
	cout << "Ingrese cedula: ";
	cin >> cedula;
	cout << "Ingrese apellidos: ";
	cin >> apellidos;
	cout << "Ingrese salario mensual: ";
	cin >> salarioMes;
	cout << "Ingrese dependientes: ";
	cin >> dependientes;
	
	verificar = op.verificarCredito(salarioMes,dependientes);
	in.imprimirCondicion(verificar);
	if(verificar == true){
		cuota = op.calcularCuota();
		cout << "La cuota es: " << cuota << endl;
	}
	
	
	
	
	
	return 0;
}
