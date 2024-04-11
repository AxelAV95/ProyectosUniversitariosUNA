#include <iostream>
#include <fstream>

using namespace std;


int main(int argc, char** argv) {
	
	char abecedario[] = {'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'};
	int tamanio;
	tamanio = sizeof abecedario / sizeof *abecedario;
	cout << tamanio;
	
	ofstream fs("almacenar.txt");
	
	
	for(int i = tamanio-1; i >= 0; i--){
		
		fs << abecedario[i] << endl;
		
	}
	
	fs.close();
	return 0;
}
