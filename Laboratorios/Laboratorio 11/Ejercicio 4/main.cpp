#include <iostream>

using namespace std;


int main(int argc, char** argv) {
	
	int arreglo[10];
	int silla[3];
	int numeros = 0;
	
	for(int i = 0; i < 10 ;i++){
		cin >>	arreglo[i];
	}
	
	for(int i = 0; i < 8; i++){
		if(arreglo[i+1] > arreglo[i] && arreglo[i+1] < arreglo[i+2]){
			cout << "\n";
			cout << arreglo[i+1] << endl;
			
		}
		
		
	}
	
	
	

	return 0;
}
