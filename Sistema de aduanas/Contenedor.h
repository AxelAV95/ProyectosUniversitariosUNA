#ifndef CONTENEDOR_H
#define CONTENEDOR_H
#include <string>
using namespace std;

class Contenedor
{
	double pies;
	double peso;
	double volumen;
	double placa;
	string identificador;
	//Contenedor mat[][];
	int m,n;
	
	public:
		Contenedor();
		Contenedor(double pies,double peso, double volumen){
			setPies(pies);
			setPeso(peso);
			setVolumen(volumen);
		}
		
		~Contenedor();
		
		//Metodos get
		string getIdentificador(){
			return identificador;
		}
		
		double getPies(){
			return pies;
		}
		double getPeso(){
			return peso;
		}
		double getVolumen(){
			return volumen;
		}
		double getPlaca(){
			return placa;
		}
		
		//Metodos set
		void setIdentificador(string i){
			identificador = i;
		}
		
		void setPies(double y){
			pies = y;
		}
		void setPeso(double x){
			peso = x;
		}
		void setVolumen(double z){
			volumen = z;
		}
		
		void setPlaca(double p){
			placa = p;
		}
};

#endif
