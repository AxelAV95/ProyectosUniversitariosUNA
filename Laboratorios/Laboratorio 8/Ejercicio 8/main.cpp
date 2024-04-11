#include <iostream>
#include <fstream>
#include <sstream>
using namespace std;
//copiar info de un txt a otro txt

int main(int argc, char** argv) {
	ifstream fe; //abre el fichero 1
	ofstream arc2("Final.txt"); //crea el fichero 2
	string linea; //linea que guardará lo del fichero 1
	
	
	fe.open("Inicial.txt", ios::out);
	if(fe.is_open()){
		while(!fe.eof()){
			
			getline(fe,linea); //obtiene la linea del fichero 1
			arc2 << linea; //la pasa al fichero 2
			
			
		}
		fe.close();
	}
	else{
		cout << "Error!";
	}
	

	
	
	
	return 0;
}
