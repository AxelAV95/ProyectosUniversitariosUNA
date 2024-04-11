#include <iostream>
#include <fstream>
#include <vector>
using namespace std;

//Contar cuantas a,e,i,o,u hay en un txt
//mostrar en pantalla
//recorrer el txt

int main(int argc, char** argv) {
	
	ifstream archivo("programar.txt");
	vector<string> contenido;
	string linea;
	string contenidoTexto;
	int a,e,vi,o,u;
	a=e=vi=o=u=0;
	
	int size = 0;

	if(archivo.is_open()){
		while (getline(archivo, linea)) { ///obtiene linea por linea
			
			contenidoTexto = linea; ///guardo el contenido en otro string para mostrarlo luego
			linea.c_str(); //convierte la linea a cadena char
			size =	linea.size(); //verifica el tamaño del string
			
			for(int i = 0; i < size; i++){///recorre el string y cuenta vocales
				if(linea[i] == 'a'){
					++a;
				}
				if(linea[i] == 'e'){
					++e;
				}
				if(linea[i] == 'i'){
					++vi;
				}
				if(linea[i] == 'o'){
					++o;
				}
				if(linea[i] == 'u'){
					++u;
				}
		}
		
        
    }
		archivo.close();
	}
	else cout << "Fichero inexistente o faltan permisos para abrirlo" << endl; 
	
	cout << "El contenido del texto es: \n" << contenidoTexto << "\n\n\n";
	cout << "La cantidad de vocales a en el texto son: "<< a << endl;
	cout << "La cantidad de vocales e en el texto son: "<< e << endl;
	cout << "La cantidad de vocales i en el texto son: "<< vi << endl;
	cout << "La cantidad de vocales o en el texto son: "<< o << endl;
	cout << "La cantidad de vocales u en el texto son: "<< u << endl;
	
	return 0;
}
