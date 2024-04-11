#include <iostream>
#include <fstream>
#include <string>
//Entradas: nombre, meses laborados, vacaciones
//Salida: calculos.txt
//
using namespace std;

int main(int argc, char** argv) {
	
	string nombre;
	int meses;
	int vacaciones;
	ofstream archivo("cálculos.txt");
	
	cout << "Ingrese nombre: ";
	cin >> nombre;
	cout << "Ingrese cantidad de meses: ";
	cin >> meses;
	
	vacaciones = meses;
	
	archivo << "Nombre: "<< nombre << endl;
	archivo << "Meses: "<< meses << endl;
	archivo << "Vacaciones: "<< vacaciones << endl;
	
	archivo.close();
	
	
	return 0;
}
