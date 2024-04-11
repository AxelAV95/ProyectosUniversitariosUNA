#include <iostream>
#include <sstream>
#include <fstream>
using namespace std;

int contarPalabras( string texto ) {
    int contador = 0;
    stringstream ss(texto);
    string palabra;
    while( ss >> palabra ) ++contador; ///Por cada palabra del stringstream se pasa al string y va contando.
    cout << "La cantidad de palabras son: " << contador;
    
}

int main(int argc, char** argv) {
	
	string texto;
	string nombre_archivo;
	string nombre_completo;
	cout << "Ingrese el nombre del archivo de texto: ";
	getline(cin,nombre_archivo);
	cout << "Ingrese el texto que desea guardar: ";
	getline(cin,texto);
	//asignaciones
	
 	nombre_completo = nombre_archivo + ".txt";
 	ofstream archivo(nombre_completo.c_str()); ///convierte el string a char
 	archivo << texto;
 	archivo.close();
 	contarPalabras(texto);
 	
	
	return 0;
}
