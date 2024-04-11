#include<iostream>
#include<string>
#include<sstream>
#include<vector>
#include<fstream>

using namespace std;

void mostrarTexto(vector<string> words){
	int size = words.size();
	char punto = '.';
	cout << "Tamaño de vector: " << size << endl;
	for(int i=0;i<size;i++){
		cout<<i<<":"<<words[i]<< punto << endl;
	}
            


}

void split(const string &s, char delim, vector<string> &elems) {
    stringstream ss;
    ss.str(s);
    string item;
    
    
    
    
    while (getline(ss, item, delim)) {
        elems.push_back(item);
    }
}


vector<string> split(const string &s, char delim) {
    vector<string> elems;
    split(s, delim, elems);
    return elems;
}
/*vector<string> split(const string &s, char delim) {
        vector<string> elems;
        stringstream ss(s);
        string item;
        while (getline(ss, item, delim)) {
            elems.push_back(item);
        }
        return elems;
    }*/

int main() {
	ofstream nuevo("texto2.txt");
	ifstream archivo;
	string linea;
	
	vector<string> palabras;
	char delim = '.';
	archivo.open("variedades.txt",ios::in);
		if (archivo.is_open()) {
			while(!archivo.eof()){
				 getline (archivo,linea);
				palabras = split(linea,delim);
				
			
			
				
            		
			
			
            }
            archivo.close();
        }
		else cout << "Fichero inexistente o faltan permisos para abrirlo" << endl; 
		
		mostrarTexto(palabras);
		
		
	
	

	}
	

        


