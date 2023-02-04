#ifndef ADUANA_H
#define ADUANA_H
#include<string>
using namespace std;

class Aduana
{
	private:
		string identificador;
		string nombreAduana;
		string ubicacion;
		string codigo;
	public:
		//Constructores
		Aduana();
		Aduana(string i,string nA,string u,string code){
			setIdentificador(i);
			setNombreAduana(nA);
			setUbicacion(u);
			setCodigoAduana(code);
			
		}
		~Aduana();
		
		//Metodos get
		string getCodigo(){
			return codigo;
		}
		string getIdentificador(){
			return identificador;
		}
		
		string getNombreAduana(){
			return nombreAduana;
		}
		
		string getUbicacion(){
			return ubicacion;
		}
		
		//Metodos set
		void setCodigoAduana(string c){
			codigo = c;
		}
		void setIdentificador(string i){
			identificador = i;
		}
		void setNombreAduana(string a){
			nombreAduana = a;
		}
		void setUbicacion(string u){
			ubicacion = u;
		}
	
};

#endif
