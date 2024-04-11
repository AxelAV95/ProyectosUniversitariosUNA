#include <iostream>

using namespace std;
#include "Interfaz.h"
#include "Operaciones.h"




int main(int argc, char** argv) {
	int nEmpleados;
	int salarios[nEmpleados];
	int salarioNeto, salarioBruto;
	string nombre, cedula;
	int horasTrabajadas;
	int total;
	int promedio;
	Interfaz in;
	Operaciones op;
	
	cout << "Ingrese el numero de empleados: ";
	cin >> nEmpleados;
	
	
	
	for(int i = 0; i < nEmpleados; i++){
			nombre = in.solicitarNombre();
			cedula = in.solicitarCedula();
			horasTrabajadas = in.ingresarHoras();
			salarioBruto = op.calcularSalarioBruto(horasTrabajadas);
			salarioNeto = op.calcularSalarioNeto(salarioBruto);
			in.imprimir(horasTrabajadas, salarioBruto, salarioNeto, nombre);
			salarios[i] = salarioBruto;
			cout << endl;
			
	}
	
	//Calcular suma total de salarios y promedio
	total = op.calcularSumaSalarios(salarios,nEmpleados);
	cout << "El total en salarios es: " << total << endl;
	promedio = op.calcularPromedio(total,nEmpleados);
	cout << "El promedio en salarios es: " << promedio << endl;
	
	return 0;
}
