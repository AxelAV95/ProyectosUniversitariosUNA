#include <iostream>
#include <fstream>
#include <sstream>
using namespace std;
#include "Auto.h"
#include "Interfaz.h"


int main(int argc, char** argv) {
	int cantidadTotal = 0;
	cout << "Ingrese el numero total de vehiculos: ";
	cin >> cantidadTotal;
	Interfaz n;
	string nombre = "registro_autos.txt";
	ofstream registro;
	Auto nAutos[cantidadTotal];
	
	
	for(int i = 0; i < cantidadTotal; i++){
		
		nAutos[i].setMarca(n.ingresarMarca());
		nAutos[i].setModelo(n.ingresarModelo());
		nAutos[i].setColor(n.ingresarColor());
		
	}
	
	registro.open("registro_autos.txt", ios::app | ios::out | ios::ate);
	//fe.open(nombreArchivo.c_str(), ios::out);

		if(registro.is_open()){
			
				for(int i = 0; i < cantidadTotal;i++){
					registro << "Marca: " << nAutos[i].getMarca() << endl;
					registro << "Modelo: " << nAutos[i].getModelo() << endl;
					registro << "Color: " << nAutos[i].getColor() << endl;
					registro << "\n";
				}
				
			
			registro.close();
		}else{
			cout << "Error";
		}
	
	
	
	
	
	
	return 0;
}
