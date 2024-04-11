#include <iostream>
#include <fstream>

using namespace std;


int main(int argc, char** argv) {
	
	char abecedario[] = {'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'};
	int tamanio;
	string nombreArchivo = "almacenar.txt";
	string abec;
	tamanio = sizeof abecedario / sizeof *abecedario; ///Obtiene el tamaño de un arreglo definido
	cout << tamanio;
	
	ofstream fs("almacenar.txt");
	ifstream fe;
	
	///Escribe el arreglo al documento
	for(int i = tamanio-1; i >= 0; i--){
		
		fs << abecedario[i] << endl;
		
	}
	fs.close();
	
	fe.open(nombreArchivo.c_str(), ios::out);
		if (fe.is_open()) {

       while (! fe.eof() ) {
            getline (fe,abec); //obtiene lo del texto y lo guarda en la cadena string
            cout << abec << endl; //Imprime
        }

        fe.close();
    }
    else cout << "Fichero inexistente o faltan permisos para abrirlo" << endl;  
	

	
	
	return 0;
}
