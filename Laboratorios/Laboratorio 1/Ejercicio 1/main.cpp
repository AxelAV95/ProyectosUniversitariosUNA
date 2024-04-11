


#include <iostream>
#include "Operaciones.cpp"
#include "Interfaz.cpp"

/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char** argv) {
	
	Interfaz in;
	Operaciones op;
	
	int horasSema = in.solicitarHorasSemanales();
	int horasMes = op.calcularHorasMensuales(horasSema);
	int salarioB = op.calcularSalarioBruto(horasMes);
	int salarioN = op.calcularDeduccion(salarioB);
	
	in.imprimir(salarioN);
	
	system("PAUSE");
	
	
	return 0;
}
